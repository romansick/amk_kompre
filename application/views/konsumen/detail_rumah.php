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

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="product-detai-imgs">
                                        <div class="row">

                                            <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                                <div class="tab-content" id="v-pills-tabContent">
                                                    <div class="tab-pane fade show active" id="product-1" role="tabpanel" aria-labelledby="product-1-tab">
                                                        <div>
                                                            <img src="<?= base_url('rumah/') . $rumah['image']; ?>" alt="" class="img-fluid mx-auto d-block">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center mt-3">
                                                    <a href="<?= base_url('konsumen/beli/') . $rumah['id']; ?>" type=" button" class="btn btn-primary waves-effect waves-light mt-2 mr-1">
                                                        <i class="bx bx-cart mr-2"></i> Pesan
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="mt-4 mt-xl-3">
                                        <h4 class="mt-1 mb-3"><?= $rumah['kategori']; ?></h4>

                                        <h5 class="mb-6">Harga Rumah : <?php $rupiah = "Rp " . number_format($rumah['harga'], 2, ',', '.'); ?>
                                            <h3><b><?= $rupiah; ?></b></h3>
                                            <p class="text-muted mb-4"><?= $rumah['deskripsi']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="mt-5">
                                <h5 class="mb-3">Detail :</h5>

                                <div class="table-responsive">
                                    <table class="table mb-0 table-bordered">
                                        <tbody>
                                            <tr>
                                                <th scope="row" style="width: 400px;">Luas</th>
                                                <td><?= $rumah['luas']; ?> m2</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Blok</th>
                                                <td><?= $rumah['blok']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Lokasi</th>
                                                <td><?= $rumah['lokasi'];  ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tipe</th>
                                                <td><?= $rumah['kategori']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Harga</th>
                                                <td><?php $rupiah = "Rp " . number_format($rumah['harga'], 2, ',', '.'); ?>
                                                    <?= $rupiah; ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- end Specifications -->


                        </div>
                    </div>
                    <!-- end card -->
                </div>
            </div>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->