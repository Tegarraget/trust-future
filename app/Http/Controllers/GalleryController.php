<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Album;

class GalleryController extends Controller
{
    public function index()
    {
        $photos = Photo::getAllPhotos();
        
        // Group photos by album
        $albums = [];
        foreach ($photos as $photo) {
            $albumName = $this->getAlbumNameFromPhoto($photo->name);
            $albums[$albumName][] = $photo;
        }

        // Ambil nama album dari model Album
        $albumNames = Album::pluck('name', 'name')->toArray();

        return view('gallery.index', compact('albums', 'albumNames'));
    }

    private function getAlbumNameFromPhoto($photoName)
    {
        // Logic to extract album name from photo name
        // This is a placeholder; adjust according to your naming convention
        return explode('_', $photoName)[0];
    }
} 