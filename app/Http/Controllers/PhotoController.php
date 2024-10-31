<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function index()
    {
        $allPhotos = collect();
        
        $albums = collect(Storage::disk('public')->files('albums'))
            ->filter(function($file) {
                return str_contains($file, 'album_') && str_ends_with($file, '.json');
            })
            ->map(function($file) {
                $id = (int) str_replace(['albums/album_', '.json'], '', $file);
                return $id;
            });

        foreach ($albums as $albumId) {
            $photos = collect(Storage::disk('public')->files("photos/album_{$albumId}"))
                ->map(function($file) use ($albumId) {
                    $photoInfo = $this->getPhotoInfo($file);
                    return [
                        'id' => pathinfo($file, PATHINFO_FILENAME),
                        'url' => asset('storage/' . $file),
                        'name' => $photoInfo['name'] ?? pathinfo($file, PATHINFO_FILENAME),
                        'filename' => $file,
                        'album_id' => $albumId,
                        'created_at' => Storage::disk('public')->lastModified($file)
                    ];
                });
            $allPhotos = $allPhotos->concat($photos);
        }

        $allPhotos = $allPhotos->sortByDesc('created_at');

        return view('photos.index', compact('allPhotos'));
    }

    private function getPhotoInfo($filepath)
    {
        $infoPath = 'photos_info/' . pathinfo($filepath, PATHINFO_FILENAME) . '.json';
        if (Storage::disk('public')->exists($infoPath)) {
            return json_decode(Storage::disk('public')->get($infoPath), true);
        }
        return [];
    }
} 