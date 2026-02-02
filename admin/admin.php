<?php
    include 'header.php';
    include '../koneksi.php';
?>

<style>
    .panel-modern {
        background: #fdceceff;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        margin-top: 20px;
    }
    .table thead th {
        background: #a3c4f5ff;
        color: white;
        text-align: center;
    }
</style>

<div class="container">

    <div class="alert alert-primary text-center mt-3">
        <h4 style="margin-bottom: 0;">
            <b>Selamat Datang!</b> Sistem Informasi Penjualan RPL Skanega
        </h4>
    </div>

    <div class="panel-modern">
        <h4 class="mb-3 text-primary">
            <i class="bi bi-cart-check"></i> <b>Riwayat Penjualan Terbaru</b>
        </h4>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Kasir</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>

                <tbody>
                <?php

                   $query = "
                       SELECT 
                           penjualan.*,
                           user.user_nama,
                           barang.nama_barang
                       FROM penjualan
                       LEFT JOIN user 
                           ON penjualan.user_id = user.user_id
                       LEFT JOIN barang 
                           ON penjualan.id_barang = barang.id_barang
                       ORDER BY penjualan.id_jual DESC
                       LIMIT 10
                   ";

                    $data = mysqli_query($koneksi, $query);
                    $no = 1;

                    while ($d = mysqli_fetch_array($data)) {
                ?>

                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= $d['user_nama']; ?></td>
                        <td><?= $d['nama_barang']; ?></td>
                        <td class="text-center"><?= $d['jumlah_jual']; ?></td>
                        <td class="text-right">Rp <?= number_format($d['harga_barang']); ?></td>
                        <td class="text-right">
                            <b>Rp <?= number_format($d['total_harga']); ?></b>
                        </td>
                        <td class="text-center">
                            <?= date('d-m-Y', strtotime($d['tgl_jual'])); ?>
                        </td>
                    </tr>

                <?php } ?>
                </tbody>

            </table>
        </div>

    </div>
</div>