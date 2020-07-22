<html>
        
    <title> Reporte del estado de tareas </title>
<head>

    <style>
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
    
    footer { position: fixed; right: 0px; bottom: 10px; text-align: center; 
        border-top: 1px solid black;}
        #footer .page:after { content: counter(page, decimal); }
        @page { margin: 20px 30px 40px 50px; }
    </style>
</head>

<head>
<body>
    
    <h2 align="center">
        TAREAS PLANIFICADAS
    </h2>
    @if(count($pbis)>0)
    <h3 align="center">
        Se registraron {{ count($pbis) }} tareas.
    </h3>
        <table>
            <tr>
                <th>PBI</th>
                <th>TAREA</th>
                <th>SPRINT</th>
                <th>CREADA POR</th>
                <th>RESPONSABLE</th>
                <th>ESTADO</th>
            </tr>
            @foreach ($pbis as $pbi)
        
            
                <tr>
                    <td>{{ $pbi->titulo }}</td>
                    <td>{{ $pbi->name }}</td>
                    <td>{{ $pbi->nombre }}</td>
                    <td>{{ $pbi->creado_por }}</td>
                    <td>{{ $pbi->email }}</td>
                    <td>{{ $pbi->nombre_est }}</td>
                </tr>
            @endforeach
            {{-- <div id="footer">
                <p class="page">Pagina </p>
            </div> --}}
        </table>
    @else
        <h2 align="center">
            NO SE TIENEN DATOS REGISTRADOS.
        </h2>
    @endif
</head>