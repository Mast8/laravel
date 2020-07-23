{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registro</div>

    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('usuario') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Usuario</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" 
                    name="usuario" value="{{ old('usuario') }}" required>

                    @if ($errors->has('usuario'))
                        <span class="help-block">
                            <strong>{{ $errors->first('usuario') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" 
                    name="email" required value="{{ old('email') }}" >

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control"
                     name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password-confirm" class="col-md-4 control-label">
                    Confirmar Password</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" 
                    class="form-control" name="password_confirmation" required>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Registrar
                    </button>
                </div>
            </div>
        </form>
    </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset ('css/register.css')}}">
    <title>Register</title>
</head>



<body>
<div class="container">

       

           
            
        

            <form  method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
    
                <div class="form-control{{ $errors->has('usuario') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">User</label>
    
                        <input id="name" type="text" class="form-control" autofocus 
                        name="usuario" value="{{ old('usuario') }}" placeholder="Enter your username">
    
                        @if ($errors->has('usuario'))
                            <span class="help-block">
                                <strong>{{ $errors->first('usuario') }}</strong>
                            </span>
                        @endif
                </div>
    
                <div class="form-control{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail</label>
    
                        <input id="email" type="email" class="form-control" 
                        name="email"  value="{{ old('email') }}"  placeholder="Enter your email">
    
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                </div>
    
                <div class="form-control{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Password</label>
    
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control"
                         name="password"  placeholder="Enter your password">
    
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
    
                <div class="form-control{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password-confirm" class="col-md-4 control-label">
                        Confirm Password</label>
    
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" 
                        class="form-control" name="password_confirmation"  placeholder="Confirm your password">
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
    
                <div class="form-control">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                    </div>
                </div>
                <small>Have an account? <a href="{{ route('login') }}"> Log in</a></small>
            </form>



                    
        </form>
        
       

    </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>