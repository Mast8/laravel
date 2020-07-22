<html>
    
    <title> Reporte de Sprints </title>
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
    tr:nth-child(even) {
        background-color: #dddddd;
    }
    </style>
</head>

<head>
<body>

    PROYECTO: <h1 >  {{ $proyecto->name }} </h1>

        
    <h2 align="center">
        Sprints
    </h2>
    @if(count($sprints)>0)
    <h3 align="center">
        Se registraron <b> {{ count($sprints) }} </b> Sprints.
    </h3>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
            </tr>

            @foreach ($sprints as $sprint)
                <tr>
                    <td>{{ $sprint->nombre }}</td>
                    
                    <td>{{ $sprint->descripcion }}</td> 
                    {{--<td>{{ $sprint->estimacion }}</td>
                    <td>{{ $sprint->nombrePrio }}</td>--}}
                    
                </tr>
                
            @endforeach
           
        </table>
    @else
        <h2 align="center">
            NO SE TIENEN DATOS REGISTRADOS.
        </h2>
    @endif
</head>