<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 19/10/15
 * Time: 14:41
 */

namespace App\Http\Controllers\Admin;

use App\Contrato;
use App\Servico;
use Carbon\Carbon;
use Illuminate\Routing\Controller;


class ContratoController extends Controller
{
    public function index()
    {
        $contrato   =   Contrato::paginate(15);
        return view('admin.contrato.index')->with('contratos',$contrato);
    }

    public function novo()
    {
        return view('admin.contrato.novo');
    }

    public function cadastrar()
    {
        try{
            $validacao  =   Contrato::validar(request()->all());

            if($validacao->fails()){
                return redirect()->route('contrato.novo')->withErrors($validacao)->withInput();
            }

            $id    =   Contrato::gravar(request());

            return redirect()->route('contrato.editar',['id'=>$id]);

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }
    public function editar($id)
    {
        $contrato    =   Contrato::find($id);
        return view('admin.contrato.edicao')->with('contrato',$contrato);
    }

    public function atualizar()
    {

        try{
            $validacao  =   Contrato::validar(request()->all());

            if($validacao->fails()){
                return redirect()->route('contrato.editar',['id'=>request()->get('id')])->withErrors($validacao)->withInput();
            }

            Contrato::atualizar(request());

            return redirect()->route('contrato.index');

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function excluir()
    {
        try {
            Contrato::excluir(request());
            return redirect()->route('contrato.index');
        }catch (\Exception $e){
            return "Error ao cadastrar: ".$e->getMessage();
        }
    }

    public function pesquisar()
    {
        try{

            $contratos    =   Contrato::pesquisar(request())->paginate(15);

            return view('admin.contrato.index')->with('contratos',$contratos);

        }catch(\Exception $e){
            return "error : ".$e->getMessage();
        }
    }

    public function pesquisarPorID($id)
    {
        if(request()->ajax()){
            return response()->json(Contrato::find($id)->modelos()->get());
        }else{
            return "Acesso Negado.";
        }
    }

    public function addServico()
    {

        if(request()->ajax()){
            try{
                Contrato::vincularServico(request());

                $contrato   =   Contrato::find(request()->get('contrato'));

                $html   =   view('admin.contrato.includes.servicos')->with('contrato',$contrato)->render();

                return response()->json(['html'=>$html]);
            }catch (\Exception $e){
                return response()->json(['error'=>$e->getMessage()]);
            }
        }else{
            return "Acesso negado";
        }
    }
}