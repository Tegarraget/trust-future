<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestasi Siswa - SMKN 4 BOGOR</title>
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

        .achievement-list {
            list-style: none;
            padding: 0;
        }

        .achievement-item {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            transition: transform 0.3s ease;
        }

        .achievement-item:hover {
            transform: translateX(10px);
            background: rgba(255, 255, 255, 0.1);
        }

        .achievement-title {
            color: #3a7bd5;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <h1>Prestasi Siswa</h1>
    </div>

    <div class="container">
        <a href="{{ route('informasi.index') }}" class="back-button">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="content-card">
            <div class="date">1 November 2023</div>
            <div class="content">
                <h2>Prestasi Tim Robotik SMKN 4 Bogor</h2>
                <p>Tim robotik SMKN 4 Bogor berhasil memenangkan kompetisi nasional di Jakarta. Prestasi ini membuktikan kualitas pendidikan di sekolah kita dan dedikasi para siswa dalam mengembangkan kemampuan mereka.</p>
                
                <h3 class="mt-4 mb-3">Detail Prestasi:</h3>
                <ul class="achievement-list">
                    <li class="achievement-item">
                        <div class="achievement-title">Juara 1 Kategori Robot Line Follower</div>
                        <p>Tim berhasil membuat robot yang dapat mengikuti jalur dengan presisi tinggi dan kecepatan optimal.</p>
                    </li>
                    <li class="achievement-item">
                        <div class="achievement-title">Best Innovation Award</div>
                        <p>Penghargaan untuk inovasi dalam pengembangan sistem kontrol robot yang efisien.</p>
                    </li>
                    <li class="achievement-item">
                        <div class="achievement-title">Best Team Collaboration</div>
                        <p>Penghargaan untuk kerjasama tim yang luar biasa selama kompetisi.</p>
                    </li>
                </ul>

                <h3 class="mt-4 mb-3">Tim Robotik:</h3>
                <ul>
                    <li>Ahmad Fajar (Ketua Tim)</li>
                    <li>Siti Nurhaliza (Programmer)</li>
                    <li>Budi Santoso (Desainer Mekanik)</li>
                    <li>Dewi Putri (Sistem Kontrol)</li>
                </ul>

                <div class="mt-4">
                    <h3>Dampak Prestasi:</h3>
                    <ul>
                        <li>Meningkatkan reputasi SMKN 4 Bogor di tingkat nasional</li>
                        <li>Membuka peluang kerjasama dengan industri robotik</li>
                        <li>Memotivasi siswa lain untuk berprestasi</li>
                        <li>Pengembangan fasilitas laboratorium robotik</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 