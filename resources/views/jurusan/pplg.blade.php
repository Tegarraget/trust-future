<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPLG - SMKN 4 BOGOR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #1a1b3c, #2a2b5c);
            min-height: 100vh;
            color: white;
            font-family: 'Poppins', sans-serif;
            padding-top: 80px;
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

        .container {
            margin-top: 30px;
            max-width: 1100px;
        }

        .jurusan-header {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .jurusan-logo {
            width: 150px;
            height: 150px;
            background: white;
            padding: 15px;
            border-radius: 15px;
            object-fit: contain;
        }

        .jurusan-info h1 {
            margin-bottom: 15px;
            font-size: 2.5rem;
            color: white;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
        }

        .jurusan-description {
            font-size: 1.1rem;
            line-height: 1.8;
            color: rgba(255, 255, 255, 0.9);
        }

        .section-title {
            font-size: 1.8rem;
            margin: 30px 0 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
            color: white;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
        }

        .gallery-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 20px;
        }

        .photo-item {
            flex: 1 1 calc(20% - 15px);
            max-width: calc(20% - 15px);
            position: relative;
            border-radius: 10px;
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

        .back-button {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .back-button:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateX(-5px);
            color: white;
        }

        .features-section {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 25px;
            margin-top: 30px;
        }

        .feature-item {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            transition: transform 0.3s ease;
        }

        .feature-item:hover {
            transform: translateX(10px);
            background: rgba(255, 255, 255, 0.1);
        }

        .feature-title {
            color: #6A42C2;
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 1.2rem;
        }
    </style>
</head>

<body>
    <div class="top-bar">
        <h1>PPLG - Pengembangan Perangkat Lunak dan Gim</h1>
    </div>

    <div class="container">
        <a href="{{ route('gallery.index') }}" class="back-button">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="jurusan-header">
            <img src="{{ asset('storage/logos/pplg.png') }}" alt="PPLG Logo" class="jurusan-logo">
            <div class="jurusan-info">
                <h1>PPLG</h1>
                <p class="jurusan-description">
                    Pengembangan Perangkat Lunak dan Gim adalah jurusan yang fokus pada pembuatan dan pengembangan aplikasi serta permainan digital. 
                    Program ini membekali siswa dengan keterampilan pemrograman, desain, dan pengembangan software yang dibutuhkan di era digital.
                </p>
            </div>
        </div>

        <div class="features-section">
            <h2 class="section-title">Keunggulan Jurusan</h2>
            <div class="feature-item">
                <div class="feature-title">Kurikulum Berbasis Industri</div>
                <p>Materi pembelajaran disesuaikan dengan kebutuhan industri terkini dan standar kompetensi internasional.</p>
            </div>
            <div class="feature-item">
                <div class="feature-title">Praktik Langsung</div>
                <p>Siswa akan banyak melakukan praktik langsung dalam pengembangan aplikasi dan game.</p>
            </div>
            <div class="feature-item">
                <div class="feature-title">Fasilitas Modern</div>
                <p>Dilengkapi dengan laboratorium komputer modern dan software terkini untuk mendukung pembelajaran.</p>
            </div>
        </div>

        <h2 class="section-title">Galeri PPLG</h2>
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
    </div>

    <!-- Modal untuk preview foto -->
    <div class="modal fade" id="photoModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bg-transparent border-0">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
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