<?php
function patch_test_process(){
    include(SC_PLUGIN_DIR_PATH . '/views/patch_test.php');
}
global $patch_test_id; 
$patch_test_id= @$_GET['patch_test_id'];
function add_patch_test_forms(){
    global $wpdb;
    global $table_prefix;
    global $patch_test_id;

    if (!isset($wpdb)) {
        require_once('../../../wp-config.php');
        require_once('../../../wp-includes/wp-db.php');
    }

    if (isset($_POST['patch_test_btn_save']) && $_POST['patch_test_btn_save'] == "submit") {
        $table_name = $table_prefix . "patch_test";
        $arrData = array(
            'customer_id' => $_POST['patch_test_customer'],
            'patch_test_date_time' => $_POST['patch_test_datetime'],
            'patch_test_notes' => $_POST['patch_test_notes'],
        );

        // Check if patch_test_id is set and valid
        if(!isset($patch_test_id) || empty($patch_test_id)){
            $result = $wpdb->insert($table_name, $arrData);
            if($result === false) {
                error_log('Insert error: ' . $wpdb->last_error);
            }
        } else {
            $data = array(
                'customer_id' => $_POST['patch_test_customer'],
                'patch_test_date_time' => $_POST['patch_test_datetime'],
                'patch_test_notes' => $_POST['patch_test_notes'],
            );
            $condition = array( 'patch_test_id' => $patch_test_id );
            $wpdb->update($table_name, $data, $condition);
            
        }

        session_write_close();
         wp_redirect(admin_url() . "admin.php?page=patch_test_list");
        exit;
    }
}

function patch_test_listing(){
    
    $table = new PatchTestListConsent();

    echo '<div class="wrap wp-list-table-scroll"><h2>Patch Test List</h2>';
    // Prepare table
    $table->prepare_items();
    // Display table
    $table->display();
    echo '</div>';
    session_write_close();
}