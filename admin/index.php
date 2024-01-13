<?php
$page = 'Dashboard';
include 'header.php'; ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">

    <div class="col-xl-9 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            TOTAL PESANAN
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            $query = mysqli_query($koneksi, "SELECT SUM(total_booking) as total FROM booking");
                            $data = mysqli_fetch_assoc($query);
                            ?>
                            Rp <?= number_format($data['total']); ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-dark shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            JUMLAH PESANAN</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM booking");
                            $data = mysqli_num_rows($query);
                            ?>
                            <a href="pesanan.php"><?= $data; ?></a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            MENUNGGU
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM booking WHERE status_booking = 0");
                            $data = mysqli_num_rows($query);
                            ?>
                            <a href="pesanan.php?status_booking=0"><?= $data; ?></a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            PROSES
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM booking WHERE status_booking = 1");
                            $data = mysqli_num_rows($query);
                            ?>
                            <a href="pesanan.php?status_booking=1"><?= $data; ?></a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            SELESAI
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM booking WHERE status_booking = 2");
                            $data = mysqli_num_rows($query);
                            ?>
                            <a href="pesanan.php?status_booking=2"><?= $data; ?></a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            BATAL
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM booking WHERE status_booking = 3");
                            $data = mysqli_num_rows($query);
                            ?>
                            <a href="pesanan.php?status_booking=3"><?= $data; ?></a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<?php include 'footer.php'; ?>