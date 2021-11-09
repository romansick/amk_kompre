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
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Tipe Rumah</label>
                                <div class="col-md-10">
                                    <select class="form-control">
                                        <option>Select</option>
                                        <option>Large select</option>
                                        <option>Small select</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Tipe </label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-md-2 col-form-label">Harga</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="search" id="example-search-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-email-input" class="col-md-2 col-form-label">Lokasi</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="email" id="example-email-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-url-input" class="col-md-2 col-form-label">Unit</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" id="example-url-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-tel-input" class="col-md-2 col-form-label">Deskripsi</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-2 col-form-label">Luas</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="number" id="example-number-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-2 col-form-label">Blok</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" id="example-number-input">
                                </div>
                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->


        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->