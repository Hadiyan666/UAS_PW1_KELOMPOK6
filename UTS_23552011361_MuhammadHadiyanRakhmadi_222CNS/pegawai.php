<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
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
    <h4><center>DAFTAR PEGAWAI</center></h4>

    <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">           
            <th>Nama</th>
            <th>Password</th>
            <th>Email</th>
            <th colspan='2'>Aksi</th>
        </tr>
        </thead>
        <tbody>
        </div>
        <?php
      include "koneksi.php";

      if (isset($_GET['id'])) {
        $id=htmlspecialchars($_GET["id"]);

        $sql="DELETE FROM tb_user where id='$id' ";
        $hasil=mysqli_query($conn,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:pegawai.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }

      $sql="SELECT * from tb_user";

      $hasil=mysqli_query($conn,$sql);
      while ($data = mysqli_fetch_array($hasil)) {

          ?>
          <tbody>
          <tr>
              <td><?php echo $data["nama"]; ?></td>
              <td><?php echo $data["password"];   ?></td>
              <td><?php echo $data["email"];   ?></td>
              <td>
                  <a href="update_user.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-warning" role="button">Update</a>
                  <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id=<?php echo $data['id']; ?>" class="btn btn-danger" role="button">Delete</a>
              </td>
          </tr>
          </tbody>
          <?php
      }
      ?>
  </table>
  </section>

        </tbody>
    </table>
<footer>Created by : Kelompok 6 :Muhammad Hadiyan Rakhmadi 23552011361, Muhammad Azka 22552011, Raffles Figo Tristan Siahan(x), Muhammad Lutfi(x), Mukhlis Nurdin Khoerudin(x) 222 CNS</a> | &copy; 2025. </footer>
    <script>
        feather.replace()
    </script>
</body>
</html>