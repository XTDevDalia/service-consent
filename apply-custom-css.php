<?php
add_action('admin_head', 'column_customer_no');
function column_customer_no() {
    echo '<style type="text/css">';
    echo '.column-customer_no { width: 10% !important; }'; // Adjust the width as needed
    echo '</style>';
}

add_action('admin_head', 'column_service_date');
function column_service_date() {
    echo '<style type="text/css">';
    echo '.column-customer_service_date { width: 9% !important; }'; // Adjust the width as needed
    echo '</style>';
}

add_action('admin_head', 'column_branch');
function column_branch() {
    echo '<style type="text/css">';
    echo '.column-customer_branch_id { width: 9% !important; }'; // Adjust the width as needed
    echo '</style>';
}

add_action('admin_head', 'column_customer_name');
function column_customer_name() {
    echo '<style type="text/css">';
    echo '.column-customer_name { width: 15% !important; }'; // Adjust the width as needed
    echo '</style>';
}

add_action('admin_head', 'column_contact_details');
function column_contact_details() {
    echo '<style type="text/css">';
    echo '.column-contact_details { width: 22% !important; }'; // Adjust the width as needed
    echo '</style>';
}