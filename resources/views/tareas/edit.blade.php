@extends('layouts.app')



@section('content')



     
<div class="row">
    <div class="col-md-8">
        
        <h1>Actualizar datos de la tarea: </h1>
        <h4>
          <div> {{ $tarea->name }} 
            <a 
            href="/tareas/{{ $tarea->id }}/historial"   
            class="btn btn-primary btn-sm pull-right">Historial
            <i class="fa fa-book" aria-hidden="true"></i>
          </a>
          </div>
        </h4>

        <div class="form-group">
          <label>Creado por:  
            {{ $tarea->creado_por }}
          </label>
      </div>
                                   
        <form method="post" action="{{ route('tareas.update') }}" >
                              {{ csrf_field() }}
                <input type="hidden" name="id_tarea" value="{{ $tarea->id }}">
  
  
              
              <div class="form-group">
                <label>Título</label>
                     <input type="text" class="form-control" placeholder="Título de la tarea"
                      name="titulo" value="{{   $tarea->name }}">
              </div>

              <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                <label for="company-content">Descripción</label>
                <textarea class="form-control my-editor" placeholder="Información de la tarea"
                    rows="4" id="nombre" name="descripcion">{{  $tarea->descripcion  }}</textarea>

                     @if ($errors->has('descripcion'))
                        <span class="help-block">
                            <strong>{{ $errors->first('descripcion') }}</strong>
                        </span>
                    @endif 
              </div>

              <div class="form-group">
                  <label>Asignado a:  
                    {{ $asignado_a->email }}
                  </label>
              </div>

              <div class="form-group">
                <label>Asignar a  <span class="glyphicon glyphicon-warning-sign" 
                  aria-hidden="true"></span></label>
                <select name="asignar" class="form-control" data-style="btn-info" style="width:40%;">
                  
                  @foreach( $miembros as $miembro)
                    <option value="{{ $miembro->id }}" {{ $asignado_a->id == $miembro->id ? 
                    'selected' : '' }}>{{ $miembro->email }}</option>
                  @endforeach
                  
                </select>
              </div>

              <div class="form-group">
                  <label>Estado actual: 
                    {{ $estado_act->nombre_est }}
                  </label>
              </div>

              <div class="form-group">
                  <label>Estado  <span class="glyphicon glyphicon-warning-sign" 
                    aria-hidden="true"></span></label>
                  <select name="estado" class="form-control" data-style="btn-info" style="width:15%;">
                    
                    @foreach( $estados as $estado)
                    <option value="{{ $estado->id }}" {{ $estado_act->id == $estado->id ? 
                      'selected' : '' }}>{{ $estado->nombre_est }}</option>
                      
                    @endforeach
                    
                  </select>
              </div>
    

              <div class="form-group{{ $errors->has('razon') ? ' has-error' : '' }}">
                <label for="company-content">Razon modificacion</label>
                <textarea class="form-control my-editor" 
                placeholder="Indique los cambios que realizo y la razon"
                rows="4" id="nombre" name="razon"></textarea>
                     @if ($errors->has('razon'))
                        <span class="help-block">
                            <strong>{{ $errors->first('razon') }}</strong>
                        </span>
                @endif 
              </div>
              

              <div class="form-group">
                <input type="submit" class="btn btn-primary"
                              value="Editar"/>
              </div>
         </form>
    </div>
 
 

    <div class="col-md-4">
        <div class="tm-bg-primary-dark tm-block ">
        
            
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
                            <a 
                              href="<?php echo asset("images/$archivo") ?>" 
                              data-lightbox="images-set"> {{$archivo}}
                            </a>
                          </td>

                          <td>  
                            <a  
                              onclick="return confirm('¿Quiere eliminar el documento?')"
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

          <form method="post" action="{{ route('tareas.subir') }}" 
              enctype="multipart/form-data">  {{ csrf_field() }}  
              <input type="hidden" name="id_tarea" value="{{ $tarea->id }}">

              <div class="form-group{{ $errors->has('adjuntar') ? ' has-error' : '' }}">
                  <label> Adjuntar documentos (png, gif,jpeg,jpg,txt,pdf,doc) 
                  <i class="fa fa-file" aria-hidden="true"></i></label>
                      {{--<input type="file" class="form-control" name="photos[]" multiple>--}}
                      <input type="file" class="form-control" name="adjuntar[]" multiple>
                  @if ($errors->has('adjuntar'))
                      <span class="help-block">
                          <strong>{{ $errors->first('adjuntar') }}</strong>
                      </span>
                  @endif 
              </div>

              <div class="form-group">
                <input type="submit" class="btn btn-primary"  value="Subir"/>
              </div>

          </form>
    </div>

    <form id="add-user" action="{{ route('tarea.borrar') }}"  method="POST" >
      {{ csrf_field() }}

      <input type="hidden" name="id_tarea" value="{{ $tarea->id }}">

        <div class="form-group{{ $errors->has('motivo') ? ' has-error' : '' }}">
          <label for="company-name">Motivo Eliminacion<span class="required"></span></label>
            <input  placeholder="Razon para eliminar la historia"  
                    id="proyecto-name"
                    required
                    name="motivo"
                    spellcheck="false"
                    class="form-control"
                    />
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
</div>

    @endsection

