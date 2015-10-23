<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Cliente extends Model
{
    protected $table    =   'clientes';

    private static $restricoes  =   [
        'registro'      =>  'required|unique:clientes',
        'email'         =>  'email|required|unique:clientes',
        'logradouro'    =>  'required',
        'nome'          =>  'required'
    ];
    private static $mensagens   =   [
        'required'      =>  'O campo :attribute é obrigatório.',
        'unique'        =>  'O :attribute já esta cadastrado.',
        'email'         =>  'Digite um email válido.'
    ];

    public function telefones()
    {
        return $this->belongsToMany('App\Telefone','contatos')->withTimestamps();
    }

    public function contatos()
    {
        return $this->hasMany('App\Contato');
    }

    public function veiculos()
    {
        return $this->hasMany('App\Veiculo');
    }

    public function scopePesquisarPorRegistro($query, $registro)
    {
        return $query->where('registro','like',"%".$registro."%");
    }

    public function scopePesquisarPorNome($query, $nome)
    {
        return $query->where('nome','like','%'.$nome.'%');
    }
    public function scopePesquisarPorEmail($query, $email)
    {
        return $query->where('email','like',"%".$email."%");
    }
    public function scopePesquisarPorTudo($query, $p)
    {
        return $query->where('pesquisa','like',"%".$p."%");
    }
    public static function validar($dados)
    {
        if(array_key_exists('id',$dados)){
            static::$restricoes['registro'] .= ',registro,'.$dados['id'];
            static::$restricoes['email'] .= ',email,'.$dados['id'];
        }
        return \Validator::make($dados, static::$restricoes,static::$mensagens);

    }

    public static function gravar(Request $req)
    {
        $cliente                =   new Cliente();
        $cliente->nome          =   $req->get('nome');
        $cliente->tipo_registro =   $req->get('tipo_registro');
        $cliente->registro      =   $req->get('registro');
        $cliente->cep           =   $req->get('cep');
        $cliente->logradouro    =   $req->get('logradouro');
        $cliente->numero        =   $req->get('numero');
        $cliente->bairro        =   $req->get('bairro');
        $cliente->cidade        =   $req->get('cidade');
        $cliente->estado        =   $req->get('estado');
        $cliente->email         =   $req->get('email');
        $cliente->pesquisa      =   $req->get('nome')." ".$req->get('registro').$req->get('email');

        if($cliente->save() == false){
            throw new \Exception('Erro ao grava novo registro.',402);
        }

        return $cliente;
    }
    public static function atualizar(Request $req)
    {
        $cliente                =   Cliente::find($req->get('id'));
        $cliente->nome          =   $req->get('nome');
        $cliente->tipo_registro =   $req->get('tipo_registro');
        $cliente->registro      =   $req->get('registro');
        $cliente->cep           =   $req->get('cep');
        $cliente->logradouro    =   $req->get('logradouro');
        $cliente->numero        =   $req->get('numero');
        $cliente->bairro        =   $req->get('bairro');
        $cliente->cidade        =   $req->get('cidade');
        $cliente->estado        =   $req->get('estado');
        $cliente->email         =   $req->get('email');
        $cliente->pesquisa      =   $req->get('nome')." ".$req->get('registro').$req->get('email');

        if($cliente->save() == false){
            throw new \Exception('Erro ao grava novo registro.',402);
        }
    }
    public static function excluir(Request $req)
    {
        $cliente    =   Cliente::find($req->get('id'));

        if($cliente->delete() == false){
            throw new \Exception('Erro ao excluir registro',402);
        }
    }

    public static function pesquisar(Request $req)
    {
        return Cliente::PesquisarPorEmail($req->get('email'))->PesquisarPorNome($req->get('nome'))->PesquisarPorRegistro($req->get('registro'));
    }

    public static function pesquisarAjax($p)
    {
        return Cliente::PesquisarPorTudo($p)->get();
    }
    public static function vincularTelefone(Request $req)
    {
        $cliente        =   Cliente::find($req->get('cliente_id'));

        $telefone       =   Telefone::find($req->get('numero'));

        if($telefone == null){
            $telefone = Telefone::gravar($req->get('numero'),$req->get('ddd'),$req->get('tipo'),$req->get('operadora'));
        }

        $cliente->telefones()->attach($telefone->id, ['dis' => $req->get('dis')]);
    }
}
