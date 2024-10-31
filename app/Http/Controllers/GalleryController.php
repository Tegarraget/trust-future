<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        // Ambil semua album
        $albums = collect(Storage::disk('public')->files('albums'))
            ->filter(function($file) {
                return str_contains($file, 'album_') && str_ends_with($file, '.json');
            })
            ->map(function($file) {
                $id = (int) str_replace(['albums/album_', '.json'], '', $file);
                $albumInfo = json_decode(Storage::disk('public')->get($file), true);
                $photos = collect(Storage::disk('public')->files("photos/album_{$id}"));
                
                return [
                    'id' => $id,
                    'name' => $albumInfo['name'] ?? "Album {$id}",
                    'photos' => $photos->map(function($photo) {
                        return [
                            'url' => asset('storage/' . $photo),
                            'name' => pathinfo($photo, PATHINFO_FILENAME)
                        ];
                    })
                ];
            });

        return view('gallery.index', compact('albums'));
    }
} 