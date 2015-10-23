<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 18/10/15
 * Time: 20:49
 */

namespace App\Http\Controllers\Admin;


use App\Categoria;
use Illuminate\Routing\Controller;

class CategoriaController extends Controller
{
    public function index()
    {
        $categoria   =   Categoria::paginate(15);
        return view('admin.categoria.index')->with('categorias',$categoria);
    }

    public function novo()
    {
        return view('admin.categoria.novo');
    }

    public function cadastrar()
    {
        try{
            $validacao  =   Categoria::validar(request()->all());

            if($validacao->fails()){
                return redirect()->route('categoria.novo')->withErrors($validacao)->withInput();
            }

            $categoria    =   Categoria::gravar(request());

            return redirect()->route('categoria.index');

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }
    public function editar($id)
    {
        $categoria    =   Categoria::find($id);
        return view('admin.categoria.edicao')->with('categoria',$categoria);
    }

    public function atualizar()
    {
        try{
            $validacao  =   Categoria::validar(request()->all());

            if($validacao->fails()){
                return redirect()->route('categoria.editar',['id'=>request()->get('id')])->withErrors($validacao)->withInput();
            }

            Categoria::atualizar(request());

            return redirect()->route('categoria.index');

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function excluir()
    {
        try {
            Categoria::excluir(request());
            return redirect()->route('categoria.index');
        }catch (\Exception $e){
            return "Error ao cadastrar: ".$e->getMessage();
        }
    }

    public function pesquisar()
    {
        try{

            $categorias    =   Categoria::pesquisar(request())->paginate(15);

            return view('admin.categoria.index')->with('categorias',$categorias);

        }catch(\Exception $e){
            return "error : ".$e->getMessage();
        }
    }
}