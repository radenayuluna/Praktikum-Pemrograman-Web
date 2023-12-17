<?php
include 'koneksi_database.php';
include 'oop.php';
if(!isset($_SESSION['admin'])){
    header("location:login.php");
}
$id = $_GET['id'];
$lihat = new barang($db);
$data = $lihat->read($id);


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
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <section class="container">
        <div class="cont">
            <h1>Lihat Barang</h1>
                <table class="tabel">
                    <tr>
                        <td class="label">
                            <label for="nama_barang">Nama Barang</label>
                        </td>
                        <td class="input">
                            <input type="text" name="nama_barang" id="nama_barang" value="<?= $data['nama_barang'] ?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="harga">Harga</label>
                        </td>
                        <td>
                            <input type="number" name="harga" id="harga" value="<?= $data['harga'] ?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="stok">Stok</label>
                        </td>
                        <td>
                            <input type="number" name="stok" id="stok" value="<?= $data['stok'] ?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="tanggal_masuk">Tanggal Masuk</label>
                        </td>
                        <td>
                            <input type="date" name="tanggal_masuk" id="tanggal_masuk" value="<?= $data['tanggal_masuk'] ?>" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="deskripsi">Deskripsi</label>
                        </td>
                        <td>
                            <textarea name="deskripsi" id="deskripsi" rows="10" disabled><?= $data['deskripsi'] ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="kirim">
                                <a href="barang.php" class="btn_blue" style="background: grey;">Back</a>
                            </div>
                        </td>
                    </tr>
                </table>
        </div>
    </section>
    <footer>
        <div class="container">
            &copy; 2023 Inventory Luna. All rights reserved.
        </div>
    </footer>
</body>
</html>