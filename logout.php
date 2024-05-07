<?php
// Mulai sesi
session_start();

// Hapus semua variabel sesi
$_SESSION = array();

// Hancurkan sesi
session_destroy();

// Set header untuk respons JSON
header('Content-Type: application/json');

// Buat respons JSON
$response = array(
    "status" => "success",
    "message" => "Logout berhasil"
);
header("location:login.php");
// Mengeluarkan respons JSON
echo json_encode($response);
?>
