@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-md-12">
        {{--<a class="btn btn-primary" 
            href="{{ redirect()->getUrlGenerator()->previous() }}">Retroceder</a>--}}

            <h4 align=center> Historias en papelera  {{$num_eliminados}} </h4>
            @if( $num_eliminados > 0 ) 

    <table width="100" class="table">
        <thead>
            <tr>
                <th ><strong> Título </strong></th>
                <th ><strong> Sprint </strong></th>
                <th ><strong> Creado por </strong></th>
                <th ><strong> Estimación </strong></th>
                <th ><strong> Prioridad </strong></th>
                <th ><strong> Historial </strong></th>
                <th ><strong> Eliminar definitivamente </strong></th>
                <th ><strong> Recuperar historia </strong></th>
            </tr>
        </thead>
        <tbody>
           
            @foreach($pbis as $pbi)
            <tr>
                <td> <a href="/pbis/edit/{{ $pbi->id }}" > {{ $pbi->titulo }}</a> </td>
                <td> <a href="/sprints/{{ $pbi->sprint_id }}" > {{ $pbi->nombre }}</a></td>
                <td>  {{ $pbi->creado_por }} </td>
                <td>  {{ $pbi->estimacion }} </td>
                <td>  
                    @if($pbi->prioridad_id == 3)
                        Baja
                          @elseif($pbi->prioridad_id == 2)
                            Media
                              @else
                                  Alta
                    @endif  
                </td>
                <td>  
                    <a href="/pbis/{{ $pbi->id }}/historial" class="btn btn-primary btn-sm">
                        <i class="fa fa-book" aria-hidden="true"></i> 
                        Historial</a>
                </td>
                <td> 
                    <a 
                        onclick="return confirm('¿Quiere eliminar la historia y todos sus registros?')"
                        href="/pbis/delete/{{$pbi->id}}"   
                        class="btn btn-danger btn-sm"> 
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>
                <td> 
                    <a 
                        href="/pbis/recuperar/{{$pbi->id}}"   
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

