<?php 
session_start();

if (!isset($_SESSION["login"]) ) {
  header("location: login.php");
  exit;
}

require 'functions.php';
//cek apa udah berhasil ditambah
if (isset($_POST["submit"]) ) {
	

	# cek apa udah berhasil ditambah
	if (tambah3 ($_POST) > 0) {
		
		echo "
			<script>
				alert ('data berhasil ditambah')
				document.location.href = 'index.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert ('data gagal ditambah')
				document.location.href = 'index.php'
			</script>
		";
	}
}

if (isset($_POST["batal"])) {
	echo "
	<script>
		document.location.href = '../anggota.php'
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
    <title>Halaman Tambah Peminjam</title>
    <link rel="stylesheet" href="../tugas/css/forms.css">
</head>
<body>
<div class="container">
               <div class="title"> Tambah Peminjam </div> <br>
			   <input type="hidden" name="idPeminjam" value = "<?= $pjm["idPeminjam"]; ?>" >
            <form action="" method="post">
                <div class="ctr">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="detais">Nama Peminjam: </span>
                            <input type="text " name="namaPeminjam" id="namaPeminjam" placeholder="Masukkan Judul" required>
                        </div>
    
                        <div class="input-box">
                            <span class="details">Judul: </span>
                            <input type="text" name="judul" id="judul" placeholder="Masukkan penerbit" required>
                        </div>
    
                        <div class="input-box">
                            <span class="details">Tanggal Pinjam: </span>
                            <input type="date" name="tglPinjam" id="tglPinjam" required> 
                        </div>

						<div class="input-box">
                            <span class="details">Tanggal Kembali: </span>
                            <input type="date" name="tglKembali" id="tglKembali" required> <br> <br>
                        </div>
                </div>
                    <div class="button">
                        <button type="submit" name="submit">Tambah Data</button> 
                        <button type="submit" name="batal">batal</button>
                    </div>    
                </div>
            </form>
</div>
    
</body>
</html>