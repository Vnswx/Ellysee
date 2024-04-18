<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PhotoController;
use App\Models\Photo;
use App\Http\Controllers\PDetailController;
use App\Http\Controllers\HomeController;

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

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/actionlogin', [AuthController::class, 'actionlogin'])->name('actionlogin');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/actionregister', [AuthController::class, 'actionregister'])->name('actionregister');

Route::get('/', function () {
    $photos = Photo::all();
    return view('Nav-Point.index', compact('photos'));
})->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/photos/detail', [PDetailController::class, 'index'])->name('detail-photo');
    Route::get('/home', [HomeController::class, 'search'])->name('users.search');
    Route::get('/photos/{encryptedId}', [HomeController::class, 'showPhoto'])->name('detail');
    Route::get('/photos/links/{encryptedUserId}', [HomeController::class, 'showRelatedPhoto'])->name('related-photo-detail');
    Route::post('/like', [HomeController::class, 'like'])->name('like');
    Route::post('/comments', [HomeController::class, 'storeComment'])->name('comment.store');
    Route::get('/profile/album/{album}', [ProfileController::class, 'showAlbum'])->name('profile.showAlbum');
    Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('edit-profile');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/{username}', [ProfileController::class, 'viewProfile'])->name('profile.view');
    Route::get('/albums', [AlbumController::class, 'index'])->name('albums');
    Route::post('/albums/create', [AlbumController::class, 'store'])->name('albums-create');
    Route::get('/photos', [PhotoController::class, 'index'])->name('photos');
    Route::post('/photos/create', [PhotoController::class, 'store'])->name('photos-create');
    Route::post('/logout', [AuthController::class, 'actionLogout'])->name('logout');
});
