<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<section class="hero-simple" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 6rem 0 4rem; position: relative; overflow: hidden;">
    <!-- Decorative Elements -->
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: url('data:image/svg+xml,%3Csvg width=\'40\' height=\'40\' viewBox=\'0 0 40 40\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.03\'%3E%3Ccircle cx=\'10\' cy=\'10\' r=\'2\'/%3E%3Ccircle cx=\'30\' cy=\'30\' r=\'2\'/%3E%3Ccircle cx=\'30\' cy=\'10\' r=\'1\'/%3E%3Ccircle cx=\'10\' cy=\'30\' r=\'1\'/%3E%3C/g%3E%3C/svg%3E') repeat;"></div>
    
    <div class="container">
        <div class="text-center text-white">
            <h1 class="section-title" style="color: white; font-size: 2.5rem; margin-bottom: 1rem; font-weight: 700;">
                📋 Riwayat Booking Anda
            </h1>
            <p class="section-description" style="color: rgba(255, 255, 255, 0.9); font-size: 1.125rem; max-width: 600px; margin: 0 auto 2rem;">
                Kelola semua booking Anda dengan mudah dan lacak status layanan yang telah Anda pesan
            </p>
            <a href="<?= site_url('customer/booking/create') ?>" class="btn btn-primary btn-enhanced" style="background: var(--accent-color); color: var(--text-primary); padding: 1rem 2rem; border-radius: 50px;">
                <span class="btn-text">✨ Booking Baru</span>
                <svg class="btn-icon" style="width: 20px; height: 20px; margin-left: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                <span class="btn-shine"></span>
            </a>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="section-padding">
    <div class="container">
        <div class="card animate-fade-in-up" style="max-width: none; padding: 2rem;">
            <?php if (empty($bookings)) : ?>
                <div id="empty-state" class="text-center" style="padding: 4rem 0;">
                    <div style="max-width: 400px; margin: 0 auto;">
                        <svg style="width: 120px; height: 120px; margin: 0 auto 2rem auto; color: var(--gray-300);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                        </svg>
                        <h3 style="font-size: 1.75rem; font-weight: 600; color: var(--text-primary); margin-bottom: 1rem;">
                            📋 Belum Ada Booking
                        </h3>
                        <p style="color: var(--text-secondary); margin-bottom: 2rem; font-size: 1.125rem;">
                            Anda belum memiliki riwayat booking. Mari mulai dengan membuat booking pertama Anda!
                        </p>
                        <a href="<?= site_url('customer/booking/create') ?>" class="btn btn-primary btn-enhanced">
                            <span class="btn-text">✨ Buat Booking Sekarang</span>
                            <svg class="btn-icon" style="width: 20px; height: 20px; margin-left: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            <span class="btn-shine"></span>
                        </a>
                    </div>
                </div>
            <?php else : ?>
                <div style="margin-bottom: 2rem;">
                    <h2 style="font-size: 1.5rem; font-weight: 600; color: var(--text-primary); margin-bottom: 0.5rem;">
                        📊 Riwayat Booking Anda
                    </h2>
                    <p style="color: var(--text-secondary);">
                        Berikut adalah daftar semua booking yang pernah Anda lakukan
                    </p>
                </div>
                
                <div class="table-container" style="overflow-x: auto; border-radius: 1rem; border: 1px solid var(--gray-200);">
                    <table class="modern-table" id="booking-table" style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="background: linear-gradient(135deg, var(--gray-50), var(--gray-100));">
                                <th style="padding: 1rem; text-align: left; font-weight: 600; color: var(--text-primary); border-bottom: 2px solid var(--gray-200);">📋 No. Booking</th>
                                <th style="padding: 1rem; text-align: left; font-weight: 600; color: var(--text-primary); border-bottom: 2px solid var(--gray-200);">📅 Tanggal</th>
                                <th style="padding: 1rem; text-align: left; font-weight: 600; color: var(--text-primary); border-bottom: 2px solid var(--gray-200);">💇‍♂️ Layanan</th>
                                <th style="padding: 1rem; text-align: left; font-weight: 600; color: var(--text-primary); border-bottom: 2px solid var(--gray-200);">📊 Status</th>
                                <th style="padding: 1rem; text-align: left; font-weight: 600; color: var(--text-primary); border-bottom: 2px solid var(--gray-200);">💰 Total</th>
                                <th style="padding: 1rem; text-align: center; font-weight: 600; color: var(--text-primary); border-bottom: 2px solid var(--gray-200);">⚡ Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($bookings as $booking) : ?>
                                <tr style="border-bottom: 1px solid var(--gray-200); transition: all 0.3s ease;" 
                                    onmouseover="this.style.background='var(--gray-50)'" 
                                    onmouseout="this.style.background='transparent'">
                                    <td style="padding: 1rem;">
                                        <div style="font-weight: 600; color: var(--primary-color); font-size: 0.875rem;">
                                            <?= $booking['kdbooking'] ?>
                                        </div>
                                    </td>
                                    <td style="padding: 1rem;">
                                        <div style="font-weight: 500; color: var(--text-primary); margin-bottom: 0.25rem;">
                                            <?= date('d M Y', strtotime($booking['tanggal_booking'])) ?>
                                        </div>
                                        <div style="font-size: 0.75rem; color: var(--text-secondary);">
                                            🕐 <?= $booking['jamstart'] ?? '-' ?> - <?= $booking['jamend'] ?? '-' ?>
                                        </div>
                                    </td>
                                    <td style="padding: 1rem;">
                                        <div style="font-weight: 500; color: var(--text-primary); margin-bottom: 0.25rem;">
                                            <?= $booking['nama_paket'] ?? 'Paket tidak ditemukan' ?>
                                        </div>
                                        <div style="font-size: 0.75rem; color: var(--text-secondary);">
                                            👨‍💼 <?= $booking['namakaryawan'] ?? 'Belum ditentukan' ?>
                                        </div>
                                    </td>
                                    <td style="padding: 1rem;">
                                        <?php
                                        $statusStyle = '';
                                        $statusEmoji = '';
                                        switch ($booking['status']) {
                                            case 'pending':
                                                $statusStyle = 'background: linear-gradient(135deg, #FEF3C7, #FDE68A); color: #92400E; border: 1px solid #F59E0B;';
                                                $statusEmoji = '⏳';
                                                break;
                                            case 'confirmed':
                                                $statusStyle = 'background: linear-gradient(135deg, #DBEAFE, #BFDBFE); color: #1E40AF; border: 1px solid #3B82F6;';
                                                $statusEmoji = '✅';
                                                break;
                                            case 'completed':
                                                $statusStyle = 'background: linear-gradient(135deg, #D1FAE5, #A7F3D0); color: #065F46; border: 1px solid #10B981;';
                                                $statusEmoji = '🎉';
                                                break;
                                            case 'cancelled':
                                                $statusStyle = 'background: linear-gradient(135deg, #FEE2E2, #FECACA); color: #991B1B; border: 1px solid #EF4444;';
                                                $statusEmoji = '❌';
                                                break;
                                            case 'expired':
                                                $statusStyle = 'background: linear-gradient(135deg, #FEE2E2, #FECACA); color: #991B1B; border: 1px solid #EF4444;';
                                                $statusEmoji = '⏰';
                                                break;
                                            case 'no-show':
                                                $statusStyle = 'background: linear-gradient(135deg, #F3F4F6, #E5E7EB); color: #374151; border: 1px solid #6B7280;';
                                                $statusEmoji = '👻';
                                                break;
                                            case 'rejected':
                                                $statusStyle = 'background: linear-gradient(135deg, #FCE7F3, #FBCFE8); color: #BE185D; border: 1px solid #EC4899;';
                                                $statusEmoji = '🚫';
                                                break;
                                            default:
                                                $statusStyle = 'background: linear-gradient(135deg, #F3F4F6, #E5E7EB); color: #374151; border: 1px solid #6B7280;';
                                                $statusEmoji = '❓';
                                        }
                                        ?>
                                        <div style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.5rem 1rem; border-radius: 50px; font-size: 0.75rem; font-weight: 600; <?= $statusStyle ?>">
                                            <span><?= $statusEmoji ?></span>
                                            <span><?= $booking['status_text'] ?></span>
                                        </div>
                                    </td>
                                    <td style="padding: 1rem;">
                                        <div style="font-weight: 700; color: var(--primary-color); font-size: 1rem;">
                                            <?= $booking['total_formatted'] ?>
                                        </div>
                                    </td>
                                    <td style="padding: 1rem; text-align: center;">
                                        <a href="<?= site_url('customer/booking/detail/' . $booking['kdbooking']) ?>"
                                           class="btn btn-primary" 
                                           style="padding: 0.5rem 1rem; font-size: 0.75rem; border-radius: 50px; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem;">
                                            <span>👁️ Detail</span>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>

            <!-- Status Information -->
            <div style="margin-top: 3rem; padding: 2rem; background: linear-gradient(135deg, var(--gray-50), var(--white)); border-radius: 1rem; border: 1px solid var(--gray-200);">
                <h3 style="font-size: 1.25rem; font-weight: 600; color: var(--text-primary); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                    📚 Informasi Status Booking
                </h3>
                <div style="display: grid; gap: 1rem; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));">
                    <div style="display: flex; align-items: center; gap: 1rem; padding: 0.75rem;">
                        <div style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.5rem 1rem; border-radius: 50px; font-size: 0.75rem; font-weight: 600; background: linear-gradient(135deg, #FEF3C7, #FDE68A); color: #92400E; border: 1px solid #F59E0B;">
                            <span>⏳</span><span>Menunggu Konfirmasi</span>
                        </div>
                        <span style="color: var(--text-secondary); font-size: 0.875rem;">Booking sedang menunggu konfirmasi</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 1rem; padding: 0.75rem;">
                        <div style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.5rem 1rem; border-radius: 50px; font-size: 0.75rem; font-weight: 600; background: linear-gradient(135deg, #DBEAFE, #BFDBFE); color: #1E40AF; border: 1px solid #3B82F6;">
                            <span>✅</span><span>Terkonfirmasi</span>
                        </div>
                        <span style="color: var(--text-secondary); font-size: 0.875rem;">Booking telah dikonfirmasi</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 1rem; padding: 0.75rem;">
                        <div style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.5rem 1rem; border-radius: 50px; font-size: 0.75rem; font-weight: 600; background: linear-gradient(135deg, #D1FAE5, #A7F3D0); color: #065F46; border: 1px solid #10B981;">
                            <span>🎉</span><span>Selesai</span>
                        </div>
                        <span style="color: var(--text-secondary); font-size: 0.875rem;">Layanan telah selesai diberikan</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 1rem; padding: 0.75rem;">
                        <div style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.5rem 1rem; border-radius: 50px; font-size: 0.75rem; font-weight: 600; background: linear-gradient(135deg, #FEE2E2, #FECACA); color: #991B1B; border: 1px solid #EF4444;">
                            <span>❌</span><span>Dibatalkan</span>
                        </div>
                        <span style="color: var(--text-secondary); font-size: 0.875rem;">Booking telah dibatalkan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inisialisasi DataTables untuk tabel booking
        const bookingTable = $('#booking-table').DataTable({
            processing: true,
            serverSide: false, // Ubah ke false karena kita sudah memuat data dari server
            paging: true,
            searching: true,
            ordering: true,
            info: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json'
            },
            responsive: true,
            autoWidth: false,
            order: [
                [1, 'desc']
            ] // Urutkan berdasarkan kolom tanggal (indeks 1) secara descending
        });

        // Periksa booking yang expired setiap 30 detik
        function checkExpiredBookings() {
            fetch('<?= site_url('cron/check-expired-bookings') ?>?key=awanbarbershop_secret_key', {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success' && data.processed > 0) {
                        console.log('Berhasil memperbarui ' + data.processed + ' booking yang expired');
                        // Reload halaman jika ada booking yang diperbarui
                        window.location.reload();
                    }
                })
                .catch(error => {
                    console.error('Error checking expired bookings:', error);
                });
        }

        // Jalankan pemeriksaan saat halaman dimuat
        checkExpiredBookings();

        // Jalankan pemeriksaan setiap 30 detik
        setInterval(checkExpiredBookings, 30000);
    });
</script>
<?= $this->endSection() ?>