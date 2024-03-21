<?php $session = \Config\Services::session();
$level = $session->get('level'); ?>
<?= $this->extend('page/user/layout_user') ?>

<?= $this->section('content') ?>

<!-- Slider	============================================= -->
<section id="slider" class="slider-element swiper_wrapper min-vh-40 min-vh-md-75" data-autoplay="9000" data-speed="800"
    data-loop="true" data-grab="false">

    <div class="swiper-container swiper-parent">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="container">
                    <div class="slider-caption" style="margin-top: -30px;">
                        <div class="emphasis-title mb-0">
                            <h2 class="bottommargin fw-bold"
                                style="max-width: 600px; font-size: 60px; font-family: 'Montserrat'; line-height: 1.2;">
                                <?= $content['tagline01']?></h2>

                            <p class="lead topmargin-sm d-none d-md-block"
                                style="max-width: 600px; font-family: 'Poppins'; color: #999; font-size: 18px;">
                                <?= $content['taglinedesc01']?></p>
                        </div>
                    </div>
                </div>
                <div class="slide-number font-primary">O1</div>
                <div class="swiper-slide-bg"
                    style="background: #FFF url('demos/ecommerce/images/slider/1.jpg') no-repeat center right; background-size: auto 100%;">
                </div>
            </div>
            <div class="swiper-slide">
                <div class="container">
                    <div class="slider-caption" style="margin-top: -30px;">
                        <div class="emphasis-title mb-0">
                            <h2 class="bottommargin fw-bold"
                                style="max-width: 600px; font-size: 60px; font-family: 'Montserrat'; line-height: 1.2;">
                                <?= $content['tagline02']?></h2>

                            <p class="lead topmargin-sm d-none d-md-block"
                                style="max-width: 600px; font-family: 'Poppins'; color: #999; font-size: 18px;">
                                <?= $content['taglinedesc02']?></p>
                        </div>
                    </div>
                </div>
                <div class="slide-number font-primary">O2</div>
                <div class="swiper-slide-bg"
                    style="background: #FFF url('demos/ecommerce/images/slider/2.jpg') no-repeat center right; background-size: auto 100%;">
                </div>
            </div>
            <div class="swiper-slide">
                <div class="container">
                    <div class="slider-caption" style="margin-top: -30px;">
                        <div class="emphasis-title mb-0">
                            <h2 class="bottommargin fw-bold"
                                style="max-width: 600px; font-size: 60px; font-family: 'Montserrat'; line-height: 1.2;">
                                <?= $content['tagline03']?></h2>

                            <p class="lead topmargin-sm d-none d-md-block"
                                style="max-width: 600px; font-family: 'Poppins'; color: #999; font-size: 18px;">
                                <?= $content['taglinedesc03']?></p>
                        </div>
                    </div>
                </div>
                <div class="slide-number font-primary">O3</div>
                <div class="swiper-slide-bg"
                    style="background: #FFF url('demos/ecommerce/images/slider/3.jpg') no-repeat center right; background-size: auto 100%;">
                </div>
            </div>
        </div>
        <div class="slider-arrow-left"><i class="icon-line-arrow-left"></i></div>
        <div class="slider-arrow-right"><i class="icon-line-arrow-right"></i></div>
    </div>

</section><!-- #Slider End -->

<!-- Content
		============================================= -->
<section id="content">
    <div class="content-wrap py-0">
        <div class="clear"></div>

        <div class="container clearfix">

            <div class="heading-block border-bottom-0 center">
                <h3>Katalog Populer</h3>
                <span>Beberapa hasil QWERTY Studio yang diminati.</span>
            </div>

            <div class="row ecommerce-categories clearfix" style="padding: 20px 0 0;">
                <div class="col-lg-7">
                    <a href="#"
                        style="background: url('<?= base_url(); ?>/assets/userimg/types/1.png') no-repeat center center; background-size: cover;">
                        <div class="vertical-middle dark center">
                            <div class="heading-block m-0 border-0">
                                <h3 class="text-capitalize font-secondary nott fw-medium">Couple</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-5">
                    <a href="#"
                        style="background: url('<?= base_url(); ?>/assets/userimg/types/3.jpg') no-repeat center center; background-size: cover;">
                        <div class="vertical-middle dark center">
                            <div class="heading-block m-0 border-0">
                                <h3 class="text-capitalize font-secondary nott fw-medium">Dark</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4">
                    <a href="#"
                        style="background: url('<?= base_url(); ?>/assets/userimg/types/2.jpg') no-repeat center center; background-size: cover;">
                        <div class="vertical-middle dark center">
                            <div class="heading-block m-0 border-0">
                                <h3 class="text-capitalize font-secondary nott fw-medium">Fancy</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="#"
                        style="background: url('<?= base_url(); ?>/assets/userimg/types/4.jpg') no-repeat center center; background-size: cover;">
                        <div class="vertical-middle dark center">
                            <div class="heading-block m-0 border-0">
                                <h3 class="text-capitalize font-secondary nott fw-medium">Group</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="#"
                        style="background: url('<?= base_url(); ?>/assets/userimg/types/5.jpg') no-repeat center center; background-size: cover;">
                        <div class="vertical-middle dark center">
                            <div class="heading-block m-0 border-0">
                                <h3 class="text-capitalize font-secondary nott fw-medium">Family</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-5">
                    <a href="#"
                        style="background: url('<?= base_url(); ?>/assets/userimg/types/6.jpg') no-repeat center center; background-size: cover;">
                        <div class="vertical-middle dark center">
                            <div class="heading-block m-0 border-0">
                                <h3 class="text-capitalize font-secondary nott fw-medium">Wedding</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-7">
                    <a href="#"
                        style="background: url('<?= base_url(); ?>/assets/userimg/types/7.jpeg') no-repeat center center; background-size: cover;">
                        <div class="vertical-middle dark center">
                            <div class="heading-block m-0 border-0">
                                <h3 class="text-capitalize font-secondary nott fw-medium">Close Up</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="clear"></div>

    <div class="section dark mb-0">
        <div class="container clearfix">

        </div>
    </div>
    </div>
</section><!-- #content end -->
<?= $this->EndSection('content') ?>
