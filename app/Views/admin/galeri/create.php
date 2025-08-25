<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style>
    .galeri-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .galeri-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        border: 1px solid #f0f0f0;
        margin-bottom: 2rem;
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .galeri-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
    }

    .galeri-card .card-header {
        background: linear-gradient(135deg, var(--secondary-color) 0%, var(--accent-purple) 100%);
        border-bottom: none;
        padding: 1.5rem 2rem;
        position: relative;
        color: white;
    }

    .galeri-card .card-header h5 {
        margin: 0;
        color: white;
        font-weight: 700;
        font-size: 1.2rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .galeri-card .card-body {
        padding: 2rem;
    }

    /* Modern Form Controls */
    .form-control, .form-select {
        border: 2px solid #e9ecef;
        border-radius: 15px;
        padding: 0.8rem 1.2rem;
        transition: all 0.3s ease;
        background: white;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--secondary-color);
        box-shadow: 0 4px 20px var(--secondary-light);
        transform: translateY(-2px);
    }

    .form-label {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.8rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* File Upload Styling */
    .file-upload-wrapper {
        position: relative;
        display: block;
        cursor: pointer;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border: 2px dashed var(--secondary-color);
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        transition: all 0.3s ease;
    }

    .file-upload-wrapper:hover {
        background: linear-gradient(135deg, var(--light-color) 0%, var(--light-gray) 100%);
        border-color: var(--accent-purple);
        transform: translateY(-2px);
    }

    .file-upload-wrapper.dragover {
        background: var(--secondary-light);
        border-color: var(--secondary-color);
    }

    .file-upload-input {
        position: absolute;
        opacity: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    .file-upload-content {
        pointer-events: none;
    }

    .file-upload-icon {
        font-size: 3rem;
        color: var(--secondary-color);
        margin-bottom: 1rem;
    }

    .file-upload-text {
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .file-upload-info {
        color: #6c757d;
        font-size: 0.9rem;
    }

    .image-preview {
        display: none;
        max-width: 100%;
        max-height: 300px;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin-top: 1rem;
    }

    /* Modern Buttons */
    .btn {
        border-radius: 50px;
        padding: 0.8rem 2rem;
        font-weight: 600;
        border: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
    }

    .btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .btn:hover::before {
        left: 100%;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--secondary-color), var(--accent-purple));
        color: white;
    }

    .btn-secondary {
        background: linear-gradient(135deg, #6c757d 0%, #adb5bd 100%);
        color: white;
    }

    .btn-lg {
        padding: 1rem 2.5rem;
        font-size: 1.1rem;
    }

    /* Alert Styling */
    .alert {
        border-radius: 15px;
        border: none;
        padding: 1rem 1.5rem;
        margin-bottom: 1rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .alert-danger {
        background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
        color: #721c24;
        border-left: 4px solid #dc3545;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .galeri-card .card-body {
            padding: 1.5rem;
        }
        
        .btn {
            padding: 0.6rem 1.5rem;
            font-size: 0.9rem;
        }
        
        .file-upload-wrapper {
            padding: 1.5rem;
        }
    }

    @media (max-width: 576px) {
        .galeri-card .card-body {
            padding: 1rem;
        }
        
        .file-upload-wrapper {
            padding: 1rem;
        }
        
        .file-upload-icon {
            font-size: 2rem;
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="galeri-container">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-plus-circle"></i> Tambah Galeri
                </h1>
                <p class="mb-0 text-muted">Tambahkan foto baru ke galeri</p>
            </div>
            <a href="<?= site_url('admin/galeri') ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <!-- Form Card -->
        <div class="card galeri-card">
            <div class="card-header">
                <h5><i class="fas fa-plus-circle"></i> Form Tambah Galeri</h5>
            </div>
            <div class="card-body">
                <form id="galeriForm" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label for="nama" class="form-label">
                                    <i class="fas fa-tag"></i> Nama Galeri
                                </label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama galeri" required>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">
                                    <i class="fas fa-image"></i> Gambar
                                </label>
                                <div class="file-upload-wrapper" id="fileUploadWrapper">
                                    <input type="file" class="file-upload-input" id="gambar" name="gambar" accept="image/*" required>
                                    <div class="file-upload-content">
                                        <i class="fas fa-cloud-upload-alt file-upload-icon"></i>
                                        <div class="file-upload-text">Klik atau drag & drop gambar di sini</div>
                                        <div class="file-upload-info">Format: JPG, JPEG, PNG | Maksimal: 2MB</div>
                                    </div>
                                </div>
                                <img id="imagePreview" class="image-preview" alt="Preview">
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="d-flex gap-3 justify-content-end">
                                <a href="<?= site_url('admin/galeri') ?>" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-primary" id="btnSubmit">
                                    <i class="fas fa-save"></i> Simpan Galeri
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(document).ready(function() {
        // Setup toastr options
        toastr.options = {
            closeButton: true,
            newestOnTop: true,
            progressBar: true,
            positionClass: "toast-top-right",
            preventDuplicates: false,
            showDuration: "300",
            hideDuration: "1000",
            timeOut: "5000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut"
        };

        // File upload handling
        const fileInput = $('#gambar');
        const uploadWrapper = $('#fileUploadWrapper');
        const imagePreview = $('#imagePreview');

        fileInput.on('change', function() {
            const file = this.files[0];
            if (file) {
                // Validate file type
                if (!file.type.match('image.*')) {
                    toastr.error('File harus berupa gambar');
                    return;
                }

                // Validate file size (2MB)
                if (file.size > 2 * 1024 * 1024) {
                    toastr.error('Ukuran file maksimal 2MB');
                    return;
                }

                // Show preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.attr('src', e.target.result).show();
                    uploadWrapper.find('.file-upload-content').hide();
                };
                reader.readAsDataURL(file);
            }
        });

        // Drag and drop functionality
        uploadWrapper.on('dragover', function(e) {
            e.preventDefault();
            $(this).addClass('dragover');
        });

        uploadWrapper.on('dragleave', function(e) {
            e.preventDefault();
            $(this).removeClass('dragover');
        });

        uploadWrapper.on('drop', function(e) {
            e.preventDefault();
            $(this).removeClass('dragover');
            
            const files = e.originalEvent.dataTransfer.files;
            if (files.length > 0) {
                fileInput[0].files = files;
                fileInput.trigger('change');
            }
        });

        // Form submission
        $('#galeriForm').on('submit', function(e) {
            e.preventDefault();

            // Clear previous errors
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback').text('');

            // Validate form
            const nama = $('#nama').val().trim();
            const gambar = $('#gambar')[0].files[0];

            let isValid = true;

            if (!nama) {
                $('#nama').addClass('is-invalid');
                $('#nama').next('.invalid-feedback').text('Nama galeri harus diisi');
                isValid = false;
            }

            if (!gambar) {
                $('#gambar').addClass('is-invalid');
                $('#gambar').closest('.mb-4').find('.invalid-feedback').text('Gambar harus dipilih');
                isValid = false;
            }

            if (!isValid) {
                toastr.error('Mohon lengkapi form dengan benar');
                return;
            }

            // Disable submit button
            $('#btnSubmit').prop('disabled', true).html(`
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Menyimpan...
            `);

            // Create FormData
            const formData = new FormData(this);

            // Submit form
            $.ajax({
                url: '<?= site_url('admin/galeri/store') ?>',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        toastr.success(response.message);
                        setTimeout(function() {
                            window.location.href = '<?= site_url('admin/galeri') ?>';
                        }, 1500);
                    } else {
                        toastr.error(response.message);
                        
                        // Show field errors
                        if (response.errors) {
                            $.each(response.errors, function(field, message) {
                                $('#' + field).addClass('is-invalid');
                                $('#' + field).next('.invalid-feedback').text(message);
                            });
                        }
                        
                        $('#btnSubmit').prop('disabled', false).html('<i class="fas fa-save"></i> Simpan Galeri');
                    }
                },
                error: function() {
                    toastr.error('Terjadi kesalahan saat menyimpan data');
                    $('#btnSubmit').prop('disabled', false).html('<i class="fas fa-save"></i> Simpan Galeri');
                }
            });
        });
    });
</script>
<?= $this->endSection() ?>
