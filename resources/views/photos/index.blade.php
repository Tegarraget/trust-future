@extends('dashboard.dashboard')

@section('title', 'Semua Foto')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-light btn-sm me-3">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <h5 class="mb-0" style="color: #ffffff; text-shadow: 0 0 10px rgba(255, 255, 255, 0.3);">Semua Foto</h5>
        </div>
    </div>
    <div class="card-body">
        <div class="photo-grid">
            @foreach($allPhotos as $photo)
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
                    <form id="editPhotoForm_{{ $photo['id'] }}" 
                          action="{{ route('album.updatePhotoName', ['albumId' => $photo['album_id'], 'photoId' => $photo['id']]) }}" 
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
                        <form action="{{ route('album.deletePhoto', ['albumId' => $photo['album_id'], 'photoId' => $photo['id']]) }}" 
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

<!-- Modal Preview -->
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

    .photo-item img {
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

    .photo-info {
        padding: 10px;
        background: rgba(0, 0, 0, 0.7);
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        color: white;
        text-align: center;
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
</style>

<script>
    function previewImage(url) {
        document.getElementById('previewImage').src = url;
        new bootstrap.Modal(document.getElementById('photoPreviewModal')).show();
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