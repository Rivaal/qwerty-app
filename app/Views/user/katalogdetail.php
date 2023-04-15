<?php $session = \Config\Services::session();
$level = $session->get('level'); ?>
<?= $this->extend('user/layout_user') ?>

<?= $this->section('content') ?>
<!-- Page Title
		============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1><?= $id ?></h1>
        <span></span>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url("katalog"); ?>">Katalog</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $id ?></li>
        </ol>
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
                            <div class="fslider" data-arrows="false">
                                <div class="flexslider">
                                    <div class="slider-wrap">
                                        <div><a href="#"><img
                                                    src="../assets/userimg/package/<?= $result['image_package'] ?>"
                                                    alt="Dark Brown Boots"></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-overlay">
                                <div class="bg-overlay-content align-items-end justify-content-between"
                                    data-hover-animate="fadeIn" data-hover-speed="400">
                                    <a href="#" class="btn btn-dark me-2"><i class="icon-shopping-cart"></i></a>
                                    <a href="../include/ajax/shop-item.html" class="btn btn-dark"
                                        data-lightbox="ajax"><i class="icon-line-expand"></i></a>
                                </div>
                                <div class="bg-overlay-bg bg-transparent"></div>
                            </div>
                        </div>
                        <div class="product-desc col-lg-8 col-xl-9 px-lg-5 pt-lg-0">
                            <div class="product-title">
                                <h3><a href="#">
                                        <?= $result['title_package']; ?>
                                    </a></h3>
                            </div>
                            <div class="product-price">
                                <?= "Rp " . number_format($result['price_last_package'], 0, ',', '.') . ",-"; ?></div>

                            <p class="mt-3 d-none d-lg-block"><?= $result['desc_package']; ?></p>
                            <p class="mt-3 d-none d-lg-block"><?= $result['note_package']; ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div><!-- #shop end -->

        </div>
    </div>
</section><!-- #content end -->

<?= $this->EndSection('content') ?>