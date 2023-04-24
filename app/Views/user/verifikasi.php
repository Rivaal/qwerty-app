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


                    <div class="fancy-title title-bottom-border">
                        <h3>Bukti Pembayaran</h3>
                    </div>

                    <p>Dibawah dilampirkan bukti pembayaran yang anda kirimkan.</p>

                    <div class="masonry-thumbs grid-container grid-1" data-big="3" data-lightbox="gallery">
                        <a class="grid-item" href="../assets/userimg/bukti/BK-001.png" data-lightbox="gallery-item"><img
                                src="../assets/userimg/bukti/<?= $bukti['bukti_url'] ?>" alt="Bukti Pembayaran"></a>
                    </div>
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
                                        <a href="../singledetail/<?= $booking['id_package'] ?>"><img width="64"
                                                height="64"
                                                src="../assets/userimg/package/<?= $booking['image_package'] ?>"
                                                alt="Pink Printed Dress"></a>
                                    </td>

                                    <td class="cart-product-name">
                                        <a
                                            href="../singledetail/<?= $booking['id_package'] ?>"><?= $booking['title_package'] ?></a>
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
                        <br>
                    </div>
                    <h4>Bukti pembayaran salah?</h4>
                    <div class="col-12 form-group">
                        <a href="../konfirmpembayaran/<?= $booking['id_booking'] ?>"
                            class="button center button-large w-100 m-0 button-red" );"><i
                                class="icon-line-arrow-left"></i>Ubah Bukti Pembayaran
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section><!-- #content end -->

<?= $this->EndSection('content') ?>

<?= $this->Section('script') ?>
<?= $this->EndSection('script') ?>