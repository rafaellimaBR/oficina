<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 18/10/15
 * Time: 19:56
 */

namespace App\Http\Controllers\Admin;


use App\Servico;
use App\Http\Controllers\Admin\AdminController;


class ServicoController extends AdminController
{
    public function index()
    {
        if(!unserialize(auth()->user()->grupo->servico)['vis']){
            return redirect()->route('dashboard.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        $servico   =   Servico::paginate(15);
        return view('admin.servico.index')->with('servicos',$servico);
    }

    public function novo()
    {
        if(!unserialize(auth()->user()->grupo->servico)['cri']){
            return redirect()->route('servico.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        return view('admin.servico.novo');
    }

    public function cadastrar()
    {
        if(!unserialize(auth()->user()->grupo->servico)['cri']){
            return redirect()->route('servico.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        try{
            $validacao  =   Servico::validar(request()->all());

            if($validacao->fails()){
                return redirect()->route('servico.novo')->withErrors($validacao)->withInput();
            }

            $servico    =   Servico::gravar(request());

            return redirect()->route('servico.index');

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }
    public function editar($id)
    {
        if(!unserialize(auth()->user()->grupo->servico)['edi']){
            return redirect()->route('servico.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        $servico    =   Servico::find($id);

        if($servico != null) {
            return view('admin.servico.edicao')->with('servico', $servico);
        }else{
            return redirect()->route('servico.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi encontrado.','icon'=>'warning']);
        }
    }

    public function atualizar()
    {
        if(!unserialize(auth()->user()->grupo->servico)['edi']){
            return redirect()->route('servico.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        try{
            $validacao  =   Servico::validar(request()->all());

            if($validacao->fails()){
                return redirect()->route('servico.editar',['id'=>request()->get('id')])->withErrors($validacao)->withInput();
            }

            Servico::atualizar(request());

            return redirect()->route('servico.index');

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function excluir()
    {
        if(!unserialize(auth()->user()->grupo->servico)['exc']){
            return redirect()->route('servico.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }

        try {
            Servico::excluir(request());
            return redirect()->route('servico.index');
        }catch (\Exception $e){
            return "Error ao cadastrar: ".$e->getMessage();
        }
    }

    public function pesquisar()
    {
        try{

            $servicos    =   Servico::pesquisar(request())->paginate(15);

            return view('admin.servico.index')->with('servicos',$servicos);

        }catch(\Exception $e){
            return "error : ".$e->getMessage();
        }
    }

    public function pesquisarServico()
    {
        if(request()->ajax()){
            $servico   =   Servico::pesquisar(request());
            $retorno    =   [];

            foreach ($servico as $key => $value) {
                $retorno[$key]['id'] = $value->id;
                $retorno[$key]['text'] = $value->nome;
                $retorno[$key]['nome'] = $value->nome;
                $retorno[$key]['valor'] = $value->valor;
            }

            return response()->json($retorno);
        }else{
            return "Acesso negado";
        }
    }

    public function getServico($id)
    {
        return response()->json(Servico::find($id));
        if(request()->ajax()){
            return response()->json(Servico::find($id));
        }else{
            return "Acesso negado!";
        }
    }
}