<?php
include '../koneksi.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {

    $id = $_GET['id']; // id_jual (integer)

    // Prepared statement hapus penjualan
    $stmt = mysqli_prepare($koneksi, "DELETE FROM penjualan WHERE id_jual = ?");
    if(!$stmt){
        die("Prepare statement gagal: ".mysqli_error($koneksi));
    }

    mysqli_stmt_bind_param($stmt, "i", $id); // i = integer
    $execute = mysqli_stmt_execute($stmt);

    if($execute){
        echo "<script>
                alert('Penjualan berhasil dihapus');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus penjualan');
                window.location.href = 'index.php';
              </script>";
    }

    mysqli_stmt_close($stmt);

} else {
    echo "<script>
            alert('ID penjualan tidak ditemukan');
            window.location.href = 'index.php';
          </script>";
}
?>
