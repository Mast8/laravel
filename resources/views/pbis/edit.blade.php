@extends('layouts.app')

@section('content')



<div class="row">
    <div class="col-md-8">
  
    
     <h1>Actualizar datos de la historia: 
        <div>
             {{ $pbi->titulo }} 
            
        </div>
     </h1>

      
                                 
      <form method="post" action="{{ route('pbis.update') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

            <input type="hidden" name="pbi_id" value="{{ $pbi->id }}">
            <input type="hidden" name="sprint_id" value="{{ $pbi->sprint_id }}"> 
            <input type="hidden" name="proyecto_id" value="{{ $proyecto->project_id }}">
            <input type="hidden" name="_method" value="put"> 

            <div class="form-group">
              <label>Creado por: 
                {{ $pbi->creado_por }}
              </label>
            </div>

            <div class="form-group">
                <label for="company-name">Nombre<span class="required"></span></label>
                  <input  placeholder="Título de la historia"  
                          id="proyecto-name"
                          required
                          name="nombre"
                          spellcheck="false"
                          class="form-control"
                          value="{{ $pbi->titulo }}"
                  />
            </div>

            
            <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
              <label for="company-content">Descriptión</label>
              <textarea class="form-control my-editor" placeholder="Información acerca de la historia"
              rows="4" id="nombre" name="descripcion">{{  $pbi->descripcion  }}</textarea>
                   @if ($errors->has('descripcion'))
                      <span class="help-block">
                          <strong>{{ $errors->first('descripcion') }}</strong>
                      </span>
                  @endif 
            </div>

            <div class="form-group">
                <label>Prioridad actual: 
                  {{ $priori_act->nombrePrio }}
                </label>
            </div>

            <div class="form-group">
              <label>Seleccioné prioridad </label>
              <select name="priorida" class="form-control" data-style="btn-info" style="width:15%;">
                
                @foreach( $prioris as $priori)
                  
                  <option value="{{ $priori->id }}" {{ $priori_act->id == $priori->id ? 
                    'selected' : '' }}>{{ $priori->nombrePrio }}</option>
                @endforeach
                
              </select>
            </div>

            <div class="form-group">
                <label>Sprint actual: 
                  {{ $sprint_act->nombre }}
                </label>
            </div>

            <div class="form-group">
                <label>Seleccioné sprint </label>
                <select name="sprint" class="form-control" data-style="btn-info" style="width:15%;">
                  @foreach( $sprints as $sprint)
                    <option value="{{ $sprint->id }}" {{ $sprint_act->id == $sprint->id ? 
                    'selected' : '' }}>{{ $sprint->nombre }}</option>
                  @endforeach
                </select>
            </div>

            <div class="form-group{{ $errors->has('estimacion') ? ' has-error' : '' }}">
              <label for="company-name">Estimación de esfuerzo 
              <input   placeholder="Esfuerzo estimado"  
                        id="company-name"
                        type="number"
                        name="estimacion"
                        spellcheck="false"
                        class="form-control"
                        max="100"
                        min="1"
                        value="{{ $pbi->estimacion }}"
                        /> </label>
                @if ($errors->has('estimacion'))
                    <span class="help-block">
                        <strong>{{ $errors->first('estimacion') }}</strong>
                    </span>
                @endif
            </div>
          
            <div class="form-group{{ $errors->has('razon') ? ' has-error' : '' }}">
              <label for="company-content">Motivo modificacion</label>
              <textarea class="form-control my-editor" 
              placeholder="Indique los cambios que realizo y la razon"
              rows="4" id="nombre" name="razon"></textarea>
                   @if ($errors->has('razon'))
                      <span class="help-block">
                          <strong>{{ $errors->first('razon') }}</strong>
                      </span>
              @endif 
            </div>

            {{--<div class="form-group" >
              <label> Adjuntar documentos (png, gif,jpeg,jpg,txt,pdf,doc) 
                <span class="glyphicon glyphicon-file" aria-hidden="true"></span></label>
                  <input type="file" class="form-control" name="photos[]" multiple>
            </div>--}}

            <div class="form-group">
              <input type="submit" class="btn btn-primary"
                            value="Editar"/>
              
            </div>
            
       </form>
    </div>


   
      <div class="col-md-4">
        <div class="tm-bg-primary-dark tm-block ">
          <div class="sidebar-module">
              <h4>Opciones</h4>
              <ol class="list-unstyled">
                <li>
                  <a href="/pbis/{{ $pbi->id }}">
                  <i class="fa fa-tasks" aria-hidden="true"></i> 
                  Ver Tareas</a>
                </li>
                <li>
                  <a href="/pbis/{{ $pbi->id }}/comentarios">
                  <i class="fa fa-comments" aria-hidden="true"></i> 
                  Comentarios</a>
                </li>
                <li>
                  <a href="/pbis/{{ $pbi->id }}/historial">
                  <i class="fa fa-book" aria-hidden="true"></i> 
                  Historial</a>
                </li>
                <li>
                  {{--<a href="/projects/{{ $project->id }}"><i --}}
                    <a href="/projects/{{ $proyecto->project_id }}"><i 
                  class="fa fa-undo" aria-hidden="true"></i> Backlog</a>
                </li>
          </div>

        @if( count($images_set) > 0 ) 
            <h4>Archivos</h4>
            <table width="100"  class="table table-striped table-hover table-reflow">
              <thead>
                  <tr>
                      <th ><strong> Descargar </strong></th>
                      <th ><strong> Eliminar </strong></th>
                      
                  </tr>
              </thead>

              <tbody>
                  @foreach ( $images_set as $archivo )
                      <tr>
                          <td>  
                            <a href="<?php echo asset("images/$archivo") ?>" 
                              data-lightbox="images-set"> {{$archivo}}
                            </a>
                          </td>

                          <td>  
                            <a 
                              onclick="return confirm('Desea eliminar el fichero?')"
                              class="btn btn-danger btn-sm" 
                              href="{{ route('tarea.deletefile', [ 'id' => $archivo]) }}">
                              <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                          </td>    
                      </tr> 
                  @endforeach
              </tbody>

          </table>
        @endif

      </div>

      
      <form id="add-user" action="{{ route('pbis.delete') }}"  method="POST" >
        {{ csrf_field() }}

        <input type="hidden" name="id_pbi" value="{{ $pbi->id }}">

          <div class="form-group{{ $errors->has('motivo') ? ' has-error' : '' }}">
            <label for="company-name">Motivo Eliminacion<span class="required"></span></label>
              <input  placeholder="Razon para eliminar la historia"  
                      id="proyecto-name"
                      required
                      name="motivo"
                      spellcheck="false"
                      class="form-control"
                      value="{{$pbi->motivo}}"/>
              @if ($errors->has('motivo'))
              <span class="help-block">
                  <strong>{{ $errors->first('motivo') }}</strong>
              </span>
              @endif 
          </div>

          <div class="form-group">
            <button class="btn btn-danger" type="submit" id="addMember" >Eliminar</button>
          </div>
      </form>
      
    </div>
    


@endsection