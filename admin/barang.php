<?php 
    include 'header.php';
?>

<div class="container">
    <div class="panel">

        <div class="panel-heading">
            <h4 class="text-center" style="font-weight:bold;">Data Barang</h4>
        </div>

        <div class="panel-body">

            <a href="barang_tambah.php" class="btn btn-sm btn-info pull-right" style="margin-bottom:10px;">
                + Tambah Barang
            </a>

            <table class="table table-bordered table-striped table-hover">
                <thead class="bg-light">
                    <tr>
                        <th width="5%">Id</th>
                        <th>Nama Barang</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th width="15%">Opsi</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                    include '../koneksi.php';
                   
                    $data = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY id_barang DESC");
                    $no = 1;

                    while ($d = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['nama_barang']; ?></td>
                        <td>Rp <?php echo number_format($d['harga_beli']); ?></td>
                        <td>Rp <?php echo number_format($d['harga_jual']); ?></td>
                        <td><?php echo $d['stok']; ?></td>

                        <td>
                            <a href="barang_edit.php?id=<?php echo $d['id_barang']; ?>" 
                               class="btn btn-sm btn-info">
                               Edit
                            </a>

                            <a href="barang_hapus.php?id=<?php echo $d['id_barang']; ?>" 
                               onclick="return confirm('Yakin hapus barang ini?');"
                               class="btn btn-sm btn-danger">
                               Hapus
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?php
include 'footer.php';
?>
