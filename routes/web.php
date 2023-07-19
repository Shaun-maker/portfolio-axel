<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

Route::get('/', HomeController::class);

Route::put('/profile/intro', [ProfileController::class, 'update_intro']);
Route::put('/profile/presentation', [ProfileController::class, 'update_presentation']);