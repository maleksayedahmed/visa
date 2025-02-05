<?php

use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('template.user.main.homepage');
});
Route::get('/logout', function () {
    return view('template.admin.auth.logout');
});

Route::get('/dashboard', function () {
    return view('template.admin.dashboard');
})->middleware(['auth', 'verified' ,'role:admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

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
require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/api.php';
