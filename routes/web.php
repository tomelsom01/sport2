<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HelloController::class, 'show']);
