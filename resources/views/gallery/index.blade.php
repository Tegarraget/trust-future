<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Galeri Foto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #1a1b3c, #2a2b5c);
            min-height: 100vh;
            color: white;
            font-family: 'Poppins', sans-serif;
        }

        .gallery-container {
            padding: 30px;
        }

        .album-section {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 30px;
        }

        .album-title {
            color: white;
            font-size: 1.5rem;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .photo-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            padding: 15px;
        }

        .photo-item {
            flex: 0 0 calc(20% - 12px);
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            background: rgba(0, 0, 0, 0.1);
            aspect-ratio: 1;
        }

        .photo-item img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            background: rgba(0, 0, 0, 0.1);
            display: block;
        }

        /* Responsive adjustments dengan fixed aspect ratio */
        @media (max-width: 1400px) {
            .photo-item {
                flex: 0 0 calc(25% - 12px);
            }
        }

        @media (max-width: 1200px) {
            .photo-item {
                flex: 0 0 calc(33.333% - 12px);
            }
        }

        @media (max-width: 768px) {
            .photo-item {
                flex: 0 0 calc(50% - 8px);
            }
        }

        @media (max-width: 576px) {
            .photo-item {
                flex: 0 0 100%;
            }
        }

        .photo-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 10px;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
            color: white;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .photo-item:hover .photo-overlay {
            opacity: 1;
        }

        /* Modal styles */
        .modal-content {
            background: rgba(26, 27, 60, 0.95);
            backdrop-filter: blur(10px);
            border: none;
        }

        .modal-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .modal-header .btn-close {
            filter: invert(1);
        }

        #previewImage {
            max-height: 80vh;
            object-fit: contain;
        }

        .photo-info {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 8px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            text-align: center;
        }

        .photo-name {
            font-size: 0.9rem;
            display: block;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .photo-overlay {
            bottom: 35px;
        }

        /* Tambahkan style untuk tombol login */
        .login-button {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }

        .btn-login {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-login:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .gallery-title {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 15px 30px;
            border-radius: 15px;
            display: inline-block;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .gallery-title h1 {
            margin: 0;
            color: white;
            text-shadow: 0 2px 10px rgba(255, 255, 255, 0.2);
        }

        /* Tambahkan style untuk header */
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

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .gallery-title {
            margin: 0;
            background: none;
            padding: 0;
            box-shadow: none;
            border: none;
        }

        .gallery-container {
            padding-top: 100px;
            /* Sesuaikan dengan tinggi header */
        }

        /* Update style login button */
        .login-button {
            position: static;
            /* Ubah dari fixed menjadi static */
        }

        /* Style untuk video background */
        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .video-background video {
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            object-fit: cover;
        }

        /* Tambahkan overlay untuk membuat konten lebih terbaca */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(26, 27, 60, 0.7);
            z-index: -1;
        }

        .jurusan-container {
            padding: 30px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            margin-top: 10px;
        }

        .jurusan-grid {
            display: grid;
            gap: 30px;
            grid-template-columns: 1fr;
        }

        .jurusan-item {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .jurusan-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .jurusan-image {
            flex-shrink: 0;
        }

        .jurusan-image img {
            width: 100px;
            height: 100px;
            border-radius: 10px;
            object-fit: contain;
        }

        .jurusan-content {
            flex-grow: 1;
        }

        .jurusan-content h3 {
            color: white;
            margin-bottom: 10px;
            font-size: 1.5rem;
            text-shadow: 0 2px 10px rgba(255, 255, 255, 0.2);
        }

        .jurusan-content p {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.6;
            margin: 0;
        }

        @media (max-width: 768px) {
            .jurusan-item {
                flex-direction: column;
                text-align: center;
            }

            .jurusan-image img {
                width: 80px;
                height: 80px;
            }
        }

        .section-title {
            text-align: center;
            padding: 15px;
            color: white;
            margin-top: 30px;
        }

        .section-title h2 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 5px;
            text-shadow: 0 2px 10px rgba(255, 255, 255, 0.2);
        }

        .section-title p {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
            max-width: 600px;
            margin: 0 auto;
        }

        .jurusan-container {
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            margin: 10px 20px;
        }

        .gallery-container {
            padding: 20px;
            margin-top: 10px;
        }

        /* Tambahkan style untuk container utama */
        .main-wrapper {
            max-width: 1400px;
            margin: 0 auto;
            padding: 80px 15px 30px;
        }

        /* Update responsive styles */
        @media (max-width: 768px) {
            .section-title {
                margin-top: 20px;
            }

            .jurusan-container,
            .gallery-container {
                margin: 10px;
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="header-content">
            <div class="gallery-title">
                <h1>Galeri Sekolah</h1>
            </div>
            <div class="login-button">
                <a href="{{ url('/login') }}" class="btn-login">
                    <i class="bi bi-person"></i> Login
                </a>
            </div>
        </div>
    </div>

    <div class="main-wrapper">
        <!-- Tambahkan section title untuk jurusan -->
        <div class="section-title">
            <h2>Jurusan</h2>
            <p>Berikut adalah jurusan-jurusan yang ada di sekolah kami</p>
        </div>

        <div class="jurusan-container">
            <div class="jurusan-grid">
                <!-- PPLG -->
                <div class="jurusan-item">
                    <a href="{{ route('jurusan.show', 'pplg') }}" class="text-decoration-none text-white">
                        <div class="jurusan-image">
                            <img src="{{ asset('storage/logos/pplg.png') }}" alt="PPLG">
                        </div>
                        <div class="jurusan-content">
                            <h3>PPLG</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </a>
                </div>
                
                <!-- TFLM -->
                <div class="jurusan-item">
                    <a href="{{ route('jurusan.show', 'tflm') }}" class="text-decoration-none text-white">
                        <div class="jurusan-image">
                            <img src="{{ asset('storage/logos/tflm.jpeg') }}" alt="TFLM">
                        </div>
                        <div class="jurusan-content">
                            <h3>TFLM</h3>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </a>
                </div>
                
                <!-- TJKT -->
                <div class="jurusan-item">
                    <a href="{{ route('jurusan.show', 'tjkt') }}" class="text-decoration-none text-white">
                        <div class="jurusan-image">
                            <img src="{{ asset('storage/logos/tjkt.png') }}" alt="TJKT">
                        </div>
                        <div class="jurusan-content">
                            <h3>TJKT</h3>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        </div>
                    </a>
                </div>
                
                <!-- TKR -->
                <div class="jurusan-item">
                    <a href="{{ route('jurusan.show', 'tkr') }}" class="text-decoration-none text-white">
                        <div class="jurusan-image">
                            <img src="{{ asset('storage/logos/tkr.png') }}" alt="TKR">
                        </div>
                        <div class="jurusan-content">
                            <h3>TKR</h3>
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Tambahkan section title untuk album -->
        <div class="section-title">
            <h2>Album Foto</h2>
            <p>Dokumentasi kegiatan dan acara sekolah</p>
        </div>

        <div class="gallery-container">
            @foreach($albums as $album)
            @if($album['photos']->isNotEmpty())
            <div class="album-section">
                <h2 class="album-title">{{ $album['name'] }}</h2>
                <div class="photo-grid">
                    @foreach($album['photos'] as $photo)
                    <div class="photo-item">
                        <img src="{{ $photo['url'] }}" alt="Photo">
                        <div class="photo-overlay">
                            <div class="photo-actions">
                                <button class="btn btn-light btn-sm me-2" onclick="previewImage(`{{ $photo['url'] }}`, `{{ $album['name'] }}`)">
                                    <i class="bi bi-zoom-in"></i> Lihat
                                </button>
                                <button class="btn btn-light btn-sm" onclick="showCommentModal(`{{ $photo['url'] }}`)">
                                    <i class="bi bi-chat"></i> Komentar
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>

    <!-- Modal Preview -->
    <div class="modal fade" id="photoPreviewModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="modalTitle"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center p-0">
                    <img src="" id="previewImage" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan modal komentar -->
    <div class="modal fade" id="commentModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Komentar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="commentForm">
                        @csrf
                        <input type="hidden" name="photo_path" id="commentPhotoPath">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Komentar</label>
                            <textarea class="form-control" name="content" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                    
                    <div class="comments-container mt-4">
                        <!-- Komentar akan ditampilkan di sini -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function previewImage(url, albumName) {
            document.getElementById('previewImage').src = url;
            document.getElementById('modalTitle').textContent = albumName;
            new bootstrap.Modal(document.getElementById('photoPreviewModal')).show();
        }

        function showCommentModal(photoUrl) {
            const photoPath = photoUrl.split('/storage/')[1];
            document.getElementById('commentPhotoPath').value = photoPath;
            loadComments(photoPath);
            new bootstrap.Modal(document.getElementById('commentModal')).show();
        }

        document.getElementById('commentForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const submitButton = this.querySelector('button[type="submit"]');
            submitButton.disabled = true;
            submitButton.innerHTML = 'Mengirim...';

            fetch('/comments', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    name: formData.get('name'),
                    content: formData.get('content'),
                    photo_path: formData.get('photo_path')
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    this.reset();
                    alert('Komentar berhasil ditambahkan!');
                    loadComments(formData.get('photo_path'));
                } else {
                    throw new Error(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Gagal menambahkan komentar. Silakan coba lagi.');
            })
            .finally(() => {
                submitButton.disabled = false;
                submitButton.innerHTML = 'Kirim';
            });
        });

        function loadComments(photoPath) {
            fetch(`/comments/${encodeURIComponent(photoPath)}`)
                .then(response => response.json())
                .then(comments => {
                    const container = document.querySelector('.comments-container');
                    if (!comments || comments.length === 0) {
                        container.innerHTML = '<p style="color: white;">Belum ada komentar untuk foto ini. Jadilah yang pertama berkomentar!</p>';
                        return;
                    }
                    
                    container.innerHTML = comments.map(comment => `
                        <div class="comment mb-3 p-3 bg-light rounded">
                            <div class="d-flex justify-content-between mb-2">
                                <strong>${comment.name}</strong>
                                <small class="text-muted">${new Date(comment.created_at).toLocaleDateString()}</small>
                            </div>
                            <p class="mb-2">${comment.content}</p>
                            ${comment.replies.map(reply => `
                                <div class="reply ms-4 mt-2 p-2 bg-white rounded">
                                    <div class="d-flex justify-content-between mb-1">
                                        <strong>Admin</strong>
                                        <small class="text-muted">${new Date(reply.created_at).toLocaleDateString()}</small>
                                    </div>
                                    <p class="mb-0">${reply.content}</p>
                                </div>
                            `).join('')}
                        </div>
                    `).join('');
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.querySelector('.comments-container').innerHTML = 
                        '<p style="color: white;">Belum ada komentar untuk foto ini. Jadilah yang pertama berkomentar!</p>';
                });
        }
    </script>
</body>

</html>