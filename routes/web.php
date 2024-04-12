<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginStore'])->name('loginPost');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerStore'])->name('registerPost');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//explore
Route::get('/explore', [ExploreController::class, 'index_explore'])->name('explore');

//upload
Route::group(['middleware' => 'auth'], function() {
    //upload
    Route::get('/upload', [UploadController::class, 'index_upload'])->name('upload');

    //profile
    Route::get('/profile', [ProfileController::class, 'index_profile'])->name('profile');
    Route::get('/editprofile', [ProfileController::class, 'editProfile'])->name('editProfile');
    Route::put('/updateprofile', [ProfileController::class, 'updateProfile'])->name('updateProfile');
    
    //album
    Route::get('/album',[AlbumController::class,'index_create'])->name('album');
    Route::post('/albumcreate',[AlbumController::class,'create_album'])->name('createAlbum');
    Route::delete('/albums/{id}', [AlbumController::class, 'hapus_album'])->name('hapusAlbum');
    Route::get('/detailalbum', [AlbumController::class,'index_album'])->name('detailalbum');
});



