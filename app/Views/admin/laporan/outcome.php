<?php $session = \Config\Services::session(); ?>
<?= $this->extend('admin/layout') ?>
<?= $this->section('title') ?>Expense<?= $this->endSection('title') ?>
<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css" />
<link rel="stylesheet"
    href="<?= base_url(); ?>/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css" />
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/libs/jquery-timepicker/jquery-timepicker.css" />
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendor/libs/pickr/pickr-themes.css" />
<?= $this->endSection('css') ?>

<?= $this->section('content') ?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Cards with few info -->
        <div class="row">
            <!-- Statistics -->
            <div class="col-lg-9 mb-4 col-md-12">
                <div class="card card-refresh">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title mb-0">Statistik</h5>
                        <small class="text-muted">Diperbarui baru saja</small>
                    </div>
                    <div class="card-body pt-2">
                        <div class="row gy-3">
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                        <i class="ti ti-currency-dollar ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h6 class="text-deposit mb-0">Rp 0</h6>
                                        <small>Deposit</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-info me-3 p-2">
                                        <i class="ti ti-currency-dollar ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h6 class="text-pelunasan mb-0">Rp 0</h6>
                                        <small>Pelunasan</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-success me-3 p-2">
                                        <i class="ti ti-currency-dollar ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h6 class="text-totalmasuk mb-0">Rp 0</h6>
                                        <small>Total Masuk</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-danger me-3 p-2">
                                        <i class="ti ti-currency-dollar ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h6 class="text-totalkeluar mb-0">Rp 0</h6>
                                        <small>Total Keluar</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Orders -->
            <div class="col-lg-3 col-6 mb-4">
                <div class="card card-refresh">
                    <div class="card-body text-center">
                        <div class="badge rounded-pill p-2 bg-label-success mb-2">
                            <i class="ti ti-currency-dollar ti-sm"></i>
                        </div>
                        <h5 class="text-totalbersih card-title mb-2">Rp 0</h5>
                        <small>Total Bersih</small>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <table class="datatables-basic table">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>id</th>
                            <th>Tanggal Keluar</th>
                            <th>Nominal </th>
                            <th>Jenis </th>
                            <th>Keterangan</th>
                            <th>Aktor</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->

        <!-- Modal Tambah Data-->
        <div class="modal fade" id="tambahData" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Uang Keluar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="tanggalkeluar" class="form-label">Tanggal Keluar</label>
                                <input type="text" class="form-control" placeholder="YYYY-MM-DD HH:MM"
                                    id="flatpickr-datetime" required />
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col mb-0">
                                <label for="emailWithTitle" class="form-label">Nominal</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">Rp</span>
                                    <input id="nominal" type="number" class="form-control" placeholder="100000"
                                        aria-label="Amount (to the nearest dollar)" required />
                                </div>
                            </div>
                            <div class="col mb-0">
                                <label for="dobWithTitle" class="form-label">Jenis</label>
                                <input id="selectpickerBasic" type="text" class="form-control" placeholder="100000"
                                    aria-label="Amount (to the nearest dollar)" value="Uang Keluar" required readonly />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="nameWithTitle" class="form-label">Keterangan</label>
                                <textarea class="form-control" id="keterangan" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button id="simpanData" type="button" class="btn btn-danger">Tambahkan</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit Data-->
        <div class="modal fade" id="editData" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Ubah Uang Keluar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="tanggalkeluar" class="form-label">Tanggal Keluar</label>
                                <input id="idincome" type="hidden" />
                                <input type="text" class="tgl form-control" placeholder="YYYY-MM-DD HH:MM"
                                    id="flatpickr-datetime2" required />
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col mb-0">
                                <label for="emailWithTitle" class="form-label">Nominal</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">Rp</span>
                                    <input id="nominal" type="number" class="nom form-control" placeholder="100000"
                                        aria-label="Amount (to the nearest dollar)" required />
                                </div>
                            </div>
                            <div class="col mb-0">
                                <label for="dobWithTitle" class="form-label">Jenis</label>
                                <input id="jenis" type="text" class="type form-control" placeholder="100000"
                                    aria-label="Amount (to the nearest dollar)" value="Uang Keluar" required readonly />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="nameWithTitle" class="form-label">Keterangan</label>
                                <textarea class="desc form-control" id="keterangan" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button id="updateData" type="button" class="btn btn-danger">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
<?= $this->endSection('content') ?>

<?= $this->section('pageJS'); ?>
<script src="<?= base_url(); ?>/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/libs/jquery-timepicker/jquery-timepicker.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/libs/pickr/pickr.js"></script>
<script>
'use strict';
let fv, offCanvasEl;
$(function() {
    'use strict';
    var dt_basic_table = $('.datatables-basic'),
        dt_basic;
    if (dt_basic_table.length) {
        dt_basic = dt_basic_table.DataTable({
            processing: true,
            ajax: '/Datatables/outcome',
            columns: [{
                    data: ''
                },
                {
                    data: 'outcome_id'
                },
                {
                    data: 'outcome_id'
                },
                {
                    data: 'outcome_created'
                },

                {
                    data: 'outcome_nominal'
                },
                {
                    data: 'outcome_type'
                },
                {
                    data: 'outcome_desc'
                },
                {
                    data: 'outcome_actor'
                },
                {
                    data: ''
                }
            ],
            columnDefs: [{
                    // For Responsive
                    className: 'control',
                    orderable: false,
                    searchable: false,
                    responsivePriority: 2,
                    targets: 0,
                    render: function(data, type, full, meta) {
                        return '';
                    }
                },
                {
                    // For Checkboxes
                    targets: 1,
                    orderable: false,
                    searchable: false,
                    responsivePriority: 3,
                    checkboxes: true,
                    render: function() {
                        return '<input type="checkbox" class="dt-checkboxes form-check-input">';
                    },
                    checkboxes: {
                        selectAllRender: '<input type="checkbox" class="form-check-input">'
                    }
                },
                {
                    targets: 2,
                    searchable: false,
                    visible: false
                },
                {
                    responsivePriority: 1,
                    targets: 3
                },
                {
                    targets: 4,
                    render: function(data, type, full, meta) {
                        var nominal = full['outcome_nominal'];
                        var formattedPrice = formatRupiah(nominal);
                        return formattedPrice;
                    }
                },
                {
                    targets: 5,
                    render: function(data, type, full, meta) {
                        var $status_number = full['outcome_type'];
                        var $status = {
                            "Uang Keluar": {
                                title: 'Uang Keluar',
                                class: 'bg-label-danger'
                            },
                        };
                        if (typeof $status[$status_number] === 'undefined') {
                            return data;
                        }
                        return (
                            '<span class="badge ' + $status[$status_number].class + '">' +
                            $status[$status_number].title + '</span>'
                        );
                    }
                },
                {
                    // Actions
                    targets: -1,
                    title: 'Aksi',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, full, meta) {
                        var $outcome_id = full['outcome_id'];
                        var $tanggal = full['outcome_created'];
                        var $nominal = full['outcome_nominal'];
                        var $type = full['outcome_type'];
                        var $desc = full['outcome_desc'];
                        var $actor = full['outcome_actor'];
                        return (
                            '<a onclick="editData(\'' + $outcome_id + '\',\'' + $tanggal +
                            '\',\'' + $nominal + '\',\'' + $type + '\',\'' + $desc +
                            '\')" href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil"></i></a>' +
                            '<a onclick="deleteData(\'' + $outcome_id +
                            '\')" href="javascript:;" class="btn btn-sm btn-icon item-delete"><i class="text-danger ti ti-trash"></i></a>'
                        );
                    }
                }
            ],
            order: [
                [2, 'desc']
            ],
            dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            displayLength: 7,
            lengthMenu: [7, 10, 25, 50, 75, 100],
            buttons: [{
                extend: 'collection',
                className: 'btn btn-label-primary dropdown-toggle me-2',
                text: '<i class="ti ti-file-export me-sm-1"></i> <span class="d-none d-sm-inline-block">Export</span>',
                buttons: [{
                        extend: 'print',
                        text: '<i class="ti ti-printer me-1" ></i>Print',
                        className: 'dropdown-item',
                        exportOptions: {
                            columns: [3, 4, 5, 6],
                            // prevent avatar to be display
                            format: {
                                body: function(inner, coldex, rowdex) {
                                    if (inner.length <= 0) return inner;
                                    var el = $.parseHTML(inner);
                                    var result = '';
                                    $.each(el, function(index, item) {
                                        if (item.classList !== undefined && item
                                            .classList.contains('user-name')) {
                                            result = result + item.lastChild
                                                .firstChild.textContent;
                                        } else if (item.innerText ===
                                            undefined) {
                                            result = result + item.textContent;
                                        } else result = result + item.innerText;
                                    });
                                    return result;
                                }
                            }
                        },
                        customize: function(win) {
                            //customize print view for dark
                            $(win.document.body)
                                .css('color', config.colors.headingColor)
                                .css('border-color', config.colors.borderColor)
                                .css('background-color', config.colors.bodyBg);
                            $(win.document.body)
                                .find('table')
                                .addClass('compact')
                                .css('color', 'inherit')
                                .css('border-color', 'inherit')
                                .css('background-color', 'inherit');
                        }
                    },
                    {
                        extend: 'csv',
                        text: '<i class="ti ti-file-text me-1" ></i>Csv',
                        className: 'dropdown-item',
                        exportOptions: {
                            columns: [3, 4, 5, 6],
                            // prevent avatar to be display
                            format: {
                                body: function(inner, coldex, rowdex) {
                                    if (inner.length <= 0) return inner;
                                    var el = $.parseHTML(inner);
                                    var result = '';
                                    $.each(el, function(index, item) {
                                        if (item.classList !== undefined && item
                                            .classList.contains('user-name')) {
                                            result = result + item.lastChild
                                                .firstChild.textContent;
                                        } else if (item.innerText ===
                                            undefined) {
                                            result = result + item.textContent;
                                        } else result = result + item.innerText;
                                    });
                                    return result;
                                }
                            }
                        }
                    },
                    {
                        extend: 'excel',
                        text: '<i class="ti ti-file-spreadsheet me-1"></i>Excel',
                        className: 'dropdown-item',
                        exportOptions: {
                            columns: [3, 4, 5, 6],
                            // prevent avatar to be display
                            format: {
                                body: function(inner, coldex, rowdex) {
                                    if (inner.length <= 0) return inner;
                                    var el = $.parseHTML(inner);
                                    var result = '';
                                    $.each(el, function(index, item) {
                                        if (item.classList !== undefined && item
                                            .classList.contains('user-name')) {
                                            result = result + item.lastChild
                                                .firstChild.textContent;
                                        } else if (item.innerText ===
                                            undefined) {
                                            result = result + item.textContent;
                                        } else result = result + item.innerText;
                                    });
                                    return result;
                                }
                            }
                        }
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="ti ti-file-description me-1"></i>Pdf',
                        className: 'dropdown-item',
                        exportOptions: {
                            columns: [3, 4, 5, 6],
                            // prevent avatar to be display
                            format: {
                                body: function(inner, coldex, rowdex) {
                                    if (inner.length <= 0) return inner;
                                    var el = $.parseHTML(inner);
                                    var result = '';
                                    $.each(el, function(index, item) {
                                        if (item.classList !== undefined && item
                                            .classList.contains('user-name')) {
                                            result = result + item.lastChild
                                                .firstChild.textContent;
                                        } else if (item.innerText ===
                                            undefined) {
                                            result = result + item.textContent;
                                        } else result = result + item.innerText;
                                    });
                                    return result;
                                }
                            }
                        }
                    },
                    {
                        extend: 'copy',
                        text: '<i class="ti ti-copy me-1" ></i>Copy',
                        className: 'dropdown-item',
                        exportOptions: {
                            columns: [3, 4, 5, 6],
                            // prevent avatar to be display
                            format: {
                                body: function(inner, coldex, rowdex) {
                                    if (inner.length <= 0) return inner;
                                    var el = $.parseHTML(inner);
                                    var result = '';
                                    $.each(el, function(index, item) {
                                        if (item.classList !== undefined && item
                                            .classList.contains('user-name')) {
                                            result = result + item.lastChild
                                                .firstChild.textContent;
                                        } else if (item.innerText ===
                                            undefined) {
                                            result = result + item.textContent;
                                        } else result = result + item.innerText;
                                    });
                                    return result;
                                }
                            }
                        }
                    }
                ]
            }],
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function(row) {
                            var data = row.data();
                            return 'Details of ' + data['full_name'];
                        }
                    }),
                    type: 'column',
                    renderer: function(api, rowIdx, columns) {
                        var data = $.map(columns, function(col, i) {
                            return col.title !==
                                '' // ? Do not show row in modal popup if title is blank (for check box)
                                ?
                                '<tr data-dt-row="' +
                                col.rowIndex +
                                '" data-dt-column="' +
                                col.columnIndex +
                                '">' +
                                '<td>' +
                                col.title +
                                ':' +
                                '</td> ' +
                                '<td>' +
                                col.data +
                                '</td>' +
                                '</tr>' :
                                '';
                        }).join('');

                        return data ? $('<table class="table"/><tbody />').append(data) : false;
                    }
                }
            }
        });
        $('div.head-label').html(
            '<div class="btn-group" role="group" aria-label="Basic example"><button type="button" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#tambahData"><i class="ti ti-plus me-sm-1"></i><span class="d-none d-sm-inline-block">Tambah Uang Keluar</span></button><button id="refreshtable" type="button" class="btn btn-danger"><i class="ti ti-refresh me-sm-1"></i></button></div>'
        );
        refreshData();

    }

    $("#refreshtable").on('click', function() {
        refreshData();
    });

    $('#simpanData').on('click', function() {
        var tanggal = $('#flatpickr-datetime').val(),
            nominal = $('#nominal').val(),
            type = $('#selectpickerBasic').val(),
            keterangan = $('#keterangan').val(),
            aktor = "<?= $session->get('admin_fullname'); ?>";
        $.ajax({
            type: "POST",
            url: "<?= base_url('simpanUangKeluar') ?>",
            data: {
                tanggal: tanggal,
                nominal: nominal,
                keterangan: keterangan,
                type: type,
                aktor: aktor,
            },
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": true,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    $('#tambahData').modal('hide');
                    toastr.success(response.success, 'Berhasil menambahkan data!')
                    refreshData();
                    // Swal.fire({
                    //     icon: 'success',
                    //     title: 'Berhasil!',
                    //     timer: 2000,
                    //     text: response.success,
                    //     customClass: {
                    //         confirmButton: 'btn btn-success'
                    //     },
                    //     confirmButtonText: 'Oke'
                    // }).then(function(result) {
                    //     
                    // });
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

    $('#updateData').on('click', function() {
        var id = $('#idincome').val(),
            tgl = $('.tgl').val(),
            nom = $('.nom').val(),
            desc = $('.desc').val(),
            actor = "<?= $session->get('admin_fullname'); ?>";
        $.ajax({
            type: "POST",
            url: "<?= base_url('updateUangKeluar') ?>",
            data: {
                id: id,
                tgl: tgl,
                nom: nom,
                desc: desc,
                actor: actor,
            },
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": true,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    $('#editData').modal('hide');
                    toastr.success(response.success, 'Berhasil mengubah data!')
                    refreshData();
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
});

(function() {
    // Flat Picker
    // --------------------------------------------------------------------
    const flatpickrDate = document.querySelector('#flatpickr-date'),
        flatpickrTime = document.querySelector('#flatpickr-time'),
        flatpickrDateTime = document.querySelector('#flatpickr-datetime'),
        flatpickrDateTime2 = document.querySelector('#flatpickr-datetime2'),
        flatpickrMulti = document.querySelector('#flatpickr-multi'),
        flatpickrRange = document.querySelector('#flatpickr-range'),
        flatpickrInline = document.querySelector('#flatpickr-inline'),
        flatpickrFriendly = document.querySelector('#flatpickr-human-friendly'),
        flatpickrDisabledRange = document.querySelector('#flatpickr-disabled-range');

    // Date
    if (flatpickrDate) {
        flatpickrDate.flatpickr({
            monthSelectorType: 'static'
        });
    }

    // Time
    if (flatpickrTime) {
        flatpickrTime.flatpickr({
            enableTime: true,
            noCalendar: true
        });
    }

    // Datetime
    if (flatpickrDateTime) {
        flatpickrDateTime.flatpickr({
            enableTime: true,
            dateFormat: 'Y-m-d H:i'
        });
    }

    // Datetime2
    if (flatpickrDateTime2) {
        flatpickrDateTime2.flatpickr({
            enableTime: true,
            dateFormat: 'Y-m-d H:i'
        });
    }

    // Multi Date Select
    if (flatpickrMulti) {
        flatpickrMulti.flatpickr({
            weekNumbers: true,
            enableTime: true,
            mode: 'multiple',
            minDate: 'today'
        });
    }

    // Range
    if (typeof flatpickrRange != undefined) {
        flatpickrRange.flatpickr({
            mode: 'range'
        });
    }

    // Inline
    if (flatpickrInline) {
        flatpickrInline.flatpickr({
            inline: true,
            allowInput: false,
            monthSelectorType: 'static'
        });
    }

    // Human Friendly
    if (flatpickrFriendly) {
        flatpickrFriendly.flatpickr({
            altInput: true,
            altFormat: 'F j, Y',
            dateFormat: 'Y-m-d'
        });
    }

    // Disabled Date Range
    if (flatpickrDisabledRange) {
        const fromDate = new Date(Date.now() - 3600 * 1000 * 48);
        const toDate = new Date(Date.now() + 3600 * 1000 * 48);

        flatpickrDisabledRange.flatpickr({
            dateFormat: 'Y-m-d',
            disable: [{
                from: fromDate.toISOString().split('T')[0],
                to: toDate.toISOString().split('T')[0]
            }]
        });
    }
})();

// * Pickers with jQuery dependency (jquery)
$(function() {
    // Bootstrap Datepicker
    // --------------------------------------------------------------------
    var bsDatepickerBasic = $('#bs-datepicker-basic'),
        bsDatepickerFormat = $('#bs-datepicker-format'),
        bsDatepickerRange = $('#bs-datepicker-daterange'),
        bsDatepickerDisabledDays = $('#bs-datepicker-disabled-days'),
        bsDatepickerMultidate = $('#bs-datepicker-multidate'),
        bsDatepickerOptions = $('#bs-datepicker-options'),
        bsDatepickerAutoclose = $('#bs-datepicker-autoclose'),
        bsDatepickerInlinedate = $('#bs-datepicker-inline');

    // Basic
    if (bsDatepickerBasic.length) {
        bsDatepickerBasic.datepicker({
            todayHighlight: true,
            orientation: isRtl ? 'auto right' : 'auto left'
        });
    }

    // Format
    if (bsDatepickerFormat.length) {
        bsDatepickerFormat.datepicker({
            todayHighlight: true,
            format: 'dd/mm/yyyy',
            orientation: isRtl ? 'auto right' : 'auto left'
        });
    }

    // Range
    if (bsDatepickerRange.length) {
        bsDatepickerRange.datepicker({
            todayHighlight: true,
            orientation: isRtl ? 'auto right' : 'auto left'
        });
    }

    // Disabled Days
    if (bsDatepickerDisabledDays.length) {
        bsDatepickerDisabledDays.datepicker({
            todayHighlight: true,
            daysOfWeekDisabled: [0, 6],
            orientation: isRtl ? 'auto right' : 'auto left'
        });
    }

    // Multiple
    if (bsDatepickerMultidate.length) {
        bsDatepickerMultidate.datepicker({
            multidate: true,
            todayHighlight: true,
            orientation: isRtl ? 'auto right' : 'auto left'
        });
    }

    // Options
    if (bsDatepickerOptions.length) {
        bsDatepickerOptions.datepicker({
            calendarWeeks: true,
            clearBtn: true,
            todayHighlight: true,
            orientation: isRtl ? 'auto left' : 'auto right'
        });
    }

    // Auto close
    if (bsDatepickerAutoclose.length) {
        bsDatepickerAutoclose.datepicker({
            todayHighlight: true,
            autoclose: true,
            orientation: isRtl ? 'auto right' : 'auto left'
        });
    }

    // Inline picker
    if (bsDatepickerInlinedate.length) {
        bsDatepickerInlinedate.datepicker({
            todayHighlight: true
        });
    }

    // Bootstrap Daterange Picker
    // --------------------------------------------------------------------
    var bsRangePickerBasic = $('#bs-rangepicker-basic'),
        bsRangePickerSingle = $('#bs-rangepicker-single'),
        bsRangePickerTime = $('#bs-rangepicker-time'),
        bsRangePickerRange = $('#bs-rangepicker-range'),
        bsRangePickerWeekNum = $('#bs-rangepicker-week-num'),
        bsRangePickerDropdown = $('#bs-rangepicker-dropdown'),
        bsRangePickerCancelBtn = document.getElementsByClassName('cancelBtn');

    // Basic
    if (bsRangePickerBasic.length) {
        bsRangePickerBasic.daterangepicker({
            opens: isRtl ? 'left' : 'right'
        });
    }

    // Single
    if (bsRangePickerSingle.length) {
        bsRangePickerSingle.daterangepicker({
            singleDatePicker: true,
            opens: isRtl ? 'left' : 'right'
        });
    }

    // Time & Date
    if (bsRangePickerTime.length) {
        bsRangePickerTime.daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY h:mm A'
            },
            opens: isRtl ? 'left' : 'right'
        });
    }

    if (bsRangePickerRange.length) {
        bsRangePickerRange.daterangepicker({
            ranges: {
                Today: [moment(), moment()],
                Yesterday: [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                    'month').endOf('month')]
            },
            opens: isRtl ? 'left' : 'right'
        });
    }

    // Week Numbers
    if (bsRangePickerWeekNum.length) {
        bsRangePickerWeekNum.daterangepicker({
            showWeekNumbers: true,
            opens: isRtl ? 'left' : 'right'
        });
    }
    // Dropdown
    if (bsRangePickerDropdown.length) {
        bsRangePickerDropdown.daterangepicker({
            showDropdowns: true,
            opens: isRtl ? 'left' : 'right'
        });
    }

    // Adding btn-secondary class in cancel btn
    for (var i = 0; i < bsRangePickerCancelBtn.length; i++) {
        bsRangePickerCancelBtn[i].classList.remove('btn-default');
        bsRangePickerCancelBtn[i].classList.add('btn-secondary');
    }

    // jQuery Timepicker
    // --------------------------------------------------------------------
    var basicTimepicker = $('#timepicker-basic'),
        minMaxTimepicker = $('#timepicker-min-max'),
        disabledTimepicker = $('#timepicker-disabled-times'),
        formatTimepicker = $('#timepicker-format'),
        stepTimepicker = $('#timepicker-step'),
        altHourTimepicker = $('#timepicker-24hours');

    // Basic
    if (basicTimepicker.length) {
        basicTimepicker.timepicker({
            orientation: isRtl ? 'r' : 'l'
        });
    }

    // Min & Max
    if (minMaxTimepicker.length) {
        minMaxTimepicker.timepicker({
            minTime: '2:00pm',
            maxTime: '7:00pm',
            showDuration: true,
            orientation: isRtl ? 'r' : 'l'
        });
    }

    // Disabled Picker
    if (disabledTimepicker.length) {
        disabledTimepicker.timepicker({
            disableTimeRanges: [
                ['12am', '3am'],
                ['4am', '4:30am']
            ],
            orientation: isRtl ? 'r' : 'l'
        });
    }

    // Format Picker
    if (formatTimepicker.length) {
        formatTimepicker.timepicker({
            timeFormat: 'H:i:s',
            orientation: isRtl ? 'r' : 'l'
        });
    }

    // Steps Picker
    if (stepTimepicker.length) {
        stepTimepicker.timepicker({
            step: 15,
            orientation: isRtl ? 'r' : 'l'
        });
    }

    // 24 Hours Format
    if (altHourTimepicker.length) {
        altHourTimepicker.timepicker({
            show: '24:00',
            timeFormat: 'H:i:s',
            orientation: isRtl ? 'r' : 'l'
        });
    }
});

// color picker (pickr)
// --------------------------------------------------------------------
(function() {
    const classicPicker = document.querySelector('#color-picker-classic'),
        monolithPicker = document.querySelector('#color-picker-monolith'),
        nanoPicker = document.querySelector('#color-picker-nano');

    // classic
    if (classicPicker) {
        pickr.create({
            el: classicPicker,
            theme: 'classic',
            default: 'rgba(102, 108, 232, 1)',
            swatches: [
                'rgba(102, 108, 232, 1)',
                'rgba(40, 208, 148, 1)',
                'rgba(255, 73, 97, 1)',
                'rgba(255, 145, 73, 1)',
                'rgba(30, 159, 242, 1)'
            ],
            components: {
                // Main components
                preview: true,
                opacity: true,
                hue: true,

                // Input / output Options
                interaction: {
                    hex: true,
                    rgba: true,
                    hsla: true,
                    hsva: true,
                    cmyk: true,
                    input: true,
                    clear: true,
                    save: true
                }
            }
        });
    }

    // monolith
    if (monolithPicker) {
        pickr.create({
            el: monolithPicker,
            theme: 'monolith',
            default: 'rgba(40, 208, 148, 1)',
            swatches: [
                'rgba(102, 108, 232, 1)',
                'rgba(40, 208, 148, 1)',
                'rgba(255, 73, 97, 1)',
                'rgba(255, 145, 73, 1)',
                'rgba(30, 159, 242, 1)'
            ],
            components: {
                // Main components
                preview: true,
                opacity: true,
                hue: true,

                // Input / output Options
                interaction: {
                    hex: true,
                    rgba: true,
                    hsla: true,
                    hsva: true,
                    cmyk: true,
                    input: true,
                    clear: true,
                    save: true
                }
            }
        });
    }

    // nano
    if (nanoPicker) {
        pickr.create({
            el: nanoPicker,
            theme: 'nano',
            default: 'rgba(255, 73, 97, 1)',
            swatches: [
                'rgba(102, 108, 232, 1)',
                'rgba(40, 208, 148, 1)',
                'rgba(255, 73, 97, 1)',
                'rgba(255, 145, 73, 1)',
                'rgba(30, 159, 242, 1)'
            ],
            components: {
                // Main components
                preview: true,
                opacity: true,
                hue: true,

                // Input / output Options
                interaction: {
                    hex: true,
                    rgba: true,
                    hsla: true,
                    hsva: true,
                    cmyk: true,
                    input: true,
                    clear: true,
                    save: true
                }
            }
        });
    }
})();

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

function refreshData() {
    var dtUserTable = $('.datatables-basic').DataTable();
    dtUserTable.ajax.reload(null, false);
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
                var formattedClear = formatRupiah(response.success.clear);
                if (response.success.all < response.success.out) {
                    formattedClear = "- " + formattedClear;
                } else {
                    formattedClear = formattedClear;
                }
                $('.text-deposit').html(formattedDeposit)
                $('.text-pelunasan').html(formattedPelunasan)
                $('.text-totalmasuk').html(formattedAll)
                $('.text-totalkeluar').html(formattedOut)
                $('.text-totalbersih').html(formattedClear)
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
    $(".card-datatable").block({
        message: '<div class="spinner-border text-primary" role="status"></div>',
        timeout: 1000,
        css: {
            backgroundColor: "transparent",
            border: "0"
        },
        overlayCSS: {
            backgroundColor: "#fff",
            opacity: 0.8
        }
    })
}

function editData(id, tgl, nom, type, desc) {
    $('#idincome').val(id);
    $('.tgl').val(tgl);
    $('.nom').val(nom);
    $('.desc').val(desc);
    $('#editData').modal('show');
}

function deleteData(id) {
    $.ajax({
        type: "GET",
        url: "<?= base_url('deleteUangKeluar') ?>/" + id,
        data: "",
        dataType: "json",
        success: function(response) {
            if (response.success) {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                $('#editData').modal('hide');
                toastr.success(response.success, 'Berhasil')
                refreshData();
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
}
</script>
<!-- Content wrapper -->
<?= $this->endSection('pageJS'); ?>