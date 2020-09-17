@extends('layouts.app')

@section('content')




  <h1>Create new project </h1>

  <div class="row">
      <div class="col-md-8">
       <!-- <div class="row justify-content-md-center">-->
      <form method="post" action="{{ route('projects.store') }}">
                            {{ csrf_field() }}


              <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                  <label for="project-name">Name<span class="required">*</span></label>
                  <input   placeholder="Nombre del proyecto"  
                            id="project-name"
                            required
                            name="nombre"
                            spellcheck="false"
                            class="form-control"
                            value="{{ old('nombre') }}"
                              />
                  @if ($errors->has('nombre'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nombre') }}</strong>
                    </span>
                  @endif 
              </div>

              <div class="form-group">
                  t<label for="project-content">Descripcion</label>
                  <textarea placeholder="Descripción del proyecto" 
                            style="resize: vertical" 
                            id="project-content"
                            name="description"
                            rows="5" spellcheck="false"
                            class="form-control autosize-target text-left">{{old('description') }}                
                            </textarea>
              </div>
              <div class="form-group">
                  <input type="submit" class="btn btn-primary"
                          value="Crear"/>
              </div>
          </form>
      </div>



      <div class="col-md-4">
          <div class="tm-bg-primary-dark tm-block">
            <h4>Option</h4>
            <ol class="list-unstyled">
              <li><a href="/projects"><i class="fa fa-briefcase" 
                aria-hidden="true"></i> My projects</a></li>
            </ol>
          </div>
      </div>


    @endsection