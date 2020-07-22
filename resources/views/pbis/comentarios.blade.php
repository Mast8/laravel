@extends('layouts.app')
@section('content')

<div class="row tm-content-row">
	<div class="col-md-9 col-sm-9  col-xs-9 col-lg-9">
        
    @if(count($comentarios)>0)
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">
                <span class="glyphicon glyphicon-comment"></span> 
                Comentarios
            </h3>
        </div>
        <div class="panel-body">
            <ul class="media-list">
                
            @foreach($comentarios as $comentario)
                <li class="list-group-item"> 
                    
                    <div class="media-body">
                        <h4 class="media-heading">
                        <small> 
                                 <b> Usuario: {{ $comentario->usuario}} </b> -
                            {{ $comentario->nombres}} {{ $comentario->apellidos}}
                            - <b align="right"> {{ $comentario->email}} </b>

                            @if(Auth::user()->id == $comentario->user_id || Auth::user()->role_id == 1)
                                <a 
                                    onclick="return confirm('¿Desea eliminar el comentario?')"
                                    href="/comentario/{{ $comentario->id }}/eliminar"   
                                    class="btn btn-danger btn-sm"> 
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </a>
                            @endif
                       <br>
                             <b>   Enviado el </b>{{ $comentario->fecha}}
                        </small>
                        </h4>
                        <p class="text-danger"> {{ $comentario->mensaje }}  </p>
                        
                        
                    </div>
                </li>

            @endforeach
            
            </ul>
        </div>
    </div>  
    @else   
        <h3> No se tienen comentarios</h3>
    @endif
       
	</div>
</div>
    <div>     
        <a class="btn btn-primary" 
                href="{{ route('pbis.edit', ['id' => $pbi->id] ) }}">Volver a la historia</a>
    </div>


<div class="col-md-9 col-sm-9 col-xs-9 col-lg-9">      
    <form method="post" action="{{ route('coment.store') }}">
                        {{ csrf_field() }}

        <input type="hidden" name="id_pbi" value="{{$pbi->id}}">

        <div class="form-group{{ $errors->has('mensaje') ? ' has-error' : '' }}">
            <label for="comment-content">¿Tiene alguna observación?</label>
            <textarea placeholder="Escriba su comentario" 
                        style="resize: vertical" 
                        id="comment-content"
                        required
                        name="mensaje"
                        rows="3" spellcheck="false"
                        class="form-control autosize-target text-left">
                        </textarea>
            @if ($errors->has('mensaje'))
                <span class="help-block">
                    <strong>{{ $errors->first('mensaje') }}</strong>
                </span>
            @endif 
        </div>     

        <div class="form-group">
            <input type="submit" class="btn btn-primary"
                    value="Enviar"/>
        </div>
    </form>              
</div>


@endsection