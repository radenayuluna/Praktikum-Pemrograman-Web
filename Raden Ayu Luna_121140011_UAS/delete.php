<?php
include 'koneksi_database.php';
mysqli_query($db," DELETE FROM barang WHERE id = '$_GET[id]'");
echo"<script>alert('hapus data berhasil'); document.location = 'barang.php';</script>";
?>