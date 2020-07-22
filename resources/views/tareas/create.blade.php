@extends('layouts.app')



@section('content')
<div class="row">
    <div class="col-md-8">

    <h1>Nueva tarea</h1>



    <form method="post" action="{{ route('tareas.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

      <input type="hidden" name="idPbi" value="{{  $idhistoria }}">

          <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
              <label for="company-name">Título<span class="required">*</span></label>
              <input   placeholder="Título de la tarea"  
                        id="company-name"
                        required
                        name="titulo"
                        spellcheck="false"
                        class="form-control"
                        value="{{ old('titulo') }}"
                          />
                @if ($errors->has('titulo'))
                  <span class="help-block">
                      <strong>{{ $errors->first('titulo') }}</strong>
                  </span>
                @endif 
          </div>


          <div class="form-group">
              <label for="company-content">Descripción</label>
              <textarea placeholder="Descripción de la tarea" 
                        style="resize: vertical" 
                        id="company-content"
                        name="description"
                        rows="5" spellcheck="false"
                        class="form-control autosize-target text-left">{{ old('description') }}
              </textarea>
          </div>

          <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
             
              <label>Estado <span class="glyphicon glyphicon-warning-sign" 
                aria-hidden="true"></span></label>

              <select name="estado" class="form-control"  
                data-style="btn-info" style="width:20%;">
                <option value="">Elija un estado</option>
                @foreach( $estados as $estado)
                  <option value="{{ $estado->id }}" {{ old('estado') ? 
                  'selected' : '' }}>{{ $estado->nombre_est }}</option>

                @endforeach
              </select>
              @if ($errors->has('estado'))
                <span class="help-block">
                    <strong>{{ $errors->first('estado') }}</strong>
                </span>
              @endif 

          </div>

          <div class="form-group{{ $errors->has('asignar') ? ' has-error' : '' }}">
            <label>Asignar: <span class="glyphicon glyphicon-warning-sign" 
              aria-hidden="true"></span></label>

            <select name="asignar" class="form-control" 
              data-style="btn-info" style="width:40%;">
              <option value="">Elija un miembro</option>
              @foreach( $miembros as $miembro)
                <option value="{{ $miembro->user_id }}" {{ old('asignar') ? 
                'selected' : '' }}>{{ $miembro->email }}</option>
              @endforeach
            </select>

              @if ($errors->has('asignar'))
                <span class="help-block">
                    <strong>{{ $errors->first('asignar') }}</strong>
                </span>
              @endif 
          </div>
        
          <div class="form-group">
              <input type="submit" class="btn btn-primary"
                      value="Crear"/>
          </div>
      </form>
   

    </div>
</div>




    @endsection

