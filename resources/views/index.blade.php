<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Perpustakaan MAN 2 Kota Payakumbuh</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets/logo-side.png') }}" type="image/x-icon">
    <style>
        :root {
            --primary-color: #01747B;
            --primary-dark: #005a60;
            --secondary-color: #00ABB5;
            --accent-color: #00D2DF;
            --light-color: #B5FBFF;
            --dark-color: #004F54;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --card-bg: rgba(255, 255, 255, 0.95);
            --text-dark: #2c3e50;
            --text-light: #7f8c8d;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            position: relative;
            padding: 15px;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("{{ asset('assets/bg-image.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: -2;
        }

        body::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, var(--primary-color) 30%, rgba(1, 116, 123, 0) 100%);
            z-index: -1;
        }

        .background-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .shape {
            position: absolute;
            opacity: 0.5;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            animation: float 15s infinite ease-in-out;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 70%;
            left: 80%;
            animation-delay: 2s;
        }

        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            top: 20%;
            left: 85%;
            animation-delay: 4s;
        }

        .shape:nth-child(4) {
            width: 100px;
            height: 100px;
            top: 80%;
            left: 15%;
            animation-delay: 6s;
        }

        .shape:nth-child(5) {
            width: 50px;
            height: 50px;
            top: 60%;
            left: 5%;
            animation-delay: 8s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(10deg);
            }
        }

        .container-main {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }

        .hero-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 80vh;
            text-align: center;
            padding: 40px 0;
        }

        .logo-container {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .logo-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 25px;
        }

        .logo-image {
            max-height: 150px;
            width: auto;
        }

        @media (max-width: 576px) {
            .logo-image {
                max-height: 80px;
            }
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        .title {
            color: white;
            font-weight: 700;
            margin-bottom: 15px;
            font-size: 2.8rem;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            position: relative;
            display: inline-block;
        }

        .title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 350px;
            height: 4px;
            background: #ffff;
            border-radius: 2px;
        }

        .subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.3rem;
            margin-bottom: 40px;
            font-weight: 400;
            max-width: 600px;
            text-align: center;
        }

        .cta-buttons {
            display: flex;
            gap: 20px;
            margin-bottom: 50px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .btn-login {
            background: white;
            color: var(--primary-color);
            border: 2px solid white;
            padding: 14px 40px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: var(--transition);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-login:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            color: #ffff;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 2px solid white;
        }

        .btn-visitor {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            color: white;
            border: 2px solid white;
            padding: 14px 40px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-visitor:hover {
            background: white;
            color: var(--primary-color);
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 40px;
            width: 100%;
            max-width: 1000px;
        }

        .feature {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 25px;
            text-align: center;
            transition: var(--transition);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
        }

        .feature:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.25);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .feature i {
            font-size: 40px;
            margin-bottom: 15px;
            color: #ffff;
        }

        .feature h5 {
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 1.2rem;
        }

        .feature p {
            font-size: 0.95rem;
            opacity: 0.9;
        }

        .content-section {
            display: grid;
            grid-template-columns: 1fr;
            gap: 30px;
            margin-top: 30px;
        }

        @media (max-width: 992px) {
            .content-section {
                grid-template-columns: 1fr;
            }
        }

        .card {
            background: var(--card-bg);
            border-radius: 20px;
            box-shadow: var(--shadow);
            border: none;
            transition: var(--transition);
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            font-weight: 600;
            padding: 20px 25px;
            border-bottom: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-body {
            padding: 25px;
        }

        .visitor-count {
            background: linear-gradient(135deg, var(--success-color), #20c997);
            color: white;
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
            position: relative;
            overflow: hidden;
        }

        .visitor-count::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0) 70%);
            transform: rotate(40deg);
        }

        .visitor-count h3 {
            font-size: 3rem;
            font-weight: 700;
            margin: 0;
            position: relative;
            z-index: 1;
        }

        .visitor-count p {
            margin: 5px 0 0;
            font-size: 1rem;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        .visitor-list {
            max-height: 400px;
            overflow-y: auto;
            padding-right: 10px;
        }

        .visitor-list::-webkit-scrollbar {
            width: 6px;
        }

        .visitor-list::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .visitor-list::-webkit-scrollbar-thumb {
            background: var(--secondary-color);
            border-radius: 10px;
        }

        .visitor-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #f0f0f0;
            transition: var(--transition);
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .visitor-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        .visitor-item:hover {
            background-color: rgba(181, 251, 255, 0.3);
            transform: translateX(5px);
        }

        .visitor-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            margin-right: 15px;
            flex-shrink: 0;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .visitor-info {
            flex: 1;
        }

        .visitor-name {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .visitor-details {
            display: flex;
            gap: 15px;
            font-size: 0.85rem;
            color: var(--text-light);
        }

        .visitor-detail {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .modal-content {
            border-radius: 20px;
            border: none;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-bottom: none;
            padding: 25px 30px;
        }

        .modal-title {
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .modal-body {
            padding: 30px;
        }

        .form-label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            border-radius: 12px;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            transition: var(--transition);
            font-size: 1rem;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.25rem rgba(0, 210, 223, 0.25);
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            padding: 14px 25px;
            border-radius: 12px;
            font-weight: 600;
            transition: var(--transition);
            width: 100%;
            margin-top: 10px;
            font-size: 1.1rem;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 171, 181, 0.4);
        }

        .footer {
            margin-top: 50px;
            color: white;
            text-align: center;
            font-size: 0.9rem;
            opacity: 0.8;
            padding: 20px 0;
        }

        .fade-in {
            animation: fadeIn 1s ease-out;
        }

        .slide-up {
            animation: slideUp 0.8s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .title {
                font-size: 1.5rem;
            }

            .subtitle {
                font-size: 1.2rem;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn-login,
            .btn-visitor {
                width: 100%;
                max-width: 300px;
            }

            .features {
                grid-template-columns: 1fr;
            }

            .visitor-details {
                flex-direction: column;
                gap: 5px;
            }
        }
    </style>
</head>

<body>
    <div class="background-animation">
        <div class="floating-shapes">
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
    </div>

    <div class="container-main">
        <section class="hero-section fade-in">
            <div class="logo-container">
                <div class="logo-wrapper">
                    <img src="{{ asset('assets/logo-website.png') }}" class="logo-image" alt="Logo MAN 2 Payakumbuh">
                </div>
                <h4 class="fw-medium text-white">Sistem Perpustakaan</h4>
                <h1 class="title fw-bolder text-uppercase">MAN 2 Kota Payakumbuh</h1>
                <p class="subtitle slide-up">Untuk memasuki sistem harap login terlebih dahulu</p>
            </div>

            <div class="cta-buttons slide-up">
                <a href="{{ route('admin.login') }}" class="btn btn-login">
                    <i class="fas fa-sign-in-alt"></i>
                    Login ke Sistem
                </a>
                <button class="btn btn-visitor" data-bs-toggle="modal" data-bs-target="#visitorModal">
                    <i class="fas fa-user-plus"></i>
                    Isi Buku Pengunjung
                </button>
            </div>

            <div class="features slide-up">
                <div class="feature">
                    <i class="fas fa-search"></i>
                    <h5>Cari Buku</h5>
                    <p>Temukan koleksi buku dengan mudah dan cepat</p>
                </div>
                <div class="feature">
                    <i class="fas fa-book-open"></i>
                    <h5>Pinjam Buku</h5>
                    <p>Proses peminjaman yang cepat dan efisien</p>
                </div>
                <div class="feature">
                    <i class="fas fa-chart-line"></i>
                    <h5>Statistik</h5>
                    <p>Pantau aktivitas perpustakaan secara real-time</p>
                </div>
            </div>
        </section>

        <section class="content-section fade-in">
            <div class="card slide-up">
                <div class="card-header">
                    <i class="fas fa-users"></i>
                    Daftar Pengunjung Hari Ini
                </div>
                <div class="card-body">
                    <div class="visitor-count">
                        <h3 id="totalPengunjung">0</h3>
                        <p>Total Pengunjung Hari Ini</p>
                    </div>

                    <div class="visitor-list" id="visitorList">
                    </div>
                </div>
            </div>
        </section>

        <div class="footer fade-in">
            <p>&copy; {{ date('Y') }} Perpustakaan MAN 2 KOTA PAYAKUMBUH. All rights reserved.</p>
        </div>
    </div>

    <div class="modal fade" id="visitorModal" tabindex="-1" aria-labelledby="visitorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="visitorModalLabel">
                        <i class="fas fa-user-edit"></i>
                        Buku Pengunjung
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="visitorForm">
                        <div class="mb-4">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama"
                                placeholder="Masukkan nama lengkap" required>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="jenisKelamin" required>
                                    <option value="" selected disabled>Pilih jenis kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="usia" class="form-label">Usia</label>
                                <input type="number" class="form-control" id="usia" placeholder="Masukkan usia"
                                    min="1" max="100" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="keperluan" class="form-label">Keperluan</label>
                            <input type="text" class="form-control" id="keperluan"
                                placeholder="Contoh: Meminjam Buku, Membaca, dll." required>
                        </div>

                        <div class="mb-4">
                            <label for="pencarian" class="form-label">Apa yang Anda cari?</label>
                            <input type="text" class="form-control" id="pencarian"
                                placeholder="Contoh: buku matematika, novel, dll.">
                        </div>

                        <div class="mb-4">
                            <label for="saran" class="form-label">Saran dan Masukan</label>
                            <textarea class="form-control" id="saran" rows="3"
                                placeholder="Berikan saran dan masukan untuk perpustakaan kami"></textarea>
                        </div>

                        <button type="submit" class="btn btn-submit">
                            <i class="fas fa-paper-plane me-2"></i> Simpan Data Pengunjung
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Fungsi untuk memformat tanggal
        function formatTanggal(tanggal) {
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            return new Date(tanggal).toLocaleDateString('id-ID', options);
        }

        // Fungsi untuk merender daftar pengunjung
        function renderVisitorList(pengunjung) {
            const visitorList = document.getElementById('visitorList');
            visitorList.innerHTML = '';

            if (pengunjung.length === 0) {
                visitorList.innerHTML = `
                <div class="text-center py-4">
                    <i class="fas fa-users fa-3x text-muted mb-3"></i>
                    <p class="text-muted">Belum ada pengunjung hari ini</p>
                </div>
            `;
                return;
            }

            pengunjung.forEach(visitor => {
                const firstLetter = visitor.nama_lengkap.charAt(0).toUpperCase();

                const visitorItem = document.createElement('div');
                visitorItem.className = 'visitor-item';
                visitorItem.innerHTML = `
                <div class="visitor-avatar">${firstLetter}</div>
                <div class="visitor-info">
                    <div class="visitor-name">${visitor.nama_lengkap}</div>
                    <div class="visitor-details">
                        <div class="visitor-detail">
                            <i class="fas fa-calendar-alt"></i>
                            <span>${formatTanggal(visitor.tanggal_kunjungan)}</span>
                        </div>
                        <div class="visitor-detail">
                            <i class="fas fa-clock"></i>
                            <span>${visitor.jam_kunjungan} WIB</span>
                        </div>
                        <div class="visitor-detail">
                            <i class="fas fa-tag"></i>
                            <span>${visitor.keperluan}</span>
                        </div>
                        ${visitor.yang_dicari ? `
                                <div class="visitor-detail">
                                    <i class="fas fa-search"></i>
                                    <span>${visitor.yang_dicari}</span>
                                </div>
                                ` : ''}
                    </div>
                </div>
            `;

                visitorList.appendChild(visitorItem);
            });

            document.getElementById('totalPengunjung').textContent = pengunjung.length;
        }

        // Fungsi untuk mengambil data pengunjung dari API
        async function loadPengunjungHariIni() {
            try {
                const response = await fetch('/pengunjung/hari-ini');
                const data = await response.json();

                if (data.pengunjung) {
                    renderVisitorList(data.pengunjung);
                }
            } catch (error) {
                console.error('Error loading pengunjung:', error);
            }
        }

        // Event listener untuk form submission
        document.getElementById('visitorForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            // Tampilkan loading state
            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.innerHTML;
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Menyimpan...';
            submitButton.disabled = true;

            try {
                const formData = {
                    nama_lengkap: document.getElementById('nama').value,
                    jenis_kelamin: document.getElementById('jenisKelamin').value,
                    usia: document.getElementById('usia').value,
                    keperluan: document.getElementById('keperluan').value,
                    yang_dicari: document.getElementById('pencarian').value,
                    saran_masukan: document.getElementById('saran').value,
                    _token: '{{ csrf_token() }}' // CSRF token langsung dari Laravel
                };

                const response = await fetch('/pengunjung', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(formData)
                });

                const result = await response.json();

                if (result.success) {
                    const modal = bootstrap.Modal.getInstance(document.getElementById('visitorModal'));
                    modal.hide();

                    // Tampilkan alert sukses
                    setTimeout(() => {
                        alert(
                            `Terima kasih ${document.getElementById('nama').value}! Data Anda telah berhasil disimpan.`
                            );
                    }, 300);

                    // Reset form
                    document.getElementById('visitorForm').reset();

                    // Reload daftar pengunjung
                    await loadPengunjungHariIni();
                } else {
                    alert('Gagal menyimpan data: ' + result.message);
                    console.error('Server error:', result);
                }
            } catch (error) {
                console.error('Network error:', error);
                alert('Terjadi kesalahan jaringan saat menyimpan data.');
            } finally {
                // Reset button state
                submitButton.innerHTML = originalText;
                submitButton.disabled = false;
            }
        });

        // Inisialisasi saat DOM siap
        document.addEventListener('DOMContentLoaded', function() {
            // Load data pengunjung saat halaman dimuat
            loadPengunjungHariIni();

            // Setup intersection observer untuk animasi
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('slide-up');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.card, .feature').forEach(el => {
                observer.observe(el);
            });
        });
    </script>
</body>

</html>
