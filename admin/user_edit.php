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
                <h4>Edit User Rental</h4>
            </div>

            <div class="panel-body">

                <?php
                    include '../koneksi.php';
                    $id = $_GET['id'];
                    $data = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$id'");
                    while ($d = mysqli_fetch_array($data)) {
                ?>

                <form method="post" action="user_update.php">
                    
                    <input type="hidden" name="user_id" value="<?php echo $d['user_id']; ?>">

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" 
                               value="<?php echo $d['username']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control" 
                               value="<?php echo $d['password']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="user_nama" class="form-control" 
                               value="<?php echo $d['user_nama']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="user_status" class="form-control" required>
                            <option value="1" <?php if($d['user_status']==1){echo "selected";} ?>>Admin</option>
                            <option value="2" <?php if($d['user_status']==2){echo "selected";} ?>>Kasir</option>
                        </select>
                    </div>

                    <br>
                    <input type="submit" class="btn btn-primary" value="Simpan Perubahan">

                </form>

                <?php } ?>

            </div>
        </div>

    </div>
</div>