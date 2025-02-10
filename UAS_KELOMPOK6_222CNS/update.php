<!DOCTYPE html>
<html>
<head>
    <title>Form Penambahan Informasi</title>
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
    if (isset($_GET['id_inf'])) {
        $id_inf=input($_GET["id_inf"]);
    
        $sql="SELECT * FROM tb_informasi where id_inf=$id_inf";
        $hasil=mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($hasil);   
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_inf=htmlspecialchars($_POST["id_inf"]);
    $judul=input($_POST["judul"]);
    $informasi=input($_POST["informasi"]);
    $sumber=input($_POST["sumber"]);

    //Query input menginput data kedalam tabel anggota
    $sql="UPDATE tb_informasi SET
            judul='$judul',
            informasi='$informasi',
            sumber='$sumber'
            WHERE id_inf=$id_inf";

    //Mengeksekusi/menjalankan query diatas
    $hasil=mysqli_query($conn,$sql);

    //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
    if ($hasil) {
        header("Location:user.php");
    }
    else {
        echo "Data Gagal disimpan.";

    }
}
    ?>

    <h2>Update Data</h2>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Judul :</label>
            <input type="text" name="judul" class="form-control" placeholder="Masukan Judul" required />

        </div>
        <div class="form-group">
            <label>Informasi :</label>
            <input type="text" name="informasi" class="form-control" placeholder="Masukan Informasi" required/>
        </div>
       <div class="form-group">
            <label>Sumber :</label>
            <input type="link" name="sumber" class="form-control" placeholder="Masukan Sumber" required/>
        </div>   

        <input type="hidden" name="id_inf" value="<?php echo $data['id_inf']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>