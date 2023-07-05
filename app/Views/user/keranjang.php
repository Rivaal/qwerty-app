<?php $session = \Config\Services::session();
$level = $session->get('level'); ?>
<?= $this->extend('user/layout_user') ?>

<?= $this->section('content') ?>
<!-- Page Title
		============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Keranjang Saya</h1>
        <span></span>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
        </ol>
    </div>
</section><!-- #page-title end -->

<!-- Content
		============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container">

            <table class="table cart mb-5">
                <thead>
                    <tr>
                        <th class="cart-product-remove">&nbsp;</th>
                        <th class="cart-product-thumbnail">&nbsp;</th>
                        <th class="cart-product-name">Katalog</th>
                        <th class="cart-product-name">Tipe</th>
                        <th class="cart-product-name">Harga</th>
                        <th class="cart-product-price">Diskon</th>
                        <th class="cart-product-price">Total</th>
                        <th class="cart-product-subtotal">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $totalx = 0;
foreach ($chart as $result) : $totalx = $totalx + $result['price_last_package']; ?>
                    <tr class="cart_item">
                        <td class="cart-product-remove">
                            <a href="<?= base_url(); ?>/hapuskeranjang/<?= $result['id_package']; ?>" class="remove"
                                title="Remove this item"><i class="icon-trash2"></i></a>
                        </td>

                        <td class="cart-product-thumbnail">
                            <a href="<?= base_url(); ?>/singledetail/<?= $result['id_package']; ?>"><img width="64"
                                    height="64" src="assets/userimg/package/<?= $result['image_package']; ?>"
                                    alt="Pink Printed Dress"></a>
                        </td>

                        <td class="cart-product-name">
                            <a
                                href="<?= base_url(); ?>/singledetail/<?= $result['id_package']; ?>"><?= $result['title_package']; ?></a>
                        </td>

                        <td class="cart-product-price">
                            <span class="amount"><?php if ($result['type_package'] == "IND") {
                                echo "Paket Indoor";
                            } else {
                                echo "Paket Outdoor";
                            } ?></span>
                        </td>

                        <td class="cart-product-price">
                            <span
                                class="amount">Rp<?= number_format($result['price_init_package'], 0, ",", "."); ?></span>
                        </td>

                        <td class="cart-product-price">
                            <span class="amount"><?= $result['disc_package']; ?>%</span>
                        </td>

                        <td class="cart-product-name">
                            <span
                                class="amount">Rp<?= number_format($result['price_last_package'], 0, ",", "."); ?></span>
                        </td>
                        <td class="cart-product-quantity">
                            <a href="<?= base_url(); ?>/booking/<?= $result['id_package']; ?>"
                                class="button w-100 button-blue">BUAT
                                PESANAN</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <tr class="cart_item">
                        <td colspan="8">
                            <div class="row justify-content-between py-2 col-mb-30">
                                <div class="col-lg-auto ps-lg-0">
                                    <div class="row">
                                    </div>
                                </div>
                                <div class="col-lg-auto pe-lg-0">
                                    <a href="shop.html" class="button mt-2 mt-sm-0 me-0 disabled">TOTAL RP
                                        <?= number_format($totalx, 0, ",", "."); ?></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>

            </table>
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