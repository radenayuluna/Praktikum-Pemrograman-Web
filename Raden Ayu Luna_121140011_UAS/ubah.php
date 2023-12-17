<?php
include 'koneksi_database.php';
if(!isset($_SESSION['admin'])){
    header("location:login.php");
}
$id = $_GET['id'];
$barang = mysqli_query($db,"SELECT * FROM barang where id = '$id'");
$data = mysqli_fetch_array($barang);
if (isset($_POST['kirim'])) {
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $deskripsi = $_POST['deskripsi'];
    
    mysqli_query($db,"UPDATE barang set nama_barang = '$nama_barang', harga = '$harga', stok = '$stok', tanggal_masuk = '$tanggal_masuk', deskripsi = '$deskripsi' where id = '$id'");

    echo"<script>alert('ubah data berhasil'); document.location = 'barang.php';</script>";
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
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <section class="container">
        <div class="cont">
            <h1>Ubah Barang</h1>
            <form method="post" enctype="multipart/form-data">
                <table class="tabel">
                    <tr>
                        <td class="label">
                            <label for="nama_barang">Nama Barang</label>
                        </td>
                        <td class="input">
                            <input type="text" name="nama_barang" id="nama_barang" value="<?= $data['nama_barang'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="harga">Harga</label>
                        </td>
                        <td>
                            <input type="number" name="harga" id="harga" value="<?= $data['harga'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="stok">Stok</label>
                        </td>
                        <td>
                            <input type="number" name="stok" id="stok" value="<?= $data['stok'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="tanggal_masuk">Tanggal Masuk</label>
                        </td>
                        <td>
                            <input type="date" name="tanggal_masuk" id="tanggal_masuk" value="<?= $data['tanggal_masuk'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="deskripsi">Deskripsi</label>
                        </td>
                        <td>
                            <textarea name="deskripsi" id="deskripsi" rows="10"><?= $data['deskripsi'] ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="kirim">
                                <input type="submit" name="kirim" value="Kirim" class="btn_blue">
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </section>
    <footer>
        <div class="container">
            &copy; 2023 Inventory Luna. All rights reserved.
        </div>
    </footer>
</body>
</html>