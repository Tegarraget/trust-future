<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TJKT - Teknik Jaringan Komputer dan Telekomunikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1a1b3c, #2a2b5c);
            min-height: 100vh;
            color: white;
            font-family: 'Poppins', sans-serif;
        }

        .jurusan-container {
            padding-top: 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .jurusan-header {
            display: flex;
            align-items: center;
            gap: 20px;
            background: rgba(255, 255, 255, 0.1);
            padding: 15px;
            border-radius: 15px;
            margin-bottom: 15px;
        }

        .jurusan-logo {
            width: 150px;
            height: 150px;
            object-fit: contain;
            background: white;
            padding: 10px;
            border-radius: 10px;
        }

        .jurusan-info h1 {
            color: white;
            margin-bottom: 8px;
            text-shadow: 0 2px 10px rgba(255, 255, 255, 0.2);
        }

        .back-button {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            padding: 6px 18px;
            border-radius: 20px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }

        .back-button:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateX(-5px);
            color: white;
        }

        .gallery-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            padding: 15px;
        }

        .photo-item {
            flex: 1 1 calc(20% - 10px);
            max-width: calc(20% - 10px);
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            background: rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .photo-item:hover {
            transform: scale(1.05);
        }

        .photo-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .photo-item p {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 8px;
            margin: 0;
            font-size: 0.9rem;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="jurusan-container">
        <a href="{{ route('gallery.index') }}" class="back-button">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
        <div class="jurusan-header">
            <img src="{{ asset('storage/logos/tjkt.png') }}" alt="TJKT" class="jurusan-logo">
            <div class="jurusan-info">
                <h1>TJKT</h1>
                <p class="jurusan-description">
                    Teknik Jaringan Komputer dan Telekomunikasi adalah jurusan yang fokus pada pengelolaan infrastruktur jaringan, 
                    keamanan sistem, dan teknologi telekomunikasi. Program ini membekali siswa dengan keterampilan dalam merancang, 
                    mengimplementasi, dan memelihara jaringan komputer modern.
                </p>
            </div>
        </div>

        <div class="features-section">
            <h2 class="section-title">Keunggulan Jurusan</h2>
            <div class="feature-item">
                <div class="feature-title">Sertifikasi Internasional</div>
                <p>Persiapan untuk sertifikasi jaringan yang diakui secara internasional seperti CISCO dan CompTIA.</p>
            </div>
            <div class="feature-item">
                <div class="feature-title">Laboratorium Lengkap</div>
                <p>Dilengkapi dengan peralatan jaringan modern dan simulator untuk praktik langsung.</p>
            </div>
            <div class="feature-item">
                <div class="feature-title">Kerjasama Industri</div>
                <p>Bekerjasama dengan perusahaan IT terkemuka untuk program magang dan penempatan kerja.</p>
            </div>
        </div>

        <!-- Tambahkan konten tambahan sesuai kebutuhan -->
        <div class="jurusan-content">
            <h2>Informasi Jurusan</h2>
            <p>Di sini Anda bisa menambahkan informasi lebih lanjut tentang jurusan, seperti kurikulum, fasilitas, dan kegiatan yang terkait.</p>
        </div>

        <!-- Tambahkan di bagian yang ingin menampilkan foto -->
        <div class="gallery-container">
            @forelse ($photos as $photo)
                <div class="photo-item" onclick="showPhotoModal('{{ $photo['path'] }}')">
                    <img src="{{ $photo['path'] }}" alt="{{ $photo['name'] }}">
                    <p>{{ $photo['name'] }}</p>
                </div>
            @empty
                <p>Belum ada foto untuk jurusan ini</p>
            @endforelse
        </div>

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