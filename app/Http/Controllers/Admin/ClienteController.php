<?php

/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 17/10/15
 * Time: 14:25
 */
namespace App\Http\Controllers\Admin;

use App\Cliente;
use \Illuminate\Routing\Controller;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes   =   Cliente::paginate(15);
        return view('admin.cliente.index')->with('clientes',$clientes);
    }

    public function novo()
    {
        return view('admin.cliente.novo');
    }

    public function cadastrar()
    {
        try{
            $validacao  =   Cliente::validar(request()->all());

            if($validacao->fails()){
                return redirect()->route('cliente.novo')->withErrors($validacao)->withInput();
            }

            $cliente    =   Cliente::gravar(request());

            return redirect()->route('cliente.editar',['id'=>$cliente->id])->with('alerta',['tipo'=>'success','msg'=>'Cadastrado com sucesso.','icon'=>'check']);

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }
    public function editar($id)
    {

        $cliente    =   Cliente::find($id);

        if($cliente == null){
            return redirect()->route('cliente.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi encontrado.','icon'=>'warning']);
        }else{
            return view('admin.cliente.edicao')->with('cliente',$cliente);
        }

    }

    public function atualizar()
    {
        try{
            $validacao  =   Cliente::validar(request()->all());

            if($validacao->fails()){
                return redirect()->route('cliente.editar',['id'=>request()->get('id')])->withErrors($validacao)->withInput();
            }

            Cliente::atualizar(request());

            return redirect()->route('cliente.index')->with('alerta',['tipo'=>'success','msg'=>'Editado com sucesso.','icon'=>'check']);;

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function excluir()
    {
        try {
            Cliente::excluir(request());
            return redirect()->route('cliente.index')->with('alerta',['tipo'=>'success','msg'=>'Excluir com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return "Error ao cadastrar: ".$e->getMessage();
        }
    }

    public function pesquisarAjax()
    {


        if(request()->ajax()){
            $clientes   =   Cliente::pesquisarAjax(request()->get('q'));
            $retorno    =   [];

            foreach ($clientes as $key => $value) {
                $retorno[$key]['id'] = $value->id;
                $retorno[$key]['text'] = $value->nome;
                $retorno[$key]['nome'] = $value->nome;
                $retorno[$key]['registro'] = $value->registro;
            }

            return response()->json($retorno);
        }else{
            return redirect()->route('cliente.index')->with('alerta',['tipo'=>'danger','msg'=>'Acesso negado.','icon'=>'ban']);
        }
    }
    public function pesquisar()
    {
        try{

            $clientes    =   Cliente::pesquisar(request())->paginate(15);

            return view('admin.cliente.index')->with('clientes',$clientes);

        }catch(\Exception $e){
            return redirect()->route('cliente.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }

    public function adcTelefone()
    {
       if(request()->ajax()){

            try{

                Cliente::vincularTelefone(request());

                $html   = view('admin.cliente.includes.telefones')->with('cliente',Cliente::find(request()->get('cliente_id')))->render();

                return response()->json(['html'=>$html]);
            }catch (\Exception $e){
                return response()->json(['error'=>$e->getMessage()]);
            }
       }else{
           return redirect()->route('cliente.index')->with('alerta',['tipo'=>'danger','msg'=>'Acesso negado.','icon'=>'ban']);
       }
    }
}