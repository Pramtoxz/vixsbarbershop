<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>
<!-- Page Header -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Manajemen Karyawan</h1>
        <p class="mb-0 text-black">Kelola semua karyawan dalam sistem</p>
    </div>
    <button type="button" class="btn btn-primary d-flex align-items-center" id="btnTambahKaryawan">
        <i class="bi bi-person-plus me-2"></i> Tambah Karyawan
    </button>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- Karyawan Table -->
                <div class="table-responsive">
                    <table class="table table-hover" id="karyawanTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Karyawan</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th>Email</th>
                                <th>Status User</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data will be loaded by DataTables AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Styles for this page -->
<style>
    /* Fix for modal backdrop */
    body.modal-open {
        overflow: hidden !important;
        padding-right: 0 !important;
    }

    .modal-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: rgba(44, 62, 80, 0.6) !important;
        backdrop-filter: blur(4px) !important;
        -webkit-backdrop-filter: blur(4px) !important;
        z-index: 1040 !important;
    }

    .modal-backdrop.show {
        opacity: 1 !important;
    }

    .modal {
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        z-index: 1060 !important;
        width: 100% !important;
        height: 100% !important;
        overflow-x: hidden !important;
        overflow-y: auto !important;
        outline: 0 !important;
    }

    .modal-dialog {
        margin: 1.75rem auto !important;
        max-width: 500px !important;
    }

    .modal-lg {
        max-width: 800px !important;
    }

    .modal-content {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.3) !important;
        border: none !important;
        border-radius: 0.5rem !important;
    }

    /* Responsive table styling */
    @media (max-width: 767.98px) {

        .table th,
        .table td {
            white-space: nowrap;
            padding: 0.5rem;
            font-size: 0.85rem;
        }

        #karyawanTable_wrapper .row:first-child,
        #karyawanTable_wrapper .row:last-child {
            margin-bottom: 1rem;
        }

        #karyawanTable_wrapper .dataTables_info,
        #karyawanTable_wrapper .dataTables_paginate {
            text-align: center !important;
            float: none !important;
            margin-top: 0.5rem;
        }

        .modal-dialog {
            margin: 0.75rem auto !important;
            max-width: calc(100% - 20px) !important;
        }

        .modal-lg {
            max-width: calc(100% - 20px) !important;
        }
    }

    /* Fix for Tampilkan X data */
    .dataTables_length {
        margin-bottom: 10px;
    }

    .dataTables_length select {
        min-width: 60px;
        padding: 0.35rem;
        border-radius: 0.25rem;
        margin: 0 5px;
        border-color: #dee2e6;
    }

    .dataTables_filter {
        margin-bottom: 10px;
    }

    @media (max-width: 767.98px) {

        .dataTables_length,
        .dataTables_filter {
            text-align: left !important;
            display: block;
            width: 100%;
        }
    }

    /* Action buttons in table */
    .btn-action {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
    }

    /* Badge styles */
    .badge {
        font-weight: 600;
        padding: 0.35rem 0.65rem;
    }

    /* User account section styling */
    .user-account-section {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        border-radius: 0.5rem;
        padding: 1.5rem;
        margin: 1rem 0;
        border: 1px solid #dee2e6;
    }

    .user-account-section h6 {
        color: #495057;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    /* Password field styling */
    .password-field {
        position: relative;
    }

    .password-toggle {
        position: absolute;
        right: 0;
        top: 0;
        height: 100%;
        border: none;
        background: transparent;
        padding: 0.375rem 0.75rem;
        z-index: 10;
    }

    .password-toggle:hover {
        background-color: #f8f9fa;
    }

    /* Form validation styling */
    .form-control.is-invalid {
        border-color: #dc3545;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
    }

    .invalid-feedback {
        display: block;
        font-size: 0.875rem;
        color: #dc3545;
    }
</style>


<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(function() {
        var table = $('#karyawanTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "<?= base_url('admin/karyawan/getKaryawan') ?>",
            columns: [{
                    data: null,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'idkaryawan'
                },
                {
                    data: 'namakaryawan'
                },
                {
                    data: 'jenkel',
                    render: function(data, type, row) {
                        if (data === 'L') {
                            return '<span class="badge bg-primary">Laki-laki</span>';
                        } else if (data === 'P') {
                            return '<span class="badge bg-info">Perempuan</span>';
                        } else {
                            return '<span class="badge bg-secondary">-</span>';
                        }
                    }
                },
                {
                    data: 'alamat'
                },
                {
                    data: 'nohp'
                },
                {
                    data: 'email',
                    render: function(data, type, row) {
                        return data || '<span class="text-muted">-</span>';
                    }
                },
                {
                    data: 'user_status',
                    render: function(data, type, row) {
                        if (data === 'active') {
                            return '<span class="badge bg-success">Aktif</span>';
                        } else if (data === 'inactive') {
                            return '<span class="badge bg-danger">Nonaktif</span>';
                        } else {
                            return '<span class="badge bg-warning">Belum Ada Akun</span>';
                        }
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return '<div class="d-flex gap-1">' +
                            '<button class="btn btn-sm btn-info btn-action edit-btn" data-id="' + row.idkaryawan + '"><i class="bi bi-pencil-square"></i></button>' +
                            '<button class="btn btn-sm btn-danger btn-action delete-btn" data-id="' + row.idkaryawan + '"><i class="bi bi-trash3-fill"></i></button>' +
                            '</div>';
                    }
                }
            ],
            responsive: true,
            dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data per halaman",
                zeroRecords: "Tidak ada data yang ditemukan",
                info: "Menampilkan _START_ hingga _END_ dari _TOTAL_ data",
                infoEmpty: "Tidak ada data yang tersedia",
                infoFiltered: "(difilter dari _MAX_ total data)",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Selanjutnya",
                    previous: "Sebelumnya"
                }
            }
        });

        // Reset form when modal is closed
        $('#modalKaryawan').on('hidden.bs.modal', function() {
            resetForm();
        });

        // Fix modal backdrop issue
        $('.modal').on('shown.bs.modal', function() {
            $('body').addClass('modal-open');
            if ($('.modal-backdrop').length === 0) {
                $('body').append('<div class="modal-backdrop show"></div>');
            }
        });

        $('.modal').on('hidden.bs.modal', function() {
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        });

        // Ensure modals are properly handled on page load
        $(window).on('load', function() {
            // Check if any modals are open and make sure backdrop is fixed
            if ($('.modal.show').length > 0) {
                $('body').addClass('modal-open');
                if ($('.modal-backdrop').length === 0) {
                    $('body').append('<div class="modal-backdrop show"></div>');
                }
            }
        });

        // Reset form errors
        function resetForm() {
            $('#formKaryawan')[0].reset();
            $('.is-invalid').removeClass('is-invalid');
            $('.invalid-feedback').empty();
            $('#generalError').hide().find('ul').empty();

            // Reset password fields for new karyawan
            $('#password').prop('required', true);
            $('#confirm_password').prop('required', true);
            $('#password').attr('placeholder', 'Password');
            $('#confirm_password').attr('placeholder', 'Konfirmasi Password');
        }

        // Display validation errors
        function showErrors(errors) {

            if (typeof errors === 'object' && errors !== null) {
                let hasFieldErrors = false;
                let generalErrors = [];

                $.each(errors, function(field, message) {
                    const $field = $('#' + field);
                    if ($field.length) {
                        $field.addClass('is-invalid');
                        $('#' + field + 'Error').text(message);
                        hasFieldErrors = true;
                    } else {
                        generalErrors.push(message);
                    }
                });

                if (generalErrors.length > 0) {
                    const $generalError = $('#generalError');
                    const $errorList = $generalError.find('ul');
                    generalErrors.forEach(function(error) {
                        $errorList.append('<li>' + error + '</li>');
                    });
                    $generalError.show();
                }
            } else if (typeof errors === 'string') {
                $('#generalError').show().find('ul').append('<li>' + errors + '</li>');
            }
        }

        // Tambah Karyawan
        $('#btnTambahKaryawan').on('click', function() {
            resetForm();
            $('#modalKaryawanLabel').text('Tambah Karyawan');
            $('#formMode').val('add');

            // Get new ID
            $.ajax({
                url: '<?= base_url('admin/karyawan/getNewId') ?>',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#idkaryawan').val(response.idkaryawan);
                    $('#modalKaryawan').modal('show');
                },
                error: function() {
                    Swal.fire({
                        title: 'Error',
                        text: 'Gagal mendapatkan ID baru',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });

        // Edit Karyawan
        $(document).on('click', '.edit-btn', function() {
            resetForm();
            var id = $(this).data('id');

            $('#modalKaryawanLabel').text('Edit Karyawan');
            $('#formMode').val('edit');

            $.ajax({
                url: `<?= base_url('admin/karyawan/getById') ?>/${id}`,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        var data = response.data;
                        $('#idkaryawan').val(data.idkaryawan);
                        $('#namakaryawan').val(data.namakaryawan);
                        $('#jenkel').val(data.jenkel);
                        $('#alamat').val(data.alamat);
                        $('#nohp').val(data.nohp);

                        // Handle user account fields
                        if (data.email) {
                            $('#email').val(data.email);
                            $('#password').prop('required', false);
                            $('#confirm_password').prop('required', false);
                            $('#password').attr('placeholder', 'Kosongkan jika tidak ingin mengubah password');
                            $('#confirm_password').attr('placeholder', 'Kosongkan jika tidak ingin mengubah password');
                            $('#email').prop('readonly', false);
                        } else {
                            $('#email').val('');
                            $('#password').prop('required', true);
                            $('#confirm_password').prop('required', true);
                            $('#password').attr('placeholder', 'Password');
                            $('#confirm_password').attr('placeholder', 'Konfirmasi Password');
                            $('#email').prop('readonly', false);
                        }

                        $('#modalKaryawan').modal('show');
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: response.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        title: 'Error',
                        text: 'Gagal mengambil data karyawan',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });

        // Form Submit (Add & Edit)
        $('#btnSimpan').on('click', function() {
            // Disable button and show loading state
            $(this).prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Menyimpan...');

            var formData = $('#formKaryawan').serialize();
            var mode = $('#formMode').val();
            var id = $('#idkaryawan').val();
            var url = mode === 'add' ?
                '<?= base_url('admin/karyawan/store') ?>' :
                `<?= base_url('admin/karyawan/update') ?>/${id}`;

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        $('#modalKaryawan').modal('hide');
                        Swal.fire({
                            title: 'Berhasil!',
                            text: response.message,
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        });
                        table.ajax.reload();
                    } else {
                        showErrors(response.errors);
                    }
                },
                error: function(xhr) {
                    var response = xhr.responseJSON;
                    if (response && response.errors) {
                        showErrors(response.errors);
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: 'Terjadi kesalahan saat menyimpan data',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                complete: function() {
                    // Re-enable button and restore label
                    $('#btnSimpan').prop('disabled', false).html('<i class="bi bi-save me-1"></i> Simpan');
                }
            });
        });

        // Delete Karyawan - Show confirmation modal
        $(document).on('click', '.delete-btn', function() {
            var id = $(this).data('id');
            $('#deleteKaryawanId').val(id);
            $('#deleteModal').modal('show');
        });

        // Confirm Delete Karyawan
        $('#btnConfirmDelete').on('click', function() {
            // Disable button and show loading state
            $(this).attr('disabled', true);
            $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Menghapus...');

            var id = $('#deleteKaryawanId').val();

            $.ajax({
                url: `<?= base_url('admin/karyawan/delete') ?>/${id}`,
                type: 'DELETE',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        $('#deleteModal').modal('hide');
                        Swal.fire({
                            title: 'Sukses',
                            text: response.message,
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        });
                        table.ajax.reload();
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: response.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        title: 'Error',
                        text: 'Terjadi kesalahan pada server',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                },
                complete: function() {
                    // Re-enable button and restore label
                    $('#btnConfirmDelete').attr('disabled', false);
                    $('#btnConfirmDelete').html('<i class="bi bi-trash3-fill me-1"></i> Hapus');
                }
            });
        });

        // Improve DataTable responsiveness
        $(window).on('resize', function() {
            if ($(window).width() < 768) {
                $('.dataTables_length select').addClass('form-select-sm');
            } else {
                $('.dataTables_length select').removeClass('form-select-sm');
            }
        }).trigger('resize');

        // Password toggle functionality
        $('#togglePassword').on('click', function() {
            const passwordField = $('#password');
            const icon = $(this).find('i');

            if (passwordField.attr('type') === 'password') {
                passwordField.attr('type', 'text');
                icon.removeClass('bi-eye').addClass('bi-eye-slash');
            } else {
                passwordField.attr('type', 'password');
                icon.removeClass('bi-eye-slash').addClass('bi-eye');
            }
        });

        $('#toggleConfirmPassword').on('click', function() {
            const confirmPasswordField = $('#confirm_password');
            const icon = $(this).find('i');

            if (confirmPasswordField.attr('type') === 'password') {
                confirmPasswordField.attr('type', 'text');
                icon.removeClass('bi-eye').addClass('bi-eye-slash');
            } else {
                confirmPasswordField.attr('type', 'password');
                icon.removeClass('bi-eye-slash').addClass('bi-eye');
            }
        });

        // Password confirmation validation
        $('#confirm_password').on('input', function() {
            const password = $('#password').val();
            const confirmPassword = $(this).val();

            if (confirmPassword && password !== confirmPassword) {
                $(this).addClass('is-invalid');
                $('#confirm_passwordError').text('Konfirmasi password tidak cocok');
            } else {
                $(this).removeClass('is-invalid');
                $('#confirm_passwordError').text('');
            }
        });

        $('#password').on('input', function() {
            const password = $(this).val();
            const confirmPassword = $('#confirm_password').val();

            if (confirmPassword && password !== confirmPassword) {
                $('#confirm_password').addClass('is-invalid');
                $('#confirm_passwordError').text('Konfirmasi password tidak cocok');
            } else {
                $('#confirm_password').removeClass('is-invalid');
                $('#confirm_passwordError').text('');
            }
        });
    });
</script>

<!-- Modal Tambah/Edit Karyawan -->
<div class="modal fade" id="modalKaryawan" tabindex="-1" aria-labelledby="modalKaryawanLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary text-white">
                <h5 class="modal-title" id="modalKaryawanLabel">Tambah Karyawan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formKaryawan">
                    <!-- Alert untuk error umum -->
                    <div id="generalError" class="alert alert-danger" style="display: none;">
                        <ul class="mb-0"></ul>
                    </div>

                    <input type="hidden" id="formMode" value="add">

                    <div class="row mb-3">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="idkaryawan" class="form-label">ID Karyawan</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="bi bi-upc"></i></span>
                                <input type="text" class="form-control" id="idkaryawan" name="idkaryawan" readonly>
                                <div class="invalid-feedback" id="idkaryawanError"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="namakaryawan" class="form-label">Nama Karyawan <span class="text-danger">*</span></label>
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" class="form-control" id="namakaryawan" name="namakaryawan" required>
                                <div class="invalid-feedback" id="namakaryawanError"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label for="jenkel" class="form-label">Jenis Kelamin</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                                <select class="form-control" id="jenkel" name="jenkel">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                                <div class="invalid-feedback" id="jenkelError"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="nohp" class="form-label">No HP</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="bi bi-phone"></i></span>
                                <input type="text" class="form-control" id="nohp" name="nohp">
                                <div class="invalid-feedback" id="nohpError"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="alamat" class="form-label">Alamat</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                                <div class="invalid-feedback" id="alamatError"></div>
                            </div>
                        </div>
                    </div>

                    <!-- User Account Section -->
                    <div class="user-account-section">
                        <h6 class="text-primary mb-3">
                            <i class="bi bi-person-badge me-2"></i>Informasi Akun User
                        </h6>

                        <div class="row mb-3">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    <div class="invalid-feedback" id="emailError"></div>
                                </div>
                                <small class="form-text text-muted">Email akan digunakan sebagai username untuk login</small>
                            </div>
                            <div class="col-md-6">
                                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <div class="invalid-feedback" id="passwordError"></div>
                                </div>
                                <small class="form-text text-muted">Minimal 6 karakter</small>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="confirm_password" class="form-label">Konfirmasi Password <span class="text-danger">*</span></label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                    <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <div class="invalid-feedback" id="confirm_passwordError"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btnSimpan">
                    <i class="bi bi-save me-1"></i> Simpan
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <i class="bi bi-exclamation-triangle-fill text-danger" style="font-size: 3rem;"></i>
                </div>
                <p class="text-center fs-5">Apakah Anda yakin ingin menghapus karyawan ini?</p>
                <p class="text-center text-secondary">Tindakan ini tidak dapat dibatalkan dan semua data terkait akan dihapus secara permanen.</p>
                <input type="hidden" id="deleteKaryawanId">
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x me-1"></i> Batal
                </button>
                <button type="button" class="btn btn-danger" id="btnConfirmDelete">
                    <i class="bi bi-trash3-fill me-1"></i> Hapus
                </button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>