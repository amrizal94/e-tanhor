<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-4 text-gray-800 mr-auto"><?= $title; ?></h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mx-5">
        Export Excel</a>
    <button type="button" data-toggle="modal" data-target="#add-jamaah" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah <?= $sub_title; ?></button>
</div>

<div class="modal fade" tabindex="-1" id="add-jamaah">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Isian Data <?= $sub_title; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-jamaah" class="p-3 d-flex flex-wrap justify-content-between" method="post" action="<?= base_url($this->router->class); ?>">
                    <div class="w-50">
                        <div class="form-group w-100 text-center">
                            <span class="rounded-pill border border-dark h5 px-3 font-weight-bolder text-white" style="background-color: deeppink;">Form Isian</span>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="alamat" name="alamat">
                        </div>
                        <div class="form-group">
                            <label for="kk">KK</label>
                            <input type="text" class="form-control" id="kk" name="kk">
                        </div>
                        <div class="form-group">
                            <label for="hp">HP <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="hp" name="hp">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                <option>Jenis Kelamin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
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
                                <option>Kelompok</option>
                            </select>
                        </div>
                    </div>
                    <div style="width: 40%;">
                        <div class="form-group w-100 text-center">
                            <span class="rounded-pill border border-dark h5 px-3 font-weight-bolder text-white" style="background-color: deeppink;">Status</span>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <div><label for="menikah">Menikah <span class="text-danger">*</span></label></div>
                            <div><input class="form-check-input" type="checkbox" id="menikah" name="menikah"></div>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <div><label for="penerima_zakat">Penerima Zakat <span class="text-danger">*</span></label></div>
                            <div><input class="form-check-input" type="checkbox" id="penerima_zakat" name="penerima_zakat"></div>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <div><label for="aghniya">Aghniya <span class="text-danger">*</span></label></div>
                            <div><input class="form-check-input" type="checkbox" id="aghniya" name="aghniya"></div>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <div><label for="dhuafa">Dhuafa <span class="text-danger">*</span></label></div>
                            <div><input class="form-check-input" type="checkbox" id="dhuafa" name="dhuafa"></div>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <div><label for="tahfidz">Tahfidz <span class="text-danger">*</span></label></div>
                            <div><input class="form-check-input" type="checkbox" id="tahfidz" name="tahfidz"></div>
                        </div>
                        <div class="form-group">
                            <label for="kategori_usia">Kategori Usia <span class="text-danger">*</span></label>
                            <select class="form-control" id="kategori_usia" name="kategori_usia">
                                <option>Kategori Usia</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pengurus">Pengurus <span class="text-danger">*</span></label>
                            <select class="form-control" id="pengurus" name="pengurus">
                                <option>Pengurus</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="mubaligh">Mubaligh <span class="text-danger">*</span></label>
                            <select class="form-control" id="mubaligh" name="mubaligh">
                                <option>Mubaligh</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status_jamaah">Status Jamaah <span class="text-danger">*</span></label>
                            <select class="form-control" id="status_jamaah" name="status_jamaah">
                                <option>Status Jamaah</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="foto">Upload Foto</label>
                            <input type="file" class="form-control-file" id="foto" name="foto">
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" form="form-add-jamaah" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-end">
    <div class="btn-group">
        <form class="d-flex">
            <select class="form-control ml-3 w-auto" id="pengurus" name="pengurus">
                <option>Pengurus</option>
            </select>
            <select class="form-control ml-3 w-auto" id="mubaligh" name="mubaligh">
                <option>Mubaligh</option>
            </select>
            <select class="form-control ml-3 w-auto" id="dhuafa" name="dhuafa">
                <option>Dhuafa</option>
            </select>
            <select class="form-control ml-3 w-auto" id="kategori" name="kategori">
                <option>Kategori</option>
            </select>
            <select class="form-control ml-3 w-auto" id="kk" name="kk">
                <option>KK</option>
            </select>
            <select class="form-control ml-3 w-auto" id="penerima_zakat" name="penerima_zakat">
                <option>Penerima Zakat</option>
            </select>
            <select class="form-control ml-3 w-auto" id="kelompok" name="kelompok">
                <option>Kelompok</option>
            </select>
            <select class="form-control ml-3 w-auto" id="desa" name="desa">
                <option>Desa</option>
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
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>KK</th>
                        <th>No. HP</th>
                        <th>Jenis Kelamin</th>
                        <th>Umur</th>
                        <th>Kategori</th>
                        <th>Kelompok</th>
                        <th class="text-right"><i class="fas fa-cog fa-sm"></i></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>KK</th>
                        <th>No. HP</th>
                        <th>Jenis Kelamin</th>
                        <th>Umur</th>
                        <th>Kategori</th>
                        <th>Kelompok</th>
                        <th class="text-right"><i class="fas fa-cog fa-sm"></i></th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <td>
                            <img class="rounded-circle" style="width: 50px;" src="<?= base_url('assets/'); ?>img/profile/<?= $user['image']; ?>"><span class="mx-3"><?= $user['name']; ?></span>
                        </td>
                        <td class="align-middle">tokoira</td>
                        <td class="align-middle">tokoira</td>
                        <td class="align-middle">tokoira</td>
                        <td class="align-middle">tokoira</td>
                        <td class="align-middle">tokoira</td>
                        <td class="align-middle">tokoira</td>
                        <td class="align-middle"><span class="badge badge-danger w-50">Tidak Aktif</span></td>
                        <td class="text-right">
                            <a class="nav-link dropdown-toggle" href="#" id="tableDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg class="fa-fw" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z" />
                                </svg>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="tableDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Edit
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-trash fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>