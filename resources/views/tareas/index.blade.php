@extends('layouts.app')

@section('title', 'Admin')

@section('content')

    <div id="app">
        <div class="container">
            <div class="row">
                    <a href="{{ route('tareas.create', ['idpbi' => $pbi->id]) }}" 
                            class="pull-right btn btn-primary btn-sm">
                            <span 
                            class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
                    </a> 
                <h3>Tareas de <b> {{ $pbi->titulo }} </b></h3>

                 <visibility-draggable :testimonials-visible="{{ $testimonialsVisible }}" 
                 :testimonials-not-visible="{{ $testimonialsNotVisible }}"
                 :done="{{ $done }}" >
                </visibility-draggable>
                
            </div>
            
        </div> <!-- end container -->

    </div> <!-- end app -->

@section('extra-js')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection

@endsection
