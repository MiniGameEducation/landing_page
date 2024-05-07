<?php
include "koneksi.php";
$name=$_POST['nama'];
$email=$_POST['email'];
$password=$_POST['password'];
$level="user";
$kirim=$_POST['signup'];
if($kirim){
    $query="INSERT INTO `tb_user`(`id_user`, `nama`, `email`, `password`, `level`) VALUES
    ('','$name','$email','$password','$level')";
    $hasil=mysqli_query($conn,$query);
    header('Location:../html/form.html');
    }else{
        echo "<script>
                window.open('../html/form.html');
                alert('Register Failed!');
                </script>";
        }
?>