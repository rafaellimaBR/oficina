<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 18/10/15
 * Time: 01:48
 */

namespace App\Http\Controllers\Admin;


use App\Veiculo;
use App\Http\Controllers\Admin\AdminController;

class VeiculoController extends AdminController
{
    public function index()
    {
        if(!unserialize(auth()->user()->grupo->veiculo)['vis']){
            return redirect()->route('dashboard.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        $veiculo   =   Veiculo::paginate(15);
        return view('admin.veiculo.index')->with('veiculos',$veiculo);
    }

    public function novo()
    {
        if(!unserialize(auth()->user()->grupo->veiculo)['cri']){
            return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        return view('admin.veiculo.novo');
    }

    public function detalhes($id)
    {
        if(!unserialize(auth()->user()->grupo->veiculo)['vis']){
            return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        $veiculo    =   Veiculo::find($id);

        return view('admin.veiculo.detalhes')->with('veiculo',$veiculo);
    }

    public function cadastrar()
    {
        if(!unserialize(auth()->user()->grupo->veiculo)['cri']){
            return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        try{
//            return request()->all();

            $validacao  =   Veiculo::validar(request()->all());

            if($validacao->fails()){
                return redirect()->route('veiculo.novo')->withErrors($validacao)->withInput();
            }

            Veiculo::gravar(request());

            return redirect()->route('veiculo.index');

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }
    public function editar($id)
    {
        if(!unserialize(auth()->user()->grupo->veiculo)['edi']){
            return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        $veiculo    =   Veiculo::find($id);

        if($veiculo == null){
            return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi encontrado.','icon'=>'warning']);
        }else {
            return view('admin.veiculo.edicao')->with('veiculo', $veiculo);
        }
    }

    public function atualizar()
    {
        if(!unserialize(auth()->user()->grupo->veiculo)['edi']){
            return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        try{
            $validacao  =   Veiculo::validar(request()->all());

            if($validacao->fails()){
                return redirect()->route('veiculo.editar',['id'=>request()->get('id')])->withErrors($validacao)->withInput();
            }

            Veiculo::atualizar(request());

            return redirect()->route('veiculo.index');

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function excluir()
    {
        if(!unserialize(auth()->user()->grupo->veiculo)['exc']){
            return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        try {
            Veiculo::excluir(request());
            return redirect()->route('veiculo.index');
        }catch (\Exception $e){
            return "Error ao cadastrar: ".$e->getMessage();
        }
    }

    public function pesquisar()
    {
        try{

            $veiculos    =   Veiculo::pesquisar(request())->paginate(15);

            return view('admin.veiculo.index')->with('veiculos',$veiculos);

        }catch(\Exception $e){
            return "error : ".$e->getMessage();
        }
    }

    public function placa()
    {
        if(request()->ajax()){
            $veiculos   =   Veiculo::PesquisarPorPlaca(request()->get('q'))->get();
            $retorno    =   [];

            foreach ($veiculos as $key => $value) {
                $retorno[$key]['id'] = $value->id;
                $retorno[$key]['text'] = $value->id;
                $retorno[$key]['modelo'] = $value->modelo->nome;
                $retorno[$key]['marca'] = $value->modelo->marca->nome;
                $retorno[$key]['cor'] = $value->cor;
            }


            return response()->json($retorno);
        }else{
            return "Acesso negado";
        }
    }
}