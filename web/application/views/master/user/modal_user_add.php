<div class="modal fade" tabindex="-1" id="modal-add-user">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Isian Data <?= $sub_title; ?><?= gettype($list_level_user) ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('masteruser/save', ['id' => 'form-add-user']); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="username">Username <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="username" name="username">
                    <div class="valid-feedback" id="feedback-username">
                        Looks good!
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="password" name="password">
                    <div class="valid-feedback" id="feedback-password">
                        Looks good!
                    </div>
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
                    <div class="valid-feedback" id="feedback-level_user">
                        Looks good!
                    </div>
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
                    <div class="valid-feedback" id="feedback-directorate">
                        Looks good!
                    </div>
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
                    alert(xhr.status + "\n" + ajaxOptions + "\n" + throwError + "\n" + xhr.responseText);
                },
            });
            return false
        });

        $(document).on('change', 'select', function(e) {
            let $t = $(e.currentTarget);
            let key = $t[0].id;
            let value = $t[0].value;

            console.log(value);
            if (value && value != 0) {
                $t.removeClass('is-invalid')
                $t.addClass('is-valid')
                $("#feedback-" + key).removeClass('invalid-feedback')
                $("#feedback-" + key).addClass('valid-feedback')
                $("#feedback-" + key).html("looks good")
            } else {
                $t.removeClass('is-valid')
                $t.addClass('is-invalid')
                $("#feedback-" + key).removeClass('valid-feedback')
                $("#feedback-" + key).addClass('invalid-feedback')
                $("#feedback-" + key).html("This is required")
            }
        })
        $(document).on('blur', 'input', function(e) {
            let $t = $(e.currentTarget);
            let key = $t[0].id;
            let value = {};
            value[key] = $t[0].value;
            var isShown = $('#modal-relog').hasClass('in') || $('#modal-relog').hasClass('show')
            if (!isShown) {
                $.ajax({
                    type: "post",
                    url: site_url + 'masteruser/validate' + key,
                    data: value,
                    dataType: "json",
                    beforeSend: function() {
                        $t.attr('disable', 'disabled');
                        $t.css("background", "url(http://www.xiconeditor.com/image/icons/loading.gif) no-repeat right center");
                    },
                    complete: function() {
                        $t.removeAttr('disable');
                        $t.css("background", "");
                    },
                    success: function(response) {
                        if (response.status == "expired") {
                            $(".view-modal").hide();
                            $(".view-modal-relog").html(response.data).show();
                            $("#modal-relog").modal({
                                backdrop: 'static',
                                keyboard: false
                            })
                            return false
                        }
                        if (response.status == "reload") {
                            window.location.reload();
                            return false
                        }
                        if (response.error) {
                            $t.removeClass('is-valid')
                            $t.addClass('is-invalid')
                            $("#feedback-" + key).removeClass('valid-feedback')
                            $("#feedback-" + key).addClass('invalid-feedback')
                            $("#feedback-" + key).html(response.error)
                            return false
                        }
                        if (response.status == 200) {
                            $t.removeClass('is-invalid')
                            $t.addClass('is-valid')
                            $("#feedback-" + key).removeClass('invalid-feedback')
                            $("#feedback-" + key).addClass('valid-feedback')
                            $("#feedback-" + key).html("looks good")
                        }
                    },
                    error: function(xhr, ajaxOptions, throwError) {
                        alert(xhr.status + "\n" + ajaxOptions + "\n" + throwError + "\n" + xhr.responseText);
                    },
                });
            };
        });

    });
</script>