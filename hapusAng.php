<?php 
session_start();

if (!isset($_SESSION["login"]) ) {
  header("location: login.php");
  exit;
}


require 'functions.php';

$idanggota = $_GET["idanggota"];

if (delete1($idanggota) > 0) {
	echo "
		<script>
			alert('Data Berhasil Dihapus')
			document.location.href = '../tugas/tables/anggota.php'
		</script>
	";
} else {
	echo "
		<script>
			alert('Data Gagal Dihapus')
			document.location.href = '../tugas/tables/anggota.php'
		</script>
	";
}

?>