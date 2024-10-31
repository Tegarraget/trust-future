<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Halaman publik
Route::get('/', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/jurusan/{jurusan}', [JurusanController::class, 'show'])->name('jurusan.show');

// Route untuk komentar publik
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/comments/{photoPath}', [CommentController::class, 'getComments'])->name('comments.get');

// Auth routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
});
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
    Route::delete('/admin/{admin}', [AdminController::class, 'destroy'])->name('admin.destroy');

    // Tambahkan route untuk album
    Route::get('/album/{id}', [AlbumController::class, 'show'])->name('album.show');
    Route::post('/album/{id}/upload', [AlbumController::class, 'uploadPhoto'])->name('album.upload');
    Route::delete('/album/{albumId}/photo/{photoId}', [AlbumController::class, 'deletePhoto'])->name('album.deletePhoto');
    Route::patch('/album/{id}/name', [AlbumController::class, 'updateName'])->name('album.updateName');
    Route::patch('/album/{albumId}/photo/{photoId}/name', [AlbumController::class, 'updatePhotoName'])
        ->name('album.updatePhotoName');
    Route::delete('/album/{id}', [AlbumController::class, 'deleteAlbum'])->name('album.delete');
    Route::post('/album/create', [AlbumController::class, 'createAlbum'])->name('album.create');

    Route::get('/photos', [PhotoController::class, 'index'])->name('photos.index');

    // Tambahkan route untuk komentar
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::post('/comments/{comment}/reply', [CommentController::class, 'reply'])->name('comments.reply');
    Route::get('/comments/{photoPath}', [CommentController::class, 'getComments'])->name('comments.get');
});
