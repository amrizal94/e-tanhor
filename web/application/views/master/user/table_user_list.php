<div class="table-responsive">
    <table class="table table-bordered display nowrap" id="dataTable" width="100%" cellspacing="0">
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
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                <svg class="fa-fw" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z" />
                                </svg>
                            </button>
                            <div class="dropdown-menu">
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
                        </div>
                    </td>
                </tr>
            <?php }; ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        $("#dataTable").DataTable({
            responsive: true,
            rowReorder: {
                selector: "td:nth-child(2)",
            },
        });
    });
</script>