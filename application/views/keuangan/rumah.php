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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Keuangan</a></li>
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
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h4 class="card-title">Kategori Rumah</h4>

                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>KATEGORI</th>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($kategori as $k) : ?>
                                            <tr>
                                                <th scope="row"><?= $i; ?></th>
                                                <td><?= $k['kategori']; ?></td>
                                            </tr>
                                        <?php $i++;
                                        endforeach; ?>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h4 class="card-title">Lokasi Rumah</h4>

                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Lokasi</th>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($lokasi as $l) : ?>
                                            <tr>
                                                <th scope="row"><?= $i; ?></th>
                                                <td><?= $l['lokasi']; ?></td>

                                            </tr>
                                        <?php $i++;
                                        endforeach; ?>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h4 class="card-title">List Rumah</h4>
                            </div>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>HARGA</th>
                                        <th>LOKASI</th>
                                        <th>BLOK</th>
                                        <th>UNIT</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i = 1;
                                    foreach ($rumah as $l) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td> RP <?= $l['harga']; ?></td>
                                            <td><?= $l['lokasi']; ?></td>
                                            <td><?= $l['blok']; ?></td>
                                            <td><?= $l['unit']; ?></td>
                                            <td>
                                                <a href="<?= base_url('keuangan/detailrumah/') . $l['id']; ?>" type="button" class="btn btn-info btn-sm waves-effect btn-label waves-light"><i class="bx bx-detail label-icon "></i> Detail</button>

                                            </td>
                                        </tr>
                                    <?php $i++;
                                    endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->


        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->