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


/************************************************************************
 * Backend
 ************************************************************************/

Route::middleware(['auth'])
    ->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('backend.dashboard');

        Route::get('/post/create', [App\Http\Controllers\Backend\PostController::class, 'create'])->name('backend.post.create');
        Route::get('/post/{id}/edit', [App\Http\Controllers\Backend\PostController::class, 'edit'])->name('backend.post.edit');
        Route::get('/post/{id}/edit', [App\Http\Controllers\Backend\PostController::class, 'edit'])->name('backend.post.edit');
        Route::get('/post', [App\Http\Controllers\Backend\PostController::class, 'index'])->name('backend.post.index');
    });



/************************************************************************
 * Frontend
 ************************************************************************/

Auth::routes();
Route::get('/', [\App\Http\Controllers\Front\FrontController::class, 'index'])->name('frontend.index');
Route::get('/contact', [\App\Http\Controllers\Front\FrontController::class, 'contact'])->name('frontend.contact');
Route::get('/{slug}', [\App\Http\Controllers\Front\FrontController::class, 'show'])->name('frontend.show');
Route::get('/category/{category_name}', [\App\Http\Controllers\Front\FrontController::class, 'postUsingCategory'])->name('frontend.category');
Route::get('/tags/{tags}', [\App\Http\Controllers\Front\FrontController::class, 'tags'])->name('frontend.tags');
