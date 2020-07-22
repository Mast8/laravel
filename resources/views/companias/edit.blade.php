@extends('layouts.app')

@section('content')



<div class="row col-md-9 col-lg-9 col-sm-9 pull-left " style="background: white;">
  <h1> Actualizar compañia </h1>

      <!-- Example row of columns -->
      <div class="row  col-md-12 col-lg-12 col-sm-12" >

      <form method="post" action="{{ route('companias.update',[$company->id]) }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="_method" value="put">
                            <input type="hidden" name="id_compania" value="{{ $company->id }}">

                            <div class="form-group">
                                <label for="company-name">Nombre<span class="required">*</span></label>
                                <input   placeholder="Enter name"  
                                          id="company-name"
                                          required
                                          name="name"
                                          spellcheck="false"
                                          class="form-control"
                                          value="{{ $company->name }}"
                                           />
                            </div>


                          <div class="form-group">
                                <label for="company-content">Descripción</label>
                                <textarea placeholder="Enter description" 
                                          style="resize: vertical" 
                                          id="company-content"
                                          name="description"
                                          rows="2" spellcheck="false"
                                          class="form-control autosize-target text-left">
                                          {{ $company->description }}</textarea>
                          </div> 
                           
 {{--}} 
                            <div class="form-group m-b-lg">
                              <label class="control-label col-lg-2" for="quote">Quote <span class="asterisk">*</span></label>
                              <div class="controls col-lg-6">
                                  <textarea name="description" cols="40" rows="8" id="quote" class="form-control input-xlarge" required>{{ $company->description }}</textarea>
                              </div>
                            </div> <!-- /controls -->  --}}


                            <div class="form-group">
                                <input type="submit" class="btn btn-primary"
                                       value="Actualizar"/>
                            </div>
                        </form>
   

      </div>
</div>


        <div class="col-sm-3 col-md-3 col-lg-3 pull-right">
          
          <div class="sidebar-module">
            <h4>Opciones</h4>
              <ol class="list-unstyled">
                <li><a href="/companias/{{ $company->id }}"><i 
                  class="fa fa-building-o" aria-hidden="true"></i>
                Ver compañias</a></li>
                <li><a href="/companias"><i class="fa fa-building" 
                  aria-hidden="true"></i> Todas las compañias </a></li>
                
              </ol>
          </div>
        </div>
    @endsection