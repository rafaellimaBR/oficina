<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Modelo extends Model
{
    protected $table    =   'modelos';

    public function marca()
    {
        return $this->belongsTo('App\Marca','marca_id');
    }
    private static $restricoes  =   [
        'nome'      =>  'required|unique:modelos',
    ];
    private static $mensagens   =   [
        'required'      =>  'O campo :attribute é obrigatório.',
        'unique'        =>  'O :attribute já esta cadastrado.',
    ];

    public function scopePesquisarPorNome($query, $nome)
    {
        return $query->where('nome','like','%'.$nome.'%');
    }
    public function scopePesquisarPorMarca($query, $id)
    {
        if($id != 0){
            return $query->where('marca_id','=',$id);
        }

    }
    public static function validar($dados)
    {
        if(array_key_exists('id',$dados)){
            static::$restricoes['nome'] .= ',nome,'.$dados['id'];
        }
        return \Validator::make($dados, static::$restricoes,static::$mensagens);

    }

    public static function gravar(Request $req)
    {
        $modelo          =   new Modelo();
        $modelo->nome    =   $req->get('nome');
        $modelo->marca()->associate(Marca::find($req->get('marca')));

        if($modelo->save() == false){
            throw new \Exception('Erro ao grava novo registro.',402);
        }
    }
    public static function atualizar(Request $req)
    {
        $modelo          =   modelo::find($req->get('id'));
        $modelo->nome    =   $req->get('nome');
        $modelo->marca()->associate(Marca::find($req->get('marca')));

        if($modelo->save() == false){
            throw new \Exception('Erro ao grava novo registro.',402);
        }

        return $modelo;
    }
    public static function excluir(Request $req)
    {
        $modelo      =   modelo::find($req->get('id'));

        if($modelo->delete() == false){
            throw new \Exception('Erro ao excluir registro',402);
        }
    }

    public static function pesquisar(Request $req)
    {
        return modelo::PesquisarPorNome($req->get('nome'))->PesquisarPorMarca($req->get('marca'));
    }
}
