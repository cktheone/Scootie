<?php
$page = "Pesanan";
include 'header.php';
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Ubah Pesanan</h1>
<a href="pesanan.php" class="btn btn-danger btn-sm btn-icon-split">
    <span class="icon text-white-50">
        <i class="fas fa-arrow-left"></i>
    </span>
    <span class="text">Kembali</span>
</a>
<!-- DataTales Example -->
<div class="card shadow mb-4 mt-2">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pesanan</h6>
    </div>
    <div class="card-body">
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
                    $query = mysqli_query($koneksi, "SELECT * FROM booking WHERE id_booking = $_GET[id]");
                    $data = mysqli_fetch_array($query); ?>
                    <tr>
                        <form action="act.php" method="POST">
                            <td><?= $no++; ?></td>
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
                                <input type="text" name="id_booking" value="<?= $data['id_booking']; ?>" hidden>
                                <select class="form-control form-control-sm" name="status_booking">
                                    <option value="" disabled>--Pilih Status--</option>
                                    <option value="0" <?php if ($data['status_booking'] == 0) {
                                                            echo "selected";
                                                        } ?>>Menunggu</option>
                                    <option value="1" <?php if ($data['status_booking'] == 1) {
                                                            echo "selected";
                                                        } ?>>Proses</option>
                                    <option value="2" <?php if ($data['status_booking'] == 2) {
                                                            echo "selected";
                                                        } ?>>Selesai</option>
                                    <option value="3" <?php if ($data['status_booking'] == 3) {
                                                            echo "selected";
                                                        } ?>>Batal</option>
                                </select>
                            </td>
                            <td>
                                <button type="submit" name="update_booking" onclick="return confirm('Apakah anda yakin?');" class="btn btn-success btn-sm">
                                    <i class="fas fa-check"></i> Simpan
                                </button>
                            </td>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>