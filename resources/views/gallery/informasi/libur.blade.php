<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman Libur - SMKN 4 BOGOR</title>
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

        .schedule-item {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            transition: transform 0.3s ease;
        }

        .schedule-item:hover {
            transform: translateX(10px);
            background: rgba(255, 255, 255, 0.1);
        }

        .schedule-date {
            color: #3a7bd5;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .important-note {
            background: rgba(255, 87, 87, 0.1);
            border-left: 4px solid #ff5757;
            padding: 15px;
            margin-top: 20px;
            border-radius: 0 10px 10px 0;
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <h1>Pengumuman Libur</h1>
    </div>

    <div class="container">
        <a href="{{ route('informasi.index') }}" class="back-button">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="content-card">
            <div class="date">5 November 2023</div>
            <div class="content">
                <h2>Pengumuman Libur Akhir Tahun</h2>
                <p>Libur akhir tahun akan dimulai tanggal 25 Desember 2023 hingga 5 Januari 2024. Siswa diharapkan dapat memanfaatkan waktu libur dengan baik untuk istirahat dan persiapan semester baru.</p>
                
                <h3 class="mt-4 mb-3">Jadwal Penting:</h3>
                <div class="schedule-item">
                    <div class="schedule-date">25 Desember 2023</div>
                    <p>Awal masa libur akhir tahun</p>
                </div>
                <div class="schedule-item">
                    <div class="schedule-date">1 Januari 2024</div>
                    <p>Libur Tahun Baru</p>
                </div>
                <div class="schedule-item">
                    <div class="schedule-date">5 Januari 2024</div>
                    <p>Hari terakhir libur</p>
                </div>
                <div class="schedule-item">
                    <div class="schedule-date">8 Januari 2024</div>
                    <p>Masuk sekolah kembali</p>
                </div>

                <div class="important-note">
                    <h4>Catatan Penting:</h4>
                    <ul>
                        <li>Semua tugas harus dikumpulkan sebelum libur dimulai</li>
                        <li>Siswa diharapkan tetap menjaga kesehatan selama libur</li>
                        <li>Persiapkan diri untuk semester baru</li>
                        <li>Jaga nama baik sekolah selama masa libur</li>
                    </ul>
                </div>

                <div class="mt-4">
                    <h3>Kegiatan yang Disarankan Selama Libur:</h3>
                    <ul>
                        <li>Mengulang materi semester sebelumnya</li>
                        <li>Membaca buku-buku yang bermanfaat</li>
                        <li>Mengikuti kursus online yang relevan</li>
                        <li>Istirahat yang cukup</li>
                        <li>Menghabiskan waktu bersama keluarga</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 