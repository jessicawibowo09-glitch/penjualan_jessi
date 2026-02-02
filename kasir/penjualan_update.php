<?php
include '../koneksi.php';

// tangkap data dari form
$id_jual    = $_POST['id_jual'];
$id_barang  = $_POST['id_barang'];
$user_id    = $_POST['user_id'];
$tgl_jual   = $_POST['tgl_jual'];
$total      = $_POST['total_harga'];

// update data penjualan
mysqli_query($koneksi, "
	UPDATE penjualan SET 
		id_barang   = '$id_barang',
		user_id     = '$user_id',
		tgl_jual    = '$tgl_jual',
		total_harga = '$total'
	WHERE id_jual = '$id_jual'
");

// redirect
echo "<script>
	alert('Data penjualan berhasil diupdate');
	window.location.href='penjualan.php';
</script>";
?>