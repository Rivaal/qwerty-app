<?php $session = \Config\Services::session();
$level = $session->get('level'); ?>
<?= $this->extend('user/layout_user') ?>

<?= $this->section('content') ?>
<!-- Page Title
		============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Booking</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Booking</li>
        </ol>
    </div>

</section><!-- #page-title end -->

<!-- Content
		============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="row col-mb-50 gutter-50">
                <ul class="process-steps process-3 row col-mb-30 justify-content-center mb-4">
                    <li class="col-sm-6 col-lg-3">
                        <a class="i-rounded i-alt mx-auto bg-color">1</a>
                        <h5>Booking</h5>
                    </li>
                    <li class="col-sm-6 col-lg-3">
                        <a class="i-bordered i-rounded mx-auto">2</a>
                        <h5>Bayar Pesanan</h5>
                    </li>
                    <li class="col-sm-6 col-lg-3">
                        <a class="i-bordered i-rounded mx-auto">3</a>
                        <h5>Konfirmasi Pembayaran</h5>
                    </li>
                    <li class="col-sm-6 col-lg-3">
                        <a class="i-bordered i-rounded mx-auto">3</a>
                        <h5>Verifikasi</h5>
                    </li>
                </ul>
                <div class="col-lg-6">
                    <h3>Data Pesanan</h3>

                    <p>Silahkan isi form data yang disediakan dibawah.</p>

                    <form id="billing-form" name="billing-form" class="row mb-0" action="#" method="post">

                        <div class="col-md-6 form-group">
                            <label for="detail-client-name">Client:</label>
                            <input type="text" id="detail-client-name" name="detail-client-name" value=""
                                class="sm-form-control" readonly />
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="detail-client-whatsapp">Whatsapp:</label>
                            <input type="text" id="detail-client-whatsapp" name="detail-client-whatsapp" value=""
                                class="sm-form-control" readonly />
                        </div>

                        <div class="w-100"></div>

                        <div class="col-12 form-group">
                            <label for="detail-tanggal-sesi">Tanggal Sesi:</label>
                            <input id="detail-tanggal-sesi" name="detail-tanggal-sesi" type="text" value=""
                                class="sm-form-control component-datepicker default" placeholder="MM/DD/YYYY" required>
                            <small id="sesiHelp" class="form-text text-muted">Pemesanan paket minimal sehari sebelum
                                proses foto.</small>
                        </div>

                        <div class="col-12 form-group">
                            <label for="detail-jam-sesi">Jam Sesi:</label>
                            <select id="detail-jam-sesi" name="detail-jam-sesi" class="sm-form-control form-select"
                                id="exampleFormControlSelect1" required>
                                <option value="6">06:00</option>
                                <option value="7">07:00</option>
                                <option value="8" selected>08:00</option>
                                <option value="9">09:00</option>
                                <option value="10">10:00</option>
                                <option value="11">11:00</option>
                                <option value="12">12:00</option>
                                <option value="13">13:00</option>
                                <option value="14">14:00</option>
                                <option value="15">15:00</option>
                                <option value="16">16:00</option>
                                <option value="17">17:00</option>
                                <option value="18">18:00</option>
                                <option value="19">19:00</option>
                                <option value="20">20:00</option>
                                <option value="21">21:00</option>
                            </select>
                        </div>

                        <div class="col-12 form-group">
                            <label for="detail-catatan">Catatan <small>*</small></label>
                            <textarea class="sm-form-control" id="detail-catatan" name="detail-catatan" rows="6"
                                cols="30"></textarea>
                        </div>

                        <div class="col-12">
                            <div>
                                <input id="detail-checkbox" class="checkbox-style" name="detail-checkbox"
                                    type="checkbox">
                                <label for="detail-checkbox" class="checkbox-style-2-label checkbox-small">Saya mengisi
                                    data
                                    diatas dengan benar.</label>
                            </div>
                        </div>


                    </form>
                </div>

                <div class="col-lg-6">
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
                                        <a href="../singledetail/<?= $package['id_package'] ?>"><img width="64"
                                                height="64"
                                                src="../assets/userimg/package/<?= $package['image_package'] ?>"
                                                alt="Pink Printed Dress"></a>
                                    </td>

                                    <td class="cart-product-name">
                                        <a
                                            href="../singledetail/<?= $package['id_package'] ?>"><?= $package['title_package'] ?></a>
                                    </td>

                                    <td class="cart-product-quantity">
                                        <div class="quantity clearfix">
                                            <?= $package['type_package'] ?>
                                        </div>
                                    </td>

                                    <td class="cart-product-subtotal">
                                        <span class="amount">
                                            Rp<?= number_format($package['price_last_package'], 0, ",", "."); ?></span>
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
                                        <strong>Harga Katalog</strong>
                                    </td>

                                    <td class="border-top-0 cart-product-name">
                                        <span
                                            class="amount">Rp<?= number_format($package['price_init_package'], 0, ",", "."); ?></span>
                                    </td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="cart-product-name">
                                        <strong>Diskon</strong>
                                    </td>

                                    <td class="cart-product-name">
                                        <span class="amount"><?= $package['disc_package'] ?>%</span>
                                    </td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="cart-product-name">
                                        <strong>Total</strong>
                                    </td>

                                    <td class="cart-product-name">
                                        <span
                                            class="amount color lead"><strong>Rp<?= number_format($package['price_last_package'], 0, ",", "."); ?></strong></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <br><br>
                    <h4>Pilihan Pembayaran</h4>
                    <div class="accordion clearfix">
                        <div class="accordion-header">
                            <div class="accordion-icon">
                                <i class="accordion-closed icon-line-minus"></i>
                                <i class="accordion-open icon-line-check"></i>
                            </div>
                            <div class="accordion-title">
                                Direct Transfer Bank BNI
                            </div>
                        </div>
                        <div class="accordion-content clearfix">Lakukan pembayaran menggunakan atm BNI terdekat atau
                            gunakan mobile banking Anda.</div>

                        <div class="accordion-header">
                            <div class="accordion-icon">
                                <i class="accordion-closed icon-line-minus"></i>
                                <i class="accordion-open icon-line-check"></i>
                            </div>
                            <div class="accordion-title">
                                Direct Transfer Bank BRI
                            </div>
                        </div>
                        <div class="accordion-content clearfix">Lakukan pembayaran menggunakan atm BRI terdekat atau
                            gunakan mobile banking Anda.</div>
                        <div class="accordion-header">
                            <div class="accordion-icon">
                                <i class="accordion-closed icon-line-minus"></i>
                                <i class="accordion-open icon-line-check"></i>
                            </div>
                            <div class="accordion-title">
                                Gopay
                            </div>
                        </div>
                        <div class="accordion-content clearfix">Bayar menggunakan saldo Gopay Anda.</div>
                        <div class="accordion-header">
                            <div class="accordion-icon">
                                <i class="accordion-closed icon-line-minus"></i>
                                <i class="accordion-open icon-line-check"></i>
                            </div>
                            <div class="accordion-title">
                                Dana
                            </div>
                        </div>
                        <div class="accordion-content clearfix">Bayar menggunakan saldo Dana Anda.</div>

                    </div>
                    <button id="button-proses" type="button" class="button button-large w-100" disabled>Buat Pesanan <i
                            class="icon-line-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</section><!-- #content end -->
<?= $this->EndSection('content') ?>

<?= $this->Section('css') ?>
<!-- Date & Time Picker CSS -->
<link rel="stylesheet" href="<?= base_url(); ?>/css/components/datepicker.css" type="text/css" />
<link rel="stylesheet" href="<?= base_url(); ?>/css/components/timepicker.css" type="text/css" />
<link rel="stylesheet" href="<?= base_url(); ?>/css/components/daterangepicker.css" type="text/css" />

<!-- Radio Checkbox Plugin -->
<link rel="stylesheet" href="<?= base_url(); ?>/css/components/radio-checkbox.css" type="text/css" />
<?= $this->EndSection('css') ?>

<?= $this->Section('script') ?>
<!-- Date & Time Picker JS -->
<script src="<?= base_url(); ?>/js/components/moment.js"></script>
<script src="<?= base_url(); ?>/js/components/timepicker.js"></script>
<script src="<?= base_url(); ?>/js/components/datepicker.js"></script>

<!-- Include Date Range Picker -->
<script src="<?= base_url(); ?>/js/components/daterangepicker.js"></script>

<script>
$(function() {
    $('#detail-client-name').val('<?= $client['nama_client']; ?>');
    $('#detail-client-whatsapp').val('<?= $client['telp_client']; ?>');
    $('.component-datepicker.default').datepicker({
        autoclose: true,
        startDate: "tomorrow",
    });

});

$('#detail-tanggal-sesi').on("change", function() {
    checkEnable();
});

$('#detail-checkbox').click(function() {
    checkEnable();
});

function checkEnable() {
    var tanggal_sesi = $('#detail-tanggal-sesi').val();
    if (tanggal_sesi != "") {
        if ($('#detail-checkbox').prop('checked')) {
            $('#button-proses').prop('disabled', false);
        } else {
            $('#button-proses').prop('disabled', true);
        }
    } else {
        $('#button-proses').prop('disabled', true);
    }
}
$('#button-proses').click(function(e) {
    e.preventDefault();
    var tgl, jam, ctt, cart;
    tgl = $('#detail-tanggal-sesi').val();
    jam = $('#detail-jam-sesi').val();
    ctt = $('#detail-catatan').val();
    cart = "<?= $package['id_package'] ?>";
    if (tgl == "" || jam == "") {
        alert('Masih ada beberapa form yang kosong!');
    } else {
        $.ajax({
            type: "POST",
            url: "../prosesbooking/IND",
            data: {
                id_cart: cart,
                tanggal_sesi: tgl,
                jam_sesi: jam,
                catatan: ctt
            },
            dataType: "json",
            beforeSend: function(xhr) {
                $('#button-proses').prop('disabled', true);
                $('#button-proses').text('Membuat...')
            },
            success: function(response) {
                window.location.replace("../infopembayaran/" + response.success);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" +
                    thrownError);
            }
        });
    }

});
</script>
<?= $this->EndSection('script') ?>