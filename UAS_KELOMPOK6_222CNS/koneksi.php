<?php
$serrvername = "localhost";
$username = "root";
$password = "";
$database = "db_hadiyan";
$port = "3306";

$conn = mysqli_connect($serrvername, $username, $password, $database);

if(!$conn){
    die("Koneksi anda gagal : " . mysqli_connect_error());
}else {
    echo "Koneksi anda berhasil";
}

?>