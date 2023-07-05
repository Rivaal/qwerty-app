<?= $this->extend('admin/layout') ?>

<?= $this->section('title') ?>Laporan<?= $this->endSection('title') ?>



<?= $this->section('content') ?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Cards with few info -->
        <div class="row">
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card card-refresh bg-primary text-white">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                            <h5 class="text-deposit mb-0 me-2 text-white">Rp0,-</h5>
                            <small>Deposit <br></small>
                            <small>Uang Keluar</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-primary rounded-pill p-2">
                                <i class="ti ti-credit-card ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card card-refresh bg-success text-white">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                            <h5 class="text-pelunasan mb-0 me-2 text-white">Rp0,-</h5>
                            <small>Pelunasan <br></small>
                            <small>Uang Keluar</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-success rounded-pill p-2">
                                <i class="ti ti-credit-card ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card card-refresh bg-info text-white">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                            <h5 class="text-totalmasuk mb-0 me-2 text-white">Rp0,-</h5>
                            <small>Total<br></small>
                            <small>Uang Keluar</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-info rounded-pill p-2">
                                <i class="ti ti-currency-dollar ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card card-refresh bg-danger text-white">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class=" card-title mb-0 text-white">
                            <h5 class="text-totalkeluar mb-0 me-2 text-white">Rp0,-</h5>
                            <small>Total<br></small>
                            <small>Uang Keluar</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-danger rounded-pill p-2">
                                <i class="ti ti-currency-dollar ti-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
<!-- Content wrapper -->
<?= $this->endSection('content') ?>
<?= $this->section('pageJS'); ?>
<script>
function formatRupiah(number) {
    var rupiah = "";
    var numberString = number.toString().replace(/[^,\d]/g, "").toString();
    var split = numberString.split(",");
    var sisa = split[0].length % 3;

    for (var i = 0; i < split[0].length; i++) {
        rupiah += split[0][i];
        if (i < split[0].length - 1 && (i + 1) % 3 === sisa) {
            rupiah += ".";
        }
    }

    if (split.length > 1) {
        rupiah += "," + split[1];
    }

    return "Rp " + rupiah;
}
$(document).ready(function() {
    $(".card-refresh").block({
        message: '<div class="spinner-border text-primary" role="status"></div>',
        timeout: 800,
        css: {
            backgroundColor: "transparent",
            border: "0"
        },
        overlayCSS: {
            backgroundColor: "#fff",
            opacity: 0.8
        }
    })
    $.ajax({
        type: "get",
        url: "<?= base_url('Datatables/card_info') ?>",
        data: "",
        dataType: "json",
        success: function(response) {
            if (response.success) {
                var formattedDeposit = formatRupiah(response.success.dp);
                var formattedPelunasan = formatRupiah(response.success.pelunasan);
                var formattedAll = formatRupiah(response.success.all);
                var formattedOut = formatRupiah(response.success.out);
                $('.text-deposit').html(formattedDeposit)
                $('.text-pelunasan').html(formattedPelunasan)
                $('.text-totalmasuk').html(formattedAll)
                $('.text-totalkeluar').html(formattedOut)
            }
            if (response.error) {
                window.location.href = "<?= base_url('Auth') ?>";
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" +
                thrownError);
        }
    });

});
</script>
<?= $this->endSection('pageJS'); ?>