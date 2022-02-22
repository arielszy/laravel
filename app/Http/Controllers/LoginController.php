<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->input('pass')=='Minimarket890') {
            session::put(['loged' => true]); 
            return redirect(url('/'));      
        }else{
            Session::flash('msg', 'Clave incorrecta');
            Session::flash('class', 'alert-danger');
            return redirect(url('/login')); 
        }
    }
}
