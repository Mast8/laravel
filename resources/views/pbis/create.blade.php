@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-md-8">
      
     
    <h1>Nueva historia de usuario  </h1>



      <form method="post" action="{{ route('pbis.store') }}">
                            {{ csrf_field() }}

       <input type="hidden" name="idProyecto" value="{{ $idProy }}"> 

              <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                  <label for="company-name">Título<span class="required"></span></label>
                  <input   placeholder="Titulo de la historia"  
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

              <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="company-name">Descripción </label>
                    <textarea placeholder="Descripcion de la historia" 
                            style="resize: vertical" 
                            id="company-content"
                            name="description"
                            rows="5" spellcheck="false"
                            class="form-control autosize-target text-left">{{ old('description') }}         
                            </textarea>
                        
                  @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                  @endif 
              </div>

              <div class="form-group{{ $errors->has('prioridad') ? ' has-error' : '' }}">
                  <label> Prioridad </label>
                  <select name="prioridad" class="form-control" 
                  data-style="btn-info" style="width:35%;">
                  <option value="">Seleccion prioridad</option>
                    @foreach( $prioris as $priori)
                      
                      <option value="{{ $priori->id }}" {{ old('prioridad') ? 
                        'selected' : '' }}>{{ $priori->nombrePrio }}</option>
                    @endforeach
                  </select>
     
                  @if ($errors->has('prioridad'))
                  <span class="help-block">
                      <strong>{{ $errors->first('prioridad') }}</strong>
                  </span>
                @endif 
              </div>

              <div class="form-group{{ $errors->has('sprint') ? ' has-error' : '' }}">
                  <label> Sprint </label>
                  <select name="sprint" class="form-control" 
                  data-style="btn-info" style="width:35%;">
                  
                  <option value="">Elija Sprint</option>
                    @foreach( $sprints as $sprint)
                      
                      <option value="{{ $sprint->id }}" {{ old('sprint') ? 
                        'selected' : '' }}>{{ $sprint->nombre }}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('sprint'))
                  <span class="help-block">
                      <strong>{{ $errors->first('sprint') }}</strong>
                  </span>
                  @endif 
              </div>

              <div class="form-group{{ $errors->has('estimacion') ? ' has-error' : '' }}">
                <label for="company-name">Estimación de esfuerzo 
                <input   placeholder="Esfuerzo estimado"  
                          id="company-name"
              
                          type="number"
                          name="estimacion"
                          spellcheck="false"
                          class="form-control"
                          value="{{ old('estimacion') }}"
                            /> </label>
                @if ($errors->has('estimacion'))
                  <span class="help-block">
                      <strong>{{ $errors->first('estimacion') }}</strong>
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