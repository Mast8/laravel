<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    //
    protected $fillable = [
        'name',
        'descripcion',
        'estado_id',
        'user_id',
        'responsable',
        'pbi_id',
        'creado_por',
        'concluido_por'
    ];


    public function user(){
		return $this->belongsTo('App\User');
    }

    public function project(){
		return $this->belongsTo('App\Project');
    }

    public function estado(){
		    return $this->belongsTo('App\Estado');
    }

    public function usuarios()
    {
        return $this->belongsTo('App\User');
    }

    public function pbi(){
        return $this->belongsTo('App\Pbi');
    }
    
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
    
    public function archivos(){
    	  return $this->hasMany('App\Archivo');
    }
}

