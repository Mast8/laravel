@extends('layouts.app')



@section('content')



    
            <a class="btn btn-primary" 
              href="{{ route('pbis.edit', ['id' => $pbi->id] ) }}">
              Volver a la historia</a>
            
            @if(count($miembros) < 1)
              <h3 align="center"> Debe invitar Miembros para registrar tareas. </h3>
              
            @else
              <a  
                href="{{ $pbi->id }}/tareas/create" 
                class="pull-right btn btn-primary btn-sm">
                <i class="fa fa-plus" aria-hidden="true"></i> 
              </a> 
            @endif
            <div class="text-center">
              <a class="btn btn-primary" href="/proyecto/{{ $proyecto }}/miembros"> 
                Registrar miembros</a>
            </div>
    
  <h3>Tareas de <b> {{ $pbi->titulo }} </b></h3>
  <div class="row">
    
      <div class="col-sm-4">
      <h3 align="center"> <b> {{$num_pendientes}} PENDIENTES </b></h3>
                  
            @foreach($pendientes as $pendiente)
            <div class="list-group">
                <a href="/tareas/edit/{{$pendiente->id}}" class="list-group-item list-group-item-action 
                    flex-column align-items-start ">
                  <div align="center" class="d-flex w-100 justify-content-between">
                    
                    <small>{{ $pendiente->name }}</small>
                  </div>
                  <p class="mb-1"> {{ $pendiente->descripcion }} </p>
                  <small> Asignado a: <b> {{$pendiente->responsable}}</b>
                    <p class="mb-1">Creado por: <b> {{ $pendiente->creado_por }} </b> </p>
                </a>
            </div> 
            @endforeach
      </div>

      <div class="col-sm-4">
          <h3 align="center"> <b> {{$num_en_cursos}} EN CURSO </b></h3>
                  
            @foreach($en_cursos as $en_curso)
                  
              <div class="list-group">
                      <a href="/tareas/edit/{{$en_curso->id}}" 
                        class="list-group-item list-group-item-action 
                          flex-column align-items-start ">
                        <div align="center" class="d-flex w-100 justify-content-between">
                          
                          <small>{{ $en_curso->name }}</small>
                        </div>
                        <p class="mb-1"> {{ $en_curso->descripcion }} </p>
                        <small> Asignado a <b> {{$en_curso->responsable }} </b>
                        <p class="mb-1">Creado por: <b> {{ $en_curso->creado_por }} </b> </p>
                         
                      </a>
              </div> 
              @endforeach
      </div>

      <div class="col-sm-4">
          <h3 align="center"><b> {{$num_concluidos}} CONCLUIDOS </b></h3>
                  
            @foreach($concluidos as $concluido)
                  
              <div class="list-group">
                      <a href="/tareas/edit/{{$concluido->id}}" 
                        class="list-group-item list-group-item-action 
                          flex-column align-items-start ">
                        <div align="center" class="d-flex w-100 justify-content-between">
                          
                          <small>{{ $concluido->name }}</small>
                        </div>
                        <p class="mb-1"> {{ $concluido->descripcion }} </p>
                        <small> Asignado a <b> {{$concluido->responsable}}  </b>
                        
                        <p class="mb-1">Creado por: <b> {{ $concluido->creado_por }} </b> </p>
                        <p class="mb-1">Concluido por: <b> {{ $concluido->concluido_por }} </b> </p>
                        

                      </a>
              </div> 
              @endforeach
      </div>

    </div> <!-- end container -->



@endsection
