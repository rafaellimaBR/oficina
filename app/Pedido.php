<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table    =   'pedidos';

    public function peca()
    {
        return $this->belongsTo('App\Peca');
    }

    public static function faturarPecas($pedido_id){

        $pedidos       =   Pedido::find(1);

        $retorno        =   false;
        return $pedidos;
        foreach($pedidos as $r){

            $peca   =   Peca::find($r->peca_id);
//return $peca;
            if($peca != null){
                if($r->faturado == false){
                    if($r->qnt <= $peca->qnt){
                        $peca->qnt = $peca->qnt - $r->qnt;
                        $peca->save();

                        $pedido             =   Pedido::find($r->id);
                        $pedido->faturado   =   true;

                        if($pedido->save() == false){
                            throw new \Exception('Não foi possível faturar o pedido '.$r->id,402);
                        }

                    }else{
                        throw new \Exception('Quantidade insuficiente.',402);
                    }
                }
            }else{
                throw new \Exception('Peça não cadastrada.',402);
            }
            $retorno   =    true;
        }

        return $retorno;
    }

    public static function desfaturarPeca($contrato_id)
    {
        $contrato       = Contrato::find($contrato_id);


    }
}
