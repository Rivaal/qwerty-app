<?php $session = \Config\Services::session();
$level = $session->get('level'); ?>
<?= $this->extend('page/user/layout_user') ?>

<?= $this->section('content') ?>


<!-- Page Title
		============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Katalog</h1>
        <span>Pesan Berdasarkan Katalog</span>
    </div>

</section><!-- #page-title end -->


<!-- Content
		============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">

            <div class="row col-mb-50">

                <div class="col-sm-6 col-lg-3">
                    <div class="feature-box fbox-center fbox-outline fbox-lg fbox-effect">
                        <div class="fbox-icon">
                            <a href="#"><i class="icon-camera i-alt"></i></a>
                        </div>
                        <div class="fbox-content">
                            <h3>Portait<span class="subtitle">Sekitar 100 foto dengan kategori ini telah kami abadikan</span></h3>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section><!-- #content end -->


<div class="section dark mb-0">
    <div class="container clearfix">

    </div>
</div>

<?= $this->EndSection('content') ?>