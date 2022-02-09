<?php
use Illuminate\Support\Facades\Session;
use App\Models\UserModel;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PrizeController;
use App\Http\Controllers\RegController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Models\OpList;
use App\Models\Prize;
use Illuminate\Support\Facades\Route;
use app\Http\Middleware\LogedMiddleware;
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



Route::get('/login', function(){
    return view('login');
}); 

Route::post('/login', LoginController::class);

Route::middleware('LogedMiddleware')->group(function () {
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

    Route::get('/list/cli', function () {
        $users=UserModel::paginate(9);
        return view('clientList')->with('users',$users);
    });
    Route::get('/list/prize', function () {
        $prize=Prize::paginate(9);
        return view('prizeList')->with('prize',$prize);
    });
    Route::get('/resumen/{id}', function ($id) {
        $user=UserModel::where('id', $id)->first();  
        Session::put(['user' => $user]);  
        $opList=OpList::where('Client_id', $id)->get();
        session::put(['opList' => $opList]);
        return redirect(url('/resumen'));
    })->name('resumenDesdeList');

    Route::get('/newReg/{op}', function ($op) {
        $prize=Prize::paginate(9);
        $user=Session::get('user');
        return view('newReg',compact('op','user','prize'));
    });

    Route::post('/newReg/Compra', RegController::class);
    Route::post('/newReg/Ajuste', RegController::class);
    Route::post('/newReg/Canje', RegController::class);
    Route::resource('/prize', PrizeController::class);
    Route::get('/config', function () {
        return view('config');
    });
});