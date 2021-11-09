<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<style>
    .popup {
        width: 60px;
        margin: auto;
        text-align: left
    }

    .popup img {
        width: 50px;
        height: 50px;
        cursor: pointer
    }

    .show {
        z-index: 999;
        display: none;
    }

    .show .overlay {
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .66);
        position: absolute;
        top: 0;
        left: 0;
    }

    .show .img-show {
        width: 600px;
        height: 400px;
        background: #FFF;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        overflow: hidden
    }

    .img-show span {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 99;
        cursor: pointer;
    }

    .img-show img {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
    }

    /*End style*/
</style>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18"></h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Administrator</a></li>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h4 class="card-title"><?= $title; ?></h4>

                            </div>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Kode Transaksi</th>
                                        <th>Konsumen</th>
                                        <th>Metode Pembayaran</th>
                                        <th>Harga Rumah</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Tanggal Pembayaran</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                </thead>

                                <tbody>
                                    <?php foreach ($bayar as $b) : ?>
                                        <tr>
                                            <td><?= $b['kode_transaksi']; ?></td>
                                            <td> <?= $b['nama']; ?></td>
                                            <td><?= $b['metode']; ?></td>
                                            <td><?= $b['harga_rumah']; ?></td>
                                            <td><?= date('d F Y', $b['date_created']); ?></td>
                                            <td>
                                                <?php if ($b['tanggal_bayar'] === null) : ?>
                                                    <p class="text-danger">Tidak Ditemukan</p>
                                                <?php else : ?>
                                                    <?= date('d F Y', $b['tanggal_bayar']); ?>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($b['image'] == null) : ?>
                                                    <p class="text-danger">
                                                        Tidak Ditemukan!
                                                    </p>
                                                <?php else : ?>
                                                    <div class="popup">
                                                        <img src="<?= base_url('bukti/') . $b['image']; ?>" class="img-fluid">
                                                    </div>
                                                    <!-- <button type="button" class="btn btn-success btn-sm btn-rounded" data-toggle="modal" data-target=".exampleModal">
                                                        Bukti Pembayaran
                                                    </button> -->
                                                    <!-- Modal -->
                                                    <!-- <div class="modal fade exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="table-responsive">
                                                                        <table class="table table-centered table-nowrap">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Bukti Pembayaran</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th scope="row">
                                                                                        <div>
                                                                                            <img src="<?= base_url('bukti/') . $b['image']; ?>" alt="" class="img-fluid">
                                                                                        </div>
                                                                                    </th>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($b['status_pembayaran'] === 'Berhasil') : ?>
                                                    <span class="badge badge-success"><?= $b['status_pembayaran']; ?></span>
                                                <?php elseif ($b['status_pembayaran'] === 'Gagal') : ?>
                                                    <span class="badge badge-danger"><?= $b['status_pembayaran']; ?></span>
                                                <?php else : ?>
                                                    <span class="badge badge-warning"><?= $b['status_pembayaran']; ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($b['status_pembayaran'] === 'Berhasil') : ?>
                                                    <a href="<?= base_url('keuangan/view_invoice/') . $b['id']; ?>" type="button" class="btn btn-info btn-sm waves-effect waves-light">
                                                        <i class="bx bx-printer font-size-16 align-middle mr-2"></i> Invoice
                                                    </a>
                                                <?php elseif ($b['status_pembayaran'] === 'Gagal') : ?>
                                                    <p></p>


                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <div class="show">
        <div class="overlay"></div>
        <div class="img-show">
            <span>x</span>
            <img src="">
        </div>
    </div>