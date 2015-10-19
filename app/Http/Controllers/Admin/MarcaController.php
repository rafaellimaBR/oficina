<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 17/10/15
 * Time: 23:55
 */

namespace App\Http\Controllers\Admin;


use App\Marca;
use Illuminate\Routing\Controller;
use Illuminate\Support\Traits\Macroable;

class MarcaController extends Controller
{
    public function index()
    {
        $marca   =   Marca::paginate(15);
        return view('admin.marca.index')->with('marcas',$marca);
    }

    public function novo()
    {
        return view('admin.marca.novo');
    }

    public function cadastrar()
    {
        try{
            $validacao  =   Marca::validar(request()->all());

            if($validacao->fails()){
                return redirect()->route('marca.novo')->withErrors($validacao)->withInput();
            }

            $marca    =   Marca::gravar(request());

            return redirect()->route('marca.index');

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }
    public function editar($id)
    {
        $marca    =   Marca::find($id);
        return view('admin.marca.edicao')->with('marca',$marca);
    }

    public function atualizar()
    {
        try{
            $validacao  =   Marca::validar(request()->all());

            if($validacao->fails()){
                return redirect()->route('marca.editar',['id'=>request()->get('id')])->withErrors($validacao)->withInput();
            }

            Marca::atualizar(request());

            return redirect()->route('marca.index');

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function excluir()
    {
        try {
            Marca::excluir(request());
            return redirect()->route('marca.index');
        }catch (\Exception $e){
            return "Error ao cadastrar: ".$e->getMessage();
        }
    }

    public function pesquisar()
    {
        try{

            $marcas    =   Marca::pesquisar(request())->paginate(15);

            return view('admin.marca.index')->with('marcas',$marcas);

        }catch(\Exception $e){
            return "error : ".$e->getMessage();
        }
    }

    public function pesquisarPorID($id)
    {
        if(request()->ajax()){
            return response()->json(Marca::find($id)->modelos()->get());
        }else{
            return "Acesso Negado.";
        }
    }
}