<?php include('header.php'); ?>
<div class="hero-wrap ftco-degree-bg" style="background-image: url('assets/images/galeri-4.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
            <div class="col-lg-6 ftco-animate">
                <form action="act.php" method="POST" class="request-form ftco-animate bg-primary">
                    <h2>Login</h2>
                    <?php
                    if (isset($_GET['alert']) == "gagal") { ?>
                        <div class="alert alert-danger">
                            <small>Username atau password Anda salah!</small>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="form-group">
                        <label class="label">Username</label>
                        <input name="username_admin" type="text" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label class="label">Password</label>
                        <input name="password_admin" type="password" class="form-control" placeholder="Password">
                    </div>

                    <div class="form-group">

                        <input type="radio" value="administrator" name="sebagai" checked>
                        <label class="label">Administrator</label>
                    </div>

                    <div class="form-group">
                        <button name="btn_login" class="btn btn-secondary py-3 px-4" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- <section class="ftco-section contact-section">
    <div class="overlay"></div>
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-3"></div>
            <div class="col-md-6 mt-5">
                <div class="col-md-12 align-items-center">

                    <form action="act.php" method="POST" class="request-form ftco-animate bg-primary">
                        <h2>Login</h2>
                        <div class="form-group">
                            <label class="label">Username</label>
                            <input name="username_admin" type="text" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label class="label">Password</label>
                            <input name="password_admin" type="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label class="label">Role</label>
                            <select name="sebagai" class="form-control" required>
                                <option style="color: black;" value="" selected disabled>--Pilih Role--</option>
                                <option style="color: black;" value="administrator">Administrator</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button name="btn_login" class="btn btn-secondary py-3 px-4" type="submit">Login</button>
                        </div>
                    </form>
                </div>

            </div>
            <div class="col-md-3"></div>
        </div>

    </div>
</section> -->

<?php include('footer.php'); ?>