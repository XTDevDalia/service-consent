<?php
//require_once('./service-consent.php');

if (isset($_POST['imgData'])) {
    $imgData = $_POST['imgData'];
    $imgData = str_replace('data:image/png;base64,', '', $imgData);
    $imgData = str_replace(' ', '+', $imgData);
    $data = base64_decode($imgData);
    $directory = SC_PLUGIN_DIR_PATH . 'upload/signature';
    
    if (!file_exists($directory)) {
        mkdir($directory, 0777, true); 
    }
    
    $fileName = $directory . '/signature_' . uniqid() . '.png';

    
    file_put_contents($fileName, $data);
    
    echo $fileName;
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "browart";
    
    // $conn = new mysqli($servername, $username, $password, $dbname);
    
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }
    
    // $sql = "INSERT INTO signatures (file_path) VALUES ('$fileName')";
    
    // if ($conn->query($sql) === TRUE) {
    //     echo "New record created successfully";
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    // }
    
    // $conn->close();
} else {
    echo "No image data received.";
}
?>
