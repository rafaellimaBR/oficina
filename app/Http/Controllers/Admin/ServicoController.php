<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 18/10/15
 * Time: 19:56
 */

namespace App\Http\Controllers\Admin;


use App\Servico;
use Illuminate\Routing\Controller;


class ServicoController extends Controller
{
    public function index()
    {
        $servico   =   Servico::paginate(15);
        return view('admin.servico.index')->with('servicos',$servico);
    }

    public function novo()
    {
        return view('admin.servico.novo');
    }

    public function cadastrar()
    {
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
        $servico    =   Servico::find($id);
        return view('admin.servico.edicao')->with('servico',$servico);
    }

    public function atualizar()
    {
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
}