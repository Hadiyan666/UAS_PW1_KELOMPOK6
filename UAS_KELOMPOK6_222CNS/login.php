<?php
require_once 'koneksi.php';


    $email = $_POST["email"];
    $password = $_POST["password"];



$query_sql = "SELECT * FROM tb_user 
            WHERE email = '$email' AND password = '$password'";

$result = mysqli_query($conn, $query_sql);

if(mysqli_num_rows($result) > 0){
    header("Location: dashboard.html");
}else{
    echo "<center> <h1>Email atau Password anda salah. Silahkan coba lagi</h1><button><strong><a href='ui_login.html'>Login</a></strong></button></center>";
}

?>