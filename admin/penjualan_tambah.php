<?php include 'header.php'; ?>
<?php include '../koneksi.php'; ?>

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
                <h4>➕ Tambah Penjualan</h4>
            </div>

            <div class="panel-body">
                <form method="post" action="penjualan_aksi.php">

                    <div class="form-group">
                        <label>Nama Barang</label>
                        <select class="form-control" name="id_barang" id="id_barang" required>
                            <option value="">-- Pilih Barang --</option>
                            <?php
                            $barang = mysqli_query($koneksi, "SELECT * FROM barang");
                            while($b = mysqli_fetch_assoc($barang)){
                                // Simpan harga beli di atribut data-hargabeli
                                echo "<option value='{$b['id_barang']}' data-hargabeli='{$b['harga_beli']}'>{$b['nama_barang']} (Stok: {$b['stok']})</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jumlah Jual</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan jumlah..." required>
                    </div>

                    <div class="form-group">
                        <label>Harga Beli (otomatis)</label>
                        <input type="number" class="form-control" id="harga" name="harga" readonly>
                    </div>

                    <div class="form-group">
                        <label>Total Harga</label>
                        <input type="number" class="form-control" id="total" name="total_harga" readonly>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Jual</label>
                        <input type="date" class="form-control" name="tgl_jual" required>
                    </div>
                    <div class="form-group">
                    <label>User id</label>
                        <select class="form-control" name="user_id" id="user_id" required>
                            <option value="">-- Pilih user --</option>
                            <?php
                            $barang = mysqli_query($koneksi, "SELECT * FROM user");
                            while($b = mysqli_fetch_assoc($barang)){
                                echo "<option value='{$b['user_id']}'>{$b['user_id']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <br>
                    <input type="submit" class="btn btn-primary" value="💾 Simpan Penjualan">
                </form>
            </div>
        </div>
    </div>
</div>

<script>
const barangSelect = document.getElementById('id_barang');
const jumlahInput = document.getElementById('jumlah');
const hargaInput  = document.getElementById('harga');
const totalInput  = document.getElementById('total');

function updateHargaTotal() {
    const selectedOption = barangSelect.options[barangSelect.selectedIndex];
    const hargaBeli = parseInt(selectedOption.getAttribute('data-hargabeli')) || 0;
    const jumlah = parseInt(jumlahInput.value) || 0;

    hargaInput.value = hargaBeli;
    totalInput.value = hargaBeli * jumlah;
}

barangSelect.addEventListener('change', updateHargaTotal);
jumlahInput.addEventListener('input', updateHargaTotal);
</script>
