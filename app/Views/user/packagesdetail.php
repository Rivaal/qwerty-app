<div class="single-product shop-quick-view-ajax">

    <div class="ajax-modal-title">
        <h2><?= $title_package ?></h2>
    </div>

    <div class="product modal-padding">

        <div class="row gutter-40 col-mb-50">
            <div class="col-md-6">
                <div class="product-image">
                    <div class="fslider" data-pagi="false">
                        <div class="flexslider">
                            <div class="slider-wrap"><a href="../assets/userimg/package/<?= $image_package ?>"
                                    title="<?= $title_package ?>">
                                    <img src="../assets/userimg/package/<?= $image_package ?>"
                                        alt="<?= $title_package ?>"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 product-desc">
                <?php if ($disc_package != 0) {?>
                <div class="product-price">
                    <del>Rp <?= number_format($price_init_package, 0, ",", "."); ?></del>
                    <ins>Rp <?= number_format($price_last_package, 0, ",", "."); ?>
                        (<?= $disc_package; ?>%)</ins>
                </div>
                <?php } else { ?>
                <div class="product-price"><ins>Rp
                        <?= number_format($price_last_package, 0, ",", "."); ?></ins></div>
                <?php } ?>
                <div class="clear"></div>
                <div class="line"></div>

                <!-- Product Single - Quantity & Cart Button
                ============================================= -->
                <form class="cart mb-0 d-flex justify-content-between" method="post" enctype='multipart/form-data'>
                    <div class=" quantity clearfix">
                        <button type="button" class="add-to-cart button m-0 button-red">Pesan</button>
                    </div>
                    <button type="submit" class="add-to-cart button m-0">+ keranjang</button>
                </form><!-- Product Single - Quantity & Cart Button End -->

                <div class="clear"></div>
                <div class="line"></div>
                <p class="mt-3 d-none d-lg-block">
                    <?= $desc_package; ?><br><?= $note_package; ?></p>
            </div>
        </div>

    </div>

</div>