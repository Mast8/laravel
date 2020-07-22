<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = [
        'nombre',
    ];

    public function tareas()
    {
    	  return $this->hasMany('App\Tarea');
    }
}
