<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TFLM - Teknik Fabrikasi Logam dan Manufaktur</title>
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
            <img src="{{ asset('storage/logos/tflm.jpeg') }}" alt="TFLM Logo" class="jurusan-logo">
            <div class="jurusan-info">
                <h1>TFLM</h1>
                <p class="jurusan-description">
                    Teknik Fabrikasi Logam dan Manufaktur adalah jurusan yang memfokuskan pada pengolahan logam dan proses manufaktur. 
                    Program ini membekali siswa dengan keterampilan dalam pengelasan, pembentukan logam, dan teknologi manufaktur modern.
                </p>
            </div>
        </div>

        <div class="features-section">
            <h2 class="section-title">Keunggulan Jurusan</h2>
            <div class="feature-item">
                <div class="feature-title">Bengkel Modern</div>
                <p>Dilengkapi dengan peralatan pengelasan dan manufaktur terkini.</p>
            </div>
            <div class="feature-item">
                <div class="feature-title">Praktik Industri</div>
                <p>Kesempatan magang di industri manufaktur dan fabrikasi terkemuka.</p>
            </div>
            <div class="feature-item">
                <div class="feature-title">Sertifikasi Keahlian</div>
                <p>Program sertifikasi untuk berbagai keahlian teknik fabrikasi dan manufaktur.</p>
            </div>
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