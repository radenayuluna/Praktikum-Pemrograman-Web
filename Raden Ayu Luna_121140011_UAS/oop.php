<?php
class barang {
    public $koneksi;
    public function __construct($koneksi) {
        $this->koneksi = $koneksi;
    }

    public function create($data) {
        mysqli_query($this->koneksi,"INSERT INTO barang VALUES ('','$data[nama_barang]','$data[harga]','$data[stok]','$data[tanggal_masuk]','$data[deskripsi]')");
        return 1;
    }
    public function read($id) {
        $barang = mysqli_query($this->koneksi,"SELECT * FROM barang WHERE id = '$id'");
        $data = mysqli_fetch_array($barang);
        return $data;
    }
}
