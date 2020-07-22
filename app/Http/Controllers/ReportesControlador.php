<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ReportesControlador extends Controller
{
    public function rep_pro_bac(Project $project)
     { 
        $pbis = \DB::table('sprints')
        ->join('pbis','sprints.id','=','pbis.sprint_id')
        ->join('prioridads','pbis.prioridad_id','=','prioridads.id')
        ->where('sprints.project_id', $project->id)
        ->where('pbis.eliminado', 0)
        ->orderByRaw('sprint_id ASC')
        ->get(); 
         //dd($pbis);
        $proyecto = Project::find($project->id);

        $view =\View::make('projects.reportes.rep_pb', compact('pbis','proyecto'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf ->loadHTML($view);
        return $pdf->stream('reporte_product_backlog'.'.pdf');
     }


     public function rep_tar(Project $project)
     { 
        $pbis = \DB::table('sprints')
        ->join('pbis','sprints.id','=','pbis.sprint_id')
        ->join('tareas','pbis.id','=','tareas.pbi_id')
        ->join('users','tareas.user_id','=','users.id')
        ->join('prioridads','pbis.prioridad_id','=','prioridads.id')
        ->join('estados','tareas.estado_id','=','estados.id')
        ->where('sprints.project_id', $project->id)
        ->where('tareas.eliminado', 0)
        ->orderByRaw('sprint_id ASC')
        //->groupBy('pbis.id')
        ->get(); 
        //dd($pbis);
        $proyecto=Project::find($project->id);

        $view =\View::make('projects.reportes.rep_tareas', compact('pbis','proyecto'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf ->loadHTML($view);
        return $pdf->stream('reporte_tareas'.'.pdf');
     }

     public function rep_tar_est(Project $project)
     { 
        $pbis = \DB::table('sprints')
        ->join('pbis','sprints.id','=','pbis.sprint_id')
        ->join('tareas','pbis.id','=','tareas.pbi_id')
        ->join('users','tareas.user_id','=','users.id')
        ->join('prioridads','pbis.prioridad_id','=','prioridads.id')
        ->join('estados','tareas.estado_id','=','estados.id')
        ->where('sprints.project_id', $project->id)
        ->where('tareas.eliminado', 0)
        ->orderByRaw('sprint_id ASC')
        ->get(); 

        $pendientes = $pbis->filter(function ($pbis, $key) {
            return $pbis->estado_id==1;
        })->values();

        $en_curs = $pbis->filter(function ($pbis, $key) {
            return $pbis->estado_id==2;
        })->values();
        $concluidos = $pbis->filter(function ($pbis, $key) {
            return $pbis->estado_id==3;
        })->values();
     
        $proyecto=Project::find($project->id);

        $view =\View::make('projects.reportes.rep_tar_est', 
        compact('proyecto','pendientes','en_curs','concluidos'))->render();

        $pdf = \App::make('dompdf.wrapper');
        $pdf ->loadHTML($view);
        return $pdf->stream('reporte_estado_tareas'.'.pdf');
     }

     public function rep_usuarios(Project $project)
     { 
        $miembros = \DB::table('project_user')
        ->join('users','project_user.user_id','=','users.id')
        //->join('tareas','users.id','=','tareas.user_id')

        ->where('project_user.project_id', $project->id)
        ->orderByRaw('project_user.id ASC')
        
        ->get();

        $dueno = \DB::table('projects')
        ->join('users','projects.user_id','=','users.id')
        ->where('projects.id', $project->id)
        //->orderByRaw('project_user.id ASC')
        ->first();

        
        $view =\View::make('projects.reportes.rep_usuarios', 
        compact('miembros','project','dueno'))->render();

        $pdf = \App::make('dompdf.wrapper');
        $pdf ->loadHTML($view);
        return $pdf->stream('reporte_miembros'.'.pdf');
     }

     public function rep_sprints(Project $project)
     { 
        $sprints = \DB::table('sprints')
        ->where('sprints.project_id', $project->id)
        ->get(); 

        $proyecto=Project::find($project->id);

        $view =\View::make('projects.reportes.rep_sprints', compact('sprints','proyecto'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf ->loadHTML($view);
        return $pdf->stream('reporte_Sprints'.'.pdf');
     }
}
