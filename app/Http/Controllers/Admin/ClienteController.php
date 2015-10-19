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

            return redirect()->route('cliente.editar',['id'=>$cliente->id]);

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }
    public function editar($id)
    {
        $cliente    =   Cliente::find($id);
        return view('admin.cliente.edicao')->with('cliente',$cliente);
    }

    public function atualizar()
    {
        try{
            $validacao  =   Cliente::validar(request()->all());

            if($validacao->fails()){
                return redirect()->route('cliente.editar',['id'=>request()->get('id')])->withErrors($validacao)->withInput();
            }

            Cliente::atualizar(request());

            return redirect()->route('cliente.index');

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function excluir()
    {
        try {
            Cliente::excluir(request());
            return redirect()->route('cliente.index');
        }catch (\Exception $e){
            return "Error ao cadastrar: ".$e->getMessage();
        }
    }

    public function pesquisar()
    {
        try{

            $clientes    =   Cliente::pesquisar(request())->paginate(15);

            return view('admin.cliente.index')->with('clientes',$clientes);

        }catch(\Exception $e){
            return "error : ".$e->getMessage();
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

       }
    }
}