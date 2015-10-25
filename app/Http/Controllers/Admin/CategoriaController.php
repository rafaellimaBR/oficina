<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 18/10/15
 * Time: 20:49
 */

namespace App\Http\Controllers\Admin;


use App\Categoria;
use App\Http\Controllers\Admin\AdminController;

class CategoriaController extends AdminController
{
    public function __construct()
    {

    }

    public function index()
    {

        if(!unserialize(auth()->user()->grupo->categoria)['vis']){
            return redirect()->route('dashboard.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        $categoria   =   Categoria::paginate(15);
        return view('admin.categoria.index')->with('categorias',$categoria);

    }

    public function novo()
    {
        if(!unserialize(auth()->user()->grupo->categoria)['cri']){
            return redirect()->route('categoria.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        return view('admin.categoria.novo');
    }

    public function cadastrar()
    {
        if(!unserialize(auth()->user()->grupo->categoria)['cri']){
            return redirect()->route('categoria.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
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
        if(!unserialize(auth()->user()->grupo->categoria)['edi']){
            return redirect()->route('categoria.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        $categoria    =   Categoria::find($id);
        if($categoria != null){
            return view('admin.categoria.edicao')->with('categoria',$categoria);
        }else{
            return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi encontrados','icon'=>'warning']);
        }

    }

    public function atualizar()
    {
        if(!unserialize(auth()->user()->grupo->categoria)['edi']){
            return redirect()->route('categoria.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
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
        if(!unserialize(auth()->user()->grupo->categoria)['exc']){
            return redirect()->route('categoria.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
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