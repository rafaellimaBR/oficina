<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 18/10/15
 * Time: 01:48
 */

namespace App\Http\Controllers\Admin;


use App\Veiculo;
use Illuminate\Routing\Controller;

class VeiculoController extends Controller
{
    public function index()
    {
        $veiculo   =   Veiculo::paginate(15);
        return view('admin.veiculo.index')->with('veiculos',$veiculo);
    }

    public function novo()
    {
        return view('admin.veiculo.novo');
    }

    public function detalhes($id)
    {
        $veiculo    =   Veiculo::find($id);

        return view('admin.veiculo.detalhes')->with('veiculo',$veiculo);
    }

    public function cadastrar()
    {
        try{
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
        $veiculo    =   Veiculo::find($id);
        return view('admin.veiculo.edicao')->with('veiculo',$veiculo);
    }

    public function atualizar()
    {
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