<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Update Informasi</title>
    <link rel="stylesheet" href="./css/syle.css">
</head>
<body>
     <!-- Navbar -->
     <nav class="navbar navbar-dark bg-dark">
        <a href="#" class="navbar-logo">PT.<span>RAKHMADI</span></a>
        <div class="navbar-nav">
          <a href="dashboard.html">Dashboard</a>
          <a href="user.php">Data Informasi</a>
        </div>

        <div class="navbar-extra">
          <a href="ui_login.html" id="login">Keluar</a>
        </div>
      </nav>
      <!-- Navbar End -->
      <div class="container">
    <br>
    <h4><center>DAFTAR INFORMASI</center></h4>

    <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">           
            <th>Judul</th>
            <th>Informasi</th>
            <th>Sumber</th>
            <th colspan='2'>Aksi</th>
        </tr>
        </thead>
        <tbody>
        </div>
        <?php
      include "koneksi.php";

      if (isset($_GET['id_inf'])) {
        $id_inf=htmlspecialchars($_GET["id_inf"]);

        $sql="DELETE FROM tb_informasi where id_inf='$id_inf' ";
        $hasil=mysqli_query($conn,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:user.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }

      $sql="SELECT * from tb_informasi";

      $hasil=mysqli_query($conn,$sql);
      while ($data = mysqli_fetch_array($hasil)) {

          ?>
          <tbody>
          <tr>
              <td><?php echo $data["judul"]; ?></td>
              <td><?php echo $data["informasi"];   ?></td>
              <td><?php echo $data["sumber"];   ?></td>
              <td>
                  <a href="update.php?id_inf=<?php echo htmlspecialchars($data['id_inf']); ?>" class="btn btn-warning" role="button">Update</a>
                  <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_inf=<?php echo $data['id_inf']; ?>" class="btn btn-danger" role="button">Delete</a>
              </td>
          </tr>
          </tbody>
          <?php
      }
      ?>
  </table>
  <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
  </section>

        </tbody>
    </table>
<footer>Created by : Kelompok 6 :Muhammad Hadiyan Rakhmadi 23552011361, Muhammad Azka 22552011, Raffles Figo Tristan Siahan(x), Muhammad Lutfi(x), Mukhlis Nurdin Khoerudin(x) 222 CNS | &copy; 2025.</footer>
    <script>
        feather.replace()
    </script>
</body>
</html>