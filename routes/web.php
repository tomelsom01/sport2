<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\SportController;



Route::get('/', [HelloController::class, 'show']);

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth']);

Route::resource('sports', SportController::class);
