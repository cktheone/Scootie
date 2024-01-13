<?php
$page = 'Home';
include('header.php');
?>
<div class="hero-wrap ftco-degree-bg" style="background-image: url('assets/images/bg-header.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
            <div class="col-lg-8 ftco-animate">
                <div class="text w-100 text-center mb-md-5 pb-md-5">
                    <h1 class="mb-4">Start Your Ride With Scootie</h1>
                    <p style="font-size: 18px;">Jelajahi Kota Jakarta dengan Kendaraan Ramah Lingkungan</p>
                    <?php
                    $query2 = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE id_pengaturan = 1");
                    $data2 = mysqli_fetch_assoc($query2);
                    ?>
                    <a href="<?= $data2['youtubelink_pengaturan'] ?>" class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="ion-ios-play"></span>
                        </div>
                        <div class="heading-title ml-5">
                            <span id="bookingSection">Lihat Koleksi Skuter Terbaru Kami</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-12 featured-top">
                <div class="row no-gutters">
                    <div class="col-md-4 d-flex align-items-center">
                        <form action="act.php" method="POST" class="request-form ftco-animate bg-primary">
                            <h2>Make your trip</h2>
                            <?php
                            if (isset($_GET['alert'])) {
                                if ($_GET['alert'] == "berhasil") { ?>
                                    <div class="alert alert-success">
                                        <small>Booking berhasil dilakukan! Silakan simpan Nomor Invoice Anda <b><a style="text-decoration: underline;" href="invoice.php?alert=berhasil&inv=<?= $_GET['invoice']; ?>"><?= $_GET['invoice']; ?></a></b></small>
                                    </div>
                                <?php } elseif ($_GET['alert'] == "gagal") { ?>
                                    <div class="alert alert-danger">
                                        <small>Booking gagal dilakukan!</small>
                                    </div>
                            <?php }
                            } ?>
                            <div class="d-flex">
                                <div class="form-group mr-2">
                                    <label for="name" class="label">Nama</label>
                                    <input name="nama_booking" type="text" class="form-control" id="name" placeholder="Name" autocomplete="off" required>
                                </div>
                                <div class="form-group ml-2">
                                    <label for="phone" class="label">No HP</label>
                                    <input name="telp_booking" type="text" onkeypress='validate(event)' class="form-control" id="phone" placeholder="Phone" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="label">Schooter</label>

                                <?php
                                if (isset($_GET['schooter'])) { ?>
                                    <select style="outline: 2px solid yellow;" name="jenis_schooter_booking" class="form-control" required>
                                        <option style="color: black;" value="" selected disabled>--Pilih Schooter--</option>
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT * FROM schooter ORDER BY nama_schooter ASC");
                                        while ($data = mysqli_fetch_array($query)) { ?>
                                            <option value="<?= $data['nama_schooter'] . ',' . $data['harga_schooter']; ?>" <?php
                                                                                                                            if ($data['id_schooter'] == $_GET['schooter']) {
                                                                                                                                echo 'selected';
                                                                                                                            }
                                                                                                                            ?> style="color: black;"><?= $data['nama_schooter']; ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                <?php } else { ?>
                                    <select name="jenis_schooter_booking" class="form-control" required>
                                        <option style="color: black;" value="" selected disabled>--Pilih Schooter--</option>
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT * FROM schooter ORDER BY nama_schooter ASC");
                                        while ($data = mysqli_fetch_array($query)) { ?>
                                            <option value="<?= $data['nama_schooter'] . ',' . $data['harga_schooter']; ?>" style="color: black;"><?= $data['nama_schooter']; ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                <?php }
                                ?>

                            </div>
                            <div class="form-group">
                                <label for="pickup-loc" class="label">Pick-up location</label>
                                <select id="pickup-loc" name="pickup_location_booking" class="form-control" required>
                                    <option style="color: black;" value="" selected disabled>--Pilih Lokasi--</option>
                                    <?php
                                    $query = mysqli_query($koneksi, "SELECT * FROM lokasi ORDER BY nama_lokasi ASC");
                                    while ($data = mysqli_fetch_array($query)) { ?>
                                        <option value="<?= $data['nama_lokasi']; ?>" style="color: black;"><?= $data['nama_lokasi']; ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="drop-loc" class="label">Drop-off location</label>
                                <select id="drop-loc" name="drofoff_location_booking" class="form-control" required>
                                    <option style="color: black;" value="" selected disabled>--Pilih Lokasi--</option>
                                    <?php
                                    $query = mysqli_query($koneksi, "SELECT * FROM lokasi ORDER BY nama_lokasi ASC");
                                    while ($data = mysqli_fetch_array($query)) { ?>
                                        <option value="<?= $data['nama_lokasi']; ?>" style="color: black;"><?= $data['nama_lokasi']; ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                            <div class="d-flex">
                                <div class="form-group mr-2">
                                    <label class="label">Pick-up date</label>
                                    <input name="pickup_date_booking" type="text" id="book_pick_date" class="form-control" placeholder="Date" autocomplete="off" required>
                                </div>
                                <div class="form-group ml-2">
                                    <label class="label">Drop-off date</label>
                                    <input name="drofoff_date_booking" type="text" id="book_off_date" class="form-control" placeholder="Date" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="time" class="label">Pick-up time</label>
                                <select id="time" name="pickup_time_booking" class="form-control" required>
                                    <option style="color: black;" value="" selected disabled>--Pilih Waktu--</option>
                                    <option style="color: black;" value="00:00 WIB">00:00 WIB</option>
                                    <option style="color: black;" value="01:00 WIB">01:00 WIB</option>
                                    <option style="color: black;" value="02:00 WIB">02:00 WIB</option>
                                    <option style="color: black;" value="03:00 WIB">03:00 WIB</option>
                                    <option style="color: black;" value="04:00 WIB">04:00 WIB</option>
                                    <option style="color: black;" value="05:00 WIB">05:00 WIB</option>
                                    <option style="color: black;" value="06:00 WIB">06:00 WIB</option>
                                    <option style="color: black;" value="07:00 WIB">07:00 WIB</option>
                                    <option style="color: black;" value="08:00 WIB">08:00 WIB</option>
                                    <option style="color: black;" value="09:00 WIB">09:00 WIB</option>
                                    <option style="color: black;" value="10:00 WIB">10:00 WIB</option>
                                    <option style="color: black;" value="11:00 WIB">11:00 WIB</option>
                                    <option style="color: black;" value="12:00 WIB">12:00 WIB</option>
                                    <option style="color: black;" value="13:00 WIB">13:00 WIB</option>
                                    <option style="color: black;" value="14:00 WIB">14:00 WIB</option>
                                    <option style="color: black;" value="15:00 WIB">15:00 WIB</option>
                                    <option style="color: black;" value="16:00 WIB">16:00 WIB</option>
                                    <option style="color: black;" value="17:00 WIB">17:00 WIB</option>
                                    <option style="color: black;" value="18:00 WIB">18:00 WIB</option>
                                    <option style="color: black;" value="19:00 WIB">19:00 WIB</option>
                                    <option style="color: black;" value="20:00 WIB">20:00 WIB</option>
                                    <option style="color: black;" value="21:00 WIB">21:00 WIB</option>
                                    <option style="color: black;" value="22:00 WIB">22:00 WIB</option>
                                    <option style="color: black;" value="23:00 WIB">23:00 WIB</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-secondary py-3 px-4" type="submit" name="tambah_booking" onclick="return confirm('Apakah anda yakin?');">Book Schooter</button>
                            </div>
                        </form>

                    </div>
                    <div class="col-md-8 d-flex align-items-center">
                        <div class="services-wrap rounded-right w-100">
                            <h3 class="heading-section mb-4">Cara Memesan Scooter</h3>
                            <div class="row d-flex mb-4">
                                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                    <div class="services w-100 text-center">
                                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
                                        <div class="text w-100">
                                            <h3 class="heading mb-2">Isi Booking Form</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                    <div class="services w-100 text-center">
                                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
                                        <div class="text w-100">
                                            <h3 class="heading mb-2">Selesaikan Pembayaran</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                    <div class="services w-100 text-center">
                                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
                                        <div class="text w-100">
                                            <h3 class="heading mb-2">Ambil Scooter Mu</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>
                                <?php
                                $query3 = mysqli_query($koneksi, "SELECT * FROM pengaturan WHERE id_pengaturan = 1");
                                $data3 = mysqli_fetch_assoc($query3);
                                ?>
                                <a target="_blank" href="https://wa.me/62<?= $data3['nowa_pengaturan']; ?>" class="btn btn-primary py-3 px-4">Booking via Whatsapp</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>


<section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">Collections</span>
                <h2 class="mb-2">Koleksi Scooter Kami</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="carousel-car owl-carousel">
                    <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM schooter ORDER BY harga_schooter ASC");
                    while ($data = mysqli_fetch_array($query)) { ?>
                        <div class="item">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="img rounded d-flex align-items-start">
                                    <img src="assets/images/<?= $data['gambar_schooter']; ?>">
                                </div>
                                <div class="text" style="margin-top: 80px;">
                                    <h2 class="mb-0"><?= $data['nama_schooter']; ?></h2>
                                    <div class="d-flex mb-3">
                                        <span class="cat"><?= $data['jenis_schooter']; ?></span>
                                        <p class="price ml-auto">Rp <?= number_format($data['harga_schooter']); ?><span>/day</span></p>
                                    </div>
                                    <p class="d-flex mb-0 d-block"><a href="?schooter=<?= $data['id_schooter']; ?>#bookingSection" class="btn btn-primary py-2 mr-1">Book now</a> <a href="schooter-details.php?details=<?= $data['id_schooter']; ?>&produk=<?= $data['nama_schooter']; ?>" class="btn btn-secondary py-2 ml-1">Details</a></p>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-about">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/images/galeri-4.jpg);">
            </div>
            <div class="col-md-6 wrap-about ftco-animate">
                <div class="heading-section heading-section-white pl-md-5">
                    <span class="subheading">Tentang Kami</span>
                    <h2 class="mb-4">Welcome to Scootie</h2>
                    <p>Perusahaan kami fokus pada persewaan skuter dan sepeda listrik ramah lingkungan, Nikmati sensasi menyenangkan yang dihasilkan dari scooter listrik untuk menjelajahi Ibu Kota , kami berdedikasi untuk memberi Anda kesempatan itu dengan biaya terjangkau. rentalscooterinbali.com menawarkan layanan berkualitas dan baik untuk memastikan kesenangan dan keselamatan Anda. Tim kami berdedikasi kepada Anda 24/7 untuk menjawab pertanyaan, pemesanan, pengiriman sepeda motor, dan bantuan jika Anda membutuhkannya.</p>
                    <p><a href="/schooter.php" class="btn btn-primary py-3 px-4">Search Vehicle</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('footer.php'); ?>