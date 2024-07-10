<?php

if (!class_exists('WP_List_Table')) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ListConsent extends WP_List_Table {

    function __construct() {
        global $status, $page;

        parent::__construct(array(
            'singular' => 'service',
            'plural' => 'services',
        ));
    }

    /**
     * [REQUIRED] this is a default column renderer
     *
     * @param $item - row (key, value array)
     * @param $column_name - string (key)
     * @return HTML
     */
    function column_default($item, $column_name) {
        return $item[$column_name];
    }

    /**
     * [REQUIRED] this is how checkbox column renders
     *
     * @param $item - row (key, value array)
     * @return HTML
     */
    function column_cb($item) {
        return sprintf(
                '<input type="checkbox" name="id[]" value="%s" />',
                $item['customer_id']
        );
    }

    /**
     * [REQUIRED] This method return columns to display in table
     * you can skip columns that you do not want to show
     * like content, or description
     *
     * @return array
     */
    function get_columns() {
        $columns = array(
            'cb' => '<input type="checkbox" />', //Render a checkbox instead of text
            'customer_branch_id' => '', //Render a checkbox instead of text
            'customer_name' => __('Name', 'cltd_example'),
            'customer_email' => __('E-Mail', 'cltd_example'),
            'customer_phone' => __('Phone', 'cltd_example'),
        );
        return $columns;
    }

    // Bind table with columns, data and all
    function prepare_items() {
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = array();
        $this->_column_headers = array($columns, $hidden, $sortable);

        $this->items = $this->get_table_data();
    }

    // Get table data
    private function get_table_data() {
        global $wpdb;
        $table_name_cust = $wpdb->prefix . 'customer_master'; // do not forget about tables prefix
        $table_name_ser = $wpdb->prefix . 'service_consent'; // do not forget about tables prefix
        
        return $wpdb->get_results(
                        "SELECT * from {$table_name_cust}",
                        ARRAY_A
        );
    }

    /**
     * [REQUIRED] This is the most important method
     *
     * It will get rows from database and prepare them to be showed in table
     */
    function prepare_items1() {
        global $wpdb;
        $table_name_cust = $wpdb->prefix . 'customer_master'; // do not forget about tables prefix
        $table_name_ser = $wpdb->prefix . 'service_consent'; // do not forget about tables prefix

        $per_page = 25; // constant, how much records will be shown per page

        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();

        // here we configure table headers, defined in our methods
        $this->_column_headers = array($columns, $hidden, $sortable);

        // [OPTIONAL] process bulk action if any
        $this->process_bulk_action();

        // will be used in pagination settings
        $total_items = $wpdb->get_var("SELECT COUNT(id) FROM $table_name_ser");

        // prepare query params, as usual current page, order by and order direction
        $paged = isset($_REQUEST['paged']) ? max(0, intval($_REQUEST['paged'] - 1) * $per_page) : 0;
        $orderby = (isset($_REQUEST['orderby']) && in_array($_REQUEST['orderby'], array_keys($this->get_sortable_columns()))) ? $_REQUEST['orderby'] : 'customer_service_date';
        $order = (isset($_REQUEST['order']) && in_array($_REQUEST['order'], array('asc', 'desc'))) ? $_REQUEST['order'] : 'desc';

        // [REQUIRED] define $items array
        // notice that last argument is ARRAY_A, so we will retrieve array
        $this->items = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name_ser s left JOIN $table_name_cust c ON s.consent_customer_id = c.customer_id  ORDER BY $orderby $order GROUP BY customer_service_date,c.customer_id LIMIT %d OFFSET %d", $per_page, $paged), ARRAY_A);

        // [REQUIRED] configure pagination
        $this->set_pagination_args(array(
            'total_items' => $total_items, // total items defined above
            'per_page' => $per_page, // per page constant defined at top of method
            'total_pages' => ceil($total_items / $per_page) // calculate pages count
        ));
    }

    /**
     * [OPTIONAL] This method return columns that may be used to sort table
     * all strings in array - is column names
     * notice that true on name column means that its default sort
     *
     * @return array
     */
    function get_sortable_columns() {
        $sortable_columns = array(
            'name' => array('name', true),
            'email' => array('email', false),
            'phone' => array('phone', false),
        );
        return $sortable_columns;
    }

}
