<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/assets/fonts/IBMPlexSans-Regular.ttf', function () {
    $path = public_path('assets/fonts/' . "IBMPlexSans-Regular.ttf");

    if (file_exists($path)) {
        return response()->file($path);
    }

    abort(404);
}); */

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});