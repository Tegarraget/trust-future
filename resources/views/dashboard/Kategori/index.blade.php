@extends('dashboard.dashboard')

@section('title', 'Kategori')

@section('content')
<div class="container mt-4">
    <!-- Form Upload -->
    <div class="card" style="background: rgba(255, 255, 255, 0.1);">
        <div class="card-header">
            <h3 class="card-title text-white">Upload Foto</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
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

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-3">
                    <label for="category" class="form-label text-white">Kategori</label>
                    <select class="form-select" id="category" name="category" required>
                        <option value="">Pilih Kategori</option>
                        <optgroup label="Jurusan">
                            <option value="jurusan_pplg">PPLG</option>
                            <option value="jurusan_tjkt">TJKT</option>
                            <option value="jurusan_tflm">TFLM</option>
                            <option value="jurusan_tkr">TKR</option>
                        </optgroup>
                        <optgroup label="Lainnya">
                            <option value="agenda">Agenda</option>
                            <option value="info">Informasi Terkini</option>
                        </optgroup>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label text-white">Nama Foto</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label text-white">Pilih Foto</label>
                    <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
                </div>

                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>

    <!-- Tampilan Kategori -->
    <!-- PPLG -->
    <div class="card mb-4" style="background: rgba(255, 255, 255, 0.1);">
        <div class="card-header">
            <h3 class="card-title text-white">PPLG</h3>
        </div>
        <div class="card-body">
            <div class="gallery-container">
                @forelse ($pplgPhotos as $photo)
                    <div class="photo-item position-relative">
                        <img src="{{ $photo['path'] }}" alt="{{ $photo['name'] }}" onclick="showPhotoModal('{{ $photo['path'] }}')">
                        <p>{{ $photo['name'] }}</p>
                        <form action="{{ route('photos.destroy', ['category' => 'jurusan_pplg', 'filename' => $photo['name']]) }}" 
                              method="POST" 
                              class="position-absolute top-0 end-0 m-2"
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm rounded-circle">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                @empty
                    <p class="text-white">Belum ada foto untuk PPLG</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- TJKT -->
    <div class="card mb-4" style="background: rgba(255, 255, 255, 0.1);">
        <div class="card-header">
            <h3 class="card-title text-white">TJKT</h3>
        </div>
        <div class="card-body">
            <div class="gallery-container">
                @forelse ($tjktPhotos as $photo)
                    <div class="photo-item position-relative">
                        <img src="{{ $photo['path'] }}" alt="{{ $photo['name'] }}" onclick="showPhotoModal('{{ $photo['path'] }}')">
                        <p>{{ $photo['name'] }}</p>
                        <form action="{{ route('photos.destroy', ['category' => 'jurusan_tjkt', 'filename' => $photo['name']]) }}" 
                              method="POST" 
                              class="position-absolute top-0 end-0 m-2"
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm rounded-circle">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                @empty
                    <p class="text-white">Belum ada foto untuk TJKT</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- TFLM -->
    <div class="card mb-4" style="background: rgba(255, 255, 255, 0.1);">
        <div class="card-header">
            <h3 class="card-title text-white">TFLM</h3>
        </div>
        <div class="card-body">
            <div class="gallery-container">
                @forelse ($tflmPhotos as $photo)
                    <div class="photo-item position-relative">
                        <img src="{{ $photo['path'] }}" alt="{{ $photo['name'] }}" onclick="showPhotoModal('{{ $photo['path'] }}')">
                        <p>{{ $photo['name'] }}</p>
                        <form action="{{ route('photos.destroy', ['category' => 'jurusan_tflm', 'filename' => $photo['name']]) }}" 
                              method="POST" 
                              class="position-absolute top-0 end-0 m-2"
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm rounded-circle">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                @empty
                    <p class="text-white">Belum ada foto untuk TFLM</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- TKR -->
    <div class="card mb-4" style="background: rgba(255, 255, 255, 0.1);">
        <div class="card-header">
            <h3 class="card-title text-white">TKR</h3>
        </div>
        <div class="card-body">
            <div class="gallery-container">
                @forelse ($tkrPhotos as $photo)
                    <div class="photo-item position-relative">
                        <img src="{{ $photo['path'] }}" alt="{{ $photo['name'] }}" onclick="showPhotoModal('{{ $photo['path'] }}')">
                        <p>{{ $photo['name'] }}</p>
                        <form action="{{ route('photos.destroy', ['category' => 'jurusan_tkr', 'filename' => $photo['name']]) }}" 
                              method="POST" 
                              class="position-absolute top-0 end-0 m-2"
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm rounded-circle">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                @empty
                    <p class="text-white">Belum ada foto untuk TKR</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Agenda -->
    <div class="card mb-4" style="background: rgba(255, 255, 255, 0.1);">
        <div class="card-header">
            <h3 class="card-title text-white">Agenda</h3>
        </div>
        <div class="card-body">
            <div class="gallery-container">
                @forelse ($agendaPhotos as $photo)
                    <div class="photo-item position-relative">
                        <img src="{{ $photo['path'] }}" alt="{{ $photo['name'] }}" onclick="showPhotoModal('{{ $photo['path'] }}')">
                        <p>{{ $photo['name'] }}</p>
                        <form action="{{ route('photos.destroy', ['category' => 'agenda', 'filename' => $photo['name']]) }}" 
                              method="POST" 
                              class="position-absolute top-0 end-0 m-2"
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm rounded-circle">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                @empty
                    <p class="text-white">Belum ada foto untuk Agenda</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Informasi -->
    <div class="card mb-4" style="background: rgba(255, 255, 255, 0.1);">
        <div class="card-header">
            <h3 class="card-title text-white">Informasi</h3>
        </div>
        <div class="card-body">
            <div class="gallery-container">
                @forelse ($infoPhotos as $photo)
                    <div class="photo-item position-relative">
                        <img src="{{ $photo['path'] }}" alt="{{ $photo['name'] }}" onclick="showPhotoModal('{{ $photo['path'] }}')">
                        <p>{{ $photo['name'] }}</p>
                        <form action="{{ route('photos.destroy', ['category' => 'info', 'filename' => $photo['name']]) }}" 
                              method="POST" 
                              class="position-absolute top-0 end-0 m-2"
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm rounded-circle">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                @empty
                    <p class="text-white">Belum ada foto untuk Informasi</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk preview foto -->
<div class="modal fade" id="photoModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-header border-0">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0 text-center">
                <img src="" id="modalImage" class="img-fluid rounded">
            </div>
        </div>
    </div>
</div>

<script>
    function showPhotoModal(imagePath) {
        document.getElementById('modalImage').src = imagePath;
        var photoModal = new bootstrap.Modal(document.getElementById('photoModal'));
        photoModal.show();
    }
</script>

<style>
    .photo-item {
        position: relative;
    }

    .photo-item form {
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .photo-item:hover form {
        opacity: 1;
    }

    .btn-danger.rounded-circle {
        width: 32px;
        height: 32px;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(220, 53, 69, 0.9);
        border: none;
    }

    .btn-danger.rounded-circle:hover {
        background: #dc3545;
        transform: scale(1.1);
    }

    .photo-item .btn-danger {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 10;
    }
</style>
@endsection 