<?php  
session_start();

if (!isset($_SESSION["login"]) ) {
  header("location: login.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../tugas/css/index.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous"> 
    <title>Dashboard</title>
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
            <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="../tugas/tables/anggota.php"><i class="fas fa-users"></i>Data Anggota</a></li>
            <li><a href="../tugas/tables/buku.php"><i class="fas fa-book"></i>Data Buku</a></li>
            <li><a href="../tugas/tables/peminjam.php"><i class="fas fa-plus"></i>Data Peminjam</a></li>
            <li><a href="logout.php"><i class="fas fa-power-off"></i>Sign Out</a></li>
        </ul>
    </div>

            <section>
                <div class="container">
                    <div class="card box" id="users">
                        <i class="fas fa-users"></i>
                        <h1>Anggota </h1>
                        <p> Anggota berasal dari jenis masyarakat yang ingin belajar</p> 
                    </div>

                    <div class="card box" id="book">
                        <i class="fas fa-book"></i>
                        <h1>Buku</h1>
                        <p>Buku disini bermacam-macan dan menarik untuk dibaca</p>
                    </div>

                    <div class="card box" id="peminjam">
                        <i class="fas fa-plus"></i>
                        <h1>Peminjam</h1>
                        <p>peminjam hanya diizinkan meminjam perorang hanya satu</p>
                    </div>
                </div>
            </section>              

</body>
</html>