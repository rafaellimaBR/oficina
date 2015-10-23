<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Telefone extends Model
{
    protected $table    =   'telefones';

    public static function gravar($numero, $ddd,$tipo,$operadora)
    {
        $telefone           =   new Telefone();
        $telefone->id       =   $numero;
        $telefone->ddd      =   $ddd;
        $telefone->tipo     =   $tipo;
        $telefone->operadora=   $operadora;

        if($telefone->save() == false){
            throw new \Exception('Não foi possível registrar o telefone '.$numero,402);
        }
        return Telefone::find($numero);
    }

    public static function pesquisarPorNumero($numero)
    {
        return Telefone::find($numero);
    }

}
