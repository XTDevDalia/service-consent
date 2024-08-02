<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

global $wpdb;

header('Content-Type: application/json'); 
if (!isset($wpdb)) {
    require_once('../../../wp-config.php');
    require_once('../../../wp-includes/wp-db.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['phone'])) {
    $phone = $_POST['phone'];
    //echo $phone;
    $table_name = $wpdb->prefix . "customer_master";
    $table_patch_test = $wpdb->prefix . "patch_test";
    $query = "SELECT c.* , DATE_FORMAT(pt.patch_test_date_time, '%d-%b-%Y') as patch_test_date FROM $table_name as c
                        LEFT JOIN $table_patch_test as pt
                            on pt.customer_id = c.customer_id 
                            where c.customer_phone = $phone ORDER BY pt.patch_test_date_time DESC LIMIT 1";
    // echo $query;
    // exit;
    $result = $wpdb->get_row($query);
    // print_r($result);
    //exit;
    if ($result) {
        echo json_encode([
            'success' => true,
            'name' => $result->customer_name,
            'email' => $result->customer_email,
<<<<<<< HEAD
=======
            'patch_test_date' => $result->patch_test_date,
>>>>>>> 79b0be861468d95e77c3e892487779f69196acc5
        ]);
    } else {
        echo json_encode([
            'success' => false,
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
    ]);
}
?>
