<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    public function index()
    {
        $pplgPhotos = $this->getPhotosFromPath('photos/jurusan/pplg');
        $tjktPhotos = $this->getPhotosFromPath('photos/jurusan/tjkt');
        $tflmPhotos = $this->getPhotosFromPath('photos/jurusan/tflm');
        $tkrPhotos = $this->getPhotosFromPath('photos/jurusan/tkr');
        $agendaPhotos = $this->getPhotosFromPath('photos/agenda');
        $infoPhotos = $this->getPhotosFromPath('photos/info');

        return view('dashboard.Kategori.index', compact(
            'pplgPhotos',
            'tjktPhotos',
            'tflmPhotos',
            'tkrPhotos',
            'agendaPhotos',
            'infoPhotos'
        ));
    }

    private function getPhotosFromPath($path)
    {
        if (!Storage::disk('public')->exists($path)) {
            return collect([]);
        }

        return collect(Storage::disk('public')->files($path))
            ->map(function($file) {
                return [
                    'name' => basename($file),
                    'path' => Storage::url($file)
                ];
            });
    }
} 