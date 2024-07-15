<?php

function service_menu() {
    add_menu_page(
            'ServiceConsent',
            'Customer Consent',
            'edit_posts',
            'service-menu',
            '',
            ''
    );
}

function service_submenu_addconsent() {
    add_submenu_page(
            'service-menu', // Parent menu slug (e.g., 'Tools')
            'Add Customer Consent for the Services', // Page title
            'Add Consent', // Menu title
            'manage_options', // Capability (e.g., 'manage_options')
            'add-consent', // Menu slug
            'add_consent' // Callback function to display content
    );
    add_submenu_page('service-menu',
            'Service listing',
            'Service List',
            'manage_options', // Capability (e.g., 'manage_options')
            'list-consent', // Menu slug
            'service_list' // Callback function to display content
    );
}

function add_consent() {
    include(SC_PLUGIN_DIR_PATH . '/views/takeconsent.php');
}

// process first main form
function addMainform() {
    require_once(SC_PLUGIN_DIR_PATH . 'constants.php');
    global $serviceconfig;
    global $wpdb;
    global $table_prefix;

    if (!isset($wpdb)) {
        require_once('../../../wp-config.php');
        require_once('../../../wp-includes/wp-db.php');
    }
    if (isset($_POST['main_btn_save']) && $_POST['main_btn_save'] == "submit") {
        $table_name = $table_prefix . "customer_master";
        $arrData = array(
            'customer_branch_id' => $_POST['select_branch'],
            'customer_name' => $_POST['txt_name'],
            'customer_phone' => $_POST['txt_phone'],
            'customer_email' => $_POST['txt_email'],
            'customer_no' => $_POST['txt_customer_no'],
        );

        $wpdb->insert($table_name, $arrData);
        $_SESSION['customer_id'] = $wpdb->insert_id;
        $_SESSION['customer_name'] = $arrData['customer_name'];
        $_SESSION['customer_no'] = $arrData['customer_no'];
        $_SESSION['selected_forms'] = $_POST['chk_service'];
        $_SESSION['form_index'] = 0;
        //$filepath = SC_PLUGIN_DIR_PATH . 'views/' . $serviceconfig['templates'][$_POST['chk_service'][0]];
        $filepath = admin_url() . "?page=" . $serviceconfig['slug'][$_SESSION['selected_forms'][$_SESSION['form_index']]][0];
        //print_r($_SESSION);
        $_SESSION['form_index'] = $_SESSION['form_index'] + 1;

        // echo $filepath;
        wp_redirect($filepath);
        exit;
    }
    // print_r($wpdb->last_error);
}

function otherform() {
    if (isset($_SESSION)) {
        require_once(SC_PLUGIN_DIR_PATH . 'constants.php');
        global $serviceconfig;
        global $wpdb;
        global $table_prefix;

        if (!isset($wpdb)) {
            require_once('../../../wp-config.php');
            require_once('../../../wp-includes/wp-db.php');
        }
        if (isset($_POST['other_btn_save']) && $_POST['other_btn_save'] == "submit") {
            $table_name = $table_prefix . "service_consent";
            $arrData = array(
                'consent_customer_id' => $_SESSION['customer_id'],
                'customer_service_date' => date('Y-m-d H:i:s'),
                'customer_form_id' => $_SESSION['selected_forms'][$_SESSION['form_index'] - 1],
                'customer_form_value_json' => json_encode($_POST),
                'customer_signature' => $_POST['hdn_customer_signature'],
                'customer_signature_date' => date('Y-m-d H:i:s'),
                'therapist_signature' => $_POST['hdn_therapist_signature'],
                'therapist_signature_date' => date('Y-m-d H:i:s')
            );

            $wpdb->insert($table_name, $arrData);

            //$filepath = SC_PLUGIN_DIR_PATH . 'views/' . $serviceconfig['templates'][$_POST['chk_service'][0]];
            $filepath = admin_url() . "?page=" . $serviceconfig['slug'][$_SESSION['selected_forms'][$_SESSION['form_index']]][0];
            //echo $filepath;exit;
            $_SESSION['form_index'] = $_SESSION['form_index'] + 1;
            if ($_SESSION['form_index'] == count($_SESSION['selected_forms'])) {
                wp_redirect(admin_url() . "?page=list-consent");
            } else {
                wp_redirect($filepath);
            }
            exit;
        }
    } else {
        echo "Session Expired !";
        exit;
    }
    // print_r($wpdb->last_error);
}

function register_service_forms() {
    if ($_SESSION) {
        global $serviceconfig;
        // echo $_SESSION['form_index'];
        // echo $serviceconfig['slug'][$_SESSION['selected_forms'][$_SESSION['form_index']-1]][0];die;

        add_menu_page(
                __('My Forms', 'my-plugin-textdomain'),
                __('My Forms', 'my-plugin-textdomain'),
                'manage_options',
                $serviceconfig['slug'][$_SESSION['selected_forms'][$_SESSION['form_index'] - 1]][0], // Empty slug to hide from menu
                'render_service_forms'
        );
    }
}

function render_service_forms() {
    global $serviceconfig;
    if ($_SESSION) {
        // Load your form(s) here
        include(SC_PLUGIN_DIR_PATH . "views/" . $serviceconfig['slug'][$_SESSION['selected_forms'][$_SESSION['form_index'] - 1]][1]);
        wp_register_script('signaturejs', '/wp-content/plugins/service-consent/js/signature.js');
        wp_enqueue_script('signaturejs');
    }
}

function service_list() {
    // Creating an instance
    $table = new ListConsent();

    echo '<div class="wrap"><h2>Customer Consents</h2>';
    // Prepare table
    $table->prepare_items();
    // Display table
    $table->display();
    echo '</div>';
}
