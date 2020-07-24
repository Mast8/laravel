<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Improve') }}</title>


   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="{{ asset ('font-awesome-5/css/fontawesome-all.min.css')}}">
    <!-- https://fontawesome.com/ -->
{{--    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    --}}

     <!-- nuevo nav -->
    <link rel="stylesheet" href="{{asset('css/nav.css')}}" />

  	<link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap"
    rel="stylesheet"/>

    <!-- https://getbootstrap.com/ -->


    <link rel="stylesheet" href="{{asset ('css/templatemo-style.css')}}">
    <link id="theme-style" rel="stylesheet" type="text/css" href="">


</head>

<section id="header">
  <div class="header container">
    <div class="nav-bar">
      <div class="brand">
        <a href="{{ url('/home') }}"><h1> Improve Scrum</h1></a>
      </div>
      <div class="nav-list">
        <div class="hamburger"><div class="bar"></div></div>
        <ul>
          {{-- <li><a href="{{ url('/home') }}" data-after="Home">Home</a></li> --}}
          @if(Auth::user()->role_id == 1) 
            <li><a href="/admin/proyectos" data-after="Projects">Projects</a></li>
            <li><a href="{{ route('users.index') }}" data-after="Users">Users</a></li>
          @endif
          <li><a href="{{ route('projects.index') }}" data-after="Own Projects">Own Projects</a></li>
          <li><a href="/usuarios/{{ Auth::user()->id }}/editar" data-after="Profile">Profile</a></li>
          <li><a href= "{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" data-after="Log out">Log out</a>

            <form id="logout-form" action="{{ route('logout') }}" 
                method="POST" style="display: none;">
                {{ csrf_field() }}
            </form> 
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

    
 


<body>
    
    <div id="app">
        
      

        <div class="container" >
            @include('partials.errors')
            @include('partials.success')
            @yield('content')
        </div>

    </div>

    <h2>Change theme color</h2>
    <div id="theme-options-wrapper">
      
      <div data-mode="blue" id="blue-mode" class="theme-dot"></div>
      <div data-mode="light" id="light-mode" class="theme-dot"></div>
      <div data-mode="green" id="green-mode" class="theme-dot"></div>
      <div data-mode="silver" id="silver-mode" class="theme-dot"></div> 
  </div>

    <footer class="tm-footer row tm-mt-small">
        <div class="col-12 font-weight-light">
            <p class="text-center text-white mb-0 px-4 small"> 
             Copyright © PROYECTO DE GRADO <b>II-2019</b>
            </p>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/nav.js') }}"></script>
    
    <script type="text/javascript">
      var light = '{{ URL::asset('css/ligthTheme.css') }}';
      var green = '{{ URL::asset('css/greenTheme.css') }}';
      var silver = '{{ URL::asset('css/silverTheme.css') }}';
    </script>
    <script src="{{ asset('js/themeColor.js') }}"></script>
    @yield('jqueryScript')

    
</body>

</html>
