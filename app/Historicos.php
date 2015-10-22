<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historicos extends Model
{
    protected $table    =   'historicos';

    public function status()
    {
        return $this->belongsTo('App\Status');
    }
}
