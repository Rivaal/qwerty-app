<?php $session = \Config\Services::session();
$level = $session->get('level'); ?>
<?= $this->extend('user/layout_user') ?>

<?= $this->section('content') ?>
<!-- Page Title
		============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Pencarian '<?= $id ?>'</h1>
        <span></span>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url("katalog"); ?>">Katalog</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $id ?></li>
        </ol>
    </div>

    <br>

    <div class="container widget subscribe-widget mt-0 clearfix">
        <div class="widget-subscribe-form-result"></div>
        <form id="widget-subscribe-form" action="" method="post" class="mb-0">
            <div class="input-group input-group-lg mx-auto">
                <input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email"
                    class="form-control required email" placeholder="Cari Katalog ..." value="<?= $id ?>">
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

            <!-- Shop
					============================================= -->
            <div id="shop" class="shop row grid-container gutter-30" data-layout="fitRows">
                <!-- this one -->
                <?php foreach ($package as $result) : ?>
                <div class="product col-12 col-sm-6 col-lg-12">
                    <div class="grid-inner row g-0">
                        <div class="product-image col-lg-4 col-xl-3">
                            <a href="../singledetail/<?= $result['id_package']; ?>"><img
                                    src="../assets/userimg/package/<?= $result['image_package']; ?>"
                                    alt="<?= $result['title_package']; ?>"></a>
                            <div class="bg-overlay">
                                <div class="bg-overlay-content align-items-end justify-content-between"
                                    data-hover-animate="fadeIn" data-hover-speed="400">
                                    <a href="#" class="btn btn-dark me-2"><i class="icon-shopping-cart"></i></a>
                                    <a href="/packagedetail/<?= $result['id_package']; ?>" class="btn btn-dark"
                                        data-lightbox="ajax"><i class="icon-line-expand"></i></a>
                                </div>
                                <div class="bg-overlay-bg bg-transparent"></div>
                            </div>
                        </div>
                        <div class="product-desc col-lg-8 col-xl-9 px-lg-5 pt-lg-0">
                            <div class="product-title">
                                <h3><a
                                        href="../singledetail/<?= $result['id_package']; ?>"><?= $result['title_package']; ?></a>
                                </h3>
                            </div>
                            <?php if ($result['disc_package'] != 0) {?>
                            <div class="product-price">
                                <del>Rp<?= number_format($result['price_init_package'], 0, ",", "."); ?></del>
                                <ins>Rp<?= number_format($result['price_last_package'], 0, ",", "."); ?> (Diskon
                                    <?= $result['disc_package']; ?>%)</ins>
                            </div>
                            <?php } else { ?>
                            <div class="product-price"><ins>Rp
                                    <?= number_format($result['price_last_package'], 0, ",", "."); ?></ins></div>
                            <?php } ?>
                            <p class="mt-3 d-none d-lg-block">
                                <?= $result['desc_package']; ?><br><?= $result['note_package']; ?></p>
                        </div>
                    </div>
                </div>

                <?php endforeach; ?>
                <?php if (count($package) == 0) {
                    echo "<div class='center'><span>Katalog yang dicari tidak ditemukan.</span></div>";
                } ?>
            </div><!-- #shop end -->

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