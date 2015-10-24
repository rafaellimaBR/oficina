<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Http\Request;

class Usuario extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'usuarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    private static $restricoes  =   [
        'nome'          =>  'required',
        'registro'      =>  'required|unique:usuarios',
        'email'         =>  'required|unique:usuarios',
        'telefone'      =>  'required',
        'celular'       =>  'required',
    ];
    private static $mensagens   =   [
        'required'      =>  'O campo :attribute é obrigatório.',
        'unique'        =>  'O :attribute já esta cadastrado.',
    ];
    public static function validar($dados)
    {
        if(array_key_exists('id',$dados)){
            static::$restricoes['registro'] .= ',registro,'.$dados['id'];
            static::$restricoes['email'] .= ',email,'.$dados['id'];
        }
        return \Validator::make($dados, static::$restricoes,static::$mensagens);
    }
    public function grupo()
    {
        return $this->belongsTo('App\Grupo');
    }

    public static function gravar(Request $req)
    {
        $usuario                =   new Usuario();
        $usuario->nome          =   $req->get('nome');
        $usuario->registro      =   $req->get('registro');
        $usuario->cep           =   $req->get('cep');
        $usuario->logradouro    =   $req->get('logradouro');
        $usuario->numero        =   $req->get('numero');
        $usuario->bairro        =   $req->get('bairro');
        $usuario->cidade        =   $req->get('cidade');
        $usuario->estado        =   $req->get('estado');
        $usuario->email         =   $req->get('email');
        $usuario->telefone      =   $req->get('telefone');
        $usuario->celular       =   $req->get('celular');
        $usuario->grupo()->associate(Grupo::find($req->get('grupo')));

        if($req->get('senha') != ""){
            $usuario->password      =   $req->get('senha');
        }else{
            $usuario->password      =   123456;
        }


        if($usuario->save() == false){
            throw new \Exception('Erro ao grava novo registro.',402);
        }
    }
    public static function atualizar(Request $req)
    {
        $usuario                =   Usuario::find($req->get('id'));
        $usuario->nome          =   $req->get('nome');
        $usuario->registro      =   $req->get('registro');
        $usuario->cep           =   $req->get('cep');
        $usuario->logradouro    =   $req->get('logradouro');
        $usuario->numero        =   $req->get('numero');
        $usuario->bairro        =   $req->get('bairro');
        $usuario->cidade        =   $req->get('cidade');
        $usuario->estado        =   $req->get('estado');
        $usuario->email         =   $req->get('email');
        $usuario->telefone      =   $req->get('telefone');
        $usuario->celular       =   $req->get('celular');
        $usuario->grupo()->associate(Grupo::find($req->get('grupo')));

        if($req->get('senha') != ""){
            $usuario->password      =   crypt($req->get('senha'));
        }


        if($usuario->save() == false){
            throw new \Exception('Erro ao grava novo registro.',402);
        }
    }
    public static function excluir(Request $req)
    {
        $usuario      =   Usuario::find($req->get('id'));

        if($usuario->delete() == false){
            throw new \Exception('Erro ao excluir registro',402);
        }
    }

    public static function pesquisar(Request $req)
    {
        return Servico::PesquisarPorNome($req->get('q'))->get();
    }

}
