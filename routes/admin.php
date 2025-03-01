<?php

use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\ModelTypesDataController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CommentController;

Route::get('admin/login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class , 'create'])->name('admin.login');
Route::group(['namespace' => 'App\\Http\\Controllers\\Admin', 'as' => 'admin.', 'middleware' => ['auth', 'verified', 'role:admin'], 'prefix' => 'admin'], function () {

    Route::prefix('setting')->controller(\App\Http\Controllers\Admin\HomeController::class)->group(function () {
        // Route::get('/', 'dashBoard')->name('dashboard');
    });

    Route::prefix('countries')->controller(\App\Http\Controllers\Admin\CountryController::class)->group(function () {
        Route::get('/', 'index')->name('countries.index');
        Route::get('/create', 'create')->name('countries.create');
        Route::post('/store', 'store')->name('countries.store');
        Route::get('/edit/{id}', 'edit')->name('countries.edit');
        Route::post('/update/{id}', 'update')->name('countries.update');
        Route::delete('/delete/{id}', 'destroy')->name('countries.delete');
        Route::post('/change-status', 'changeStatus')->name('countries.status');
    });

    Route::prefix('cities')->controller(\App\Http\Controllers\Admin\CityController::class)->group(function () {
        Route::get('/', 'index')->name('cities.index');
        Route::get('/create', 'create')->name('cities.create');
        Route::post('/store', 'store')->name('cities.store');
        Route::get('/edit/{id}', 'edit')->name('cities.edit');
        Route::post('/update/{id}', 'update')->name('cities.update');
        Route::delete('/delete/{id}', 'destroy')->name('cities.delete');
        Route::post('/change-status', 'changeStatus')->name('cities.status');
        Route::get('/countries/{country}', 'getCountryCities')->name('cities.countries');
    });


    Route::prefix('categories')->controller(\App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('categories.index');
        Route::get('/create', 'create')->name('categories.create');
        Route::post('/store', 'store')->name('categories.store');
        Route::get('/edit/{id}', 'edit')->name('categories.edit');
        Route::post('/update/{id}', 'update')->name('categories.update');
        Route::delete('/delete/{id}', 'destroy')->name('categories.delete');
        Route::post('/change-status', 'changeStatus')->name('categories.status');
    });

    Route::prefix('visas')->controller(\App\Http\Controllers\Admin\VisaController::class)->group(function () {
        Route::get('/', 'index')->name('visas.index');
        Route::get('/create', 'create')->name('visas.create');
        Route::post('/store', 'store')->name('visas.store');
        Route::get('/edit/{id}', 'edit')->name('visas.edit');
        Route::post('/update/{id}', 'update')->name('visas.update');
        Route::delete('/delete/{id}', 'destroy')->name('visas.delete');
        Route::post('/change-status', 'changeStatus')->name('visas.status');
    });



    Route::prefix('blogs')->controller(\App\Http\Controllers\Admin\BlogController::class)->group(function () {
        Route::get('/', 'index')->name('blogs.index');
        Route::get('/create', 'create')->name('blogs.create');
        Route::post('/store', 'store')->name('blogs.store');
        Route::get('/edit/{id}', 'edit')->name('blogs.edit');
        Route::post('/update/{id}', 'update')->name('blogs.update');
        Route::delete('/delete/{id}', 'destroy')->name('blogs.delete');
        Route::post('/change-status', 'changeStatus')->name('blogs.status');
    });



    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class);
    Route::post('services/change-status', [\App\Http\Controllers\Admin\ServiceController::class, 'changeStatus'])->name('services.status');


        Route::resource('sliders', \App\Http\Controllers\Admin\SliderController::class);
        Route::post('sliders/change-status', [\App\Http\Controllers\Admin\SliderController::class, 'changeStatus'])->name('sliders.status');

        Route::resource('tags', \App\Http\Controllers\Admin\SliderController::class);
        Route::post('tags/change-status', [\App\Http\Controllers\Admin\SliderController::class, 'changeStatus'])->name('tags.status');

        Route::resource('settings', \App\Http\Controllers\Admin\SettingController::class);
        Route::post('settings/change-status', [\App\Http\Controllers\Admin\SettingController::class, 'changeStatus'])->name('settings.status');


    // Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'dashBoard'])->name('dashboard');


    Route::prefix('comments')->controller(\App\Http\Controllers\Admin\CommentController::class)->group(function () {
        Route::get('/', 'index')->name('comments.index');
        Route::get('/create', 'create')->name('comments.create');
        Route::post('/store', 'store')->name('comments.store');
        Route::get('/edit/{id}', 'edit')->name('comments.edit');
        Route::post('/update/{id}', 'update')->name('comments.update');
        Route::delete('/delete/{id}', 'destroy')->name('comments.delete');
        Route::post('/change-status', 'changeStatus')->name('comments.status');
    });

    Route::prefix('visatypes')->controller(\App\Http\Controllers\Admin\VisaTypeController::class)->group(function () {
        Route::get('/', 'index')->name('visatypes.index');
        Route::get('/create', 'create')->name('visatypes.create');
        Route::post('/store', 'store')->name('visatypes.store');
        Route::get('/edit/{id}', 'edit')->name('visatypes.edit');
        Route::post('/update/{id}', 'update')->name('visatypes.update');
        Route::delete('/delete/{id}', 'destroy')->name('visatypes.delete');
        Route::post('/change-status', 'changeStatus')->name('visatypes.status');
    });




});


