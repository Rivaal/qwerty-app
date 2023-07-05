<?php $session = \Config\Services::session();
$level = $session->get('level'); ?>
<?= $this->extend('user/layout_user') ?>

<?= $this->section('content') ?>
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">

            <h3>Masukan OTP yang dikirimkan</h3>

            <form action="<?= base_url('verifOTP') ?>" method="post">
                <?php if (session()->getFlashdata('error')) : ?>
                <div class="style-msg errormsg">
                    <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong>
                        <?= session()->getFlashdata('error') ?></div>
                </div>
                <?php endif; ?>
                <div class="form-group row">
                    <label for="otp" class="col-sm-4 col-form-label">Kode OTP</label>
                    <div class="col-sm-8">
                        <input type="hidden" class="form-control" id="nowa" name="nowa" value="<?= $nowa ?>">
                        <input type="number" class="form-control" id="otp" name="otp" placeholder="Kode OTP">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</section><!-- #content end -->
<?= $this->EndSection('content') ?>