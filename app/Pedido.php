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

        $pedido         =   Pedido::find($pedido_id);

        $retorno        =   false;

        if($pedido != null){
            $peca   =   $pedido->peca;
            if($peca != null){
                if($pedido->faturado == false){
                    if($pedido->qnt <=  $peca->qnt){
                        $peca->qnt  =   $peca->qnt  -   $pedido->qnt;

                        if($peca->save() == false){

                            throw new \Exception('Falha no faturamento da peça. Peça :'.$peca->descricao,402);
                        }else{
                            $pedido->faturado   =   true;
                            $pedido->save();
                            $retorno    =   true;
                        }
                    }else{
                        throw new \Exception('Quantidade de peça não suficiente. Peça : '.$peca->descricao.' | Qnt do pedido : '.$pedido->qnt." | Qnt de peças :".$peca->qnt,402);
                    }
                }
            }else{
                throw new \Exception('Peça não existe nos registros',402);
            }

        }else{
            throw new \Exception('Pedido não existe nos registros',402);
        }


        return $retorno;
    }

    public static function desfaturarPeca($pedido_id)
    {
        $pedido     =   Pedido::find($pedido_id);
        $retorno    =   false;

        if($pedido  !=  null){

            if($pedido->faturado    ==  true){
                $peca   =   $pedido->peca;

                if($peca    !=  null){
                    $peca->qnt  =   $peca->qnt  +   $pedido->qnt;

                    if($peca->save() == false){
                        throw new \Exception('Não foi possível desfaturar a peça '.$peca->descricao,402);
                    }else{
                        $pedido->faturado   =   false;
                        $pedido->save();
                        $retorno            =   true;
                    }


                }else{
                    throw new \Exception('Peça não existe nos registros',402);
                }
            }
        }else{
            throw new \Exception('Pedido não existe nos registros',402);
        }

        return $retorno;
    }
}
