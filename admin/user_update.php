<?php
include '../koneksi.php';

// Menangkap data dari form
$id         = $_POST['user_id'];
$username   = $_POST['username'];
$password   = $_POST['password'];
$nama       = $_POST['user_nama'];
$status     = $_POST['user_status'];

// Query update
mysqli_query($koneksi, "UPDATE user SET 
    username='$username',
    password='$password',
    user_nama='$nama',
    user_status='$status'
    WHERE user_id='$id'
");

// Setelah update, kembali ke halaman user dengan alert
echo "<script>
        alert('Perubahan Data User Berhasil Disimpan');
        window.location.href = 'user.php';
      </script>";
?>