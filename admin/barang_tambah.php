<?php include 'header.php'; ?>

<style>
body {
    background: #ffe6f2;
    font-family: "Poppins", sans-serif;
}

.panel {
    background: white;
    border-radius: 15px;
    padding: 25px;
    border: 2px solid #ff99cc;
    box-shadow: 0 0 12px rgba(255, 153, 204, 0.3);
}

.panel-heading h4 {
    text-align: center;
    font-weight: 700;
    color: #ff4da6;
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
    box-shadow: 0 0 7px rgba(255, 77, 166, 0.6);
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
                <h4>➕ Tambah Barang</h4>
            </div>

            <div class="panel-body">
                <form method="post" action="barang_aksi.php">

                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" placeholder="Masukkan nama barang..." required>
                    </div>

                    <div class="form-group">
                        <label>Harga Beli</label>
                        <input type="number" class="form-control" name="harga_beli" placeholder="Masukkan harga beli..." required>
                    </div>

                    <div class="form-group">
                        <label>Harga Jual</label>
                        <input type="number" class="form-control" name="harga_jual" placeholder="Masukkan harga jual..." required>
                    </div>

                    <div class="form-group">
                        <label>Stok Barang</label>
                        <input type="number" class="form-control" name="stok" placeholder="Masukkan jumlah stok..." required>
                    </div>

                    <br>
                    <input type="submit" class="btn btn-primary" value="💾 Simpan Barang">
                </form>
            </div>
        </div>
    </div>
</div>
