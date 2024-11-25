@extends('dashboard.dashboard')

@section('title', $album['name'])

@section('content')
<div class="card glass-card">
    <div class="card-header d-flex justify-content-between align-items-center glow-border">
        <div class="d-flex align-items-center">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-light btn-sm me-3 neon-button">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <h5 class="mb-0 text-glow">
                <span id="albumName">{{ $album['name'] }}</span>
                <button class="btn btn-link text-white p-0 ms-2 edit-btn" onclick="showEditNameForm()">
                    <i class="bi bi-pencil-square"></i>
                </button>
            </h5>
            <!-- Form Edit Nama -->
            <form id="editNameForm" action="{{ route('album.updateName', $album['id']) }}" 
                  method="POST" class="d-none ms-3">
                @csrf
                @method('PATCH')
                <div class="input-group neon-input">
                    <input type="text" class="form-control form-control-sm" 
                           name="name" value="{{ $album['name'] }}" required>
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="bi bi-check"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="hideEditNameForm()">
                        <i class="bi bi-x"></i>
                    </button>
                </div>
            </form>
        </div>
        <button class="btn btn-primary btn-sm neon-button" data-bs-toggle="modal" data-bs-target="#uploadPhotoModal">
            <i class="bi bi-plus-lg"></i> Tambah Foto
        </button>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-glow">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-glow">
                {{ session('error') }}
            </div>
        @endif

        <div class="photo-grid">
            @foreach($album['photos'] as $photo)
            <div class="photo-item neon-border">
                <img src="{{ $photo['url'] }}" alt="Photo" class="album-photo">
                <div class="photo-info glass-effect">
                    <span class="photo-name" id="photoName_{{ $photo['id'] }}">
                        {{ $photo['name'] }}
                    </span>
                    <button class="btn btn-link btn-sm text-white p-0 ms-2 edit-btn" 
                            onclick="showEditPhotoName(`{{ $photo['id'] }}`, `{{ $photo['name'] }}`)">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <!-- Form Edit Nama Foto -->
                    <form id="editPhotoForm_{{ $photo['id'] }}" 
                          action="{{ route('album.updatePhotoName', ['albumId' => $album['id'], 'photoId' => $photo['id']]) }}" 
                          method="POST" 
                          class="d-none edit-photo-form">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="filename" value="{{ $photo['filename'] }}">
                        <div class="input-group input-group-sm neon-input">
                            <input type="text" class="form-control form-control-sm" 
                                   name="name" value="{{ $photo['name'] }}" required>
                            <button type="submit" class="btn btn-success btn-sm">
                                <i class="bi bi-check"></i>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" 
                                    onclick="hideEditPhotoName(`{{ $photo['id'] }}`)">
                                <i class="bi bi-x"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="photo-overlay glass-effect">
                    <div class="photo-actions">
                        <button class="btn btn-light btn-sm me-2 action-btn" onclick="previewImage(`{{ $photo['url'] }}`)">
                            <i class="bi bi-eye"></i>
                        </button>
                        <form action="{{ route('album.deletePhoto', ['albumId' => $album['id'], 'photoId' => $photo['id']]) }}" 
                              method="POST" class="d-inline" 
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="filename" value="{{ $photo['filename'] }}">
                            <button type="submit" class="btn btn-danger btn-sm action-btn">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Modal Upload Foto -->
<div class="modal fade" id="uploadPhotoModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content glass-card">
            <div class="modal-header">
                <h5 class="modal-title text-glow">Upload Foto</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('album.upload', $album['id']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="photos" class="form-label text-glow-subtle">Pilih Foto</label>
                        <input type="file" class="form-control neon-input" id="photos" name="photos[]" accept="image/*" multiple required>
                        <div class="form-text text-glow-subtle">Format yang didukung: JPG, JPEG, PNG, GIF. Maksimal 2MB per file.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-glow-subtle">Preview</label>
                        <div id="previewContainer" class="d-flex flex-wrap gap-2 preview-container">
                            <!-- Preview images will be added here -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary neon-button" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary neon-button">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Preview Foto -->
<div class="modal fade" id="photoPreviewModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-header border-0">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0 text-center">
                <img src="" id="previewImage" class="img-fluid rounded preview-image">
            </div>
        </div>
    </div>
</div>

<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 32px rgba(31, 38, 135, 0.15);
    }

    .glow-border {
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .text-glow {
        color: #fff;
        text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
    }

    .text-glow-subtle {
        color: rgba(255, 255, 255, 0.8);
        text-shadow: 0 0 5px rgba(255, 255, 255, 0.3);
    }

    .neon-button {
        position: relative;
        overflow: hidden;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: white;
        transition: all 0.3s ease;
    }

    .neon-button:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 255, 255, 0.2);
    }

    .neon-button::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 60%);
        opacity: 0;
        transition: 0.5s;
    }

    .neon-button:hover::after {
        opacity: 1;
        transform: scale(1.2);
    }

    .neon-input input {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: white;
    }

    .neon-input input:focus {
        background: rgba(255, 255, 255, 0.15);
        border-color: rgba(255, 255, 255, 0.3);
        box-shadow: 0 0 15px rgba(255, 255, 255, 0.1);
    }

    .photo-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
        padding: 20px;
    }

    .photo-item {
        position: relative;
        border-radius: 10px;
        overflow: hidden;
        background: rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .photo-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(31, 38, 135, 0.2);
    }

    .album-photo {
        width: 100%;
        height: auto;
        object-fit: contain;
        display: block;
        transition: transform 0.3s ease;
    }

    .photo-item:hover .album-photo {
        transform: scale(1.05);
    }

    .glass-effect {
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(5px);
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .photo-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .photo-item:hover .photo-overlay {
        opacity: 1;
    }

    .photo-actions {
        display: flex;
        gap: 10px;
    }

    .action-btn {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.9);
        border: none;
        transition: all 0.3s ease;
    }

    .action-btn:hover {
        transform: scale(1.1);
        box-shadow: 0 0 15px rgba(255, 255, 255, 0.3);
    }

    .action-btn.btn-danger {
        background: rgba(220, 53, 69, 0.9);
        color: white;
    }

    .action-btn.btn-danger:hover {
        background: #dc3545;
    }

    .photo-info {
        padding: 15px;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        color: white;
        display: flex;
        align-items: center;
        min-height: 60px;
    }

    .preview-container {
        background: rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        padding: 15px;
    }

    .preview-image {
        box-shadow: 0 0 30px rgba(255, 255, 255, 0.1);
    }

    .alert-glow {
        animation: alertGlow 2s ease-in-out infinite;
    }

    @keyframes alertGlow {
        0%, 100% { box-shadow: 0 0 5px rgba(255, 255, 255, 0.2); }
        50% { box-shadow: 0 0 20px rgba(255, 255, 255, 0.4); }
    }
</style>

<script>
    function previewImage(url) {
        document.getElementById('previewImage').src = url;
        new bootstrap.Modal(document.getElementById('photoPreviewModal')).show();
    }

    document.getElementById('photos').addEventListener('change', function(e) {
        const previewContainer = document.getElementById('previewContainer');
        previewContainer.innerHTML = ''; // Clear previous previews
        
        Array.from(e.target.files).forEach(file => {
            if (file) {
                const reader = new FileReader();
                const previewDiv = document.createElement('div');
                previewDiv.style.width = '100px';
                previewDiv.style.height = '100px';
                previewDiv.style.position = 'relative';
                
                const img = document.createElement('img');
                img.style.width = '100%';
                img.style.height = '100%';
                img.style.objectFit = 'cover';
                img.style.borderRadius = '5px';
                
                reader.onload = function(e) {
                    img.src = e.target.result;
                }
                
                reader.readAsDataURL(file);
                previewDiv.appendChild(img);
                previewContainer.appendChild(previewDiv);
            }
        });
    });

    function showEditNameForm() {
        document.getElementById('albumName').parentElement.style.display = 'none';
        document.getElementById('editNameForm').classList.remove('d-none');
    }

    function hideEditNameForm() {
        document.getElementById('albumName').parentElement.style.display = 'inline';
        document.getElementById('editNameForm').classList.add('d-none');
    }

    function showEditPhotoName(photoId, currentName) {
        document.getElementById(`photoName_${photoId}`).style.display = 'none';
        document.getElementById(`editPhotoForm_${photoId}`).classList.remove('d-none');
    }

    function hideEditPhotoName(photoId) {
        document.getElementById(`photoName_${photoId}`).style.display = 'inline';
        document.getElementById(`editPhotoForm_${photoId}`).classList.add('d-none');
    }
</script>
@endsection 