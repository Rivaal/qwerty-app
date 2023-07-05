<?php $session = \Config\Services::session();
$level = $session->get('level'); ?>
<?= $this->extend('user/layout_user') ?>

<?= $this->section('content') ?>
<!-- Page Title
		============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Pelunasan Pembayaran</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pelunasan Pembayaran</li>
        </ol>
    </div>
</section><!-- #page-title end -->

<!-- Content
		============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">

            <div class="row col-mb-50">
                <div class="col-md-6">
                    <h3>Konfirmasi Pelunasan</h3>

                    <p>Anda dapat melakukan pelunasan pembayaran dengan mengisi formulir di bawah ini atau melakukan
                        pembayaran pada saat jadwal sesi pemotretan.</p>

                    <form id="formKonfirm" enctype="multipart/form-data" class="row mb-0" action="#" method="post">

                        <div class="col-md-12 form-group">
                            <label for="invoice">Invoice:</label>
                            <input type="text" id="invoice" name="invoice" class="sm-form-control" readonly />
                        </div>

                        <div class="col-12 form-group">
                            <label for="total-bayar">Jenis Pembayaran:</label>
                            <input id="total-bayar" name="total-bayar" class="sm-form-control form-select"
                                id="exampleFormControlSelect1" readonly value="PELUNASAN">
                            </input>
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="nominal-bayar">Nominal Pelunasan:</label>
                            <input type="number" id="nominal-bayar" name="nominal-bayar" value=""
                                class="sm-form-control" readonly />
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="metode-pembayaran">Metode Pelunasan:</label>
                            <select id="metode-pembayaran" name="metode-pembayaran" class="sm-form-control form-select"
                                id="exampleFormControlSelect1" required>
                                <option value="GoPay" selected>GOPAY</option>
                                <option value="Dana">DANA</option>
                                <option value="Bank BNI">BNI</option>
                                <option value="Bank BRI">BRI</option>
                            </select>
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="no-rek">No Rek / No Telp Pengirim:</label>
                            <input type="text" id="no-rek" name="no-rek" value="" class="sm-form-control" />
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="atas-nama">Atas Nama:</label>
                            <input type="text" id="atas-nama" name="atas-nama" value="" class="sm-form-control" />
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="bukti-transaksi">Bukti Pelunasan:</label>
                            <input type="file" class="sm-form-control" id="bukti-transaksi" name="bukti-transaksi">
                        </div>
                    </form>
                </div>

                <div class="col-md-6">
                    <h4>Katalog Dipilih</h4>

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
                    <h4>Detail Paket</h4>

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
                                        <strong>Harga Katalog</strong>
                                    </td>

                                    <td class="border-top-0 cart-product-name">
                                        <span
                                            class="amount">Rp<?= number_format($booking['harga_katalog'], 0, ",", "."); ?></span>
                                    </td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="cart-product-name">
                                        <strong>Diskon</strong>
                                    </td>

                                    <td class="cart-product-name">
                                        <span class="amount"><?= $booking['diskon'] ?>%</span>
                                    </td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="cart-product-name">
                                        <strong>Total</strong>
                                    </td>

                                    <td class="cart-product-name">
                                        <span
                                            class="amount color lead"><strong>Rp<?= number_format($booking['total_akhir'], 0, ",", "."); ?></strong></span>
                                    </td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="cart-product-name">
                                        <strong>Lokasi</strong>
                                    </td>

                                    <td class="cart-product-name">
                                        <span class="amount color"><?= $booking['lokasi']?></span>
                                    </td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="cart-product-name">
                                        <strong>Tanggal</strong>
                                    </td>

                                    <td class="cart-product-name">
                                        <span class="amount color"><?= $booking['tanggal_sesi']?></span>
                                    </td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="cart-product-name">
                                        <strong>Note</strong>
                                    </td>

                                    <td class="cart-product-name">
                                        <span class="amount color"><?= $booking['catatan']?></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                    </div>
                    <div class="row col-mb-12 form-group">
                        <div class="col-md-6"><button id="bayar-pesanan"
                                class="button button-large w-100 m-0 button-dirtygreen button-border"
                                onclick="bayar('<?= $booking['id_booking']; ?>');"><i class="icon-line-arrow-left"></i>
                                Cara Pelunasan</button>
                        </div>
                        <div class="col-md-6"><button id="kirim-bukti" class="button button-large w-100 m-0 button-blue"
                                onclick="confirm('<?= $booking['id_booking']; ?>');" disabled>Kirim Bukti
                                <i class="icon-line-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section><!-- #content end -->

<?= $this->EndSection('content') ?>

<?= $this->Section('css') ?>
<!-- Bootstrap File Upload CSS -->
<link rel="stylesheet" href="<?= base_url(); ?>css/components/bs-filestyle.css" type="text/css" />

<?= $this->EndSection('css'); ?>

<?= $this->Section('script') ?>
<!-- For Countdown -->
<script src="<?= base_url(); ?>js/components/moment.js"></script>

<!-- Bootstrap File Upload Plugin -->
<script src="<?= base_url(); ?>js/components/bs-filestyle.js"></script>

<script>
$(function() {
    $('#invoice').val('<?= $booking['invoice']; ?>');
    $('#nominal-bayar').val('<?= $lunas-$dp ?>');
});

$('#total-bayar').on('change', function() {
    checkEnable();
});

$('#nominal-bayar').on('change', function() {
    checkEnable();
});

$('#metode-pembayaran').on('change', function() {
    checkEnable();
});

$('#no-rek').on('change', function() {
    checkEnable();
});

$('#atas-nama').on('change', function() {
    checkEnable();
});

$('#bukti-transaksi').on('change', function() {
    checkEnable();
});

function checkEnable() {
    var total_bayar = $('#total-bayar').val();
    if (total_bayar == "lunas") {
        $('#nominal-bayar').val('<?= $lunas ?>');
    } else if (total_bayar == "dp") {
        $('#nominal-bayar').val('<?= $dp ?>');
    }
    var nominal_bayar = $('#nominal-bayar').val();
    var no_rek = $('#no-rek').val();
    var atas_nama = $('#atas-nama').val();
    var bukti_transaksi = $('#bukti-transaksi').val();
    if (nominal_bayar != "" && no_rek != "" && atas_nama != "" && bukti_transaksi != "") {
        $('#kirim-bukti').prop('disabled', false);
    } else {
        $('#kirim-bukti').prop('disabled', true);
    }
}

function bayar(idbooking) {
    $.ajax({
        type: "get",
        url: "<?= base_url(); ?>/bayarpelunasan/" + idbooking,
        data: "",
        dataType: "json",
        beforeSend: function(xhr) {
            $('#bayar-pesanan').prop('disabled', true);
            $('#bayar-pesanan').text('Loading...')
        },
        success: function(response) {
            window.location.replace("<?= base_url(); ?>/infopelunasan/" + response.success);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" +
                thrownError);
        }
    });
}

function confirm() {
    var formData = new FormData($('#formKonfirm')[0]);
    $.ajax({
        url: '<?= base_url(); ?>/acceptpelunasan/<?= $booking['id_booking'] ?>',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function(xhr) {
            $('#kirim-bukti').prop('disabled', true);
            $('#kirim-bukti').text('Loading...')
        },
        success: function(data) {
            window.location.replace("<?= base_url(); ?>/verifikasi/<?= $booking['id_booking']?>");
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" +
                thrownError);
        }
    });
}
</script>
<?= $this->EndSection('script') ?>