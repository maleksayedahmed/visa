<?php

use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/' , [HomeController::class , 'index']);
Route::get('/logout', function () {
    return view('template.admin.auth.logout');
});

Route::get('/dashboard', [HomeController::class , 'dashBoard'])->middleware(['auth', 'verified' ,'role:admin'])->name('dashboard');

Route::get('/posts/{country?}/{category?}' , [HomeController::class , 'posts'])->name('posts');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/visas', function () {
    return view('visas.index');
})->name('visas.index');

Route::get('/immigration', function () {
    return view('immigration.index');
})->name('immigration.index');

Route::get('/training', function () {
    return view('training.index');
})->name('training.index');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Route::get('/blogs', function () {
    return view('template.user.blogs.blogs');
})->name('blogs.index');



Route::get('/blog', function () {
    return view('template.user.blogs.blog');

})->name('blog.index');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/api.php';
