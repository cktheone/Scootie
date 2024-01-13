<?php
$page = 'Schooter';
include('header.php');
?>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('assets/images/galeri-6.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="./">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Vehicle<i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Choose Your Scooter</h1>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM schooter ORDER BY harga_schooter ASC");
            while ($data = mysqli_fetch_array($query)) { ?>
                <div class="col-md-4">
                    <div class="car-wrap rounded ftco-animate">
                        <div class="img rounded d-flex align-items-start">
                            <img src="assets/images/<?= $data['gambar_schooter']; ?>" width="100%">
                        </div>
                        <div class="text" style="margin-top: 80px;">
                            <h2 class="mb-0"><?= $data['nama_schooter']; ?></h2>
                            <div class="d-flex mb-3">
                                <span class="cat"><?= $data['jenis_schooter']; ?></span>
                                <p class="price ml-auto">Rp <?= number_format($data['harga_schooter']); ?><span>/day</span></p>
                            </div>
                            <p class="d-flex mb-0 d-block"><a href="index.php?schooter=<?= $data['id_schooter']; ?>#bookingSection" class="btn btn-primary py-2 mr-1">Book now</a> <a href="schooter-details.php?details=<?= $data['id_schooter']; ?>&produk=<?= $data['nama_schooter']; ?>" class="btn btn-secondary py-2 ml-1">Details</a></p>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>
</section>
<?php include('footer.php'); ?>