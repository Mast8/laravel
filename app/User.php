<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usuario', 
        'email', 
        'password',
        'nombres',
        'apellidos',
        'descripcion_user',
        'activado',
        'role_id'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

  
    
    public function role(){
		return $this->belongsTo('App\Role');
    }

  
    

    public function tasks()
    {
        return $this->belongsToMany('App\Historia');
    }


    //many to many relationship
    public function projects()
    {
        return $this->belongsToMany('App\Project');
    }

    public function tareas()
    {
        return $this->belongsToMany('App\Tarea');
    }

    public function comentarios()
    {
        return $this->belongsToMany('App\Comentario');
    }
}
