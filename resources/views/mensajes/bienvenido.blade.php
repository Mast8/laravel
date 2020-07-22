<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Llamado de emergencia</title>
</head>
<body>
<p>Hola! Se ha reportado un nuevo caso de emergencia a las {{ /*$user->created_at */}}.</p>
    <p>Estos son los datos del usuario que ha realizado la denuncia:</p>
    <ul>
       
        <li>Nombre: {{ $usuario }}</li>
      {{--   <li>Teléfono: {{ $usuario->user->phone }}</li>
        <li>DNI: {{ $usuario->user->dni }}</li>--}}
    </ul>
    <p>Y esta es la posición reportada:</p>
    <ul>
       {{--  <li>Latitud: {{ $usuario->lat }}</li>
        <li>Longitud: {{ $usuario->lng }}</li>
        <li>
             <a href="https://www.google.com/maps/dir/{{ $usuario->lat }},{{ $usuario->lng }}">
                Ver en Google Maps
            </a> --}}
        </li>
    </ul>
</body>
</html>