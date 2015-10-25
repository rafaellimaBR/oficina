<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 17/10/15
 * Time: 23:55
 */

namespace App\Http\Controllers\Admin;


use App\Marca;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Traits\Macroable;

class MarcaController extends AdminController
{
    public function index()
    {
        if(!unserialize(auth()->user()->grupo->marca)['vis']){
            return redirect()->route('dashboard.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        $marca   =   Marca::paginate(15);
        return view('admin.marca.index')->with('marcas',$marca);
    }

    public function novo()
    {
        if(!unserialize(auth()->user()->grupo->marca)['cri']){
            return redirect()->route('marca.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        return view('admin.marca.novo');
    }

    public function cadastrar()
    {
        if(!unserialize(auth()->user()->grupo->marca)['cri']){
            return redirect()->route('marca.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
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
        if(!unserialize(auth()->user()->grupo->marca)['edi']){
            return redirect()->route('marca.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
        $marca    =   Marca::find($id);

        if($marca   != null) {
            return view('admin.marca.edicao')->with('marca', $marca);
        }else{
            return redirect()->route('marca.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi encontrado.','icon'=>'warning']);
        }
    }

    public function atualizar()
    {
        if(!unserialize(auth()->user()->grupo->marca)['edi']){
            return redirect()->route('marca.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
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
        if(!unserialize(auth()->user()->grupo->marca)['exc']){
            return redirect()->route('marca.index')->with('alerta',['tipo'=>'info','msg'=>'Acesso Negado','icon'=>'ban']);
        }
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