<?php
include '../koneksi.php';

// Tangkap ID dari URL
$id = $_GET['id'];

// Hapus data dari tabel user
mysqli_query($koneksi, "DELETE FROM user WHERE user_id='$id'");

// Setelah berhasil, kembali ke halaman user
echo "<script>
        alert('User berhasil dihapus');
        window.location.href = 'user.php';
      </script>";
?>