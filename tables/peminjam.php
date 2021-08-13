<?php 
session_start();

if (!isset($_SESSION["login"]) ) {
  header("location: login.php");
  exit;
}
require '../functions.php';
$pjm = query("SELECT * FROM peminjaman");
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../tables/styles/peminjam.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous"> 
    <title>Daftar Peminjam</title>
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
                      <h1>Daftar Peminjam</h1>
                      <a href="../tambahPin.php" class="btn tambah">Tambah Peminjam</a>
                      <br>
                        <table border="1" cellpadding="10" cellspacing="0">
                            <tr>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Nama Peminjam</th>
                            <th>Judul</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>     
                            </tr>
                            <?php $i = 1; ?>
                            <?php foreach ($pjm as $row) : ?>
                            <tr>
                                    <td><?= $i; ?></td>
                                    <td>
                                    <a href="../ubahPjm.php?idPeminjam=<?= $row["idPeminjam"]; ?>" class="btn ubah">Ubah</a> | 
                                    <a href="../hapusPjm.php?idPeminjam=<?= $row["idPeminjam"]; ?>" onclick="return confirm('Yakin Mau Dihapus?');" class="btn hapus">Hapus</a>
                                    </td>
                                    <td><?= $row["namaPeminjam"]; ?></td>
                                    <td><?= $row["judul"]; ?></td>
                                    <td><?= $row["tglPinjam"]; ?></td>
                                    <td><?= $row["tglKembali"]; ?></td>
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