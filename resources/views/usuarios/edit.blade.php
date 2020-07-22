@extends('layouts.app')



@section('content')

<h1 align=center> Datos personales </h1>

<div class="row">
    <div class="col-md-8">
        <form method="post" action="{{ route('usuarios.update') }}">
                {{ csrf_field() }}

	    <input type="hidden" name="id_user" value="{{ $user->id }}">

    	<div class="form-group{{ $errors->has('usuario') ? ' has-error' : '' }}">
    		<label>Usuario</label>
            <input type="text" class="form-control"  
            name="usuario" value="{{    $user->usuario }}">
            @if ($errors->has('usuario'))
                  <span class="help-block">
                      <strong>{{ $errors->first('usuario') }}</strong>
                  </span>
                @endif 
        </div>
        
        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                <label>Nombres</label>
                <input type="text" class="form-control" placeholder="Nombres"
                name="nombre" value="{{   $user->nombres }}">
                @if ($errors->has('nombre'))
                  <span class="help-block">
                      <strong>{{ $errors->first('nombre') }}</strong>
                  </span>
                @endif 
        </div>

        <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                <label>Apellidos</label>
                <input type="text" class="form-control" placeholder="Apellidos"
                name="apellido" value="{{   $user->apellidos }}">
                @if ($errors->has('apellido'))
                  <span class="help-block">
                      <strong>{{ $errors->first('apellido') }}</strong>
                  </span>
                @endif 
        </div>
        
    	<div class="form-group">
    		<label>Descripción</label>
            <textarea class="form-control my-editor" placeholder="Información acerca de ti"
            rows="4" id="task" name="descripcion">{{ $user->descripcion_user }}</textarea>
		</div>
    
	

        <div class="btn-group">
            <input class="btn btn-primary" type="submit" value="Guardar">

            <a class="btn btn-danger" 
            href="{{ redirect()->getUrlGenerator()->previous() }}">Retroceder</a>

        </form>
    </div>
</div>  

    <div class="col-md-4">
        <div class="tm-bg-primary-dark tm-block">
            <h5>Opcion <h5>
       
                <a  onclick="return confirm
                ('¿Desea eliminar su cuenta? Se eliminara toda la informacion relacionada')"
                    href="/usuarios/{{ $user->id }}/eliminar">  
                    <i class="fa fa-power-off" aria-hidden="true"></i> Eliminar cuenta</a>
                </a> 
      
        </div>
    </div>  


       
   


@stop


