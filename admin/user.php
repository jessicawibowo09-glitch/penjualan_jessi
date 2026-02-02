<?php 
    include 'header.php';
?>

<div class="container">
    <div class="panel">

        <div class="panel-heading">
            <h4 class="text-center" style="font-weight:bold;">Data User</h4>
        </div>

        <div class="panel-body">

            <a href="user_tambah.php" class="btn btn-sm btn-info pull-right" style="margin-bottom:10px;">
                + Tambah User
            </a>

            <table class="table table-bordered table-striped table-hover">
                <thead class="bg-light">
                    <tr>
                        <th width="5%">No</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th width="15%">Opsi</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                    include '../koneksi.php';
                    $data = mysqli_query($koneksi, "SELECT * FROM user ORDER BY user_id DESC");
                    $no = 1;

                    while ($d = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['username']; ?></td>
                        <td>••••••</td>
                        <td><?php echo $d['user_nama']; ?></td>

                        <td>
                            <?php 
                                echo ($d['user_status'] == 1) 
                                    ? "<span class='badge bg-primary'>Admin</span>" 
                                    : "<span class='badge bg-success'>Kasir</span>";
                            ?>
                        </td>

                        <td>
                            <a href="user_edit.php?id=<?php echo $d['user_id']; ?>" 
                               class="btn btn-sm btn-info">
                               Edit
                            </a>

                            <a href="user_hapus.php?id=<?php echo $d['user_id']; ?>" 
                               onclick="return confirm('Yakin hapus user ini?');"
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