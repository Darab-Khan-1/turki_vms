<div class="modal fade text-left" id="profileModal" tabindex="" role="dialog"
     aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"
                    id="profileModalLabel"><?= lang('Text.editProfile') ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="overflow-x: hidden;">
                <form id="profileForm">
                    <div class="row mb-1">
                        <div class="col-md-4">
                            <label class="label-control"
                                   for="profile_name"><?= lang('Text.name') ?></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control"
                                   id="profile_name" name="profile_name" value="<?=$account->name;?>">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-4">
                            <label class="label-control"
                                   for="profile_email"><?= lang('Text.email') ?></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control"
                                   id="profile_email" name="profile_email" value="<?=$account->email;?>">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-4">
                            <label class="label-control" for="profile_password"><?= lang('Text.password') ?></label>
                        </div>
                        <div class="col-md-8">
                            <input type="password" class="form-control"
                                   id="profile_password" name="profile_password">
                            <input type="hidden" id="profile_id" name="profile_id" value="<?=$account->id;?>">
                            <small class="badge badge-warning" id="passwordHint"><?=lang('Text.passwordHint')?></small>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-blue" id="profile_save"
                        name="profile_save">
                    <i class="fad fa-save"></i> <?= lang('Text.save') ?>
                </button>
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">
                    <?= lang('Text.close') ?>
                </button>
            </div>
        </div>
    </div>
</div>
<footer class="footer footer-static footer-light navbar-border navbar-shadow fixed-bottom">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block"><?= lang('Text.Text.copyright'); ?> &copy; 2021 <a class="text-bold-800 grey darken-2" href="#" target="_blank"></a></span><span id="scroll-top"></span></p>
</footer>
