<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maoobra extends Model
{
    protected $table    =   'maoobras';

    public function servico()
    {
        return $this->belongsTo('App\Servico');
    }


}
