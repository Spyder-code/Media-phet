<?php

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
    return view('welcome');
})->middleware('visitor');
Route::get('/blank', function () {
    return view('admin.blank');
})->name('blank');

Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::put('/profile/{id}', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile/password/{id}', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('profile.update.password');
    Route::put('/profile/image/{id}', [App\Http\Controllers\UserController::class, 'updateImage'])->name('profile.update.image');
});

Route::prefix('admin')->middleware('admin')->group(function(){
    Route::get('/main', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('admin.user');
    Route::get('/room', [App\Http\Controllers\RoomController::class, 'index'])->name('admin.room');
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
    Route::resource('/game', App\Http\Controllers\GameController::class);
});
