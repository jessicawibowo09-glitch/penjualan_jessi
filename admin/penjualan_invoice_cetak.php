<!DOCTYPE html>
<html>
<head>
<title>Invoice Penjualan</title>

<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
<script type="text/javascript" src="../assets/js/jquery.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.js"></script>

</head>
<body>

<?php 
session_start();
if($_SESSION['status']!="login"){
    header("location:../index.php?pesan=belum_login");
    exit;
}

include '../koneksi.php';

$id = $_GET['id'] ?? null;
if(!$id){
    echo "<script>alert('ID transaksi tidak ditemukan');window.close();</script>";
    exit;
}

// ambil data penjualan + kasir
$transaksi = mysqli_query(
    $koneksi,
    "SELECT p.*, u.user_nama, u.username
     FROM penjualan p
     JOIN user u ON p.user_id = u.user_id
     WHERE p.id_jual='$id'"
);

if(mysqli_num_rows($transaksi)==0){
    echo "<script>alert('Data tidak ditemukan');window.close();</script>";
    exit;
}

$t = mysqli_fetch_assoc($transaksi);
?>

<div class="container">
    <div class="col-md-10 col-md-offset-1">

        <center>
            <h2>TOKO JESSI</h2>
            <h4>INVOICE PENJUALAN</h4>
        </center>

        <h3>INV-<?php echo $t['id_jual']; ?></h3>

        <br>

        <table class="table">
            <tr>
                <th width="20%">Tanggal</th>
                <th>:</th>
                <td><?php echo $t['tgl_jual']; ?></td>
            </tr>
            <tr>
                <th>Kasir</th>
                <th>:</th>
                <td><?php echo $t['user_nama']; ?> (<?php echo $t['username']; ?>)</td>
            </tr>
            <tr>
                <th>Jumlah Item</th>
                <th>:</th>
                <td><?php echo $t['jumlah']; ?> item</td>
            </tr>
            <tr>
                <th>Total Harga</th>
                <th>:</th>
                <td><?php echo "Rp. ".number_format($t['total_harga'])." ,-"; ?></td>
            </tr>
        </table>

        <br>

        <h4>Daftar Produk</h4>
        <table class="table table-bordered table-striped">
            <tr>
                <th>Nama Produk</th>
                <th width="15%">Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
            </tr>

            <?php 
            $produk = mysqli_query(
                $koneksi,
                "SELECT b.nama_barang, b.harga_jual, p.jumlah
                 FROM penjualan p
                 JOIN barang b ON p.id_barang = b.id_barang
                 WHERE p.id_jual='$id'"
            );

            while($p=mysqli_fetch_assoc($produk)){
                $subtotal = $p['jumlah'] * $p['harga_jual'];
            ?>
            <tr>
                <td><?php echo $p['nama_barang']; ?></td>
                <td><?php echo $p['jumlah']; ?></td>
                <td><?php echo "Rp. ".number_format($p['harga_jual']); ?></td>
                <td><?php echo "Rp. ".number_format($subtotal); ?></td>
            </tr>
            <?php } ?>

            <tr>
                <th colspan="3" class="text-right">TOTAL</th>
                <th><?php echo "Rp. ".number_format($t['total_harga']); ?></th>
            </tr>
        </table>

        <br>
        <p class="text-center">
            <i>" Terima kasih telah berbelanja di toko kami "</i>
        </p>

    </div>
</div>

<script type="text/javascript">
    window.print();
</script>

</body>
</html>
