<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 18/10/15
 * Time: 23:01
 */

namespace App\Http\Controllers\Admin;


use Illuminate\Routing\Controller;
use App\Peca;

class PecaController extends Controller
{
    public function index()
    {
        $peca   =   Peca::paginate(15);
        return view('admin.peca.index')->with('pecas',$peca);
    }

    public function novo()
    {
        return view('admin.peca.novo');
    }

    public function cadastrar()
    {
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
        $peca    =   Peca::find($id);
        return view('admin.peca.edicao')->with('peca',$peca);
    }

    public function atualizar()
    {
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
}