<?php
include 'koneksi.php'; 

header('Content-Type: application/json');

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id = $_POST['id'];
    $new_username = $_POST['username'];
    $new_email = $_POST['email'];
    $new_password = $_POST['password']; 

    
    $sql = "UPDATE tb_genre SET username='$new_username', email='$new_email', password='$new_password' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        
        $_SESSION['username'] = $new_username;
        $_SESSION['email'] = $new_email;

        $response["success"] = true;
        $response["message"] = "Profil berhasil diperbarui";
    } else {
        $response["success"] = false;
        $response["message"] = "Error: " . $sql . "<br>" . $conn->error;
    }
    header("location:user.php");
} else {
    $response["success"] = false;
    $response["message"] = "Metode HTTP tidak didukung.";
}

echo json_encode($response);

$conn->close();
?>
