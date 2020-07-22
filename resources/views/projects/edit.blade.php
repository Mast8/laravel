@extends('layouts.app')

@section('content')


<div class="row">
  <div class="col-md-8">
      <h1>Actualizar datos </h1>

      <!-- Example row of columns -->
        <form method="post" action="{{ route('projects.update',[$project->id]) }}">
                            {{ csrf_field() }}

                <input type="hidden" name="_method" value="put">

                <div class="form-group">
                    <label for="company-name">Nombre<span class="required">*</span></label>
                    <input   placeholder="Enter name"  
                              id="proyecto-name"
                              required
                              name="name"
                              spellcheck="false"
                              class="form-control"
                              value="{{ $project->name }}"
                                />
                </div>

                <div class="form-group">
                    <label for="company-content">Descripción</label>
                    <textarea class="form-control my-editor" placeholder="Datos adicionales del proyecto"
                    rows="4" id="nombre" name="description">{{  $project->description  }}</textarea>
                </div>
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
                      <li><a href="/projects/{{ $project->id }}"><i 
                        class="fa fa-undo" aria-hidden="true"></i> Backlog</a></li>

                      <li><a href="/projects"><i class="fa fa-building" 
                        aria-hidden="true"></i> Proyectos</a></li>
                      
                    </ol>
                  </div>
            </div>
        </div>
</div>
@endsection