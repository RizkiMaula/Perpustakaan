<?php 
//connection to database
$conn = mysqli_connect("localhost", "root", "", "perpustakaan");

//buat jalanin query
function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

// insert anggota
function tambah1($data1) {
	global $conn;
	$nama = htmlspecialchars($data1["nama"]);
	$email = htmlspecialchars($data1["email"]);
	$alamat = htmlspecialchars($data1["alamat"]);

	$query ="INSERT INTO anggota VALUES ('', '$nama', '$email', '$alamat')";
	mysqli_query ($conn, $query);
	return mysqli_affected_rows($conn);
}

//delete anggota
function delete1($idanggota) {
	global $conn;
	mysqli_query ($conn, "DELETE FROM anggota WHERE idanggota = $idanggota");
	return mysqli_affected_rows($conn);
}

//update anggota
function ubahAng($data1) {
	global $conn;
	$idanggota = $data1["idanggota"];
	$nama = htmlspecialchars($data1["nama"]);
	$email = htmlspecialchars($data1["email"]);
	$alamat = htmlspecialchars($data1["alamat"]);

	$query ="UPDATE anggota SET
				nama  ='$nama', 
				email = '$email',
				alamat = '$alamat'
				WHERE idanggota = '$idanggota'
				 ";
	mysqli_query ($conn, $query);
	return mysqli_affected_rows($conn);
}

#insert buku
function tambah2($data2) {
	global $conn;
	$judul = htmlspecialchars($data2["judul"]);
	$penerbit = htmlspecialchars($data2["penerbit"]);
	$tahun_terbit = htmlspecialchars($data2["tahun_terbit"]);
	$penulis = htmlspecialchars($data2["penulis"]);

	$query ="INSERT INTO buku VALUES ('', '$judul', '$penerbit', '$tahun_terbit', '$penulis')";
	mysqli_query ($conn, $query);
	return mysqli_affected_rows($conn);
}
//delete buku
function delete2($idbuku) {
	global $conn;
	mysqli_query ($conn, "DELETE FROM buku WHERE `buku`.`idbuku` = $idbuku");
	return mysqli_affected_rows($conn);
}

//update buku
function ubahBu($data2) {
	global $conn;
	$idbuku = $data2["idbuku"];
	$judul = htmlspecialchars($data2["judul"]);
	$penerbit = htmlspecialchars($data2["penerbit"]);
	$tahun_terbit = htmlspecialchars($data2["tahun_terbit"]);
	$penulis = htmlspecialchars($data2["penulis"]);

	$query ="UPDATE buku SET
				judul = '$judul',
				penerbit = '$penerbit',
				tahun_terbit = '$tahun_terbit',
				penulis = '$penulis'
				WHERE idbuku = '$idbuku'
				 ";
	mysqli_query ($conn, $query);
	return mysqli_affected_rows($conn);
}

// insert peminjaman
function tambah3($data3) {
	global $conn;
	$namaPeminjam = htmlspecialchars($data3["namaPeminjam"]);
	$judul = htmlspecialchars($data3["judul"]);
	$tglPinjam = htmlspecialchars($data3["tglPinjam"]);
	$tglKembali = htmlspecialchars($data3["tglKembali"]);

	$query ="INSERT INTO peminjaman VALUES ('', '$namaPeminjam', '$judul', '$tglPinjam', '$tglKembali')";
	mysqli_query ($conn, $query);
	return mysqli_affected_rows($conn);
}

function delete3 ($idPeminjam) {
	global $conn;
	mysqli_query($conn, "DELETE FROM peminjaman WHERE idPeminjam = $idPeminjam");
	return mysqli_affected_rows($conn);
}

function ubahPjm ($pjm) {
	global $conn;
	$idPeminjam = ($pjm["idPeminjam"]);
	$namaPeminjam = htmlspecialchars($pjm["namaPeminjam"]);
	$judul = htmlspecialchars($pjm["judul"]);
	$tglPinjam = htmlspecialchars($pjm["tglPinjam"]);
	$tglKembali = htmlspecialchars($pjm["tglKembali"]);

	$query ="UPDATE peminjaman SET
				namaPeminjam = '$namaPeminjam',
				judul = '$judul',
				tglPinjam = '$tglPinjam',
				tglKembali = '$tglKembali'
				WHERE idPeminjam = $idPeminjam
				";
	mysqli_query ($conn, $query);
	return mysqli_affected_rows($conn);
}

function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);


	//username usah ada apa belom
	$result = mysqli_query($conn, "SELECT username FROM users WHERE username= '$username'");
	
	if (mysqli_fetch_assoc($result)) {
		echo"<script>
				alert('username sudah terdaftar')
			 </script>";
		return false;
	}

	//cek konfirmasi password
	if ($password !== $password2) {
		echo "<script>
				alert('konfirmasi password tidak sesuai');
			  </script>"; 
		return false;
	} 

	//enkripsi password
	 $password = password_hash($password, PASSWORD_DEFAULT);

	//tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password')");

	return mysqli_affected_rows($conn);

}







?>