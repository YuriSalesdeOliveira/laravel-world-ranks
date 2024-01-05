<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::resource('countries', CountryController::class)->except(['index']);
