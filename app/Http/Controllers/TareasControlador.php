<?php


namespace App\Http\Controllers;

use App\Tarea;
use App\Project;
use App\Prioridad;
use App\Estado;
use App\User;
use App\Pbi;
use App\Sprint;
use App\Archivo;
Use \Carbon\Carbon;
use Session;
use App\Historial_tareas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Mail;

class TareasControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function create(Request $request)
    public function create(Pbi $pbi)
    {
        $idhistoria = $pbi->id;
        //$sprint = Sprint::find($idhistoria);
        $idsprint = $pbi->sprint_id;
        //dd($idhistoria);
        $sprint = Sprint::find($idsprint);

        //dd($sprint);
        $prioris = Prioridad::all();
        $estados = Estado::all();
        $miembros = \DB::table('sprints')
        ->join('projects', 'sprints.project_id', '=', 'projects.id')
        ->join('project_user', 'projects.id', '=', 'project_user.project_id')
        ->join('users', 'project_user.user_id','=', 'users.id')
        ->where('sprints.id', $sprint->id)
        ->get();

        //dd($miembros);
        return view('tareas.create', compact('idhistoria','prioris','estados','miembros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $idsprint = $request->input('idSprint');

        $pbi =  \DB::table('pbis')
        ->where('pbis.sprint_id', $idsprint)
        ->get();

        $this->validate( $request, [
            'titulo' => 'required |unique:tareas,name',
            'asignar'=> 'required',
            'estado'=> 'required',
        ]) ;


        $pbi = $request->input('idPbi');

        $user = User::find($request->input('asignar'));    
        $id_estado = $request->input('estado');
        if($id_estado == 3){
            Tarea::create([
                'name' => $request->input('titulo'),
                'descripcion' => $request->input('description'),
                'pbi_id' => $request->input('idPbi'), 
                'estado_id' => $id_estado,  
                //'estimacion' => $request->input('estimacion'),   
                'creado_por' =>  Auth::user()->email,
                'user_id' => $user->id,
                'responsable' => $user->email,
                'concluido_por' => Auth::user()->email,
            ]);
        }
        else{
            Tarea::create([
                'name' => $request->input('titulo'),
                'descripcion' => $request->input('description'),
                'pbi_id' => $request->input('idPbi'), 
                'estado_id' => $id_estado,  
                //'estimacion' => $request->input('estimacion'),   
                'creado_por' =>  Auth::user()->email,
                'user_id' => $user->id,
                'responsable' => $user->email
            ]);
        }
            

            if($user){

                //llama a la funcion del controlador show
                //enviar notificacion al usuario asignado
                $usuarioArray = $user->toArray();
                $usuarioArray['tarea'] = $request->input('titulo');
                //dd($usuarioArray);
                Mail::send('mensajes.asignacion', $usuarioArray, function($message) use ($usuarioArray){
                    $message->to($usuarioArray['email']);
                    $message->subject('Improve - Asignacion de tarea');
                });
                return redirect()->route('pbis.show', ['pbi'=> $pbi])
                ->with('success' , 'Tarea creada');
            }
            return redirect()->route('pbis.show', ['pbi'=> $pbi])
                ->with('success' , 'Tarea creada');
            //return redirect()->back()->withInput()->with('errors', 'Error al crear la historia');
            ///return back()->withInput()->with('errors', 'Error al crear la tarea');
        
          
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    //public function show(Task $task)
    public function show(Tarea $tarea)
    {
        $pbis =  \DB::table('tareas')
        ->where('tareas.pbi_id', $tarea->id)
        ->get();
        return view('tareas.show', compact('pbis')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarea $tarea)
    {
        $prioris = Prioridad::all();
        $miembros = \DB::table('tareas')
        ->join('pbis','tareas.pbi_id','=','pbis.id')
        ->join('sprints','sprints.id','=','pbis.sprint_id')
        ->join('projects', 'sprints.project_id', '=', 'projects.id')
        ->join('project_user', 'projects.id', '=', 'project_user.project_id')
        ->join('users', 'project_user.user_id','=', 'users.id')
        ->where('tareas.id', $tarea->id)
        ->get();

        $asignado_a = User::find($tarea->user_id);
        //dd($asignado_a);
        $estado_act = Estado::find($tarea->estado_id);
        $estados = Estado::all();


        //obtener los documentos para listarlos
        $images_set = [] ;
        $files_set = [] ;
        $extensiones = ['png','gif','jpeg','jpg','pdf','doc','docx','zip','rar','sql'] ;
        // get task file names with task_id number
        $taskfiles = Archivo::where('tarea_id', $tarea->id)->get();

        if ( count($taskfiles) > 0 ) { 
            foreach ( $taskfiles as $taskfile ) {
                
                // explode the filename into 2 parts: the filename and the extension
                $taskfile = explode(".", $taskfile->nombre_archivo ) ;
                //dd($taskfile);
                // store images only in one array
                // $taskfile[0] = filename
                // $taskfile[1] = jpg
                // check if extension is a image filetype
                if ( in_array($taskfile[1], $extensiones ) ) 
                    $images_set[] = $taskfile[0] . '.' . $taskfile[1] ;
                    // if not an image, store in files array
                else
                    $files_set[] = $taskfile[0] . '.' . $taskfile[1]; 
            }
        }

        return view('tareas.edit', compact ('tarea','miembros','estados',
        'images_set','taskfiles','asignado_a','estado_act'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate( $request, [
            'razon' => 'required',
        ]) ;
        $id_asignado = $request->input('asignar');
        $id_tarea = $request->input('id_tarea');

        $id_estado = $request->input('estado');

        $asignar_a = User::find($id_asignado);
        $tarea = Tarea::find($id_tarea);
            $modificacion = Tarea::where('id', $id_tarea)
                ->update([   
                'name'=> $request->input('titulo'),
                'descripcion'=> $request->input('descripcion'),
                'user_id'=> $id_asignado,
                'responsable'=> $asignar_a->email,
                'pbi_id'=> $tarea->pbi_id,
                'estado_id'=> $id_estado,
            ]);

            //crear registro modificacion
            Historial_tareas::create([
                'accion_tar' => "Modificacion",
                'realizada_por_tar' =>  Auth::user()->email,
                'tarea_id' => $id_tarea,
                'motivo_tar' => $request->input('razon'),
                'creada_el_tar' => Carbon::now(),
            ]);
                //verificar si esta ocncluida
            if($id_estado == 3){
                $modificacion = Tarea::where('id', $id_tarea)
                ->update([   
                    'concluido_por'=> Auth::user()->email,
                ]);
            }

            $usuarioArray = $asignar_a->toArray();
            $usuarioArray['tarea'] = $request->input('titulo');
            //dd($usuarioArray);
            Mail::send('mensajes.modificacion', $usuarioArray, function($message) use ($usuarioArray){
                $message->to($usuarioArray['email']);
                $message->subject('Improve - Actualizacion de tarea');
            });

        $pbi = \DB::table('pbis')
        ->where('pbis.id', $tarea->pbi_id)
        ->first();
        $id_pbi = $pbi->id;
           
            return redirect()->route('pbis.show', compact('id_pbi'))
            ->with('success' , 'Se guardaron los datos de la tarea');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function eliminar (Tarea $tarea)
    {
        //dd($tarea);
        //$tarea->delete();
         $id_pbi = $tarea->pbi_id;
         if($tarea->delete()){ 
            Session::flash('success', 'Tarea eliminada') ;
            return redirect()->route('pbis.show', ['pbi'=> $id_pbi])
            ->with('success' , 'Tarea eliminada');
         }     
         return redirect()->back();
    }

    public function borrar (Request $request)
    {
        //
        $this->validate( $request, [
            'motivo' => 'required',
        ]) ;
        $id_tarea = $request->input('id_tarea');
        //dd($id_tarea);
        $tarea = Tarea::find($id_tarea);

        $id_pbi = $tarea->pbi_id;

        $papelera = Tarea::where('id', $id_tarea)
                ->update([   
                'eliminado'=> 1,
            ]);

            
            if($papelera){ 
                //crear registro de eliminacion tarea
                Historial_tareas::create([
                    'accion_tar' => "Eliminacion",
                    'motivo_tar'=> $request->input('motivo'),
                    'realizada_por_tar' =>  Auth::user()->email,
                    'tarea_id' => $id_tarea,
                    'creada_el_tar' => Carbon::now(),
                    
                ]); 
            }
       
        //if($tarea->delete()){ 
        Session::flash('success', 'Tarea eliminada') ;
        return redirect()->route('pbis.show', ['pbi'=> $id_pbi])
        ->with('success' , 'Tarea eliminada');
        //}     
        //return redirect()->back();
    }

    public function recuperar ( $id)
    {
        //
        $tarea = Tarea::find($id);
        /*
        $proyecto = \DB::table('pbis')
        ->join('sprints','pbis.sprint_id','=','sprints.id')
        ->where('pbis.id', $tarea->pbi_id)
        ->first();*/

        $recuperado = Tarea::where('id', $id)
            ->update([   
            'eliminado'=> 0,
        ]);
        
        if($recuperado){ 
            return redirect()->back()
            ->with('success' , 'Se recupero la tarea.');
            /*
            return redirect()->route('projects.show', ['project'=> $proyecto->project_id])
        ->with('success' , 'Se recupero el pbi');*/
        }         
        return back()->withInput()->with('error' , 'El pbi no puede ser eliminado');
    }

    public function historial ($id)
    {
        $acciones = \DB::table('historial_tareas')
        ->join('tareas','historial_tareas.tarea_id','=','tareas.id')
        ->where('tareas.id', $id)
        ->get();

        $num_acciones = count($acciones);
        return view('tareas.historial', compact('acciones','num_acciones'));
    }

    public function subir(Request $request)
    {
        $this->validate( $request, [
            
            'adjuntar' => 'required'
        ]) ;
        
        if( $request->hasFile('adjuntar') ) {
            $id_tarea = $request->input('id_tarea');
            //dd($id_tarea);

            foreach ($request->adjuntar as $file) {

                // remove whitespaces and dots in filenames : [' ' => '', '.' => ''] 
                //$filename = strtr( pathinfo( time() . '_' . $file->getClientOriginalName(), PATHINFO_FILENAME) , [' ' => '', '.' => ''] ) . '.' . pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                //$filename = strtr( pathinfo( $file->getClientOriginalName(), PATHINFO_FILENAME) , [' ' => '', '.' => ''] ) . '.' . pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                $filename = strtr( pathinfo( $file->getClientOriginalName(), PATHINFO_FILENAME) , ['.' => ''] ) . '.' . pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);

                $archRepetidos = Archivo::where('nombre_archivo', $filename)->first();
                /* verifica por tarea esta mal.
                $archRepetidos = Archivo::where('tarea_id', $id_tarea)
                ->where('nombre_archivo', $filename)->first();*/

                if(!$archRepetidos){
                // $filename = str_replace(' ' , '' , pathinfo( time() . '_' . $file->getClientOriginalName(), PATHINFO_FILENAME)   ) . '.' . pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);  // get original file name ex:   cat.jpg
                //  echo 'filename: ' . $filename ; 
                    $file->move('images',$filename);
                    // save to DB
                    $modificacion = Archivo::create([
                        'tarea_id'  =>  $id_tarea,
                        'nombre_archivo' => $filename  // For Regular Public Images
                    ]);
                    if($modificacion){
                        return redirect()->back()
                        //return redirect()->route('sprints.show', ['modificacion'=> $idSprint])
                        ->with('success' , 'Se adjunto el documento con exito');
                    }
                }
                return redirect()->back()
                ->with('error' , 'Ya existe un documento con el mismo nombre');
            }        
        }
        return redirect()->back()
        ->with('error' , 'El archivo debe pesar menos de 2 mb');
    }

    public function deleteFile($filename) {
        
        $delete_file = Archivo::where('nombre_archivo', $filename)->get()->first();
        // remove  file from public directory
        unlink( public_path() . '/images/' . $filename ) ;

        // delete entry from database
        $delete_file->delete() ;
        Session::flash('success', 'Se elimino el documento') ;
        return redirect()->back() ; 
    }
}
