<?php
include 'koneksi.php'; 

header('Content-Type: application/json');

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangani form register
    $reg_username = $_POST["reg_username"];
    $reg_email = $_POST["reg_email"];
    $reg_password = $_POST["reg_password"];
    $reg_verify_password = $_POST["reg_verify_password"];

    // Periksa apakah password dan verifikasi password cocok
    if ($reg_password != $reg_verify_password) {
        $response["success"] = false;
        $response["message"] = "Password dan verifikasi password tidak cocok.";
    } else {
        // Hash password sebelum menyimpan ke database
        $hashed_password = password_hash($reg_password, PASSWORD_DEFAULT);

        // Masukkan data ke database
        $sql = "INSERT INTO tb_genre (username, email, password) VALUES ('$reg_username', '$reg_email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            // Simpan informasi pengguna ke dalam sesi
            session_start();
            $_SESSION['username'] = $reg_username;
            $_SESSION['email'] = $reg_email;

            $response["success"] = true;
            $response["message"] = "Pendaftaran berhasil.";
            $response["redirect"] = "user.php";
        } else {
            $response["success"] = false;
            $response["message"] = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} else {
    $response["success"] = false;
    $response["message"] = "Metode HTTP tidak didukung.";
}
header("location:user.php");

echo json_encode($response);
$conn->close();

// Hentikan proses setelah keluar dari PHP
exit();
?>
