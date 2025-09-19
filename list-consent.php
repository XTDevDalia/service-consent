<?php
if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

// Include the constants file
require_once(SC_PLUGIN_DIR_PATH . 'constants.php'); // Adjust the path as needed

class ListConsent extends WP_List_Table {

    function __construct() {
        parent::__construct(array(
            'singular' => 'service',
            'plural' => 'services',
        ));
    }
    
    function single_row($item) {
        echo '<tr>';
        foreach ($this->get_columns() as $column_name => $column_display_name) {
            $value = '';
            if ($column_name === 'cb') {
                $value = $this->column_cb($item);
            } elseif (method_exists($this, 'column_' . $column_name)) {
                $value = call_user_func(array($this, 'column_' . $column_name), $item);
            } else {
                $value = $this->column_default($item, $column_name);
            }
            // Remove <td> if already present
            if (strpos($value, '<td') === false) {
                echo sprintf('<td data-label="%s">%s</td>', esc_attr(strip_tags($column_display_name)), $value);
            } else {
                // If value already contains <td>, just output it
                echo $value;
            }
        }
        echo '</tr>';
    }
    function column_default($item, $column_name) {
        return isset($item[$column_name]) ? $item[$column_name] : '';
    }

    function column_cb($item) {
        return sprintf(
            '<input type="checkbox" name="id[]" value="%s" class="chk_height_width_list"/>',
            $item['customer_id']
        );
    }

    // function column_customer_id($item) {
    //     $actions = array(
    //         'delete' => sprintf('<a href="?page=%s&action=%s&customer_id=%s" onclick="return confirmDelete()">Trash</a>', $_REQUEST['page'], 'delete', $item['customer_id']),
    //     );

    //     return sprintf('%1$s %2$s', $item['customer_id'], $this->row_actions($actions));
    // }

    function get_sortable_columns() {
        $sortable_columns = array(
            'customer_id' => array('customer_id', false),
            'customer_service_date' => array('customer_service_date', false),
            'customer_branch_id' => array('customer_branch_id', false),
            'customer_name' => array('customer_name', false)
        );
        return $sortable_columns;
    }

    function get_columns() {
        $columns = array(
            'cb' => '<input type="checkbox"/>',
            'customer_id' => __('ID', 'cltd_example'),
            'customer_service_date' => __('Service Date', 'cltd_example'),
            'customer_branch_id' => __('Branch', 'cltd_example'),
            'customer_name' => __('Name', 'cltd_example'),
            'contact_details' => __('Contact Details', 'cltd_example'),
            'site_list' => __('Selected Service', 'cltd_example'),
            'action' => __('Download PDF', 'cltd_example'),
        );
        return $columns;
    }

    function prepare_items() {
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();

        $this->_column_headers = array($columns, $hidden, $sortable);

        $this->items = $this->get_table_data();
    }

    function extra_tablenav($which) {
        if ($which == 'top') {
            ?>
            <div class="alignleft actions" style="width: 100%; display: flex; justify-content: space-between; align-items: center;margin-bottom:20px;">
                <div>
                    <form method="get" style="display: inline-flex; gap: 8px;">
                        <input type="hidden" name="page" value="<?php echo esc_attr($_REQUEST['page']); ?>" />
                        <input type="text" name="s" value="<?php echo isset($_GET['s']) ? esc_attr($_GET['s']) : ''; ?>" />
                        <?php submit_button(__('Search', 'cltd_example'), '', '', false); ?>
                    </form>
                </div>

                <div class="">
				    <a href="<?php echo esc_url(admin_url('admin.php?page=' . $_REQUEST['page'] . '&export_customers=1')); ?>" class="button button-primary">Export All Customers</a>
                    <a href="<?php echo esc_url(admin_url('admin.php?page=' . $_REQUEST['page'] . '&export_csv=1')); ?>" class="button button-secondary">Export Offline Customers</a>
               
                </div>
        </div>
            <?php
        }
    }

    private function get_table_data() {
        global $wpdb;
        global $serviceconfig;
        $per_page = 10;
        $current_page = $this->get_pagenum();
        $search_term = !empty($_GET['s']) ? esc_sql($_GET['s']) : '';
    
        $table_name_cust = $wpdb->prefix . 'customer_master';
        $table_name_ser = $wpdb->prefix . 'service_consent';
        $table_name_service_master = $wpdb->prefix . 'service_master';
        $table_name_patch_test = $wpdb->prefix . 'patch_test';
    
        $query = "
            SELECT c.customer_id,
                   DATE_FORMAT(s.customer_service_date, '%d-%b-%Y') AS customer_service_date,
                   c.customer_branch_id, c.customer_name,
                   CONCAT(c.customer_phone, '<br>', c.customer_email) AS contact_details,
                   GROUP_CONCAT(sm.service_form_display_title) AS site_list
            FROM $table_name_ser AS s
            LEFT JOIN $table_name_cust AS c ON s.consent_customer_id = c.customer_id
            LEFT JOIN $table_name_service_master AS sm ON s.customer_form_id = sm.service_form_id
            LEFT JOIN $table_name_patch_test AS pt ON pt.customer_id = c.customer_id";
    
        if (!empty($search_term)) {
            $query .= $wpdb->prepare(" WHERE (c.customer_name LIKE %s OR c.customer_phone LIKE %s OR c.customer_email LIKE %s)", '%' . $search_term . '%', '%' . $search_term . '%', '%' . $search_term . '%');
        }
    
        $query .= " GROUP BY DATE(s.customer_service_date), c.customer_id";
    
        $orderby = !empty($_GET['orderby']) ? esc_sql($_GET['orderby']) : 's.customer_service_date';
        $order = !empty($_GET['order']) ? esc_sql($_GET['order']) : 'desc';
        $query .= " ORDER BY $orderby $order";
    
        $total_items = $wpdb->get_var("SELECT COUNT(DISTINCT DATE(s.customer_service_date), c.customer_id) FROM $table_name_ser AS s LEFT JOIN $table_name_cust AS c ON s.consent_customer_id = c.customer_id WHERE 1=1" . (!empty($search_term) ? $wpdb->prepare(" AND (c.customer_name LIKE %s OR c.customer_phone LIKE %s OR c.customer_email LIKE %s)", '%' . $search_term . '%', '%' . $search_term . '%', '%' . $search_term . '%') : ""));
    
        $this->set_pagination_args(array(
            'total_items' => $total_items,
            'per_page' => $per_page,
            'total_pages' => ceil($total_items / $per_page)
        ));
    
        $offset = ($current_page - 1) * $per_page;
    
        $query .= " LIMIT $offset, $per_page";
    
        $results = $wpdb->get_results($query, ARRAY_A);
    
        foreach ($results as &$result) {
            $branch_id = $result['customer_branch_id'];
            if (isset($serviceconfig['branch'][$branch_id])) {
                $result['customer_branch_id'] = $serviceconfig['branch'][$branch_id];
            }
        }
    
        return $results;
    }
    
    function column_action($item) {
        // $patch_test_icon = $item['has_patch_test'] > 0
        //     ? '<span class="dashicons dashicons-yes"></span>'
        //     : '<span class="dashicons dashicons-no-alt"></span>';

        // PDF download icon (SVG) with tooltip
        $pdf_url = admin_url('admin.php?page=' . $_REQUEST['page'] . '&download_pdf=1&customer_id=' . $item['customer_id']);
        $pdf_icon = '<div style="text-align:center;">
                        <a href="' . esc_url($pdf_url) . '" title="Download PDF" target="_blank">
                            <svg width="22" height="22" viewBox="0 0 24 24" style="vertical-align:middle;">
                                <path d="M12 16v-12m0 12l-5-5m5 5l5-5M4 20h16" stroke="#222" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>';


        return $patch_test_icon . $pdf_icon;
    }
}

// Delete Functionality
add_action('admin_init', function() {
    if (isset($_GET['action']) && isset($_GET['customer_id'])) {
        $action = $_GET['action'];
        $customer_no = $_GET['customer_id'];

        switch ($action) {
            case 'delete':
                global $wpdb;
                $table_name_customer = $wpdb->prefix . 'customer_master';
                $table_name_ser = $wpdb->prefix . 'service_consent';
                $table_name_patch_test = $wpdb->prefix . 'patch_test';

                $wpdb->query(
                    $wpdb->prepare(
                        "DELETE s FROM $table_name_ser AS s
                            LEFT JOIN $table_name_customer AS c ON s.consent_customer_id = c.customer_id
                            WHERE c.customer_id = %s", $customer_no
                    )
                );

                $wpdb->query(
                    $wpdb->prepare(
                        "DELETE pt FROM $table_name_patch_test AS pt
                            LEFT JOIN $table_name_customer AS c ON pt.customer_id = c.customer_id
                            WHERE pt.customer_id = %s", $customer_no
                    )
                );

                $wpdb->query(
                    $wpdb->prepare(
                        "DELETE FROM $table_name_customer WHERE customer_id = %s", $customer_no)
                );


                // Redirect to avoid resubmission
                wp_redirect(admin_url('admin.php?page=' . $_GET['page']));
                exit;
        }
    }
});
add_action('admin_head', function () {
    ?>
    <style>
         .wp-list-table-scroll {
        max-height: 500px; /* Set as per your preference */
        overflow-y: auto;
        border: 1px solid #ddd;
        margin-top: 10px;
    }

    .table-controls-sticky {
        position: sticky;
        top: 32px; /* Height of WordPress admin bar */
        z-index: 999;
        background: #fff;
        padding: 10px 0;
        border-bottom: 1px solid #ccc;
    }

    @media screen and (max-width: 600px) {
        .table-controls-sticky {
            flex-direction: column;
            gap: 10px;
        }
    }

    /* Existing responsive styles */
    @media screen and (max-width: 600px) {
        table.wp-list-table thead {
            display: none;
        }
        table.wp-list-table tbody tr {
            display: block;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            padding: 10px;
        }
        table.wp-list-table tbody td {
            display: block;
            text-align: right;
            position: relative;
            padding-left: 50%;
            border: none;
            border-bottom: 1px solid #eee;
        }
        table.wp-list-table tbody td::before {
            content: attr(data-label);
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-weight: bold;
            text-align: left;
        }
        table.wp-list-table tbody td:last-child {
            border-bottom: none;
        }
    }

    table.wp-list-table {
        width: 100%;
        min-width: 900px;
        table-layout: auto;
    }
    @media screen and (max-width: 600px) {
        table.wp-list-table thead {
            display: none;
        }
        table.wp-list-table tbody tr {
            display: block;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            padding: 10px;
        }
        table.wp-list-table tbody td {
            display: block;
            text-align: right;
            position: relative;
            padding-left: 50%;
            border: none;
            border-bottom: 1px solid #eee;
        }
        table.wp-list-table tbody td::before {
            content: attr(data-label);
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-weight: bold;
            text-align: left;
        }
        table.wp-list-table tbody td:last-child {
            border-bottom: none;
        }
    }
    @media screen and (min-width: 601px) {
        table.wp-list-table thead {
            display: table-header-group !important;
        }
        table.wp-list-table th {
            display: table-cell !important;
        }
        table.wp-list-table tbody td::before {
            display: none;
        }
        /* Prevent wrapping for Patch Test column */
        table.wp-list-table th:last-child,
        table.wp-list-table td:last-child {
            white-space: nowrap;
        }
        /* Prevent wrapping for Service Date column */
        table.wp-list-table th:nth-child(3),
        table.wp-list-table td:nth-child(3) {
            white-space: nowrap;
        }
    }
    @media screen and (min-width: 601px) and (max-width: 900px) {
        /* Target Service Date column (usually 3rd column) */
        table.wp-list-table th:nth-child(3),
        table.wp-list-table td:nth-child(3) {
            white-space: nowrap;
            min-width: 160px; /* Increase as needed */
        }
    }
    .wp-list-table-scroll {
        width: 100%;
        overflow-x: auto;
    }
    table.wp-list-table {
        width: 100%;
        min-width: 900px; /* Adjust as needed for your columns */
        table-layout: auto;
    }
    </style>
    <?php
});
//export data into csv
add_action('admin_init', 'export_consent_data_to_csv');
function export_consent_data_to_csv() {
    if (!is_admin() || !current_user_can('manage_options') || !isset($_GET['export_csv'])) {
        return;
    }

    global $wpdb;

    // Adjust to your actual table and column names
    $table_customer_master = $wpdb->prefix . 'customer_master';

    $search_term = !empty($_GET['s']) ? esc_sql($_GET['s']) : '';

    $query = "
        SELECT DISTINCT 
            c.customer_name AS full_name,
            c.customer_phone,
            c.customer_email
        FROM $table_customer_master AS c
        WHERE c.customer_email IS NOT NULL AND c.customer_email != ''
    ";

    if (!empty($search_term)) {
        $query .= $wpdb->prepare(
            " AND (c.customer_name LIKE %s OR c.customer_phone LIKE %s OR c.customer_email LIKE %s)",
            '%' . $search_term . '%',
            '%' . $search_term . '%',
            '%' . $search_term . '%'
        );
    }

    $query .= " GROUP BY c.customer_email ORDER BY c.customer_name ASC";

    $results = $wpdb->get_results($query, ARRAY_A);

    // Start output to CSV
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=offline_customers_' . date('Y-m-d') . '.csv');

    $output = fopen('php://output', 'w');

    // Column headers
    fputcsv($output, ['Full Name', 'Phone Number', 'Email']);

    foreach ($results as $row) {
        fputcsv($output, [
            $row['full_name'],
            $row['customer_phone'],
            $row['customer_email'],
        ]);
    }

    fclose($output);
    exit;
}

add_action('admin_init', 'export_unique_customers_to_csv');
function export_unique_customers_to_csv() {
    if (!is_admin() || !current_user_can('manage_options') || !isset($_GET['export_customers'])) {
        return;
    }

    global $wpdb;

    $search_term = !empty($_GET['s']) ? esc_sql($_GET['s']) : '';

    $table_name_cust = $wpdb->prefix . 'customer_master';
	$table_name_booknetic_cust = 'hgd_bkntc_customers';

    $query = "(
    SELECT DISTINCT 
        customer_name COLLATE utf8mb4_unicode_ci AS customer_name,
        customer_phone COLLATE utf8mb4_unicode_ci AS customer_phone,
        customer_email COLLATE utf8mb4_unicode_ci AS customer_email
    FROM $table_name_cust AS hcm
    WHERE hcm.customer_email IS NOT NULL AND hcm.customer_email != ''
)
UNION
(
    SELECT DISTINCT 
        CONCAT(first_name, ' ', last_name) COLLATE utf8mb4_unicode_ci AS customer_name,
        phone_number COLLATE utf8mb4_unicode_ci AS customer_phone,
        email COLLATE utf8mb4_unicode_ci AS customer_email
    FROM $table_name_booknetic_cust AS hbc
    WHERE hbc.email IS NOT NULL AND hbc.email != ''
)";

    if (!empty($search_term)) {
        $query .= $wpdb->prepare(" AND (customer_name LIKE %s OR customer_phone LIKE %s OR customer_email LIKE %s)", '%' . $search_term . '%', '%' . $search_term . '%', '%' . $search_term . '%');
    }


    $results = $wpdb->get_results($query, ARRAY_A);

    // Output CSV
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=all_customers_export_' . date('Y-m-d') . '.csv');

    $output = fopen('php://output', 'w');

    // CSV Headers
    fputcsv($output, ['Customer Name', 'Phone Number', 'Email ID']);

    foreach ($results as $row) {
        fputcsv($output, [
            $row['customer_name'],
            $row['customer_phone'],
            $row['customer_email']
        ]);
    }

    fclose($output);
    exit;
}
//PDF Code
add_action('admin_init', function() {
    if (
        is_admin() &&
        current_user_can('manage_options') &&
        isset($_GET['download_pdf']) &&
        isset($_GET['customer_id'])
    ) {
        global $wpdb;
        global $serviceconfig;
        require_once SC_PLUGIN_DIR_PATH . 'lib/fpdf.php';

        $customer_id = intval($_GET['customer_id']);
        $table_name_cust = $wpdb->prefix . 'customer_master';
        $table_name_consent = $wpdb->prefix . 'service_consent';

        // Fetch customer
        $customer = $wpdb->get_row(
            $wpdb->prepare("SELECT * FROM $table_name_cust WHERE customer_id = %d", $customer_id),
            ARRAY_A
        );
//         echo '<pre>';
// print_r($customer);
// echo '</pre>';
        if (!$customer) wp_die('Customer not found.');

        // Fetch all service consents for this customer
        $consents = $wpdb->get_results(
            $wpdb->prepare("SELECT * FROM $table_name_consent WHERE consent_customer_id = %d", $customer_id),
            ARRAY_A
        );
//          echo '<pre>';
// print_r($consents);
// echo '</pre>';
// exit;
        // Create PDF
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->SetTextColor(40,40,40);

        // Title
        // Set colors
        $pdf->SetFillColor(255, 255, 255);       // black background
        $pdf->SetTextColor(0, 0, 0); // white text
        $pdf->SetFont('Arial', 'B', 14);

        // Black rectangle for header
        // $pdf->Rect(10, 10, 190, 25, 'F'); // increased height to fit subtitle

        // Logo
        $logoMarginLeft = 15; 
        $pdf->Image(__DIR__ . '/logo.png', $logoMarginLeft, 13, 20.45, 20.22);
        // Set font for text
        $pdf->SetFont('Arial', '', 12);

        // Move cursor just below the logo
        $pdf->SetXY($logoMarginLeft, 13 + 20.22 + 2); // +2 for padding

        // Print text centered under the logo
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(20.45, 6, 'BROW ART', 0, 1, 'C');

        // Main title
        $marginTop = 13 * 0.264583; // ≈ 2.65mm

        // Set position with top margin applied
        $pdf->SetXY(10, 10 + $marginTop);
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(190, 12, 'Customer Consent Details', 0, 1, 'C');
        //$pdf->Cell(190, 12, 'Customer Consent Details', 0, 1, 'C');

        // Subtitle (Branch Name, directly under title)
        $pdf->SetFont('Arial', '', 10); // smaller font
        $marginTop = 7 * 0.264583;
        $pdf->SetXY(10, 20+$marginTop); // Y position inside black bar, just below title
        $branch_id = $customer['customer_branch_id'];
        $branch_name = isset($serviceconfig['branch'][$branch_id]) ? $serviceconfig['branch'][$branch_id] : $branch_id;
        $pdf->Cell(190, 8, $branch_name, 0, 1, 'C');

        // Reset colors for rest of page
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Ln(5);

                $pdf->Ln($topMarginMm);
        $pdf->SetDrawColor(180, 180, 180);
        $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
        $pdf->Ln(4);

        // Separator line under header
        // $pdf->SetDrawColor(180, 180, 180);
        // $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
        // $pdf->Ln(8);


        // Customer Info Section
        // First row: Name + Visit No
        $consent = $consents[0];
        $topMarginPx = 0; // 10px top margin
        $topMarginMm = $topMarginPx * 0.264583; // convert px to mm

        $pdf->Ln($topMarginMm);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(25, 8, 'Name:', 0, 0);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(60, 8, $customer['customer_name'], 0, 0); // fixed width

        // $pdf->SetFont('Arial', '', 12);
        // $pdf->Cell(30, 8, 'Visit No:', 0, 0);
        // $pdf->SetFont('Arial', 'B', 12);
        // $pdf->Cell(0, 8, $consent['customer_visitor_no'], 0, 1); // rest of line

        $pdf->SetFont('Arial', '', 12);
        $pdf->SetX(120); // Set X position (20 mm from left margin)
        $pdf->Cell(30, 8, 'Visit No:', 0, 0);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 8, $consent['customer_visitor_no'], 0, 1);


        // Second row: Email + Phone
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(25, 8, 'Email:', 0, 0);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(60, 8, $customer['customer_email'], 0, 0);

        $pdf->SetFont('Arial', '', 12);
        $pdf->SetX(120);
        $pdf->Cell(30, 8, 'Phone:', 0, 0);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 8, $customer['customer_phone'], 0, 1);

        // Separator line after details
        $topMarginPx = 10;
        $topMarginMm = $topMarginPx * 0.264583;

        // Add top margin
        $pdf->Ln($topMarginMm);
        $pdf->SetDrawColor(180, 180, 180);
        $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
        $pdf->Ln(4);


        // Service Forms Section
        $pdf->SetFont('Arial', 'B', 14);

        $pdf->SetFont('Arial', '', 12);

        $first = true;
        foreach ($consents as $consent) {
            // Start new page for each service except the first
            if (!$first) {
                $pdf->AddPage();
            }
            $first = false;

            // Fetch service name if not present
            $service_name = isset($consent['service_name']) ? $consent['service_name'] : '';
            if (!$service_name && !empty($consent['customer_form_id'])) {
                $service_name = $wpdb->get_var(
                    $wpdb->prepare(
                        "SELECT service_form_display_title FROM {$wpdb->prefix}service_master WHERE service_form_id = %d",
                        $consent['customer_form_id']
                    )
                );
            }

            // Service Name
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->Cell(95, 10, $service_name, 0, 0, 'L'); // Service name on the left (no line break)

            // Service Date
            $pdf->SetFont('Arial', '', 12);

            $service_date = $consent['customer_service_date'];
            $formatted_date = '';

            if ($service_date) {
                $date_only = preg_replace('/\s.*$/', '', $service_date);

                $dt = DateTime::createFromFormat('d-M-Y', $date_only) ?: DateTime::createFromFormat('Y-m-d', $date_only);
                if ($dt) {
                    $day = $dt->format('d');
                    $month = ucfirst(strtolower($dt->format('M')));
                    $year = $dt->format('Y');
                    $formatted_date = "{$day}-{$month}-{$year}";
                } else {
                    $formatted_date = $date_only;
                }
            }
            // Print Service Date on the same line, aligned left
            //$pdf->Cell(95, 10, $formatted_date, 0, 1, 'L'); 
            //$pdf->SetX(95); // move cursor 20 mm from the left margin
            $pdf->Cell(95, 10, $formatted_date, 0, 1, 'R');

             $marginTopBottom = 10 * 0.264583;
            $pdf->Ln($marginTopBottom);

            $pdf->SetFont('Arial', '', 12);

            // Decode JSON fields
            $fields = json_decode($consent['customer_form_value_json'], true);
            if (is_array($fields)) {
                $fields = removeTxtFromKeys($fields);

                // Fields to exclude from PDF
                $exclude_fields = [
                    'wpdbbkp_disable_from',
                    'hdn_plugin_url',
                    'chk_data_protection_policy',
                    'hdn_customer_signature',
                    'customer_signature_date',
                    'hdn_therapist_signature',
                    'therapist_signature_date',
                    'other_btn_save'
                ];

                // Filter out excluded fields
                $display_fields = array_filter(
                    $fields,
                    function($key) use ($exclude_fields) {
                        return !in_array($key, $exclude_fields);
                    },
                    ARRAY_FILTER_USE_KEY
                );

                // Only display table if there are fields to show
                if (count($display_fields) > 0) {
                    // Remove fields with empty values
                    $display_fields = array_filter($display_fields, function($value) {
                        if (is_array($value)) {
                            return !empty(array_filter($value, function($v) { return trim($v) !== ''; }));
                        }
                        return trim($value) !== '';
                    });

                    // Only show table if there are non-empty fields
                    if (count($display_fields) > 0) {
                        $pdf->SetDrawColor(224, 224, 224); // <-- Add this line

                        // Table header
                        $pdf->SetFillColor(230,230,230);
                        $pdf->SetFont('Arial', 'B', 12);
                        $pdf->Cell(50, 8, 'Consent Item', 1, 0, 'C', true);
                        $pdf->Cell(140, 8, 'Customer Response', 1, 1, 'C', true);
                        $pdf->SetFont('Arial', '', 12);

                        foreach ($display_fields as $field_name => $field_value) {
                            $clean_name = str_replace('Txt', '', $field_name);
                            $formatted_name = ucwords(str_replace('_', ' ', strtolower($clean_name)));

                            // Format value
                            if (is_array($field_value)) {
                                $value_str = '';
                                foreach ($field_value as $val) {
                                    // Format date if detected
                                    if (
                                        preg_match('/^\d{4}-\d{2}-\d{2}$/', $val) || // Y-m-d
                                        preg_match('/^\d{2}-\w{3}-\d{4}$/', $val)    // d-M-Y
                                    ) {
                                        $dt = DateTime::createFromFormat('Y-m-d', $val) ?: DateTime::createFromFormat('d-M-Y', $val);
                                        if ($dt) {
                                            $day = $dt->format('d');
                                            $month = strtolower($dt->format('M'));
                                            $year = $dt->format('Y');
                                            $val = "{$day}-{$month}-{$year}";
                                        }
                                    }
                                    $value_str .= $val . ', ';
                                }
                                $value_str = rtrim($value_str, ', ');
                            } else {
                                // Format date if detected
                                if (
                                    preg_match('/^\d{4}-\d{2}-\d{2}$/', $field_value) ||
                                    preg_match('/^\d{2}-\w{3}-\d{4}$/', $field_value)
                                ) {
                                    $dt = DateTime::createFromFormat('Y-m-d', $field_value) ?: DateTime::createFromFormat('d-M-Y', $field_value);
                                    if ($dt) {
                                        $day = $dt->format('d');
                                        $month = strtolower($dt->format('M'));
                                        $year = $dt->format('Y');
                                        $field_value = "{$day}-{$month}-{$year}";
                                    }
                                }
                                $value_str = $field_value;
                            }

                            // Add margin (indent) to field name and value text if value is not empty
                            $indent = (trim($value_str) !== '') ? '   ' : ''; // 5 spaces, adjust as needed
                            $formatted_name = $indent . $formatted_name;
                            $value_str = $indent . $value_str;

                            // Save current X and Y
                            $x = $pdf->GetX();
                            $y = $pdf->GetY();

                            // Value cell: use MultiCell for wrapping
                            $pdf->SetXY($x + 50, $y);
                            $pdf->MultiCell(140, 8, $value_str, 1);
                            $value_cell_height = $pdf->GetY() - $y;

                            // Field name cell with matching height
                            $pdf->SetXY($x, $y);
                            $pdf->MultiCell(50, $value_cell_height, $formatted_name, 1);

                            // Move to next row
                            $pdf->SetY($y + $value_cell_height);
                        }
                        $pdf->Ln(4);
                    }
                }
            }

            // --- Side by side signatures ---
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(95, 10, 'Customer Signature', 0, 0, 'C');
$pdf->Cell(95, 10, 'Therapist Signature', 0, 1, 'C');

$customer_signature_path = !empty($consent['customer_signature']) ? SC_PLUGIN_DIR_PATH . 'upload/signature/' . $consent['customer_signature'] : '';
$therapist_signature_path = !empty($consent['therapist_signature']) ? SC_PLUGIN_DIR_PATH . 'upload/signature/' . $consent['therapist_signature'] : '';

$y = $pdf->GetY();
$x1 = 15; // left margin for customer signature
$x2 = 110; // left margin for therapist signature

// Customer Signature Image
if ($customer_signature_path && file_exists($customer_signature_path)) {
    $pdf->Image($customer_signature_path, $x1, $y, 80, 20);
} else {
    $pdf->SetXY($x1, $y);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(80, 20, 'Not signed', 0, 0, 'C');
}

// Therapist Signature Image
if ($therapist_signature_path && file_exists($therapist_signature_path)) {
    $pdf->Image($therapist_signature_path, $x2, $y, 80, 20);
} else {
    $pdf->SetXY($x2, $y);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(80, 20, 'Not signed', 0, 0, 'C');
}

$pdf->Ln(24); // Move below the signatures
        }

        // Sanitize customer name for filename (replace spaces and special characters with underscores)
$customer_filename = preg_replace('/[^A-Za-z0-9]/', '_', $customer['customer_name']) . '_Details.pdf';

header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename=' . $customer_filename);
$pdf->Output('D', $customer_filename);
exit;
    }
});

function removeTxtFromKeys($array) {
    $clean = [];
    foreach ($array as $key => $value) {
        // Remove 'Txt' (case-insensitive) from anywhere in the key
        $new_key = preg_replace('/txt/i', '', $key);
        $new_key = ltrim($new_key, '_'); // Remove leading underscore if present
        if (is_array($value)) {
            $clean[$new_key] = removeTxtFromKeys($value);
        } else {
            $clean[$new_key] = $value;
        }
    }
    return $clean;
}