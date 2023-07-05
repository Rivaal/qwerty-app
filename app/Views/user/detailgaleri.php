<?php $session = \Config\Services::session();
$level = $session->get('level'); ?>
<?= $this->extend('user/layout_user') ?>

<?= $this->section('content') ?>
<!-- Page Title
		============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1><?= $categories_name ?></h1>
        <span></span>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('galeri'); ?>">Galeri</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
        </ol>
    </div>

</section><!-- #page-title end -->
<!-- Content
		============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <!-- Portfolio Items
					============================================= -->
            <div id="portfolio" class="portfolio row grid-container gutter-20" data-layout="fitRows">

                <?php foreach ($detail as $gallery) : ?>
                <!-- Portfolio Item: Start -->
                <article class="portfolio-item col-lg-3 col-md-4 col-sm-6 col-12">
                    <!-- Grid Inner: Start -->
                    <div class="grid-inner">
                        <!-- Image: Start -->
                        <div class="portfolio-image">
                            <a href="portfolio-single.html">
                                <img src="/assets/userimg/cover/<?= $gallery['cover_gallery']; ?>"
                                    alt="<?= $gallery['title_gallery']; ?>">
                            </a>
                            <!-- Overlay: Start -->
                            <div class="bg-overlay">
                                <div class="bg-overlay-content dark" data-hover-animate="fadeIn">
                                    <a href="/assets/userimg/cover/<?= $gallery['cover_gallery']; ?>"
                                        class="overlay-trigger-icon bg-light text-dark"
                                        data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall"
                                        data-hover-speed="350" data-lightbox="image"
                                        title="<?= $gallery['title_gallery']; ?>"><i class="icon-search"></i></a>
                                    <a href="<?= base_url(); ?>/detailfoto/<?= $gallery['id_gallery']; ?>"
                                        class="overlay-trigger-icon bg-light text-dark"
                                        data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall"
                                        data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                                </div>
                                <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                            </div>
                            <!-- Overlay: End -->
                        </div>
                        <!-- Image: End -->
                        <!-- Decription: Start -->
                        <div class="portfolio-desc">
                            <h3><a
                                    href="<?= base_url(); ?>/detailfoto/<?= $gallery['id_gallery']; ?>"><?= $gallery['title_gallery']; ?></a>
                            </h3>
                        </div>
                        <!-- Description: End -->
                    </div>
                    <!-- Grid Inner: End -->
                </article>
                <!-- Portfolio Item: End -->
                <?php endforeach; ?>
            </div><!-- #portfolio end -->

        </div>
    </div>
</section><!-- #content end -->
<?= $this->EndSection('content') ?>