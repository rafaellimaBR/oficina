<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Veiculo extends Model
{
    protected $table    =   'veiculos';

    private static $restricoes  =   [
        'id'      =>  'required|unique:veiculos',
    ];
    private static $mensagens   =   [
        'required'      =>  'O campo :attribute é obrigatório.',
        'unique'        =>  'O :attribute já esta cadastrado.',
    ];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente','cliente_id');
    }

    public function modelo()
    {
        return $this->belongsTo('App\Modelo','modelo_id');
    }

    public function scopePesquisarPorPlaca($query, $placa)
    {
        return $query->where('id','like','%'.$placa.'%');
    }
    public function scopePesquisarPorModelo($query, $modelo)
    {
        if($modelo != 0){
            return $query->where('modelo_id','=',$modelo);
        }
    }
    public static function validar($dados)
    {
        if(array_key_exists('placa',$dados)){
            static::$restricoes['id'] .= ',id,'.$dados['id'];
        }
        return \Validator::make($dados, static::$restricoes,static::$mensagens);

    }

    public static function gravar(Request $req)
    {
        $veiculo                =   new Veiculo();
        $veiculo->id            =   $req->get('id');
        $veiculo->cliente()->associate(Cliente::find($req->get('cliente')));
        $veiculo->modelo()->associate(Cliente::find($req->get('modelo')));
        $veiculo->cidade        =   $req->get('cidade');
        $veiculo->estado        =   $req->get('estado');
        $veiculo->cor           =   $req->get('cor');
        $veiculo->ano_fabricacao=   $req->get('anofabricacao');
        $veiculo->ano_modelo    =   $req->get('anomodelo');
        $veiculo->combustivel   =   $req->get('combustivel');
        $veiculo->motor         =   $req->get('motor');

        if($veiculo->save() == false){
            throw new \Exception('Erro ao grava novo registro.',402);
        }
    }
    public static function atualizar(Request $req)
    {
        $veiculo            =   Veiculo::find($req->get('id'));
        $veiculo->id            =   $req->get('id');
        $veiculo->cliente()->associate(Cliente::find($req->get('cliente')));
        $veiculo->modelo()->associate(Cliente::find($req->get('modelo')));
        $veiculo->cidade        =   $req->get('cidade');
        $veiculo->estado        =   $req->get('estado');
        $veiculo->cor           =   $req->get('cor');
        $veiculo->ano_fabricacao=   $req->get('anofabricacao');
        $veiculo->ano_modelo    =   $req->get('anomodelo');
        $veiculo->combustivel   =   $req->get('combustivel');
        $veiculo->motor         =   $req->get('motor');

        if($veiculo->save() == false){
            throw new \Exception('Erro ao grava novo registro.',402);
        }
    }
    public static function excluir(Request $req)
    {
        $veiculo      =   Veiculo::find($req->get('id'));

        if($veiculo->delete() == false){
            throw new \Exception('Erro ao excluir registro',402);
        }
    }

    public static function pesquisar(Request $req)
    {
        return Veiculo::PesquisarPorPlaca($req->get('placa'))->PesquisarPorModelo($req->get('modelo'));
    }
}
