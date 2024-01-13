<?php
$page = "Pengaturan";
include 'header.php';
?>
<h1 class="h3 mb-2 text-gray-800">Pengaturan</h1>
<div class="card shadow mb-4 mt-2">
    <div class="card-body">
        <?php
        if (isset($_GET['alert'])) {
            if ($_GET['alert'] == "berhasilUbah") { ?>
                <div class="alert alert-success">
                    Pengaturan berhasil diubah!
                </div>
            <?php } elseif ($_GET['alert'] == "gagalUbah") { ?>
                <div class="alert alert-danger">
                    Pengaturan gagal diubah!
                </div>
        <?php }
        } ?>
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE id_pengaturan = 1");
        $data = mysqli_fetch_assoc($query);
        ?>
        <form action="act.php" method="POST" enctype="multipart/form-data">
            <input type="text" value="<?= $data['id_pengaturan'] ?>" name="id_pengaturan" hidden>
            <div class="form-group">
                <label>Link Video</label>
                <input name="youtubelink_pengaturan" type="text" class="form-control form-control-sm" value="<?= $data['youtubelink_pengaturan'] ?>" placeholder="Link video youtube. ex: https://www.youtube.com/watch?v=4xDzrJKXOOY" required>
            </div>
            <div class="form-group">
                <label>No. Whatsapp</label>
                <input name="nowa_pengaturan" type="text" class="form-control form-control-sm" value="<?= $data['nowa_pengaturan'] ?>" placeholder="Nomor whatsapp. ex: 086123817263" required>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" onclick="return confirm('Apakah anda yakin?');" name="ubah_pengaturan">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>