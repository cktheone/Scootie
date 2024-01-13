<?php
$page = "Lokasi";
include 'header.php';
?>
<h1 class="h3 mb-2 text-gray-800">Lokasi</h1>
<a href="lokasi_tambah.php" class="btn btn-primary btn-sm btn-icon-split">
    <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
    </span>
    <span class="text">Tambah Lokasi</span>
</a>
<div class="card shadow mb-4 mt-3">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Lokasi</h6>
    </div>
    <div class="card-body">
        <?php
        if (isset($_GET['alert'])) {
            if ($_GET['alert'] == "berhasil") { ?>
                <div class="alert alert-success">
                    Data lokasi berhasil ditambah!
                </div>
            <?php } elseif ($_GET['alert'] == "gagal") { ?>
                <div class="alert alert-danger">
                    Data lokasi gagal ditambah!
                </div>
            <?php } elseif ($_GET['alert'] == "berhasilHapus") { ?>
                <div class="alert alert-success">
                    Data lokasi berhasil dihapus!
                </div>
            <?php } elseif ($_GET['alert'] == "gagalHapus") { ?>
                <div class="alert alert-danger">
                    Data lokasi gagal dihapus!
                </div>
            <?php } elseif ($_GET['alert'] == "berhasilUbah") { ?>
                <div class="alert alert-success">
                    Data lokasi berhasil diubah!
                </div>
            <?php } elseif ($_GET['alert'] == "gagalUbah") { ?>
                <div class="alert alert-danger">
                    Data lokasi gagal diubah!
                </div>
        <?php }
        } ?>
        <div class="table-responsive">
            <table class="table table-striped small" id="dataTable">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Nama Lokasi</th>
                        <th width="15%">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM lokasi ORDER BY nama_lokasi ASC");
                    while ($data = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <form action="act.php" method="POST">
                                <td>
                                    <?= $no++; ?>
                                    <input type="text" name="id_lokasi" value="<?= $data['id_lokasi']; ?>" hidden>
                                </td>
                                <td><?= $data['nama_lokasi']; ?></td>
                                <td>
                                    <a href="lokasi_details.php?id=<?= $data['id_lokasi']; ?>" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i> Ubah
                                    </a>
                                    <button type="submit" name="hapus_lokasi" onclick="return confirm('Apakah anda yakin?');" class="btn btn-danger btn-sm">
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