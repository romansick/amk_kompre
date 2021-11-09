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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title"><?= $title; ?></h4>
                            <form action="<?= base_url('administrator/savetipe'); ?>" method="post">
                                <input type="hidden" name="id" value="<?= $tipe['id']; ?>">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Tipe </label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" value="<?= $tipe['kategori']; ?>" name="kategori" id="example-text-input">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="<?= base_url('administrator/rumah'); ?>" onclick="return confirm('Batalkan perubahan ?');" type="button" class="btn btn-warning btn-sm waves-effect btn-label waves-light mr-3" data-dismiss="modal"><i class="bx bx-left-arrow-alt label-icon "></i> Cancel</a>
                                    <button type="submit" class="btn btn-success btn-sm waves-effect btn-label waves-light "><i class="bx bx-save label-icon "></i> Save</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->


        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->