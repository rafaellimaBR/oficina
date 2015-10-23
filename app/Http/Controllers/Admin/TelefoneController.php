<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 17/10/15
 * Time: 19:51
 */

namespace App\Http\Controllers\Admin;


use App\Telefone;
use Illuminate\Routing\Controller;

class TelefoneController extends Controller
{


    public function pesquisarPorNumero($numero)
    {
        if(request()->ajax()){
            $telefone = Telefone::pesquisarPorNumero($numero);

            if($telefone == null){
                return response()->json(['telefone'=>false]);
            }else{
                return response()->json(['telefone'=>true]);
            }
        }else{
            return "permissão negada";
        }
    }
}