<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
    exit;
}
include '../koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Struk Penjualan Produk</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
</head>
<body>

<div class="container">
    <div class="col-md-10 col-md-offset-1">

        <?php
        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo "<script>alert('ID penjualan tidak ditemukan');window.history.back();</script>";
            exit;
        }

        // Ambil data penjualan + join user
        $penjualan = mysqli_query(
            $koneksi,
            "SELECT p.*, u.user_nama, u.username
             FROM penjualan p
             JOIN user u ON p.user_id = u.user_id
             WHERE p.id_jual='$id'"
        );

        if(mysqli_num_rows($penjualan) == 0){
            echo "<script>alert('Data penjualan tidak ditemukan');window.history.back();</script>";
            exit;
        }

        $t = mysqli_fetch_assoc($penjualan);
        ?>

        <center><h2>PENJUALAN PRODUK</h2></center>

        <a href="penjualan_invoice_cetak.php?id=<?php echo $id; ?>" 
           target="_blank" 
           class="btn btn-primary pull-right">
           <i class="glyphicon glyphicon-print"></i> CETAK
        </a>

        <br><br>

        <table class="table">
            <tr>
                <th width="20%">No. Invoice</th>
                <th>:</th>
                <td>INV-<?php echo $t['id_jual']; ?></td>
            </tr>
            <tr>
                <th>Tgl. Penjualan</th>
                <th>:</th>
                <td><?php echo $t['tgl_jual']; ?></td>
            </tr>
            <tr>
                <th>Nama Kasir</th>
                <th>:</th>
                <td><?php echo $t['user_nama']; ?> (<?php echo $t['username']; ?>)</td>
            </tr>
            <tr>
                <th>Jumlah Produk</th>
                <th>:</th>
                <td><?php echo $t['jumlah']; ?> item</td>
            </tr>
            <tr>
                <th>Total Harga</th>
                <th>:</th>
                <td><?php echo "Rp. " . number_format($t['total_harga']) . " ,-"; ?></td>
            </tr>
        </table>

        <h4 class="text-center">Daftar Produk</h4>

        <table class="table table-bordered table-striped">
            <tr>
                <th>Nama Produk</th>
                <th width="20%">Jumlah</th>
                <th>Harga Satuan</th>
                <th>Subtotal</th>
            </tr>

            <?php
            $produk = mysqli_query(
                $koneksi,
                "SELECT b.nama_barang, p.jumlah, b.harga_jual
                 FROM penjualan p
                 JOIN barang b ON p.id_barang = b.id_barang
                 WHERE p.id_jual='$id'"
            );

            while ($p = mysqli_fetch_assoc($produk)) {
                $subtotal = $p['jumlah'] * $p['harga_jual'];
            ?>
            <tr>
                <td><?php echo $p['nama_barang']; ?></td>
                <td><?php echo $p['jumlah']; ?></td>
                <td><?php echo "Rp. ".number_format($p['harga_jual']); ?></td>
                <td><?php echo "Rp. ".number_format($subtotal); ?></td>
            </tr>
            <?php } ?>
        </table>

        <p class="text-center">
            <i>"Terima kasih telah membeli produk kami"</i>
        </p>

    </div>
</div>

</body>
</html>