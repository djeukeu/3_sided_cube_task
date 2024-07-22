<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
 */

Route::post('register', [AuthController::class, 'register'])->name('auth.register');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');

Route::get('posts', [PostController::class, 'index'])->name('post.index');
Route::get('posts/{id}', [PostController::class, 'show'])->name('post.show');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('posts', [PostController::class, 'store'])->name('post.store');
    Route::patch('posts/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('posts/{id}', [PostController::class, 'destroy'])->name('post.destroy');
});
