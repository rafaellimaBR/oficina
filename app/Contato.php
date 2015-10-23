<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $table    =   'contatos';

    public function telefone()
    {
        return $this->belongsTo('App\Telefone');
    }
}
