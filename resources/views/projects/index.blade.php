@extends('layouts.app')

@section('content')
<div class="row tm-content-row">
    <h1 align=center> Proyectos </h1> 
    
    @if(count($projects) < 1 )
        <h2 align=center> No tiene proyectos, comience creando uno </h2>
    @endif
    <div class="col-md-4">
        <div class="panel panel-default ">
            <div class="panel-heading" >  <h5>Mis Proyectos</h5>
                <a  class="btn btn-primary btn-sm"  
                    href="/projects/create">
                    Crear </a> 
            </div>
            <div class="panel-body" >
                <ul class="list-group">
                    @foreach($projects as $project)
                        <li class="list-group-item"> 
                        <a href="/projects/{{ $project->id }}" > {{ $project->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    

    @if(count($proyectosInv)>0)
    <div class="col-md-4">
        <div class="panel panel-info ">
            <div class="panel-heading">  
                <p class="text-white">Invitado a </p> 
            </div>

            <div class="panel-body" >
                <ul class="list-group">
                    @foreach($proyectosInv as $proyectoInv)
                        <li class="list-group-item"> 
                            <a href="/projects/{{ $proyectoInv->id }}">{{ $proyectoInv->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif
</div>

   

@endsection
