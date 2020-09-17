@extends('layouts.app')
<!--<link rel="stylesheet" href="{{asset ('css/table.css')}}"> -->
@section('content')


<h1 align=center>
    {{ count($usuarios)}} Number of users registered
</h1>
<table width="70"  class="table">
    <thead>
        <tr>
            <th><strong> User </strong></th>
            <th><strong> Email </strong></th>
            <th><strong> Last name </strong></th>
            <th><strong> Name </strong></th>
            <th><strong> Delete </strong></th>
            <th><strong> Status </strong></th>
        </tr>
    </thead>

    <tbody>
        
        @foreach($usuarios as $usuario)
            <tr>
                <td> {{ $usuario->usuario }}</a> </td>    
                    
                <td> {{ $usuario->email }} </td>
                <td> {{ $usuario->apellidos }} </td>
                <td> {{ $usuario->nombres }} </td>
                <td> 
                    <a 
                        href="/usuarios/{{ $usuario->id }}/eliminar"   
                        class="btn btn-danger btn-sm"> 
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>
                <td>
                    @if($usuario->activado==1)    
                        <a 
                            href="/usuarios/{{ $usuario->id }}/activacion"   
                            class="btn btn-primary btn-sm"> 
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </a>
                    @else
                        <a href="/usuarios/{{ $usuario->id }}/activacion"   
                            class="btn btn-danger btn-sm"> 
                            <i class="fa fa-ban" 
                                    aria-hidden="true"></i>
                            
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach   

    </tbody>
</table>


  

@endsection

