<?php
ob_start();
include 'koneksi.php';
date_default_timezone_set('Asia/Jakarta');

if (isset($_POST['btn_login'])) {
    $username = $_POST['username_admin'];
    $password = md5($_POST['password_admin']);
    $sebagai = $_POST['sebagai'];

    if ($sebagai == "administrator") {
        $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username_admin = '$username' AND password_admin = '$password'");
        $data = mysqli_num_rows($query);

        if ($data > 0) {
            session_start();
            $data2 = mysqli_fetch_assoc($query);
            $_SESSION['id'] = $data2['id_admin'];
            $_SESSION['nama'] = $data2['nama_admin'];
            $_SESSION['role'] = $data2['status_admin'];
            $_SESSION['status'] = "administrator_logedin";
            header("location: admin/");
        } else {
            header("location: login.php?alert=gagal");
        }
    }
}

if (isset($_POST['cek_invoice'])) {
    $invoice_booking = $_POST['invoice_booking'];

    $query = mysqli_query($koneksi, "SELECT * FROM booking WHERE invoice_booking = $invoice_booking");
    if (mysqli_num_rows($query) > 0) {
        echo "
            <script>
            document.location.href = 'invoice.php?alert=berhasil&inv=$invoice_booking';
            </script>
            ";
    } else {
        echo "
            <script>
            document.location.href = 'invoice.php?alertgagal=gagal&inv=$invoice_booking';
            </script>
            ";
    }
}

if (isset($_POST['tambah_booking'])) {

    $tahun = date('y');
    $bulan = date('m');
    $tanggal = date('d');
    $jam = date('H');
    $menit = date('i');
    $detik = date('s');

    $invoice_booking = $tahun . $bulan . $tanggal . $jam . $menit . $detik;

    $nama_booking = $_POST['nama_booking'];
    $telp_booking = $_POST['telp_booking'];

    $jenis_schooter_booking = $_POST['jenis_schooter_booking'];
    list($jenis_schooter, $harga_schooter) = explode(',', $jenis_schooter_booking);

    $pickup_location_booking = $_POST['pickup_location_booking'];
    $drofoff_location_booking = $_POST['drofoff_location_booking'];

    $pickup_date_booking = $_POST['pickup_date_booking'];
    $pickup_date = date('Y-m-d', strtotime($pickup_date_booking));

    $drofoff_date_booking = $_POST['drofoff_date_booking'];
    $drofoff_date = date('Y-m-d', strtotime($drofoff_date_booking));

    $pickup_time_booking = $_POST['pickup_time_booking'];

    $tgl_ambil = new DateTime($pickup_date_booking);
    $tgl_kembali = new DateTime($drofoff_date_booking);
    $jumlah_hari_booking = $tgl_kembali->diff($tgl_ambil);

    if ($jumlah_hari_booking->d == 0) {
        $jumlah_hari = 1;
    } else {
        $jumlah_hari = $jumlah_hari_booking->d;
    }

    $total_booking = $harga_schooter * $jumlah_hari;

    $query = mysqli_query($koneksi, "INSERT INTO booking SET
    invoice_booking = '$invoice_booking',

    nama_booking = '$nama_booking',
    telp_booking = '$telp_booking',
    jenis_schooter_booking = '$jenis_schooter',
    pickup_location_booking = '$pickup_location_booking',
    drofoff_location_booking = '$drofoff_location_booking',
    pickup_date_booking = '$pickup_date',
    drofoff_date_booking = '$drofoff_date',
    pickup_time_booking = '$pickup_time_booking',

    total_booking = '$total_booking',

    status_booking = 0,

    created_booking = now(),
    updated_booking = now()
    ");

    if ($query) {
        echo "
            <script>
            document.location.href = 'index.php?alert=berhasil&invoice=$invoice_booking#bookingSection';
            </script>
            ";
    } else {
        echo "
            <script>
            document.location.href = 'index.php?alert=gagal#bookingSection';
            </script>
            ";
    }
}
