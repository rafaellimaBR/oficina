<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table    =   'status';

    public function contratos()
    {
        return $this->belongsToMany('App\Contrato','historicos','status_id','contrato_id');
    }
}
