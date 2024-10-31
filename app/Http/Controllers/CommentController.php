<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'content' => 'required|string',
                'photo_path' => 'required|string',
            ]);

            $comment = Comment::create([
                'name' => $request->name,
                'content' => $request->content,
                'photo_path' => $request->photo_path,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Komentar berhasil ditambahkan',
                'data' => $comment
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan komentar: ' . $e->getMessage()
            ], 500);
        }
    }

    public function reply(Request $request, Comment $comment)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        Comment::create([
            'name' => 'Admin',
            'content' => $request->content,
            'photo_path' => $comment->photo_path,
            'parent_id' => $comment->id
        ]);

        return back()->with('success', 'Balasan berhasil ditambahkan');
    }

    public function getComments($photoPath)
    {
        try {
            $comments = Comment::where('photo_path', $photoPath)
                              ->whereNull('parent_id')
                              ->with('replies')
                              ->latest()
                              ->get();
                              
            return response()->json($comments);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil komentar: ' . $e->getMessage()
            ], 500);
        }
    }
} 