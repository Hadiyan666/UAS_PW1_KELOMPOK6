<!DOCTYPE html>
<html>
<head>
    <title>Form Update User</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

     //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_peserta
    if (isset($_GET['id'])) {
        $id=input($_GET["id"]);
    
        $sql="SELECT * FROM tb_user where id=$id";
        $hasil=mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($hasil);   
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id=htmlspecialchars($_POST["id"]);
    $nama=input($_POST["nama"]);
    $password=input($_POST["password"]);
    $email=input($_POST["email"]);

    //Query input menginput data kedalam tabel anggota
    $sql="UPDATE tb_nama SET
            nama='$nama',
            password='$password',
            email='$email'
            WHERE id=$id";

    //Mengeksekusi/menjalankan query diatas
    $hasil=mysqli_query($conn,$sql);

    //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
    if ($hasil) {
        header("Location:pegawai.php");
    }
    else {
        echo "Data Gagal disimpan.";

    }
}
    ?>

    <h2>Update User</h2>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama :</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />

        </div>
        <div class="form-group">
            <label>Password :</label>
            <input type="text" name="password" class="form-control" placeholder="Masukan password" required/>
        </div>
       <div class="form-group">
            <label>Email :</label>
            <input type="text" name="email" class="form-control" placeholder="Masukan Sumber" required/>
        </div>   

        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>