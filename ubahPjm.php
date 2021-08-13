<?php 
session_start();

if (!isset($_SESSION["login"]) ) {
  header("location: login.php");
  exit;
}

require 'functions.php';

//ambil data di url
$idPeminjam = $_GET["idPeminjam"];

// query data berdasarkan idPeminjam
$pjm = query ("SELECT * FROM peminjaman WHERE idPeminjam = $idPeminjam")[0];



//cek apa tombol submit udah ditekan
if (isset($_POST["submit"]) ) {
	

	# cek apa udah berhasil diubah
	if (ubahPjm ($_POST) > 0) {
		
		echo "
			<script>
				alert ('data berhasil diubah')
				document.location.href = 'index.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert ('data gagal diubah')
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
    <title>Halaman Ubah Peminjam</title>
    <link rel="stylesheet" href="../tugas/css/registrasi.css">
</head>
<body>
<div class="container">
               <div class="title"> Ubah Peminjam </div> <br>
            <form action="" method="post">
                <div class="ctr">
                    <div class="user-details">
						<div class="input-box">
							<input type="hidden" name="idPeminjam" value = "<?= $pjm["idPeminjam"]; ?>" >
						</div>
                        <div class="input-box">
                            <span class="detais">Nama Peminjam: </span>
                            <input type="text " name="namaPeminjam" id="namaPeminjam" placeholder="Masukkan Judul" required value="<?= $pjm["namaPeminjam"]; ?>">
                        </div>
    
                        <div class="input-box">
                            <span class="details">Judul: </span>
                            <input type="text" name="judul" id="judul" placeholder="Masukkan penerbit" required value = "<?= $pjm["judul"]; ?>">
                        </div>
    
                        <div class="input-box">
                            <span class="details">Tanggal Pinjam: </span>
                            <input type="date" name="tglPinjam" id="tglPinjam" required value = "<?= $pjm["tglPinjam"]; ?>"> 
                        </div>

						<div class="input-box">
                            <span class="details">Tanggal Kembali: </span>
                            <input type="date" name="tglKembali" id="tglKembali" required value = "<?= $pjm["tglKembali"]; ?>"> <br> <br>
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