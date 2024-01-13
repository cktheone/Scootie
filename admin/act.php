<?php
include '../koneksi.php';


if (isset($_POST['tambah_schooter'])) {

    $nama_schooter = $_POST['nama_schooter'];
    $jenis_schooter = $_POST['jenis_schooter'];
    $harga_schooter = $_POST['harga_schooter'];
    $merek_schooter = $_POST['merek_schooter'];
    $tahun_schooter = $_POST['tahun_schooter'];
    $max_passenger_schooter = $_POST['max_passenger_schooter'];
    $color_schooter = $_POST['color_schooter'];
    $additional_schooter = $_POST['additional_schooter'];
    $description_schooter = addslashes($_POST['description_schooter']);
    // $gambar_schooter = $_POST['gambar_schooter'];

    $rand = rand();
    $allowed = array('gif', 'jpg', 'png', 'jpeg');
    $filename = $_FILES['gambar_schooter']['name'];

    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    // var_dump($ext);

    if (!in_array($ext, $allowed)) {
        header("location:schooter.php?alert=gagal");
    } else {
        move_uploaded_file($_FILES['gambar_schooter']['tmp_name'], '../assets/images/' . $rand . '.' . $ext);
        $file_gambar = $rand . '.' . $ext;

        $query = mysqli_query($koneksi, "INSERT INTO schooter SET
        nama_schooter = '$nama_schooter',
        jenis_schooter = '$jenis_schooter',
        harga_schooter = '$harga_schooter',
        merek_schooter = '$merek_schooter',
        tahun_schooter = '$tahun_schooter',
        max_passenger_schooter = '$max_passenger_schooter',
        color_schooter = '$color_schooter',
        additional_schooter = '$additional_schooter',
        description_schooter = '$description_schooter',
        gambar_schooter = '$file_gambar',

        created_schooter = now(),
        updated_schooter = now()
        ");

        if ($query) {
            echo "
                <script>
                document.location.href = 'schooter.php?alert=berhasil';
                </script>
                ";
        } else {
            echo "
                <script>
                document.location.href = 'schooter.php?alert=gagal';
                </script>
                ";
        }
    }
}

if (isset($_POST['update_booking'])) {

    $id_booking = $_POST['id_booking'];
    $status_booking = $_POST['status_booking'];

    $query = mysqli_query($koneksi, "UPDATE booking SET
    status_booking = '$status_booking',
    updated_booking = now()
    WHERE id_booking = $id_booking
    ");

    if ($query) {
        echo "
            <script>
            document.location.href = 'pesanan.php?alert=berhasil';
            </script>
            ";
    } else {
        echo "
            <script>
            document.location.href = 'pesanan.php?alert=gagal';
            </script>
            ";
    }
}

if (isset($_POST['hapus_booking'])) {

    $id_booking = $_POST['id_booking'];

    $query = mysqli_query($koneksi, "DELETE FROM booking WHERE id_booking = $id_booking
    ");

    if ($query) {
        echo "
            <script>
            document.location.href = 'pesanan.php?alert=berhasilHapus';
            </script>
            ";
    } else {
        echo "
            <script>
            document.location.href = 'pesanan.php?alert=gagalHapus';
            </script>
            ";
    }
}

if (isset($_POST['hapus_schooter'])) {

    $id_schooter = $_POST['id_schooter'];
    $gambar_schooter = $_POST['gambar_schooter'];

    unlink("../assets/images/$gambar_schooter");

    $query = mysqli_query($koneksi, "DELETE FROM schooter WHERE id_schooter = $id_schooter
    ");

    if ($query) {
        echo "
            <script>
            document.location.href = 'schooter.php?alert=berhasilHapus';
            </script>
            ";
    } else {
        echo "
            <script>
            document.location.href = 'schooter.php?alert=gagalHapus';
            </script>
            ";
    }
}

if (isset($_POST['ubah_schooter'])) {

    $id_schooter = $_POST['id_schooter'];

    $nama_schooter = $_POST['nama_schooter'];
    $jenis_schooter = $_POST['jenis_schooter'];
    $harga_schooter = $_POST['harga_schooter'];
    $merek_schooter = $_POST['merek_schooter'];
    $tahun_schooter = $_POST['tahun_schooter'];
    $max_passenger_schooter = $_POST['max_passenger_schooter'];
    $color_schooter = $_POST['color_schooter'];
    $additional_schooter = $_POST['additional_schooter'];
    $description_schooter = addslashes($_POST['description_schooter']);
    $gambar_schooter = $_POST['gambar_schooter2'];

    $rand = rand();
    $allowed = array('gif', 'jpg', 'png', 'jpeg');
    $filename = $_FILES['gambar_schooter']['name'];

    if ($filename == "") {
        $query = mysqli_query($koneksi, "UPDATE schooter SET
            nama_schooter = '$nama_schooter',
            jenis_schooter = '$jenis_schooter',
            harga_schooter = '$harga_schooter',
            merek_schooter = '$merek_schooter',
            tahun_schooter = '$tahun_schooter',
            max_passenger_schooter = '$max_passenger_schooter',
            color_schooter = '$color_schooter',
            additional_schooter = '$additional_schooter',
            description_schooter = '$description_schooter',
            updated_schooter = now()
            WHERE id_schooter = $id_schooter
            ");

        if ($query) {
            echo "
                    <script>
                    document.location.href = 'schooter.php?alert=berhasilUbah';
                    </script>
                    ";
        } else {
            echo "
                    <script>
                    document.location.href = 'schooter.php?alert=gagalUbah';
                    </script>
                    ";
        }
    } else {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if (!in_array($ext, $allowed)) {
            header("location:schooter.php?alert=gagal");
        } else {
            move_uploaded_file($_FILES['gambar_schooter']['tmp_name'], '../assets/images/' . $rand . '.' . $ext);
            $file_gambar = $rand . '.' . $ext;

            unlink("../assets/images/$gambar_schooter");

            $query = mysqli_query($koneksi, "UPDATE schooter SET
            nama_schooter = '$nama_schooter',
            jenis_schooter = '$jenis_schooter',
            harga_schooter = '$harga_schooter',
            merek_schooter = '$merek_schooter',
            tahun_schooter = '$tahun_schooter',
            max_passenger_schooter = '$max_passenger_schooter',
            color_schooter = '$color_schooter',
            additional_schooter = '$additional_schooter',
            description_schooter = '$description_schooter',
            gambar_schooter = '$file_gambar',
            updated_schooter = now()
            WHERE id_schooter = $id_schooter
            ");

            if ($query) {
                echo "
                    <script>
                    document.location.href = 'schooter.php?alert=berhasilUbah';
                    </script>
                    ";
            } else {
                echo "
                    <script>
                    document.location.href = 'schooter.php?alert=gagalUbah';
                    </script>
                    ";
            }
        }
    }
}

if (isset($_POST['tambah_lokasi'])) {

    $nama_lokasi = addslashes($_POST['nama_lokasi']);

    $query = mysqli_query($koneksi, "INSERT INTO lokasi SET
        nama_lokasi = '$nama_lokasi',
        created_lokasi = now(),
        updated_lokasi = now()
        ");

    if ($query) {
        echo "
                <script>
                document.location.href = 'lokasi.php?alert=berhasil';
                </script>
                ";
    } else {
        echo "
                <script>
                document.location.href = 'lokasi.php?alert=gagal';
                </script>
                ";
    }
}

if (isset($_POST['hapus_lokasi'])) {

    $id_lokasi = $_POST['id_lokasi'];

    $query = mysqli_query($koneksi, "DELETE FROM lokasi WHERE id_lokasi = $id_lokasi
    ");

    if ($query) {
        echo "
            <script>
            document.location.href = 'lokasi.php?alert=berhasilHapus';
            </script>
            ";
    } else {
        echo "
            <script>
            document.location.href = 'lokasi.php?alert=gagalHapus';
            </script>
            ";
    }
}

if (isset($_POST['ubah_lokasi'])) {

    $id_lokasi = $_POST['id_lokasi'];
    $nama_lokasi = $_POST['nama_lokasi'];

    $query = mysqli_query($koneksi, "UPDATE lokasi SET
    nama_lokasi = '$nama_lokasi',
    updated_lokasi = now()
    WHERE id_lokasi = $id_lokasi
    ");

    if ($query) {
        echo "
            <script>
            document.location.href = 'lokasi.php?alert=berhasilUbah';
            </script>
            ";
    } else {
        echo "
            <script>
            document.location.href = 'lokasi.php?alert=gagalUbah';
            </script>
            ";
    }
}

if (isset($_POST['hapus_admin'])) {

    $id_admin = $_POST['id_admin'];

    $query = mysqli_query($koneksi, "DELETE FROM admin WHERE id_admin = $id_admin
    ");

    if ($query) {
        echo "
            <script>
            document.location.href = 'admin.php?alert=berhasilHapus';
            </script>
            ";
    } else {
        echo "
            <script>
            document.location.href = 'admin.php?alert=gagalHapus';
            </script>
            ";
    }
}

if (isset($_POST['tambah_admin'])) {

    $nama_admin = addslashes($_POST['nama_admin']);
    $username_admin = addslashes($_POST['username_admin']);
    $password_admin = addslashes($_POST['password_admin']);
    $konfirmasi_password_admin = addslashes($_POST['konfirmasi_password_admin']);
    $status_admin = addslashes($_POST['status_admin']);

    $cek = mysqli_query($koneksi, "SELECT username_admin FROM admin WHERE username_admin = '$username_admin'");
    if (mysqli_num_rows($cek) != 0) {
        echo "
                <script>
                document.location.href = 'admin_tambah.php?alert=gagalUsername';
                </script>
                ";
    }

    if ($password_admin != $konfirmasi_password_admin) {
        echo "
                <script>
                document.location.href = 'admin_tambah.php?alert=gagalPassword';
                </script>
                ";
    } else {
        $password_admin_md5 = addslashes(md5($password_admin));

        $query = mysqli_query($koneksi, "INSERT INTO admin SET
        nama_admin = '$nama_admin',
        username_admin = '$username_admin',
        password_admin = '$password_admin_md5',
        status_admin = '$status_admin',
        created_admin = now(),
        updated_admin = now()
        ");

        if ($query) {
            echo "
                <script>
                document.location.href = 'admin.php?alert=berhasil';
                </script>
                ";
        } else {
            echo "
                <script>
                document.location.href = 'admin.php?alert=gagal';
                </script>
                ";
        }
    }
}

if (isset($_POST['ubah_profil_admin'])) {

    $id_admin = $_POST['id_admin'];
    $nama_admin = $_POST['nama_admin'];
    $username_admin = $_POST['username_admin'];
    $status_admin = $_POST['status_admin'];

    $cek = mysqli_query($koneksi, "SELECT username_admin FROM admin WHERE username_admin = '$username_admin' AND id_admin != '$id_admin'");
    if (mysqli_num_rows($cek) != 0) {
        echo "
                <script>
                document.location.href = 'profil.php?id=$id_admin&alert=gagalUsername';
                </script>
                ";
    } else {
        $query = mysqli_query($koneksi, "UPDATE admin SET
        nama_admin = '$nama_admin',
        username_admin = '$username_admin',
        status_admin = '$status_admin',
        updated_admin = now()
        WHERE id_admin = $id_admin
        ");

        if ($query) {
            echo "
                <script>
                document.location.href = 'profil.php?id=$id_admin&alert=berhasilUbah';
                </script>
                ";
        } else {
            echo "
                <script>
                document.location.href = 'profil.php?id=$id_admin&alert=gagalUbah';
                </script>
                ";
        }
    }
}

if (isset($_POST['ubah_admin'])) {

    $id_admin = $_POST['id_admin'];
    $nama_admin = $_POST['nama_admin'];
    $username_admin = $_POST['username_admin'];
    $status_admin = $_POST['status_admin'];

    $cek = mysqli_query($koneksi, "SELECT username_admin FROM admin WHERE username_admin = '$username_admin' AND id_admin != '$id_admin'");
    if (mysqli_num_rows($cek) != 0) {
        echo "
                <script>
                document.location.href = 'admin_details.php?id=$id_admin&alert=gagalUsername';
                </script>
                ";
    } else {
        $query = mysqli_query($koneksi, "UPDATE admin SET
        nama_admin = '$nama_admin',
        username_admin = '$username_admin',
        status_admin = '$status_admin',
        updated_admin = now()
        WHERE id_admin = $id_admin
        ");

        if ($query) {
            echo "
                <script>
                document.location.href = 'admin.php?alert=berhasilUbah';
                </script>
                ";
        } else {
            echo "
                <script>
                document.location.href = 'admin.php?alert=gagalUbah';
                </script>
                ";
        }
    }
}

if (isset($_POST['ubah_password_admin'])) {


    $password_lama = md5($_POST['password_lama']);
    $password_baru = md5($_POST['password_baru']);
    $konfirmasi_password_baru = md5($_POST['konfirmasi_password_baru']);

    $id_admin = $_POST['id_admin'];



    $query2 = mysqli_query($koneksi, "SELECT password_admin FROM admin WHERE id_admin = '$id_admin'");
    $data2 = mysqli_fetch_assoc($query2);
    if ($data2['password_admin'] != $password_lama) {
        echo "
                <script>
                document.location.href = 'password.php?id=$id_admin&alert=gagalPasswordLama';
                </script>
                ";
    } else {
        if ($password_baru != $konfirmasi_password_baru) {
            echo "
                    <script>
                    document.location.href = 'password.php?id=$id_admin&alert=gagalPassword';
                    </script>
                    ";
        } else {
            $query = mysqli_query($koneksi, "UPDATE admin SET
            password_admin = '$password_baru',
            updated_admin = now()
            WHERE id_admin = $id_admin
            ");

            if ($query) {
                echo "
                <script>
                document.location.href = 'password.php?id=$id_admin&alert=berhasilUbah';
                </script>
                ";
            } else {
                echo "
                <script>
                document.location.href = 'password.php?id=$id_admin&alert=gagalUbah';
                </script>
                ";
            }
        }
    }
}

if (isset($_POST['ubah_pengaturan'])) {

    $id_pengaturan = $_POST['id_pengaturan'];
    $youtubelink_pengaturan = $_POST['youtubelink_pengaturan'];
    $nowa_pengaturan = $_POST['nowa_pengaturan'];

    $query = mysqli_query($koneksi, "UPDATE pengaturan SET
    youtubelink_pengaturan = '$youtubelink_pengaturan',
    nowa_pengaturan = '$nowa_pengaturan'
    WHERE id_pengaturan = $id_pengaturan
    ");

    if ($query) {
        echo "
            <script>
            document.location.href = 'pengaturan.php?alert=berhasilUbah';
            </script>
            ";
    } else {
        echo "
            <script>
            document.location.href = 'pengaturan.php?alert=gagalUbah';
            </script>
            ";
    }
}
