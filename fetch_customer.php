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
        echo json_encode([
            'success' => true,
            'name' => $result->customer_name,
            'email' => $result->customer_email,
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
