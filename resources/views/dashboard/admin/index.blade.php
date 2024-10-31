@extends('dashboard.dashboard')

@section('title', 'Manajemen Admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0" style="color: #ffffff; text-shadow: 0 0 10px rgba(255, 255, 255, 0.3);">Daftar Admin</h5>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAdminModal">
                <i class="bi bi-plus"></i> Tambah Admin
            </button>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="color: #333;">No</th>
                        <th style="color: #333;">Nama</th>
                        <th style="color: #333;">Email</th>
                        <th style="color: #333;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $index => $admin)
                        <tr>
                            <td style="color: #333;">{{ $index + 1 }}</td>
                            <td style="color: #333;">{{ $admin->name }}</td>
                            <td style="color: #333;">{{ $admin->email }}</td>
                            <td>
                                <form action="{{ route('admin.destroy', $admin->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" 
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus admin ini?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah Admin -->
<div class="modal fade" id="addAdminModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Admin Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                               id="password" name="password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 