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
            Create sprint
          </a> 

          @if( count($sprints) > 0 ) 
            <a href="{{ route('pbis.create', ['idProyecto' => $project->id]) }}" 
              class="pull-right btn btn-primary btn-sm">
              Create historia 
            </a>
          @else
            <h1> You need to create one sprint first so you could create user stories </h1>
          @endif

      @if( count($pbis) > 0 ) 
      <table width="100" class="table">
          <thead>
              <tr>
                  <th ><strong> Title </strong></th>
                  <th ><strong> Sprint </strong></th>
                  <th ><strong> Estimate </strong></th>
                  <th ><strong> Priority </strong></th>
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
                              Small
                                @elseif($pbi->prioridad_id == 2)
                                  Medium
                                    @else
                                        High
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
                    aria-hidden="true"></i> Deleted Histories </a>
                  </li>

                  <li><a href="/projects/{{ $project->id }}/papelera/tareas"><i class="fa fa-trash" 
                    aria-hidden="true"></i> Deleted tasks</a>
                  </li>

                  <li>
                    <a href="/projects/{{ $project->id }}/edit">
                    <i class="fa fa-edit" aria-hidden="true"></i> 
                    Edit</a>
                  </li>
    
                  <li> <a href="/proyecto/{{ $project->id }}/miembros"><i class="fa fa-users" 
                    aria-hidden="true"></i> Members</a>
                  </li>
    
                  <li><a href="/projects/create"><i class="fa fa-plus" 
                    aria-hidden="true"></i>  Create new project </a>
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
                      Delete
                  </a>
    
                  <form id="delete-form" action="{{ route('projects.destroy',[$project->id]) }}" 
                    method="POST" style="display: none;">
                            <input type="hidden" name="_method" value="delete">
                            {{ csrf_field() }}
                  </form>
    
                  </li>
                @endif

              <h4>  <i class="fa fa-print" 
              aria-hidden="true"></i> Reports</h4>
                <li>
                  <a href="{{ $project->id }}/reporte/sprints" > Sprints</a> 
                </li>
                <li>
                  <a href="{{ $project->id }}/reportes" > User stories</a> 
                </li>
                <li>
                    <a href="{{ $project->id }}/reporte/tareas" > Tasks </a> 
                </li>
                <li>
                    <a href="{{ $project->id }}/reporte/tareas_estado" > Task's states </a> 
                </li>
                <li>
                  <a href="{{ $project->id }}/reporte/equipo" > Team</a> 
                </li>

                </ol>
               <hr/>

          </div>
        </div>
      </div>
    </div>
@endsection