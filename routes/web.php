<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReadmoreController;


Auth::routes();

Route::prefix('admin')->group(function () {
     Route::resource('posts', PostController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    Route::get('/admin/content', [AdminController::class, 'content'])->name('admin.content');
    
    Route::get('/admin/testimonials', [AdminController::class, 'testimonials'])->name('admin.testimonials');
    Route::get('/admin/inquiries', [AdminController::class, 'inquiries'])->name('admin.inquiries');
    Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');
});

Route::get('/', function () {
    return view('welcome');
});


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


Route::get('/about-more', [ReadmoreController::class, 'showMore'])->name('about.more');

Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('post.destroy');

Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('post.update');
Route::post('/posts', [PostController::class, 'store'])->name('post.store');
Route::get('/posts', [PostController::class, 'index'])->name('post.index');





