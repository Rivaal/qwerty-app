<?php $session = \Config\Services::session();
$level = $session->get('level'); ?>
<?= $this->extend('user/layout_user') ?>

<?= $this->section('content') ?>
<!-- Page Title
		============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Menunggu Verifikasi</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Verifikasi</li>
        </ol>
    </div>
</section><!-- #page-title end -->

<!-- Content
		============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">

            <div class="row col-mb-50">
                <ul class="process-steps process-3 row col-mb-30 justify-content-center mb-4">
                    <li class="col-sm-6 col-lg-3">
                        <a class="i-rounded i-alt mx-auto bg-color">1</a>
                        <h5>Booking</h5>
                    </li>
                    <li class="col-sm-6 col-lg-3">
                        <a class="i-rounded i-alt mx-auto bg-color">2</a>
                        <h5>Bayar Pesanan</h5>
                    </li>
                    <li class="col-sm-6 col-lg-3">
                        <a class="i-rounded i-alt mx-auto bg-color">3</a>
                        <h5>Konfirmasi Pembayaran</h5>
                    </li>
                    <li class="col-sm-6 col-lg-3">
                        <a class="i-rounded i-alt mx-auto bg-color">3</a>
                        <h5>Verifikasi</h5>
                    </li>
                </ul>
                <div class="col-md-7">
                    <div class="fancy-title title-bottom-border">
                        <h3>Pembayaran Sedang Diverifikasi</h3>
                    </div>
                    <p>Mohon tunggu sebentar, pembayaran Anda sedang dalam proses verifikasi oleh tim admin QWERTY
                        Studio. Kami akan memberitahukan Anda segera setelah proses verifikasi selesai.
                    </p>

                    <?php if (isset($pelunasan)) { ?>
                    <div class="fancy-title title-bottom-border">
                        <h3>Bukti Pembayaran Awal & Pelunasan</h3>
                    </div>
                    <p>Dibawah dilampirkan bukti pembayaran awal serta pelunasan yang anda kirimkan.</p>
                    <div class="masonry-thumbs grid-container grid-2 clearfix">
                        <a class="grid-item" href="<?= base_url(); ?>/assets/userimg/bukti/<?= $bukti['bukti_url'] ?>"
                            data-lightbox="image">
                            <div class="grid-inner">
                                <img src="<?= base_url(); ?>/assets/userimg/bukti/<?= $bukti['bukti_url'] ?>"
                                    alt="Single Image">
                                <div class="bg-overlay">
                                    <div class="bg-overlay-content dark">
                                        <i class="icon-line-plus h4 mb-0" data-hover-animate="fadeIn"></i>
                                    </div>
                                    <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                                </div>
                            </div>
                        </a>
                        <a class="grid-item"
                            href="<?= base_url(); ?>/assets/userimg/pelunasan/<?= $pelunasan['pelunasan_url'] ?>"
                            data-lightbox="image">
                            <div class="grid-inner">
                                <img src="<?= base_url(); ?>/assets/userimg/pelunasan/<?= $pelunasan['pelunasan_url'] ?>"
                                    alt="Single Image">
                                <div class="bg-overlay">
                                    <div class="bg-overlay-content dark">
                                        <i class="icon-line-plus h4 mb-0" data-hover-animate="fadeIn"></i>
                                    </div>
                                    <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php } else {?>

                    <div class="fancy-title title-bottom-border">
                        <h3>Bukti Pembayaran</h3>
                    </div>

                    <p>Dibawah dilampirkan bukti pembayaran yang anda kirimkan.</p>

                    <div class="masonry-thumbs grid-container grid-1" data-big="3" data-lightbox="gallery">
                        <a class="grid-item" href="<?= base_url(); ?>/assets/userimg/bukti/BK-001.png"
                            data-lightbox="gallery-item"><img
                                src="<?= base_url(); ?>/assets/userimg/bukti/<?= $bukti['bukti_url'] ?>"
                                alt="Bukti Pembayaran"></a>
                    </div>
                    <?php } ?>
                </div>

                <div class="col-md-5">
                    <h4>Katalog Pesanan</h4>

                    <div class="table-responsive">
                        <table class="table cart">
                            <thead>
                                <tr>
                                    <th class="cart-product-thumbnail">&nbsp;</th>
                                    <th class="cart-product-name">Katalog</th>
                                    <th class="cart-product-quantity">Tipe</th>
                                    <th class="cart-product-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="cart_item">
                                    <td class="cart-product-thumbnail">
                                        <a href="<?= base_url(); ?>/singledetail/<?= $booking['id_package'] ?>"><img
                                                width="64" height="64"
                                                src="<?= base_url(); ?>/assets/userimg/package/<?= $booking['image_package'] ?>"
                                                alt="Pink Printed Dress"></a>
                                    </td>

                                    <td class="cart-product-name">
                                        <a
                                            href="<?= base_url(); ?>/singledetail/<?= $booking['id_package'] ?>"><?= $booking['title_package'] ?></a>
                                    </td>

                                    <td class="cart-product-quantity">
                                        <div class="quantity clearfix">
                                            <?= $booking['type_package'] ?>
                                        </div>
                                    </td>

                                    <td class="cart-product-subtotal">
                                        <span class="amount">
                                            Rp<?= number_format($booking['total_akhir'], 0, ",", "."); ?></span>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                    <br><br>
                    <?php if (isset($pelunasan)) { ?>
                    <div class="tabs tabs-bordered tabs-tb clearfix" id="tab-2">

                        <ul class="tab-nav clearfix">
                            <li><a href="#tabs-6">Pembayaran Awal</a></li>
                            <li><a href="#tabs-7">Pelunasan</a></li>
                        </ul>

                        <div class="tab-container">

                            <div class="tab-content clearfix" id="tabs-6">
                                <div class="table-responsive">
                                    <table class="table cart">
                                        <tbody>
                                            <tr class="cart_item">
                                                <td class="border-top-0 cart-product-name">
                                                    <strong>Invoice</strong>
                                                </td>

                                                <td class="border-top-0 cart-product-name">
                                                    <span
                                                        class="amount"><strong><?= $booking['invoice']; ?></strong></span>
                                                </td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td class="border-top-0 cart-product-name">
                                                    <strong>Detail Pembayaran</strong>
                                                </td>

                                                <td class="border-top-0 cart-product-name">
                                                    <span class="amount"><?= $bukti['total_bayar'] ?></span>
                                                </td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td class="cart-product-name">
                                                    <strong>Nominal</strong>
                                                </td>

                                                <td class="cart-product-name">
                                                    <span
                                                        class="amount color lead">Rp<?= number_format($bukti['nominal_bayar'], 0, ",", "."); ?></span>
                                                </td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td class="cart-product-name">
                                                    <strong>Jenis Pembayaran</strong>
                                                </td>

                                                <td class="cart-product-name">
                                                    <span
                                                        class="amount"><strong><?= $bukti['metode_bayar'] ?></strong></span>
                                                </td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td class="cart-product-name">
                                                    <strong>No Rek / Telp Pengirim</strong>
                                                </td>

                                                <td class="cart-product-name">
                                                    <span class="amount color"><?= $bukti['no_rek']?></span>
                                                </td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td class="cart-product-name">
                                                    <strong>Nama Pengirim</strong>
                                                </td>

                                                <td class="cart-product-name">
                                                    <span class="amount color"><?= $bukti['atas_nama']?></span>
                                                </td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td class="cart-product-name">
                                                    <strong>Tanggal Pembayaran</strong>
                                                </td>

                                                <td class="cart-product-name">
                                                    <span class="amount color"><?= $bukti['create_bukti']?></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="<?= base_url(); ?>/konfirmpembayaran/<?= $booking['id_booking'] ?>"
                                        class="button center w-100 button-border m-0 button-red" );"><i
                                            class="icon-line-arrow-left"></i>Ubah
                                        Bukti Pembayaran
                                    </a>
                                </div>
                            </div>
                            <div class="tab-content clearfix" id="tabs-7">
                                <div class="table-responsive">
                                    <table class="table cart">
                                        <tbody>
                                            <tr class="cart_item">
                                                <td class="border-top-0 cart-product-name">
                                                    <strong>Invoice</strong>
                                                </td>

                                                <td class="border-top-0 cart-product-name">
                                                    <span
                                                        class="amount"><strong><?= $booking['invoice']; ?></strong></span>
                                                </td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td class="border-top-0 cart-product-name">
                                                    <strong>Detail Pembayaran</strong>
                                                </td>

                                                <td class="border-top-0 cart-product-name">
                                                    <span class="amount"><?= $pelunasan['total_bayar'] ?></span>
                                                </td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td class="cart-product-name">
                                                    <strong>Nominal</strong>
                                                </td>

                                                <td class="cart-product-name">
                                                    <span
                                                        class="amount color lead">Rp<?= number_format($pelunasan['nominal_bayar'], 0, ",", "."); ?></span>
                                                </td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td class="cart-product-name">
                                                    <strong>Jenis Pembayaran</strong>
                                                </td>

                                                <td class="cart-product-name">
                                                    <span
                                                        class="amount"><strong><?= $pelunasan['metode_bayar'] ?></strong></span>
                                                </td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td class="cart-product-name">
                                                    <strong>No Rek / Telp Pengirim</strong>
                                                </td>

                                                <td class="cart-product-name">
                                                    <span class="amount color"><?= $pelunasan['no_rek']?></span>
                                                </td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td class="cart-product-name">
                                                    <strong>Nama Pengirim</strong>
                                                </td>

                                                <td class="cart-product-name">
                                                    <span class="amount color"><?= $pelunasan['atas_nama']?></span>
                                                </td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td class="cart-product-name">
                                                    <strong>Tanggal Pembayaran</strong>
                                                </td>

                                                <td class="cart-product-name">
                                                    <span
                                                        class="amount color"><?= $pelunasan['create_pelunasan']?></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="<?= base_url(); ?>/konfirmpelunasan/<?= $booking['id_booking'] ?>"
                                        class="button center w-100 button-border m-0 button-red" );"><i
                                            class="icon-line-arrow-left"></i>Ubah
                                        Bukti Pelunasan
                                    </a>
                                </div>
                            </div>

                        </div>

                    </div>
                    <?php } else {?>
                    <h4>Detail Pembayaran</h4>

                    <div class="table-responsive">
                        <table class="table cart">
                            <tbody>
                                <tr class="cart_item">
                                    <td class="border-top-0 cart-product-name">
                                        <strong>Invoice</strong>
                                    </td>

                                    <td class="border-top-0 cart-product-name">
                                        <span class="amount"><strong><?= $booking['invoice']; ?></strong></span>
                                    </td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="border-top-0 cart-product-name">
                                        <strong>Detail Pembayaran</strong>
                                    </td>

                                    <td class="border-top-0 cart-product-name">
                                        <span class="amount"><?= $bukti['total_bayar'] ?></span>
                                    </td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="cart-product-name">
                                        <strong>Nominal</strong>
                                    </td>

                                    <td class="cart-product-name">
                                        <span
                                            class="amount color lead">Rp<?= number_format($bukti['nominal_bayar'], 0, ",", "."); ?></span>
                                    </td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="cart-product-name">
                                        <strong>Jenis Pembayaran</strong>
                                    </td>

                                    <td class="cart-product-name">
                                        <span class="amount"><strong><?= $bukti['metode_bayar'] ?></strong></span>
                                    </td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="cart-product-name">
                                        <strong>No Rek / Telp Pengirim</strong>
                                    </td>

                                    <td class="cart-product-name">
                                        <span class="amount color"><?= $bukti['no_rek']?></span>
                                    </td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="cart-product-name">
                                        <strong>Nama Pengirim</strong>
                                    </td>

                                    <td class="cart-product-name">
                                        <span class="amount color"><?= $bukti['atas_nama']?></span>
                                    </td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="cart-product-name">
                                        <strong>Tanggal Pembayaran</strong>
                                    </td>

                                    <td class="cart-product-name">
                                        <span class="amount color"><?= $bukti['create_bukti']?></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php if ($bukti['total_bayar'] == "dp") { ?>
                    <div class="row col-mb-12 form-group">
                        <div class="col-md-6">
                            <a href="<?= base_url(); ?>/konfirmpembayaran/<?= $booking['id_booking'] ?>"
                                class="button center w-100 m-0 button-red button-border" );"><i
                                    class="icon-line-arrow-left"></i>Ubah
                                Bukti
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="<?= base_url(); ?>/konfirmpelunasan/<?= $booking['id_booking'] ?>"
                                class="button center w-100 m-0 button-blue" );">Bayar Sisa<i
                                    class="icon-line-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <?php } else { ?>
                    <a href="<?= base_url(); ?>/konfirmpembayaran/<?= $booking['id_booking'] ?>"
                        class="button center button-large w-100 m-0 button-red button-border" );"><i
                            class="icon-line-arrow-left"></i>Ubah Bukti Pembayaran
                    </a>
                    <?php }?>
                    <?php }?>

                </div>
            </div>

        </div>
    </div>
</section><!-- #content end -->

<?= $this->EndSection('content') ?>

<?= $this->Section('script') ?>
<?= $this->EndSection('script') ?>