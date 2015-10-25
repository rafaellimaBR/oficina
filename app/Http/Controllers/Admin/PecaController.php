<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 18/10/15
 * Time: 23:01
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Admin\AdminController;
use App\Peca;

class PecaController extends AdminController
{
    public function index()
    {
        if(!unserialize(auth()->user()->grupo->estoque)['vis']){
            return redirect()->route('dashboard.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        $peca   =   Peca::paginate(15);
        return view('admin.peca.index')->with('pecas',$peca);
    }

    public function novo()
    {
        if(!unserialize(auth()->user()->grupo->estoque)['cri']){
            return redirect()->route('peca.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        return view('admin.peca.novo');
    }

    public function cadastrar()
    {
        if(!unserialize(auth()->user()->grupo->estoque)['cri']){
            return redirect()->route('peca.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        try{
            $validacao  =   Peca::validar(request()->all());

            if($validacao->fails()){
                return redirect()->route('peca.novo')->withErrors($validacao)->withInput();
            }

            Peca::gravar(request());

            return redirect()->route('peca.index');

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }
    public function editar($id)
    {
        if(!unserialize(auth()->user()->grupo->estoque)['edi']){
            return redirect()->route('peca.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        $peca    =   Peca::find($id);

        if($peca != null) {
            return view('admin.peca.edicao')->with('peca', $peca);
        }else{
            return redirect()->route('peca.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi encontrado.','icon'=>'warning']);
        }
    }

    public function atualizar()
    {
        if(!unserialize(auth()->user()->grupo->estoque)['edi']){
            return redirect()->route('peca.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        try{
            $validacao  =   Peca::validar(request()->all());

            if($validacao->fails()){
                return redirect()->route('peca.editar',['id'=>request()->get('id')])->withErrors($validacao)->withInput();
            }

            Peca::atualizar(request());

            return redirect()->route('peca.index');

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function excluir()
    {
        if(!unserialize(auth()->user()->grupo->estoque)['exc']){
            return redirect()->route('peca.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        try {
            Peca::excluir(request());
            return redirect()->route('peca.index');
        }catch (\Exception $e){
            return "Error ao cadastrar: ".$e->getMessage();
        }
    }

    public function pesquisar()
    {
        $pecas  =   Peca::pesquisar(request())->paginate(15);
        return view('admin.peca.index')->with('pecas',$pecas);
    }

    public function pesqusiarAjax()
    {
        if(request()->ajax()){
            $pecas  =   Peca::PesquisarPorTudo(request()->get('q'))->get();
            $retorno    =   [];

            foreach ($pecas as $key => $value) {
                $retorno[$key]['id'] = $value->id;
                $retorno[$key]['text'] = $value->descricao;
                $retorno[$key]['nome'] = $value->descricao;
                $retorno[$key]['valor'] = $value->valor;
                $retorno[$key]['qnt'] = $value->qnt;
                $retorno[$key]['marca'] = $value->marca;

            }
            return response()->json($retorno);


        }else{
            return 'Acesso negado.';
        }
    }

    public function getPeca($id)
    {
        return response()->json(Peca::find($id));
    }


}