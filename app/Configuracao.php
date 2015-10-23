<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Configuracao extends Model
{
    protected $table    =   'configuracao';

    public static function atualizar(Request $req)
    {


        $conf       =   Configuracao::find(1);
        $conf->nome_empresa     =   $req->get('empresa');
        $conf->nome_abreviado     =   $req->get('nome_abreviada');
        $conf->cnpj     =   $req->get('cnpj');
        $conf->telefone1     =   $req->get('telefone1');
        $conf->telefone2     =   $req->get('telefone2');
        $conf->email     =   $req->get('email');
        $conf->endereco     =   $req->get('logradouro');
        $conf->numero     =   $req->get('numero');
        $conf->bairro     =   $req->get('bairro');
        $conf->cidade     =   $req->get('cidade');
        $conf->estado     =   $req->get('estado');

        $contrato   =   serialize([
            'orcamento'     =>  $req->get('orcamento'),
            'andamento'     =>  $req->get('andamento'),
            'aberto'        =>  $req->get('aberto'),
            'cancelado'     =>  $req->get('cancelado'),
            'finalizado'    =>  $req->get('finalizado'),
            'novo'          =>  $req->get('novo'),
        ]);
        $conf->contrato     =   $contrato;

        if($req->file('logo') != null){
            $caminho    =   base_path().'/public/img/';

            if(\File::exists($caminho.$conf->logo)){
                \File::delete($caminho.$conf->logo);
            }


            $logo       =   $req->file('logo');
            $extensao   =   $logo->getClientOriginalExtension();
            $nomeLogo   =   static::gerarNome().".".$extensao;


            $logo->move($caminho, $nomeLogo);

            $conf->logo     =   $nomeLogo;
        }



        $conf->save();


    }

    private static function gerarNome()
    {
        $ano    =   Carbon::now()->format('y');
        $mes    =   Carbon::now()->format('m');
        $dia    =   Carbon::now()->format('d');
        $minuto =   Carbon::now()->format('i');
        $segundo=   Carbon::now()->format('s');
        $semana =   Carbon::now()->format('w');

        $id     =   $ano."".$mes."".$dia."".$minuto."".$segundo."".$semana;

        return $id;
    }
}
