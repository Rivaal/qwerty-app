<?php $session = \Config\Services::session();
$level = $session->get('level'); ?>
<?= $this->extend('user/layout_user') ?>

<?= $this->section('content') ?>
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">

            <div class="accordion accordion-lg mx-auto mb-0 clearfix" style="max-width: 550px;">
                <?php if (session()->has('errorlogin')): ?>
                <div class="col-12 form-group">
                    <div class="style-msg errormsg">
                        <div class="sb-msg"><i class="icon-remove"></i>
                            <strong><?= session()->get('errorlogin') ?></strong>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="accordion-header">
                    <div class="accordion-icon">
                        <i class="accordion-closed icon-lock3"></i>
                        <i class="accordion-open icon-unlock"></i>
                    </div>
                    <div class="accordion-title">
                        Masuk untuk melanjutkan
                    </div>
                </div>
                <div class="accordion-content clearfix">
                    <form id="login-form" name="login-form" class="row mb-0" action="logins" method="post">

                        <div class="col-12 form-group">
                            <!-- <label for="login-form-phone">Nomor Whatsapp:</label> -->
                            <input type="text" id="login-form-phone" name="login-form-phone" value=""
                                class="form-control" placeholder="Nomor Whatsapp" required />
                        </div>

                        <div class="col-12 form-group">
                            <label for="login-form-password">Password:</label>
                            <input type="password" id="login-form-password" name="login-form-password" value=""
                                class="form-control" placeholder="********" required />
                        </div>

                        <div class="col-12 form-group">
                            <button class="button button-3d button-black m-0" id="login-form-submit"
                                name="login-form-submit" value="login">Masuk</button>
                            <a href="<?= base_url('sendWhatsappVerification') ?>" class="float-end">Lupa
                                kata sandi?</a>
                        </div>
                    </form>
                </div>

                <div class="accordion-header">
                    <div class="accordion-icon">
                        <i class="accordion-closed icon-user4"></i>
                        <i class="accordion-open icon-ok-sign"></i>
                    </div>
                    <div class="accordion-title">
                        Baru? Daftar Terlebih Dahulu
                    </div>
                </div>
                <div class="accordion-content clearfix">
                    <form class="row mb-0" action="<?= base_url('registrationUser') ?>" method="post">
                        <div class="col-12 form-group">
                            <label for="rnamalengkap">Nama Lengkap:</label>
                            <input type="text" id="rnamalengkap" name="rnamalengkap" class="form-control"
                                placeholder="Nama Lengkap" required />
                        </div>

                        <div class="col-12 form-group">
                            <label for="rnowa">Nomor Whatsapp:</label>
                            <input type="number" id="rnowa" name="rnowa" class="form-control"
                                placeholder="Nomor Whatsapp" required />
                        </div>

                        <div class="col-12 form-group">
                            <label for="ralamat">Alamat:</label>
                            <input type="text" id="ralamat" name="ralamat" class="form-control" placeholder="Alamat"
                                required />
                        </div>

                        <div class="col-12 form-group">
                            <label for="rusername">Buat Username:</label>
                            <input type="text" id="rusername" name="rusername" class="form-control"
                                placeholder="Username" required />
                        </div>

                        <div class="col-12 form-group">
                            <label for="rpassword">Password:</label>
                            <input type="password" id="rpassword" name="rpassword" class="form-control"
                                placeholder="Password" required />
                        </div>

                        <div class="col-12 form-group">
                            <label for="rconfirmpassword">Ulangi Password:</label>
                            <input type="password" id="rconfirmpassword" name="rconfirmpassword" class="form-control"
                                placeholder="Confirm Password" required />
                        </div>

                        <div class="col-12 form-group">
                            <button type="submit" class="button button-3d button-black m-0">Daftar</button>
                        </div>
                    </form>
                </div>

                <div class="accordion-header">
                    <div class="accordion-icon">
                        <i class="accordion-closed icon-user-check"></i>
                        <i class="accordion-open icon-user-check"></i>
                    </div>
                    <div class="accordion-title">
                        Administrator
                    </div>
                </div>
                <div class="accordion-content clearfix">
                    <form id="login-admin-form" name="login-admin-form" class="row mb-0" action="#" method="post">
                        <div class="col-12 form-group">
                            <a href="<?= base_url("Auth"); ?>" class="button button-3d button-black m-0"
                                value="register">Masuk</a>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</section><!-- #content end -->
<?= $this->EndSection('content') ?>