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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Konsumen</a></li>
                                <li class="breadcrumb-item active"><?= $title; ?></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <?= form_error('menu', '<div id="alert" class="rounded-md px-5 py-4 mb-2 bg-theme-6 text-white text-center">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <div class="row">
                <div class="col-lg-12">

                    <div class="row mb-3">
                        <div class="col-xl-4 col-sm-6">
                        </div>
                        <div class="col-lg-8 col-sm-6">
                            <form class="mt-4 mt-sm-0 float-sm-right form-inline">


                            </form>
                        </div>
                    </div>
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
                                            <?php $rupiah = "Rp " . number_format($r['harga'], 2, ',', '.'); ?>

                                            <h5 class="my-0"><b><?= $rupiah; ?></b></h5>
                                        </div>
                                    </div>
                                    <div class="btn-group btn-group-example" role="group">
                                        <a href="<?= base_url('konsumen/beli/') . $r['id']; ?>" type="button" class="btn btn-warning w-xs">Buy</a>
                                        <a href="<?= base_url('konsumen/detailrumah/') . $r['id']; ?>" type="button" class="btn btn-info w-xs">View</i></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- end row -->

                </div>
            </div>
            <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->