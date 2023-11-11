<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/posts', [PostController::class, 'postPage'])->name('post.page');
    Route::get('/post-create', [PostController::class, 'postCreate'])->name('post.create');
    Route::post('/post-add', [PostController::class, 'postadd'])->name('post.add');
    Route::get('/post-edit/{id}', [PostController::class, 'postEdit'])->name('post.edit');
    Route::post('/post-update/{id}', [PostController::class, 'postUpdate'])->name('post.update');
    Route::get('/post-delete/{id}', [PostController::class, 'postDelete'])->name('post.delete');




    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
