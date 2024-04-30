<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-4 text-gray-800 mr-auto"><?= $title; ?></h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mx-5">
        Export Excel</a>
    <button type="button" data-toggle="modal" data-target="#add-member" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah <?= $sub_title; ?></button>
</div>

<div class="modal fade" tabindex="-1" id="add-member">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Isian Data <?= $sub_title; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-member" class="p-3" method="post" action="<?= base_url($this->router->class); ?>">
                    <div class="form-group">
                        <label for="username">Username <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="level_user">Level User <span class="text-danger">*</span></label>
                        <select class="form-control" id="level_user" name="level_user">
                            <option>Level User</option>
                            <?php
                            foreach ($list_level_user->result() as $row) {;
                                if ($row->id == 0) {
                                    continue;
                                } ?>
                                <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                            <?php }; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="directorate">Directorate <span class="text-danger">*</span></label>
                        <select class="form-control" id="directorate" name="directorate">
                            <option>Directorate</option>
                            <?php
                            foreach ($list_directorate->result() as $row) {;
                                if ($row->id == 0) {
                                    continue;
                                } ?>
                                <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                            <?php }; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="masjid">Masjid <span class="text-danger">*</span></label>
                        <select class="form-control" id="masjid" name="masjid">
                            <option>Masjid</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="daerah">Daerah <span class="text-danger">*</span></label>
                        <select class="form-control" id="daerah" name="daerah">
                            <option>Daerah</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="desa">Desa <span class="text-danger">*</span></label>
                        <select class="form-control" id="desa" name="desa">
                            <option>Desa</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kelompok">Kelompok <span class="text-danger">*</span></label>
                        <select class="form-control" id="kelompok" name="kelompok">
                            <option>Level User</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" form="form-add-member" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-end">
    <div class="btn-group">
        <form class="d-flex">
            <select class="form-control ml-3 w-auto" id="level_akun" name="level_akun">
                <option>Level Akun</option>
            </select>
            <select class="form-control ml-3 w-auto" id="status_akun" name="status_akun">
                <option>Status Akun</option>
            </select>
            <select class="form-control ml-3 w-auto" id="kelompok" name="kelompok">
                <option>Kelompok</option>
            </select>
            <button type="submit" class="btn btn-primary ml-3 w-auto"><i class="fas fa-search fa-fw"></i>
        </form>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow my-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data <?= $sub_title; ?></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Level User</th>
                        <th>Directorate</th>
                        <th>Last Login</th>
                        <th>Last Logout</th>
                        <th>IP Address</th>
                        <th>Is Active</th>
                        <th>Created At</th>
                        <th class="text-right"><i class="fas fa-cog fa-sm"></i></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Username</th>
                        <th>Level User</th>
                        <th>Directorate</th>
                        <th>Last Login</th>
                        <th>Last Logout</th>
                        <th>IP Address</th>
                        <th>Is Active</th>
                        <th>Created At</th>
                        <th class="text-right"><i class="fas fa-cog fa-sm"></i></th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    foreach ($list_users->result() as $row) {; ?>
                        <tr>
                            <td><?= ($row->is_login == 0) ? '<div type="button" class="btn btn-light position-relative">' . $row->username .
                                    '<span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                                <span class="visually-hidden"></span>
                            </span>
                            </div>' : '<div type="button" class="btn btn-light position-relative">' . $row->username .
                                    '<span class="position-absolute top-0 start-100 translate-middle p-2 bg-success border border-light rounded-circle">
                                <span class="visually-hidden"></span>
                            </span>
                            </div>' ?></td>
                            <td><?= $row->level_user; ?></td>
                            <td><?= $row->directorate; ?></td>
                            <td><?= $row->last_login; ?></td>
                            <td><?= $row->last_logout; ?></td>
                            <td><?= $row->ip_address; ?></td>
                            <td><?= ($row->is_active == 1) ? '<div class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">actived</span>
                                        </div>' : '<div class="btn btn-danger btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-times"></i>
                                        </span>
                                        <span class="text">inactive</span>
                                        </div>' ?></td>
                            <td><?= $row->created_at; ?></td>
                            <td><?= $row->username; ?></td>
                        </tr>
                    <?php }; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>