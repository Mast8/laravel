<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'project_id'

    ];

    public function project(){
        return $this->belongsTo('App\Project');
    }

    public function pbis()
    {
    	return $this->hasMany('App\Pbi');
    }
}
