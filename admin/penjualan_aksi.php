<?php
session_start();
include '../koneksi.php';

$id_barang = $_POST['id_barang'];
$tgl_jual  = $_POST['tgl_jual'];
$user_id   = $_POST['user_id'];
$jumlah    = $_POST['jumlah'];

// ambil data barang
$q = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang='$id_barang'");
$b = mysqli_fetch_assoc($q);

if (!$b) {
    echo "<script>alert('Barang tidak ditemukan');history.back();</script>";
    exit;
}

$harga = $b['harga_jual'];
$stok  = $b['stok'];

// cek stok
if ($jumlah > $stok) {
    echo "<script>alert('Stok tidak cukup!');history.back();</script>";
    exit;
}

$total_harga = $harga * $jumlah;

// simpan ke tabel penjualan (⚠️ TAMBAH kolom jumlah)
$simpan = mysqli_query($koneksi, "
    INSERT INTO penjualan (id_barang, user_id, tgl_jual, total_harga,jumlah)
    VALUES ('$id_barang', '$user_id', '$tgl_jual', '$total_harga','$jumlah')
");

if (!$simpan) {
    echo "Gagal simpan penjualan: " . mysqli_error($koneksi);
    exit;
}

// kurangi stok barang
mysqli_query($koneksi, "
    UPDATE barang 
    SET stok = stok - $jumlah
    WHERE id_barang='$id_barang'
");

echo "<script>alert('Data berhasil disimpan'); window.location='penjualan.php';</script>";
