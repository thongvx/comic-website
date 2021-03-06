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
});

Route::post('upload-avatar', [\App\Http\Controllers\UploadController::class, 'storeAvatar']);

Route::group(['middleware' => ['auth', 'role:admin']], function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::view('profile', 'profile')->name('profile');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])
        ->name('profile.update');

    Route::resource('category', \App\Http\Controllers\CategoryController::class);
    Route::resource('user', \App\Http\Controllers\UserController::class);

});
require __DIR__.'/auth.php';
