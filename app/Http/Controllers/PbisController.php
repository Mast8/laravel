<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use \Carbon\Carbon;
use App\Project;
use App\Pbi;
use App\Sprint;
use App\Prioridad;
use App\Tarea;
use App\Archivo;
use App\Historial_pbi;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PbisController extends Controller
{
    
    public function show(Pbi $pbi )
    {
        $tareas = Tarea::orderBy('id')
        ->where('pbi_id', $pbi->id)
        ->where('eliminado', 0)
        ->get();
        //dd($testimonials);
        $pendientes = $tareas->filter(function ($tareas, $key) {
            return $tareas->estado_id==1;
        })->values();
        //dd($pendientes);

        $en_cursos = $tareas->filter(function ($tareas, $key) {
            return $tareas->estado_id==2;
        })->values();
        //1 pendiente   2 en curso    3 concluido 
        $concluidos = $tareas->filter(function ($tareas, $key) {
            return $tareas->estado_id==3;
        })->values();

        $num_pendientes = count($pendientes);
        $num_en_cursos = count($en_cursos);
        $num_concluidos = count($concluidos);
        /*romper en caso de arrastrar tareas, no eliminar el tareas.index
        $testimonials = Tarea::orderBy('id')
        ->where('pbi_id', $pbi->id)
        ->get();
        //dd($testimonials);
        $testimonialsVisible = $testimonials->filter(function ($testimonial, $key) {
            return $testimonial->estado_id==1;
        })->values();

        $testimonialsNotVisible = $testimonials->filter(function ($testimonial, $key) {
            return $testimonial->estado_id==2;
        })->values();
        //1 pendiente   2 en curso    3 concluido 
        $done = $testimonials->filter(function ($testimonial, $key) {
            return $testimonial->estado_id==3;
        })->values();

        //return view('tareas.index')->with([
            'pbi'=> $pbi,
            'testimonials' => $testimonials,
            'testimonialsVisible' => $testimonialsVisible,
            'testimonialsNotVisible' => $testimonialsNotVisible,
            'done'=> $done,
        ]);*/

        $miembros = \DB::table('pbis')
        ->join('sprints','sprints.id','=','pbis.sprint_id')
        ->join('projects', 'sprints.project_id', '=', 'projects.id')
        ->join('project_user', 'projects.id', '=', 'project_user.project_id')
        ->join('users', 'project_user.user_id','=', 'users.id')
        ->where('pbis.id', $pbi->id)
        ->get();

        $proyecto_datos = \DB::table('pbis')
        ->join('sprints','sprints.id','=','pbis.sprint_id')
        ->join('projects', 'sprints.project_id', '=', 'projects.id')
        ->where('pbis.id', $pbi->id)
        ->first();
        
        $proyecto = $proyecto_datos->project_id;
        return view('tareas.home', compact('pbi', 'pendientes','en_cursos', 'concluidos'
        ,'miembros','num_pendientes','num_en_cursos','num_concluidos','proyecto'));
         
    }


    /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
      public function create(Request $request)
      {
        $idProy = request()->idProyecto;
        //dd($idProy);
        //$pbi = Pbi::where('id', $idPbi)->get()->first();
        $prioris = Prioridad::all(); 
        $sprints = \DB::table('sprints')
        ->where('sprints.project_id', $idProy)
        ->get();
    
        return view('pbis.create', compact('idProy','idPbi','prioris','sprints'));
      }
  
      /**
       * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */
      public function store(Request $request)
      {
        $this->validate( $request, [
            'titulo' => 'required | unique:pbis,titulo',
            'sprint' => 'required',
            'prioridad' => 'required',
            'estimacion' => 'numeric|min:1|max:100',
        ]) ;

            $idProyecto = $request->input('idProyecto');
            
            //dd(Auth::user()->usuario);
              $creado = Pbi::create([
                  'titulo' => $request->input('titulo'),
                  'descripcion' => $request->input('description'),
                  'sprint_id' => $request->input('sprint'), 
                  'prioridad_id' => $request->input('prioridad'),  
                  'estimacion' => $request->input('estimacion'),  
                  'creado_por' =>  Auth::user()->email,
              ]);
  
              if($creado){
                return redirect()->route('projects.show', ['project'=> $idProyecto])
                ->with('success' , 'Historia creada exitosamente');
                  /*return redirect()->route('sprints.show', ['project'=> $idsprint])
                  ->with('success' , 'Historia creada exitosamente');*/
              }
              return redirect()->back()->withInput()->with('errors', 'Error al crear la historia');
      }

    public function edit(/*Pbi $pbi*/ $id)
     {
        $pbi = Pbi::find($id);
        $idpriori = $pbi->prioridad_id;
        $priori_act = Prioridad::find($idpriori);
        $prioris = Prioridad::all();
        

        // listar sprints
        $proyecto = \DB::table('pbis')
        ->join('sprints', 'pbis.sprint_id', '=', 'sprints.id')
        ->where('pbis.id', $id)
        ->first();
        $sprints = \DB::table('sprints')
        ->where('sprints.project_id', $proyecto->project_id)
        ->get();
        $sprint_act = Sprint::find($pbi->sprint_id);

        //obtener los documentos para listarlos
        $images_set = [] ;
        $files_set = [] ;
        $images_array = ['png','gif','jpeg','jpg','pdf','doc','docx'] ;
        // get task file names with task_id number

        $taskfiles = \DB::table('pbis')
        ->join('tareas', 'pbis.id', '=', 'tareas.pbi_id')
        ->join('archivos', 'tareas.id', '=', 'archivos.tarea_id')
        ->where('pbis.id', $id)
        ->get();
 
        
        //$taskfiles = Archivo::where('tarea_id', $tareas->id)->get();
        //$taskfiles = Archivo::all();
        //dd($taskfiles);
        if ( count($taskfiles) > 0 ) { 
            foreach ( $taskfiles as $taskfile ) {
                
                // explode the filename into 2 parts: the filename and the extension
                $taskfile = explode(".", $taskfile->nombre_archivo ) ;
                //dd($taskfile);
                // store images only in one array
                // $taskfile[0] = filename
                // $taskfile[1] = jpg
                // check if extension is a image filetype
                if ( in_array($taskfile[1], $images_array ) ) 
                    $images_set[] = $taskfile[0] . '.' . $taskfile[1] ;
                    // if not an image, store in files array
                else
                    $files_set[] = $taskfile[0] . '.' . $taskfile[1]; 
            }
        }
        
        return view('pbis.edit', compact ('pbi','priori_act','sprint_act',
        'prioris','archivos','images_set','taskfiles','sprints','proyecto'));
     }


     public function update(Request $request)
     {
     
        $idSprint = $request->input('sprint_id');
        $idPbi = $request->input('pbi_id');

        //subir archivo
        if( $request->hasFile('photos') ) {
            foreach ($request->photos as $file) {
                // remove whitespaces and dots in filenames : [' ' => '', '.' => ''] 
                //$filename = strtr( pathinfo( time() . '_' . $file->getClientOriginalName(), PATHINFO_FILENAME) , [' ' => '', '.' => ''] ) . '.' . pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                $filename = strtr( pathinfo( $file->getClientOriginalName(), PATHINFO_FILENAME) , [' ' => '', '.' => ''] ) . '.' . pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                
                $archRepetidos = Archivo::where('pbi_id', $idPbi)->where('nombre_archivo',$filename)->first();
                if(!$archRepetidos){
                // $filename = str_replace(' ' , '' , pathinfo( time() . '_' . $file->getClientOriginalName(), PATHINFO_FILENAME)   ) . '.' . pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);  // get original file name ex:   cat.jpg
                //  echo 'filename: ' . $filename ; 

                    $file->move('images',$filename);

                    // save to DB
                    $modificacio = Archivo::create([
                        'pbi_id'  =>  $request->input('pbi_id'),
                        'nombre_archivo' => $filename  // For Regular Public Images
                    ]);
                    /*if($modificacio){
                        return redirect()->route('sprints.show', ['modificacion'=> $idSprint])
                        ->with('success' , 'Se guardaron los datos del pbi');
                    }*/
                }
                return redirect()->back(); 
            }        
        }

        $this->validate( $request, [
                //'estimacion' => 'numeric|digits_between:1,2',
                'estimacion' => 'numeric|min:1|max:100', 
                'razon' => 'required'
            ]) ;

        $modificacion = Pbi::where('id', $idPbi)
            ->update([   
            'titulo'=> $request->input('nombre'),
            'descripcion'=> $request->input('descripcion'),
            'estimacion'=> $request->input('estimacion'),
            'prioridad_id'=> $request->input('priorida'),
            'sprint_id'=> $request->input('sprint')
        ]);

       if($modificacion){

            //crear registro de modificacion historia
            Historial_pbi::create([
                'accion' => "Modificacion",
                'realizada_por' =>  Auth::user()->email,
                'pbi_id' => $idPbi,
                'motivo' => $request->input('razon'),
                'creada_el' => Carbon::now(),
            ]);

            $id_proyecto = $request->input('proyecto_id');
        
            return redirect()->route('projects.show', ['id'=> $id_proyecto])
           ->with('success' , 'Se guardaron los datos del pbi');
       }

       return back()->withInput();
     }
     

     public function destroy(Request $request)
     {
        $id_pbi = $request->input('id_pbi');
        $this->validate( $request, [
            'motivo' => 'required', 
        ]) ;

            $proyecto = \DB::table('pbis')
            ->join('sprints','pbis.sprint_id','=','sprints.id')
            ->where('pbis.id', $id_pbi)
            ->first();
            /*
             pedir motivo
             cambiar a pseudo eliminado
             listar no eliminados(product backlog)
             listar papelera de historias
             historial de historias
             */
            $papelera = Pbi::where('id', $id_pbi)
                ->update([   
                //'motivoP'=> $request->input('motivo'),
                'eliminado'=> 1,
            ]);

            
            if($papelera){ 
                //crear registro de eliminacion historia
                Historial_pbi::create([
                    'accion' => "Eliminacion",
                    'motivo'=> $request->input('motivo'),
                    'realizada_por' =>  Auth::user()->email,
                    'pbi_id' => $id_pbi,
                    'creada_el' => Carbon::now(),
                    
                ]); 
                return redirect()->route('projects.show', ['project'=> $proyecto->project_id])
            ->with('success' , 'Se elimino el pbi');
            }         
        return back()->withInput()->with('error' , 'El pbi no puede ser eliminado');
     }

     public function eliminar($id)
     {
            $proyecto = \DB::table('pbis')
            ->join('sprints','pbis.sprint_id','=','sprints.id')
            ->where('pbis.id', $id)
            ->first();

            $pbi = Pbi::find($id);
           
            if($pbi->delete()){ 
                return back()->withInput()->with('success' , 'Se elimino el pbi');
                //return redirect()->route('projects.show', ['project'=> $proyecto->project_id])
            //->with('success' , 'Se elimino definitivamente el pbi');
            }         
        return back()->withInput()->with('error' , 'El pbi no puede ser eliminado');
     }

     public function recuperar($id)
     {
        $proyecto = \DB::table('pbis')
        ->join('sprints','pbis.sprint_id','=','sprints.id')
        ->where('pbis.id', $id)
        ->first();

        $recuperado = Pbi::where('id', $id)
            ->update([   
            //'motivoP'=> "",
            'eliminado'=> 0,
        ]);
        
        if($recuperado){ 
            return redirect()->route('projects.show', ['project'=> $proyecto->project_id])
        ->with('success' , 'Se recupero el pbi');
        }         
        return back()->withInput()->with('error' , 'El pbi no puede ser eliminado');
     }

     public function historial ($id)
      {
        //$pbi = Pbi::find($id);
        $acciones = \DB::table('historial_pbis')
        ->join('pbis','historial_pbis.pbi_id','=','pbis.id')
        ->where('pbi_id', $id)
        ->get();
        //dd($acciones);
        
        $num_acciones = count($acciones);
        return view('pbis.historial', compact('acciones','num_acciones'));
      }

     public function cambiarEst(Request $request, Tarea $tarea)
    {
        $tarea->estado_id = $request->visible;
        $tarea->save();
        return response('Update Successful.', 200);
    }

    public function destroyT( Tarea $tarea)
    {
        $tarea->delete();
        return response('Eliminacion exitosa.', 200);
    }

    //eliminar
    public function deleteFile($filename) {
        
        $delete_file = Archivo::where('nombre_archivo', $filename)->get()->first();
        // remove  file from public directory
        unlink( public_path() . '/images/' . $filename ) ;

        // delete entry from database
        $delete_file->delete() ;
        Session::flash('success', 'File Deleted') ;
        return redirect()->back() ; 
    }
}
