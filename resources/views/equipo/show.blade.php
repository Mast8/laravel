@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-md-8">
        {{--<a class="btn btn-primary" 
            href="{{ redirect()->getUrlGenerator()->previous() }}">Retroceder</a>--}}

            <h4>Miembros registrados  {{$num_miembros}} </h4>
            @if( $num_miembros > 0 ) 

    <table width="100" class="table table-striped table-hover table-reflow">
        <thead>
            <tr>
                <th ><strong> USUARIO </strong></th>
                <th ><strong> APELLIDO </strong></th>
                <th ><strong> NOMBRE </strong></th>
                <th ><strong> EMAIL </strong></th>
                <th ><strong> ELIMINAR </strong></th>
            </tr>
        </thead>
        <tbody>
            @foreach($miembros as $miembro)
                <tr>
                    <td> {{ $miembro->usuario }} </a>   </td>
                    <td> {{ $miembro->apellidos }}</td>
                    <td> {{ $miembro->nombres }} </td>
                    <td> {{ $miembro->email }} </td>
                    <td>
                        <a 
                            onclick="return confirm('¿Quiere eliminar al usuario?')"
                            href="{{ route('miembros.eliminar', ['id' => $miembro->id]) }}" 
                            class="btn btn-danger btn-sm">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>
 @endif
</div>

    <div class="col-md-4">
        <div class="tm-bg-primary-dark tm-block ">
                <h3>{{ $project->name }}</h3>
                <p class="lead">{{ $project->description }}</p>
                
                <a href="/projects/{{ $project->id }}"><i 
                    class="fa fa-undo" aria-hidden="true"></i> Backlog</a>

            <h4>Añadir miembro</h4>
        
            <form id="add-user" action="{{ route('equipo.anadir') }}"  method="POST" >
                {{ csrf_field() }}
                <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
                
                <input class="form-control" name = "project_id" id="project_id" 
                value="{{$project->id}}" type="hidden">
                {{--<div class="input-group"> --}}
                
                <input type="text" required class="form-control" id="email"  
                name ="email" placeholder="Email">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif 

                
                    <button class="btn btn-primary" type="submit" id="addMember" >Añadir</button>
               
                </div>
            </form>
        </div>
    </div>

</div>

@endsection

