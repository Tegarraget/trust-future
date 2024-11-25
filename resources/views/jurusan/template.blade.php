<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - SMKN 4 BOGOR</title>
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
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: transform 0.3s ease;
        }

        .jurusan-header:hover {
            transform: translateY(-5px);
        }

        .jurusan-logo {
            width: 150px;
            height: 150px;
            background: white;
            padding: 15px;
            border-radius: 15px;
            object-fit: contain;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .jurusan-header:hover .jurusan-logo {
            transform: scale(1.05);
        }

        .jurusan-info h1 {
            margin-bottom: 15px;
            font-size: 2.5rem;
            color: white;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
            font-weight: bold;
            background: linear-gradient(45deg, #fff, #3a7bd5);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .jurusan-description {
            font-size: 1.1rem;
            line-height: 1.8;
            color: rgba(255, 255, 255, 0.9);
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }

        .features-section {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 25px;
            margin-top: 30px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.15);
        }

        .section-title {
            font-size: 1.8rem;
            margin: 30px 0 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
            color: white;
            text-shadow: 0 0 15px rgba(255, 255, 255, 0.3);
            text-align: center;
            font-weight: bold;
        }

        .feature-item {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .feature-item:hover {
            transform: translateX(10px);
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .feature-title {
            color: #3a7bd5;
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 1.2rem;
            text-shadow: 0 0 10px rgba(58, 123, 213, 0.3);
        }

        .gallery-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .photo-item {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            background: rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            aspect-ratio: 1;
            cursor: pointer;
        }

        .photo-item:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .photo-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .photo-item:hover img {
            transform: scale(1.1);
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
            font-size: 0.9rem;
            text-align: center;
            backdrop-filter: blur(5px);
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }

        .photo-item:hover p {
            transform: translateY(0);
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
            backdrop-filter: blur(5px);
        }

        .back-button:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateX(-5px);
            color: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Modal styling */
        .modal-content {
            background: rgba(26, 27, 60, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .modal-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .modal-body img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        @keyframes colorSlide {
            0% { background-position: 0% 0; }
            100% { background-position: 100% 0; }
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <h1>{{ $fullTitle }}</h1>
    </div>

    <div class="container">
        <a href="{{ route('gallery.index') }}" class="back-button">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="jurusan-header">
            <img src="{{ asset($logoPath) }}" alt="{{ $title }} Logo" class="jurusan-logo">
            <div class="jurusan-info">
                <h1>{{ $title }}</h1>
                <p class="jurusan-description">{{ $description }}</p>
            </div>
        </div>

        <div class="features-section">
            <h2 class="section-title">Keunggulan Jurusan</h2>
            @foreach($features as $feature)
            <div class="feature-item">
                <div class="feature-title">{{ $feature['title'] }}</div>
                <p>{{ $feature['description'] }}</p>
            </div>
            @endforeach
        </div>

        <h2 class="section-title">Galeri {{ $title }}</h2>
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