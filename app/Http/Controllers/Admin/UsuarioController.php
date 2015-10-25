<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 24/10/15
 * Time: 18:11
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Admin\AdminController;
use App\Usuario;

class UsuarioController extends AdminController
{

    public function index()
    {
        if(!unserialize(auth()->user()->grupo->usuario)['vis']){
            return redirect()->route('dashboard.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        $usuarios   =   Usuario::paginate(15);

        return view('admin.usuario.index',['usuarios'=>$usuarios]);
    }

    public function novo()
    {
        if(!unserialize(auth()->user()->grupo->usuario)['cri']){
            return redirect()->route('usuario.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        return view('admin.usuario.novo');
    }

    public function cadastrar()
    {
        if(!unserialize(auth()->user()->grupo->usuario)['cri']){
            return redirect()->route('usuario.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        try{
            $validacao  =   Usuario::validar(request()->all());

            if($validacao->fails()){
                return redirect()->route('usuario.novo')->withErrors($validacao)->withInput();
            }

            $usuario    =   Usuario::gravar(request());

            return redirect()->route('usuario.index')->with('alerta',['tipo'=>'success','msg'=>'Cadastrado com sucesso.','icon'=>'check']);

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }
    public function editar($id)
    {
        if(!unserialize(auth()->user()->grupo->usuario)['edi']){
            return redirect()->route('usuario.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }

        $usuario    =   Usuario::find($id);

        if($usuario == null){
            return redirect()->route('usuario.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi encontrado.','icon'=>'warning']);
        }else{
            return view('admin.usuario.edicao')->with('usuario',$usuario);
        }

    }

    public function atualizar()
    {
        if(!unserialize(auth()->user()->grupo->usuario)['edi']){
            return redirect()->route('usuario.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        try{
            $validacao  =   Usuario::validar(request()->all());

            if($validacao->fails()){
                return redirect()->route('usuario.editar',['id'=>request()->get('id')])->withErrors($validacao)->withInput();
            }

            Usuario::atualizar(request());

            return redirect()->route('usuario.index')->with('alerta',['tipo'=>'success','msg'=>'Editado com sucesso.','icon'=>'check']);;

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function excluir()
    {
        if(!unserialize(auth()->user()->grupo->usuario)['exc']){
            return redirect()->route('usuario.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        try {
            Usuario::excluir(request());
            return redirect()->route('usuario.index')->with('alerta',['tipo'=>'success','msg'=>'Excluir com sucesso.','icon'=>'check']);
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