<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    protected $table    =   'historicos';

    public function status()
    {
        return $this->belongsTo('App\Status','status_id');
    }

    public function scopeOrdernarPorData($query)
    {
        return $query->orderBy('created_at','asc');
    }
}
