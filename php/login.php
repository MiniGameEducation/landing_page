<?php

session_start();

include "koneksi.php";

if(isset($_POST['signin'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    // Remove email from here, as it's not being used in the login query
    
    $query = "SELECT * FROM `tb_user` WHERE  nama='$name' AND password= '$password'";
    $hasil = mysqli_query($conn, $query);

    if(mysqli_num_rows($hasil) > 0) {
        $data = mysqli_fetch_array($hasil);
        $_SESSION['name'] = $name;
        $_SESSION['level'] = $data['level'];
        
        if($data['level'] == "admin") {
            header("location:../html/admin.html");
            exit();
        } elseif($data['level'] == "user") {
            header("Location:../html/user.html");
            exit();
        }
    } else {
        echo "<script>
                window.open('../html/form.html');
                alert('Incorrect username or password');   
                </script>";
        exit();
    }
} else {
    header("location:../html/form.html");
    exit();
}
?>
