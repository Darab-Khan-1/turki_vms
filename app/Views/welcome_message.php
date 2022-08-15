<!DOCTYPE html>
<html class="loading" lang="<?= lang('Text.lang') ?>" data-textdirection="ltr">
<!-- BEGIN: Head-->
<?= view('include/head'); ?>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 1-column bg-full-screen-image blank-page" data-open="click"
      data-menu="vertical-menu" data-col="1-column">

<!-- BEGIN: Header-->
<!-- END: Header-->

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="row flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 m-0" id="loginCard">
                            <div class="card-header border-0">
                                <div class="card-title text-center">
                                    <img src="<?= base_url('app-assets/images/logo/takip-logo.png') ?>"
                                         class="img-fluid w-50" alt="arac takip">
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <span><?= lang('Text.enterYourCredential') ?></span>
                                </h6>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form-horizontal" id="loginForm" name="loginForm" novalidate>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="text" class="form-control input-lg" id="username"
                                                   name="username"
                                                   placeholder="<?= lang('Text.username'); ?>" tabindex="1" required
                                                   data-validation-required-message="Please enter your username.">
                                            <div class="form-control-position">
                                                <i class="fad fa-user"></i>
                                            </div>
                                            <div class="help-block font-small-3"></div>
                                        </fieldset>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" class="form-control input-lg" id="password"
                                                   name="password"
                                                   placeholder="<?= lang('Text.password'); ?>" tabindex="2" required
                                                   data-validation-required-message="Please enter valid passwords.">
                                            <div class="form-control-position">
                                                <i class="fad fa-key"></i>
                                            </div>
                                            <div class="help-block font-small-3"></div>
                                        </fieldset>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-12 text-left ">
                                                <fieldset>
                                                    <input type="checkbox" id="remember_me" name="remember_me"
                                                           class="chk-remember">
                                                    <label for="remember_me"> <?= lang('Text.remember_me'); ?></label>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <button type="button" id="loginButton" name="loginButton"
                                                class="btn btn-blue btn-block btn-lg"><i
                                                    class="fad fa-lock"></i> <?= lang('Text.login'); ?>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <p class="text-center pt-1">
                                <a href="<?= base_url('lang/en') ?>"><i
                                            class="flag-icon flag-icon-gb"></i> <?= lang('Text.english'); ?></a>
                                |
                                <a href="<?= base_url('lang/tr') ?>"><i
                                            class="flag-icon flag-icon-tr"></i> <?= lang('Text.turkish'); ?></a>
                            </p>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer fixed-bottom footer-dark navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
        <span class="float-md-left d-block d-md-inline-block"><?= lang('Text.copyright'); ?> &copy; 2021 <a
                    class="text-bold-800 grey darken-2" href=""
                    target="_blank"></a></span>
    </p>
</footer>
<!-- END: Footer-->
<?= view('include/script'); ?>
<!-- BEGIN: Page JS-->
<!-- END: Page JS-->
<script>
    $(document).ready(function () {
        'use strict';
        const account = JSON.parse(localStorage.getItem("account"));
        const loginCard = $('#loginCard');
        const loginForm = $('#loginForm');
        const loginButton = $('#loginButton');
        let username = $('#username');
        let password = $('#password');
        let rememberMe = $('#remember_me');
        if (account !== null) {
            username.val(account.username);
            password.val(account.password);
            rememberMe.prop('checked', true);
        }
        let loginValidation = FormValidation.formValidation(loginForm[0], {
            fields: {
                username: {
                    validators: {
                        notEmpty: {
                            message: '<?=lang('Text.usernameIsRequired');?>'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: '<?=lang('Text.passwordIsRequired');?>'
                        }
                    }
                }
            },
            plugins: {
                bootstrap: new FormValidation.plugins.Bootstrap(),
                submitButton: new FormValidation.plugins.SubmitButton(),
                trigger: new FormValidation.plugins.Trigger(),
                autoFocus: new FormValidation.plugins.AutoFocus()
            }
        });
        loginButton.on('click', (e) => {
            e.preventDefault();
            loginValidation.validate().then((status) => {
                if (status === 'Valid') {
                    let headers = {'content-type': 'application/x-www-form-urlencoded'};
                    let callback = (data) => {
                        if ($('#loginForm #remember_me').prop('checked', true)) {
                            let account = {
                                "username": $('#username').val(),
                                "password": $('#password').val()
                            }
                            $.rememberMe(account);
                        }
                        document.location.href = data.url;
                    };
                    $.axiosPost("<?=base_url('rest/account/login')?>", headers, loginForm.serialize(), loginCard, callback);
                }
            });
        });
        loginForm.on('keypress', (e) => {
            if (e.which === 13) {
                loginButton.trigger('click');
            }
        });
    });

</script>
</body>
<!-- END: Body-->

</html>
