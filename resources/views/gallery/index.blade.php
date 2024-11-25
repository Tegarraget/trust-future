<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Foto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #1a1b3c, #2a2b5c);
            min-height: 100vh;
            color: white;
            font-family: 'Poppins', sans-serif;
            padding-top: 80px;
            transition: background 0.5s ease;
        }

        .top-bar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 80px;
            background: linear-gradient(90deg, #1e3c72, #3a7bd5, #1e3c72);
            background-size: 300% 100%;
            animation: colorSlide 12s infinite alternate;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        @keyframes colorSlide {
            0% {
                background-position: 0% 0;
            }

            100% {
                background-position: 100% 0;
            }
        }

        .top-bar h1 {
            margin: 0;
            font-size: 2rem;
            color: white;
            font-weight: bold;
            font-family: 'Poppins', sans-serif;
            transition: color 0.5s ease;
        }

        .container {
            margin-top: 30px;
            max-width: 1000px;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: white;
            font-family: 'Poppins', sans-serif;
            position: relative;
            background: linear-gradient(90deg, #ffffff, #3a7bd5, #ffffff);
            background-size: 200% auto;
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            animation: shineText 6s linear infinite;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            display: inline-block;
        }

        @keyframes shineText {
            0% {
                background-position: 200% center;
            }

            100% {
                background-position: 0 center;
            }
        }

        .card {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        .card-title {
            color: #ffffff;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
        }

        .card-text {
            color: #ffffff;
            font-size: 2rem;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
        }

        .jurusan-container {
            margin-bottom: 10px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            transition: transform 0.3s ease, background 0.3s ease;
            text-decoration: none;
            color: inherit;
        }

        .jurusan-container:hover {
            transform: scale(1.05);
            background: rgba(255, 255, 255, 0.2);
        }

        .jurusan-logo {
            width: 100px;
            height: 100px;
            margin-right: 20px;
            background: white;
            padding: 10px;
            border-radius: 10px;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .jurusan-content {
            flex-grow: 1;
        }

        .jurusan-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
            text-align: left;
            transition: color 0.3s ease;
        }

        .jurusan-description {
            margin-bottom: 20px;
            text-align: left;
            transition: color 0.3s ease;
        }

        .gallery-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .photo-item {
            flex: 1 1 calc(25% - 30px);
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            background: rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .photo-item img {
            width: 100%;
            height: auto;
            display: block;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .photo-item:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .photo-item p {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 10px;
            margin: 0;
            text-align: center;
            transition: background 0.3s ease;
        }

        .login-button {
            position: fixed;
            top: 30px;
            right: 10px;
            z-index: 1000;
        }

        .btn-login {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-login:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        /* CSS untuk modal */
        .modal-content {
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            transition: background 0.3s ease;
        }

        .modal-body img {
            max-width: 80%;
            max-height: 80vh;
            transition: transform 0.3s ease;
        }

        /* Pembatas */
        .divider {
            height: 2px;
            background: rgba(255, 255, 255, 0.3);
            margin: 40px 0;
            border-radius: 5px;
        }

        .album-container {
            margin-bottom: 30px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        .album-title {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 15px;
            color: white;
            text-align: center;
        }

        .social-links {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .social-link {
            display: flex;
            align-items: center;
            gap: 15px;
            color: white;
            text-decoration: none;
            padding: 15px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateX(10px);
            color: #3a7bd5;
        }

        .social-link i {
            font-size: 24px;
            width: 30px;
            text-align: center;
        }

        .maps-container {
            position: relative;
            width: 100%;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .maps-container iframe {
            width: 100%;
            height: 300px;
            border: none;
            transition: transform 0.3s ease;
        }

        .maps-container:hover iframe {
            transform: scale(1.02);
        }
    </style>
</head>

<body>
    <div class="top-bar">
        <h1>SMKN 4 BOGOR</h1>
    </div>

    <div class="login-button">
        <a href="{{ route('login') }}" class="btn-login">Login</a>
    </div>

    <div class="container">
        <!-- Teks "Jurusan Sekolah" dengan animasi mengkilap -->
        <div class="section-title">Jurusan Sekolah</div>

        <!-- Kontainer untuk setiap jurusan -->
        <a href="{{ route('jurusan.pplg') }}" class="jurusan-container">
            <img src="{{ asset('storage/logos/pplg.png') }}" alt="PPLG Logo" class="jurusan-logo">
            <div class="jurusan-content">
                <h2 class="jurusan-title">PPLG</h2>
                <p class="jurusan-description">Pengembangan Perangkat Lunak dan Gim adalah jurusan yang fokus pada pembuatan dan pengembangan aplikasi serta permainan digital.</p>
            </div>
        </a>

        <a href="{{ route('jurusan.tflm') }}" class="jurusan-container">
            <img src="{{ asset('storage/logos/tflm.jpeg') }}" alt="TFLM Logo" class="jurusan-logo">
            <div class="jurusan-content">
                <h2 class="jurusan-title">TFLM</h2>
                <p class="jurusan-description">Teknik Fabrikasi Logam dan Manufaktur mempelajari proses pembuatan dan pengolahan logam menjadi produk yang berguna.</p>
            </div>
        </a>

        <a href="{{ route('jurusan.tjkt') }}" class="jurusan-container">
            <img src="{{ asset('storage/logos/tjkt.png') }}" alt="TJKT Logo" class="jurusan-logo">
            <div class="jurusan-content">
                <h2 class="jurusan-title">TJKT</h2>
                <p class="jurusan-description">Teknik Jaringan Komputer dan Telekomunikasi berfokus pada pengelolaan dan pengembangan jaringan komputer dan sistem komunikasi.</p>
            </div>
        </a>

        <a href="{{ route('jurusan.tkr') }}" class="jurusan-container">
            <img src="{{ asset('storage/logos/tkr.png') }}" alt="TKR Logo" class="jurusan-logo">
            <div class="jurusan-content">
                <h2 class="jurusan-title">TKR</h2>
                <p class="jurusan-description">Teknik Kendaraan Ringan mempelajari perawatan dan perbaikan kendaraan bermotor ringan seperti mobil dan sepeda motor.</p>
            </div>
        </a>

        <!-- Pembatas -->
        <div class="divider"></div>

        <!-- Tambahkan bagian ini untuk menampilkan jumlah guru, siswa, dan staf -->
        <div class="row text-center my-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"><i class="fas fa-chalkboard-teacher"></i> Jumlah Guru</h3>
                        <p class="card-text">{{ $jumlahGuru ?? '20' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"><i class="fas fa-user-graduate"></i> Jumlah Siswa</h3>
                        <p class="card-text">{{ $jumlahSiswa ?? '200' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"><i class="fas fa-users"></i> Jumlah Staf</h3>
                        <p class="card-text">{{ $jumlahStaf ?? '15' }}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Akhir dari bagian tambahan -->

        <!-- Pembatas antara jurusan dan album -->
        <div class="divider"></div>

        <!-- Teks "Album" di atas tampilan foto-foto -->
        <div class="section-title">Galeri Sekolah</div>

        <!-- Kontainer untuk setiap album -->
        @foreach ($albums as $albumName => $photos)
            <div class="album-container">
                <div class="gallery-container">
                    @foreach ($photos as $photo)
                        <div class="photo-item" onclick="showPhotoModal('{{ $photo->path }}')">
                            <img src="{{ $photo->path }}" alt="{{ $photo->name }}">
                            <p>{{ $photo->name }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pembatas antara galeri dan bagian baru -->
    <div class="divider"></div>

    <!-- Bagian untuk Agenda dan Informasi Terkini -->
    <div class="container my-5">
        <div class="row">
            <!-- Kolom untuk Agenda -->
            <div class="col-md-6">
                <a href="{{ route('agenda.index') }}" class="text-decoration-none">
                    <div class="card mb-4" style="min-height: 400px; background: rgba(255, 255, 255, 0.1); border: none;">
                        <div class="card-header" style="background: rgba(255, 255, 255, 0.1); border: none;">
                            <h3 class="card-title text-white"><i class="fas fa-calendar-alt"></i> Agenda</h3>
                        </div>
                        <div class="card-body text-white">
                            <ul class="list-unstyled">
                                <li class="mb-4">
                                    <h4 style="color: #3a7bd5;">Workshop Pengembangan Web</h4>
                                    <p class="text-white-50">10 November 2023</p>
                                    <p>Workshop pengembangan web untuk meningkatkan keterampilan siswa dalam pemrograman web modern. Peserta akan belajar tentang HTML5, CSS3, dan JavaScript.</p>
                                </li>
                                <li class="mb-4">
                                    <h4 style="color: #3a7bd5;">Seminar Teknologi Terbaru</h4>
                                    <p class="text-white-50">15 November 2023</p>
                                    <p>Seminar tentang perkembangan teknologi terbaru dan dampaknya terhadap industri. Pembicara dari berbagai perusahaan teknologi akan berbagi pengalaman.</p>
                                </li>
                                <li class="mb-4">
                                    <h4 style="color: #3a7bd5;">Kunjungan Industri</h4>
                                    <p class="text-white-50">20 November 2023</p>
                                    <p>Kunjungan ke perusahaan teknologi untuk memberikan pengalaman langsung kepada siswa tentang dunia kerja di industri teknologi.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Kolom untuk Informasi Terkini -->
            <div class="col-md-6">
                <a href="{{ route('informasi.index') }}" class="text-decoration-none">
                    <div class="card mb-4" style="min-height: 400px; background: rgba(255, 255, 255, 0.1); border: none;">
                        <div class="card-header" style="background: rgba(255, 255, 255, 0.1); border: none;">
                            <h3 class="card-title text-white"><i class="fas fa-info-circle"></i> Informasi Terkini</h3>
                        </div>
                        <div class="card-body text-white">
                            <ul class="list-unstyled">
                                <li class="mb-4">
                                    <h4 style="color: #3a7bd5;">Update Kurikulum</h4>
                                    <p class="text-white-50">25 Oktober 2023</p>
                                    <p>Kurikulum baru akan diterapkan mulai semester depan untuk meningkatkan kualitas pembelajaran dan menyesuaikan dengan kebutuhan industri terkini. Perubahan ini mencakup pembaruan materi dan metode pembelajaran.</p>
                                </li>
                                <li class="mb-4">
                                    <h4 style="color: #3a7bd5;">Prestasi Siswa</h4>
                                    <p class="text-white-50">1 November 2023</p>
                                    <p>Tim robotik SMKN 4 Bogor berhasil memenangkan kompetisi nasional di Jakarta. Prestasi ini membuktikan kualitas pendidikan di sekolah kita dan dedikasi para siswa dalam mengembangkan kemampuan mereka.</p>
                                </li>
                                <li class="mb-4">
                                    <h4 style="color: #3a7bd5;">Pengumuman Libur</h4>
                                    <p class="text-white-50">5 November 2023</p>
                                    <p>Libur akhir tahun akan dimulai tanggal 25 Desember 2023 hingga 5 Januari 2024. Siswa diharapkan dapat memanfaatkan waktu libur dengan baik untuk istirahat dan persiapan semester baru.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Pembatas -->
    <div class="divider"></div>

    <!-- Bagian Footer dengan Media Sosial dan Google Maps -->
    <div class="container my-5">
        <div class="row">
            <!-- Kolom untuk Media Sosial -->
            <div class="col-md-6">
                <div class="card mb-4" style="background: rgba(255, 255, 255, 0.1); border: none;">
                    <div class="card-header" style="background: rgba(255, 255, 255, 0.1); border: none;">
                        <h3 class="card-title text-white"><i class="fas fa-hashtag"></i> Media Sosial</h3>
                    </div>
                    <div class="card-body">
                        <div class="social-links">
                            <a href="https://instagram.com/smkn4kotabogor" class="social-link mb-3" target="_blank">
                                <i class="fab fa-instagram"></i>
                                <span>@smkn4bogor</span>
                            </a>
                            <a href="https://facebook.com/smknegeri4bogor" class="social-link mb-3" target="_blank">
                                <i class="fab fa-facebook"></i>
                                <span>SMK Negeri 4 Bogor</span>
                            </a>
                            <a href="https://youtube.com/@smknegeri4bogor905" class="social-link mb-3" target="_blank">
                                <i class="fab fa-youtube"></i>
                                <span>SMKN 4 Bogor Official</span>
                            </a>
                            <a href="mailto:smkn4@smkn4bogor.sch.id" class="social-link mb-3">
                                <i class="fas fa-envelope"></i>
                                <span>info@smkn4bogor.sch.id</span>
                            </a>
                            <a href="wa.me/6282260168886" class="social-link mb-3">
                                <i class="fas fa-phone"></i>
                                <span>+62 822 6016 8886</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom untuk Google Maps -->
            <div class="col-md-6">
                <div class="card mb-4" style="background: rgba(255, 255, 255, 0.1); border: none;">
                    <div class="card-header" style="background: rgba(255, 255, 255, 0.1); border: none;">
                        <h3 class="card-title text-white"><i class="fas fa-map-marker-alt"></i> Lokasi Kami</h3>
                    </div>
                    <div class="card-body">
                        <div class="maps-container">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31703.482406557534!2d106.82191278803711!3d-6.654941598377499!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8b16ee07ef5%3A0x14ab253dd267de49!2sSMK%20Negeri%204%20Bogor%20(Nebrazka)!5e0!3m2!1sid!2sid!4v1731479077702!5m2!1sid!2sid"
                                width="100%" 
                                height="300" 
                                style="border:0; border-radius: 10px;" 
                                allowfullscreen="" 
                                loading="lazy">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright Section -->
<footer class="footer mt-auto py-3">
    <div class="container text-center">
        <div class="copyright" style="background: rgba(255, 255, 255, 0.1); padding: 15px; border-radius: 10px;">
            <p class="mb-0" style="color: rgba(255, 255, 255, 0.8);">
                &copy; {{ date('Y') }} SMKN 4 BOGOR. All Rights Reserved.
            </p>
        </div>
    </div>
</footer>

<style>
    .footer {
        margin-top: 50px;
        padding: 20px 0;
        width: 100%;
    }

    .copyright {
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
    }

    .copyright:hover {
        background: rgba(255, 255, 255, 0.15) !important;
        transform: translateY(-2px);
    }

    .copyright p {
        font-size: 0.9rem;
        letter-spacing: 1px;
    }
</style>

    <!-- Modal untuk menampilkan foto -->
    <div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bg-transparent border-0">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0 text-center">
                    <img src="" id="modalImage" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showPhotoModal(imagePath) {
            document.getElementById('modalImage').src = imagePath;
            var photoModal = new bootstrap.Modal(document.getElementById('photoModal'));
            photoModal.show();
        }
    </script>
</body>

</html>