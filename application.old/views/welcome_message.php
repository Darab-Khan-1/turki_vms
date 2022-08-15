<!DOCTYPE html>
<html class="loading" lang="<?= $html_lang ?>" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <?php $this->load->view('include/css'); ?>
</head>
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
                                    <img src="app-assets/images/logo/takip-logo.png" class="img-fluid w-50"
                                         alt="arac takip">
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <span><?= lang('enterYourCredential'); ?></span>
                                </h6>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form-horizontal" id="loginForm" name="loginForm" novalidate>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="text" class="form-control input-lg" id="username"
                                                   name="username"
                                                   placeholder="<?= lang('username'); ?>" tabindex="1" required
                                                   data-validation-required-message="Please enter your username.">
                                            <div class="form-control-position">
                                                <i class="fad fa-user"></i>
                                            </div>
                                            <div class="help-block font-small-3"></div>
                                        </fieldset>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" class="form-control input-lg" id="password"
                                                   name="password"
                                                   placeholder="<?= lang('password'); ?>" tabindex="2" required
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
                                                    <label for="remember_me"> <?= lang('remember_me'); ?></label>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <button type="button" id="loginButton" name="loginButton"
                                                class="btn btn-blue btn-block btn-lg"><i
                                                    class="fad fa-lock"></i> <?= lang('login'); ?>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <p class="text-center pt-1"><a
                                        href="<?= base_url('language/select/english'); ?>"><i
                                            class="flag-icon flag-icon-gb"></i> <?= lang('english'); ?></a>
                                | <a href="<?= base_url('language/select/turkish'); ?>"><i
                                            class="flag-icon flag-icon-tr"></i> <?= lang('turkish'); ?></a>
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
        <span class="float-md-left d-block d-md-inline-block"><?= lang('copyright'); ?> &copy; 2021 <a
                    class="text-bold-800 grey darken-2" href="https://netaractakip.com"
                    target="_blank">NET Arac Takip</a></span>
    </p>
</footer>
<!-- END: Footer-->
<?php $this->load->view('include/js'); ?>
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
                            message: '<?=lang('usernameIsRequired');?>'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: '<?=lang('passwordIsRequired');?>'
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
                    $.ajax({
                        url: '<?=base_url('rest/account/login')?>',
                        method: "POST",
                        data: loginForm.serialize(),
                        beforeSend: function () {
                            loginCard.block({
                                message: '<i class="fad fa-spinner fa-spin fa-3x text-warning"></i>',
                                overlayCSS: {
                                    backgroundColor: '#fff',
                                    opacity: 0.8,
                                    cursor: 'wait'
                                },
                                css: {
                                    border: 0,
                                    padding: 0,
                                    backgroundColor: 'transparent'
                                }
                            });
                        }
                    })
                        .done((res) => {
                            //console.log(res);
                            if (res.success) {
                                if ($('#loginForm #remember_me').prop('checked', true)) {
                                    let account = {
                                        "username": $('#username').val(),
                                        "password": $('#password').val()
                                    }
                                    $.rememberMe(account);
                                }
                                //setCookie(res.cookie_name, res.cookie_value, 30);
                                document.location.href = res.url;
                            } else {
                                loginCard.unblock();
                                Swal.fire({
                                    title: "<?=lang('error')?>",
                                    html: '<h4>' + res.message + '</h4>',
                                    type: "error",
                                    confirmButtonClass: 'btn btn-danger',
                                    buttonsStyling: false,
                                });
                            }
                        })
                        .fail((e) => {
                            //console.log(e);
                            loginCard.unblock();
                            if (e.status === 404) {
                                Swal.fire({
                                    title: "<?=lang('error')?>",
                                    html: '<h4>' + '<?=lang('not_found')?>' + '</h4>',
                                    type: "error",
                                    confirmButtonClass: 'btn btn-danger',
                                    buttonsStyling: false,
                                });
                            } else {
                                Swal.fire({
                                    title: "<?=lang('error')?>",
                                    html: '<h4>' + e.responseJSON.message + '</h4>',
                                    type: "error",
                                    confirmButtonClass: 'btn btn-danger',
                                    buttonsStyling: false,
                                });
                            }
                        })
                        .always(function () {
                            //alert("complete");
                        });
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
