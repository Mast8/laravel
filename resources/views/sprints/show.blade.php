@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8">
        <h2>Historias del sprint </h2>

        <table width="50" class="table">
                <thead>
                    <tr>
                        <th ><strong> HISTORIA </strong></th>
                        <th ><strong> OPCIONES </strong></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pbis as $pbi)
                        <tr>
                            <td> <a href="/pbis/{{ $pbi->id }}" > {{ $pbi->titulo }}</a>  </td>
                            <td> 
                                <a  href="/pbis/edit/{{ $pbi->id }}" 
                                    class="btn btn-primary btn-sm">
                                    <i class="fa fa-edit" aria-hidden="true"></i> 
                                </a>  
                                
                                <a  onclick="return confirm('¿Desea eliminar la historia?')"
                                    href="/pbis/delete/{{ $pbi->id }}" 
                                    class="btn btn-danger btn-sm">
                                    <i class="fa fa-times" aria-hidden="true"></i> 
                                </a>   
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
        </table>   
    </div>

    <div class="col-md-4">
        <div class="tm-bg-primary-dark tm-block">
            <h1>{{ $sprint->nombre }}</h1>
            <p class="lead">{{ $sprint->descripcion }}</p>
        
            <div>
                <a href="{{ route('sprints.edit', ['id' => $sprint->id ]) }}">
                <i class="fa fa-edit" aria-hidden="true"></i> Editar</a>
            </div>
            
            <div>
                <a  onclick="return confirm('¿Quiere eliminar el sprint?')" 
                href="{{ route('sprints.delete', ['id' => $sprint->id]) }}" >
                <i class="fa fa-power-off" aria-hidden="true"></i> Eliminar</a>
            </div>
            
        </div>
    </div>

</div>
@endsection