<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
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
        $exist = UserModel::where('email', $request->input('email'))->orWhere('DNI', $request->input('DNI'))->first();//devuelve el primer registro que coincida con el dato enviado, o null si no existe 
        if (!$exist) {
        $user=new UserModel(); 
        $user->name=$request->input('name');
        $user->surname=$request->input('surname');
        $user->address=$request->input('address'); 
        $user->email=$request->input('email'); 
        $user->DNI=$request->input('DNI'); 
        $user->phone=$request->input('phone'); 
        $user->save();//guarda en la db los datos
        Session::flash('msg', 'cliente creado');
        session(['user' => $user]);
        return redirect()->route('resumen');
    }elseif ($exist['email']==$request->input('email')) {
        Session::flash('msg', 'el email ya existe');
        return redirect(url('user/create'));
    }elseif ($exist['DNI']==$request->input('DNI')) {
        Session::flash('msg', 'el DNI ya existe');
        return redirect(url('user/create'));
    } else {
        Session::flash('msg', 'algo raro paso');
        return redirect(url('user/create'));
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
