<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Foto - SMKN 4 BOGOR</title>
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

        .gallery-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            padding: 20px;
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

        .back-button {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            text-decoration: none;
            display: inline-block;
            margin: 20px;
            transition: all 0.3s ease;
        }

        .back-button:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateX(-5px);
            color: white;
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <h1>Semua Foto</h1>
    </div>

    <a href="{{ route('dashboard') }}" class="back-button">
        <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
    </a>

    <div class="container">
        <div class="gallery-container">
            @forelse ($photos as $photo)
                <div class="photo-item" onclick="showPhotoModal('{{ asset($photo['path']) }}')">
                    <img src="{{ asset($photo['path']) }}" alt="{{ $photo['name'] }}">
                    <p>{{ $photo['name'] }}</p>
                </div>
            @empty
                <div class="text-center w-100">
                    <h3>Tidak ada foto yang ditemukan</h3>
                </div>
            @endforelse
        </div>
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