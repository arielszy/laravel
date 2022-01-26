<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/', IndexController::class);

Route::resource('user', UserController::class);

Route::get('/resumen', function () {
    return view('resumen');
});

Route::post('/resumen', function ($DNI) {
    return view('resumen',compact('dni'));
})->name('resumen');
