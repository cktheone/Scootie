<?php
$page = "Admin";
include 'header.php';
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tambah Admin</h1>
<a href="admin.php" class="btn btn-danger btn-sm btn-icon-split">
    <span class="icon text-white-50">
        <i class="fas fa-arrow-left"></i>
    </span>
    <span class="text">Kembali</span>
</a>

<div class="card shadow mb-4 mt-2">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Input Admin</h6>
    </div>
    <div class="card-body">
        <?php
        if (isset($_GET['alert'])) {
            if ($_GET['alert'] == "gagalPassword") { ?>
                <div class="alert alert-danger">
                    Password tidak cocok, coba kembali!
                </div>
            <?php } elseif ($_GET['alert'] == "gagalUsername") { ?>
                <div class="alert alert-danger">
                    Username sudah digunakan, coba kembali!
                </div>
        <?php }
        } ?>
        <form action="act.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input name="nama_admin" type="text" class="form-control form-control-sm" placeholder="Nama Admin" required>
            </div>
            <div class="form-group">
                <input name="username_admin" type="text" class="form-control form-control-sm" placeholder="Username Admin" minlength="5" required>
            </div>
            <div class="form-group">
                <input name="password_admin" type="password" class="form-control form-control-sm" placeholder="Password Admin" minlength="5" required>
            </div>
            <div class="form-group">
                <input name="konfirmasi_password_admin" type="password" class="form-control form-control-sm" placeholder="Konfirmasi Password Admin" minlength="5" required>
            </div>
            <div class="form-group">
                <select name="status_admin" class="form-control form-control-sm" required>
                    <option value="" disabled selected>--Pilih Role Admin--</option>
                    <option value="0">Admin</option>
                    <option value="1">Super Admin</option>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" onclick="return confirm('Apakah anda yakin?');" name="tambah_admin">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>