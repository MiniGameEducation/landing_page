<?php
// Konfigurasi database
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "ratsel"; 


$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$data = array(
    'name' => $name,
    'email' => $email,
    'message' => $message
);


$data_json = json_encode($data);


$api_url = 'http://example.com/api/contact';

$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

// Menutup koneksi
curl_close($ch);

echo $response;
?>
