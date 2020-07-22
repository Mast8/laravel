@extends('layouts.app')

@section('content')
<h1 align=center>
    Home
</h1>

    
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>
                        Bienvenido estimado {{ Auth::user()->usuario }}, este sistema web le permite 
                        controlar  los requerimientos en sus proyectos, con las siguientes pero no limitadas funcionalidades    
                    </h4>
                    <li >
                        ¿Desea invitar amigos?
                    </li>  
                    <li>
                        ¿Revisar el progreso de su proyecto? 
                    </li>
                    <li>
                        ¿Administrar varios proyectos?
                    </li>
                    
                        Todas estas funcionalidades y mas estan a su disposición.
                    
                     
                </div>

                    {{-- <div class="col-sm-5 col-md-5 col-lg-5 pull-right">
                        <div class="well well-lg" >
                            Proyectos 
                        </div>
                    </div> --}}
                   
            </div>

@endsection
