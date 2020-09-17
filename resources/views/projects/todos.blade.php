@extends('layouts.app')

@section('content')



        <h1 align=center>
            {{ $num_proyects }} Number of projects
        </h1>
        @if($num_proyects>0)
        <table class="table">
            <thead>
                <tr>
                    <th ><strong> ID </strong></th>
                    <th ><strong> Project </strong></th>
                    <th ><strong> Description </strong></th>
                    <th ><strong> Delete </strong></th>
                    
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
