<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prioridad extends Model
{
    protected $fillable = [
        'nombrePrio',  
    ];

    public function pbis()
    {
    	return $this->hasMany('App\Pbi');
    }
}
