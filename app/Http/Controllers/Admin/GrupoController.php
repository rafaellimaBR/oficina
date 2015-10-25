<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 24/10/15
 * Time: 18:11
 */

namespace App\Http\Controllers\Admin;


use App\Grupo;
use App\Http\Controllers\Admin\AdminController;

class GrupoController extends AdminController
{
    public function index()
    {
        if(!unserialize(auth()->user()->grupo->grupo)['vis']){
            return redirect()->route('dashboard.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        $grupos   =   Grupo::paginate(15);

        return view('admin.grupo.index',['grupos'=>$grupos]);
    }

    public function novo()
    {
        if(!unserialize(auth()->user()->grupo->grupo)['cri']){
            return redirect()->route('grupo.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        return view('admin.grupo.novo');
    }

    public function cadastrar()
    {
        if(!unserialize(auth()->user()->grupo->grupo)['cri']){
            return redirect()->route('grupo.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        try{
            $validacao  =   Grupo::validar(request()->all());

            if($validacao->fails()){
                return redirect()->route('grupo.novo')->withErrors($validacao)->withInput();
            }

            $grupo    =   Grupo::gravar(request());

            return redirect()->route('grupo.index')->with('alerta',['tipo'=>'success','msg'=>'Cadastrado com sucesso.','icon'=>'check']);

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }
    public function editar($id)
    {
        if(!unserialize(auth()->user()->grupo->grupo)['edi']){
            return redirect()->route('grupo.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        $grupo    =   Grupo::find($id);

        if($grupo == null){
            return redirect()->route('grupo.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi encontrado.','icon'=>'warning']);
        }else{
            return view('admin.grupo.edicao')->with('grupo',$grupo);
        }

    }

    public function atualizar()
    {
        if(!unserialize(auth()->user()->grupo->grupo)['edi']){
            return redirect()->route('grupo.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }

        try{
            $validacao  =   Grupo::validar(request()->all());

            if($validacao->fails()){
                return redirect()->route('grupo.editar',['id'=>request()->get('id')])->withErrors($validacao)->withInput();
            }

            Grupo::atualizar(request());

            return redirect()->route('grupo.index')->with('alerta',['tipo'=>'success','msg'=>'Editado com sucesso.','icon'=>'check']);;

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function excluir()
    {
        if(!unserialize(auth()->user()->grupo->grupo)['exc']){
            return redirect()->route('grupo.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        try {
            Grupo::excluir(request());
            return redirect()->route('grupo.index')->with('alerta',['tipo'=>'success','msg'=>'Excluir com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return "Error ao cadastrar: ".$e->getMessage();
        }
    }


    public function pesquisar()
    {
        try{

            $grupo    =   Grupo::pesquisar(request())->paginate(15);

            return view('admin.grupo.index',['grupos'=>$grupo]);

        }catch(\Exception $e){
            return redirect()->route('grupo.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }


}