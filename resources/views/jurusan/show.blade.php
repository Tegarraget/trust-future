<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $jurusanInfo['title'] }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #1a1b3c, #2a2b5c);
            min-height: 100vh;
            color: white;
            font-family: 'Poppins', sans-serif;
        }

        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: #2a2b5c;
            padding: 15px 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .jurusan-container {
            padding-top: 100px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .jurusan-header {
            display: flex;
            align-items: center;
            gap: 30px;
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
        }

        .jurusan-logo {
            width: 150px;
            height: 150px;
            object-fit: contain;
            background: rgba(255, 255, 255, 0.05);
            padding: 15px;
            border-radius: 10px;
        }

        .jurusan-info h1 {
            color: white;
            margin-bottom: 15px;
            text-shadow: 0 2px 10px rgba(255, 255, 255, 0.2);
        }

        .back-button {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
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
    <div class="header">
        <div class="container">
            <a href="{{ route('gallery.index') }}" class="back-button">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <div class="jurusan-container">
        <div class="jurusan-header">
            <img src="{{ $jurusanInfo['image'] }}" alt="{{ $jurusanInfo['name'] }}" class="jurusan-logo">
            <div class="jurusan-info">
                <h1>{{ $jurusanInfo['title'] }}</h1>
                <p>{{ $jurusanInfo['description'] }}</p>
            </div>
        </div>

        <!-- Tambahkan konten tambahan sesuai kebutuhan -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 