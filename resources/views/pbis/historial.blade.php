@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-md-12">
        {{--<a class="btn btn-primary" 
            href="{{ redirect()->getUrlGenerator()->previous() }}">Retroceder</a>--}}

            <h4 align=center> {{$num_acciones}} Cambios registrados en la historia   </h4>
            @if( $num_acciones > 0 ) 

    <table width="100" class="table">
        <thead>
            <tr>
                <th ><strong> Título </strong></th>
                <th ><strong> Creado por </strong></th>
                <th ><strong> Acción </strong></th>
                <th ><strong> Motivo </strong></th>
                <th ><strong>  Acción Realizada por </strong></th>
                <th ><strong> Realizada el </strong></th>
            </tr>
        </thead>
        <tbody>
           
            @foreach($acciones as $accion)
            <tr>
                <td> <a href="/pbis/edit/{{ $accion->id }}" > {{ $accion->titulo }}</a> </td>
                <td> {{ $accion->creado_por }} </td>
                <td>  {{ $accion->accion }} </td>
                <td>  {{ $accion->motivo }} </td>
                <td>  {{ $accion->realizada_por }} </td>
                <td>  {{ $accion->creada_el }} </td>
            </tr> 
            @endforeach
          
        </tbody>
    </table>
 @endif
    </div>
</div>

@endsection

