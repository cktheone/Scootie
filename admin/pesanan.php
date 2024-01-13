<?php
$page = "Pesanan";
include 'header.php';
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Pesanan</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pesanan</h6>
    </div>
    <div class="card-body">
        <?php
        if (isset($_GET['alert'])) {
            if ($_GET['alert'] == "berhasil") { ?>
                <div class="alert alert-success">
                    <small>Status pesanan berhasil diubah!</small>
                </div>
            <?php } elseif ($_GET['alert'] == "gagal") { ?>
                <div class="alert alert-danger">
                    <small>Status gagal berhasil diubah!</small>
                </div>
            <?php } elseif ($_GET['alert'] == "berhasilHapus") { ?>
                <div class="alert alert-success">
                    <small>Data pesanan berhasil dihapus!</small>
                </div>
            <?php } elseif ($_GET['alert'] == "gagalHapus") { ?>
                <div class="alert alert-danger">
                    <small>Data pesanan gagal dihapus!</small>
                </div>
        <?php }
        } ?>
        <div class="table-responsive">
            <table class="table table-striped small" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. Invoice</th>
                        <th>Nama</th>
                        <th>Schooter</th>
                        <th>Pick-up Location</th>
                        <th>Drop-off Location</th>
                        <th>Hari</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    if (isset($_GET['status_booking'])) {
                        $query = mysqli_query($koneksi, "SELECT * FROM booking WHERE status_booking = $_GET[status_booking] ORDER BY status_booking ASC, created_booking ASC");
                    } else {
                        $query = mysqli_query($koneksi, "SELECT * FROM booking ORDER BY status_booking ASC, created_booking ASC");
                    }
                    while ($data = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <form action="act.php" method="POST">
                                <td>
                                    <?= $no++; ?>
                                    <input name="id_booking" type="text" value="<?= $data['id_booking']; ?>" hidden>
                                </td>
                                <td><?= $data['invoice_booking']; ?></td>
                                <td>
                                    <?= $data['nama_booking']; ?> <br>
                                    <?= $data['telp_booking']; ?>
                                </td>
                                <td><?= $data['jenis_schooter_booking']; ?></td>
                                <td>
                                    <?= $data['pickup_location_booking']; ?><br>
                                    <?= date('D, d-m-Y', strtotime($data['pickup_date_booking'])) ?><br>
                                    <?= $data['pickup_time_booking']; ?>
                                </td>
                                <td>
                                    <?= $data['drofoff_location_booking']; ?><br>
                                    <?= date('D, d-m-Y', strtotime($data['drofoff_date_booking'])) ?>
                                </td>
                                <td>
                                    <?php
                                    $tgl_ambil = new DateTime($data['pickup_date_booking']);
                                    $tgl_kembali = new DateTime($data['drofoff_date_booking']);
                                    $jumlah_hari_booking = $tgl_kembali->diff($tgl_ambil);

                                    if ($jumlah_hari_booking->d == 0) {
                                        $jumlah_hari = 1;
                                    } else {
                                        $jumlah_hari = $jumlah_hari_booking->d;
                                    }
                                    ?> <?= $jumlah_hari; ?> Hari
                                </td>
                                <td>Rp <?= number_format($data['total_booking']) ?> <br></td>
                                <td>
                                    <?php
                                    if ($data['status_booking'] == 0) { ?>
                                        <span class="text-warning"><b>Menunggu</b></span>
                                    <?php } elseif ($data['status_booking'] == 1) { ?>
                                        <span class="text-primary"><b>Proses</b></span>
                                    <?php } elseif ($data['status_booking'] == 2) { ?>
                                        <span class="text-success"><b>Selesai</b></span>
                                    <?php } else { ?>
                                        <span class="text-danger"><b>Batal</b></span>
                                    <?php }
                                    ?>
                                </td>
                                <td>
                                    <a href="pesanan_details.php?id=<?= $data['id_booking']; ?>" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i> Ubah
                                    </a>
                                    <button type="submit" name="hapus_booking" onclick="return confirm('Apakah anda yakin?');" class="btn btn-danger btn-sm">
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