<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial_tareas extends Model
{
    protected $fillable = [
        'accion_tar',
        'realizada_por_tar',
        'tarea_id',
        'motivo_tar',
        'creada_el_tar'
    ];
}
