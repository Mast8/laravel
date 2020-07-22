<?php

namespace App\Http\Controllers;

use App\Project;
use App\Company;
use App\ProjectUser;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function todos()
     {
        if( Auth::check() ){
        $proyectos = Project::all();
        $num_proyects =count($proyectos);
        return view('projects.todos', compact('proyectos','num_proyects'));  
        }
     }

     public function index()
     {
        if( Auth::check() ){
        $projects = Project::where('user_id', Auth::user()->id)->get();

        $proyectosInv = \DB::table('project_user')
        ->join('projects', 'project_user.project_id', '=', 'projects.id')
        ->where('project_user.user_id', Auth::user()->id)
        ->where('project_user.invitado', 1)
        ->get();

        return view('projects.index', compact('projects', 'proyectosInv'));  
        }
         
     }

     public function create(  )
     {
         
         return view('projects.create');
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
            'nombre' => 'required | unique:projects,name,user_id'
        ]) ;

        if(Auth::check()){
            $pro_creado = Project::create([
                'name' => $request->input('nombre'),
                'description' => $request->input('description'),
                //'company_id' => $request->input('company_id'),
                'user_id' => Auth::user()->id
            ]);

            if($pro_creado){
                return redirect()->route('projects.show', ['project'=> $pro_creado->id])
                ->with('success' , 'El proyecto fue creado exitosamente');
            }
        }
        return back()->withInput()->with('errors', 'No se pudo crear el proyecto');
 
     }

     /**
      * Display the specified resource.
      *
      * @param  \App\project  $project
      * @return \Illuminate\Http\Response
      */
     public function show(Project $project)
     {

        $project = Project::find($project->id);
        
        $pbis = \DB::table('sprints')
        ->join('pbis','sprints.id','=','pbis.sprint_id')
        ->where('sprints.project_id', $project->id)
        ->where('pbis.eliminado', 0)
        ->orderByRaw('sprint_id ASC')
        ->get();

        $sprints = \DB::table('sprints')
        ->where('sprints.project_id', $project->id)
        ->get();

         return view('projects.show', compact('project','pbis','sprints'));
     }

     public function papelera_historias(Project $project)
     {

        $project = Project::find($project->id);
        
        $pbis = \DB::table('sprints')
       ->join('pbis','sprints.id','=','pbis.sprint_id')
       ->where('sprints.project_id', $project->id)
       ->where('pbis.eliminado', 1)
       ->orderByRaw('sprint_id ASC')
       ->get();

        
        $num_eliminados = count($pbis);
        return view('pbis.eliminados', compact('project','pbis','num_eliminados'));
    }

    public function papelera_tareas(Project $project)
    {

       $project = Project::find($project->id);
       
        $tareas = \DB::table('sprints')
        ->join('pbis','sprints.id','=','pbis.sprint_id')
        ->join('tareas','pbis.id','=','tareas.pbi_id')
        ->where('sprints.project_id', $project->id)
        ->where('tareas.eliminado', 1)
        ->orderByRaw('sprint_id ASC')
        ->get();
        //dd($tareas);
       $num_eliminados = count($tareas);
       return view('tareas.eliminados', compact('project','tareas','num_eliminados'));
   }
     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\project  $project
      * @return \Illuminate\Http\Response
      */
     public function edit(Project $project)
     {
         $project = Project::find($project->id);
         
         return view('projects.edit', ['project'=>$project]);
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\project  $project
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, project $project)
     {
        $projectUpdate = Project::where('id', $project->id)
                            ->update([
                                'name'=> $request->input('name'),
                                'description'=> $request->input('description')
                            ]);
    
        if($projectUpdate){
            return redirect()->route('projects.show', ['project'=> $project->id])
            ->with('success' , 'Se actualizaron los datos del proyecto');
        }
        return back()->withInput();
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\project  $project
      * @return \Illuminate\Http\Response
      */
     public function destroy(Project $project)
     {
         $findproject = Project::find( $project->id);
         if($findproject->delete()){
             return redirect()->route('projects.index')
             ->with('success' , 'Proyecto eliminado exitosamente');
         }
         return back()->withInput()->with('error' , 'No se pudo eliminar le proyecto');  
     }

     public function destroy_admin(Project $project)
     {
         $findproject = Project::find( $project->id);
         if($findproject->delete()){
             return redirect()->route('proyecto.todos')
             ->with('success' , 'Proyecto eliminado exitosamente');
         }
         return back()->withInput()->with('error' , 'No se pudo eliminar le proyecto');  
     }

     
}
