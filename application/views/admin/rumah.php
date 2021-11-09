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
            <?= form_error('menu', '<div id="alert" class="rounded-md px-5 py-4 mb-2 bg-theme-6 text-white text-center">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h4 class="card-title">Kategori Rumah</h4>
                                <!-- <div>
                                    <button type="button" class="btn btn-primary btn-sm waves-effect btn-label waves-light" data-toggle="modal" data-target="#kategori"><i class="bx bx-plus label-icon"></i> Tambah Tipe Rumah</button>
                                </div> -->
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>KATEGORI</th>
                                            <!-- <th>AKSI</th> -->
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($kategori as $k) : ?>
                                            <tr>
                                                <th scope="row"><?= $i; ?></th>
                                                <td><?= $k['kategori']; ?></td>
                                                <!-- <td>
                                                    <a href="<?= base_url('administrator/edittipe/') . $k['id']; ?>" type="button" class="btn btn-warning btn-sm waves-effect btn-label waves-light"><i class="bx bx-edit label-icon "></i> Edit</a>
                                                    <a href="<?= base_url('administrator/delete_tipe_rumah/') . $k['id']; ?>" type="button" class="btn btn-danger btn-sm waves-effect btn-label waves-light"><i class="bx bx-trash-alt label-icon "></i> Delete</a>

                                                </td> -->
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
                                <!-- <div>
                                    <button type="button" class="btn btn-primary btn-sm waves-effect btn-label waves-light" data-toggle="modal" data-target="#lokasi"><i class="bx bx-plus label-icon"></i> Tambah Lokasi Rumah</button>
                                </div> -->
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Lokasi</th>
                                            <th>Unit</th>
                                            <!-- <th>AKSI</th> -->
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($lokasi as $l) : ?>
                                            <tr>
                                                <th scope="row"><?= $i; ?></th>
                                                <td><?= $l['lokasi']; ?></td>
                                                <td><?= $l['unit']; ?></td>
                                                <!-- <td>
                                                    <a href="<?= base_url('administrator/editlokasi/') . $l['id']; ?>" type="button" class="btn btn-warning btn-sm waves-effect btn-label waves-light"><i class="bx bx-edit label-icon "></i> Edit</a>
                                                    <a href="<?= base_url('administrator/delete_lokasi_rumah/') . $l['id']; ?>" onclick="return confirm('Menghapus lokasi rumah akan menghapus data rumah yang terdapat pada lokasi tersebut. Lanjut?');" type="button" class="btn btn-danger btn-sm waves-effect btn-label waves-light"><i class="bx bx-trash-alt label-icon "></i> Delete</a>

                                                </td> -->
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
                                <!-- <div>
                                    <button type="button" class="btn btn-primary btn-sm waves-effect btn-label waves-light" data-toggle="modal" data-target="#rumah"><i class="bx bx-plus label-icon"></i> Tambah Rumah</button>
                                </div> -->
                            </div>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>HARGA</th>
                                        <th>LOKASI</th>
                                        <th>BLOK</th>
                                        <!-- <th>AKSI</th> -->
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
                                            <!-- <td>
                                                <button type="button" class="btn btn-warning btn-sm waves-effect btn-label waves-light"><i class="bx bx-edit label-icon "></i> Edit</button>
                                                <a href="<?= base_url('administrator/delete_rumah/') . $l['id']; ?>" type="button" class="btn btn-danger btn-sm waves-effect btn-label waves-light"><i class="bx bx-trash-alt label-icon "></i> Delete</a>
                                                <a href="<?= base_url('administrator/detailrumah/') . $l['id']; ?>" type="button" class="btn btn-info btn-sm waves-effect btn-label waves-light"><i class="bx bx-detail label-icon "></i> Detail</button>

                                            </td> -->
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

    <div id="kategori" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="kategoriLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="<?= base_url('administrator/save_kategori'); ?>" method="post">
                        <div class="form-group">
                            <label>Tipe Rumah</label>
                            <input type="text" class="form-control" name="kategori" required placeholder="Tipe Rumah">
                        </div>

                        <div class="form-group">
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success btn-sm waves-effect btn-label waves-light"><i class="bx bx-save label-icon "></i> Save</button>
                                <button type="button" class="btn btn-warning btn-sm waves-effect btn-label waves-light" data-dismiss="modal"><i class="bx bx-error label-icon "></i> Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <div id="lokasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="lokasiLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="<?= base_url('administrator/save_lokasi'); ?>" method="post">
                        <div class="form-group">
                            <label>Lokasi Rumah</label>
                            <input type="text" class="form-control" name="lokasi" required placeholder="Lokasi">
                        </div>
                        <div class="form-group">
                            <label>Unit</label>
                            <input type="number" class="form-control" name="unit" required placeholder="Unit">
                        </div>
                        <div class="form-group">
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success btn-sm waves-effect btn-label waves-light"><i class="bx bx-save label-icon "></i> Save</button>
                                <button type="button" class="btn btn-warning btn-sm waves-effect btn-label waves-light" data-dismiss="modal"><i class="bx bx-error label-icon "></i> Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <div id="rumah" class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="rumahLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="<?= base_url('administrator/save_rumah'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Pilih Tipe</label>
                                    <select class="form-control select2" name="tipe_id" required>
                                        <option>Select</option>
                                        <?php foreach ($kategori as $k) : ?>
                                            <option value="<?= $k['id'] ?>"><?= $k['kategori'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="number" class="form-control" name="harga" required placeholder="Harga">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Pilih Lokasi</label>
                                    <select class="form-control select2" name="lokasi_id" required>
                                        <option>Select</option>
                                        <?php foreach ($lokasi as $l) : ?>
                                            <option value="<?= $l['id'] ?>"><?= $l['lokasi'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Luas</label>
                                    <input type="text" class="form-control" name="luas" required placeholder="Luas">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Blok</label>
                                    <input type="text" class="form-control" name="blok" required placeholder="Blok">
                                </div>
                                <div class="form-group">
                                    <label for="image">Foto Rumah</label>
                                    <input type="file" class="form-control customs-file-input" name="image" id="image" placeholder="Foto Rumah" required>
                                    <!-- <label class="custom-file-label " for="image"> </label> -->
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success btn-sm waves-effect btn-label waves-light"><i class="bx bx-save label-icon "></i> Save</button>
                                <button type="button" class="btn btn-warning btn-sm waves-effect btn-label waves-light" data-dismiss="modal"><i class="bx bx-error label-icon "></i> Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <script src="<?= base_url('assets/js/jquery-3.6.0.js'); ?>"></script>
    <script>
        $('.customs-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>