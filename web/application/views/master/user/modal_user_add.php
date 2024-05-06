<div class="modal fade" tabindex="-1" id="modal-add-user">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Isian Data <?= $sub_title; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('masteruser/save', ['id' => 'form-add-user']); ?>
            <div class="modal-body">
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
                        <option>--- Pilih ---</option>
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
                        <option>--- Pilih ---</option>
                        <?php
                        foreach ($list_directorate->result() as $row) {;
                            if ($row->id == 0) {
                                continue;
                            } ?>
                            <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                        <?php }; ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" id="buttton-save">Simpan</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(document).on('blur', 'input', function(e) {
            var $t = $(e.currentTarget);
            $.ajax({
                type: "post",
                url: site_url + 'masteruser/save',
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $t.attr('disable', 'disabled');
                    $t.css("background", "url(http://www.xiconeditor.com/image/icons/loading.gif) no-repeat right center");
                },
                complete: function() {
                    $t.removeAttr('disable');
                    $t.css("background", "");
                },
            });
        });
        $('#form-add-user').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('#buttton-save').attr('disable', 'disabled');
                    $('#buttton-save').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('#buttton-save').removeAttr('disable');
                    $('#buttton-save').html('Simpan');
                },
                success: function(response) {

                },
                error: function(xhr, ajaxOptions, throwError) {
                    alert(xhr.status + "\n" + ajaxOptions + "\n" + throwError);
                },
            });
            return false
        });
    });
</script>