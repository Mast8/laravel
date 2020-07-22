<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pbi extends Model
{
    protected $fillable = [
        'titulo',
        'descripcion',
        'sprint_id',
        'prioridad_id',
        'estimacion',
        'creado_por',
        'eliminado',

    ];

    public function sprint(){
        return $this->belongsTo('App\Sprint');
    }

    public function tareas(){
    	return $this->hasMany('App\Tarea');
    }
    
    public function prioridad(){
        return $this->belongsTo('App\Prioridad');
    }

    public function comentarios()
    {
        return $this->belongsToMany('App\Comentario');
    }

}
