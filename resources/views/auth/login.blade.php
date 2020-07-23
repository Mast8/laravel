
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset ('css/login.css')}}">
    <title>Sign in</title>
</head>

<body>
    
    <div class="container">

        <form  method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-control{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail </label>

                    <input id="email" type="email" class="form-control" 
                    name="email" value="{{ old('email') }}" placeholder="Enter your email"
                     autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-control{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>

                    <input id="password" type="password" class="form-control" 
                    name="password" placeholder="Enter your password" >
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
            </div>

            <button type="submit" class="btn btn-primary">
                Login
            </button>
            <small>Don't have an account? <a href="{{ route('register') }}">Sign up</a></small>
        </form>
        
        <div class="features">
            <div class="feature">
                <i class="fas fa-code"></i>
                <h3>Development</h3>
                <p>A modern and clean design system to help 
                    developing projects.</p>
            </div>
            <div class="feature">
                <i class="fas fa-gift"></i>
                <h3>Features</h3>
                <p>Create your project, invite people, create sprints, tasks, upload and download prof of 
                    progress and see pdf reports.</p>
            </div>
            <div class="feature">
                <i class="fas fa-edit"></i>
                <h3>Try it!</h3>
                <p>Register and try all the work done and give us some feedback.</p>
            </div>
        </div>
    </div>
</body>
</html>