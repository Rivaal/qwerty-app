<?php $session = \Config\Services::session();
$level = $session->get('level'); ?>
<?= $this->extend('user/layout_user') ?>

<?= $this->section('content') ?>
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">

            <h3>Kata Sandi Baru</h3>

            <form action="<?= base_url('confirmPasswordChange') ?>" method="post">
                <?php if (session()->getFlashdata('error')) : ?>
                <div class="style-msg errormsg">
                    <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong>
                        <?= session()->getFlashdata('error') ?></div>
                </div>
                <?php endif; ?>
                <div class="form-group row">
                    <label for="password" class="col-sm-4 col-form-label">Kata Sandi Baru</label>
                    <div class="col-sm-8">
                        <input type="hidden" class="form-control" id="nowa" name="nowa" value="<?= $nowa ?>">
                        <input type="text" class="form-control" id="password" name="password"
                            placeholder="Kata Sandi Baru">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="confirmPassword" class="col-sm-4 col-form-label">Konfirmasi Kata Sandi Baru</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="confirmPassword" name="confirmPassword"
                            placeholder="Konfirmasi Kata Sandi Baru">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Ubah Kata Sandi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section><!-- #content end -->
<?= $this->EndSection('content') ?>