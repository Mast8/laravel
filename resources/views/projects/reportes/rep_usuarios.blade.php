<html>
    
    <title> Reporte Usuarios </title>
<head>

    <style>
        h1 { color: #8f9595; }
        h2 { color: #667373; }
        table{
            font-family:arial, sans-serif;
            border-collapse:collapse;
            width: 100%;
            font-size:	10px;
        }
    td, th {
        border: 1px solid #dddddd;
        text-align:left;
        padding: 8px;
    }
    tr:nth-child(even) {
        background-color: #dddddd;
    }
    </style>
</head>

<head>
<body>

    PROYECTO: <h1 >  {{ $project->name }} </h1>
    <h2 align="center">
        PROPIETARIO
    </h2>
    
    <table>
        <tr>
            <th>NOMBRE</th>
            <th>USUARIO</th>
            <th>EMAIL</th>
        </tr>
       
        <tr>
            <td>{{ $dueno->apellidos. " ".$dueno->nombres }}</td>
            <td>{{ $dueno->usuario }}</td>
            <td>{{ $dueno->email }}</td>
        </tr>
    </table>

    <h2 align="center">
        MIEMBROS
    </h2>
    @if(count($miembros)>0)
        <table>
            <tr>
                <th>NOMBRE</th>
                <th>USUARIO</th>
                <th>EMAIL</th>
                {{-- <th>Descripcion</th> 
                <th>TAREA</th>--}}   
            </tr>

            @foreach ($miembros as $miembro)
                <tr>
                    <td>{{ $miembro->apellidos. " ".$miembro->nombres }}</td>
                    <td>{{ $miembro->usuario }}</td>
                    <td>{{ $miembro->email }}</td>
                    {{-- <td>{{ $proyecto->descripcion }}</td> 
                    <td>{{ $miembro->name }}</td>--}}
                </tr>
            @endforeach

        </table>
    @else
    <h2 align="center">
        NO SE TIENEN USUARIOS REGISTRADOS, INVITELOS!
    </h2>
    @endif
    
</head>