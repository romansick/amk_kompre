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

                            <h4 class="card-title">Edit Users</h4>
                            <form action="<?= base_url('administrator/save_edit_user'); ?>" method="post">
                                <input type="hidden" value="<?= $users['id']; ?>" name="id">
                                <div class="form-group row">
                                    <label for="email" class="col-md-2 col-form-label">Email</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" value="<?= $users['email']; ?>" name="email" id="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-md-2 col-form-label">Nama</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" value="<?= $users['nama']; ?>" name="nama" id="nama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_hp" class="col-md-2 col-form-label">No HP</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" value="<?= $users['no_hp']; ?>" name="no_hp" id="no_hp">
                                    </div>
                                </div>
                                <div class="form-group d-flex justify-content-end">
                                    <button type="submit" class="btn btn-success btn-sm waves-effect btn-label waves-light  "><i class="bx bx-save label-icon "></i> Save</button>
                                    <a href="<?= base_url('administrator/user'); ?>" type="button" class="btn btn-warning btn-sm waves-effect ml-3 btn-label waves-light" data-dismiss="modal"><i class="bx bx-error label-icon "></i> Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>