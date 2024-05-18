<div class="modal fade" tabindex="-1" id="modal-relog">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login</h5>
            </div>
            <?= $this->session->flashdata('message'); ?>
            <?= form_open('auth', ['id' => 'form-relog']); ?>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" id="username-relog" value="<?= set_value('username'); ?><?= $this->session->flashdata('username'); ?>" placeholder="Enter Username...">
                    <div class="valid-feedback" id="feedback-username-relog">
                        Looks good!
                    </div>
                </div>
                <div class=" form-group">
                    <input type="password" class="form-control" id="password-relog" name="password" placeholder="Password">
                    <div class="valid-feedback" id="feedback-password-relog">
                        Looks good!
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-user btn-block" id="button-relog">
                    Login
                </button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#form-relog').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('#button-relog').attr('disable', 'disabled');
                    $('#button-relog').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('#button-relog').removeAttr('disable');
                    $('#button-relog').html('Login');
                },
                success: function(response) {
                    if (response.status == 200) {
                        $(".view-modal").show();
                        $(".view-modal-relog").html("").hide();
                        $(".view-modal-relog").modal('hide');
                        return true;
                    }
                    if (response.error) {
                        if (response.error.username) {
                            $('#username-relog').removeClass('is-valid')
                            $('#username-relog').addClass('is-invalid')
                            $("#feedback-username-relog").removeClass('valid-feedback')
                            $("#feedback-username-relog").addClass('invalid-feedback')
                            $("#feedback-username-relog").html(response.error.username)
                        }
                        if (response.error.password) {
                            $('#password-relog').removeClass('is-valid')
                            $('#password-relog').addClass('is-invalid')
                            $("#feedback-password-relog").removeClass('valid-feedback')
                            $("#feedback-password-relog").addClass('invalid-feedback')
                            $("#feedback-password-relog").html(response.error.password)
                        }
                    }
                },
                error: function(xhr, ajaxOptions, throwError) {
                    alert(xhr.status + "\n" + ajaxOptions + "\n" + throwError + "\n" + xhr.responseText);
                },
            });
            return false;
        });
    });
</script>