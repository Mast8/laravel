<html>
        
    <title> Reporte de tareas </title>
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
 
                           
                       
    </style>
</head>

<head>
<body>
        
    <h2 align="center">
        ESTADO TAREAS PLANIFICADAS
    </h2>
    <h3 align="center">
        Se observan {{ count($pendientes) }} tareas PENDIENTES, 
        {{ count($en_curs) }} </b> tareas EN CURSO y 
        {{ count($concluidos) }} </b> tareas CONCLUIDAS.
    </h3>
    @if(count($pendientes) > 0 )
        <h2 align="center">
                PENDIENTES
        </h2>
        <table>
                <tr>
                    <th>PBI</th>
                    <th>TAREA</th>
                    <th>SPRINT</th>
                    <th>CREADO POR</th>
                    <th>RESPONSABLE</th>
                    <th>ESTADO</th>
                </tr>
                @foreach ($pendientes as $pend)
                    <tr>
                        <td>{{ $pend->titulo }}</td>
                        <td>{{ $pend->name }}</td>
                        <td>{{ $pend->nombre }}</td>
                        <td>{{ $pend->creado_por }}</td>
                        <td>{{ $pend->responsable }}</td>
                        <td>{{ $pend->nombre_est }}</td>
                        
                    </tr>
                    
                @endforeach
               
               
        </table>
    @endif
    @if(count($en_curs )>0 )
        <h2 align="center">
                EN CURSO
        </h2>

        <table>
                <tr>
                    <th>PBI</th>
                    <th>TAREA</th>
                    <th>SPRINT</th>
                    <th>CREADO POR</th>
                    <th>RESPONSABLE</th>
                    <th>ESTADO</th>
                </tr>
                @foreach ($en_curs as $curso)
                    <tr>
                        <td>{{ $curso->titulo }}</td>
                        <td>{{ $curso->name }}</td>
                        <td>{{ $curso->nombre }}</td>
                        <td>{{ $curso->creado_por }}</td>
                        <td>{{ $curso->responsable }}</td>
                        <td>{{ $curso->nombre_est }}</td>
                    </tr>
                @endforeach
        </table>
    @endif
    @if(count($concluidos )>0 )
        <h2 align="center">
                CONCLUIDOS
        </h2>

        <table>
                <tr>
                    <th>PBI</th>
                    <th>TAREA</th>
                    <th>SPRINT</th>
                    <th>CREADO POR</th>
                    <th>CONCLUIDO POR</th>
                    <th>RESPONSABLE</th>
                    <th>ESTADO</th>
                </tr>
                @foreach ($concluidos as $con)
                    <tr>
                        <td>{{ $con->titulo }}</td>
                        <td>{{ $con->name }}</td>
                        <td>{{ $con->nombre }}</td>
                        <td>{{ $con->creado_por }}</td>
                        <td>{{ $con->concluido_por }}</td>
                        <td>{{ $con->responsable }}</td>
                        <td>{{ $con->nombre_est }}</td>
                    </tr>
                @endforeach
        </table>
    @endif
    @if(count($pendientes )==0 && count($en_curs )==0 && count($concluidos )==0)
        <h2 align="center">
            NO SE TIENEN DATOS REGISTRADOS.
        </h2>
    @endif
</head>