<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 18/10/15
 * Time: 00:55
 */

namespace App\Http\Controllers\Admin;


use App\Marca;
use App\Modelo;
use App\Http\Controllers\Admin\AdminController;

class ModeloController extends AdminController
{
    public function index()
    {
        if(!unserialize(auth()->user()->grupo->modelo)['vis']){
            return redirect()->route('dashboard.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        $modelo   =   Modelo::paginate(15);
        return view('admin.modelo.index')->with('modelos',$modelo);
    }

    public function novo()
    {
        if(!unserialize(auth()->user()->grupo->modelo)['cri']){
            return redirect()->route('modelo.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        return view('admin.modelo.novo');
    }

    public function cadastrar()
    {
        if(!unserialize(auth()->user()->grupo->modelo)['cri']){
            return redirect()->route('modelo.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        try{
            $validacao  =   Modelo::validar(request()->all());

            if($validacao->fails()){
                return redirect()->route('modelo.novo')->withErrors($validacao)->withInput();
            }

            $marca    =   Modelo::gravar(request());

            return redirect()->route('modelo.index');

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }
    public function editar($id)
    {
        if(!unserialize(auth()->user()->grupo->modelo)['edi']){
            return redirect()->route('modelo.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        $modelo    =   Modelo::find($id);
        if($modelo != null) {
            return view('admin.modelo.edicao')->with('modelo', $modelo);
        }else{
            return redirect()->route('modelo.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi encontrado.','icon'=>'warning']);
        }
    }

    public function atualizar()
    {
        if(!unserialize(auth()->user()->grupo->modelo)['edi']){
            return redirect()->route('modelo.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        try{
            $validacao  =   Modelo::validar(request()->all());

            if($validacao->fails()){
                return redirect()->route('modelo.editar',['id'=>request()->get('id')])->withErrors($validacao)->withInput();
            }

            Modelo::atualizar(request());

            return redirect()->route('modelo.index');

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function excluir()
    {
        if(!unserialize(auth()->user()->grupo->modelo)['exc']){
            return redirect()->route('modelo.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        try {
            Modelo::excluir(request());
            return redirect()->route('modelo.index');
        }catch (\Exception $e){
            return "Error ao cadastrar: ".$e->getMessage();
        }
    }

    public function pesquisar()
    {
        try{

            $modelos    =   Modelo::pesquisar(request())->paginate(15);

            return view('admin.modelo.index')->with('modelos',$modelos);

        }catch(\Exception $e){
            return "error : ".$e->getMessage();
        }
    }


}