@extends('layouts.app')

@section('content')



<div class="row">
    <div class="col-md-8">
      <h1>Actualizar datos del sprint  {{ $sprint->nombre }} </h1>

      <!-- Example row of columns -->
      

                                 
      <form method="post" action="{{ route('sprints.update') }}">
                            {{ csrf_field() }}

              <input type="hidden" name="sprint_id" value="{{ $sprint->id }}">
              {{-- <input type="hidden" name="sprint_id" value="{{ $project->id }}"> --}}
              <input type="hidden" name="_method" value="put">


              <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                  <label for="company-name">Nombre<span class="required"></span></label>
                  <input   placeholder="Enter name"  
                            id="proyecto-name"
                            required
                            name="nombre"
                            spellcheck="false"
                            class="form-control"
                            value="{{ $sprint->nombre }}"
                              />
                  @if ($errors->has('nombre'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nombre') }}</strong>
                    </span>
                  @endif 
              </div>

              <div class="form-group">
                <label for="company-content">Descripción</label>
                <textarea class="form-control my-editor" placeholder="Información acerca del sprint"
                rows="4" id="nombre" name="description">{{  $sprint->descripcion  }}</textarea>
              </div>

              <div class="form-group">
                  <input type="submit" class="btn btn-primary"
                          value="Submit"/>
              </div>
          </form>
   
      </div>



    <div class="col-md-4">
        <div class="tm-bg-primary-dark tm-block">
            <h4>Opciones</h4>
            <ol class="list-unstyled">
              <li><a href="/projects/{{ $proyecto_id }}"><i class="fa fa-undo" 
                aria-hidden="true"></i> Product backlog</a></li>
              <li><a href="/projects"><i class="fa fa-building" 
                aria-hidden="true"></i> Proyectos</a></li>
            </ol>
        </div>
    </div>
  </div>

@endsection