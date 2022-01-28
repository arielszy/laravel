<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use App\Http\Requests\IndexRequest;
use App\Models\UserModel;

class IndexController extends Controller
{
    public function __invoke(IndexRequest $request)
    {
        
        $DNI=$request->DNI;
        $exist = UserModel::where('DNI', $DNI)->first();//devuelve el primer registro que coincida con el dato enviado, o null si no existe 
        if (!$exist) {
            return view('welcome', compact('DNI'));
        }else {
            Session::flash('msg', 'Bienvenido '.$exist['name']);
            session::put(['user' => $exist]);
            return redirect()->route('resumen');
          
        }
    }
}
