<?php $session = \Config\Services::session();
$level = $session->get('level'); ?>
<?= $this->extend('user/layout_user') ?>

<?= $this->section('content') ?>
<!-- Page Title
		============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>VIDEO</h1>
        <span></span>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Video</li>
        </ol>
    </div>
</section><!-- #page-title end -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <!-- Portfolio Items
					============================================= -->
            <div id="portfolio" class="portfolio row grid-container gutter-20" data-layout="fitRows">

                <?php foreach ($detail as $video) : ?>
                <!-- Portfolio Item: Start -->
                <article class="portfolio-item col-lg-3 col-md-4 col-sm-6 col-12 pf-uielements pf-icons">
                    <div class="grid-inner">
                        <div class="portfolio-image">
                            <a href="portfolio-single-video.html">
                                <img src="/assets/userimg/cover/<?= $video['cover_video'] ?>"
                                    alt="<?= $video['title_video'] ?>">
                            </a>
                            <div class="bg-overlay">
                                <div class="bg-overlay-content dark" data-hover-animate="fadeIn">
                                    <a href="<?= $video['url_video'] ?>" target="_blank"
                                        class="overlay-trigger-icon bg-light text-dark"><i
                                            class="icon-<?= $video['category_video'] ?>"></i></a>
                                </div>
                                <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                            </div>
                        </div>
                        <div class="portfolio-desc">
                            <h3><a href="<?= $video['url_video'] ?>"><?= $video['title_video'] ?></a></h3>
                        </div>
                    </div>
                </article>
                <!-- Portfolio Item: End -->
                <?php endforeach; ?>
            </div><!-- #portfolio end -->

        </div>
    </div>
</section><!-- #content end -->
<?= $this->EndSection('content') ?>