<?php 

// menghubungkan dengan koneksi
include '../koneksi.php';

// menangkap data dari form
$username    = $_POST['username'];
$password    = $_POST['password'];
$user_nama   = $_POST['user_nama'];
$user_status = $_POST['user_status'];

// input data ke tabel user
mysqli_query($koneksi, "INSERT INTO user VALUES(
    '',
    '$username',
    '$password',
    '$user_nama',
    '$user_status'
)");

echo "<script>alert('Data User Tersimpan'); window.location.href='user.php'</script>";

?>