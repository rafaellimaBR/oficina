<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 21/10/15
 * Time: 19:50
 */

namespace App\Http\Controllers\Admin;


use App\Configuracao;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\File;

class ConfiguracaoController extends AdminController
{

    public function editar()
    {
        if(!unserialize(auth()->user()->grupo->configuracao)['edi']){
            return redirect()->route('cliente.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        $conf   =   Configuracao::find(1);
        return view('admin.configuracao.edicao',['conf'=>$conf]);
    }

    public function atualizar()
    {
        if(!unserialize(auth()->user()->grupo->configuracao)['edi']){
            return redirect()->route('cliente.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        try{

            Configuracao::atualizar(request());

            return redirect()->route('configuracao.editar');
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }
}