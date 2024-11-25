<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    protected $fillable = ['name', 'path', 'category'];

    public static function getAllPhotos()
    {
        $photos = [];
        $files = Storage::disk('public')->allFiles('photos');

        foreach ($files as $file) {
            $name = basename($file);
            $path = Storage::url($file);
            $photos[] = new Photo(['path' => $path, 'name' => $name]);
        }

        return collect($photos);
    }

    public function getUrlAttribute()
    {
        return Storage::url($this->path);
    }

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
} 