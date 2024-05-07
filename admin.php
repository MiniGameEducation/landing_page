<?php

$json_data = file_get_contents('php://input');


$data = json_decode($json_data, true);

// Koneksi ke database
$servername = "localhost"; 
$username = "root";
$password = ""; 
$dbname = "ratsel"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO tb_contacts (name, email, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $data['name'], $data['email'], $data['message']);


if ($stmt->execute()) {
    $response = array('message' => 'Contact received successfully');
} else {
    $response = array('message' => 'Failed to receive contact');
}

// Menutup koneksi ke database
$stmt->close();
$conn->close();

$response_json = json_encode($response);


echo $response_json;
?>
