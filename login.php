<?php
session_start();
require 'functions.php';

//cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    //cek cookie dan username
    if ( $key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;

    }

}

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}



if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    //cek username
    if (mysqli_num_rows($result) === 1 ) {
        
        //cek password 
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"]) ) {
            //set session
            $_SESSION["login"] = true;

            //cek remember me
            if (isset($_POST['remember'])) {
                # buat cookie
                setcookie('id', $row['id'], time() + 60 );
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }


            header("location: index.php");
            exit;
        }
    }

    $error = true;

}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/eca6a57b91.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../tugas/css/login.css">

    <title>Login</title>
  </head>
  <body>
    
    <div class="container">
        <h4 class="text-center">Login E-libs</h4>
        <hr>
        <?php if (isset($error)) : ?>
          <p> Username/Password Salah </p>
        <?php endif; ?>
        <form action="" method="post">
            <div class="form-group">
                <i class="fas fa-user"></i>
                <label for="">Username</label>
                     <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username">
            </div>

            <div class="form-group">
                <i class="fas fa-unlock-alt"></i>
                <label for="">password</label>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password">
            </div>
            
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" checked>
            <label class="form-check-label" for="remember">
                Remember Me
            </label>
            </div>

            <br>
            <button type="submit" class="btn btn-primary" name="login">Masuk</button>
            <button type="reset" class="btn btn-danger">Reset</button> <br>
            <h6>Belum Terdaftar? <a href="registrasi.php">Klik Disini</a></h6>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>