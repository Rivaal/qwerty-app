<?php $session = \Config\Services::session();
$level = $session->get('level'); ?>
<?= $this->extend('user/layout_user') ?>

<?= $this->section('content') ?>
<!-- Page Title
		============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Pembayaran</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pembayaran</li>
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
                        <a class="i-bordered i-rounded mx-auto">3</a>
                        <h5>Konfirmasi Pembayaran</h5>
                    </li>
                    <li class="col-sm-6 col-lg-3">
                        <a class="i-bordered i-rounded mx-auto">3</a>
                        <h5>Verifikasi</h5>
                    </li>
                </ul>
                <div class="col-md-7">
                    <div class="fancy-title title-bottom-border">
                        <h3>Lakukan Pembayaran Sebelum</h3>
                    </div>
                    <div id="countdown-ex3" class="countdown countdown-large" data-year="<?= $year ?>"
                        data-month="<?= $month ?>" data-day="<?= $day ?>" data-format="dHMS">
                    </div><br>
                    <p>Apabila pembayaran yang tidak dilakukan pada rentang waktu diatas atau sebelum
                        <?= $booking['tanggal_sesi'] ?>, pesanan akan secara otomatis dibatalkan.
                    </p>


                    <div class="fancy-title title-bottom-border">
                        <h3>Cara pembayaran</h3>
                    </div>

                    <p>Anda dapat melakukan pembayaran dengan dua opsi, yaitu membayar secara penuh dengan total biaya
                        sebesar <strong>Rp<?= number_format($lunas, 0, ",", "."); ?></strong> atau melakukan pembayaran
                        DP 50% dari total biaya yaitu sebesar
                        <strong>Rp<?= number_format($dp, 0, ",", "."); ?></strong>, pelunasan dilakukan sebelum sesi
                        pemotretan dimulai.
                    </p>
                    <p>Tata cara pembayaran :</p>

                    <div class="accordion accordion-bg">
                        <div class="accordion-header">
                            <div class="accordion-icon">
                                <i class="accordion-closed icon-ok-circle"></i>
                                <i class="accordion-open icon-remove-circle"></i>
                            </div>
                            <div class="accordion-title">
                                Melalui GOPAY?
                            </div>
                        </div>
                        <div class="accordion-content">
                            <ul class="iconlist iconlist-color mb-0">
                                <li><i class="icon-minus"></i>Buka aplikasi Gojek.</li>
                                <li><i class="icon-minus"></i>Pilih menu "Bayar" pada halaman utama aplikasi</li>
                                <li><i class="icon-minus"></i>Isi nomor HP "081365010229" pada form yang tersedia</li>
                                <li><i class="icon-minus"></i>Masukkan nominal pembayaran sebesar
                                    Rp<?= number_format($lunas, 0, ",", "."); ?> (lunas) atau
                                    Rp<?= number_format($dp, 0, ",", "."); ?> (DP) dan klik konfirmasi</li>
                                <li><i class="icon-minus"></i>Pastikan nama penerima atas nama Rivaldo Saputra</li>
                                <li><i class="icon-minus"></i>Konfirmasikan pembayaran dengan memasukkan PIN GoPay</li>
                                <li><i class="icon-minus"></i>Setelah berhasil melakukan transfer GoPay, kamu akan
                                    menerima notifikasi</li>
                                <li><i class="icon-minus"></i>Screenshot bukti pembayaran kamu</li>
                                <li><i class="icon-minus"></i>Tekan tombol "Konfirmasi Pembayaran" pada halaman QWERTY
                                    Studio untuk mengkonfirmasi pembayaran dan lanjut ke tahap selanjutnya.</li>
                            </ul>
                        </div>

                        <div class="accordion-header">
                            <div class="accordion-icon">
                                <i class="accordion-closed icon-ok-circle"></i>
                                <i class="accordion-open icon-remove-circle"></i>
                            </div>
                            <div class="accordion-title">
                                Melalui DANA?
                            </div>
                        </div>
                        <div class="accordion-content">
                            <ul class="iconlist iconlist-color mb-0">
                                <li><i class="icon-minus"></i>Buka Aplikasi Dana.</li>
                                <li><i class="icon-minus"></i>Pastikan kamu sudah Log in atau Masuk ke akun Dana kamu
                                </li>
                                <li><i class="icon-minus"></i>Jika sudah, pada di halaman depan kamu akan menemukan menu
                                    KIRIM, kamu pilih menu tersebut
                                </li>
                                <li><i class="icon-minus"></i>Selanjutnya pilih Kirim ke Nomor Telepon
                                </li>
                                <li><i class="icon-minus"></i>Masukan nomor HP "081365010229" pada form yang disediakan
                                </li>
                                <li><i class="icon-minus"></i>Masukan nominal pembayaran sebesar
                                    Rp<?= number_format($lunas, 0, ",", "."); ?>(Lunas), atau
                                    nominal Rp<?= number_format($dp, 0, ",", "."); ?>(DP) lalu Klik konfirmasi
                                </li>
                                <li><i class="icon-minus"></i>Pastikan nama penerimanya atas nama Rivaldo Saputra
                                </li>
                                <li><i class="icon-minus"></i>Konfirmasi pembayaran kamu dengan memasukan PIN Dana kamu
                                </li>
                                <li><i class="icon-minus"></i>Kamu akan mendapatkan notifikasi bahwa kamu telah berhasil
                                    melakukan transfer Dana
                                </li>
                                <li><i class="icon-minus"></i>Screenshoot bukti pembayaran kamu
                                </li>
                                <li><i class="icon-minus"></i>Tekan tombol "Konfirmasi Pembayaran" dihalaman QWERTY
                                    Studio untuk
                                    menkonfirmasi pembayaran kamu lalu ikuti tahap selanjutnya</li>
                            </ul>
                        </div>

                        <div class="accordion-header">
                            <div class="accordion-icon">
                                <i class="accordion-closed icon-ok-circle"></i>
                                <i class="accordion-open icon-remove-circle"></i>
                            </div>
                            <div class="accordion-title">
                                Melalui ATM?
                            </div>
                        </div>
                        <div class="accordion-content">
                            <H4>ATM BNI</H4>
                            <ul class="iconlist iconlist-color mb-0">
                                <li><i class="icon-minus"></i>Masukan kartu ATM ke mesin</li>
                                <li><i class="icon-minus"></i>Pilih bahasa Indonesia</li>
                                <li><i class="icon-minus"></i>Masukan PIN ATM</li>
                                <li><i class="icon-minus"></i>Pilih "Menu Lainnya"</li>
                                <li><i class="icon-minus"></i>Pilih "Transfer"</li>
                                <li><i class="icon-minus"></i>Pilih "Ke Rekening BNI"</li>
                                <li><i class="icon-minus"></i>Masukan No Rek "1423509758"</li>
                                <li><i class="icon-minus"></i>Masukan nominal pembayaran sebesar
                                    Rp<?= number_format($lunas, 0, ",", "."); ?>(Lunas), atau
                                    nominal Rp<?= number_format($dp, 0, ",", "."); ?>(DP) lalu Klik konfirmasi
                                </li>
                                <li><i class="icon-minus"></i>Konfirmasi nama pengirim atas nama "Rivaldo Saputra"</li>
                                <li><i class="icon-minus"></i>Klik "Ya" di halaman konfirmasi</li>
                                <li><i class="icon-minus"></i>Tunggu proses transaksi berlangsung</li>
                                <li><i class="icon-minus"></i>Simpan bukti transaksi yang dikeluarkan ATM BNI</li>
                                <li><i class="icon-minus"></i>Tekan tombol "Konfirmasi Pembayaran" dihalaman QWERTY
                                    Studio untuk
                                    menkonfirmasi pembayaran kamu lalu ikuti tahap selanjutnya</li>
                            </ul><br>
                            <H4>ATM BRI</H4>
                            <ul class="iconlist iconlist-color mb-0">
                                <li><i class="icon-minus"></i>Datang ke ATM BRI terdekat</li>
                                <li><i class="icon-minus"></i>Masukkan kartu ATM BRI ke mesin</li>
                                <li><i class="icon-minus"></i>Pilih bahasa Indonesia</li>
                                <li><i class="icon-minus"></i>Isi PIN ATM</li>
                                <li><i class="icon-minus"></i>Klik Menu Transaksi Lainnya</li>
                                <li><i class="icon-minus"></i>Klik menu Transfer</li>
                                <li><i class="icon-minus"></i>Masukkan kode 002 + nomor rekening BRI</li>
                                <li><i class="icon-minus"></i>Masukan nominal pembayaran sebesar
                                    Rp<?= number_format($lunas, 0, ",", "."); ?>(Lunas), atau
                                    nominal Rp<?= number_format($dp, 0, ",", "."); ?>(DP) lalu Klik konfirmasi
                                </li>
                                <li><i class="icon-minus"></i>Konfirmasi nama pengirim atas nama "Rivaldo Saputra"</li>
                                <li><i class="icon-minus"></i>Klik "Ya" di halaman konfirmasi</li>
                                <li><i class="icon-minus"></i>Tunggu proses transaksi berlangsung</li>
                                <li><i class="icon-minus"></i>Simpan bukti transaksi yang dikeluarkan ATM BNI</li>
                                <li><i class="icon-minus"></i>Tekan tombol "Konfirmasi Pembayaran" dihalaman QWERTY
                                    Studio untuk
                                    menkonfirmasi pembayaran kamu lalu ikuti tahap selanjutnya</li>
                            </ul>
                        </div>

                        <div class="accordion-header">
                            <div class="accordion-icon">
                                <i class="accordion-closed icon-ok-circle"></i>
                                <i class="accordion-open icon-remove-circle"></i>
                            </div>
                            <div class="accordion-title">
                                Melalui Mobile Banking?
                            </div>
                        </div>
                        <div class="accordion-content">
                            <H4>M-BANKING BNI</H4>
                            <ul class="iconlist iconlist-color mb-0">
                                <li><i class="icon-minus"></i>Login ke BNI Mobile</li>
                                <li><i class="icon-minus"></i>Masukkan UserID dan MPIN</li>
                                <li><i class="icon-minus"></i>Klik menu Transfer</li>
                                <li><i class="icon-minus"></i>Klik Antar BNI</li>
                                <li><i class="icon-minus"></i>Tekan Input Baru</li>
                                <li><i class="icon-minus"></i>Masukan No Rek "1423509758"</li>
                                <li><i class="icon-minus"></i>Masukan nominal pembayaran sebesar
                                    Rp<?= number_format($lunas, 0, ",", "."); ?>(Lunas), atau
                                    nominal Rp<?= number_format($dp, 0, ",", "."); ?>(DP) lalu Klik konfirmasi
                                </li>
                                <li><i class="icon-minus"></i>Konfirmasi nama pengirim atas nama "Rivaldo Saputra"</li>
                                <li><i class="icon-minus"></i>Klik Selanjutnya</li>
                                <li><i class="icon-minus"></i>Masukkan password</li>
                                <li><i class="icon-minus"></i>Scrennshoot bukti transaksi BNI</li>
                                <li><i class="icon-minus"></i>Tekan tombol "Konfirmasi Pembayaran" dihalaman QWERTY
                                    Studio untuk
                                    menkonfirmasi pembayaran kamu lalu ikuti tahap selanjutnya</li>
                            </ul><br>
                            <H4>M-BANKING BRI</H4>
                            <ul class="iconlist iconlist-color mb-0">
                                <li><i class="icon-minus"></i>Buka BRI mobile</li>
                                <li><i class="icon-minus"></i>Masukkan USER ID dan Password</li>
                                <li><i class="icon-minus"></i>Klik menu Transfer</li>
                                <li><i class="icon-minus"></i>Klik Tambah Daftar Baru</li>
                                <li><i class="icon-minus"></i>Pilih Bank BRI</li>
                                <li><i class="icon-minus"></i>Masukan No Rek "1423509758"</li>
                                <li><i class="icon-minus"></i>Masukan nominal pembayaran sebesar
                                    Rp<?= number_format($lunas, 0, ",", "."); ?>(Lunas), atau
                                    nominal Rp<?= number_format($dp, 0, ",", "."); ?>(DP) lalu Klik konfirmasi
                                </li>
                                <li><i class="icon-minus"></i>Konfirmasi nama pengirim atas nama "Rivaldo Saputra"</li>
                                <li><i class="icon-minus"></i>Klik Selanjutnya</li>
                                <li><i class="icon-minus"></i>Masukkan PIN BRImo</li>
                                <li><i class="icon-minus"></i>Scrennshoot bukti transaksi BNI</li>
                                <li><i class="icon-minus"></i>Tekan tombol "Konfirmasi Pembayaran" dihalaman QWERTY
                                    Studio untuk
                                    menkonfirmasi pembayaran kamu lalu ikuti tahap selanjutnya</li>
                            </ul>
                        </div>

                        <div class="accordion-header">
                            <div class="accordion-icon">
                                <i class="accordion-closed icon-ok-circle"></i>
                                <i class="accordion-open icon-remove-circle"></i>
                            </div>
                            <div class="accordion-title">
                                Melalui Internet Banking?
                            </div>
                        </div>
                        <div class="accordion-content">
                            <h4>iBanking BNI</h4>
                            <ul class="iconlist iconlist-color mb-0">
                                <li><i class="icon-minus"></i>Buka laman 'https://ibank.bni.co.id' pada browser</li>
                                <li><i class="icon-minus"></i>Login denga UserID dan password BNI IB</li>
                                <li><i class="icon-minus"></i>Jawab kode captcha</li>
                                <li><i class="icon-minus"></i>Klik Transaksi</li>
                                <li><i class="icon-minus"></i>Klik Jenis Transaksi</li>
                                <li><i class="icon-minus"></i>Klik Transfer Antar BNI</li>
                                <li><i class="icon-minus"></i>Pilih Transfer Online Antar Bank</li>
                                <li><i class="icon-minus"></i>Pilih Sumber Rekening Tabungan atau Giro</li>
                                <li><i class="icon-minus"></i>Masukan No Rek "1423509758"</li>
                                <li><i class="icon-minus"></i>Masukan nominal pembayaran sebesar
                                    Rp<?= number_format($lunas, 0, ",", "."); ?>(Lunas), atau
                                    nominal Rp<?= number_format($dp, 0, ",", "."); ?>(DP) lalu Klik konfirmasi
                                </li>
                                <li><i class="icon-minus"></i>Konfirmasi nama pengirim atas nama "Rivaldo Saputra"</li>
                                <li><i class="icon-minus"></i>Klik Selanjutnya</li>
                                <li><i class="icon-minus"></i>Isi jenis token internet banking BNI</li>
                                <li><i class="icon-minus"></i>Klik e-Secure BNI Ketik PIN token</li>
                                <li><i class="icon-minus"></i>Masukkan kode challenge</li>
                                <li><i class="icon-minus"></i>Tunggu proses transfer BNI selesai</li>
                                <li><i class="icon-minus"></i>Scrennshoot bukti transaksi BNI</li>
                                <li><i class="icon-minus"></i>Tekan tombol "Konfirmasi Pembayaran" dihalaman QWERTY
                                    Studio untuk
                                    menkonfirmasi pembayaran kamu lalu ikuti tahap selanjutnya</li>
                            </ul><br>

                            <h4>iBanking BRI</h4>
                            <ul class="iconlist iconlist-color mb-0">
                                <li><i class="icon-minus"></i>Buka laman 'https//ib.bri.co.id' pada browser</li>
                                <li><i class="icon-minus"></i>Login user ID dan password</li>
                                <li><i class="icon-minus"></i>Pilih Transfer</li>
                                <li><i class="icon-minus"></i>Klik Transfer Sesama BRI</li>
                                <li><i class="icon-minus"></i>Masukan No Rek "1423509758"</li>
                                <li><i class="icon-minus"></i>Masukan nominal pembayaran sebesar
                                    Rp<?= number_format($lunas, 0, ",", "."); ?>(Lunas), atau
                                    nominal Rp<?= number_format($dp, 0, ",", "."); ?>(DP) lalu Klik konfirmasi
                                </li>
                                <li><i class="icon-minus"></i>Konfirmasi nama pengirim atas nama "Rivaldo Saputra"</li>
                                <li><i class="icon-minus"></i>Masukkan password</li>
                                <li><i class="icon-minus"></i>Klik Permintaan m-Token BRI</li>
                                <li><i class="icon-minus"></i>Masukkan m-Token dari SMS BRI</li>
                                <li><i class="icon-minus"></i>Tunggu proses transfer BRI selesai</li>
                                <li><i class="icon-minus"></i>Scrennshoot bukti transaksi BRI</li>
                                <li><i class="icon-minus"></i>Tekan tombol "Konfirmasi Pembayaran" dihalaman QWERTY
                                    Studio untuk
                                    menkonfirmasi pembayaran kamu lalu ikuti tahap selanjutnya</li>
                            </ul><br>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <h4>Katalog Dipesan</h4>

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
                    <ul class="clients-grid grid-2 grid-sm-3 grid-md-4 mb-0">
                        <li class="grid-item"><a><img src="<?= base_url(); ?>/assets/userimg/partner/Gojek.png"
                                    alt="Clients"></a></li>
                        <li class="grid-item"><a><img src="<?= base_url(); ?>/assets/userimg/partner/Dana.webp"
                                    alt="Clients"></a></li>
                        <li class="grid-item"><a><img src="<?= base_url(); ?>/assets/userimg/partner/BNI.png"
                                    alt="Clients"></a></li>
                        <li class="grid-item"><a><img src="<?= base_url(); ?>/assets/userimg/partner/BRI.png"
                                    alt="Clients"></a></li>
                    </ul>
                    <br>
                    <div class="col-12 form-group">
                        <button id="button-proses" class="button button-large w-100 m-0 button-blue"
                            onclick="confirm('<?= $booking['id_booking']; ?>');">Konfirmasi Pembayaran
                            <i class="icon-line-arrow-right"></i></button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section><!-- #content end -->

<?= $this->EndSection('content') ?>

<?= $this->Section('script') ?>
<!-- For Countdown -->
<script src="<?= base_url(); ?>js/components/moment.js"></script>
<script>
function confirm(idbooking) {
    $.ajax({
        type: "get",
        url: "<?= base_url(); ?>/konfirmasipembayaran/" + idbooking,
        data: "",
        dataType: "json",
        beforeSend: function(xhr) {
            $('#button-proses').prop('disabled', true);
            $('#button-proses').text('Loading...')
        },
        success: function(response) {
            window.location.replace("<?= base_url(); ?>/konfirmpembayaran/" + response.success);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" +
                thrownError);
        }
    });
}
</script>
<?= $this->EndSection('script') ?>