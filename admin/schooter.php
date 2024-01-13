<?php
$page = "Schooter";
include 'header.php';
?>
<h1 class="h3 mb-2 text-gray-800">Schooter</h1>
<a href="schooter_tambah.php" class="btn btn-primary btn-sm btn-icon-split">
    <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
    </span>
    <span class="text">Tambah Schooter</span>
</a>
<div class="card shadow mb-4 mt-3">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Schooter</h6>
    </div>
    <div class="card-body">
        <?php
        if (isset($_GET['alert'])) {
            if ($_GET['alert'] == "berhasil") { ?>
                <div class="alert alert-success">
                    Data schooter berhasil ditambah!
                </div>
            <?php } elseif ($_GET['alert'] == "gagal") { ?>
                <div class="alert alert-danger">
                    Data schooter gagal ditambah!
                </div>
            <?php } elseif ($_GET['alert'] == "berhasilHapus") { ?>
                <div class="alert alert-success">
                    Data schooter berhasil dihapus!
                </div>
            <?php } elseif ($_GET['alert'] == "gagalHapus") { ?>
                <div class="alert alert-danger">
                    Data schooter gagal dihapus!
                </div>
            <?php } elseif ($_GET['alert'] == "berhasilUbah") { ?>
                <div class="alert alert-success">
                    Data schooter berhasil diubah!
                </div>
            <?php } elseif ($_GET['alert'] == "gagalUbah") { ?>
                <div class="alert alert-danger">
                    Data schooter gagal diubah!
                </div>
        <?php }
        } ?>
        <div class="table-responsive">
            <table class="table table-striped small" id="dataTable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Nama Schooter</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Merek</th>
                        <th>Tahun</th>
                        <th>Max. Passenger</th>
                        <th>Color</th>
                        <th>Additional</th>
                        <th>Description</th>
                        <th width="1%">Gambar</th>
                        <th width="15%">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM schooter ORDER BY harga_schooter ASC");
                    while ($data = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <form action="act.php" method="POST">
                                <td>
                                    <?= $no++; ?>
                                    <input type="text" name="id_schooter" value="<?= $data['id_schooter']; ?>" hidden>
                                </td>
                                <td><?= $data['nama_schooter']; ?></td>
                                <td><?= $data['jenis_schooter']; ?></td>
                                <td>Rp <?= number_format($data['harga_schooter']); ?></td>
                                <td><?= $data['merek_schooter']; ?></td>
                                <td><?= $data['tahun_schooter']; ?></td>
                                <td><?= $data['max_passenger_schooter']; ?></td>
                                <td><?= $data['color_schooter']; ?></td>
                                <td><?= $data['additional_schooter']; ?></td>
                                <td><?= $data['description_schooter']; ?></td>
                                <td>
                                    <img src="../assets/images/<?= $data['gambar_schooter']; ?>" width="100%">
                                    <input type="text" name="gambar_schooter" value="<?= $data['gambar_schooter']; ?>" hidden>
                                </td>
                                <td>
                                    <a href="schooter_details.php?id=<?= $data['id_schooter']; ?>" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i> Ubah
                                    </a>
                                    <button type="submit" name="hapus_schooter" onclick="return confirm('Apakah anda yakin?');" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </td>
                            </form>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>