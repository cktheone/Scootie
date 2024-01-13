<?php
$page = "Schooter";
include 'header.php';
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Ubah Schooter</h1>
<a href="schooter.php" class="btn btn-danger btn-sm btn-icon-split">
    <span class="icon text-white-50">
        <i class="fas fa-arrow-left"></i>
    </span>
    <span class="text">Kembali</span>
</a>

<div class="card shadow mb-4 mt-2">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Input Schooter</h6>
    </div>
    <div class="card-body">
        <?php
        $id = $_GET['id'];
        $query = mysqli_query($koneksi, "SELECT * FROM schooter WHERE id_schooter = $id");
        $data = mysqli_fetch_assoc($query);
        ?>
        <form action="act.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="id_schooter" value="<?= $data['id_schooter']; ?>" hidden>
            <input type="text" name="gambar_schooter2" value="<?= $data['gambar_schooter']; ?>" hidden>

            <div class="form-group">
                <input name="nama_schooter" type="text" class="form-control form-control-sm" placeholder="Nama Schooter" value="<?= $data['nama_schooter']; ?>" required>
            </div>
            <div class="form-group">
                <input name="jenis_schooter" type="text" class="form-control form-control-sm" placeholder="Kategori" value="<?= $data['jenis_schooter']; ?>" required>
            </div>
            <div class="form-group">
                <input name="harga_schooter" type="number" class="form-control form-control-sm" placeholder="Harga" value="<?= $data['harga_schooter']; ?>" required>
            </div>
            <div class="form-group">
                <input name="merek_schooter" type="text" class="form-control form-control-sm" placeholder="Merek" value="<?= $data['merek_schooter']; ?>" required>
            </div>
            <div class="form-group">
                <input name="tahun_schooter" type="text" class="form-control form-control-sm" placeholder="Tahun" value="<?= $data['tahun_schooter']; ?>" required>
            </div>
            <div class="form-group">
                <input name="max_passenger_schooter" type="text" class="form-control form-control-sm" placeholder="Max. Passenger" value="<?= $data['max_passenger_schooter']; ?>" required>
            </div>
            <div class="form-group">
                <input name="color_schooter" type="text" class="form-control form-control-sm" placeholder="Color" value="<?= $data['color_schooter']; ?>" required>
            </div>
            <div class="form-group">
                <input name="additional_schooter" type="text" class="form-control form-control-sm" placeholder="Additional" value="<?= $data['additional_schooter']; ?>" required>
            </div>
            <div class="form-group">
                <textarea class="form-control form-control-sm" name="description_schooter" cols="30" rows="5" placeholder="Description" required><?= $data['description_schooter']; ?></textarea>
            </div>
            <div class="form-group">
                <img src="../assets/images/<?= $data['gambar_schooter']; ?>" width="20%" alt="">
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <input name="gambar_schooter" type="file">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" onclick="return confirm('Apakah anda yakin?');" name="ubah_schooter">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>