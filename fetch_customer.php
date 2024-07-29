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
    $query = "SELECT * FROM $table_name where customer_phone = $phone";
    //echo $query;
    $result = $wpdb->get_row($query);

    if ($result) {
        $table_name = $wpdb->prefix . "service_consent";
        $ret = $wpdb->get_row("SELECT * FROM $table_name ORDER BY customer_service_date DESC limit 0,1");
        $count = 0;
        if ($ret) {
            $count = $ret->consent_id + 1;
        }
        $v_no = "VS" . sprintf("%06d", $result->customer_id) . $count;

        echo json_encode([
            'success' => true,
            'name' => $result->customer_name,
            'email' => $result->customer_email,
            //'customer_no' => $result->customer_no,
            'visit_no' => $v_no
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'No customer found with this phone number.'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request.'
    ]);
}
?>
