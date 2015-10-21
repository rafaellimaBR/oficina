<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Contrato extends Model
{
    protected $table    =   'contratos';

    private static $restricoes  =   [
//        'cliente_id'      =>  'different:0',
//        'veiculo_id'      =>  'different:0',
    ];
    private static $mensagens   =   [
        'required'      =>  'O campo :attribute é obrigatório.',
        'unique'        =>  'O :attribute já esta cadastrado.',
        'different'     =>  'Selecione um registro',
    ];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente','cliente_id');
    }

    public function veiculo()
    {
        return $this->belongsTo('App\Veiculo','veiculo_id');
    }

    public function servicos()
    {
        return $this->belongsToMany('App\Servico','maoobras','contrato_id','servico_id')
            ->withPivot('valor');
    }

    public function maoobra()
    {
        return $this->hasMany('App\Maoobra','contrato_id');
    }

    public function pecas()
    {
        return $this->belongsToMany('App\Peca','pedidos','contrato_id','peca_id')
            ->withPivot('valor','qnt');
    }

    public function pedidos()
    {
        return $this->hasMany('App\Pedido','contrato_id');
    }

    public static function validar($dados)
    {
        if(array_key_exists('id',$dados)){
//            static::$restricoes['cliente_id'] .= ',nome,'.$dados['id'];
        }
        return \Validator::make($dados, static::$restricoes,static::$mensagens);

    }

    public static function gravar(Request $req)
    {
        $id =   static::gerarID();

        $contrato      =   new Contrato();
        $contrato->id   = $id;
        $contrato->cliente()->associate(Cliente::find($req->get('cliente_id')));
        $contrato->veiculo()->associate(Veiculo::find($req->get('veiculo_id')));
        $contrato->obs  =   $req->get('obs');
        $contrato->defeito  =   $req->get('defeito');
        $contrato->data_entrada =   $req->get('data_entrada');
        $contrato->data_saida =   $req->get('data_saida');
        $contrato->contato      =   $req->get('contato');
        $contrato->telefone_contato      =   $req->get('telefone');

        if($contrato->save() == false){
            throw new \Exception('Erro ao grava novo registro.',402);
        }

        return $id;
    }
    public static function atualizar(Request $req)
    {
        $contrato       =   Contrato::find($req->get('id'));
        $contrato->cliente()->associate(Cliente::find($req->get('cliente_id')));
        $contrato->veiculo()->associate(Veiculo::find($req->get('veiculo_id')));
        $contrato->obs  =   $req->get('obs');
        $contrato->defeito  =   $req->get('defeito');
        $contrato->data_entrada =   $req->get('data_entrada');
        $contrato->data_saida =   $req->get('data_saida');
        $contrato->contato      =   $req->get('contato');
        $contrato->telefone_contato      =   $req->get('telefone');

        if($contrato->save() == false){
            throw new \Exception('Erro ao grava novo registro.',402);
        }

        return $contrato;
    }
    public static function excluir(Request $req)
    {
        $contrato      =   Contrato::find($req->get('id'));

        if($contrato->delete() == false){
            throw new \Exception('Erro ao excluir registro',402);
        }
    }

    public static function pesquisar(Request $req)
    {
        return Marca::PesquisarPorNome($req->get('nome'));
    }

    private static function gerarID()
    {
        $retorno    =   false;

        $ano    =   Carbon::now()->format('y');
        $mes    =   Carbon::now()->format('m');
        $dia    =   Carbon::now()->format('d');
        $minuto =   Carbon::now()->format('i');
        $segundo=   Carbon::now()->format('s');
        $semana =   Carbon::now()->format('w');

        $id     =   $ano."".$mes."".$dia."".$minuto."".$segundo."".$semana;

        $contrato   =   Contrato::find($id);

        if($contrato == true){
            static::gerarID();
        }else{
            return $id;
        }
    }

    public static function vincularServico(Request $req)
    {
        $contrato   =   Contrato::find($req->get('contrato'));
        $contrato->servicos()->attach($req->get('servico'),['valor'=>$req->get('valor')]);
        $contrato->save();
    }

    public static function desvincularServico(Request $req)
    {
        $contrato   =   Contrato::find($req->get('contrato'));

        $contrato->servicos()->detach($req->get('servico'));
    }

    public static function vincularPeca(Request $req)
    {
        $contrato   =   Contrato::find($req->get('contrato'));
        $contrato->pecas()->attach($req->get('peca'),['valor'=>$req->get('valor'),'qnt'=>$req->get('qnt')]);
        $contrato->save();
    }
    public static function desvincularPeca(Request $req)
    {
        $contrato   =   Contrato::find($req->get('contrato'));

        $contrato->pecas()->detach($req->get('peca'));
        $contrato->save();
    }
}
