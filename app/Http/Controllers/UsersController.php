<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index()
    {
        $usuarios = User::all();
        return view ('usuarios.show', compact('usuarios'));
    }

    
    public function create()
    {
        //
    }
   
    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        //
    }

    
    public function edit(User $user)
    {
        return view('usuarios.edit', compact('user'));
    }

    
    public function update(Request $request)
    {
        $this->validate( $request, [
            'usuario'=> 'required',
            'nombre' => 'string',
            'apellido' => 'string'
        ]) ;

        $cambio = User::where('id', $request->input('id_user'))
                ->update([
                    'usuario'=> $request->input('usuario'),
                    'nombres'=> $request->input('nombre'),
                    'apellidos'=> $request->input('apellido'),
                    'descripcion_user' => $request->input('descripcion'),
                ]);

        if($cambio){
            return redirect()->route('projects.index')
            ->with('success' , 'Se guardaron sus datos');
        }
        return back()->withInput();
    }

    public function destroy(User $user)
    {

        if($user->delete()){
            return redirect()->route('users.index')
            ->with('success' , 'Cuenta eliminada');
        }
        return back()->withInput()->with('error' , 'No se pudo eliminar la cuenta');
    }

    public function camEstado(User $user)
    {
        if($user->activado==1){
            $user->activado=0;
        }
        else{
            $user->activado=1;
        }
        $user->save();
        return redirect()->route('users.index');
    }
}
