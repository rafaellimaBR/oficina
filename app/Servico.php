<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Servico extends Model
{
    protected $table    =   'servicos';

    private static $restricoes  =   [
        'nome'      =>  'required|unique:servicos',
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
        $servico          =   new Servico();
        $servico->nome    =   $req->get('nome');
        $servico->valor     =   $req->get('valor');

        if($servico->save() == false){
            throw new \Exception('Erro ao grava novo registro.',402);
        }

        return $servico;
    }
    public static function atualizar(Request $req)
    {
        $servico         =   Servico::find($req->get('id'));
        $servico->nome    =   $req->get('nome');

        if($servico->save() == false){
            throw new \Exception('Erro ao grava novo registro.',402);
        }

        return $servico;
    }
    public static function excluir(Request $req)
    {
        $servico      =   Servico::find($req->get('id'));

        if($servico->delete() == false){
            throw new \Exception('Erro ao excluir registro',402);
        }
    }

    public static function pesquisar(Request $req)
    {
        return Servico::PesquisarPorNome($req->get('q'))->get();
    }
}
