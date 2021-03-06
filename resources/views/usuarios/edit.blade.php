@extends('layouts.app')



@section('content')

<h1> Personal information </h1>

<div class="row">
    
        <form method="post" action="{{ route('usuarios.update') }}">
                {{ csrf_field() }}

	    <input type="hidden" name="id_user" value="{{ $user->id }}">

    	<div class="form-group{{ $errors->has('usuario') ? ' has-error' : '' }}">
    		<label>User</label>
            <input type="text" class="form-control"  
            name="usuario" value="{{    $user->usuario }}">
            @if ($errors->has('usuario'))
                  <span class="help-block">
                      <strong>{{ $errors->first('usuario') }}</strong>
                  </span>
                @endif 
        </div>
        
        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Nombres"
                name="nombre" value="{{   $user->nombres }}">
                @if ($errors->has('nombre'))
                  <span class="help-block">
                      <strong>{{ $errors->first('nombre') }}</strong>
                  </span>
                @endif 
        </div>

        <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                <label>Last Name</label>
                <input type="text" class="form-control" placeholder="Apellidos"
                name="apellido" value="{{   $user->apellidos }}">
                @if ($errors->has('apellido'))
                  <span class="help-block">
                      <strong>{{ $errors->first('apellido') }}</strong>
                  </span>
                @endif 
        </div>
        
    	<div class="form-group">
    		<label>Description</label>
            <textarea class="form-control my-editor" placeholder="Información acerca de ti"
            rows="4" id="task" name="descripcion">{{ $user->descripcion_user }}</textarea>
		</div>
    
	

        <div class="btn-group">
            <input class="btn btn-primary" type="submit" value="Save">

            <a class="btn btn-danger" 
            href="{{ redirect()->getUrlGenerator()->previous() }}">Return</a>

        </form>
    </div>


        <div class="tm-bg-primary-dark tm-block">
            <h4>Option <h4>
       
                <a  onclick="return confirm
                ('¿Desea eliminar su cuenta? Se eliminara toda la informacion relacionada')"
                    href="/usuarios/{{ $user->id }}/eliminar">  
                    <i class="fa fa-power-off" aria-hidden="true"></i> Delete account</a>
                </a> 
      
        </div>
</div>  

       
   


@stop


