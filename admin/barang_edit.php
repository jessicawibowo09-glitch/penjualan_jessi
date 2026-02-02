<?php include 'header.php'; ?>

<style>
    body {
        background: #ffe6f2;
        font-family: "Poppins", sans-serif;
    }

    .panel {
        background: #fff;
        border-radius: 15px;
        padding: 20px;
        border: 2px solid #ff99cc;
        box-shadow: 0 0 12px rgba(255, 153, 204, 0.3);
    }

    .panel-heading h4 {
        text-align: center;
        color: #ff4da6;
        font-weight: 700;
        margin-bottom: 15px;
    }

    label {
        font-weight: 600;
        color: #ff1a8c;
    }

    .form-control {
        border: 2px solid #ffb3d9;
        background: #fff0f7;
        border-radius: 10px;
    }

    .form-control:focus {
        border-color: #ff4da6 !important;
        box-shadow: 0 0 7px rgba(255, 77, 166, 0.5);
    }

    .btn-primary {
        width: 100%;
        background: #ff4da6;
        border-color: #ff1a8c;
        font-weight: 600;
        border-radius: 10px;
    }

    .btn-primary:hover {
        background: #ff1a8c;
        border-color: #e60073;
    }
</style>

<div class="container">
    <br><br><br>
    <div class="col-md-5 col-md-offset-3">

        <div class="panel">
            <div class="panel-heading">
                <h4>Edit Data Barang</h4>
            </div>

            <div class="panel-body">

                <?php
                    include '../koneksi.php';
                    $id = $_GET['id'];
                    $data = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang='$id'");
                    while ($d = mysqli_fetch_array($data)) {
                ?>

                <form method="post" action="barang_update.php">
                    
                    <input type="hidden" name="id_barang" value="<?= $d['id_barang']; ?>">

                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" 
                               value="<?= $d['nama_barang']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Harga Beli</label>
                        <input type="number" name="harga_beli" class="form-control" 
                               value="<?= $d['harga_beli']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Harga Jual</label>
                        <input type="number" name="harga_jual" class="form-control" 
                               value="<?= $d['harga_jual']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" name="stok" class="form-control" 
                               value="<?= $d['stok']; ?>" required>
                    </div>

                    <br>
                    <input type="submit" class="btn btn-primary" value="Simpan Perubahan">

                </form>

                <?php } ?>

            </div>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>
