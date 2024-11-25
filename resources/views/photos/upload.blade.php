@extends('layouts.app')

@section('content')
<div class="container mt-4">
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

    <!-- Preview area untuk foto yang sudah diupload -->
    <div class="card mt-4" style="background: rgba(255, 255, 255, 0.1);">
        <div class="card-header">
            <h3 class="card-title text-white">Preview Foto</h3>
        </div>
        <div class="card-body">
            <div id="preview" class="d-none">
                <img id="photoPreview" src="#" alt="Preview" class="img-fluid mb-3">
            </div>
        </div>
    </div>
</div>

<script>
    // Preview foto sebelum upload
    document.getElementById('photo').addEventListener('change', function(e) {
        const preview = document.getElementById('preview');
        const photoPreview = document.getElementById('photoPreview');
        
        if (e.target.files && e.target.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                photoPreview.src = e.target.result;
                preview.classList.remove('d-none');
            }
            
            reader.readAsDataURL(e.target.files[0]);
        }
    });
</script>
@endsection 