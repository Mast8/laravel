<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sprint;
use App\Pbi;
use App\Project;
use Session;
use Illuminate\Support\Facades\Auth;

class SprintsControlador extends Controller
{
    public function show(Sprint $sprint)
    {
        $sprint = Sprint::find($sprint->id);
        $pbis =  \DB::table('pbis')
        ->where('sprint_id', $sprint->id)
        ->get();
        return view('sprints.show', compact ('pbis','sprint'));
    }

    public function store(Request $request)
    {
        $id_proyec = request()->idproyecto;
        return view('sprints.create', compact('id_proyec'));
    }

    public function create(Request $request)
    {
        //$projects = Project::where('user_id', Auth::user()->id)->get();

        /*$sprint =  \DB::table('sprints')
        ->where('nombre', $request->input('nombre'))
        ->where('project_id',$id_proyecto)
        ->first();*/

        //if(!$sprint){
            $this->validate( $request, [
                'nombre' => 'required | unique:sprints,nombre',
                
            ]) ;
            if(Auth::check()){
                $sprint = Sprint::create([
                    'nombre' => $request->input('nombre'),
                    'descripcion' => $request->input('description'),
                    'project_id' => $request->input('idproject'),
                ]);
                if($sprint){
                    return redirect()->route('projects.show', ['project'=> $sprint->project_id])
                    ->with('success' , 'Sprint creado exitosamente');
                }

            }  
        /*}
        else{
            return redirect()->back()
                ->with('error' , 'El nombre sprint ya esta siendo usado');
        }*/
            //return back()->withInput()->with('errors', 'Error al crear nuevo sprint');
    }

    public function edit($id)
     {
         $sprint = Sprint::find($id);
         $proyecto_id = $sprint->project_id;
         return view('sprints.edit', compact ('sprint','id','proyecto_id'));

     }
    
     public function update(Request $request)
     {
        $this->validate( $request, [
            'nombre' => 'required'
        ]) ;
        $idSpr = $request->input('sprint_id');
        $sprint = Sprint::find($idSpr);
        $project = Project::find($sprint->project_id);
       
        $projectUpdate = Sprint::where('id', $sprint->id)
            ->update([
                'nombre'=> $request->input('nombre'),
                'descripcion'=> $request->input('description')
            ]);
                        
       if($projectUpdate){
            return redirect()->route('projects.show', compact('project'))
           ->with('success' , 'Se guardaron los datos del sprint');
       }
       //redirect
       return back()->withInput();
     }

     public function destroy($id)
     {
         $sprint = Sprint::find($id);
         if($sprint->delete()){ 
            Session::flash('success', 'File Deleted') ;
            //return redirect()->back(); 
            return redirect()->route('projects.show', ['project'=> $sprint->project_id])
                ->with('success' , 'Sprint creado exitosamente');
         }         
         return back()->withInput()->with('error' , 'project could not be deleted');  

     }
}
