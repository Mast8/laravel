<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $fillable = [
        'id',
        'tarea_id',
        'nombre_archivo',
        

    ];
    //cambiar a tarea
    public function tarea(){
        return $this->belongsTo('App\Tarea');
    }
}
