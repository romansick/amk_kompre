<body>
    <div class="home-btn d-none d-sm-block">
        <a href="<?= base_url('auth'); ?>" class="text-dark"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-soft-primary">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Selamat Datang di <br> PT. Ardhana Mitra Kencana!</h5>
                                        <p>Login untuk menlanjutkan.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="<?= base_url('assets\images\profile-img.png'); ?>" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <a href="#">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="<?= base_url('assets/logo.png'); ?>" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>

                            <?= $this->session->flashdata('message'); ?>

                            <div class="p-2">
                                <form class="form-horizontal" action="<?= base_url('auth/login'); ?>" method="post">

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter username">
                                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <div class="mt-3">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                                    </div>



                                    <div class="mt-4 text-center">
                                        <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Lupa password?</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-3 text-center">

                        <div>
                            <p>Tidak punya akun ? <a href="<?= base_url('auth/register'); ?>" class="font-weight-medium text-primary"> Daftar Sekarang </a> </p>
                            <p>© 2021 PT. Ardhana Mitra Kencana</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>