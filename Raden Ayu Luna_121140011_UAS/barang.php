<?php
include 'koneksi_database.php';
if(!isset($_SESSION['admin'])){
    header("location:login.php");
}
$barang = mysqli_query($db,"SELECT * FROM barang ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.jpg" type="image/png">
    <link rel="stylesheet" href="css/style.css">
    <title>Inventory</title>
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
            <h1>Daftar Barang</h1>
            <a href="tambah.php"><input class="btn_green" type="button" value="Tambah"></a>
            <table class="daftar_barang">
                <tr>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Tanggal Masuk</th>
                    <th>Deskripsi</th>
                    <th>action</th>
                </tr>
                <?php foreach ($barang as $value): ?>
                <tr>
                    <td><?php echo $value['nama_barang'] ?></td>
                    <td><?php echo "Rp. ".$value['harga'] ?></td>
                    <td><?php echo $value['stok'] ?></td>
                    <td><?php echo $value['tanggal_masuk'] ?></td>
                    <td><?php echo $value['deskripsi'] ?></td>
                    <td>
                        <a href="ubah.php?id=<?php echo $value['id'] ?>"><input class="btn_blue" type="button" value="Edit"></a>
                        <a href="detail.php?id=<?php echo $value['id'] ?>"><input class="btn_green" type="button" value="Detail"></a>
                        <a href="delete.php?id=<?php echo $value['id'] ?>"><input class="btn_red" type="button" value="Delete"></a>
                    </td>
                </tr>
                <?php endforeach; ?>
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