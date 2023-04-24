<?php $session = \Config\Services::session();
$level = $session->get('level'); ?>
<?= $this->extend('user/layout_user') ?>

<?= $this->section('content') ?>
<!-- Page Title
		============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>Pesanan</h1>
        <span></span>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pesanan</li>
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
                        <th class="cart-product-name">Tanggal</th>
                        <th class="cart-product-name">Lokasi</th>
                        <th class="cart-product-price">Status</th>
                        <th class="cart-product-subtotal">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($booking as $result) : ?>
                    <tr class="cart_item">
                        <td class="cart-product-remove">
                            <a class="remove" data-bs-toggle="modal" data-bs-target=".bs-example-modal-centered"
                                title="Remove this item"><i class="icon-trash2"></i></a>
                        </td>
                        <div class="modal fade bs-example-modal-centered" tabindex="-1" role="dialog"
                            aria-labelledby="centerModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Peringatan!</h4>
                                        <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal"
                                            aria-hidden="true"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="mb-0">Anda yakin ingin menghapus pesanan katalog
                                            "<?= $result['title_package'] ?>" ini? Harap dicatat bahwa setelah data
                                            dihapus, tidak akan ada opsi untuk mengembalikan kembali data tersebut serta
                                            pembayaran yang telah dilakukan untuk pesanan ini juga tidak dapat
                                            dikembalikan.
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <a href="../hapusbooking/<?= $result['id_booking']; ?>"
                                            class="btn btn-danger">Hapus Pesanan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <td class="cart-product-thumbnail">
                            <a href="../singledetail/<?= $result['id_package']; ?>"><img width="64" height="64"
                                    src="assets/userimg/package/<?= $result['image_package']; ?>"
                                    alt="Pink Printed Dress"></a>
                        </td>

                        <td class="cart-product-name">
                            <a href="../singledetail/<?= $result['id_package']; ?>"><?= $result['title_package']; ?></a>
                        </td>

                        <td class="cart-product-name">
                            <span class="amount"><?= $result['tanggal_sesi'] ?></span>
                        </td>

                        <td class="cart-product-name">
                            <span class="amount"><?= $result['lokasi'] ?></span>
                        </td>

                        <td class="cart-product-price">
                            <span class="amount"><?= $result['status'] ?></span></span>
                        </td>

                        <td class="cart-product-quantity">
                            <?php if ($result['status'] == "Belum dibayar") {?>
                            <a href="../infopembayaran/<?= $result['id_booking']; ?>"
                                class="button w-100 button-blue">Bayar</a>
                            <?php } elseif ($result['status'] == "Menunggu Konfirmasi") {?>
                            <a href="../konfirmpembayaran/<?= $result['id_booking']; ?>"
                                class="button w-100 button-dirtygreen">Konfirmasi</a>
                            <?php } elseif ($result['status'] == "Menunggu Verifikasi") {?>
                            <a href="../verifikasi/<?= $result['id_booking']; ?>"
                                class="button w-100 button-brown">Detail</a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
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
        window.location.replace("../katalogsearch/" + text);
    }
}
</script>
<?= $this->EndSection('script'); ?>