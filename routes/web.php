<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;

Route::prefix('admin')->group(function () {
    Route::get('posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');
    Route::put('posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
});


Route::prefix('admin')->group(function () {
    Route::resource('posts', PostController::class);
});


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/projects', [AdminController::class, 'projects'])->name('admin.projects');
    Route::get('/admin/content', [AdminController::class, 'content'])->name('admin.content');
    Route::get('/admin/team', [AdminController::class, 'team'])->name('admin.team');
    Route::get('/admin/testimonials', [AdminController::class, 'testimonials'])->name('admin.testimonials');
    Route::get('/admin/inquiries', [AdminController::class, 'inquiries'])->name('admin.inquiries');
    Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');
    
    Route::post('/admin/projects', [AdminController::class, 'storeProject'])->name('admin.projects.store');
    Route::put('/admin/projects/{id}', [AdminController::class, 'updateProject'])->name('admin.projects.update');
    Route::delete('/admin/projects/{id}', [AdminController::class, 'destroyProject'])->name('admin.projects.destroy');
    // Similarly add routes for other entities like content, team, testimonials, etc.
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', function () {
    return view('client.about');
});
Route::get('/contact', function () {
    return view('client.contact');
});
Route::get('/project', function () {
    return view('client.project');
});
Route::get('/staff', function () {
    return view('client.staff');
});

