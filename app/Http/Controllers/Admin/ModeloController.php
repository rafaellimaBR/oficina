<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 18/10/15
 * Time: 00:55
 */

namespace App\Http\Controllers\Admin;


use App\Marca;
use App\Modelo;
use Illuminate\Routing\Controller;

class ModeloController extends Controller
{
    public function index()
    {
        $modelo   =   Modelo::paginate(15);
        return view('admin.modelo.index')->with('modelos',$modelo);
    }

    public function novo()
    {
        return view('admin.modelo.novo');
    }

    public function cadastrar()
    {
        try{
            $validacao  =   Modelo::validar(request()->all());

            if($validacao->fails()){
                return redirect()->route('modelo.novo')->withErrors($validacao)->withInput();
            }

            $marca    =   Modelo::gravar(request());

            return redirect()->route('modelo.index');

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }
    public function editar($id)
    {
        $modelo    =   Modelo::find($id);
        return view('admin.modelo.edicao')->with('modelo',$modelo);
    }

    public function atualizar()
    {
        try{
            $validacao  =   Modelo::validar(request()->all());

            if($validacao->fails()){
                return redirect()->route('modelo.editar',['id'=>request()->get('id')])->withErrors($validacao)->withInput();
            }

            Modelo::atualizar(request());

            return redirect()->route('modelo.index');

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function excluir()
    {
        try {
            Modelo::excluir(request());
            return redirect()->route('modelo.index');
        }catch (\Exception $e){
            return "Error ao cadastrar: ".$e->getMessage();
        }
    }

    public function pesquisar()
    {
        try{

            $modelos    =   Modelo::pesquisar(request())->paginate(15);

            return view('admin.modelo.index')->with('modelos',$modelos);

        }catch(\Exception $e){
            return "error : ".$e->getMessage();
        }
    }


}