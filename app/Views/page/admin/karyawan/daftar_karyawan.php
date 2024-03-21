<?php $session = \Config\Services::session();
$level = $session->get('level'); ?>
<?= $this->extend('page/admin/layout') ?>

<?= $this->section('title') ?>Karyawan<?= $this->endSection('title') ?>



<?= $this->section('content') ?>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Karyawan /</span> Daftar Karyawan</h4>
        <!-- Table -->
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <table class="datatables-basic table">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>id</th>
                            <th>Nama</th>
                            <th>Nomor Ponsel </th>
                            <th>Alamat</th>
                            <th>Tanggal dibuat</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        <!-- Modal to add new record -->
        <div class="offcanvas offcanvas-end" id="add-new-record">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title" id="exampleModalLabel">Karyawan Baru</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body flex-grow-1">
                <form class="add-new-record pt-0 row g-2" id="form-add-new-record" method="POST" action="#">
                    <div class="col-sm-12">
                        <label class="form-label" for="basicFullname">Nama Lengkap</label>
                        <div class="input-group input-group-merge">
                            <span id="basicFullname2" class="input-group-text"><i class="ti ti-user"></i></span>
                            <input type="text" id="basicFullname" class="form-control dt-full-name" name="basicFullname"
                                placeholder="Masukan nama lengkap" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="basicUsername">Username</label>
                        <div class="input-group input-group-merge">
                            <span id="basicUsername2" class="input-group-text"><i class="ti ti-at"></i></span>
                            <input type="text" id="basicUsername" name="basicUsername" class="form-control dt-user-name"
                                placeholder="Masukan username" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="basicPassword">Password</label>
                        <div class="input-group input-group-merge">
                            <span id="basicPassword2" class="input-group-text"><i class="ti ti-lock"></i></span>
                            <input type="text" id="basicPassword" name="basicPassword" class="form-control dt-password"
                                placeholder="Masukan password" />

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="basicPhone">Nomor Ponsel</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="ti ti-brand-whatsapp"></i></span>
                            <input type="text" id="basicPhone" name="basicPhone" class="form-control dt-phone"
                                placeholder="Masukan nomor ponsel" />
                        </div>
                        <div class="form-text">Wajib menggunakan nomor yang terdaftar whatsapp</div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="basicAddress">Alamat</label>
                        <textarea class="form-control dt-address" id="basicAddress" name="basicAddress"
                            rows="3"></textarea>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="basicLevel">Level</label>
                        <select id="basicLevel" name="basicLevel" class="selectpicker w-100 dt-level"
                            data-style="btn-default">
                            <?php if ($level == 0) {?>
                            <option value="0">Super Admin</option>
                            <option value="1">Admin</option>
                            <option value="2">Karyawan</option>
                            <?php } elseif ($level == 1) {?>
                            <option value="2">Karyawan</option>
                            <?php } elseif ($level==2) {?>
                            <option value="9">Null</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary btn-submit me-sm-3 me-1">Buat</button>
                        <button type="reset" class="btn btn-outline-secondary btn-batal"
                            data-bs-dismiss="offcanvas">Batal</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal to edit existing record -->
        <div class="offcanvas offcanvas-end" id="editing-record">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title" id="exampleModalLabel">Edit Karyawan</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body flex-grow-1">
                <form class="editing-record pt-0 row g-2" id="form-editing-record" method="POST" action="#">
                    <div class="col-sm-12">
                        <label class="form-label" for="editFullname">Nama Lengkap</label>
                        <div class="input-group input-group-merge">
                            <span id="editFullname2" class="input-group-text"><i class="ti ti-user"></i></span>
                            <input type="text" id="editFullname" class="form-control ed-full-name" name="editFullname"
                                placeholder="Masukan nama lengkap" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="editUsername">Username</label>
                        <div class="input-group input-group-merge">
                            <span id="editUsername2" class="input-group-text"><i class="ti ti-at"></i></span>
                            <input type="text" id="editUsername" name="editUsername" class="form-control ed-user-name"
                                placeholder="Masukan username" readonly />
                        </div>
                        <div class="form-text">Username tidak dapat diubah.</div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="editPhone">Nomor Ponsel</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="ti ti-brand-whatsapp"></i></span>
                            <input type="text" id="editPhone" name="editPhone" class="form-control ed-phone"
                                placeholder="Masukan nomor ponsel" />
                        </div>
                        <div class="form-text">Wajib menggunakan nomor yang terdaftar whatsapp</div>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="editAddress">Alamat</label>
                        <textarea class="form-control ed-address" id="editAddress" name="editAddress"
                            rows="3"></textarea>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="editLevel">Level</label>
                        <select id="editLevel" name="editLevel" class="selectpicker w-100 ed-level"
                            data-style="btn-default">
                            <?php if ($level == 0) {?>
                            <option value="0">Super Admin</option>
                            <option value="1">Admin</option>
                            <option value="2">Karyawan</option>
                            <?php } elseif ($level == 1) {?>
                            <option value="2">Karyawan</option>
                            <?php } elseif ($level==2) {?>
                            <option value="9">Null</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-warning btn-update me-sm-3 me-1">Update</button>
                        <button type="reset" class="btn btn-outline-secondary btn-batal"
                            data-bs-dismiss="offcanvas">Batal</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal to confirm the password -->
        <div class="modal fade" id="confirmPassword" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Kata Sandi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="confirmPasswordInput" class="form-label">Masukan kata sandi untuk
                                    melanjutkan</label>
                                <input type="password" id="confirmPasswordInput" class="form-control" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <div class="invalid-feedback password-confirm-feedback">
                                    Kata sandi salah!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary btn-confirm">Konfirmasi</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Modal -->

        <!-- Modal to confirm the password -->
        <div class="modal fade" id="editPassword" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Kata Sandi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="editPasswordInput" class="form-label">Masukan kata sandi untuk
                                    melanjutkan</label>
                                <input type="password" id="editPasswordInput" class="form-control" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <div class="invalid-feedback password-edit-feedback">
                                    Kata sandi salah!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary btn-edit">Konfirmasi</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Modal -->

    </div>
    <!-- / Content -->
</div>
<!-- Content wrapper -->
<?= $this->endSection('content') ?>

<?= $this->section('pageJS'); ?>
<script>
'use strict';
let fv, offCanvasEl;
const offCanvasElement = document.querySelector('#add-new-record');
const offCanvasEditElement = document.querySelector('#editing-record');

function editData(username, fullname, level, phonenumber, address) {
    let fvEdit, offCanvasEditEl;
    const formAddNewRecord = document.getElementById('form-editing-record');

    setTimeout(() => {
        offCanvasEditEl = new bootstrap.Offcanvas(offCanvasEditElement);
        // Empty fields on offCanvasEdit open
        (offCanvasEditElement.querySelector('.ed-full-name').value = fullname),
        (offCanvasEditElement.querySelector('.ed-user-name').value = username),
        (offCanvasEditElement.querySelector('.ed-phone').value = phonenumber),
        (offCanvasEditElement.querySelector('.ed-address').value = address),
        $('.ed-level').selectpicker('val', level);

        // Open offCanvasEdit with form
        offCanvasEditEl.show();
    }, 200);

    // Form validation for Add new record
    fvEdit = FormValidation.formValidation(formAddNewRecord, {
            fields: {
                editFullname: {
                    validators: {
                        notEmpty: {
                            message: 'Nama dibutuhkan'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z ]+$/,
                            message: 'Nama lengkap hanya boleh menggunakan huruf'
                        }
                    }
                },
                editUsername: {
                    validators: {
                        notEmpty: {
                            message: 'Username dibutuhkan'
                        },
                        stringLength: {
                            min: 6,
                            message: 'Username harus memiliki setidaknya 6 karakter'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9]+$/,
                            message: 'Username hanya boleh terdiri dari huruf dan angka'
                        }
                    }
                },
                editPassword: {
                    validators: {
                        notEmpty: {
                            message: 'Password dibutuhkan'
                        },
                        stringLength: {
                            min: 6,
                            message: 'Password harus memiliki setidaknya 6 karakter'
                        },
                        regexp: {
                            regexp: /^(?=.*\d)(?=.*[a-zA-Z]).+$/,
                            message: 'Password harus menggunakan huruf dan angka'
                        }
                    }
                },
                editPhone: {
                    validators: {
                        notEmpty: {
                            message: 'Nomor ponsel dibutuhkan'
                        },
                        regexp: {
                            regexp: /^(08)/,
                            message: 'Nomor ponsel harus dimulai dengan 08'
                        },
                        stringLength: {
                            min: 11,
                            message: 'Nomor ponsel harus memiliki setidaknya 11 karakter'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'Nomor ponsel hanya boleh terdiri dari angka'
                        },

                    }
                },
                editAddress: {
                    validators: {
                        notEmpty: {
                            message: 'Alamat dibutuhkan'
                        }
                    }
                },
                editLevel: {
                    validators: {
                        notEmpty: {
                            message: 'Level dibutuhkan'
                        }
                    }
                }
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap5: new FormValidation.plugins.Bootstrap5({
                    // Use this for enabling/changing valid/invalid class
                    // eleInvalidClass: '',
                    eleValidClass: '',
                    rowSelector: '.col-sm-12'
                }),
                submitButton: new FormValidation.plugins.SubmitButton(),
                // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                autoFocus: new FormValidation.plugins.AutoFocus()
            },
            init: instance => {
                instance.on('plugins.message.placed', function(e) {
                    if (e.element.parentElement.classList.contains('input-group')) {
                        e.element.parentElement.insertAdjacentElement('afterend', e
                            .messageElement);
                    }
                });
            },

        })
        .on('core.form.valid', function() {
            if ($('#editPassword').modal('show')) {
                $(".offcanvas").block({
                    message: '<div class="spinner-border text-primary" role="status"></div>',
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
        });
}

function deleteData(username) {
    Swal.fire({
        title: 'Hapus Akun ' + username + ' ?',
        text: "Akun yang dihapus tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal',
        customClass: {
            confirmButton: 'btn btn-danger me-3',
            cancelButton: 'btn btn-label-secondary'
        },
        buttonsStyling: false
    }).then(function(result) {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: "/DeleteData/Karyawan",
                data: {
                    "username": username
                },
                dataType: "JSON",
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
                        toastr.success(response.success, 'Berhasil menghapus!')

                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            timer: 2000,
                            text: response.success,
                            customClass: {
                                confirmButton: 'btn btn-success'
                            },
                            confirmButtonText: 'Oke'
                        }).then(function(result) {
                            var dtUserTable = $('.datatables-basic').DataTable();
                            dtUserTable.ajax.reload(null, false);
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
                        });
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" +
                        thrownError);
                }
            });

        }
    });
}

function saveData() {
    var formData = {
        "fullname": offCanvasElement.querySelector('[name="basicFullname"]').value,
        "username": offCanvasElement.querySelector('[name="basicUsername"]').value,
        "password": offCanvasElement.querySelector('[name="basicPassword"]').value,
        "phone": offCanvasElement.querySelector('[name="basicPhone"]').value,
        "address": offCanvasElement.querySelector('[name="basicAddress"]').value,
        "level": offCanvasElement.querySelector('[name="basicLevel"]').value,
    };

    $.ajax({
        type: "POST",
        url: "/InsertData/Karyawan",
        data: formData,
        dataType: "JSON",
        beforeSend: function() {
            $('.btn-submit').prop('disabled', true);
            $('.btn-submit').html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
            )
        },
        success: function(response) {
            $('.btn-submit').prop('disabled', false);
            $('.btn-submit').html('Buat');
            if (response.error) {
                $('.btn-batal').click();
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
                toastr.error(response.error, 'Gagal menyimpan!')
            } else if (response.success) {
                $('.btn-batal').click();
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
                toastr.success(response.success, 'Berhasil menyimpan!')
                var dtUserTable = $('.datatables-basic').DataTable();
                dtUserTable.ajax.reload(null, false);
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

        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" +
                thrownError);
        }
    });
}

function updateData() {
    var formData = {
        "fullname": offCanvasEditElement.querySelector('[name="editFullname"]').value,
        "username": offCanvasEditElement.querySelector('[name="editUsername"]').value,
        "phone": offCanvasEditElement.querySelector('[name="editPhone"]').value,
        "address": offCanvasEditElement.querySelector('[name="editAddress"]').value,
        "level": offCanvasEditElement.querySelector('[name="editLevel"]').value,
    };

    $.ajax({
        type: "POST",
        url: "/UpdateData/Karyawan",
        data: formData,
        dataType: "JSON",
        beforeSend: function() {
            $('.btn-update').prop('disabled', true);
            $('.btn-update').html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
            )
        },
        success: function(response) {
            $('.btn-update').prop('disabled', false);
            $('.btn-update').html('Update');
            if (response.success) {
                $('.btn-batal').click();
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
                toastr.success(response.success, 'Berhasil mengupdate!')
                var dtUserTable = $('.datatables-basic').DataTable();
                dtUserTable.ajax.reload(null, false);
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

        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" +
                thrownError);
        }
    });
}

$(".selectpicker").selectpicker();

$('#confirmPasswordInput').keypress(function(event) {
    if (event.keyCode === 13) {
        $('.btn-confirm').click();
    }
});

$('#editPasswordInput').keypress(function(event) {
    if (event.keyCode === 13) {
        $('.btn-edit').click();
    }
});

$('.btn-confirm').click(function(e) {
    e.preventDefault();

    $('#confirmPasswordInput').removeClass('is-invalid');

    var pass = $('#confirmPasswordInput').val();

    if (pass === "") {
        $('#confirmPasswordInput').addClass('is-invalid');
        $('.password-confirm-feedback').html('Silahkan masukan kata sandi.');
    } else {
        $.ajax({
            type: "GET",
            url: "/Auth/checkPassword/" + pass,
            data: "",
            dataType: "JSON",
            beforeSend: function() {
                $('.btn-confirm').prop('disabled', true);
                $('.btn-confirm').html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
                )
            },
            success: function(response) {
                if (response.password == 0) {
                    $('.btn-confirm').prop('disabled', false);
                    $('.btn-confirm').html('Konfirmasi');
                    $('#confirmPasswordInput').addClass('is-invalid');
                    $('.password-confirm-feedback').html('Kata sandi salah.');
                } else if (response.password == 1) {
                    if ($('#confirmPassword').modal('hide')) {
                        $(".offcanvas").unblock();
                    }
                    saveData();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" +
                    thrownError);
            }
        });
    }
});

$('.btn-edit').click(function(e) {
    e.preventDefault();

    $('#editPasswordInput').removeClass('is-invalid');

    var pass = $('#editPasswordInput').val();

    if (pass === "") {
        $('#editPasswordInput').addClass('is-invalid');
        $('.password-edit-feedback').html('Silahkan masukan kata sandi.');
    } else {
        $.ajax({
            type: "GET",
            url: "/Auth/checkPassword/" + pass,
            data: "",
            dataType: "JSON",
            beforeSend: function() {
                $('.btn-edit').prop('disabled', true);
                $('.btn-edit').html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
                )
            },
            success: function(response) {
                if (response.password == 0) {
                    $('.btn-edit').prop('disabled', false);
                    $('.btn-edit').html('Konfirmasi');
                    $('#editPasswordInput').addClass('is-invalid');
                    $('.password-edit-feedback').html('Kata sandi salah.');
                } else if (response.password == 1) {
                    if ($('#editPassword').modal('hide')) {
                        $(".offcanvas").unblock();
                    }
                    updateData();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" +
                    thrownError);
            }
        });
    }
});

$('#confirmPassword').on('shown.bs.modal', function() {
    $('#confirmPasswordInput').focus();
});

$('#confirmPassword').on('hidden.bs.modal', function() {
    $(".offcanvas").unblock();
    $("#confirmPasswordInput").val("");
    $('.btn-confirm').prop('disabled', false);
    $('.btn-confirm').html('Konfirmasi');
});

$('#editPassword').on('shown.bs.modal', function() {
    $('#editPasswordInput').focus();
});

$('#editPassword').on('hidden.bs.modal', function() {
    $(".offcanvas").unblock();
    $("#editPasswordInput").val("");
    $('.btn-edit').prop('disabled', false);
    $('.btn-edit').html('Konfirmasi');
});

document.addEventListener('DOMContentLoaded', function(e) {
    (function() {
        const formAddNewRecord = document.getElementById('form-add-new-record');

        setTimeout(() => {
            const newRecord = document.querySelector('.create-new');


            // To open offCanvas, to add new record
            if (newRecord) {
                newRecord.addEventListener('click', function() {
                    offCanvasEl = new bootstrap.Offcanvas(offCanvasElement);
                    // Empty fields on offCanvas open
                    (offCanvasElement.querySelector('.dt-full-name').value = ''),
                    (offCanvasElement.querySelector('.dt-user-name').value = ''),
                    (offCanvasElement.querySelector('.dt-password').value = ''),
                    (offCanvasElement.querySelector('.dt-phone').value = ''),
                    (offCanvasElement.querySelector('.dt-address').value = ''),
                    (offCanvasElement.querySelector('.dt-level').value = '');
                    // Open offCanvas with form
                    offCanvasEl.show();
                });
            }
        }, 200);

        // Form validation for Add new record
        fv = FormValidation.formValidation(formAddNewRecord, {
                fields: {
                    basicFullname: {
                        validators: {
                            notEmpty: {
                                message: 'Nama dibutuhkan'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z ]+$/,
                                message: 'Nama lengkap hanya boleh menggunakan huruf'
                            }
                        }
                    },
                    basicUsername: {
                        validators: {
                            notEmpty: {
                                message: 'Username dibutuhkan'
                            },
                            stringLength: {
                                min: 6,
                                message: 'Username harus memiliki setidaknya 6 karakter'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9]+$/,
                                message: 'Username hanya boleh terdiri dari huruf dan angka'
                            }
                        }
                    },
                    basicPassword: {
                        validators: {
                            notEmpty: {
                                message: 'Password dibutuhkan'
                            },
                            stringLength: {
                                min: 6,
                                message: 'Password harus memiliki setidaknya 6 karakter'
                            },
                            regexp: {
                                regexp: /^(?=.*\d)(?=.*[a-zA-Z]).+$/,
                                message: 'Password harus menggunakan huruf dan angka'
                            }
                        }
                    },
                    basicPhone: {
                        validators: {
                            notEmpty: {
                                message: 'Nomor ponsel dibutuhkan'
                            },
                            regexp: {
                                regexp: /^(08)/,
                                message: 'Nomor ponsel harus dimulai dengan 08'
                            },
                            stringLength: {
                                min: 11,
                                message: 'Nomor ponsel harus memiliki setidaknya 11 karakter'
                            },
                            regexp: {
                                regexp: /^[0-9]+$/,
                                message: 'Nomor ponsel hanya boleh terdiri dari angka'
                            },

                        }
                    },
                    basicAddress: {
                        validators: {
                            notEmpty: {
                                message: 'Alamat dibutuhkan'
                            }
                        }
                    },
                    basicLevel: {
                        validators: {
                            notEmpty: {
                                message: 'Level dibutuhkan'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap5: new FormValidation.plugins.Bootstrap5({
                        // Use this for enabling/changing valid/invalid class
                        // eleInvalidClass: '',
                        eleValidClass: '',
                        rowSelector: '.col-sm-12'
                    }),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    // defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                    autoFocus: new FormValidation.plugins.AutoFocus()
                },
                init: instance => {
                    instance.on('plugins.message.placed', function(e) {
                        if (e.element.parentElement.classList.contains('input-group')) {
                            e.element.parentElement.insertAdjacentElement('afterend', e
                                .messageElement);
                        }
                    });
                },

            })
            .on('core.form.valid', function() {
                if ($('#confirmPassword').modal('show')) {
                    $(".offcanvas").block({
                        message: '<div class="spinner-border text-primary" role="status"></div>',
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
            });
    })();
});

$(function() {
    'use strict';

    var dt_basic_table = $('.datatables-basic'),
        dt_basic;

    // DataTable with buttons
    // --------------------------------------------------------------------

    if (dt_basic_table.length) {
        dt_basic = dt_basic_table.DataTable({
            ajax: '/Datatables/tableKaryawan',
            columns: [{
                    data: ''
                },
                {
                    data: 'username'
                },
                {
                    data: 'username'
                },
                {
                    data: 'userfullname'
                },
                {
                    data: 'userphonenumber'
                },
                {
                    data: 'useraddress'
                },
                {
                    data: 'created_at'
                },
                {
                    data: 'userlevel'
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
                    // Avatar image/badge, Name and post
                    targets: 3,
                    responsivePriority: 4,
                    render: function(data, type, full, meta) {
                        var stateNum = Math.floor(Math.random() * 6);
                        var states = ['success', 'danger', 'warning', 'info', 'primary',
                            'secondary'
                        ];
                        var $state = states[stateNum],
                            $output,
                            $username = full['username'],
                            $name = full['userfullname'],
                            $initials = $name.match(/\b\w/g) || [];
                        $initials = (($initials.shift() || '') + ($initials.pop() || ''))
                            .toUpperCase();
                        $output = '<span class="avatar-initial rounded-circle bg-label-' +
                            $state + '">' + $initials + '</span>';

                        // Creates full output for row
                        var $row_output =
                            '<div class="d-flex justify-content-start align-items-center user-name">' +
                            '<div class="avatar-wrapper">' +
                            '<div class="avatar me-2">' +
                            $output +
                            '</div>' +
                            '</div>' +
                            '<div class="d-flex flex-column">' +
                            '<span class="emp_name text-truncate">' +
                            $name +
                            '</span>' +
                            '<small class="emp_post text-truncate text-muted">' +
                            $username +
                            '</small>' +
                            '</div>' +
                            '</div>';
                        return $row_output;
                    }
                },
                {
                    responsivePriority: 1,
                    targets: 4
                },
                {
                    // Label
                    targets: -2,
                    render: function(data, type, full, meta) {
                        var $status_number = full['userlevel'];
                        var $status = {
                            0: {
                                title: 'Super Admin',
                                class: 'bg-label-primary'
                            },
                            1: {
                                title: 'Admin',
                                class: ' bg-label-success'
                            },
                            2: {
                                title: 'Karyawan',
                                class: ' bg-label-danger'
                            },
                            3: {
                                title: 'User',
                                class: ' bg-label-warning'
                            }
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
                    title: 'Actions',
                    orderable: false,
                    searchable: false,
                    <?php echo $msg = ($level==2) ? "visible: false," : ""; ?>
                    render: function(data, type, full, meta) {
                        var $username = full['username'];
                        var $fullname = full['userfullname'];
                        var $level = full['userlevel'];
                        var $phonenumber = full['userphonenumber'];
                        var $address = full['useraddress'];
                        return (
                            '<a onclick="editData(\'' + $username + '\',\'' + $fullname +
                            '\',\'' + $level + '\',\'' + $phonenumber + '\',\'' + $address +
                            '\')" href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="text-primary ti ti-pencil"></i></a>' +
                            '<a onclick="deleteData(\'' + $username +
                            '\')" href="javascript:;" class="btn btn-sm btn-icon item-delete"><i class="text-danger ti ti-trash"></i></a>'
                        );
                    }
                }
            ],
            order: [
                [2, 'desc']
            ],
            order: [
                [7, 'asc']
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
                            text: '<i class="ti ti-printer me-1" ></i>Cetak',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [3, 4, 5, 6, 7]
                            }
                        },
                        {
                            extend: 'csv',
                            text: '<i class="ti ti-file-text me-1" ></i>Csv',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [3, 4, 5, 6, 7]
                            }
                        },
                        {
                            extend: 'pdf',
                            text: '<i class="ti ti-file-description me-1"></i>Pdf',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [3, 4, 5, 6, 7]
                            }
                        },
                        {
                            extend: 'copy',
                            text: '<i class="ti ti-copy me-1" ></i>Salin',
                            className: 'dropdown-item',
                            exportOptions: {
                                columns: [3, 4, 5, 6, 7]
                            }
                        }
                    ]
                },
                {
                    <?php if ($level!=2) {?>
                    text: '<i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Tambah Karyawan</span>',
                    className: 'create-new btn btn-primary'
                    <?php }?>
                }
            ],
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
        $('div.head-label').html('<h5 class="card-title mb-0">Daftar Karyawan</h5>');
    }
});
</script>
<?= $this->endSection('pageJS'); ?>