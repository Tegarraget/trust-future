<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    public function index()
    {
        $photos = collect(Storage::disk('public')->files('photos/info'))
            ->map(function ($file) {
                return [
                    'name' => basename($file),
                    'path' => Storage::url($file)
                ];
            });

        return view('gallery.informasi', compact('photos'));
    }
}
