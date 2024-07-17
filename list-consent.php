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

    function column_default($item, $column_name) {
        return $item[$column_name];
    }

    function column_cb($item) {
        return sprintf(
            '<input type="checkbox" name="id[]" value="%s" />',
            $item['customer_no']
        );
    }

    function get_sortable_columns() {
        $sortable_columns = array(
            'customer_no' => array('customer_no', false),
            'customer_service_date' => array('customer_service_date', false),
            'customer_branch_id' => array('customer_branch_id', false),
            'customer_name' => array('customer_name', false)
        );
        return $sortable_columns;
    }

    function get_columns() {
        $columns = array(
            'cb' => '<input type="checkbox"/>', // Render a checkbox instead of text
            'customer_no' => __('Customer No', 'cltd_example'),
            'customer_service_date' => __('Service Date', 'cltd_example'),
            'customer_branch_id' => __('Branch', 'cltd_example'),
            'customer_name' => __('Name', 'cltd_example'),
            'contact_details' => __('Contact Details', 'cltd_example'),
            'site_list' => __('Selected Service', 'cltd_example'),
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

        $table_name_cust = $wpdb->prefix . 'customer_master';
        $table_name_ser = $wpdb->prefix . 'service_consent';
        $table_name_service_master = $wpdb->prefix . 'service_master';

        $query = "
            SELECT c.customer_no,
                   DATE_FORMAT(s.customer_service_date, '%d-%b-%Y') AS customer_service_date,
                   c.customer_branch_id,c.customer_name,
                   CONCAT(c.customer_phone, ' - ', c.customer_email) AS contact_details,
                   GROUP_CONCAT(sm.service_form_display_title) AS site_list
            FROM $table_name_ser AS s
            LEFT JOIN $table_name_cust AS c ON s.consent_customer_id = c.customer_id
            LEFT JOIN $table_name_service_master AS sm ON s.customer_form_id = sm.service_form_id";

        // Adding search term condition
        if (!empty($search_term)) {
            $query .= $wpdb->prepare(" WHERE (c.customer_no LIKE %s OR c.customer_name LIKE %s OR c.customer_phone LIKE %s OR c.customer_email LIKE %s OR c.customer_no LIKE %s)", '%' . $search_term . '%', '%' . $search_term . '%', '%' . $search_term . '%', '%' . $search_term . '%', '%' . $search_term . '%');
        }

        $query .= " GROUP BY DATE(s.customer_service_date), c.customer_no";

        $orderby = !empty($_GET['orderby']) ? esc_sql($_GET['orderby']) : 'customer_no';
        $order = !empty($_GET['order']) ? esc_sql($_GET['order']) : 'asc';
        $query .= " ORDER BY $orderby $order";

        $total_items = $wpdb->get_var("SELECT COUNT(DISTINCT DATE(s.customer_service_date), c.customer_no) FROM $table_name_ser AS s LEFT JOIN $table_name_cust AS c ON s.consent_customer_id = c.customer_id WHERE 1=1" . (!empty($search_term) ? $wpdb->prepare(" AND (c.customer_no LIKE %s OR c.customer_name LIKE %s OR c.customer_phone LIKE %s OR c.customer_email LIKE %s)", '%' . $search_term . '%', '%' . $search_term . '%', '%' . $search_term . '%', '%' . $search_term . '%') : ""));

        $this->set_pagination_args(array(
            'total_items' => $total_items,
            'per_page' => $per_page,
            'total_pages' => ceil($total_items / $per_page)
        ));

        $offset = ($current_page - 1) * $per_page;

        $query .= " LIMIT $offset, $per_page";

        $results = $wpdb->get_results($query, ARRAY_A);

        // Map branch numbers to branch names
        foreach ($results as &$result) {
            $branch_id = $result['customer_branch_id'];
            if (isset($serviceconfig['branch'][$branch_id])) {
                $result['customer_branch_id'] = $serviceconfig['branch'][$branch_id];
            }
        }

        return $results;
    }
}
