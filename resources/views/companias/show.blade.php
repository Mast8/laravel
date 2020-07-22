@extends('layouts.app')

@section('content')


     
     <div class="row col-md-9 col-lg-9 col-sm-9 pull-left ">
      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <!-- Jumbotron -->
        <div class="jumbotron" >
          <h1>{{ $company->name }}</h1>
          <p class="lead">{{ $company->description }}</p>
        </div>

        <!-- Example row of columns -->
        <div class="row  col-md-12 col-lg-12 col-sm-12" style="background: white; margin: 10px; ">
          <a href="/projects/create/{{ $company->id }}" 
            class="pull-right btn btn-default btn-sm" > Nuevo proyecto
          </a>
          @foreach($company->projects as $project)
            <div class="col-lg-4 col-md-4 col-sm-4">
                <h2> <b> {{ $project->name }} </b> </h2>
                <p class="text-danger"> {{$project->description}} </p>
                <p><a class="btn btn-primary" href="/projects/{{ $project->id }}" 
                  role="button"> ver <b> {{ $project->name }} </b> </a></p>
            </div>
          @endforeach
        </div>
    </div>


<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
         
          <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
              <li><a href="/companias/{{ $company->id }}/edit">Editar</a></li>
              <li><a href="/projects/create/{{ $company->id }}">Añadir proyecto</a></li>
              <li><a href="/companias">Mis compañias</a></li>
              <li><a href="/companias/create">Crear compañia</a></li>
            
             <br/>
            
            
              <li>
              <a   
              href="#"
                  onclick="
                  var result = confirm('Estas seguro de eliminar esta compañia?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }
                          "
                          >
                  Eliminar
              </a>

              <form id="delete-form" action="{{ route('companias.destroy',[$company->id]) }}" 
                method="POST" style="display: none;">
                        <input type="hidden" name="_method" value="delete">
                        {{ csrf_field() }}
              </form>

              </li>
            </ol>
          </div>

        </div>


    @endsection