<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - SMKN 4 BOGOR</title>
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
            max-width: 1000px;
        }

        .agenda-container {
            margin-bottom: 20px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: flex-start;
            transition: transform 0.3s ease, background 0.3s ease;
        }

        .agenda-container:hover {
            transform: scale(1.02);
            background: rgba(255, 255, 255, 0.2);
        }

        .agenda-icon {
            font-size: 2rem;
            margin-right: 20px;
            color: #3a7bd5;
            background: white;
            padding: 15px;
            border-radius: 10px;
        }

        .agenda-content {
            flex-grow: 1;
        }

        .agenda-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: white;
        }

        .agenda-date {
            color: #a8b2d1;
            margin-bottom: 10px;
        }

        .agenda-description {
            color: #e6e9f0;
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

        .gallery-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            padding: 15px;
        }

        .photo-item {
            flex: 1 1 calc(20% - 10px); /* Ukuran lebih kecil, 5 foto per baris */
            max-width: calc(20% - 10px);
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            background: rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .photo-item img {
            width: 100%;
            height: 150px; /* Tinggi foto tetap */
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
    <div class="top-bar">
        <h1>Agenda SMKN 4 BOGOR</h1>
    </div>

    <div class="container">
        <a href="{{ route('gallery.index') }}" class="back-button">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="agenda-container">
            <i class="fas fa-laptop-code agenda-icon"></i>
            <div class="agenda-content">
                <h3 class="agenda-title">Workshop Pengembangan Web</h3>
                <p class="agenda-date">10 November 2023</p>
                <p class="agenda-description">Workshop pengembangan web untuk meningkatkan keterampilan siswa dalam pemrograman web modern. Peserta akan belajar tentang HTML5, CSS3, dan JavaScript.</p>
            </div>
        </div>

        <div class="agenda-container">
            <i class="fas fa-microphone agenda-icon"></i>
            <div class="agenda-content">
                <h3 class="agenda-title">Seminar Teknologi Terbaru</h3>
                <p class="agenda-date">15 November 2023</p>
                <p class="agenda-description">Seminar tentang perkembangan teknologi terbaru dan dampaknya terhadap industri. Pembicara dari berbagai perusahaan teknologi akan berbagi pengalaman dan wawasan.</p>
            </div>
        </div>

        <div class="agenda-container">
            <i class="fas fa-building agenda-icon"></i>
            <div class="agenda-content">
                <h3 class="agenda-title">Kunjungan Industri</h3>
                <p class="agenda-date">20 November 2023</p>
                <p class="agenda-description">Kunjungan ke perusahaan teknologi untuk memberikan pengalaman langsung kepada siswa tentang dunia kerja di industri teknologi.</p>
            </div>
        </div>

        <div class="gallery-container">
            @forelse ($photos as $photo)
                <div class="photo-item">
                    <img src="{{ $photo['path'] }}" alt="{{ $photo['name'] }}">
                    <p>{{ $photo['name'] }}</p>
                </div>
            @empty
                <p>Belum ada foto agenda</p>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 