<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

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
                            <div class="invoice-ribbon">
                                <?php if ($invoice['status_pembayaran'] == 'Pending') : ?>
                                    <div class="ribbon-inner danger">UNPAID</div>
                                <?php elseif ($invoice['status_pembayaran'] == 'Berhasil') : ?>
                                    <div class="ribbon-inner">PAID</div>
                                <?php else : ?>
                                    <div class="ribbon-inner danger">FAILED</div>
                                <?php endif; ?>
                            </div>
                            <div class="invoice-title">
                                <h4 class="float-left font-size-16"><?= $invoice['kode_transaksi']; ?></h4>
                                <div class="mb-4">
                                    <img src="assets\images\logo-dark.png" alt="logo" height="20">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <address>
                                        <strong>Billed To:</strong><br>
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
                                <h3 class="font-size-15 font-weight-bold">Order summary</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-nowrap">
                                    <thead>
                                        <tr>
                                            <th style="width: 70px;">No.</th>
                                            <th>Item</th>
                                            <th class="text-right">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01</td>
                                            <td>Skote - Bootstrap 4 Admin Dashboard</td>
                                            <td class="text-right">$499.00</td>
                                        </tr>

                                        <tr>
                                            <td>02</td>
                                            <td>Skote - Bootstrap 4 Landing Template</td>
                                            <td class="text-right">$399.00</td>
                                        </tr>

                                        <tr>
                                            <td>03</td>
                                            <td>Veltrix - Bootstrap 4 Admin Template</td>
                                            <td class="text-right">$499.00</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-right">Sub Total</td>
                                            <td class="text-right">$1397.00</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="border-0 text-right">
                                                <strong>Shipping</strong>
                                            </td>
                                            <td class="border-0 text-right">$13.00</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="border-0 text-right">
                                                <strong>Total</strong>
                                            </td>
                                            <td class="border-0 text-right">
                                                <h4 class="m-0">$1410.00</h4>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-print-none">
                                <div class="float-right">
                                    <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light mr-1"><i class="fa fa-print"></i></a>
                                    <a href="#" class="btn btn-primary w-md waves-effect waves-light">Send</a>
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