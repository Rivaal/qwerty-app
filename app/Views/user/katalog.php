<?php $session = \Config\Services::session();
$level = $session->get('level'); ?>
<?= $this->extend('user/layout_user') ?>

<?= $this->section('content') ?>
<!-- Page Title
		============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Katalog</h1>
        <span></span>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Katalog</li>
        </ol>
    </div>

    <br>

    <div class="container widget subscribe-widget mt-0 clearfix">
        <div class="widget-subscribe-form-result"></div>
        <form id="widget-subscribe-form" action="include/subscribe.php" method="post" class="mb-0">
            <div class="input-group input-group-lg mx-auto">
                <input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email"
                    class="form-control required email" placeholder="Cari katalog ...">
                <button class="button button-black fw-light button-dark ls2 text-uppercase"
                    onclick="search();">CARI</button>
            </div>
        </form>
    </div>
</section><!-- #page-title end -->

<!-- Content
		============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">

            <div class="row col-mb-50">

                <div class="col-sm-6 col-12">
                    <div class="feature-box fbox-center fbox-outline fbox-lg fbox-effect">
                        <div class="fbox-icon">
                            <a href="../katalogdetail/Indoor"><i class="icon-home i-alt"></i></a>
                        </div>
                        <div class="fbox-content">
                            <h3>Katalog Studio</h3>
                            <p>Sesi pemotretan dilakukan di Studio QWERTY.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="feature-box fbox-center fbox-outline fbox-lg fbox-effect">
                        <div class="fbox-icon">
                            <a href="../katalogdetail/Outdoor"><i class="icon-door-open i-alt"></i></a>
                        </div>
                        <div class="fbox-content">
                            <h3>Katalog Outdoor</h3>
                            <p>Sesi pemotretan dilakukan diluar Studio QWERTY.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clear"></div>
            <div class="line"></div>

        </div>
    </div>
</section><!-- #content end -->
<?= $this->EndSection('content') ?>

<?= $this->section('script'); ?>
<script>
function search() {
    var text = $('#widget-subscribe-form-email').val();
    if (text != "") {
        window.location.replace("../katalogsearch/" + text);
    }
}
</script>
<?= $this->EndSection('script'); ?>