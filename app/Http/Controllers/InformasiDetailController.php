<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformasiDetailController extends Controller
{
    public function kurikulum()
    {
        return view('gallery.informasi.kurikulum');
    }

    public function prestasi()
    {
        return view('gallery.informasi.prestasi');
    }

    public function libur()
    {
        return view('gallery.informasi.libur');
    }
} 