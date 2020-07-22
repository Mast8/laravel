@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-md-12">
        {{--<a class="btn btn-primary" 
            href="{{ redirect()->getUrlGenerator()->previous() }}">Retroceder</a>--}}

            <h4 align=center> Tareas en papelera  {{$num_eliminados}} </h4>
            @if( $num_eliminados > 0 ) 

    <table width="100" class="table">
        <thead>
            <tr>
                <th ><strong> Título historia </strong></th>
                <th ><strong> Sprint </strong></th>
                <th ><strong> Tarea </strong></th>
                <th ><strong> Tarea creada por </strong></th>
                
                <th ><strong> Asignada a </strong></th>
                <th ><strong> Historial </strong></th>
                <th ><strong> Eliminar definitivamente </strong></th>
                <th ><strong> Recuperar tarea </strong></th>
            </tr>
        </thead>
        <tbody>
           
            @foreach($tareas as $tarea)
            <tr>
                <td> <a href="/pbis/edit/{{ $tarea->pbi_id }}" > {{ $tarea->titulo }}</a> </td>
                <td> <a href="/sprints/{{ $tarea->sprint_id }}" > {{ $tarea->nombre }}</a></td>
                <td>  <a href="/tareas/edit/{{ $tarea->id }}" > {{ $tarea->name }}</a> </td>
                <td>  {{ $tarea->creado_por }} </td>
                <td>  {{ $tarea->responsable }} </td>
                
                <td>  
                    <a href="/tareas/{{ $tarea->id }}/historial" class="btn btn-primary btn-sm">
                        <i class="fa fa-book" aria-hidden="true"></i> 
                        Historial</a>
                </td>
                <td> 
                    <a 
                        onclick="return confirm('¿Quiere eliminar la tareas y todos sus registros?')"
                        href="/tareas/{{ $tarea->id }}/eliminar"  
                        class="btn btn-danger btn-sm"> 
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>
                <td> 
                    <a 
                        href="/tareas/recuperar/{{$tarea->id}}"   
                        class="btn btn-primary btn-sm"> 
                        <i class="fa fa-check" aria-hidden="true"></i>
                    </a>
                </td>
            </tr> 
            @endforeach
          
        </tbody>
    </table>
 @endif
    </div>
</div>

@endsection

