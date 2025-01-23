<?php

use Illuminate\Support\Facades\Route;


Route::get('cities', [App\Http\Controllers\mobile\CityController::class, 'index'])->name('api.cities.index');
Route::get('areas', [App\Http\Controllers\mobile\AreaController::class, 'index'])->name('api.areas.index');
