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
                        <h4 class="mb-0 font-size-18">Detail</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Invoices</a></li>
                                <li class="breadcrumb-item active">Detail</li>
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

                            <style>
                                .invoice-ribbon {
                                    width: 85px;
                                    height: 88px;
                                    overflow: hidden;
                                    position: absolute;
                                    top: -1px;
                                    right: 14px;
                                }

                                .ribbon-inner {
                                    text-align: center;
                                    -webkit-transform: rotate(45deg);
                                    -moz-transform: rotate(45deg);
                                    -ms-transform: rotate(45deg);
                                    -o-transform: rotate(45deg);
                                    position: relative;
                                    padding: 7px 0;
                                    left: -5px;
                                    top: 11px;
                                    width: 120px;
                                    background-color: #66c591;
                                    font-size: 15px;
                                    color: #fff;
                                }

                                .danger {

                                    background-color: red;
                                }

                                .ribbon-inner:before,
                                .ribbon-inner:after {
                                    content: "";
                                    position: absolute;
                                }

                                .ribbon-inner:before {
                                    left: 0;
                                }

                                .ribbon-inner:after {
                                    right: 0;
                                }
                            </style>
                            <div class="invoice-ribbon">
                                <?php if ($invoice['status_pembayaran'] === 'Pending' || $invoice['status_pembayaran'] === 'Gagal') : ?>
                                    <div class="ribbon-inner danger">UNPAID</div>
                                <?php elseif ($invoice['status_pembayaran'] === 'Berhasil') : ?>
                                    <div class="ribbon-inner">PAID</div>
                                <?php endif; ?>
                            </div>
                            <div class="invoice-title">
                                <div class="float-left mb-4 mr-3">
                                    <img src="<?= base_url('assets/logo.png'); ?>" alt="logo" height="20">
                                </div>
                                <h3 class="font-size-16"> <b> <?= $invoice['kode_transaksi']; ?></b></h3>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <address>
                                        <strong>Atas Nama: </strong><br>
                                        <?= $invoice['nama']; ?><br>
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 mt-3">
                                    <address>
                                        <strong>Metode Pembayaran:</strong><br>
                                        <?= $invoice['metode']; ?> <br>
                                        <?= $invoice['nama_bank'] . " - " . $invoice['no_rek'] . " - " . $invoice['nama_pemilik']; ?>
                                    </address>
                                </div>
                                <div class="col-sm-6 mt-3 text-sm-right">
                                    <address>
                                        <strong>Tanggal Pemesanan:</strong><br>
                                        <?= date('d F Y', $invoice['date_created']); ?><br>
                                    </address>
                                </div>
                            </div>
                            <div class="py-2 mt-3">
                                <h3 class="font-size-15 font-weight-bold">Detail Pemesanan</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-nowrap">
                                    <thead>
                                        <tr>
                                            <th style="width: 200px;">Kode Transaksi</th>
                                            <th>Tipe Rumah</th>
                                            <th>Harga Rumah</th>
                                            <th>Bukti Pembayaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b><?= $invoice['kode_transaksi']; ?></b></td>
                                            <td><b><?= $invoice['kategori']; ?></b></td>
                                            <td><?= $invoice['harga_rumah']; ?></td>
                                            <td><img src="<?= base_url('bukti/') . $invoice['image']; ?>" alt=""></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-print-none">
                                <div class="float-right">
                                    <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light mr-1"><i class="fa fa-print"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Skote.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-right d-none d-sm-block">
                        Design & Develop by Themesbrand
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- end main content-->