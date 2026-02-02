<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'header.php';
include '../koneksi.php';
?>

<style>
body{
    background: linear-gradient(135deg,#ffe6f2,#fff);
    font-family: 'Poppins', sans-serif;
}

/* CARD */
.card-dashboard{
    background:#fff;
    border-radius:18px;
    padding:25px;
    box-shadow:0 8px 20px rgba(255,105,180,.25);
    border:2px solid #ffb6c1;
    margin-bottom:25px;
}

.card-dashboard h3{
    font-weight:700;
    color:#ff4d88;
}

/* STAT */
.stat-box{
    border-radius:16px;
    padding:25px;
    color:#fff;
    box-shadow:0 6px 15px rgba(0,0,0,.15);
}

.bg-pink{background:linear-gradient(135deg,#ff69b4,#ff85c2);}
.bg-purple{background:linear-gradient(135deg,#b983ff,#d0b3ff);}
.bg-orange{background:linear-gradient(135deg,#ff9f43,#ffc27a);}

.stat-box h1{
    font-size:40px;
    margin:0;
    font-weight:700;
}

/* TABLE */
.table thead{
    background:#ffb6c1;
    color:#fff;
}

.badge-invoice{
    background:#ff69b4;
}
</style>

<div class="container mt-4">

    <!-- HEADER -->
    <div class="card-dashboard text-center">
        <h3>💖 Sistem Informasi Penjualan</h3>
        <p class="mb-0">Dashboard Kasir</p>
    </div>

    <!-- STATISTIK -->
    <div class="row text-center">

        <div class="col-md-4">
            <div class="stat-box bg-pink">
                <h1>
                    <?php
                    $barang = mysqli_query($koneksi,"SELECT * FROM barang");
                    echo mysqli_num_rows($barang);
                    ?>
                </h1>
                <p>Total Barang</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-box bg-purple">
                <h1>
                    <?php
                    $jual = mysqli_query($koneksi,"SELECT * FROM penjualan");
                    echo mysqli_num_rows($jual);
                    ?>
                </h1>
                <p>Total Transaksi</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-box bg-orange">
                <h1>
                    <?php
                    $user = mysqli_query($koneksi,"SELECT * FROM `user`");
                    echo mysqli_num_rows($user);
                    ?>
                </h1>
                <p>Total User</p>
            </div>
        </div>

    </div>

    <!-- RIWAYAT PENJUALAN -->
    <div class="card-dashboard mt-4">
        <h4 style="color:#ff4d88;font-weight:700;">🧾 Riwayat Penjualan Terakhir</h4>

        <table class="table table-bordered table-hover text-center align-middle mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Invoice</th>
                    <th>Tanggal</th>
                    <th>Nama Barang</th>
                    <th>Kasir</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $sql = "
                SELECT p.*, b.nama_barang, u.user_nama
                FROM penjualan p
                JOIN barang b ON p.id_barang = b.id_barang
                JOIN `user` u ON p.user_id = u.user_id
                ORDER BY p.id_jual DESC
                LIMIT 10
            ";

            $query = mysqli_query($koneksi,$sql);

            if($query){
                $no = 1;
                while($d = mysqli_fetch_assoc($query)){
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><span class="badge badge-invoice"><?= $d['id_jual']; ?></span></td>
                    <td><?= $d['tgl_jual']; ?></td>
                    <td><?= $d['nama_barang']; ?></td>
                    <td><?= $d['user_nama']; ?></td>
                    <td>Rp <?= number_format($d['total_harga']); ?></td>
                </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='6'>Data penjualan belum ada</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>

</div>

<?php
include 'footer.php';
?>




