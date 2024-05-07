<?php
include 'koneksi.php'; // Memuat skrip koneksi ke database

header('Content-Type: application/json');

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangani form login
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Cari pengguna berdasarkan username
    $sql = "SELECT * FROM tb_genre WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Pengguna ditemukan
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            $response["success"] = true;
            $response["message"] = "Login berhasil.";
        } else {
            $response["success"] = false;
            $response["message"] = "Password salah.";
        }
    } else {
        $response["success"] = false;
        $response["message"] = "Pengguna tidak ditemukan.";
    }
} else {
    $response["success"] = false;
    $response["message"] = "Metode HTTP tidak didukung.";
}
header("location:user.php");
echo json_encode($response);
$conn->close();
?>
<?php
include 'koneksi.php'; // Memuat skrip koneksi ke database

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangani form login
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Cari pengguna berdasarkan username
    $sql = "SELECT * FROM tb_genre WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Pengguna ditemukan
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            $response["success"] = true;
            $response["message"] = "Login berhasil.";

            // Memulai sesi dan menyimpan informasi pengguna
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $row["email"];

            // Alihkan pengguna ke halaman "user.php"
            header("Location: user.php");
            exit; // Pastikan untuk keluar setelah mengalihkan pengguna
        } else {
            $response["success"] = false;
            $response["message"] = "Password salah.";
        }
    } else {
        $response["success"] = false;
        $response["message"] = "Pengguna tidak ditemukan.";
    }
} else {
    $response["success"] = false;
    $response["message"] = "Metode HTTP tidak didukung.";
}

// Set header untuk respons JSON
header('Content-Type: application/json');

// Output respons JSON
echo json_encode($response);

// Tutup koneksi database
$conn->close();
?>
