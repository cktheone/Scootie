<?php
$id = $_GET['id'];
include 'header.php';
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Profil</h1>

<div class="card shadow mb-4 mt-2">
    <div class="card-body">
        <?php
        if (isset($_GET['alert'])) {
            if ($_GET['alert'] == "berhasilUbah") { ?>
                <div class="alert alert-success">
                    Data profil admin berhasil diubah!
                </div>
            <?php } elseif ($_GET['alert'] == "gagalUbah") { ?>
                <div class="alert alert-danger">
                    Data profil admin gagal diubah!
                </div>
            <?php } elseif ($_GET['alert'] == "gagalUsername") { ?>
                <div class="alert alert-danger">
                    Username sudah digunakan, coba kembali!
                </div>
        <?php }
        } ?>
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin = $id");
        $data = mysqli_fetch_assoc($query);
        ?>
        <form action="act.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="id_admin" value="<?= $data['id_admin']; ?>" hidden>
            <div class="form-group">
                <input name="nama_admin" type="text" class="form-control form-control-sm" placeholder="Nama Admin" value="<?= $data['nama_admin']; ?>" required>
            </div>
            <div class="form-group">
                <input name="username_admin" type="text" class="form-control form-control-sm" placeholder="Username Admin" value="<?= $data['username_admin']; ?>" required>
            </div>
            <div class="form-group" hidden>
                <select name="status_admin" class="form-control form-control-sm" required>
                    <option value="" disabled>--Pilih Role Admin--</option>
                    <option value="0" <?php if ($data['status_admin'] == 0) {
                                            echo "selected";
                                        } ?>>Admin</option>
                    <option value="1" <?php if ($data['status_admin'] == 1) {
                                            echo "selected";
                                        } ?>>Super Admin</option>
                </select>
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-sm" onclick="return confirm('Apakah anda yakin?');" name="ubah_profil_admin">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>