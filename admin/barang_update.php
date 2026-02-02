<?php
include '../koneksi.php';

// Ambil data dari form
$id_barang   = $_POST['id_barang'];    // hidden input di form edit
$nama_barang = $_POST['nama_barang'];
$harga_beli  = $_POST['harga_beli'];
$harga_jual  = $_POST['harga_jual'];
$stok        = $_POST['stok'];

// Query update
$update = mysqli_query($koneksi, "
    UPDATE barang SET 
        nama_barang = '$nama_barang',
        harga_beli  = '$harga_beli',
        harga_jual  = '$harga_jual',
        stok        = '$stok'
    WHERE id_barang = '$id_barang'
");

// Cek apakah berhasil
if($update){
    echo "<script>
            alert('Perubahan Data Barang Berhasil ');
            window.location.href = 'index.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal mengubah data barang ');
            window.location.href = 'barang_edit.php?id=$id_barang';
          </script>";
}
?>

