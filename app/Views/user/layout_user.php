<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
	============================================= -->
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Montserrat:300,400,500,600,700|Merriweather:300,400,300i,400i&display=swap"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/style.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/css/dark.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/css/swiper.css" type="text/css" />

    <!-- eCommerce Demo Specific Stylesheet -->
    <link rel="stylesheet" href="<?= base_url(); ?>/demos/ecommerce/ecommerce.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/demos/ecommerce/css/fonts.css" type="text/css" />
    <!-- / -->

    <link rel="stylesheet" href="<?= base_url(); ?>/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/css/magnific-popup.css" type="text/css" />

    <link rel="stylesheet" href="<?= base_url(); ?>/css/custom.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="<?= base_url(); ?>/css/colors.php?color=000000" type="text/css" />

    <!-- Document Title
	============================================= -->
    <title>QWERTY Studio</title>

</head>

<body class="stretched">

    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Header
		============================================= -->
        <header id="header" class="full-header no-sticky" data-menu-padding="30">
            <div id="header-wrap">
                <div class="container">
                    <div class="header-row align-items-lg-stretch">

                        <!-- Logo
						============================================= -->
                        <div id="logo">
                            <a href="" class="standard-logo"><img src="<?= base_url(); ?>/assets/userimg/logo.png"
                                    alt="Canvas Logo"></a>
                            <a href="" class="retina-logo"> <img src="<?= base_url(); ?>/assets/userimg/logo.png"
                                    alt="Canvas Logo"></a>
                        </div><!-- #logo end -->

                        <div class="header-misc align-items-lg-stretch">

                            <!-- Top Cart
							============================================= -->
                            <div id="top-cart" class="header-misc-icon">
                                <a href="#" id="top-cart-trigger"><i class="icon-line-bag"></i><span
                                        class="top-cart-number">5</span></a>
                                <div class="top-cart-content">
                                    <div class="top-cart-title">
                                        <h4>Keranjang Kamu</h4>
                                    </div>
                                    <div class="top-cart-items">
                                        <div class="top-cart-item">
                                            <div class="top-cart-item-image">
                                                <a href="#"><img src="<?= base_url(); ?>images/shop/small/1.jpg"
                                                        alt="Blue Round-Neck Tshirt" /></a>
                                            </div>
                                            <div class="top-cart-item-desc">
                                                <div class="top-cart-item-desc-title">
                                                    <a href="#">Paket katalog yang dipilih</a>
                                                    <span class="top-cart-item-price d-block">Rp75.000</span>
                                                </div>
                                                <div class="top-cart-item-quantity">x 1</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="top-cart-action">
                                        <span class="top-checkout-price">Rp75.000</span>
                                        <a href="#" class="button button-3d button-small m-0">Detail</a>
                                    </div>
                                </div>
                            </div><!-- #top-cart end -->

                            <!-- Top Account
							============================================= -->
                            <div class="header-misc-icon">
                                <a href="<?= base_url('Auth/Login'); ?>"><i class="icon-line2-user"></i></a>
                            </div>
                        </div>

                        <div id="primary-menu-trigger">
                            <svg class="svg-trigger" viewBox="0 0 100 100">
                                <path
                                    d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20">
                                </path>
                                <path d="m 30,50 h 40"></path>
                                <path
                                    d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20">
                                </path>
                            </svg>
                        </div>

                        <!-- Primary Navigation
						============================================= -->
                        <nav class="primary-menu style-ecommerce menu-spacing-margin">

                            <ul class="menu-container">
                                <li class="home menu-item"><a class="menu-link" href="<?= base_url(); ?>">
                                        <div>Beranda</div>
                                    </a></li>
                                <li class="galeri menu-item"><a class="menu-link" href="<?= base_url('galeri'); ?>">
                                        <div>Galeri</div>
                                    </a></li>
                                <li class="video menu-item"><a class="menu-link" href="<?= base_url('video'); ?>">
                                        <div>Video</div>
                                    </a></li>
                                <li class="katalog menu-item"><a class="menu-link" href="<?= base_url('katalog'); ?>">
                                        <div>Katalog</div>
                                    </a>
                                </li>
                                <li class="caratransaksi menu-item"><a class="menu-link"
                                        href="<?= base_url('caratransaksi'); ?>">
                                        <div>Cara Transaksi</div>
                                    </a></li>
                                <li class="hubungikami menu-item"><a class="menu-link"
                                        href="<?= base_url('hubungikami'); ?>">
                                        <div>Hubungi Kami</div>
                                    </a></li>
                            </ul>

                        </nav><!-- #primary-menu end -->

                    </div>
                </div>
            </div>
            <div class="header-wrap-clone"></div>
        </header><!-- #header end -->

        <?= $this->renderSection('content') ?>

        <!-- Footer
		============================================= -->
        <footer id="footer" class="border-0 bg-transparent">

            <div class="container clearfix">

                <!-- Footer Widgets
				============================================= -->
                <div class="footer-widgets-wrap clearfix" style="padding: 60px 0 100px;">

                    <div class="row">
                        <div class="col-lg-6 col-md-6">

                            <div class="row clearfix">
                                <div class="col-lg-6">
                                    <div class="widget widget_links widget-li-noicon">
                                        <h4>Tentang Kami</h4>
                                        <ul>
                                            <li><a href="#">Alamat</a></li>
                                            <li><a href="#">Jadwal Kerja</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                </div>
                            </div>

                            <div class="clear"></div>

                            <div class="line line-sm"></div>

                            <div class="copy-link"><a href="mailto:noreply@canvas.com"><i class="icon-envelope2"></i>
                                    qwerty@studio.com</a> <span class="middot"> | </span> <a
                                    href="tel:+1-11-6541-6369"><i class="icon-headphones"></i> +1234567890</a> <span
                                    class="middot">
                            </div>

                        </div>

                        <div class="col-lg-5 offset-lg-1">

                            <div class="widget">
                                <h4>Terhubung Bersama Kami</h4>

                                <div class="bottommargin-sm clearfix">
                                    <a href="#" class="social-icon si-dark si-mini si-rounded si-facebook"
                                        title="Facebook">
                                        <i class="icon-facebook"></i>
                                        <i class="icon-facebook"></i>
                                    </a>

                                    <a href="#" class="social-icon si-dark si-mini si-rounded si-twitter"
                                        title="Twitter">
                                        <i class="icon-twitter"></i>
                                        <i class="icon-twitter"></i>
                                    </a>

                                    <a href="#" class="social-icon si-dark si-mini si-rounded si-instagram"
                                        title="Instagram">
                                        <i class="icon-instagram"></i>
                                        <i class="icon-instagram"></i>
                                    </a>

                                    <a href="#" class="social-icon si-dark si-mini si-rounded si-pinterest"
                                        title="Pinterest">
                                        <i class="icon-pinterest"></i>
                                        <i class="icon-pinterest"></i>
                                    </a>

                                    <a href="#" class="social-icon si-dark si-mini si-rounded si-vimeo" title="Vimeo">
                                        <i class="icon-vimeo"></i>
                                        <i class="icon-vimeo"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="widget subscribe-widget mt-0 clearfix">
                                <h5><strong>Berlangganan</strong> untuk mendapatkan info dan promo terbaru dari kami:
                                </h5>
                                <div class="widget-subscribe-form-result"></div>
                                <form id="widget-subscribe-form" action="include/subscribe.php" method="post"
                                    class="mb-0">
                                    <div class="input-group input-group-lg mx-auto">
                                        <input type="email" id="widget-subscribe-form-email"
                                            name="widget-subscribe-form-email" class="form-control required email"
                                            placeholder="Email Kamu">
                                        <button class="button button-black fw-light button-dark ls2 text-uppercase"
                                            type="submit">Hubungkan</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                </div><!-- .footer-widgets-wrap end -->

            </div>

        </footer><!-- #footer end -->

    </div><!-- #wrapper end -->

    <!-- Go To Top
	============================================= -->
    <div id="gotoTop" class="icon-line-arrow-up"></div>

    <!-- JavaScripts
	============================================= -->
    <script src="<?= base_url(); ?>/js/jquery.js"></script>
    <script src="<?= base_url(); ?>/js/plugins.min.js"></script>

    <!-- Footer Scripts
	============================================= -->
    <script src="<?= base_url(); ?>/js/functions.js"></script>

    <script>
    // Topbar Hide
    $('#top-bar').on('click', '#close-bar', function() {
        $(this).parents('#top-bar').slideUp(300);
        $('body').css('padding-top', 0);
    })


    var path = location.pathname.split('/');
    var aktif = path[1];
    if (aktif == "") {
        $(".home").addClass('current');
        $('.owl-carousel').owlCarousel({
            items: 1,
            dotsContainer: '#item-color-dots',
            loop: true,
        });
    } else if (aktif == "galeri") {
        $(".galeri").addClass('current');
    } else if (aktif == "detailgaleri") {
        $(".galeri").addClass('current');
    } else if (aktif == "detailfoto") {
        $(".galeri").addClass('current');
    } else if (aktif == "video") {
        $(".video").addClass('current');
    } else if (aktif == "katalog") {
        $(".katalog").addClass('current');
    } else if (aktif == "caratransaksi") {
        $(".caratransaksi").addClass('current');
    } else if (aktif == "hubungikami") {
        $(".hubungikami").addClass('current');
    }
    </script>

</body>

</html>