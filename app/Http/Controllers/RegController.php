<?php



namespace App\Http\Controllers;

use App\Models\OpList;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class RegController extends Controller
{
    public function __invoke(Request $request)

    { 
            $user=$request->session()->get('user');
            $reg=new OpList(); 
            $reg->Client_id=$user->id;
            $reg->Tipo=$request->input('Tipo')=='Compra'?$request->input('Tipo'):$request->input('Tipo').' : '.$request->input('inlineRadioOptions');
            $reg->Importe=$request->input('Importe')??0.00; 
            $reg->Puntos=$request->input('Puntos')??0; 
            $reg->Comentarios=$request->input('Comentarios')??''; 
            $reg->save();//guarda en la db los datos
           switch ($request->input('Tipo')) {
            case 'Compra':
                $user->points+=(int)$request->input('Puntos');
                $user->save();//guarda en la db los datos
                break;   

            case 'Ajuste':
                switch ($request->input('inlineRadioOptions')) {
                    case 'Sumar':
                        $user->points+=(int)$request->input('Puntos');
                        $user->saldo+=(double)$request->input('Importe'); 
                     break;
                    case 'Restar':
                        $user->points-=(int)$request->input('Puntos');
                        $user->saldo-=(double)$request->input('Importe'); 
                       break;
                    case 'Modificar':
                        $user->points=(int)$request->input('Puntos');
                        $user->saldo=(double)$request->input('Importe');
                       break;
                                
                    default:
                        break;
                }
                $user->save();//guarda en la db los datos
                break;
            
               default:
                   break;
           }

            Session::flash('msg', $request->input('Tipo').' registrado/a');
            $opList=OpList::where('Client_id', $user->id)->get();
            session::put(['opList' => $opList]);
            return redirect()->route('resumen');
        } 
            
    
}

