<?php 
session_start();

if (!isset($_SESSION["login"]) ) {
  header("location: ../login.php");
  exit;
}

require '../functions.php';
$anggota = query("SELECT * FROM anggota");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../tables/styles/anggota.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous"> 
    <title>Data Anggota</title>
</head>
<body>
    <input type="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
        <header>E-Libs</header>
        <ul>
            <li><a href="../index.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="anggota.php"><i class="fas fa-users"></i>Data Anggota</a></li>
            <li><a href="buku.php"><i class="fas fa-book"></i>Data Buku</a></li>
            <li><a href="peminjam.php"><i class="fas fa-plus"></i>Data Peminjam</a></li>
            <li><a href="../logout.php"><i class="fas fa-power-off"></i>Sign Out</a></li>
        </ul>
    </div>

            <section>
                <div class="container">
                    <div class="box">
                        <h1>Daftar Anggota</h1>
                        <a href="../tambahAng.php" class="btn tambah ">Tambah Anggota</a>
                        <br>
                        <table border="1" cellpadding="10" cellspacing="0">
                          <tr>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Alamat</th>     
                          </tr>
                           <?php $i = 1; ?>
                          <?php foreach ($anggota as $row) : ?> 
                            <tr>
                                  <td><?= $i; ?></td>
                                  <td>
                                    <a href="../ubahAng.php?idanggota=<?= $row["idanggota"]; ?>" class= "btn ubah">Ubah</a> | 
                                    <a href="../hapusAng.php?idanggota=<?= $row["idanggota"]; ?>" onclick = "return confirm('yakin mau dihapus?')" class= "btn hapus">Hapus</a>
                                  </td>
                                  <td><?= $row["nama"]; ?></td>
                                  <td><?= $row["email"]; ?></td>
                                  <td><?= $row["alamat"]; ?></td>
                            </tr>
                          <?php $i++; ?>
                          <?php endforeach; ?> 
                          <br>
                        </table>
                    </div>
                </div>
            </section>              

</body>
</html>