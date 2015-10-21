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
}
