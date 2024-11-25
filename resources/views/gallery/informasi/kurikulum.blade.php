<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Kurikulum - SMKN 4 BOGOR</title>
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
            max-width: 800px;
        }

        .content-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 20px;
            backdrop-filter: blur(10px);
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

        .date {
            color: #a8b2d1;
            font-size: 0.9rem;
            margin-bottom: 20px;
        }

        .content {
            line-height: 1.8;
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <h1>Update Kurikulum</h1>
    </div>

    <div class="container">
        <a href="{{ route('informasi.index') }}" class="back-button">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="content-card">
            <div class="date">25 Oktober 2023</div>
            <div class="content">
                <h2>Pembaruan Kurikulum SMKN 4 Bogor</h2>
                <p>Kurikulum baru akan diterapkan mulai semester depan untuk meningkatkan kualitas pembelajaran dan menyesuaikan dengan kebutuhan industri terkini.</p>
                
                <h3>Perubahan Utama:</h3>
                <ul>
                    <li>Penambahan mata pelajaran praktik industri</li>
                    <li>Peningkatan jam praktikum</li>
                    <li>Implementasi pembelajaran berbasis proyek</li>
                    <li>Kolaborasi dengan industri dalam pengembangan materi</li>
                </ul>

                <h3>Manfaat:</h3>
                <ul>
                    <li>Siswa lebih siap menghadapi dunia kerja</li>
                    <li>Peningkatan kompetensi sesuai standar industri</li>
                    <li>Pengembangan soft skill dan hard skill yang seimbang</li>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 