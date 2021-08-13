<?php 
session_start();

if (!isset($_SESSION["login"]) ) {
  header("location: login.php");
  exit;
}

require '../functions.php';
$buku = query("SELECT * FROM buku");
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../tables/styles/buku.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous"> 
    <title>Data Buku</title>
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
                    <h1>Daftar Buku</h1>
                        <a href="../tambahBu.php" class= "btn tambah">Tambah Buku</a>
                        <br><br>
                        <table border="1" cellpadding="10" cellspacing="0">
                        <tr>
                        <th>No</th>
                        <th>Aksi</th>
                        <th>Judul</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Penulis</th>     
                        </tr>
                        <?php $i = 1; ?>
                        <?php foreach ($buku as $row) : ?>
                        <tr>
                                <td><?= $i; ?></td>
                                <td>
                                <a href="../ubahBu.php?idbuku=<?= $row["idbuku"]; ?>" class= "btn ubah">Ubah</a> | 
                                <a href="../hapusBu.php?idbuku=<?= $row["idbuku"]; ?>" onclick = "return confirm('yakin mau dihapus?')" class= "btn hapus">Hapus</a>
                                </td>
                                <td><?= $row["judul"]; ?></td>
                                <td><?= $row["penerbit"]; ?></td>
                                <td><?= $row["tahun_terbit"]; ?></td>
                                <td><?= $row["penulis"]; ?></td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </section>              

</body>
</html>