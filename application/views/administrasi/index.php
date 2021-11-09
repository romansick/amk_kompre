<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18"></h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Administrasi</a></li>
                                <li class="breadcrumb-item active"><?= $title; ?></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="card bg-primary text-white-50">
                        <div class="card-body">
                            <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-account mr-3"></i> Total Konsumen</h5>
                            <h3 class="card-text text-white">
                                <?php if ($konsumen > 0) : ?>
                                    <?php echo $konsumen ?>
                                <?php else : ?>
                                    <?= '0'; ?>
                                <?php endif; ?>
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card bg-success text-white-50">
                        <div class="card-body">
                            <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-warehouse mr-3"></i> Total Tipe Rumah</h5>
                            <h3 class="card-text text-white">
                                <?php if ($rumah > 0) : ?>
                                    <?php echo $rumah ?>
                                <?php else : ?>
                                    <?= '0'; ?>
                                <?php endif; ?>
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card bg-info text-white-50">
                        <div class="card-body">
                            <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-credit-card mr-3"></i>Total Transaksi</h5>
                            <h3 class="card-text text-white">
                                <?php if ($transaksi > 0) : ?>
                                    <?php echo $transaksi ?>
                                <?php else : ?>
                                    <?= '0'; ?>
                                <?php endif; ?>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <div class="card bg-soft-primary">
                        <div>
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-3">
                                        <h5 class="text-primary">Selamat Datang!</h5>
                                        <p><?= $user['nama']; ?></p>

                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="assets\images\profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="row">
                        <?php foreach ($lokasi as $t) : ?>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="avatar-xs mr-3">
                                                <span class="avatar-title rounded-circle bg-soft-primary text-primary font-size-18">
                                                    <i class="bx bxs-building-house"></i>
                                                </span>
                                            </div>
                                            <h5 class="font-size-14 mb-0"><?= $t['lokasi']; ?></h5>
                                        </div>
                                        <div class="text-muted mt-4">
                                            <h4><?= $t['unit']; ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- end row -->
                </div>
            </div>


        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->