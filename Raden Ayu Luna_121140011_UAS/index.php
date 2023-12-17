<?php
include 'koneksi_database.php';
if(!isset($_SESSION['admin'])){
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.jpg" type="image/png">
    <link rel="stylesheet" href="css/style.css">
    <title>Perpustakaan</title>
</head>
<body>
    <header>
        <div class="container header">
            <div class="logo">
                <img src="img/logo.jpg" alt="ini logo">
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="barang.php">Daftar Barang</a>
                    </li>
                    <?php
                    if (isset($_SESSION['admin'])) {
                    ?>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                    <?php
                    }else{
                    ?>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </header>
    <section class="container">
        <div class="conten">
            <div class="desc">
            <h1>Selamat Datang Admin</h1>
            <h1>Dan Selamat Bekerja</h1>
            </div>
            <div class="my_img">
                <img src="img/foto.jpg" alt="foto saya">
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            &copy; 2023 Inventory Luna. All rights reserved.
        </div>
    </footer>
</body>
</html>