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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Administrator</a></li>
                                <li class="breadcrumb-item active"><?= $title; ?></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="<?= base_url('konsumen/save_metode'); ?>" method="post">
                                    <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
                                    <input type="hidden" name="kode_transaksi" value="AMKT<?= $rumah['tipe_id']; ?>U<?= $rumah['id']; ?><?= date('d'); ?><?= $user['id']; ?> ">
                                    <input type="hidden" name="rumah_id" value="<?= $rumah['id']; ?>">
                                    <input type="hidden" name="tipe_id" value="<?= $rumah['tipe_id']; ?>">
                                    <input type="hidden" name="lokasi_id" value="<?= $rumah['lokasi_id']; ?>">
                                    <table class="table table-centered mb-0 table-nowrap">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Gambar</th>
                                                <th>Rumah</th>
                                                <th>Harga</th>
                                                <th>Metode Pembayaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <img src="<?= base_url('rumah/') . $rumah['image']; ?>" alt="product-img" title="product-img" class="avatar-md">

                                                </td>
                                                <td>
                                                    <h5 class="font-size-14 text-truncate"><a href="ecommerce-product-detail.html" class="text-dark"><?= $rumah['kategori']; ?></a></h5>
                                                    <p class="mb-0">Lokasi : <span class="font-weight-medium"><?= $rumah['lokasi']; ?></span></p>
                                                    <p class="mb-0">Blok : <span class="font-weight-medium"><?= $rumah['blok']; ?></span></p>
                                                </td>
                                                <td>
                                                    <input type="text" id="harga_rumah" name="harga_rumah" style="border: 0px;" class="form-control" value=" <?= $rumah['harga']; ?>" placeholder="harga" readonly />

                                                </td>
                                                <td>
                                                    <select class="form-control select2" name="metode_id" required>
                                                        <option value="">--Pilih Metode Pembayaran--</option>
                                                        <?php foreach ($metode as $m) : ?>
                                                            <option value="<?= $m['id'] ?>"><?= $m['metode'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>
                            <div class="row mt-4">

                                <div class="col-sm-6">
                                    <div class="text-sm-right mt-2 mt-sm-0">
                                        <button type="submit" class="btn btn-success">
                                            <i class="mdi mdi-cart-arrow-right mr-1"></i> Checkout </button>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                            </form><!-- end row-->
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->