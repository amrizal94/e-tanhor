<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-4 text-gray-800 mr-auto"><?= $title; ?></h1>
    <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="button-add-user">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah <?= $sub_title; ?></button>
</div>

<!-- Modal -->
<div class="view-modal" style="display: none;"></div>

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

<!-- DataTales -->
<div class="card shadow my-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data <?= $sub_title; ?></h6>
    </div>
    <div class="card-body view-table">

    </div>
</div>
<script>
    function listUsers() {
        $.ajax({
            url: site_url + "masteruser/list",
            dataType: "json",
            success: function(response) {
                $(".view-table").html(response.data);
            },
            error: function(xhr, ajaxOptions, throwError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + throwError);
            },
        });
    }

    $(document).ready(function() {
        listUsers();
        $('#button-add-user').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: site_url + "masteruser/modaluseradd",
                dataType: "json",
                success: function(response) {
                    if (response.data == "reload") {
                        window.location.reload();
                    }
                    $(".view-modal").html(response.data).show();
                    $("#modal-add-user").modal('show');
                },
                error: function(xhr, ajaxOptions, throwError) {
                    alert(xhr.status + "\n" + ajaxOptions + "\n" + throwError);
                },
            });

        });
    });
</script>