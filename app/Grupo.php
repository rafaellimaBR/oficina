<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Grupo extends Model
{
    protected $table    =   'grupos';


    private static $restricoes  =   [
        'nome'      =>  'required|unique:grupos',
        'descricao' =>  'required'
    ];
    private static $mensagens   =   [
        'required'      =>  'O campo :attribute é obrigatório.',
        'unique'        =>  'O :attribute já esta cadastrado.',
    ];

    public function scopePesquisarPorNome($scope, $nome)
    {
        return $scope->where('nome','like','%'.$nome.'%');
    }
    public static function validar($dados)
    {
        if(array_key_exists('id',$dados)){
            static::$restricoes['nome'] .= ',nome,'.$dados['id'];
        }
        return \Validator::make($dados, static::$restricoes,static::$mensagens);

    }
    public function usuarios()
    {
        return $this->hasMany('App\Usuario','usuario_id');

    }

    public static function gravar(Request $req)
    {
        $grupo              =   new Grupo();
        $grupo->nome        =   $req->get('nome');
        $grupo->descricao   =   $req->get('descricao');

        $grupo->grupo       =   serialize([
            'vis'       =>  $req->get('vis-grupo'),
            'cri'       =>  $req->get('cri-grupo'),
            'edi'       =>  $req->get('edi-grupo'),
            'exc'       =>  $req->get('exc-grupo')
        ]);
        $grupo->usuario     =   serialize([
            'vis'       =>  $req->get('vis-usuario'),
            'cri'       =>  $req->get('cri-usuario'),
            'edi'       =>  $req->get('edi-usuario'),
            'exc'       =>  $req->get('exc-usuario')
        ]);
        $grupo->cliente     =   serialize([
            'vis'       =>  $req->get('vis-cliente'),
            'cri'       =>  $req->get('cri-cliente'),
            'edi'       =>  $req->get('edi-cliente'),
            'exc'       =>  $req->get('exc-cliente')
        ]);
        $grupo->veiculo     =   serialize([
            'vis'       =>  $req->get('vis-veiculo'),
            'cri'       =>  $req->get('cri-veiculo'),
            'edi'       =>  $req->get('edi-veiculo'),
            'exc'       =>  $req->get('exc-veiculo')
        ]);
        $grupo->marca     =   serialize([
            'vis'       =>  $req->get('vis-marca'),
            'cri'       =>  $req->get('cri-marca'),
            'edi'       =>  $req->get('edi-marca'),
            'exc'       =>  $req->get('exc-marca')
        ]);
        $grupo->modelo     =   serialize([
            'vis'       =>  $req->get('vis-modelo'),
            'cri'       =>  $req->get('cri-modelo'),
            'edi'       =>  $req->get('edi-modelo'),
            'exc'       =>  $req->get('exc-modelo')
        ]);
        $grupo->estoque     =   serialize([
            'vis'       =>  $req->get('vis-estoque'),
            'cri'       =>  $req->get('cri-estoque'),
            'edi'       =>  $req->get('edi-estoque'),
            'exc'       =>  $req->get('exc-estoque')
        ]);
        $grupo->categoria     =   serialize([
            'vis'       =>  $req->get('vis-categoria'),
            'cri'       =>  $req->get('cri-categoria'),
            'edi'       =>  $req->get('edi-categoria'),
            'exc'       =>  $req->get('exc-categoria')
        ]);
        $grupo->contrato     =   serialize([
            'vis'       =>  $req->get('vis-contrato'),
            'cri'       =>  $req->get('cri-contrato'),
            'edi'       =>  $req->get('edi-contrato'),
            'exc'       =>  $req->get('exc-contrato')
        ]);
        $grupo->servico     =   serialize([
            'vis'       =>  $req->get('vis-servico'),
            'cri'       =>  $req->get('cri-servico'),
            'edi'       =>  $req->get('edi-servico'),
            'exc'       =>  $req->get('exc-servico')
        ]);







        if($grupo->save() == false){
            throw new \Exception('Erro ao grava novo registro.',402);
        }
    }
    public static function atualizar(Request $req)
    {
        $grupo      =   Grupo::find($req->get('id'));
        $grupo->nome        =   $req->get('nome');
        $grupo->descricao   =   $req->get('descricao');

        $grupo->grupo       =   serialize([
            'vis'       =>  $req->get('vis-grupo'),
            'cri'       =>  $req->get('cri-grupo'),
            'edi'       =>  $req->get('edi-grupo'),
            'exc'       =>  $req->get('exc-grupo')
        ]);
        $grupo->usuario     =   serialize([
            'vis'       =>  $req->get('vis-usuario'),
            'cri'       =>  $req->get('cri-usuario'),
            'edi'       =>  $req->get('edi-usuario'),
            'exc'       =>  $req->get('exc-usuario')
        ]);
        $grupo->cliente     =   serialize([
            'vis'       =>  $req->get('vis-cliente'),
            'cri'       =>  $req->get('cri-cliente'),
            'edi'       =>  $req->get('edi-cliente'),
            'exc'       =>  $req->get('exc-cliente')
        ]);
        $grupo->veiculo     =   serialize([
            'vis'       =>  $req->get('vis-veiculo'),
            'cri'       =>  $req->get('cri-veiculo'),
            'edi'       =>  $req->get('edi-veiculo'),
            'exc'       =>  $req->get('exc-veiculo')
        ]);
        $grupo->marca     =   serialize([
            'vis'       =>  $req->get('vis-marca'),
            'cri'       =>  $req->get('cri-marca'),
            'edi'       =>  $req->get('edi-marca'),
            'exc'       =>  $req->get('exc-marca')
        ]);
        $grupo->modelo     =   serialize([
            'vis'       =>  $req->get('vis-modelo'),
            'cri'       =>  $req->get('cri-modelo'),
            'edi'       =>  $req->get('edi-modelo'),
            'exc'       =>  $req->get('exc-modelo')
        ]);
        $grupo->estoque     =   serialize([
            'vis'       =>  $req->get('vis-estoque'),
            'cri'       =>  $req->get('cri-estoque'),
            'edi'       =>  $req->get('edi-estoque'),
            'exc'       =>  $req->get('exc-estoque')
        ]);
        $grupo->categoria     =   serialize([
            'vis'       =>  $req->get('vis-categoria'),
            'cri'       =>  $req->get('cri-categoria'),
            'edi'       =>  $req->get('edi-categoria'),
            'exc'       =>  $req->get('exc-categoria')
        ]);
        $grupo->contrato     =   serialize([
            'vis'       =>  $req->get('vis-contrato'),
            'cri'       =>  $req->get('cri-contrato'),
            'edi'       =>  $req->get('edi-contrato'),
            'exc'       =>  $req->get('exc-contrato')
        ]);
        $grupo->servico     =   serialize([
            'vis'       =>  $req->get('vis-servico'),
            'cri'       =>  $req->get('cri-servico'),
            'edi'       =>  $req->get('edi-servico'),
            'exc'       =>  $req->get('exc-servico')
        ]);
        $grupo->configuracao     =   serialize([
            'vis'       =>  $req->get('vis-configuracao'),
            'cri'       =>  $req->get('cri-configuracao'),
            'edi'       =>  $req->get('edi-configuracao'),
            'exc'       =>  $req->get('exc-configuracao')
        ]);

        if($grupo->save() == false){
            throw new \Exception('Erro ao grava novo registro.',402);
        }
    }
    public static function excluir(Request $req)
    {
        $grupo      =   Grupo::find($req->get('id'));

        if($grupo->delete() == false){
            throw new \Exception('Erro ao excluir registro',402);
        }
    }

    public static function pesquisar(Request $req)
    {
        return Grupo::PesquisarPorNome($req->get('nome'));


    }
}
