<body data-spy="scroll" data-target="#topnav-menu" data-offset="60">

    <nav class="navbar navbar-expand-lg navigation fixed-top sticky">
        <div class="container">
            <a class="navbar-logo" href="index.html">
                <h2 class="logo logo-dark" style="color: black;"> PT. AMK</h2>
                <h2 class="logo logo-light" style="color: white;"> PT. AMK</h2>
            </a>

            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-toggle="collapse" data-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav ml-auto" id="topnav-menu">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#roadmap">Perumahan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#team">Team</a>
                    </li>

                </ul>

                <div class="ml-lg-2">
                    <a href="<?= base_url('auth/register'); ?>" class="btn btn-outline-success w-xs">Sign Up</a>
                    <a href="<?= base_url('auth/login'); ?>" class="btn btn-outline-primary w-xs">Sign in</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- hero section start -->
    <section class="section hero-section bg-ico-hero" id="home">
        <div class="bg-overlay bg-primary"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="text-white-50">
                        <h1 class="text-white font-weight-semibold mb-3 hero-title">PT. Ardhana Mitra Kencana</h1>
                        <!-- <p class="font-size-14">It will be as simple as occidental in fact to an English person, it will seem like simplified as a skeptical Cambridge</p> -->

                    </div>
                </div>
                <div class="col-lg-5 col-md-8 col-sm-10 ml-lg-auto">
                    <img src="<?= base_url('assets/home.png'); ?>" class="img-fluid" width="100%" alt="">
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- hero section end -->


    <!-- Features start -->
    <!-- <section class="section" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">Features</div>
                        <h4>Key features of the product</h4>
                    </div>
                </div>
            </div>

            <div class="row align-items-center pt-4">
                <div class="col-md-6 col-sm-8">
                    <div>
                        <img src="<?= base_url('assets/images/crypto/features-img/img-1.png'); ?>" alt="" class="img-fluid mx-auto d-block">
                    </div>
                </div>
                <div class="col-md-5 ml-auto">
                    <div class="mt-4 mt-md-auto">
                        <div class="d-flex align-items-center mb-2">
                            <div class="features-number font-weight-semibold display-4 mr-3">01</div>
                            <h4 class="mb-0">Lending</h4>
                        </div>
                        <p class="text-muted">If several languages coalesce, the grammar of the resulting language is more simple and regular than of the individual will be more simple and regular than the existing.</p>
                        <div class="text-muted mt-4">
                            <p class="mb-2"><i class="mdi mdi-circle-medium text-success mr-1"></i>Donec pede justo vel aliquet</p>
                            <p><i class="mdi mdi-circle-medium text-success mr-1"></i>Aenean et nisl sagittis</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mt-5 pt-md-5">
                <div class="col-md-5">
                    <div class="mt-4 mt-md-0">
                        <div class="d-flex align-items-center mb-2">
                            <div class="features-number font-weight-semibold display-4 mr-3">02</div>
                            <h4 class="mb-0">Wallet</h4>
                        </div>
                        <p class="text-muted">It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend.</p>
                        <div class="text-muted mt-4">
                            <p class="mb-2"><i class="mdi mdi-circle-medium text-success mr-1"></i>Donec pede justo vel aliquet</p>
                            <p><i class="mdi mdi-circle-medium text-success mr-1"></i>Aenean et nisl sagittis</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-sm-8 ml-md-auto">
                    <div class="mt-4 mr-md-0">
                        <img src="<?= base_url('assets/images/crypto/features-img/img-2.png'); ?>" alt="" class="img-fluid mx-auto d-block">
                    </div>
                </div>

            </div>
        </div>
    </section> -->
    <!-- Features end -->

    <!-- Roadmap start -->
    <section class="section bg-white" id="roadmap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">


                    <div class="row">
                        <?php foreach ($rumah as $r) : ?>
                            <div class="col-xl-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="product-img position-relative">
                                            <img src="<?= base_url('rumah/') . $r['image']; ?>" alt="" class="img-fluid mx-auto d-block">
                                        </div>
                                        <div class="mt-4 text-center">
                                            <h5 class="mb-3 text-truncate"><a href="#" class="text-dark"><?= $r['kategori']; ?> </a></h5>
                                            <h5 class="my-0"><b>Rp <?= $r['harga']; ?></b></h5>
                                        </div>
                                    </div>
                                    <div class="btn-group btn-group-example" role="group">
                                        <a href="<?= base_url('auth/login'); ?>" type="button" class="btn btn-warning w-xs">Buy</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- end row -->

                </div>
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- Roadmap end -->

    <!-- Team start -->
    <section class="section" id="team">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <div class="small-title">Team</div>
                        <h4>Meet our team</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="col-lg-12">
                <div class="owl-carousel owl-theme events navs-carousel" id="team-carousel">
                    <?php foreach ($user as $u) : ?>
                        <div class="item">
                            <div class="card text-center team-box">
                                <div class="card-body">
                                    <div>
                                        <img src="<?= base_url('assets/images/users/avatar-2.jpg'); ?>" alt="" class="rounded">
                                    </div>

                                    <div class="mt-3">
                                        <h5><?= $u['nama']; ?></h5>
                                        <!-- <p class="text-muted mb-0">CEO & Lead</p> -->
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent border-top">
                                    <div class="d-flex mb-0 team-social-links">
                                        <div class="flex-fill">
                                            <a href="#" data-toggle="tooltip" title="Facebook">
                                                <i class="mdi mdi-facebook"></i>
                                            </a>
                                        </div>
                                        <div class="flex-fill">
                                            <a href="#" data-toggle="tooltip" title="Linkedin">
                                                <i class="mdi mdi-linkedin"></i>
                                            </a>
                                        </div>
                                        <div class="flex-fill">
                                            <a href="#" data-toggle="tooltip" title="Google">
                                                <i class="mdi mdi-google"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- Team end -->


    <!-- Footer start -->
    <footer class="landing-footer">
        <div class="container">

            <!-- end row -->

            <hr class="footer-border">

            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-4">
                        <img src="assets/images/logo-light.png" alt="" height="20">
                    </div>

                    <p class="mb-2">2021 PT. Ardhana Mitra Kencana</p>
                </div>

            </div>
        </div>
        <!-- end container -->
    </footer>
    <!-- Footer end -->