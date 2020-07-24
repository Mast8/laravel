@extends('layouts.app')

  @section('content')


  <div class="row">
    <div class="col-12 tm-block-col">
          <div class="tm-bg-primary-dark tm-block ">
          <h1 align="center">{{ $project->name }}</h1>
          <p class="lead">{{ $project->description }}</p>
          </div>
    
    </div>

    <div class="col-md-8">
          <h1 align=center>PRODUCT BACKLOG</h1>
        
          <a href="{{ route('sprints.store', ['idproyecto' => $project->id]) }}" 
            class="pull-left btn btn-primary btn-sm">
            Crear sprint
          </a> 

          @if( count($sprints) > 0 ) 
            <a href="{{ route('pbis.create', ['idProyecto' => $project->id]) }}" 
              class="pull-right btn btn-primary btn-sm">
              Crear historia 
            </a>
          @else
            <h1>Primero debe crear sprints para registrar las historias de usuario</h1>
          @endif

      @if( count($pbis) > 0 ) 
      <table width="100" class="table">
          <thead>
              <tr>
                  <th ><strong> HISTORIA </strong></th>
                  <th ><strong> SPRINT </strong></th>
                  <th ><strong> ESTIMACIÓN </strong></th>
                  <th ><strong> PRIORIDAD </strong></th>
              </tr>
          </thead>
          <tbody>
              @foreach($pbis as $pbi)
                  <tr>
                      <td> <a href="/pbis/edit/{{ $pbi->id }}" > {{ $pbi->titulo }}</a> </td>
                      {{-- <td> <a href="/pbis/{{ $pbi->id }}" > {{ $pbi->titulo }}</a> </td> --}}
                      <td> <a href="/sprints/{{ $pbi->sprint_id }}" > {{ $pbi->nombre }}</a></td>
                      <td>  {{ $pbi->estimacion }} </td>

                      <td>  
                          @if($pbi->prioridad_id == 3)
                              Baja
                                @elseif($pbi->prioridad_id == 2)
                                  Media
                                    @else
                                        Alta
                          @endif  
                      </td>
                      
                      
                  </tr> 
              @endforeach
          </tbody>
      </table>
      @endif
  </div>


      <div class="col-md-4">
        <div class="tm-bg-primary-dark tm-block">
            <div class="row justify-content-md-center">
              <div class="sidebar-module">
                <h4>Opciones</h4>
                <ol class="list-unstyled">

                  <li><a href="/projects/{{ $project->id }}/papelera/historias"><i class="fa fa-trash" 
                    aria-hidden="true"></i> Papelera de historias</a>
                  </li>

                  <li><a href="/projects/{{ $project->id }}/papelera/tareas"><i class="fa fa-trash" 
                    aria-hidden="true"></i> Papelera de tareas</a>
                  </li>

                  <li>
                    <a href="/projects/{{ $project->id }}/edit">
                    <i class="fa fa-edit" aria-hidden="true"></i> 
                    Editar</a>
                  </li>
    
                  <li> <a href="/proyecto/{{ $project->id }}/miembros"><i class="fa fa-users" 
                    aria-hidden="true"></i> Miembros</a>
                  </li>
    
                  <li><a href="/projects/create"><i class="fa fa-plus" 
                    aria-hidden="true"></i> Crear nuevo proyecto</a>
                  </li>
    
                <br/>
                
               

                @if($project->user_id == Auth::user()->id)
                  <li>
                  <i class="fa fa-power-off" aria-hidden="true"></i>
                  <a   
                  href="#"
                      onclick="
                      var result = confirm('Desea eliminar el proyecto?');
                          if( result ){
                                  event.preventDefault();
                                  document.getElementById('delete-form').submit();
                          }
                              "
                              >
                      Eliminar
                  </a>
    
                  <form id="delete-form" action="{{ route('projects.destroy',[$project->id]) }}" 
                    method="POST" style="display: none;">
                            <input type="hidden" name="_method" value="delete">
                            {{ csrf_field() }}
                  </form>
    
                  </li>
                @endif

              <h4>  <i class="fa fa-print" 
              aria-hidden="true"></i> Reportes</h4>
                <li>
                  <a href="{{ $project->id }}/reporte/sprints" > Reporte Sprints</a> 
                </li>
                <li>
                  <a href="{{ $project->id }}/reportes" > Reporte Historias</a> 
                </li>
                <li>
                    <a href="{{ $project->id }}/reporte/tareas" > Reporte Tareas</a> 
                </li>
                <li>
                    <a href="{{ $project->id }}/reporte/tareas_estado" > Reporte Estado de Tareas</a> 
                </li>
                <li>
                  <a href="{{ $project->id }}/reporte/equipo" > Reporte Equipo</a> 
                </li>

                </ol>
               <hr/>

          </div>
        </div>
      </div>
    </div>
@endsection