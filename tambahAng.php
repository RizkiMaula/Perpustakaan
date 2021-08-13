<?php 
session_start();

if (!isset($_SESSION["login"]) ) {
  header("location: login.php");
  exit;
}

require 'functions.php';
//cek apa udah dipencet tombul submit 
if (isset($_POST["submit"]) ) {

	# cek apa udah berhasil ditambah
	if (tambah1 ($_POST) > 0) {
		
		echo "
			<script>
				alert ('data berhasil ditambah')
				document.location.href = '../tugas/tables/anggota.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert ('data gagal ditambah')
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
    <title>Tambah Anggota</title>
    <link rel="stylesheet" href="../tugas/css/forms.css">
</head>
<body>
<div class="container">
               <div class="title"> Tambah Anggota </div> 
            <form action="" method="post">
                <div class="ctr">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Nama: </span>
                            <input type="text " name="nama" id="nama" placeholder="Masukkan Nama" required>
                        </div>
    
                        <div class="input-box">
                            <span class="details">Email: </span>
                            <input type="text" name="email" id="email" placeholder="Masukkan Email" required>
                        </div>
    
                        <div class="input-box">
                            <span class="details">Alamat: </span>
                            <input type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat" required> <br> <br>
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