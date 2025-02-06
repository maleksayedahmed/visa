<?php

use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\ModelTypesDataController;
use Illuminate\Support\Facades\Route;

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

    Route::prefix('brands')->controller(\App\Http\Controllers\Admin\BrandController::class)->group(function () {
        Route::get('/', 'index')->name('brands.index');
        Route::get('/create', 'create')->name('brands.create');
        Route::post('/store', 'store')->name('brands.store');
        Route::get('/edit/{id}', 'edit')->name('brands.edit');
        Route::post('/update/{id}', 'update')->name('brands.update');
        Route::delete('/delete/{id}', 'destroy')->name('brands.delete');
        Route::post('/change-status', 'changeStatus')->name('brands.status');
    });

    Route::prefix('offers')->controller(\App\Http\Controllers\Admin\OfferController::class)->group(function () {
        Route::get('/', 'index')->name('offers.index');
        Route::get('/create', 'create')->name('offers.create');
        Route::post('/store', 'store')->name('offers.store');
        Route::get('/edit/{id}', 'edit')->name('offers.edit');
        Route::post('/update/{id}', 'update')->name('offers.update');
        Route::delete('/delete/{id}', 'destroy')->name('offers.delete');
        Route::post('/change-status', 'changeStatus')->name('offers.status');
    });

    Route::prefix('doctor_specializations')->controller(\App\Http\Controllers\Admin\DoctorSpecializationController::class)->group(function () {
        Route::get('/', 'index')->name('doctor_specializations.index');
        Route::get('/create', 'create')->name('doctor_specializations.create');
        Route::post('/store', 'store')->name('doctor_specializations.store');
        Route::get('/edit/{id}', 'edit')->name('doctor_specializations.edit');
        Route::post('/update/{id}', 'update')->name('doctor_specializations.update');
        Route::delete('/delete/{id}', 'destroy')->name('doctor_specializations.delete');
        Route::post('/change-status', 'changeStatus')->name('doctor_specializations.status');
    });

    Route::prefix('doctors')->controller(\App\Http\Controllers\Admin\DoctorController::class)->group(function () {
        Route::get('/', 'index')->name('doctors.index');
        Route::get('/create', 'create')->name('doctors.create');
        Route::post('/store', 'store')->name('doctors.store');
        Route::get('/edit/{id}', 'edit')->name('doctors.edit');
        Route::post('/update/{id}', 'update')->name('doctors.update');
        Route::delete('/delete/{id}', 'destroy')->name('doctors.delete');
        Route::post('/change-status', 'changeStatus')->name('doctors.status');
    });

    Route::prefix('coupons')->controller(\App\Http\Controllers\Admin\CouponController::class)->group(function () {
        Route::get('/', 'index')->name('coupons.index');
        Route::get('/create', 'create')->name('coupons.create');
        Route::post('/store', 'store')->name('coupons.store');
        Route::get('/edit/{id}', 'edit')->name('coupons.edit');
        Route::post('/update/{id}', 'update')->name('coupons.update');
        Route::delete('/delete/{id}', 'destroy')->name('coupons.delete');
        Route::post('/change-status', 'changeStatus')->name('coupons.status');
    });

    Route::prefix('products')->controller(\App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/', 'index')->name('products.index');
        Route::get('/create', 'create')->name('products.create');
        Route::post('/store', 'store')->name('products.store');
        Route::get('/edit/{id}', 'edit')->name('products.edit');
        Route::post('/update/{id}', 'update')->name('products.update');
        Route::delete('/delete/{id}', 'destroy')->name('products.delete');
        Route::post('/change-status', 'changeStatus')->name('products.status');
    });

    Route::prefix('model-types')->controller(\App\Http\Controllers\Admin\ModelTypesController::class)->group(function () {
        Route::get('/', 'index')->name('model-types.index');
        Route::get('/create', 'create')->name('model-types.create');
        Route::post('/store', 'store')->name('model-types.store');
        Route::get('/edit/{id}', 'edit')->name('model-types.edit');
        Route::post('/update/{id}', 'update')->name('model-types.update');
        Route::delete('/delete/{id}', 'destroy')->name('model-types.delete');
        Route::post('/change-status', 'changeStatus')->name('model-types.status');
    });

    Route::prefix('model-type-data')->controller(\App\Http\Controllers\Admin\ModelTypesDataController::class)->group(function () {
        Route::get('/', 'index')->name('model-type-data.index');
        Route::get('/create', 'create')->name('model-type-data.create');
        Route::post('/store', 'store')->name('model-type-data.store');
        Route::get('/edit/{id}', 'edit')->name('model-type-data.edit');
        Route::post('/update/{id}', 'update')->name('model-type-data.update');
        Route::delete('/delete/{id}', 'destroy')->name('model-type-data.delete');
        Route::post('/change-status', 'changeStatus')->name('model-type-data.status');
    });

    Route::prefix('package-offers')->controller(\App\Http\Controllers\Admin\PackageOfferController::class)->group(function () {
        Route::get('/', 'index')->name('package-offers.index');
        Route::get('/create', 'create')->name('package-offers.create');
        Route::post('/store', 'store')->name('package-offers.store');
        Route::get('/edit/{id}', 'edit')->name('package-offers.edit');
        Route::post('/update/{id}', 'update')->name('package-offers.update');
        Route::delete('/delete/{id}', 'destroy')->name('package-offers.delete');
        Route::post('/change-status', 'changeStatus')->name('package-offers.status');
    });

    Route::prefix('companies')->controller(\App\Http\Controllers\Admin\CompanyController::class)->group(function () {
        Route::get('/', 'index')->name('companies.index');
        Route::get('/create', 'create')->name('companies.create');
        Route::post('/store', 'store')->name('companies.store');
        Route::get('/edit/{id}', 'edit')->name('companies.edit');
        Route::post('/update/{id}', 'update')->name('companies.update');
        Route::delete('/delete/{id}', 'destroy')->name('companies.delete');
        Route::post('/change-status', 'changeStatus')->name('companies.status');
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

    Route::prefix('payment_types')->controller(\App\Http\Controllers\Admin\PaymentTypeController::class)->group(function () {
        Route::get('/', 'index')->name('payment_types.index');
        Route::get('/create', 'create')->name('payment_types.create');
        Route::post('/store', 'store')->name('payment_types.store');
        Route::get('/edit/{id}', 'edit')->name('payment_types.edit');
        Route::post('/update/{id}', 'update')->name('payment_types.update');
        Route::delete('/delete/{id}', 'destroy')->name('payment_types.delete');
        Route::post('/change-status', 'changeStatus')->name('payment_types.status');
    });

    Route::resource('pets_categories', \App\Http\Controllers\Admin\PetsCategoryController::class);
    Route::post('pets_categories/change-status', [\App\Http\Controllers\Admin\PetsCategoryController::class, 'changeStatus'])->name('pets_categories.status');
    Route::resource('pets', \App\Http\Controllers\Admin\PetController::class);
    Route::post('pets/change-status', [\App\Http\Controllers\Admin\PetController::class, 'changeStatus'])->name('pets.status');
    Route::resource('time_slots', \App\Http\Controllers\Admin\TimeSlotController::class);
    Route::post('time_slots/change-status', [\App\Http\Controllers\Admin\TimeSlotController::class, 'changeStatus'])->name('time_slots.status');
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('user_addresses', \App\Http\Controllers\Admin\UserAddressController::class);
    Route::resource('roles', \App\Http\Controllers\Admin\RolePermissionController::class);
    Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class);
    Route::post('services/change-status', [\App\Http\Controllers\Admin\ServiceController::class, 'changeStatus'])->name('services.status');

    Route::resource('reservations', \App\Http\Controllers\Admin\ReservationController::class);
    Route::post('reservations/change-status', [\App\Http\Controllers\Admin\ReservationController::class, 'changeStatus'])->name('reservations.status');

    Route::get('/doctors/{doctor}/working-days', [DoctorController::class, 'getWorkingDays'])
        ->name('doctors.working-days');

    // Route to fetch available time slots for a doctor on a specific working day
    Route::get('/doctors/{doctor}/working-days/{workingDay}/time-slots', [DoctorController::class, 'getTimeSlots'])
        ->name('doctors.working-days.time-slots');
        Route::get('/model-types-data', [ModelTypesDataController::class, 'apiIndex'])->name('api.model_types_data.index');


        Route::resource('sliders', \App\Http\Controllers\Admin\SliderController::class);
        Route::post('sliders/change-status', [\App\Http\Controllers\Admin\SliderController::class, 'changeStatus'])->name('sliders.status');

        Route::resource('tags', \App\Http\Controllers\Admin\SliderController::class);
        Route::post('tags/change-status', [\App\Http\Controllers\Admin\SliderController::class, 'changeStatus'])->name('tags.status');

        Route::resource('settings', \App\Http\Controllers\Admin\SettingController::class);
        Route::post('settings/change-status', [\App\Http\Controllers\Admin\SettingController::class, 'changeStatus'])->name('settings.status');


    Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'dashBoard'])->name('dashboard');



});


