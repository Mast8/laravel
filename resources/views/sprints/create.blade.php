@extends('layouts.app')

@section('content')

     
<div class="col-md-8">
    <h1>Crear Sprint </h1>
      <form method="post" action="{{ route('sprints.create') }}">
                            {{ csrf_field() }}

          <input   
          class="form-control"
          type="hidden"
                  name="idproject"
                  dd($id_proyec);
                  value="{{ $id_proyec }}"
                    />
          
        
        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
              <label for="company-name">Nombre<span class="required">*</span></label>
              <input    placeholder="Nombre del sprint"  
                        id="company-name"
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
              <label for="company-content">Descripción</label>
              <textarea class="form-control" placeholder="Descripcion del sprint"
              rows="4" id="nombre" name="description">{{ old('description') }}</textarea>
          </div>

        {{--}}
        <div class="form-group">
            <label>Select Due Date <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></label>
            <div class='input-group date' id='datetimepicker1'>
                <input type='text' class="form-control" id ="datepicker1"name="duedate">
                <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
        <input id="datepicker0" class="form-control" width="276" value="Fecha inicio" name="fecha_inicio"/>
        --}}
          <div class="form-group">
              <input type="submit" class="btn btn-primary"
                      value="Crear"/>
          </div>
          
      </form>
  </div>
@endsection
   

@section('scripts')
    <script src="{{ asset('js/moment.js') }}"></script> 
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    
    <script>
              $('#datepicker0').datetimepicker( {
                    //format: 'YYYY-MM-DD',  // YEAR-MONTH-DAY hour:minute:seconds
                });
                /*$('#datetimepicker1').datetimepicker( {
                    defaultDate:'now',  // defaults to today
                    format: 'YYYY-MM-DD hh:mm:ss',  // YEAR-MONTH-DAY hour:minute:seconds
                    minDate:new Date()  // Disable previous dates, minimum is todays date
                });*/
    </script>
@stop