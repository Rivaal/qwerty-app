<?php $session = \Config\Services::session();
$level = $session->get('level'); ?>
<?= $this->extend('user/layout_user') ?>

<?= $this->section('content') ?>
<!-- Page Title
		============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1><?= $photo_name ?></h1>
        <div id="portfolio-navigation">
            <a href="../galeri"><i class="icon-line-grid"></i></a>
        </div>
    </div>

</section><!-- #page-title end -->
<!-- Content
		============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">

            <div class="row">

                <!-- Portfolio Single Image
						============================================= -->
                <div class="col-lg-8 portfolio-single-image">
                    <a><img src="../assets/userimg/cover/<?= $detail['cover_gallery']; ?>" alt="Image"></a>
                </div><!-- .portfolio-single-image end -->

                <!-- Portfolio Single Content
						============================================= -->
                <div class="col-lg-4 portfolio-single-content">

                    <!-- Portfolio Single - Description
							============================================= -->
                    <div class="fancy-title title-bottom-border">
                        <h2>Gallery Info:</h2>
                    </div>
                    <p><?= $detail['title_gallery'] ?></p>
                    <p><?= $detail['description_gallery'] ?></p>
                    <!-- Portfolio Single - Description End -->

                    <div class="line"></div>

                    <!-- Portfolio Single - Meta
							============================================= -->
                    <ul class="portfolio-meta bottommargin">
                        <li><span><i class="icon-user"></i>Diambil oleh:</span> <?= $detail['create_by']; ?></li>
                        <li><span><i class="icon-calendar3"></i>Pada tanggal:</span> <?= $detail['create_date']; ?>
                        </li>
                        <li><span><i class="icon-lightbulb"></i>Informasi:</span> <?= $detail['information_gallery']; ?>
                        </li>
                        <li><span><i class="icon-link"></i>Client:</span> <a
                                href="#"><?= $detail['client_gallery']; ?></a></li>
                    </ul>
                    <!-- Portfolio Single - Meta End -->

                    <!-- Portfolio Single - Share
							============================================= -->
                    <div class="si-share d-flex justify-content-between align-items-center mt-4">
                        <span>Bagikan:</span>
                        <div>
                            <a href="#" class="social-icon si-borderless si-facebook">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>
                            <a href="#" class="social-icon si-borderless si-twitter">
                                <i class="icon-twitter"></i>
                                <i class="icon-twitter"></i>
                            </a>
                            <a href="#" class="social-icon si-borderless si-pinterest">
                                <i class="icon-pinterest"></i>
                                <i class="icon-pinterest"></i>
                            </a>
                            <a href="#" class="social-icon si-borderless si-gplus">
                                <i class="icon-gplus"></i>
                                <i class="icon-gplus"></i>
                            </a>
                            <a href="#" class="social-icon si-borderless si-rss">
                                <i class="icon-rss"></i>
                                <i class="icon-rss"></i>
                            </a>
                            <a href="#" class="social-icon si-borderless si-email3">
                                <i class="icon-email3"></i>
                                <i class="icon-email3"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Portfolio Single - Share End -->

                </div><!-- .portfolio-single-content end -->

            </div>

            <div class="divider divider-center"><i class="icon-circle"></i></div>

            <!-- Related Portfolio Items
					============================================= -->
            <h4>Lainnya di <?= $categories_name ?> :</h4>

            <div id="related-portfolio" class="owl-carousel portfolio-carousel carousel-widget" data-margin="20"
                data-pagi="false" data-autoplay="5000" data-items-xs="1" data-items-sm="2" data-items-md="3"
                data-items-lg="4">

                <?php foreach ($related_detail as $related) : ?>
                <div class="oc-item">
                    <div class="portfolio-item">
                        <div class="portfolio-image">
                            <a href="portfolio-single.html">
                                <img src="../assets/userimg/cover/<?= $related['cover_gallery']; ?>"
                                    alt="Open Imagination">
                            </a>
                            <div class="bg-overlay">
                                <div class="bg-overlay-content dark" data-hover-animate="fadeIn" data-hover-speed="350">
                                    <a href="../detailfoto/<?= $related['id_gallery'] ?>"
                                        class="overlay-trigger-icon bg-light text-dark"
                                        data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeInUpSmall"
                                        data-hover-speed="350"><i class="icon-line-ellipsis"></i></a>
                                </div>
                                <div class="bg-overlay-bg dark" data-hover-animate="fadeIn" data-hover-speed="350">
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-desc">
                            <h3><a
                                    href="../detailfoto/<?= $related['id_gallery'] ?>"><?= $related['title_gallery'] ?></a>
                            </h3>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div><!-- .portfolio-carousel end -->
        </div>
    </div>
</section><!-- #content end -->
<?= $this->EndSection('content') ?>