<?php $session = \Config\Services::session();
$level = $session->get('level'); ?>
<?= $this->extend('user/layout_user') ?>

<?= $this->section('content') ?>
<!-- Page Title
		============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1><?= $package['title_package'] ?></h1>
        <span></span>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url("katalog"); ?>">Katalog</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $package['title_package'] ?></li>
        </ol>
    </div>

    <br>

    <div class="container widget subscribe-widget mt-0 clearfix">
        <div class="widget-subscribe-form-result"></div>
        <form id="widget-subscribe-form" action="include/subscribe.php" method="post" class="mb-0">
            <div class="input-group input-group-lg mx-auto">
                <input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email"
                    class="form-control required email" placeholder="Cari Katalog ...">
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

            <div class="single-product">
                <div class="product">
                    <div class="row gutter-40">

                        <div class="col-md-5">

                            <!-- Product Single - Gallery
									============================================= -->
                            <div class="product-image">
                                <div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
                                    <div class="flexslider">
                                        <div class="slider-wrap" data-lightbox="gallery">
                                            <div class="slide"
                                                data-thumb="<?= base_url(); ?>/assets/userimg/package/<?= $package['image_package']; ?>">
                                                <a href="<?= base_url(); ?>/assets/userimg/package/<?= $package['image_package']; ?>"
                                                    title="Pink Printed Dress - Front View"
                                                    data-lightbox="gallery-item"><img
                                                        src="<?= base_url(); ?>/assets/userimg/package/<?= $package['image_package']; ?>"
                                                        alt="Pink Printed Dress"></a>
                                            </div>
                                            <?php
                                                if ($package['image1_dp'] != "") :
                                                    ?>
                                            <div class="slide"
                                                data-thumb="<?= base_url(); ?>/assets/userimg/detailpackage/<?= $package['image1_dp']; ?>">
                                                <a href="<?= base_url(); ?>/assets/userimg/detailpackage/<?= $package['image1_dp']; ?>"
                                                    title="Pink Printed Dress - Side View"
                                                    data-lightbox="gallery-item"><img
                                                        src="<?= base_url(); ?>/assets/userimg/detailpackage/<?= $package['image1_dp']; ?>"
                                                        alt="Pink Printed Dress"></a>
                                            </div>
                                            <?php endif; ?>
                                            <?php
                                                if ($package['image2_dp'] != "") :
                                                    ?>
                                            <div class="slide"
                                                data-thumb="<?= base_url(); ?>/assets/userimg/detailpackage/<?= $package['image2_dp']; ?>">
                                                <a href="<?= base_url(); ?>/assets/userimg/detailpackage/<?= $package['image2_dp']; ?>"
                                                    title="Pink Printed Dress - Back View"
                                                    data-lightbox="gallery-item"><img
                                                        src="<?= base_url(); ?>/assets/userimg/detailpackage/<?= $package['image2_dp']; ?>"
                                                        alt="Pink Printed Dress"></a>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($package['disc_package'] != 0) {?>
                                <div class="badge bg-success p-2">Diskon <?= $package['disc_package'] ?>%</div>
                                <?php } ?>
                            </div><!-- Product Single - Gallery End -->

                        </div>

                        <div class="col-md-5 product-desc">

                            <div class="d-flex align-items-center justify-content-between">

                                <!-- Product Single - Price
										============================================= -->
                                <?php if ($package['disc_package'] != 0) {?>
                                <div class="product-price">
                                    <del>Rp<?= number_format($package['price_init_package'], 0, ",", "."); ?></del>
                                    <ins>Rp<?= number_format($package['price_last_package'], 0, ",", "."); ?></ins>
                                </div>
                                <?php } else { ?>
                                <div class="product-price">
                                    <ins>Rp<?= number_format($package['price_last_package'], 0, ",", "."); ?></ins>
                                </div>
                                <?php } ?>
                                <!-- Product Single - Price End -->

                                <!-- Product Single - Rating
										============================================= -->
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-half-full"></i>
                                </div><!-- Product Single - Rating End -->

                            </div>

                            <div class="line"></div>

                            <!-- Product Single - Quantity & Cart Button
									============================================= -->
                            <div class="cart mb-0 d-flex justify-content-between align-items-center"
                                enctype='multipart/div-data'>
                                <div class=" quantity clearfix">
                                    <a href="<?= base_url(); ?>/booking/<?= $package['id_package']; ?>"
                                        class="add-to-cart button button-border button-blue">BOOKING</a>
                                </div>
                                <?php if ($cart == true) {?>
                                <button type="button" class="add-to-cart button m-0" disabled>
                                    <i class="icon-check"></i><i class="icon-shopping-bag"></i></button>
                                <?php } else {?>
                                <a href="<?= base_url(); ?>/tambahkeranjang/<?= $package['id_package']; ?>"
                                    class="add-to-cart button m-0">
                                    <i class="icon-plus"></i><i class="icon-shopping-bag"></i></a>
                                <?php } ?>
                            </div><!-- Product Single - Quantity & Cart Button End -->

                            <div class="line"></div>

                            <!-- Product Single - Short Description
									============================================= -->
                            <p><?= $package['desc_package'] ?></p>
                            <p><?= $package['note_package'] ?></p>

                            <!-- Product Single - Meta
									============================================= -->
                            <div class="card product-meta">
                                <div class="card-body">
                                    <span class="tagged_as">Tags: <?= $package['tag_dp']; ?>.</span>
                                </div>
                            </div><!-- Product Single - Meta End -->

                            <!-- Product Single - Share
									============================================= -->
                            <div class="si-share border-0 d-flex justify-content-between align-items-center mt-4">
                                <span>Share:</span>
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
                            </div><!-- Product Single - Share End -->

                        </div>

                        <div class="col-md-2">

                            <div class="feature-box fbox-plain fbox-dark fbox-sm">
                                <div class="fbox-icon">
                                    <i class="icon-thumbs-up2"></i>
                                </div>
                                <div class="fbox-content fbox-content-sm">
                                    <h3>Kualitas</h3>
                                    <p class="mt-0">Kami Menjamin Kualitas Gambar yang dibuat.</p>
                                </div>
                            </div>

                            <div class="feature-box fbox-plain fbox-dark fbox-sm mt-4">
                                <div class="fbox-icon">
                                    <i class="icon-credit-cards"></i>
                                </div>
                                <div class="fbox-content fbox-content-sm">
                                    <h3>Pembayaran</h3>
                                    <p class="mt-0">Kami Memiliki Cukup Banyak Pilihan Metode Pembayaran.</p>
                                </div>
                            </div>

                            <div class="feature-box fbox-plain fbox-dark fbox-sm mt-4">
                                <div class="fbox-icon">
                                    <i class="icon-truck2"></i>
                                </div>
                                <div class="fbox-content fbox-content-sm">
                                    <h3>Free Delivery</h3>
                                    <p class="mt-0">Gratis Antar untuk beberapa Tempat yang disepakati.</p>
                                </div>
                            </div>
                        </div>

                        <div class="w-100"></div>

                        <div class="col-12 mt-5">

                            <div class="tabs clearfix mb-0" id="tab-1">

                                <ul class="tab-nav clearfix">
                                    <li><a href="#tabs-1"><i class="icon-info-sign"></i><span
                                                class="d-none d-md-inline-block"> Informasi Tambahan</span></a></li>
                                    <li><a href="#tabs-2"><i class="icon-star3"></i><span
                                                class="d-none d-md-inline-block">
                                                Penilaian</span></a></li>
                                </ul>

                                <div class="tab-container">
                                    <div class="tab-content clearfix" id="tabs-1">

                                        <table class="table table-striped table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td>Size</td>
                                                    <td><?= $package['size_dp'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Orang</td>
                                                    <td><?= $package['person_dp'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Expose</td>
                                                    <td><?= $package['expose_dp'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Jenis Foto</td>
                                                    <td><?= $package['type_dp'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Durasi</td>
                                                    <td><?= $package['duration_dp'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Lokasi</td>
                                                    <td><?= $package['location_dp'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Cetakan</td>
                                                    <td><?= $package['printout_dp'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="tab-content clearfix" id="tabs-2">

                                        <div id="reviews" class="clearfix">

                                            <ol class="commentlist clearfix">

                                                <li class="comment even thread-even depth-1" id="li-comment-1">
                                                    <div id="comment-1" class="comment-wrap clearfix">

                                                        <div class="comment-meta">
                                                            <div class="comment-author vcard">
                                                                <span class="comment-avatar clearfix">
                                                                    <img alt='Image'
                                                                        src='<?= base_url(); ?>/images/icons/avatar.jpg'
                                                                        height='60' width='60' /></span>
                                                            </div>
                                                        </div>

                                                        <div class="comment-content clearfix">
                                                            <div class="comment-author">John Doe<span><a href="#"
                                                                        title="Permalink to this comment">April 24, 2021
                                                                        at 10:46AM</a></span></div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                Quo perferendis aliquid tenetur. Aliquid, tempora, sit
                                                                aliquam officiis nihil autem eum at repellendus facilis
                                                                quaerat consequatur commodi laborum saepe non nemo nam
                                                                maxime quis error tempore possimus est quasi
                                                                reprehenderit fuga!</p>
                                                            <div class="review-comment-ratings">
                                                                <i class="icon-star3"></i>
                                                                <i class="icon-star3"></i>
                                                                <i class="icon-star3"></i>
                                                                <i class="icon-star3"></i>
                                                                <i class="icon-star-half-full"></i>
                                                            </div>
                                                        </div>

                                                        <div class="clear"></div>

                                                    </div>
                                                </li>

                                                <li class="comment even thread-even depth-1" id="li-comment-2">
                                                    <div id="comment-2" class="comment-wrap clearfix">

                                                        <div class="comment-meta">
                                                            <div class="comment-author vcard">
                                                                <span class="comment-avatar clearfix">
                                                                    <img alt='Image'
                                                                        src='<?= base_url(); ?>/images/icons/avatar.jpg'
                                                                        height='60' width='60' /></span>
                                                            </div>
                                                        </div>

                                                        <div class="comment-content clearfix">
                                                            <div class="comment-author">Mary Jane<span><a href="#"
                                                                        title="Permalink to this comment">June 16, 2021
                                                                        at 6:00PM</a></span></div>
                                                            <p>Quasi, blanditiis, neque ipsum numquam odit asperiores
                                                                hic dolor necessitatibus libero sequi amet voluptatibus
                                                                ipsam velit qui harum temporibus cum nemo iste aperiam
                                                                explicabo fuga odio ratione sint fugiat consequuntur
                                                                vitae adipisci delectus eum incidunt possimus tenetur
                                                                excepturi at accusantium quod doloremque reprehenderit
                                                                aut expedita labore error atque?</p>
                                                            <div class="review-comment-ratings">
                                                                <i class="icon-star3"></i>
                                                                <i class="icon-star3"></i>
                                                                <i class="icon-star3"></i>
                                                                <i class="icon-star-empty"></i>
                                                                <i class="icon-star-empty"></i>
                                                            </div>
                                                        </div>

                                                        <div class="clear"></div>

                                                    </div>
                                                </li>

                                            </ol>

                                            <!-- Modal Reviews
													============================================= -->
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#reviewFormModal"
                                                class="button button-3d m-0 float-end">Add a Review</a>

                                            <div class="modal fade" id="reviewFormModal" tabindex="-1" role="dialog"
                                                aria-labelledby="reviewFormModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="reviewFormModalLabel">Submit a
                                                                Review</h4>
                                                            <button type="button" class="btn-close btn-sm"
                                                                data-bs-dismiss="modal" aria-hidden="true"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="row mb-0" id="template-reviewform"
                                                                name="template-reviewform" action="#" method="post">

                                                                <div class="col-6 mb-3">
                                                                    <label for="template-reviewform-name">Name
                                                                        <small>*</small></label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-text"><i
                                                                                class="icon-user"></i></div>
                                                                        <input type="text" id="template-reviewform-name"
                                                                            name="template-reviewform-name" value=""
                                                                            class="form-control required" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-6 mb-3">
                                                                    <label for="template-reviewform-email">Email
                                                                        <small>*</small></label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-text">@</div>
                                                                        <input type="email"
                                                                            id="template-reviewform-email"
                                                                            name="template-reviewform-email" value=""
                                                                            class="required email form-control" />
                                                                    </div>
                                                                </div>

                                                                <div class="w-100"></div>

                                                                <div class="col-12 mb-3">
                                                                    <label
                                                                        for="template-reviewform-rating">Rating</label>
                                                                    <select id="template-reviewform-rating"
                                                                        name="template-reviewform-rating"
                                                                        class="form-select">
                                                                        <option value="">-- Select One --</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </div>

                                                                <div class="w-100"></div>

                                                                <div class="col-12 mb-3">
                                                                    <label for="template-reviewform-comment">Comment
                                                                        <small>*</small></label>
                                                                    <textarea class="required form-control"
                                                                        id="template-reviewform-comment"
                                                                        name="template-reviewform-comment" rows="6"
                                                                        cols="30"></textarea>
                                                                </div>

                                                                <div class="col-12">
                                                                    <button class="button button-3d m-0" type="submit"
                                                                        id="template-reviewform-submit"
                                                                        name="template-reviewform-submit"
                                                                        value="submit">Submit Review</button>
                                                                </div>

                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                            <!-- Modal Reviews End -->

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="line"></div>

            <div class="w-100">

                <h4>Katalog Lainnya</h4>

                <div class="owl-carousel product-carousel carousel-widget" data-margin="30" data-pagi="false"
                    data-autoplay="5000" data-items-xs="1" data-items-md="2" data-items-lg="3" data-items-xl="4">

                    <?php foreach ($other as $result) :?>
                    <div class="oc-item">
                        <div class="product">
                            <div class="product-image">
                                <a href="<?= base_url(); ?>/singledetail/<?= $result['id_package']; ?>"><img
                                        src="<?= base_url(); ?>/assets/userimg/package/<?= $result['image_package']; ?>"
                                        alt="<?= $result['title_package']; ?>"></a>
                                <div class="bg-overlay">
                                    <div class="bg-overlay-content align-items-end justify-content-between"
                                        data-hover-animate="fadeIn" data-hover-speed="400">
                                        <a href="<?= base_url(); ?>/singledetail/<?= $result['id_package']; ?>"
                                            class="btn btn-dark me-2"><i class="icon-shopping-cart"></i></a>
                                        <a href="<?= base_url(); ?>/packagedetail/<?= $result['id_package']; ?>"
                                            class="btn btn-dark" data-lightbox="ajax"><i
                                                class="icon-line-expand"></i></a>
                                    </div>
                                    <div class="bg-overlay-bg bg-transparent"></div>
                                </div>
                                <?php if ($result['disc_package'] != 0) {?>
                                <div class="badge bg-success p-2">Disc <?= $result['disc_package'] ?>%</div>
                                <?php } ?>
                            </div>
                            <div class="product-desc center">
                                <div class="product-title">
                                    <h3>
                                        <a href="<?= base_url(); ?>/singledetail/<?= $result['id_package']; ?>">
                                            <?= $result['title_package']; ?></a>
                                    </h3>
                                </div>
                                <?php if ($result['disc_package'] != 0) {?>
                                <div class="product-price">
                                    <del>Rp<?= number_format($result['price_init_package'], 0, ",", "."); ?></del>
                                    <ins>Rp<?= number_format($result['price_last_package'], 0, ",", "."); ?></ins>
                                </div>
                                <?php } else { ?>
                                <div class="product-price">
                                    <ins>Rp<?= number_format($result['price_last_package'], 0, ",", "."); ?></ins>
                                </div>
                                <?php } ?>
                                <div class="product-rating">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-half-full"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

            </div>

        </div>
    </div>
</section><!-- #content end -->

<?= $this->EndSection('content') ?>


<?= $this->section('script'); ?>
<script>
function search() {
    var text = $('#widget-subscribe-form-email').val();
    if (text != "") {
        window.location.replace("<?= base_url(); ?>/katalogsearch/" + text);
    }
}
</script>
<?= $this->EndSection('script'); ?>