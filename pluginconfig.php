<?php
if (!defined('ABSPATH')) {
    die("Not Allowed Here !"); // If this file is called directly, abort.
}
/**
 * Ready Main Class
 */
final class pluginconfig {

    private static $_instance = null;

    /**
     * Create only one instance so that it may not Repeat
     */
    public static function instance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    /**
     * Constructor method for loading the components
     */
    public function __construct() {
        
    }

    /**
     * Fire on Activation
     * Create Required database tables
     */
    public static function activate() {
        //zoom_rewrite();
        global $wpdb;
        $table_name = $wpdb->prefix . "service_master";
        $charset_collate = $wpdb->get_charset_collate();
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

        if ($wpdb->get_var("SHOW TABLES LIKE '{$table_name}'") != $table_name) {

            $sql = "CREATE TABLE $table_name (
            service_form_id int(20) NOT NULL AUTO_INCREMENT,
            service_form_short_title varchar(256) NOT NULL,
            service_form_display_title text NOT NULL,
            PRIMARY KEY  (service_form_id)
            ) $charset_collate;";

            dbDelta($sql);

            $data_to_insert = array(
                array('service_form_short_title' => 'Facial', 'service_form_display_title' => 'Facial Consent Form'),
                array('service_form_short_title' => 'Manicure/Pedicure', 'service_form_display_title' => 'Manicure/Pedicure Form'),
                array('service_form_short_title' => 'Eyelashes', 'service_form_display_title' => 'Eyelashes application/removal consent form'),
                array('service_form_short_title' => 'Hair Color', 'service_form_display_title' => 'Hair Color Consent Form'),
                array('service_form_short_title' => 'Consultation', 'service_form_display_title' => 'Consultation Card'),
                array('service_form_short_title' => 'Brow Lamination', 'service_form_display_title' => 'Lash Lift / Brow Lamination'),
                array('service_form_short_title' => 'Hair Removal', 'service_form_display_title' => 'Hair Removal Consent Form'),
            );

            // Insert data into service table
            foreach ($data_to_insert as $data) {
                $wpdb->insert($table_name, $data);
            }
        }

        $table_name = $wpdb->prefix . "service_consent";
        if ($wpdb->get_var("SHOW TABLES LIKE '{$table_name}'") != $table_name) {
            $sql = "CREATE TABLE $table_name (
                `consent_id` bigint(20) NOT NULL AUTO_INCREMENT,
                `consent_customer_id` bigint(20) NOT NULL,
                `customer_visitor_no` varchar(255) NOT NULL,
                `customer_service_date` datetime NOT NULL,
                `customer_form_id` int(11) NOT NULL,
                `customer_form_value_json` text NOT NULL,
                `customer_signature` varchar(255) NOT NULL,
                `customer_signature_date` datetime NOT NULL,
                `therapist_signature` varchar(255) NOT NULL,
                `therapist_signature_date` datetime NOT NULL,
                PRIMARY KEY  (consent_id)
              ) $charset_collate;";
            dbDelta($sql);
        }
        $table_name = $wpdb->prefix . "customer_master";
        if ($wpdb->get_var("SHOW TABLES LIKE '{$table_name}'") != $table_name) {
            $sql = "CREATE TABLE $table_name (
                `customer_id` bigint(20) NOT NULL AUTO_INCREMENT,
                `customer_branch_id` int(11) NOT NULL,
                `customer_name` varchar(255) NOT NULL,
                `customer_phone` varchar(255) NOT NULL,
                `customer_email` varchar(255) NOT NULL,
                 PRIMARY KEY  (customer_id)
                );";
            dbDelta($sql);
        }
        $table_name = $wpdb->prefix . "patch_test";
        if ($wpdb->get_var("SHOW TABLES LIKE '{$table_name}'") != $table_name) {
            $sql = "CREATE TABLE $table_name (
                `patch_test_id` bigint(20) NOT NULL AUTO_INCREMENT,
                `customer_id` bigint(20) NOT NULL,
                `patch_test_date_time` varchar(256) NOT NULL,
                `patch_test_notes` varchar(256) NOT NULL,
                 PRIMARY KEY  (patch_test_id)
                );";
            dbDelta($sql);
        }
    }

    /**
     * Deactivating the plugin
     */
    public static function deactivate() {
        //Flush all settings
        //flush_rewrite_rules();
    }

}
