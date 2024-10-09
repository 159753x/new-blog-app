<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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
Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('posts', PostController::class);

// Route::resource('comments', CommentController::class);

// Route::get('/posts', [PostController::class, 'index']);  // Fetch all posts
// Route::get('/posts/{post}', [PostController::class, 'show']);  // Fetch a single post
Route::post('/posts/{post}/comments', [CommentController::class, 'store']);  // Add a comment to a post
// Route::delete('/posts/{post}', [PostController::class, 'destroy']);  // Delete a post
Route::delete('/comments/{comment}', [CommentController::class, 'destroy']);  // Delete a comment

// Route::put('/posts/{post}', [PostController::class, 'update']);  // Update a post

require __DIR__.'/auth.php';
