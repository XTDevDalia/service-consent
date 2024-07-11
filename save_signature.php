<?php
define('SC_PLUGIN_DIR_PATH', dirname(__FILE__));

if (isset($_POST['imgData'])) {
    $imgData = $_POST['imgData'];
    $imgData = str_replace('data:image/png;base64,', '', $imgData);
    $imgData = str_replace(' ', '+', $imgData);
    $data = base64_decode($imgData);
    $directory = SC_PLUGIN_DIR_PATH . '/upload/signature';

    if (!file_exists($directory)) {
        mkdir($directory, 0777, true);
    }
    $fileName = 'signature_' . uniqid() . '.png';
    $filepath =  $directory . '/'.$fileName;
    file_put_contents($filepath, $data);
    echo json_encode(array('success' => true, 'signature_name' => $fileName));
} else {
    json_encode(array('success' => false));
}
?>
