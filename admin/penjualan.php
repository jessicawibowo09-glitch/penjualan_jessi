<?php 


include 'header.php'; 
include '../koneksi.php'; 
?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Data Penjualan</h4>
        </div>
        <div class="panel-body">

            <a href="penjualan_tambah.php" class="btn btn-sm btn-info pull-right">TAMBAH</a>
            <br><br>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Tanggal Jual</th>
                        <th>Nama Kasir</th>
                        <th>Nama Barang</th>
                        <th>Harga Jual</th>
                        <th>Total Harga</th>
                        <th width="200">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $query = mysqli_query($koneksi,"
                    SELECT penjualan.*, user.user_nama, barang.nama_barang, barang.harga_jual
                    FROM penjualan
                    JOIN user ON penjualan.user_id = user.user_id
                    JOIN barang ON penjualan.id_barang = barang.id_barang
                    ORDER BY penjualan.id_jual DESC
                ");
                
                if(mysqli_num_rows($query) == 0) {
                    echo '<tr><td colspan="7" class="text-center">Belum ada data penjualan</td></tr>';
                } else {
                    $no = 1;
                    while($d = mysqli_fetch_assoc($query)){
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= date('d-m-Y', strtotime($d['tgl_jual'])); ?></td>
                    <td><?= htmlspecialchars($d['user_nama']); ?></td>
                    <td><?= htmlspecialchars($d['nama_barang']); ?></td>
                    <td>Rp <?= number_format($d['harga_jual'], 0, ',', '.'); ?></td>
                    <td>Rp <?= number_format($d['total_harga'], 0, ',', '.'); ?></td>
                    <td>
                        <a href="penjualan_invoice.php?id=<?= intval($d['id_jual']); ?>" 
                           class="btn btn-sm btn-warning">Invoice</a>
                        <a href="penjualan_edit.php?id=<?= intval($d['id_jual']); ?>" 
                           class="btn btn-sm btn-info">Edit</a>
                        <a href="penjualan_hapus.php?id=<?= intval($d['id_jual']); ?>" 
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>           
                    </td>
                </tr>
                <?php 
                    }
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?php include 'footer.php'; ?>