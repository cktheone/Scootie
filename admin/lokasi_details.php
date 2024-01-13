<?php
$id = $_GET['id'];
$page = "Lokasi";
include 'header.php';
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Ubah Lokasi</h1>
<a href="lokasi.php" class="btn btn-danger btn-sm btn-icon-split">
    <span class="icon text-white-50">
        <i class="fas fa-arrow-left"></i>
    </span>
    <span class="text">Kembali</span>
</a>

<div class="card shadow mb-4 mt-2">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Input Lokasi</h6>
    </div>
    <div class="card-body">
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM lokasi WHERE id_lokasi = $id");
        $data = mysqli_fetch_assoc($query);
        ?>
        <form action="act.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="id_lokasi" value="<?= $data['id_lokasi']; ?>" hidden>
            <div class="form-group">
                <input name="nama_lokasi" type="text" class="form-control form-control-sm" placeholder="Nama Lokasi" value="<?= $data['nama_lokasi']; ?>" required>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" onclick="return confirm('Apakah anda yakin?');" name="ubah_lokasi">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>