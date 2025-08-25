<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style>
    .galeri-container {
        max-width: 1200px;
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

    .galeri-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-top: 1rem;
    }

    .galeri-item {
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .galeri-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .galeri-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .galeri-item:hover .galeri-image {
        transform: scale(1.05);
    }

    .galeri-content {
        padding: 1rem;
    }

    .galeri-title {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.5rem;
        font-size: 1rem;
    }

    .galeri-actions {
        display: flex;
        gap: 0.5rem;
        margin-top: 1rem;
    }

    /* Modern Buttons */
    .btn {
        border-radius: 50px;
        padding: 0.6rem 1.5rem;
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

    .btn-success {
        background: linear-gradient(135deg, var(--success-color), var(--accent-green));
        color: white;
    }

    .btn-warning {
        background: linear-gradient(135deg, var(--warning-color), var(--accent-orange));
        color: var(--text-primary);
    }

    .btn-danger {
        background: linear-gradient(135deg, var(--danger-color), #e55039);
        color: white;
    }

    .btn-sm {
        padding: 0.4rem 1rem;
        font-size: 0.85rem;
    }

    .btn-lg {
        padding: 1rem 2.5rem;
        font-size: 1.1rem;
    }

    .empty-state {
        text-align: center;
        padding: 3rem;
        color: #6c757d;
    }

    .empty-state i {
        font-size: 4rem;
        margin-bottom: 1rem;
        color: #dee2e6;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .galeri-grid {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
        }
        
        .galeri-card .card-body {
            padding: 1.5rem;
        }
        
        .btn {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }
    }

    @media (max-width: 576px) {
        .galeri-grid {
            grid-template-columns: 1fr;
        }
        
        .galeri-card .card-body {
            padding: 1rem;
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
                    <i class="fas fa-images"></i> Kelola Galeri
                </h1>
                <p class="mb-0 text-muted">Kelola foto-foto galeri barbershop</p>
            </div>
            <a href="<?= site_url('admin/galeri/create') ?>" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Galeri
            </a>
        </div>

        <!-- Galeri Card -->
        <div class="card galeri-card">
            <div class="card-header">
                <h5><i class="fas fa-images"></i> Daftar Galeri</h5>
            </div>
            <div class="card-body">
                <?php if (empty($galeri)): ?>
                    <div class="empty-state">
                        <i class="fas fa-images"></i>
                        <h5>Belum Ada Galeri</h5>
                        <p>Mulai tambahkan foto-foto galeri untuk menampilkan karya terbaik Anda.</p>
                        <a href="<?= site_url('admin/galeri/create') ?>" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Galeri Pertama
                        </a>
                    </div>
                <?php else: ?>
                    <div class="galeri-grid">
                        <?php foreach ($galeri as $item): ?>
                            <div class="galeri-item" data-aos="fade-up" data-aos-delay="150">
                                <img src="<?= base_url('uploads/galeri/' . $item['gambar']) ?>" 
                                     alt="<?= $item['nama'] ?>" 
                                     class="galeri-image"
                                     onerror="this.src='<?= base_url('assets/images/imgnotfound.jpg') ?>'">
                                <div class="galeri-content">
                                    <div class="galeri-title"><?= esc($item['nama']) ?></div>
                                    <div class="galeri-actions">
                                        <a href="<?= site_url('admin/galeri/edit/' . $item['id']) ?>" 
                                           class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <button type="button" 
                                                class="btn btn-danger btn-sm btn-delete" 
                                                data-id="<?= $item['id'] ?>" 
                                                data-nama="<?= esc($item['nama']) ?>">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        // Handle delete button
        $('.btn-delete').on('click', function() {
            const id = $(this).data('id');
            const nama = $(this).data('nama');

            Swal.fire({
                title: 'Hapus Galeri?',
                text: `Apakah Anda yakin ingin menghapus galeri "${nama}"?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading
                    Swal.fire({
                        title: 'Menghapus...',
                        text: 'Sedang menghapus galeri',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Send delete request
                    $.ajax({
                        url: `<?= site_url('admin/galeri/delete') ?>/${id}`,
                        type: 'DELETE',
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === 'success') {
                                Swal.fire({
                                    title: 'Berhasil!',
                                    text: response.message,
                                    icon: 'success',
                                    timer: 1500,
                                    showConfirmButton: false
                                }).then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: 'Gagal!',
                                    text: response.message,
                                    icon: 'error'
                                });
                            }
                        },
                        error: function() {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Terjadi kesalahan saat menghapus galeri',
                                icon: 'error'
                            });
                        }
                    });
                }
            });
        });

        // Show success message if exists
        <?php if (session()->getFlashdata('success')): ?>
            toastr.success('<?= session()->getFlashdata('success') ?>');
        <?php endif; ?>

        // Show error message if exists
        <?php if (session()->getFlashdata('error')): ?>
            toastr.error('<?= session()->getFlashdata('error') ?>');
        <?php endif; ?>
    });
</script>
<?= $this->endSection() ?>
