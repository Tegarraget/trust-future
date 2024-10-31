<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $adminCount = User::count();
        $comments = Comment::whereNull('parent_id')
                         ->with('replies')
                         ->latest()
                         ->take(5)
                         ->get();
        
        return view('dashboard.dashboard', compact('adminCount', 'comments'));
    }
} 