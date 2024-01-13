<?php
$page = 'Track';
include('header.php');
?>
<div class="hero-wrap ftco-degree-bg" style="background-image: url('assets/images/galeri-1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
            <div class="col-lg-12 ftco-animate">
                <?php
                if (isset($_GET['alert']) == "berhasil") { ?>
                    <form class="request-form ftco-animate bg-primary">
                        <h2>No. Invoice: <?= $_GET['inv']; ?></h2>
                        <div class="table-responsive">
                            <table class="table table-dark text-center small">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Schooter</th>
                                        <th>Pick-up Location</th>
                                        <th>Drop-off Location</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($koneksi, "SELECT * FROM booking WHERE invoice_booking='$_GET[inv]'");
                                    $data = mysqli_fetch_assoc($query);
                                    ?>
                                    <tr>
                                        <td><?= $data['nama_booking']; ?></td>
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
                                            Rp <?= number_format($data['total_booking']) ?> <br>
                                            <?php
                                            $tgl_ambil = new DateTime($data['pickup_date_booking']);
                                            $tgl_kembali = new DateTime($data['drofoff_date_booking']);
                                            $jumlah_hari_booking = $tgl_kembali->diff($tgl_ambil);

                                            if ($jumlah_hari_booking->d == 0) {
                                                $jumlah_hari = 1;
                                            } else {
                                                $jumlah_hari = $jumlah_hari_booking->d;
                                            }
                                            ?> (<?= $jumlah_hari; ?> Hari)
                                        </td>
                                        <td>
                                            <?php
                                            if ($data['status_booking'] == 0) { ?>
                                                <span class="btn btn-warning btn-sm">Menunggu</span>
                                            <?php } elseif ($data['status_booking'] == 1) { ?>
                                                <span class="btn btn-primary btn-sm">Proses</span>
                                            <?php } elseif ($data['status_booking'] == 2) { ?>
                                                <span class="btn btn-success btn-sm">Selesai</span>
                                            <?php } else { ?>
                                                <span class="btn btn-danger btn-sm">Batal</span>
                                            <?php }
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                <?php } else { ?>
                    <form action="act.php" method="POST" class="request-form ftco-animate bg-primary">
                        <h2>Masukkan No. Invoice Anda</h2>
                        <?php
                        if (isset($_GET['alertgagal']) == "gagal") { ?>
                            <div class="alert alert-danger">
                                <small>No. Invoice <b><?= $_GET['inv']; ?></b> tidak ditemukkan!</small>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="d-flex">
                            <div class="form-group mr-2">
                                <input name="invoice_booking" type="text" onkeypress='validate(event)' class="form-control" placeholder="No. Invoice" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-secondary py-3 px-4" type="submit" name="cek_invoice">Submit</button>
                        </div>
                    </form>
                <?php }
                ?>

            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>