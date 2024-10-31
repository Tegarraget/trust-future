<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function show($id)
    {
        // Ambil semua file dari direktori album
        $photos = collect(Storage::disk('public')->files("photos/album_{$id}"))
            ->map(function($file, $index) {
                $photoInfo = $this->getPhotoInfo($file);
                return [
                    'id' => $index + 1,
                    'url' => asset('storage/' . $file),
                    'name' => $photoInfo['name'] ?? pathinfo($file, PATHINFO_FILENAME),
                    'filename' => $file
                ];
            });

        $albumInfo = $this->getAlbumInfo($id);
        
        $album = [
            'id' => $id,
            'name' => $albumInfo['name'] ?? 'Album ' . $id,
            'created_at' => $albumInfo['created_at'] ?? date('Y-m-d'),
            'photos' => $photos
        ];

        return view('dashboard.album.show', compact('album'));
    }

    public function updatePhotoName(Request $request, $albumId, $photoId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'filename' => 'required'
        ]);

        $photoInfo = [
            'name' => $request->name,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Simpan informasi foto ke file json
        $infoPath = 'photos_info/' . pathinfo($request->filename, PATHINFO_FILENAME) . '.json';
        Storage::disk('public')->put($infoPath, json_encode($photoInfo));

        return redirect()->back()->with('success', 'Nama foto berhasil diperbarui!');
    }

    private function getPhotoInfo($filepath)
    {
        $infoPath = 'photos_info/' . pathinfo($filepath, PATHINFO_FILENAME) . '.json';
        if (Storage::disk('public')->exists($infoPath)) {
            return json_decode(Storage::disk('public')->get($infoPath), true);
        }
        return [];
    }

    public function updateName(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $albumInfo = [
            'name' => $request->name,
            'created_at' => date('Y-m-d')
        ];

        // Simpan informasi album ke file json
        Storage::disk('public')->put("albums/album_{$id}.json", json_encode($albumInfo));

        return redirect()->back()->with('success', 'Nama album berhasil diperbarui!');
    }

    private function getAlbumInfo($id)
    {
        $path = "albums/album_{$id}.json";
        if (Storage::disk('public')->exists($path)) {
            return json_decode(Storage::disk('public')->get($path), true);
        }
        return [];
    }

    public function deletePhoto($albumId, $photoId)
    {
        // Hapus file dari storage
        $filename = request('filename');
        if (Storage::disk('public')->exists($filename)) {
            Storage::disk('public')->delete($filename);
            return redirect()->back()->with('success', 'Foto berhasil dihapus!');
        }
        
        return redirect()->back()->with('error', 'Foto tidak ditemukan!');
    }

    public function uploadPhoto(Request $request, $albumId)
    {
        $request->validate([
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('photos')) {
            $uploadedFiles = [];
            $failedFiles = [];
            
            foreach($request->file('photos') as $file) {
                try {
                    $filename = time() . '_' . $file->getClientOriginalName();
                    
                    // Buat direktori untuk album jika belum ada
                    $directory = "photos/album_{$albumId}";
                    if (!Storage::disk('public')->exists($directory)) {
                        Storage::disk('public')->makeDirectory($directory);
                    }
                    
                    // Simpan file ke direktori album
                    $path = $file->storeAs($directory, $filename, 'public');
                    $uploadedFiles[] = $filename;
                } catch (\Exception $e) {
                    $failedFiles[] = $file->getClientOriginalName();
                }
            }
            
            $message = count($uploadedFiles) . ' foto berhasil diupload';
            if (count($failedFiles) > 0) {
                $message .= ', ' . count($failedFiles) . ' foto gagal diupload';
            }
            
            return redirect()->back()->with('success', $message);
        }

        return redirect()->back()->with('error', 'Pilih foto terlebih dahulu!');
    }

    public function deleteAlbum($id)
    {
        // Hapus semua foto dalam album
        $directory = "photos/album_{$id}";
        if (Storage::disk('public')->exists($directory)) {
            Storage::disk('public')->deleteDirectory($directory);
        }

        // Hapus file info album
        $albumInfoPath = "albums/album_{$id}.json";
        if (Storage::disk('public')->exists($albumInfoPath)) {
            Storage::disk('public')->delete($albumInfoPath);
        }

        // Hapus info foto-foto dalam album
        $photos = Storage::disk('public')->files($directory);
        foreach ($photos as $photo) {
            $infoPath = 'photos_info/' . pathinfo($photo, PATHINFO_FILENAME) . '.json';
            if (Storage::disk('public')->exists($infoPath)) {
                Storage::disk('public')->delete($infoPath);
            }
        }

        return redirect()->route('dashboard')->with('success', 'Album berhasil dihapus!');
    }

    public function createAlbum(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        // Buat direktori albums jika belum ada
        if (!Storage::disk('public')->exists('albums')) {
            Storage::disk('public')->makeDirectory('albums');
        }

        // Cari ID album berikutnya
        $existingAlbums = collect(Storage::disk('public')->files('albums'))
            ->map(function($file) {
                return (int) str_replace(['albums/album_', '.json'], '', $file);
            });
        
        $nextId = $existingAlbums->isEmpty() ? 1 : $existingAlbums->max() + 1;

        $albumInfo = [
            'name' => $request->name,
            'created_at' => date('Y-m-d')
        ];

        // Buat direktori album
        $directory = "photos/album_{$nextId}";
        Storage::disk('public')->makeDirectory($directory);

        // Simpan informasi album
        Storage::disk('public')->put("albums/album_{$nextId}.json", json_encode($albumInfo));

        return redirect()->route('dashboard')->with('success', 'Album baru berhasil dibuat!');
    }
} 