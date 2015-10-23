<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Categoria extends Model
{
    protected $table    =   'categorias';

    private static $restricoes  =   [
        'nome'      =>  'required|unique:categorias',
    ];
    private static $mensagens   =   [
        'required'      =>  'O campo :attribute é obrigatório.',
        'unique'        =>  'O :attribute já esta cadastrado.',
    ];

    public function scopePesquisarPorNome($query, $nome)
    {
        return $query->where('nome','like','%'.$nome.'%');
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
        $categoria          =   new Categoria();
        $categoria->nome    =   $req->get('nome');

        if($categoria->save() == false){
            throw new \Exception('Erro ao grava novo registro.',402);
        }

        return $categoria;
    }
    public static function atualizar(Request $req)
    {
        $categoria          =   Categoria::find($req->get('id'));
        $categoria->nome    =   $req->get('nome');

        if($categoria->save() == false){
            throw new \Exception('Erro ao grava novo registro.',402);
        }
    }
    public static function excluir(Request $req)
    {
        $categoria      =   Categoria::find($req->get('id'));

        if($categoria->delete() == false){
            throw new \Exception('Erro ao excluir registro',402);
        }
    }

    public static function pesquisar(Request $req)
    {
        return Categoria::PesquisarPorNome($req->get('nome'));
    }
}
