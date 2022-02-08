<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Models\OpList;
use App\Models\UserModel;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        
        
        if ($request->pass=='Minimarket890') {
            session::put(['loged' => true]); 
            return redirect(url('/'));      
        }else{
            Session::flash('msg', 'Clave incorrecta');
            return redirect(url('/'));      


        }
        
       
    }
}
