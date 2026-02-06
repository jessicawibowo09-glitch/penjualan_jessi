<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']); 


$data = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
$user = mysqli_fetch_assoc($data);

if ($user) {

    
    $_SESSION['username'] = $user['username'];
    $_SESSION['status'] = "login";
    $_SESSION['user_status'] = $user['user_status']; 

    
    if ($user['user_status'] == 1) {
        
        header("Location: admin/index.php");
        exit;
    } else if ($user['user_status'] == 2) {
        
        header("Location: kasir/index_kasir.php");
        exit;
    }

} else {
    
    header("Location: index.php?pesan=gagal");
    exit;
}
?>