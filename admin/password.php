<?php
$id = $_GET['id'];
include 'header.php';
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Ganti Password</h1>

<div class="card shadow mb-4 mt-2">
    <div class="card-body">
        <?php
        if (isset($_GET['alert'])) {
            if ($_GET['alert'] == "berhasilUbah") { ?>
                <div class="alert alert-success">
                    Password berhasil diubah!
                </div>
            <?php } elseif ($_GET['alert'] == "gagalUbah") { ?>
                <div class="alert alert-danger">
                    Password gagal diubah!
                </div>
            <?php } elseif ($_GET['alert'] == "gagalPassword") { ?>
                <div class="alert alert-danger">
                    Password baru tidak cocok, coba kembali!
                </div>
            <?php } elseif ($_GET['alert'] == "gagalPasswordLama") { ?>
                <div class="alert alert-danger">
                    Password lama salah, coba kembali!
                </div>
        <?php }
        } ?>
        <form action="act.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="id_admin" value="<?= $id; ?>" hidden>
            <div class="form-group">
                <input name="password_lama" type="password" class="form-control form-control-sm" placeholder="Password Lama" minlength="5" required>
            </div>
            <div class="form-group">
                <input name="password_baru" type="password" class="form-control form-control-sm" placeholder="Password Baru" minlength="5" required>
            </div>
            <div class="form-group">
                <input name="konfirmasi_password_baru" type="password" class="form-control form-control-sm" placeholder="Konfirmasi Password Baru" minlength="5" required>
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-sm" onclick="return confirm('Apakah anda yakin?');" name="ubah_password_admin">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>