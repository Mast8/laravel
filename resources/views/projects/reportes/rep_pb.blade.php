<html>
    
    <title> Reporte Product Backlog </title>
<head>

    <style>
        h1 { color: #8f9595; }
        h2 { color: #667373; }
        h3 { color: #567086; }
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
    
    </style>
</head>

<head>
<body>

    PROYECTO: <h1 >  {{ $proyecto->name }} </h1>

        
    <h2 align="center">
        PRODUCT BACKLOG
    </h2>
    @if(count($pbis)>0)
    <h3 align="center">
        Se registraron <b> {{ count($pbis) }} </b> historias de usuario.
    </h3>
        <table>
            <tr>
                <th>PBI</th>
                <th>SPRINT</th>
                <th>CREADO POR</th>
                {{-- <th>Descripcion</th> --}}
                <th>ESTIMACIÓN</th>
                <th>PRIORIDAD</th>
                
            </tr>
            @foreach ($pbis as $pbi)
                <tr>
                    <td>{{ $pbi->titulo }}</td>
                    <td>{{ $pbi->nombre }}</td>
                    <td>{{ $pbi->creado_por }}</td> 
                    <td>{{ $pbi->estimacion }}</td>
                    <td>{{ $pbi->nombrePrio }}</td>
                    
                </tr>
            @endforeach
            
        </table>
    @else
        <h2 align="center">
            NO SE TIENEN DATOS REGISTRADOS.
        </h2>
    @endif
</head>