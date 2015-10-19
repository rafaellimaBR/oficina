<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Peca extends Model
{
    protected $table    =   'pecas';

    private static $restricoes  =   [
        'descricao'      =>  'required|unique:pecas',
    ];
    private static $mensagens   =   [
        'required'      =>  'O campo :attribute é obrigatório.',
        'unique'        =>  'O :attribute já esta cadastrado.',
    ];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria','categoria_id');
    }

    public function scopePesquisarPorTudo($query, $nome)
    {
        return $query->where('pesquisa','like','%'.$nome.'%');
    }
    public function scopePesquisarPorCategoria($query, $id)
    {
        if($id != 0){
            return $query->where('categoria_id','=',$id);
        }
    }
    public function scopePesquisarPorMarca($query, $marca)
    {
        return $query->where('marca','like','%'.$marca.'%');
    }
    public function scopePesquisarPorDescricao($query, $descricao)
    {
        return $query->where('descricao','like','%'.$descricao.'%');
    }
    public function scopePesquisarPorAplicacao($query, $aplicacao)
    {
        return $query->where('aplicacao','like','%'.$aplicacao.'%');
    }
    public function scopePesquisarPorReferencia($query, $referencia)
    {
        return $query->where('referencia','like','%'.$referencia.'%');
    }
    public function scopePesquisarPorQnt($query, $qnt)
    {
        if($qnt != 0){
            return $query->where('qnt','<=',$qnt);
        }
    }
    public function scopePesquisarPorCodigo($query, $codigo)
    {
        return $query->where('codigo_original','like','%'.$codigo.'%');
    }
    public static function validar($dados)
    {
        if(array_key_exists('id',$dados)){
            static::$restricoes['descricao'] .= ',descricao,'.$dados['id'];
        }
        return \Validator::make($dados, static::$restricoes,static::$mensagens);

    }
    public static function gravar(Request $req)
    {
        $peca               =   new Peca();
        $peca->descricao    =   $req->get('descricao');
        $peca->referencia    =   $req->get('referencia');
        $peca->codigo_original    =   $req->get('original');
        $peca->qnt    =   $req->get('qnt');
        $peca->unidade    =   $req->get('unidade');
        $peca->valor    =   $req->get('valor');
        $peca->categoria()->associate(Categoria::find($req->get('categoria')));
        $peca->marca    =   $req->get('marca');
        $peca->aplicacao    =   $req->get('aplicacao');
        $peca->pesquisa     =   $req->get('descricao').' '.$req->get('referencia').' '.$req->get('original').' '.$req->get('marca').' '.$req->get('aplicacao');

        if($peca->save() == false){
            throw new \Exception('Erro ao grava novo registro.',402);
        }
    }
    public static function atualizar(Request $req)
    {
        $peca               =   Peca::find($req->get('id'));

        $peca->descricao    =   $req->get('descricao');
        $peca->referencia    =   $req->get('referencia');
        $peca->codigo_original    =   $req->get('original');
        $peca->qnt    =   $req->get('qnt');
        $peca->unidade    =   $req->get('unidade');
        $peca->valor    =   $req->get('valor');
        $peca->categoria()->associate(Categoria::find($req->get('categoria')));
        $peca->marca    =   $req->get('marca');
        $peca->aplicacao    =   $req->get('aplicacao');
        $peca->pesquisa     =   $req->get('descricao').' '.$req->get('referencia').' '.$req->get('original').' '.$req->get('marca').' '.$req->get('aplicacao');

        if($peca->save() == false){
            throw new \Exception('Erro ao grava novo registro.',402);
        }
    }
    public static function excluir(Request $req)
    {
        $peca      =   Peca::find($req->get('id'));

        if($peca->delete() == false){
            throw new \Exception('Erro ao excluir registro',402);
        }
    }

    public static function pesquisar(Request $req)
    {
        return Peca::PesquisarPorCategoria($req->get('categoria'))
            ->PesquisarPorCodigo($req->get('codigo'))
            ->PesquisarPorReferencia($req->get('referencia'))
            ->PesquisarPorAplicacao($req->get('aplicacao'))
            ->PesquisarPorDescricao($req->get('descricao'))
            ->PesquisarPorMarca($req->get('marca'))
            ->PesquisarPorQnt($req->get('qnt'));
    }
}
