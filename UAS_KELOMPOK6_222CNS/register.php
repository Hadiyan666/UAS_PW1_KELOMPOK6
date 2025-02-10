<?php
    require 'koneksi.php';
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    $query_sql = "INSERT INTO tb_user (id, nama, password, email) VALUES ('$id', '$nama', '$password', '$email')";

    if(mysqli_query($conn, $query_sql)){
        header("Location: ui_login.html");
    }else {
        echo "Pendaftaran gagal : " . mysqli_error($conn);
    }
?>