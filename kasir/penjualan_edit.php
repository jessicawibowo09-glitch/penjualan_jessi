<?php 
include 'header.php';
include '../koneksi.php';

// ambil id dari URL
$id = $_GET['id'];

// ambil data penjualan
$penjualan = mysqli_query($koneksi,"
	SELECT penjualan.*, barang.nama_barang, barang.harga_jual 
	FROM penjualan 
	JOIN barang ON penjualan.id_barang = barang.id_barang
	WHERE penjualan.id_jual = '$id'
");

$p = mysqli_fetch_assoc($penjualan);

// ambil semua barang
$barang = mysqli_query($koneksi,"SELECT * FROM barang");

// ambil user
$user = mysqli_query($koneksi,"SELECT * FROM user");
?>

<div class="container">
	<br/><br/><br/>

	<div class="col-md-5 col-md-offset-3">
		<div class="panel">
			<div class="panel-heading">
				<h4>Edit Penjualan</h4>
			</div>

			<div class="panel-body">
				<form method="post" action="penjualan_update.php">

					<input type="hidden" name="id_jual" value="<?php echo $p['id_jual']; ?>">

					<div class="form-group">
						<label>Barang</label>
						<select name="id_barang" class="form-control" required>
							<?php while($b = mysqli_fetch_assoc($barang)){ ?>
								<option 
									value="<?php echo $b['id_barang']; ?>"
									<?php if($b['id_barang']==$p['id_barang']) echo "selected"; ?>
								>
									<?php echo $b['nama_barang']; ?>
								</option>
							<?php } ?>
						</select>
					</div>

					<div class="form-group">
						<label>Nama Kasir</label>
						<select name="user_id" class="form-control" required>
							<?php while($u = mysqli_fetch_assoc($user)){ ?>
								<option 
									value="<?php echo $u['user_id']; ?>"
									<?php if($u['user_id']==$p['user_id']) echo "selected"; ?>
								>
									<?php echo $u['user_nama']; ?>
								</option>
							<?php } ?>
						</select>
					</div>

					<div class="form-group">
						<label>Tanggal Jual</label>
						<input type="date" name="tgl_jual" class="form-control" 
							value="<?php echo $p['tgl_jual']; ?>" required>
					</div>

					<div class="form-group">
						<label>Total Harga</label>
						<input type="number" name="total_harga" class="form-control" 
							value="<?php echo $p['total_harga']; ?>" required>
					</div>

					<br/>
					<input type="submit" class="btn btn-primary" value="Update">
					<a href="penjualan.php" class="btn btn-danger">Kembali</a>

				</form>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>