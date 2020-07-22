<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = [
        'mensaje',
        'user_id',
        'pbi_id',
        'fecha'
    ];

    public function commentable()
    {
        return $this->morphTo();
    }
    
   
}
