<?php
include '../koneksi.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {

    $id = $_GET['id']; // id_barang (integer)

    // Prepared statement hapus barang
    $stmt = mysqli_prepare($koneksi, "DELETE FROM barang WHERE id_barang = ?");
    if(!$stmt){
        die("Prepare statement gagal: ".mysqli_error($koneksi));
    }

    mysqli_stmt_bind_param($stmt, "i", $id); // i = integer
    $execute = mysqli_stmt_execute($stmt);

    if($execute){
        echo "<script>
                alert('Barang berhasil dihapus ');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus barang ');
                window.location.href = 'index.php';
              </script>";
    }

    mysqli_stmt_close($stmt);

} else {
    echo "<script>
            alert('ID barang tidak ditemukan');
            window.location.href = 'index.php';
          </script>";
}
?>
