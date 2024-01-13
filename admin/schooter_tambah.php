<?php
$page = "Schooter";
include 'header.php';
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tambah Schooter</h1>
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
        <form action="act.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input name="nama_schooter" type="text" class="form-control form-control-sm" placeholder="Nama Schooter" required>
            </div>
            <div class="form-group">
                <input name="jenis_schooter" type="text" class="form-control form-control-sm" placeholder="Kategori" required>
            </div>
            <div class="form-group">
                <input name="harga_schooter" type="number" class="form-control form-control-sm" placeholder="Harga" required>
            </div>
            <div class="form-group">
                <input name="merek_schooter" type="text" class="form-control form-control-sm" placeholder="Merek" required>
            </div>
            <div class="form-group">
                <input name="tahun_schooter" type="text" class="form-control form-control-sm" placeholder="Tahun" required>
            </div>
            <div class="form-group">
                <input name="max_passenger_schooter" type="text" class="form-control form-control-sm" placeholder="Max. Passenger" required>
            </div>
            <div class="form-group">
                <input name="color_schooter" type="text" class="form-control form-control-sm" placeholder="Color" required>
            </div>
            <div class="form-group">
                <input name="additional_schooter" type="text" class="form-control form-control-sm" placeholder="Additional" required>
            </div>
            <div class="form-group">
                <textarea class="form-control form-control-sm" name="description_schooter" cols="30" rows="5" placeholder="Description" required></textarea>
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <input name="gambar_schooter" type="file" required>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" onclick="return confirm('Apakah anda yakin?');" name="tambah_schooter">Simpan</button>
            </div>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>