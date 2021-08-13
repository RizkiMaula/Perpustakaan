<?php
session_start();

if (!isset($_SESSION["login"]) ) {
  header("location: login.php");
  exit;
}

require 'functions.php';

//ambil data dari URL
$idbuku = $_GET ["idbuku"];

//query buku berdasarkan idbuku
$buku = query("SELECT * FROM buku WHERE idbuku = $idbuku")[0];


//cek apa tombil submit sudah diubah
if (isset($_POST["submit"]) ) {

	# cek apa udah berhasil Ubah
	if (ubahBu ($_POST) > 0) {
		
		echo "
			<script>
				alert ('data berhasil Ubah')
				document.location.href = 'index.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert ('data berhasil Ubah')
				document.location.href = 'index.php'
			</script>
		";
	}
}

if (isset($_POST["batal"])) {
	echo "
	<script>
		document.location.href = 'index.php'
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
    <title>Halaman Ubah Buku</title>
    <link rel="stylesheet" href="../tugas/css/forms.css">
</head>
<body>
<div class="container">
               <div class="title"> Ubah Buku </div>  <br>
             
            <form action="" method="post">
				<input type="hidden" name="idbuku" value="<?= $buku["idbuku"]; ?>">
                <div class="ctr">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="detais">Judul: </span>
                            <input type="text " name="judul" id="judul" placeholder="Masukkan Judul" required value="<?= $buku["judul"]; ?>">
                        </div>
    
                        <div class="input-box">
                            <span class="details">Penerbit: </span>
                            <input type="text" name="penerbit" id="penerbit" placeholder="Masukkan penerbit" required value="<?= $buku["penerbit"]; ?>">
                        </div>
    
                        <div class="input-box">
                            <span class="details">Tahun Terbit: </span>
                            <input type="text" name="tahun_terbit" id="tahun_terbit" placeholder="Masukkan Tahun Terbit" required value="<?= $buku["tahun_terbit"]; ?>">
                        </div>

						<div class="input-box">
                            <span class="details">Penulis: </span>
                            <input type="text" name="penulis" id="penulis" placeholder="Masukkan Penulis" required value="<?= $buku["penulis"]; ?>"> <br> 
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