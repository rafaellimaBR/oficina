<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Marca extends Model
{
    protected $table    =   'marcas';

    private static $restricoes  =   [
        'nome'      =>  'required|unique:marcas',
    ];
    private static $mensagens   =   [
        'required'      =>  'O campo :attribute é obrigatório.',
        'unique'        =>  'O :attribute já esta cadastrado.',
    ];

    public function modelos()
    {
        return $this->hasMany('App\Modelo');
    }

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
        $marca          =   new Marca();
        $marca->nome    =   $req->get('nome');

        if($marca->save() == false){
            throw new \Exception('Erro ao grava novo registro.',402);
        }

        return $marca;
    }
    public static function atualizar(Request $req)
    {
        $marca          =   Marca::find($req->get('id'));
        $marca->nome    =   $req->get('nome');

        if($marca->save() == false){
            throw new \Exception('Erro ao grava novo registro.',402);
        }

        return $marca;
    }
    public static function excluir(Request $req)
    {
        $marca      =   Marca::find($req->get('id'));

        if($marca->delete() == false){
            throw new \Exception('Erro ao excluir registro',402);
        }
    }

    public static function pesquisar(Request $req)
    {
        return Marca::PesquisarPorNome($req->get('nome'));
    }
}
