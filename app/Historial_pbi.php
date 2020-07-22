<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial_pbi extends Model
{
    protected $fillable = [
        'accion',
        'realizada_por',
        'pbi_id',
        'motivo',
        'pbi_id',
        'creada_el'
        
    ];
}
