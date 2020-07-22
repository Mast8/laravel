@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-md-12">
        {{--<a class="btn btn-primary" 
            href="{{ redirect()->getUrlGenerator()->previous() }}">Retroceder</a>--}}

            <h4 align=center> {{$num_acciones}} Cambios registrados en la tarea   </h4>
            @if( $num_acciones > 0 ) 

    <table width="100" class="table">
        <thead>
            <tr>
                <th ><strong> Título </strong></th>
                <th ><strong> Tarea creada por </strong></th>
                <th ><strong> Acción </strong></th>
                <th ><strong> Motivo </strong></th>
                <th ><strong> Acción realizada por </strong></th>
                <th ><strong> Realizada el </strong></th>
            </tr>
        </thead>
        <tbody>
           
            @foreach($acciones as $accion)
            <tr>
                <td> <a href="/tareas/edit/{{ $accion->tarea_id }}" > {{ $accion->name }}</a> </td>
                <td> {{ $accion->creado_por }} </td>
                <td>  {{ $accion->accion_tar }} </td>
                <td>  {{ $accion->motivo_tar }} </td>
                <td>  {{ $accion->realizada_por_tar }} </td>
                <td>  {{ $accion->creada_el_tar }} </td>
            </tr> 
            @endforeach
          
        </tbody>
    </table>
 @endif
    </div>
</div>

@endsection

