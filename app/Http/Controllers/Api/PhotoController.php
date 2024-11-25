<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index()
    {
        return Photo::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'path' => 'required|string',
        ]);

        return Photo::create($request->all());
    }

    public function show(Photo $photo)
    {
        return $photo;
    }

    public function update(Request $request, Photo $photo)
    {
        $request->validate([
            'name' => 'string|max:255',
            'path' => 'string',
        ]);

        $photo->update($request->all());

        return $photo;
    }

    public function destroy(Photo $photo)
    {
        $photo->delete();

        return response()->noContent();
    }
} 