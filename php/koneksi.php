<?php
//KONEKSI KE MYSQLi
$host="localhost";
$user="root";
$pass="";
$database="ratsel";
$conn=mysqli_connect($host,$user,$pass,$database);
if(!$conn){
echo "KONEKSI GAGAL!!";
}else {
//echo "KONEKSI BE/RHASIL";//Komen jika koneksi sudah berhasil
}
?>