<?php
use Illuminate\Support\Facades\Session;

use App\Models\UserModel;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Models\OpList;
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
    $user=Session::get('user');
    $opList=Session::get('opList');
    return view('resumen', compact('user','opList'));
})->name('resumen');

Route::get('/list', function () {
    $users=UserModel::paginate(9);
    return view('clientList')->with('users',$users);
});
Route::get('/resumen/{id}', function ($id) {
    $user=UserModel::where('id', $id)->first();  
    Session::put(['user' => $user]);  
    $opList=OpList::where('Client_id', $id)->get();
    session::put(['opList' => $opList]);
    return redirect(url('/resumen'));
})->name('resumenDesdeList');