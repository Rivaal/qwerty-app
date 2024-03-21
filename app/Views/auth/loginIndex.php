<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>QWERTY Studio - Login</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/css/rtl/core.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/css/rtl/theme-default.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/libs/typeahead-js/typeahead.css" />

    <!-- Vendor -->
    <link rel="stylesheet"
        href="<?= base_url(); ?>/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />

    <!-- Page CSS -->

    <!-- Page -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/css/pages/page-auth.css" />

    <!-- Helpers -->
    <script src="<?= base_url(); ?>/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= base_url(); ?>/assets/js/config.js"></script>
</head>

<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">
                <!-- Login -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center mb-4 mt-2">
                            <a href="<?= base_url(''); ?>" class="p-0" id="MonthlyCampaign"
>
                                <i class="ti ti-chevron-left ti-sm"></i>
                            </a>
                            <a class="app-brand-link gap-2">
                                <span class="app-brand-text demo text-body fw-bold ms-1">QWERTY Studio</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-1 pt-2">Selamat datang! 👋</h4>
                        <p class="mb-4">Silahkan login terlebih dahulu.</p>

                        <!-- Alert -->
                        <div class="alert alert-danger" style="display:none;" role="alert">
                            This is a danger alert — check it out!
                        </div>
                        <!-- Alert -->

                        <!-- Form -->
                        <form id="formAuthentication" action="<?= base_url('/Auth/checkUser'); ?>"
                            class="mb-3 needs-validation" method="POST" novalidate>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Masukan Username" required autofocus />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="katasandi">Kata Sandi</label>
                                    <a href="<?= base_url('Auth/forgotPassword'); ?>">
                                        <small>Lupa Kata Sandi?</small>
                                    </a>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" required />
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-login btn-primary d-grid w-100" type="submit">Masuk</button>
                            </div>
                        </form>
                        <!-- /Form -->
                    </div>
                    <!-- /Register -->
                </div>
            </div>
        </div>

        <!-- / Content -->

        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src="<?= base_url(); ?>/assets/vendor/libs/jquery/jquery.js"></script>
        <script src="<?= base_url(); ?>/assets/vendor/libs/popper/popper.js"></script>
        <script src="<?= base_url(); ?>/assets/vendor/js/bootstrap.js"></script>
        <script src="<?= base_url(); ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="<?= base_url(); ?>/assets/vendor/libs/node-waves/node-waves.js"></script>

        <script src="<?= base_url(); ?>/assets/vendor/libs/hammer/hammer.js"></script>
        <script src="<?= base_url(); ?>/assets/vendor/libs/i18n/i18n.js"></script>
        <script src="<?= base_url(); ?>/assets/vendor/libs/typeahead-js/typeahead.js"></script>

        <script src="<?= base_url(); ?>/assets/vendor/js/menu.js"></script>
        <!-- endbuild -->

        <!-- Vendors JS -->
        <script src="<?= base_url(); ?>/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
        <script src="<?= base_url(); ?>/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
        <script src="<?= base_url(); ?>/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

        <!-- Main JS -->
        <script src="<?= base_url(); ?>/assets/js/main.js"></script>

        <!-- Code -->
        <script>
        $('.needs-validation').submit(function(e) {
            e.preventDefault();
            $('.alert').fadeOut();
            $.ajax({
                type: "POST",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "JSON",
                beforeSend: function() {
                    $('.btn-login').prop('disabled', true);
                    $('.btn-login').html(
                        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
                    )
                },
                success: function(response) {
                    if (response.usernamepassword) {
                        $('.alert').html(response.usernamepassword);
                        $('.alert').fadeIn();
                        $('.btn-login').prop('disabled', false);
                        $('.btn-login').html('Masuk');
                    }

                    if (response.username) {
                        $('.alert').html(response.username);
                        $('.alert').fadeIn();
                        $('.btn-login').prop('disabled', false);
                        $('.btn-login').html('Masuk');
                    }
                    if (response.password) {
                        $('.alert').html(response.password);
                        $('.alert').fadeIn();
                        $('.btn-login').prop('disabled', false);
                        $('.btn-login').html('Masuk');
                    }
                    if (response.location) {
                        window.location = response.location;
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" +
                        thrownError);
                }
            });
        });
        </script>
        <!-- Code -->
</body>

</html>