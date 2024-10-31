@extends('dashboard.dashboard')

@section('title', $album['name'])

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-light btn-sm me-3">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <h5 class="mb-0" style="color: #ffffff; text-shadow: 0 0 10px rgba(255, 255, 255, 0.3);">
                <span id="albumName">{{ $album['name'] }}</span>
                <button class="btn btn-link text-white p-0 ms-2" onclick="showEditNameForm()">
                    <i class="bi bi-pencil-square"></i>
                </button>
            </h5>
            <!-- Form Edit Nama -->
            <form id="editNameForm" action="{{ route('album.updateName', $album['id']) }}" 
                  method="POST" class="d-none ms-3">
                @csrf
                @method('PATCH')
                <div class="input-group">
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
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#uploadPhotoModal">
            <i class="bi bi-plus-lg"></i> Tambah Foto
        </button>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="photo-grid">
            @foreach($album['photos'] as $photo)
            <div class="photo-item">
                <img src="{{ $photo['url'] }}" alt="Photo" class="album-photo">
                <div class="photo-info">
                    <span class="photo-name" id="photoName_{{ $photo['id'] }}">
                        {{ $photo['name'] }}
                    </span>
                    <button class="btn btn-link btn-sm text-white p-0 ms-2" 
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
                        <div class="input-group input-group-sm">
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
                <div class="photo-overlay">
                    <div class="photo-actions">
                        <button class="btn btn-light btn-sm me-2" onclick="previewImage(`{{ $photo['url'] }}`)">
                            <i class="bi bi-eye"></i>
                        </button>
                        <form action="{{ route('album.deletePhoto', ['albumId' => $album['id'], 'photoId' => $photo['id']]) }}" 
                              method="POST" class="d-inline" 
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="filename" value="{{ $photo['filename'] }}">
                            <button type="submit" class="btn btn-danger btn-sm">
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
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('album.upload', $album['id']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="photos" class="form-label">Pilih Foto</label>
                        <input type="file" class="form-control" id="photos" name="photos[]" accept="image/*" multiple required>
                        <div class="form-text">Format yang didukung: JPG, JPEG, PNG, GIF. Maksimal 2MB per file.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Preview</label>
                        <div id="previewContainer" class="d-flex flex-wrap gap-2">
                            <!-- Preview images will be added here -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
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
                <img src="" id="previewImage" class="img-fluid rounded">
            </div>
        </div>
    </div>
</div>

<style>
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
    }

    .album-photo {
        width: 100%;
        height: auto;
        object-fit: contain;
        display: block;
    }

    .photo-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 60px;
        background: rgba(0, 0, 0, 0.5);
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

    .photo-actions button {
        padding: 8px 12px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .photo-actions button:hover {
        transform: scale(1.1);
    }

    .btn-outline-light {
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: #ffffff;
        transition: all 0.3s ease;
    }

    .btn-outline-light:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.5);
        transform: translateX(-3px);
    }

    .btn-outline-light i {
        margin-right: 5px;
    }

    .photo-actions form {
        margin: 0;
    }

    .photo-actions .btn {
        width: 35px;
        height: 35px;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .photo-actions .btn-danger:hover {
        animation: shake 0.5s;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-2px); }
        75% { transform: translateX(2px); }
    }

    .photo-info {
        padding: 10px;
        background: rgba(0, 0, 0, 0.7);
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        color: white;
        display: flex;
        align-items: center;
        justify-content: space-between;
        z-index: 2;
        min-height: 60px;
    }

    .photo-name {
        font-size: 0.9rem;
        margin-right: 10px;
        flex-grow: 1;
    }

    .edit-photo-form {
        flex-grow: 1;
        position: relative;
        z-index: 3;
    }

    .edit-photo-form .input-group {
        background: rgba(0, 0, 0, 0.8);
        padding: 5px;
        border-radius: 4px;
    }

    .edit-photo-form input {
        background: rgba(255, 255, 255, 0.9);
        border: none;
        color: #333;
    }

    .photo-info button,
    .edit-photo-form button {
        position: relative;
        z-index: 3;
    }

    #previewContainer {
        max-height: 300px;
        overflow-y: auto;
        padding: 10px;
        background: rgba(0, 0, 0, 0.05);
        border-radius: 5px;
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