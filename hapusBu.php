<?php 
session_start();

if (!isset($_SESSION["login"]) ) {
  header("location: login.php");
  exit;
}
require 'functions.php';

$idbuku = $_GET["idbuku"];

if (delete2($idbuku) > 0) {
	echo "
		<script>
			alert('Data Berhasil Dihapus')
			document.location.href = 'index.php'
		</script>
	";
} else {
	echo "
		<script>
			alert('Data Gagal Dihapus')
			document.location.href = 'index.php'
		</script>
	";
}

?>