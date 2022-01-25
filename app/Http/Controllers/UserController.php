<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DNI=$_GET['DNI'];
        return view('resumen', compact('DNI'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tt='Alta de cliente';
        return view('form', compact('tt'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user=new UserModel(); 
        $user->name=$request->input('name');
        $user->surname=$request->input('surname');
        $user->address=$request->input('address'); 
        $user->email=$request->input('email'); 
        $user->DNI=$request->input('DNI'); 
        $user->DNI=$request->input('phone'); 

        $exist = UserModel::where('email', $user->email)->orWhere('DNI', $user->DNI)->first();//devuelve el primer registro que coincida con el dato enviado, o null si no existe 
       
       if (!$exist) {
        $user->save();//guarda en la db los datos
        $tt='Usuario creado';
        return view('resumen', compact('user->DNI','tt'));
       }elseif ($exist['email']==$user->email) {
            $tt='El email '.$exist['email'].' ya existe';
            return view('form', compact('user','tt'));
       }elseif ($exist['DNI']==$user->DNI) {
            $tt='El DNI '.$exist['DNI'].' ya existe';
            return view('form', compact('user','tt'));
       } else {
           $tt='algo paso';
           return view('form', compact('user','tt'));
       }
         
      
        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
