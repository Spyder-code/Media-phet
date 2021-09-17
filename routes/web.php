<?php

use App\Events\SendMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('media-phet/index');
})->middleware('visitor');

// Route::get('/room', function () {
//     return view('media-phet/room');
// })->middleware('visitor');

// Route::get('/simulation', function () {
//     return view('media-phet/simulation');
// })->middleware('visitor');

// Route::get('/masuk', function () {
//     return view('media-phet/login');
// })->middleware('visitor');

// Route::get('/registrasi', function () {
//     return view('media-phet/registrasi');
// })->middleware('visitor');

Route::get('/blank', function () {
    return view('admin.blank');
})->name('blank');
Route::get('/send', function () {
    event(new SendMessage('Hai'));
})->name('send');

Auth::routes();


Route::middleware(['login'])->group(function () {
    Route::put('/profile/{id}', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile/password/{id}', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('profile.update.password');
    Route::put('/profile/image/{id}', [App\Http\Controllers\UserController::class, 'updateImage'])->name('profile.update.image');
    Route::resource('/room', App\Http\Controllers\RoomController::class);
    Route::get('/room/{room}/change-status', [App\Http\Controllers\RoomController::class,'changeStatus'])->name('room.change-status');
    Route::get('/play/{game}/{code}', [App\Http\Controllers\PageController::class, 'play'])->name('play');
    Route::get('/join/{code}', [App\Http\Controllers\RoomController::class, 'join'])->name('room.join');
});

Route::prefix('admin')->middleware('admin')->group(function(){
    Route::get('/main', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('admin.user');
    Route::get('/room', [App\Http\Controllers\RoomController::class, 'index'])->name('admin.room');
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
    Route::resource('/game', App\Http\Controllers\GameController::class);
});

Route::prefix('/')->group(function () {
    Route::get('/simulation', [App\Http\Controllers\PageController::class, 'simulation'])->name('simulation');
    Route::get('/room-play', [App\Http\Controllers\PageController::class, 'roomPlay'])->name('room-play');
    Route::get('/simulation-room', [App\Http\Controllers\PageController::class, 'room'])->name('room');
    Route::get('/index', [App\Http\Controllers\PageController::class, 'index'])->name('index');
    Route::get('/akun', [App\Http\Controllers\PageController::class, 'akun'])->name('akun');
});
