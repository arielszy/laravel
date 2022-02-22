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
            $reg->Puntos=$request->input('Puntos')??0; 


           switch ($request->input('Tipo')) {
            case 'Compra':
                $reg->Tipo='Compra';
                $user->points+=(int)$request->input('Puntos');
                break;   
            case 'Canje':
                $reg->Tipo='Canje: '.$request->input('Descripcion');
                $reg->Puntos=$request->input('Valor');
                if ($user->points<(int)$request->input('Valor')) {
                    Session::flash('msg', 'Puntos insufiicientes'); 
                    Session::flash('class', 'alert-danger');
 
                    return redirect()->route('resumen');
                } else {
                    $user->points-=(int)$request->input('Valor');
                }
                
                break;   

            case 'Ajuste':
                switch ($request->input('inlineRadioOptions')) {
                    case 'Sumar':
                        $reg->Tipo='Ajuste: Suma';
                        $user->points+=(int)$request->input('Puntos');
                        $user->saldo+=(double)$request->input('Importe'); 
                     break;
                    case 'Restar':
                        $reg->Tipo='Ajuste: Resta';
                        $user->points-=(int)$request->input('Puntos');
                        $user->saldo-=(double)$request->input('Importe'); 
                       break;
                    case 'Modificar':
                        $reg->Tipo='Ajuste: Modificacion';
                        $user->points=(int)$request->input('Puntos');
                        $user->saldo=(double)$request->input('Importe');
                       break;
                                
                    default:
                        break;
                }


                break;
            
               default:
                   break;
     
           }
            $reg->Client_id=$user->id;
            $reg->Importe=$request->input('Importe')??0.00; 
            $reg->Comentarios=$request->input('Comentarios')??''; 
            $user->save();//guarda en la db los datos
            $reg->save();//guarda en la db los datos
            Session::flash('msg', $request->input('Tipo').' registrado/a');
            Session::flash('class', 'alert-success');

            $opList=OpList::where('Client_id', $user->id)->get();
            session::put(['opList' => $opList]);
            return redirect()->route('resumen');
        } 
            
    
}

