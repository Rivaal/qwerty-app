<?php $session = \Config\Services::session(); ?>
<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?= $this->renderSection('title') ?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= BASE_URL(); ?>/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="<?= BASE_URL(); ?>/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="<?= BASE_URL(); ?>/assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="<?= BASE_URL(); ?>/assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= BASE_URL(); ?>/assets/vendor/css/rtl/core.css" />
    <link rel="stylesheet" href="<?= BASE_URL(); ?>/assets/vendor/css/rtl/theme-default.css" />
    <link rel="stylesheet" href="<?= BASE_URL(); ?>/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= BASE_URL(); ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?= BASE_URL(); ?>/assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="<?= BASE_URL(); ?>/assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="<?= BASE_URL(); ?>/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet"
        href="<?= BASE_URL(); ?>/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet"
        href="<?= BASE_URL(); ?>/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />
    <link rel="stylesheet" href="<?= BASE_URL(); ?>/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="<?= BASE_URL(); ?>/assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="<?= BASE_URL(); ?>/assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="<?= BASE_URL(); ?>/assets/vendor/libs/spinkit/spinkit.css" />
    <link rel="stylesheet" href="<?= BASE_URL(); ?>/assets/vendor/libs/toastr/toastr.css" />
    <link rel="stylesheet" href="<?= BASE_URL(); ?>/assets/vendor/libs/animate-css/animate.css" />
    <link rel="stylesheet" href="<?= BASE_URL(); ?>/assets/vendor/libs/sweetalert2/sweetalert2.css" />

    <!-- Row Group CSS -->
    <link rel="stylesheet"
        href="<?= BASE_URL(); ?>/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css" />
    <!-- Form Validation -->
    <link rel="stylesheet"
        href="<?= BASE_URL(); ?>/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />

    <!-- Page CSS -->
    <?= $this->renderSection('css') ?>

    <!-- Helpers -->
    <script src="<?= BASE_URL(); ?>/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= BASE_URL(); ?>/assets/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="index.html" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <svg width="32" height="22" viewBox="0 0 32 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                                    fill="#7367F0" />
                                <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                                    fill="#161616" />
                                <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                                    fill="#161616" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                                    fill="#7367F0" />
                            </svg>
                        </span>
                        <span class="app-brand-text demo menu-text fw-bold">QWERTY Std.</span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                        <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                        <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="dashboard menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-smart-home"></i>
                            <div>Dashboard</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="ringkasan-pesanan menu-item">
                                <a href="<?= base_url('Admin/'); ?>" class="menu-link">
                                    <div data-i18n="Analytics">Ringkasan Pesanan</div>
                                </a>
                            </li>
                            <li class="statistik-pendapatan menu-item">
                                <a href="<?= base_url('Admin/statistikPendapatan'); ?>" class="menu-link">
                                    <div data-i18n="Analytics">Statistik Pendapatan</div>
                                </a>
                            </li>
                            <li class="jadwal-studio menu-item">
                                <a href="<?= base_url('Admin/jadwalKetersediaanStudio'); ?>" class="menu-link">
                                    <div data-i18n="Analytics">Jadwal Studio</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Line -->
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Menu Utama</span>
                    </li>

                    <!-- Manajemen Data -->
                    <li class="manajemen-data menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-clipboard-list"></i>
                            <div>Manajemen Data</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="daftar-client menu-item">
                                <a href="<?= base_url('Admin/daftarClient'); ?>" class="menu-link">
                                    <div data-i18n="Analytics">Client</div>
                                </a>
                            </li>
                        </ul>
                        <ul class="menu-sub">
                            <li class="daftar-karyawan menu-item">
                                <a href="<?= base_url('Admin/daftarKaryawan'); ?>" class="menu-link">
                                    <div data-i18n="Analytics">Karyawan</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- /Manajemen Data -->

                    <!-- Pesanan -->
                    <li class="pesanan menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-receipt-2"></i>
                            <div>Pesanan</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="daftar-pesanan menu-item">
                                <a href="<?= base_url('Admin/daftarPesanan'); ?>" class="menu-link">
                                    <div data-i18n="Analytics">Daftar Pesanan</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Katalog -->
                    <li class="katalog menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-id"></i>
                            <div>Katalog</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="daftar-katalog menu-item">
                                <a href="<?= base_url('Admin/daftarKatalog'); ?>" class="menu-link">
                                    <div data-i18n="Analytics">Daftar Katalog</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Kalender -->
                    <li class="kalender menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-calendar"></i>
                            <div>Kalender</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="lihat-jadwal menu-item">
                                <a href="<?= base_url('Admin/lihatJadwal'); ?>" class="menu-link">
                                    <div data-i18n="Analytics">Lihat Jadwal</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Line -->
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Laporan</span>
                    </li>

                    <!-- Laporan -->
                    <li class="laporan menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-file-analytics"></i>
                            <div>Laporan Keuangan</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="laporan-masuk menu-item">
                                <a href="<?= base_url('Admin/income'); ?>" class="menu-link">
                                    <div data-i18n="Analytics">Uang Masuk</div>
                                </a>
                            </li>
                        </ul>
                        <ul class="menu-sub">
                            <li class="laporan-keluar menu-item">
                                <a href="<?= base_url('Admin/outcome'); ?>" class="menu-link">
                                    <div data-i18n="Analytics">Uang Keluar</div>
                                </a>
                            </li>
                        </ul>
                        <ul class="menu-sub">
                            <li class="ringkasan-keuangan menu-item">
                                <a href="<?= base_url('Admin/ringkasanKeuangan'); ?>" class="menu-link">
                                    <div data-i18n="Analytics">Ringkasan Keuangan</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Line -->
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Pengaturan &amp; Bantuan</span>
                    </li>

                    <!-- Pengaturan -->
                    <li class="pengaturan menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-settings"></i>
                            <div>Pengaturan</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="pengaturan-akun menu-item">
                                <a href="<?= base_url('Admin/pengaturanAkun'); ?>" class="menu-link">
                                    <div data-i18n="Analytics">Pengaturan Akun</div>
                                </a>
                            </li>
                            <li class="kelola-izin-akses menu-item">
                                <a href="<?= base_url('Admin/kelolaIzin'); ?>" class="menu-link">
                                    <div data-i18n="Analytics">Kelola Izin Akun</div>
                                </a>
                            </li>
                            <li class="kelola-whatsapp menu-item">
                                <a href="<?= base_url('Admin/kelolaWhatsapp'); ?>" class="menu-link">
                                    <div data-i18n="Analytics">Kelola Whatsapp</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="ti ti-menu-2 ti-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <div class="navbar-nav align-items-center">
                            <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
                                <i class="ti ti-sm"></i>
                            </a>
                        </div>

                        <ul class="navbar-nav flex-row align-items-center ms-auto">

                            <!-- Style Switcher -->
                            <li class="nav-item me-2 me-xl-0">
                                <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
                                    <i class="ti ti-md"></i>
                                </a>
                            </li>
                            <!--/ Style Switcher -->

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="<?= BASE_URL(); ?>/assets/img/avatars/1.png" alt
                                            class="h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="<?= BASE_URL(); ?>/assets/img/avatars/1.png" alt
                                                            class="h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span
                                                        class="fw-semibold d-block"><?= $session->get('admin_fullname'); ?></span>
                                                    <small
                                                        class="text-muted"><?= $session->get('admin_username'); ?></small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="ti ti-user-check me-2 ti-sm"></i>
                                            <span class="align-middle">Profil Saya</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="ti ti-settings me-2 ti-sm"></i>
                                            <span class="align-middle">Pengaturan</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?= base_url('logouts'); ?>">
                                            <i class="ti ti-logout me-2 ti-sm"></i>
                                            <span class="align-middle">Keluar</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->
                <?= $this->renderSection('content') ?>
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?= BASE_URL(); ?>/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?= BASE_URL(); ?>/assets/vendor/libs/popper/popper.js"></script>
    <script src="<?= BASE_URL(); ?>/assets/vendor/js/bootstrap.js"></script>
    <script src="<?= BASE_URL(); ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?= BASE_URL(); ?>/assets/vendor/libs/node-waves/node-waves.js"></script>

    <script src="<?= BASE_URL(); ?>/assets/vendor/libs/hammer/hammer.js"></script>
    <script src="<?= BASE_URL(); ?>/assets/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="<?= BASE_URL(); ?>/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?= BASE_URL(); ?>/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="<?= BASE_URL(); ?>/assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="<?= BASE_URL(); ?>/assets/vendor/libs/block-ui/block-ui.js"></script>
    <script src="<?= BASE_URL(); ?>/assets/vendor/libs/toastr/toastr.js"></script>
    <script src="<?= BASE_URL(); ?>assets/vendor/libs/sweetalert2/sweetalert2.js"></script>

    <!-- Flat Picker -->
    <script src="<?= BASE_URL(); ?>/assets/vendor/libs/moment/moment.js"></script>
    <script src="<?= BASE_URL(); ?>/assets/vendor/libs/flatpickr/flatpickr.js"></script>

    <!-- Form Validation -->
    <script src="<?= BASE_URL(); ?>/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="<?= BASE_URL(); ?>/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="<?= BASE_URL(); ?>/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

    <!-- Main JS -->
    <script src="<?= BASE_URL(); ?>/assets/js/main.js"></script>

    <script>
    var path = location.pathname.split('/');
    var aktif = path[2];
    if (aktif == "") {
        $(".dashboard").addClass('active');
        $(".dashboard").addClass('open');
        $(".ringkasan-pesanan").addClass('active');
    } else if (aktif == "statistikPendapatan") {
        $(".dashboard").addClass('active');
        $(".dashboard").addClass('open');
        $(".statistik-pendapatan").addClass('active');
    } else if (aktif == "jadwalKetersediaanStudio") {
        $(".dashboard").addClass('active');
        $(".dashboard").addClass('open');
        $(".jadwal-studio").addClass('active');
    } else if (aktif == "daftarPesanan") {
        $(".pesanan").addClass('active');
        $(".pesanan").addClass('open');
        $(".daftar-pesanan").addClass('active');
    } else if (aktif == "daftarKatalog") {
        $(".katalog").addClass('active');
        $(".katalog").addClass('open');
        $(".daftar-katalog").addClass('active');
    } else if (aktif == "daftarKaryawan") {
        $(".manajemen-data").addClass('active');
        $(".manajemen-data").addClass('open');
        $(".daftar-karyawan").addClass('active');
    } else if (aktif == "daftarClient") {
        $(".manajemen-data").addClass('active');
        $(".manajemen-data").addClass('open');
        $(".daftar-client").addClass('active');
    } else if (aktif == "lihatJadwal") {
        $(".kalender").addClass('active');
        $(".kalender").addClass('open');
        $(".lihat-jadwal").addClass('active');
    } else if (aktif == "income") {
        $(".laporan").addClass('active');
        $(".laporan").addClass('open');
        $(".laporan-masuk").addClass('active');
    } else if (aktif == "outcome") {
        $(".laporan").addClass('active');
        $(".laporan").addClass('open');
        $(".laporan-keluar").addClass('active');
    } else if (aktif == "ringkasanKeuangan") {
        $(".laporan").addClass('active');
        $(".laporan").addClass('open');
        $(".ringkasan-keuangan").addClass('active');
    } else if (aktif == "pengaturanAkun") {
        $(".pengaturan").addClass('active');
        $(".pengaturan").addClass('open');
        $(".pengaturan-akun").addClass('active');
    }
    </script>
    <!-- Page JS -->
    <?= $this->renderSection('pageJS') ?>

</body>

</html>