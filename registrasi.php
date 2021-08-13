<?php 
require 'functions.php';

if (isset ($_POST["register"]) ) {

    if (registrasi($_POST) > 0 ) {
        echo " <script>
                alert('user baru berhasil ditambah')
                document.location.href = 'login.php'
            </script> ";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <!-- <link rel="stylesheet" href="../css/registrasi.css"> -->
    <link rel="stylesheet" href="../tugas/css/registrasi.css">

</head>
<body>
<div class="container">
               <div class="title"> Registrasi Disini </div> 

            <form action="" method="post">
                <div class="ctr">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="detais">Username: </label>
                            <input type="text " name="username" id="username" placeholder="Masukkan Username" required>
                        </div>
    
                        <div class="input-box">
                            <span class="details">Password: </label>
                            <input type="password" name="password" id="password" placeholder="Masukkan Password" required>
                        </div>
    
                        <div class="input-box">
                            <span class="details">Konfirmasi Password: </label>
                            <input type="password" name="password2" id="password2" placeholder="Konfirmasi Password" required> <br> <br>
                        </div>
    
                </div>

                    <div class="button">
                        <button type="submit" name="register">Sign Up</button> 
                    </div>
                           
                </div>
            </form>
</div>
    
</body>
</html>