<?php
$page = "Admin";
include 'header.php';
?>
<h1 class="h3 mb-2 text-gray-800">Admin</h1>
<?php
if ($_SESSION['role'] == 1) { ?>
    <a href="admin_tambah.php" class="btn btn-primary btn-sm btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Admin</span>
    </a>
<?php } ?>

<div class="card shadow mb-4 mt-3">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
    </div>
    <div class="card-body">
        <?php
        if (isset($_GET['alert'])) {
            if ($_GET['alert'] == "berhasil") { ?>
                <div class="alert alert-success">
                    Data admin berhasil ditambah!
                </div>
            <?php } elseif ($_GET['alert'] == "gagal") { ?>
                <div class="alert alert-danger">
                    Data admin gagal ditambah!
                </div>
            <?php } elseif ($_GET['alert'] == "berhasilHapus") { ?>
                <div class="alert alert-success">
                    Data admin berhasil dihapus!
                </div>
            <?php } elseif ($_GET['alert'] == "gagalHapus") { ?>
                <div class="alert alert-danger">
                    Data admin gagal dihapus!
                </div>
            <?php } elseif ($_GET['alert'] == "berhasilUbah") { ?>
                <div class="alert alert-success">
                    Data admin berhasil diubah!
                </div>
            <?php } elseif ($_GET['alert'] == "gagalUbah") { ?>
                <div class="alert alert-danger">
                    Data admin gagal diubah!
                </div>
        <?php }
        } ?>

        <?php
        if ($_SESSION['role'] == 1) { ?>
            <div class="table-responsive">
                <table class="table table-striped small" id="dataTable">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>Nama Admin</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th width="15%">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM admin ORDER BY status_admin DESC");
                        while ($data = mysqli_fetch_array($query)) { ?>
                            <tr>
                                <form action="act.php" method="POST">
                                    <td>
                                        <?= $no++; ?>
                                        <input type="text" name="id_admin" value="<?= $data['id_admin']; ?>" hidden>
                                    </td>
                                    <td><?= $data['nama_admin']; ?></td>
                                    <td><?= $data['username_admin']; ?></td>
                                    <td>
                                        <?php
                                        if ($data['status_admin'] == 1) {
                                            echo 'Super Admin';
                                        } else {
                                            echo 'Admin';
                                        }
                                        ?>
                                    </td>
                                    <td>

                                        <?php
                                        if ($data['id_admin'] != 1) { ?>
                                            <a href="admin_details.php?id=<?= $data['id_admin']; ?>" class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i> Ubah
                                            </a>

                                            <?php
                                            if ($data['id_admin'] != $_SESSION['id']) { ?>
                                                <button type="submit" name="hapus_admin" onclick="return confirm('Apakah anda yakin?');" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            <?php }
                                            ?>


                                        <?php }
                                        ?>


                                        <!-- <?php

                                                if ($data['id_admin'] != 1) { ?>

                                            <?php
                                                    if ($data['id_admin'] != $_SESSION['id']) { ?>

                                            <?php }
                                            ?>

                                        <?php } else { ?>
                                            <?php
                                                    if ($_SESSION['id'] == 1) { ?>
                                                <a href="admin_details.php?id=<?= $data['id_admin']; ?>" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-edit"></i> Ubah
                                                </a>
                                            <?php }
                                            ?>
                                        <?php } ?> -->

                                    </td>
                                </form>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php } else { ?>
            <div class="table-responsive">
                <table class="table table-striped small" id="dataTable">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>Nama Admin</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM admin ORDER BY status_admin DESC");
                        while ($data = mysqli_fetch_array($query)) { ?>
                            <tr>
                                <form action="act.php" method="POST">
                                    <td>
                                        <?= $no++; ?>
                                        <input type="text" name="id_admin" value="<?= $data['id_admin']; ?>" hidden>
                                    </td>
                                    <td><?= $data['nama_admin']; ?></td>
                                    <td>
                                        <?php
                                        if ($data['status_admin'] == 1) {
                                            echo 'Super Admin';
                                        } else {
                                            echo 'Admin';
                                        }
                                        ?>
                                    </td>
                                </form>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php }
        ?>

    </div>
</div>

<?php include 'footer.php'; ?>