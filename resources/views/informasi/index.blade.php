<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Terkini - SMKN 4 BOGOR</title>
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

        .info-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-5px);
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
    </style>
</head>
<body>
    <div class="top-bar">
        <h1>Informasi Terkini SMKN 4 BOGOR</h1>
    </div>

    <div class="container">
        <a href="{{ route('gallery.index') }}" class="back-button">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="info-card">
            <h3><i class="fas fa-newspaper"></i> Update Kurikulum</h3>
            <p class="text-white-50">25 Oktober 2023</p>
            <p>Kurikulum baru akan diterapkan mulai semester depan untuk meningkatkan kualitas pembelajaran.</p>
        </div>

        <div class="info-card">
            <h3><i class="fas fa-trophy"></i> Prestasi Siswa</h3>
            <p class="text-white-50">1 November 2023</p>
            <p>Tim robotik SMKN 4 Bogor berhasil memenangkan kompetisi nasional di Jakarta.</p>
        </div>

        <div class="info-card">
            <h3><i class="fas fa-calendar-alt"></i> Pengumuman Libur</h3>
            <p class="text-white-50">5 November 2023</p>
            <p>Libur akhir tahun akan dimulai tanggal 25 Desember 2023 hingga 5 Januari 2024.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 