<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
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
                                <div>
                                    <button type="button" class="btn btn-primary btn-sm waves-effect btn-label waves-light" data-toggle="modal" data-target="#myModal"><i class="bx bx-plus label-icon"></i> Tambah User</button>
                                </div>
                            </div>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>USERNAME</th>
                                        <th>NAMA</th>
                                        <!-- <th>IMAGE</th> -->
                                        <th>NO HP</th>
                                        <th>ROLE</th>
                                        <th>STATUS</th>
                                        <th>AKSI</th>
                                </thead>

                                <tbody>
                                    <?php $i = 1;
                                    foreach ($getuser as $u) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $u['email']; ?></td>
                                            <td><?= $u['nama']; ?></td>
                                            <!-- <td><?= $u['image']; ?></td> -->
                                            <td><?= $u['no_hp']; ?></td>
                                            <td><?= $u['role']; ?></td>
                                            <td>
                                                <?php if ($u['is_active'] == 1) : ?>
                                                    <span class="badge badge-pill badge-success">Aktif</span>
                                                <?php else : ?>
                                                    <span class="badge badge-pill badge-danger">Non Aktif</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($u['is_active'] == 1) : ?>
                                                    <a href="<?= base_url('administrator/aktif_user/') . $u['id']; ?>" type="button" class="btn btn-danger btn-sm waves-effect btn-label waves-light"><i class="bx bx-hide label-icon "></i> Non Aktif</a>
                                                <?php else : ?>
                                                    <a href="<?= base_url('administrator/non_aktif_user/') . $u['id']; ?>" type="button" class="btn btn-success btn-sm waves-effect btn-label waves-light"><i class="bx bx-show-alt label-icon "></i> Aktif</a>
                                                <?php endif; ?>
                                                <a href="<?= base_url('administrator/edit_user/') . $u['id']; ?>" type="button" class="btn btn-warning btn-sm waves-effect btn-label waves-light"><i class="bx bx-edit label-icon "></i> Edit</a>
                                                <!-- <a href="<?= base_url('menu/delete_submenu/') . $sm['id']; ?>" type="button" class="btn btn-danger btn-sm waves-effect btn-label waves-light"><i class="bx bx-trash-alt label-icon "></i> Delete</a> -->

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

    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="<?= base_url('administrator/adduser'); ?>" method="post">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required placeholder="EMAIL">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" required placeholder="NAMA">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" name="password" required placeholder="Password">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Pilih Role</label>
                            <select class="form-control select2" name="role_id" required>
                                <option>Select</option>
                                <?php foreach ($role as $r) : ?>
                                    <option value="<?= $r['id'] ?>"><?= $r['role'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>No HP</label>
                            <input type="text" class="form-control" name="no_hp" required placeholder="No HP">
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