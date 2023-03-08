<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['guest'])->group(function (){
    Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::post('/login', [App\Http\Controllers\AuthController::class, '_login']);

    Route::get('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
    Route::post('/register', [App\Http\Controllers\AuthController::class, '_register']);
});

Route::middleware(['auth'])->group(function () {

    Route::get('/', [App\Http\Controllers\PagesController::class, 'index'])->name('index');
    Route::get('/about', [App\Http\Controllers\PagesController::class, 'about'])->name('about');

    Route::prefix('/users')->group(function () {
        Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
        Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
        Route::post('/create/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
        Route::get('/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
        Route::put('/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
        Route::delete('/{user}/delete', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
        Route::get('/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
    });

    Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
});
