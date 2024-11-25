<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Photo;

class PhotoSeeder extends Seeder
{
    public function run()
    {
        Photo::create([
            'name' => 'Foto Contoh 1',
            'path' => 'storage/photos/foto1.jpg',
            'album_id' => 1
        ]);
        
        // Tambahkan data contoh lainnya
    }
} 