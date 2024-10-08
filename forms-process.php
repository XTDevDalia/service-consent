<?php
session_start();
function service_menu() {
    add_menu_page(
            'ServiceConsent',
            'Consent Form',
            'manage_options',
            'add-consent', // Menu slug
            'add_consent', // Callback function to display content
            'dashicons-format-aside'
    );
    add_menu_page(
            'Service listing',
            'Visit List',
            'manage_options', // Capability (e.g., 'manage_options')
            'list-consent', // Menu slug
            'service_list',
            'dashicons-feedback' // Callback function to display content
    );
    add_menu_page(
        'Patch Test',
        'Patch Test',
        'manage_options', // Capability (e.g., 'manage_options')
        'patch_test', // Menu slug
        'patch_test_process', // Callback function to display content
        'dashicons-welcome-write-blog'
    );
    add_menu_page(
        'Patch Test List',
        'Patch Test List',
        'manage_options', // Capability (e.g., 'manage_options')
        'patch_test_list', // Menu slug
        'patch_test_listing', // Callback function to display content
        'dashicons-feedback'
    );
    add_submenu_page(
        '',
        'Thank You',
        'Thank You',
        'manage_options',
        'thank-you', // Empty slug to hide from menu
        'render_thankyou'
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
            'customer_email' => $_POST['txt_email']
        );
        $ret = $wpdb->get_row("SELECT * FROM $table_name WHERE customer_phone=" . $_POST['txt_phone']);
        if (empty($ret)) {
            $wpdb->insert($table_name, $arrData);
            $cid = $wpdb->insert_id;
        } else {
            $query = $wpdb->prepare(
                    "UPDATE $table_name SET customer_branch_id = %d,"
                    . "customer_name=%s,"
                    . "customer_email=%s WHERE customer_phone=%s",
                    $arrData['customer_branch_id'],
                    $arrData['customer_name'],
                    $arrData['customer_email'],
                    $arrData['customer_phone'],
            );
            $result = $wpdb->query($query);
            $cid = $ret->customer_id;
        }
        //echo $wpdb->insert_id;die;
        $_SESSION['customer_id'] = $cid;
        $_SESSION['customer_name'] = $arrData['customer_name'];
        $_SESSION['visit_no'] = $_POST['txt_visit_no'];
        $_SESSION['selected_forms'] = $_POST['chk_service'];
        $_SESSION['form_index'] = 0;
        //$filepath = SC_PLUGIN_DIR_PATH . 'views/' . $serviceconfig['templates'][$_POST['chk_service'][0]];
        $filepath = admin_url() . "?page=" . $serviceconfig['slug'][$_SESSION['selected_forms'][$_SESSION['form_index']]][0];
        //print_r($_SESSION);
        $_SESSION['form_index'] = $_SESSION['form_index'] + 1;
        session_write_close();

        // echo $filepath;
        wp_redirect($filepath);
        exit;
    }
    /* echo $wpdb->last_query;
      print_r($wpdb->last_error);
      exit; */
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
                'customer_visitor_no' => $_SESSION['visit_no'],
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

            if (($_SESSION['form_index'] - 1) == count($_SESSION['selected_forms'])) {
                unset($_SESSION['customer_id']);
                unset($_SESSION['customer_name']);
                unset($_SESSION['customer_phone']);
                unset($_SESSION['customer_email']);
                unset($_SESSION['visit_no']);
                unset($_SESSION['selected_forms']);
                unset($_SESSION['form_index']);
                wp_redirect(admin_url() . "admin.php?page=thank-you");
                exit;
            } else {
                wp_redirect($filepath);
                exit;
            }
            session_write_close();
            exit;
        }
    } else {
        echo "Session Expired !";
        exit;
    }
    // print_r($wpdb->last_error);
}

function register_service_forms() {
    session_start();
    if ($_SESSION) {
        global $serviceconfig;
        // echo $_SESSION['form_index'];
        // echo $serviceconfig['slug'][$_SESSION['selected_forms'][$_SESSION['form_index']-1]][0];die;

        add_submenu_page(
                '',
                'consent forms',
                'consent forms',
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

function render_thankyou() {
    include(SC_PLUGIN_DIR_PATH . "views/thankyou.php");
    exit;
}


function service_list() {
    // Creating an instance
    $table = new ListConsent();

    echo '<div class="wrap"><h2>Customer Visits</h2>';
    // Prepare table
    $table->prepare_items();
    // Display table
    $table->display();
    echo '</div>';
    session_write_close();
}
