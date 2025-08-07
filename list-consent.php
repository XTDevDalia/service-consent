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
            'action' => __('Patch Test', 'cltd_example'),
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
            SELECT c.customer_id,pt.patch_test_id,
                   DATE_FORMAT(s.customer_service_date, '%d-%b-%Y') AS customer_service_date,
                   c.customer_branch_id, c.customer_name,
                   CONCAT(c.customer_phone, '<br>', c.customer_email) AS contact_details,
                   GROUP_CONCAT(sm.service_form_display_title) AS site_list,
                   (SELECT COUNT(*) FROM $table_name_patch_test WHERE customer_id = c.customer_id) AS has_patch_test
            FROM $table_name_ser AS s
            LEFT JOIN $table_name_cust AS c ON s.consent_customer_id = c.customer_id
            LEFT JOIN $table_name_service_master AS sm ON s.customer_form_id = sm.service_form_id
            LEFT JOIN $table_name_patch_test AS pt ON pt.customer_id = c.customer_id";
    
        if (!empty($search_term)) {
            $query .= $wpdb->prepare(" WHERE (c.customer_name LIKE %s OR c.customer_phone LIKE %s OR c.customer_email LIKE %s)", '%' . $search_term . '%', '%' . $search_term . '%', '%' . $search_term . '%');
        }
    
        $query .= " GROUP BY DATE(s.customer_service_date), c.customer_id";
    
        $orderby = !empty($_GET['orderby']) ? esc_sql($_GET['orderby']) : 'customer_id';
        $order = !empty($_GET['order']) ? esc_sql($_GET['order']) : 'asc';
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
        if ($item['has_patch_test'] > 0) {
            return sprintf(
                '<span class="dashicons dashicons-yes"></span>');
        } else {
            return sprintf(
                '<span class="dashicons dashicons-no-alt"></span>');
        }
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