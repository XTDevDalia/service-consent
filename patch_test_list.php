<?php
if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}


class PatchTestListConsent extends WP_List_Table {

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
        switch ($column_name) {
            case 'patch_test_date_time':
                // Assuming $item['patch_test_date_time'] contains datetime in 'Y-m-d H:i:s' format
                $datetime = strtotime($item['patch_test_date_time']);
                $date = date('d-M-Y', $datetime); // Format date as '24-July-2024' 
                $time = date('h:i A', $datetime); // Format time as '07:12 PM'
                return "$date - $time";
            default:
                return $item[$column_name];
        }
    }

    function column_cb($item) {
        return sprintf(
            '<input type="checkbox" name="id[]" value="%s" class="chk_height_width_list"/>',
            $item['patch_test_id']
        );
    }

    function column_patch_test_id($item) {
        $actions = array(
            'edit' => sprintf('<a href="?page=%s&action=%s&patch_test_id=%s">Edit</a>', 'patch_test', 'edit', $item['patch_test_id']),
            'delete' => sprintf('<a href="?page=%s&action=%s&patch_test_id=%s" onclick="return confirmDelete()">Trash</a>', $_REQUEST['page'], 'delete', $item['patch_test_id']),
        );

        return sprintf('%1$s %2$s', $item['patch_test_id'], $this->row_actions($actions));
    }

    function get_sortable_columns() {
        $sortable_columns = array(
            'patch_test_id' => array('patch_test_id', false),
            'customer_name' => array('customer_name', false),
            'patch_test_date_time' => array('patch_test_date_time', false)
        );
        return $sortable_columns;
    }

    function get_columns() {
        $columns = array(
            'cb' => '<input type="checkbox">', // Render a checkbox instead of text
            'patch_test_id' => __('ID', 'cltd_example'),
            'customer_name' => __('Customer Name', 'cltd_example'),
            'patch_test_date_time' => __('Date Time', 'cltd_example'),
            'patch_test_notes' => __('Notes', 'cltd_example'),
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
            <div class="alignleft actions">
                <form method="get">
                    <input type="hidden" name="page" value="<?php echo $_REQUEST['page']; ?>" />
                    <input type="text" name="s" value="<?php echo isset($_GET['s']) ? esc_attr($_GET['s']) : ''; ?>" />
                    <?php submit_button(__('Search', 'cltd_example'), '', '', false); ?>
                </form>
            </div>
            <?php
        }
    }

    private function get_table_data() {
        global $wpdb;
        global $serviceconfig; // Access the global service configuration array
        $per_page = 10;
        $current_page = $this->get_pagenum();
        $search_term = !empty($_GET['s']) ? esc_sql($_GET['s']) : '';

        $table_name_patch_test = $wpdb->prefix . 'patch_test';
        $table_name_cust = $wpdb->prefix . 'customer_master';

        $query = "SELECT c.customer_name , p.* from $table_name_patch_test as p 
                            left join $table_name_cust as c
                                on c.customer_id = p.customer_id";

        // Adding search term condition
        if (!empty($search_term)) {
            $query .= $wpdb->prepare(" WHERE (patch_test_id LIKE %s OR customer_name LIKE %s)", '%' . $search_term . '%', '%' . $search_term . '%');
        }

        $orderby = !empty($_GET['orderby']) ? esc_sql($_GET['orderby']) : 'patch_test_id';
        $order = !empty($_GET['order']) ? esc_sql($_GET['order']) : 'asc';
        $query .= " ORDER BY $orderby $order";

        $total_items = $wpdb->get_var("SELECT COUNT(*) FROM $table_name_patch_test WHERE 1=1" . (!empty($search_term) ? $wpdb->prepare(" AND (patch_test_id LIKE %s OR customer_name LIKE %s)", '%' . $search_term . '%', '%' . $search_term . '%') : ""));

        $this->set_pagination_args(array(
            'total_items' => $total_items,
            'per_page' => $per_page,
            'total_pages' => ceil($total_items / $per_page)
        ));

        $offset = ($current_page - 1) * $per_page;

        $query .= " LIMIT $offset, $per_page";
        //echo $query;
        //exit;

        $results = $wpdb->get_results($query, ARRAY_A);
        //print_r($results);
        // exit;
        return $results;
    }
}


//Delete Functionality
add_action('admin_init', function() {
    if (isset($_GET['action']) && isset($_GET['patch_test_id'])) {
        $action = $_GET['action'];
        $patch_test_id = $_GET['patch_test_id'];

        switch ($action) {
            case 'delete':
                // Handle delete action
                global $wpdb;
                $table_name_patch_test = $wpdb->prefix . 'patch_test';

                $wpdb->query(
                    $wpdb->prepare(
                        "DELETE from $table_name_patch_test where patch_test_id = $patch_test_id")
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
         /* Make only the table scroll horizontally */
.wp-list-table-scroll {
    width: 100%;
    max-width: 100vw; /* Prevents overflow outside the viewport */
    overflow-x: auto;
    overflow-y: auto;
    border: 1px solid #ddd;
    margin-top: 10px;
}

/* Table minimum width for columns, adjust as needed */
table.wp-list-table {
    min-width: 900px;
    width: 100%;
    table-layout: auto;
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
        /* Target Service Date/Date Time column (3rd column) */
        table.wp-list-table th:nth-child(4),
        table.wp-list-table td:nth-child(4) {
            white-space: nowrap;
            min-width: 200px; /* Increase as needed */
        }
         table.wp-list-table th:nth-child(2),
        table.wp-list-table td:nth-child(2) {
            white-space: nowrap;
            min-width: 120px; /* Increase as needed */
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