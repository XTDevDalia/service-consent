<?php

/**
 * @link              https://browart.co.uk/
 * @since             
 * @package           Take consent of customer for the service in saloon
 *
 * Plugin Name:       Service Consent
 * Plugin URI:        
 * Description:       When customer takes service in the saloon , the have to give consent by signing the consent form of relevant service.Plugin provides ability to admin to add customer detail and select forms to be signed by customer 
 * Version:           1.0.0
 * Author:            
 * Author URI:        https://browart.co.uk/
 * License:           
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       service-consent
 * Domain Path:       
 * Requires at least: 
 */
// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}
define('SC_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));
define('SC_PLUGIN_DIR_URL', plugin_dir_url(__FILE__));
// the main plugin class
require_once SC_PLUGIN_DIR_PATH . '/pluginconfig.php';
require_once SC_PLUGIN_DIR_PATH . '/constants.php';
//add_action('plugins_loaded', 'Codebunch\zcqApi\Bootstrap::instance', 99);
add_action('init', 'register_session');
add_action('wp_logout', 'end_session');
add_action('init', 'check_access');
add_action('admin_init', 'remove_admin_icons');


function remove_admin_icons() {
    remove_action('admin_bar_menu', 'wp_admin_bar_updates_menu', 10);
    remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    remove_action('admin_bar_menu', 'wp_admin_bar_new_content_menu', 20);
    remove_action('admin_bar_menu', 'wp_admin_bar_render', 100);
    remove_action('admin_notices', 'wp_dashboard_setup');
    remove_action('admin_head', 'wp_icon_dashboard');
    remove_action('admin_head', 'wp_favicon_dashboard');
}

function check_access() {
    if (current_user_can('editor')) {
        add_action('wp_print_scripts', 'add_service_consent_js');
        add_action('admin_menu', 'service_menu');
        add_action('init', 'addMainform');
        add_action('admin_menu', 'register_service_forms');
        add_action('admin_menu', 'otherform');
        add_action('admin_menu', 'editor_remove_menu_pages');
        require_once SC_PLUGIN_DIR_PATH . '/forms-process.php';
        require_once SC_PLUGIN_DIR_PATH . '/list-consent.php';
    }
}

function editor_remove_menu_pages() {
    remove_menu_page('link-manager.php');
    remove_menu_page('index.php');
    remove_menu_page('users.php');
    remove_menu_page('upload.php');
    remove_menu_page('tools.php');
    remove_menu_page('edit.php');
    remove_menu_page('edit-comments.php');
    remove_menu_page('post-new.php');
    remove_submenu_page('themes.php', 'themes.php');
    remove_submenu_page('themes.php', 'theme-editor.php');
    remove_submenu_page('themes.php', 'widgets.php');
    // Hide the Pages menu
    remove_menu_page('edit.php?post_type=page');
}

function add_service_consent_js() {
    wp_register_script('prefix_bootstrap', '/wp-content/plugins/service-consent/js/bootstrap.min.js');
    wp_enqueue_script('prefix_bootstrap');
    wp_register_script('jqueryjs', '/wp-content/plugins/service-consent/js/jquery-3.7.1.min.js');
    wp_enqueue_script('jqueryjs');
    wp_register_script('mainjs', '/wp-content/plugins/service-consent/js/main.js');
    wp_enqueue_script('mainjs');
    wp_register_style('consentpluginstylesheet', '/wp-content/plugins/service-consent/css/style.css');
    wp_register_style('prefix_bootstrap', '/wp-content/plugins/service-consent/css/bootstrap.min.css');
    wp_enqueue_style('consentpluginstylesheet');
    wp_enqueue_style('prefix_bootstrap');
}

function register_session() {
    if (!isset($_SESSION)) {
        session_start();
    }
}

function end_session() {
    session_destroy();
}

register_activation_hook(__FILE__, 'pluginconfig::activate');
register_deactivation_hook(__FILE__, 'pluginconfig::deactivate');

require_once SC_PLUGIN_DIR_PATH . '/apply-custom-css.php';
