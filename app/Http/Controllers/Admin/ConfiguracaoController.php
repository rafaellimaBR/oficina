<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 21/10/15
 * Time: 19:50
 */

namespace App\Http\Controllers\Admin;


use App\Configuracao;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class ConfiguracaoController extends Controller
{

    public function editar()
    {
        $conf   =   Configuracao::find(1);
        return view('admin.configuracao.edicao',['conf'=>$conf]);
    }

    public function atualizar()
    {
        try{

            Configuracao::atualizar(request());

            return redirect()->route('configuracao.editar');
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }
}