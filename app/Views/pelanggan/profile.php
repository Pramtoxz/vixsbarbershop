<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>
<!-- Hero Section -->
<section class="hero-simple" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 6rem 0 4rem; position: relative; overflow: hidden;">
    <!-- Decorative Elements -->
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: url('data:image/svg+xml,%3Csvg width=\'40\' height=\'40\' viewBox=\'0 0 40 40\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.03\'%3E%3Ccircle cx=\'10\' cy=\'10\' r=\'2\'/%3E%3Ccircle cx=\'30\' cy=\'30\' r=\'2\'/%3E%3Ccircle cx=\'30\' cy=\'10\' r=\'1\'/%3E%3Ccircle cx=\'10\' cy=\'30\' r=\'1\'/%3E%3C/g%3E%3C/svg%3E') repeat;"></div>
    
    <div class="container">
        <div class="text-center text-white">
            <h1 class="section-title" style="color: white; font-size: 2.5rem; margin-bottom: 1rem; font-weight: 700;">
                👤 Profil Saya
            </h1>
            <p class="section-description" style="color: rgba(255, 255, 255, 0.9); font-size: 1.125rem; max-width: 600px; margin: 0 auto 2rem;">
                Kelola informasi profil dan data pribadi Anda dengan mudah
            </p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="section-padding">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr; gap: 2rem;">
            <!-- Profile Cards Grid -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 2rem;">
                <!-- Profile Card -->
                <div class="card animate-fade-in-up" style="padding: 2rem; text-align: center;">
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        <!-- Avatar with modern styling -->
                        <div style="width: 150px; height: 150px; margin-bottom: 1.5rem; position: relative;">
                            <div style="width: 100%; height: 100%; border-radius: 50%; background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); padding: 4px; box-shadow: 0 8px 25px rgba(0,0,0,0.15);">
                                <div style="width: 100%; height: 100%; border-radius: 50%; overflow: hidden; background: white;">
                                    <img src="<?= base_url('assets/images/default-avatar.jpg') ?>" alt="Foto Profil"
                                        style="width: 100%; height: 100%; object-fit: cover;"
                                        onerror="this.src='https://ui-avatars.com/api/?name=<?= urlencode($pelanggan['nama_lengkap']) ?>&background=667eea&color=fff&size=256'">
                                </div>
                            </div>
                            <!-- Online indicator -->
                            <div style="position: absolute; bottom: 10px; right: 10px; width: 20px; height: 20px; background: var(--success-color); border: 3px solid white; border-radius: 50%; box-shadow: 0 2px 8px rgba(0,0,0,0.15);"></div>
                        </div>
                        
                        <h2 style="font-size: 1.5rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.5rem;" id="profile-name">
                            <?= $pelanggan['nama_lengkap'] ?>
                        </h2>
                        
                        <div style="background: linear-gradient(135deg, var(--gray-100), var(--gray-50)); padding: 0.75rem 1.5rem; border-radius: 50px; margin-bottom: 1rem;">
                            <p style="color: var(--text-secondary); margin: 0; font-size: 0.875rem; font-weight: 500;">
                                🆔 <?= isset($pelanggan['idpelanggan']) ? $pelanggan['idpelanggan'] : 'Belum tersedia' ?>
                            </p>
                        </div>
                        
                        <p style="color: var(--text-secondary); margin-bottom: 2rem; font-size: 0.875rem;">
                            📅 Member sejak: <strong><?= date('d F Y', strtotime($pelanggan['created_at'])) ?></strong>
                        </p>

                        <!-- Action Buttons -->
                        <div style="display: flex; flex-direction: column; gap: 1rem; width: 100%;">
                            <a href="<?= base_url('customer/booking') ?>" class="btn btn-primary btn-enhanced" style="text-decoration: none; padding: 1rem 2rem; border-radius: 50px;">
                                <span class="btn-text">📋 Riwayat Booking</span>
                                <span class="btn-shine"></span>
                            </a>
                            <a href="<?= base_url('customer/change-password') ?>" class="btn btn-outline" style="text-decoration: none; padding: 1rem 2rem; border-radius: 50px;">
                                <span>🔒 Ubah Password</span>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Profile Form -->
                <div class="card animate-fade-in-up" style="padding: 2rem;">
                    <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem; padding-bottom: 1rem; border-bottom: 2px solid var(--gray-200);">
                        <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--accent-color), #FFD23F); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <svg style="width: 24px; height: 24px; color: var(--text-primary);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <h3 style="font-size: 1.5rem; font-weight: 600; color: var(--text-primary);">
                            📝 Informasi Pribadi
                        </h3>
                    </div>

                    <!-- Alert Messages -->
                    <div id="alert-success" style="display: none; margin-bottom: 2rem; padding: 1.5rem; background: linear-gradient(135deg, #D1FAE5, #A7F3D0); border: 1px solid #10B981; border-radius: 1rem;" role="alert">
                        <div style="display: flex; align-items: center; gap: 1rem;">
                            <div style="width: 40px; height: 40px; background: #065F46; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <svg style="width: 20px; height: 20px; color: #D1FAE5;" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <h4 style="font-weight: 600; color: #065F46; margin-bottom: 0.25rem;">✅ Berhasil!</h4>
                                <span id="success-message" style="color: #047857; font-size: 0.875rem;"></span>
                            </div>
                        </div>
                    </div>

                    <div id="alert-error" style="display: none; margin-bottom: 2rem; padding: 1.5rem; background: linear-gradient(135deg, #FEE2E2, #FECACA); border: 1px solid #EF4444; border-radius: 1rem;" role="alert">
                        <div style="display: flex; align-items: flex-start; gap: 1rem;">
                            <div style="width: 40px; height: 40px; background: #991B1B; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <svg style="width: 20px; height: 20px; color: #FEE2E2;" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <h4 style="font-weight: 600; color: #991B1B; margin-bottom: 0.5rem;">❌ Terjadi Kesalahan!</h4>
                                <ul id="error-messages" style="list-style: disc; margin-left: 1rem; color: #7F1D1D; font-size: 0.875rem;"></ul>
                            </div>
                        </div>
                    </div>

                    <form id="profileForm">
                        <?= csrf_field() ?>
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
                            <div style="grid-column: 1 / -1;">
                                <label for="nama_lengkap" style="display: block; margin-bottom: 0.5rem; color: var(--text-primary); font-weight: 500;">👤 Nama Lengkap</label>
                                <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?= $pelanggan['nama_lengkap'] ?>" required
                                    style="width: 100%; padding: 1rem; border: 2px solid var(--gray-200); border-radius: 0.75rem; background: var(--white); color: var(--text-primary); font-size: 1rem; transition: all 0.3s ease;"
                                    onfocus="this.style.borderColor='var(--primary-color)'; this.style.boxShadow='0 0 0 4px rgba(0, 102, 204, 0.1)'"
                                    onblur="this.style.borderColor='var(--gray-200)'; this.style.boxShadow='none'">
                            </div>

                            <div>
                                <label for="jeniskelamin" style="display: block; margin-bottom: 0.5rem; color: var(--text-primary); font-weight: 500;">⚧️ Jenis Kelamin</label>
                                <select id="jeniskelamin" name="jeniskelamin"
                                    style="width: 100%; padding: 1rem; border: 2px solid var(--gray-200); border-radius: 0.75rem; background: var(--white); color: var(--text-primary); font-size: 1rem; transition: all 0.3s ease;"
                                    onfocus="this.style.borderColor='var(--primary-color)'; this.style.boxShadow='0 0 0 4px rgba(0, 102, 204, 0.1)'"
                                    onblur="this.style.borderColor='var(--gray-200)'; this.style.boxShadow='none'">
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki" <?= isset($pelanggan['jeniskelamin']) && $pelanggan['jeniskelamin'] === 'Laki-laki' ? 'selected' : '' ?>>🚹 Laki-laki</option>
                                    <option value="Perempuan" <?= isset($pelanggan['jeniskelamin']) && $pelanggan['jeniskelamin'] === 'Perempuan' ? 'selected' : '' ?>>🚺 Perempuan</option>
                                </select>
                            </div>

                            <div>
                                <label for="tanggal_lahir" style="display: block; margin-bottom: 0.5rem; color: var(--text-primary); font-weight: 500;">🎂 Tanggal Lahir</label>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?= isset($pelanggan['tanggal_lahir']) ? $pelanggan['tanggal_lahir'] : '' ?>"
                                    style="width: 100%; padding: 1rem; border: 2px solid var(--gray-200); border-radius: 0.75rem; background: var(--white); color: var(--text-primary); font-size: 1rem; transition: all 0.3s ease;"
                                    onfocus="this.style.borderColor='var(--primary-color)'; this.style.boxShadow='0 0 0 4px rgba(0, 102, 204, 0.1)'"
                                    onblur="this.style.borderColor='var(--gray-200)'; this.style.boxShadow='none'">
                            </div>

                            <div>
                                <label for="email" style="display: block; margin-bottom: 0.5rem; color: var(--text-primary); font-weight: 500;">📧 Email</label>
                                <input type="email" id="email" value="<?= $pelanggan['email'] ?>" disabled
                                    style="width: 100%; padding: 1rem; border: 2px solid var(--gray-300); border-radius: 0.75rem; background: var(--gray-100); color: var(--text-secondary); font-size: 1rem;">
                            </div>

                            <div>
                                <label for="no_hp" style="display: block; margin-bottom: 0.5rem; color: var(--text-primary); font-weight: 500;">📱 No. HP</label>
                                <input type="text" id="no_hp" name="no_hp" value="<?= isset($pelanggan['no_hp']) ? $pelanggan['no_hp'] : '' ?>"
                                    style="width: 100%; padding: 1rem; border: 2px solid var(--gray-200); border-radius: 0.75rem; background: var(--white); color: var(--text-primary); font-size: 1rem; transition: all 0.3s ease;"
                                    onfocus="this.style.borderColor='var(--primary-color)'; this.style.boxShadow='0 0 0 4px rgba(0, 102, 204, 0.1)'"
                                    onblur="this.style.borderColor='var(--gray-200)'; this.style.boxShadow='none'">
                            </div>

                            <div style="grid-column: 1 / -1;">
                                <label for="alamat" style="display: block; margin-bottom: 0.5rem; color: var(--text-primary); font-weight: 500;">🏠 Alamat</label>
                                <textarea id="alamat" name="alamat" rows="4"
                                    style="width: 100%; padding: 1rem; border: 2px solid var(--gray-200); border-radius: 0.75rem; background: var(--white); color: var(--text-primary); font-size: 1rem; resize: none; transition: all 0.3s ease;"
                                    onfocus="this.style.borderColor='var(--primary-color)'; this.style.boxShadow='0 0 0 4px rgba(0, 102, 204, 0.1)'"
                                    onblur="this.style.borderColor='var(--gray-200)'; this.style.boxShadow='none'"><?= isset($pelanggan['alamat']) ? $pelanggan['alamat'] : '' ?></textarea>
                            </div>
                        </div>

                        <div style="margin-top: 3rem; text-align: center;">
                            <button type="submit" id="saveButton" class="btn btn-primary btn-enhanced" style="padding: 1rem 3rem; border-radius: 50px; border: none; cursor: pointer; font-size: 1rem;">
                                <span class="btn-text">💾 Simpan Perubahan</span>
                                <span class="btn-shine"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->section('custom_script') ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const profileForm = document.getElementById('profileForm');
        const saveButton = document.getElementById('saveButton');
        const alertSuccess = document.getElementById('alert-success');
        const alertError = document.getElementById('alert-error');
        const successMessage = document.getElementById('success-message');
        const errorMessages = document.getElementById('error-messages');
        const profileName = document.getElementById('profile-name');

        profileForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Tampilkan loading state
            saveButton.disabled = true;
            saveButton.innerHTML = `
                <span class="btn-text">
                    <svg style="width: 20px; height: 20px; margin-right: 8px; animation: spin 1s linear infinite;" fill="none" viewBox="0 0 24 24">
                        <circle style="opacity: 0.25;" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path style="opacity: 0.75;" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    ⏳ Menyimpan...
                </span>
                <span class="btn-shine"></span>
            `;

            // Sembunyikan alert
            alertSuccess.style.display = 'none';
            alertError.style.display = 'none';

            const formData = new FormData(profileForm);

            fetch('<?= base_url('customer/update-profil') ?>', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Kembalikan status button
                    saveButton.disabled = false;
                    saveButton.innerHTML = `
                        <span class="btn-text">💾 Simpan Perubahan</span>
                        <span class="btn-shine"></span>
                    `;

                    if (data.status === 'success') {
                        // Tampilkan success alert
                        alertSuccess.style.display = 'block';
                        successMessage.textContent = data.message;

                        // Update nama di profile card
                        profileName.textContent = formData.get('nama_lengkap');

                        // Scroll ke alert
                        alertSuccess.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });

                        // Sembunyikan alert setelah 5 detik
                        setTimeout(() => {
                            alertSuccess.style.display = 'none';
                        }, 5000);
                    } else {
                        // Tampilkan error alert
                        alertError.style.display = 'block';
                        errorMessages.innerHTML = '';

                        // Tambahkan semua pesan error
                        if (typeof data.errors === 'object') {
                            for (const field in data.errors) {
                                const li = document.createElement('li');
                                li.textContent = data.errors[field];
                                errorMessages.appendChild(li);
                            }
                        } else {
                            const li = document.createElement('li');
                            li.textContent = data.message || 'Terjadi kesalahan saat memperbarui profil';
                            errorMessages.appendChild(li);
                        }

                        // Scroll ke alert
                        alertError.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }
                })
                .catch(error => {
                    // Kembalikan status button
                    saveButton.disabled = false;
                    saveButton.innerHTML = `
                        <span class="btn-text">💾 Simpan Perubahan</span>
                        <span class="btn-shine"></span>
                    `;

                    // Tampilkan error
                    alertError.style.display = 'block';
                    errorMessages.innerHTML = '';
                    const li = document.createElement('li');
                    li.textContent = 'Terjadi kesalahan koneksi. Silakan coba lagi.';
                    errorMessages.appendChild(li);

                    // Scroll ke alert
                    alertError.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });

                    console.error('Error:', error);
                });
        });
    });

    // Add CSS for spinner animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    `;
    document.head.appendChild(style);
</script>
<?= $this->endSection() ?>

<?= $this->endSection() ?>