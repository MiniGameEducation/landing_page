<?php
session_start();

// Periksa apakah pengguna masuk atau tidak, jika tidak, arahkan ke halaman masuk atau laman lainnya.
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil Pengguna</title>
</head>
<body>
    <h2>Profil Pengguna</h2>
    <p>Username: <?php echo $_SESSION['username']; ?></p>
    <p>Email: <?php echo $_SESSION['email']; ?></p>
    <a href="edit_profile.php">Edit Profil</a>
    <a href="logout.php">log out Sayang</a>
</body>
</html>
