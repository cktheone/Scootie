<?php
$page = 'Schooter';
include('header.php');
$id_schooter = $_GET['details'];
$produk = $_GET['produk'];
?>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('assets/images/galeri-3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="./">Home <i class="ion-ios-arrow-forward"></i></a></span> <span><?= $produk; ?> <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Details Information</h1>
            </div>
        </div>
    </div>
</section>

<?php
$query = mysqli_query($koneksi, "SELECT * FROM schooter WHERE id_schooter='$id_schooter'");
$data = mysqli_fetch_assoc($query);
?>

<section class="ftco-section ftco-car-details">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="car-details">
                    <div class="img rounded" style="background-image: url(assets/images/<?= $data['gambar_schooter'] ?>); background-size: contain;"></div>
                    <div class="text text-center">
                        <span class="subheading"><?= $data['jenis_schooter'] ?></span>
                        <h2><?= $data['nama_schooter'] ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-dashboard"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Merk
                                    <span><?= $data['merek_schooter'] ?></span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="ion-ios-play"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Year
                                    <span><?= $data['tahun_schooter'] ?></span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Max Passenger
                                    <span><?= $data['max_passenger_schooter'] ?></span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="icon-heart"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Color
                                    <span><?= $data['color_schooter'] ?></span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="media-body py-md-4">
                        <div class="d-flex mb-3 align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="ion-ios-arrow-forward"></span></div>
                            <div class="text">
                                <h3 class="heading mb-0 pl-3">
                                    Additional
                                    <span><?= $data['additional_schooter'] ?></span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="text" id="description">
                    <h3 class="text-center">Description</h3>
                    <p><?= $data['description_schooter'] ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('footer.php'); ?>