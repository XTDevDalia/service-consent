<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

global $wpdb;

header('Content-Type: application/json');
if (!isset($wpdb)) {
    require_once('../../../wp-config.php');
    require_once('../../../wp-includes/wp-db.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cust_id']) && isset($_POST['form_id'])) {
    $table_name = $wpdb->prefix . "service_consent";
    $ret = $wpdb->get_row("SELECT * FROM $table_name  WHERE consent_customer_id=" . $_POST['cust_id'] . " AND customer_form_id =" . $_POST['form_id'] . "  ORDER BY customer_service_date DESC limit 0,1");
    if ($ret) {
        $consentjson = $ret->customer_form_value_json;
        $lastEntry = json_decode($consentjson, true);
        echo json_encode($lastEntry);
        //echo $consentjson;
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
