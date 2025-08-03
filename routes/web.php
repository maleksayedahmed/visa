<?php

use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\BlogController;
use App\Http\Controllers\User\CountryController;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\VisaController;

use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\ServiceController;
use App\Models\Service;


Route::middleware('locale')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/posts/{country?}/{category?}', [HomeController::class, 'posts'])->name('posts');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');



    Route::get('/immigration', function () {
        return view('immigration.index');
    })->name('immigration.index');

    Route::get('/training', function () {
        return view('training.index');
    })->name('training.index');

    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');


    // Route::get('/blogs', function () {
    //     return view('template.user.blogs.blogs');
    // })->name('blogs.index');



    // Route::get('/blog', function () {
    //     return view('template.user.blogs.blog');

    // })->name('blog.index');

    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.index');
    Route::get('/countries', [CountryController::class, 'index'])->name('country.index');
    Route::get('/countries/{id}', [CountryController::class, 'show'])->name('country.show');
    Route::get('/category/{id}', [CategoryController::class, 'index'])->name('category.index');

    Route::get('/visas', [VisaController::class, 'index'])->name('visas.index');
    Route::get('/visas/{slug}', [VisaController::class, 'show'])->name('visas.show');

    Route::get('/service', [ServiceController::class, 'index'])->name('service.index');

    Route::post('/blogs/{blog}/comments', [CommentController::class, 'store'])->name('comments.store');
    // Route::get('/service', [ServiceController::class, 'index'])->name('service.index');


});

Route::get('lang/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'ar'])) {
        abort(400);
    }

    session(['locale' => $locale]);
    return redirect()->back();
})->name('lang.switch');

Route::get('/logout', function () {
    return view('template.admin.auth.logout');
});

Route::get('/dashboard', [HomeController::class, 'dashBoard'])->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');



require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/api.php';
