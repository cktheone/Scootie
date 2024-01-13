<?php
include 'koneksi.php';
date_default_timezone_set('Asia/Jakarta');
session_start();
error_reporting(E_ERROR | E_PARSE);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Scootie | Scooter Rental</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/solid.min.css">


    <link rel="stylesheet" href="assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">

    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">

    <link rel="stylesheet" href="assets/css/aos.css">

    <link rel="stylesheet" href="assets/css/ionicons.min.css">

    <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="assets/css/jquery.timepicker.css">


    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/icomoon.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container bg-light">
            <a class="navbar-brand" href="./"><img src="assets/images/logo-scootie.png" height="42"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?php if ($page == 'Home') echo "active"; ?>"><a href="./" class="nav-link" style="color: black;">Home</a></li>
                    <li class="nav-item <?php if ($page == 'Schooter') echo "active"; ?>"><a href="schooter.php" class="nav-link" style="color: black;">Schooter</a></li>
                    <li class="nav-item <?php if ($page == 'Track') echo "active"; ?>"><a href="invoice.php" class="nav-link" style="color: black;">Track Order</a></li>
                    <?php
                    if (isset($_SESSION['id'])) { ?>
                        <li class="nav-item"><a href="admin/" class="nav-link" style="color: black;"><button class="btn btn-secondary">Dashboard</button></a></li>
                    <?php } else { ?>
                        <li class="nav-item"><a href="login.php" class="nav-link" style="color: black;"><button class="btn btn-secondary">Login</button></a></li>
                    <?php }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->