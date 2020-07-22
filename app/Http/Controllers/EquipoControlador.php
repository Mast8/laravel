<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\ProjectUser;
use App\User;
use Illuminate\Support\Facades\Auth;

class EquipoControlador extends Controller
{
    public function show(Project $project)
     {
        $miembros =  \DB::table('users')
        ->join('project_user', 'users.id', '=', 'project_user.user_id')
        ->where('project_user.project_id', $project->id)
        ->get();
        $num_miembros = count($miembros);
        return view('equipo.show', compact('miembros','project','num_miembros'));
     }

     public function destroy($id /*ProjectUser $ProjectUser*/)
     {
         $membrecia = ProjectUser::find($id);
         
         if($membrecia->delete()){
             //return redirect()->back()->with('success', ['your ,here']);
             /*return redirect()->route('projects.index')
             ->with('success' , 'project deleted successfully');*/
             return redirect()->back()
                ->with('success' , 'Se elimino al usuario del proyecto');
         }
 
         return back()->withInput()->with('error' , 'project could not be deleted');  
     }

     public function anadir(Request $request){

        $this->validate( $request, [
            //'email' => 'required | unique:project_user,name',
            'email' => 'required|email'
        ]);

        $project = Project::find($request->input('project_id'));
        //if(Auth::user()->id == $project->user_id){
        $user = User::where('email', $request->input('email'))->first();

        if($user){
            //revisar si ya es miembro
            $miembro = ProjectUser::where('user_id',$user->id)
                                    ->where('project_id',$project->id)
                                    ->first();
            //comprobar si es propietaro del proyecto
            $propietario = Project::where('user_id', $user->id)->get()
                                    ->where('id',$project->id)
                                    ->first();
            //si ya es miembro o propietario del proyecto salir
            if($miembro || $propietario){
                    return redirect()->back()
                    ->with('error' , 'El usuario ya esta invitado o es el creador del proyecto.');
            }

                $project = ProjectUser::create([
                    'project_id' => $request->input('project_id'),
                    'user_id' => $user->id,
                    'invitado' => 1
                ]);
            return redirect()->back()->with('success', 'Se añadio al usuario'); 
        }
        return redirect()->back()->with('error', 
        'No existe un usuario registrado con el correo proporcionado.'); 
    }
}
