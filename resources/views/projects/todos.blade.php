@extends('layouts.app')

@section('content')



        <h1 align=center>
            {{ $num_proyects }} Proyecto(s) registrado(s) 
        </h1>
        @if($num_proyects>0)
        <table class="table">
            <thead>
                <tr>
                    <th ><strong> ID </strong></th>
                    <th ><strong> Proyecto </strong></th>
                    <th ><strong> Descripción </strong></th>
                    <th ><strong> Eliminar </strong></th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($proyectos as $proyecto)
                    <tr>
                        <td> {{$proyecto->id}}</td>
                        <td>
                            <a href="/projects/{{ $proyecto->id }}" > {{ $proyecto->name }}</a>
                        </td>
                        <td> {{$proyecto->description}}</td>
                        <td>
                            <a  
                                onclick="return confirm('Esta accion eliminara todo el proyecto')"
                                href="/admin/{{ $proyecto->id }}/eliminar" 
                                class="btn btn-danger btn-sm">
                                <i class="fa fa-times" aria-hidden="true"></i> 
                            </a> 
                        </td>
                        
                    </tr> 
                @endforeach
            </tbody>
        </table>
        @endif


@endsection
