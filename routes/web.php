<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\InformasiDetailController;
use Illuminate\Http\Request;

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
// Route::get('/jurusan/{jurusan}', [JurusanController::class, 'show'])->name('jurusan.show');

Route::get('/jurusan/pplg', [JurusanController::class, 'pplg'])->name('jurusan.pplg');
Route::get('/jurusan/tflm', [JurusanController::class, 'tflm'])->name('jurusan.tflm');
Route::get('/jurusan/tjkt', [JurusanController::class, 'tjkt'])->name('jurusan.tjkt');
Route::get('/jurusan/tkr', [JurusanController::class, 'tkr'])->name('jurusan.tkr');

Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');
Route::get('/informasi', [InformasiController::class, 'index'])->name('informasi.index');
Route::get('/informasi/kurikulum', [InformasiDetailController::class, 'kurikulum'])->name('informasi.kurikulum');
Route::get('/informasi/prestasi', [InformasiDetailController::class, 'prestasi'])->name('informasi.prestasi');
Route::get('/informasi/libur', [InformasiDetailController::class, 'libur'])->name('informasi.libur');

// Auth routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
});
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');

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
    Route::delete('/photos/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');
    Route::post('/photos', [PhotoController::class, 'store'])->name('photos.store');

    Route::get('/photos/category/{category}', [PhotoController::class, 'showByCategory'])->name('photos.category');

    Route::get('/photos/upload', [PhotoController::class, 'uploadForm'])->name('photos.upload');

    Route::delete('/photos/{category}/{filename}', [PhotoController::class, 'destroy'])->name('photos.destroy');

    // Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
    // Route::get('/jurusan/{id}/edit', [JurusanController::class, 'edit'])->name('jurusan.edit');
    // Route::patch('/jurusan/{id}', [JurusanController::class, 'update'])->name('jurusan.update');
});

Route::get('/forgot-password', [ForgotPasswordController::class, 'showResetForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'reset'])->name('password.update');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
