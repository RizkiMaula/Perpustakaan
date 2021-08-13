<?php 
session_start();

if (!isset($_SESSION["login"]) ) {
  header("location: login.php");
  exit;
}

require 'functions.php';

//ambil data dari url
$idanggota = $_GET["idanggota"];

//query mahasiswa berdasarkan id
$ang = query("SELECT * FROM anggota WHERE idanggota = {$idanggota}")[0];




//cek apa udah berhasil ditekan
if (isset($_POST["submit"]) ) {

	# cek apa udah berhasil ditambah
	if (ubahAng ($_POST) > 0) {
		
		echo "
			<script>
				alert ('data berhasil diubah')
				document.location.href = '../tugas/tables/anggota.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert ('data gagal diubah')
				document.location.href = '../tugas/tables/anggota.php'
			</script>
		";
	}
}

if (isset($_POST["batal"])) {
	echo "
	<script>
		document.location.href = '../tugas/tables/anggota.php'
	</script>
	";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Ubah Anggota</title>
    <link rel="stylesheet" href="../tugas/css/forms.css">
</head>
<body>
<div class="container">
               <div class="title"> Ubah Anggota </div>  <br>
            <form action="" method="post">
				<input type="hidden" name="idanggota" value="<?= $ang["idanggota"]; ?>">
                <div class="ctr">
                    <div class="user-details">
                        <div class="input-box">
                            <label class="detais">Nama: </label>
                            <input type="text " name="nama" id="nama" placeholder="Masukkan Nama" required value="<?=$ang["nama"]; ?>">
                        </div>
    
                        <div class="input-box">
                            <label class="details">Email: </label>
                            <input type="text" name="email" id="email" placeholder="Masukkan Email" required value="<?= $ang["email"]; ?>">
                        </div>
    
                        <div class="input-box">
                            <label class="details">Alamat: </label>
                            <input type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat" required value="<?= $ang["alamat"]; ?>"> <br> <br>
                        </div>
    
                </div>

                    <div class="button">
                        <button type="submit" name="submit">Ubah Data</button> 
                        <button type="submit" name="batal">batal</button>
                    </div>
                           
                </div>
            </form>
</div>
    
</body>
</html>