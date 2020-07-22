<?php

namespace App\Http\Controllers;

use App\Comentario;
use Illuminate\Http\Request;
use App\Pbi;
Use \Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

class ComentarioControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Pbi $pbi)
    {
        $comentarios =  \DB::table('users')
        ->join('comentarios','comentarios.user_id','=','users.id')
        ->where('pbi_id', $pbi->id)
        ->orderByRaw('comentarios.created_at ASC')
        ->get();
        return view('pbis.comentarios', compact('comentarios','pbi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'mensaje' => 'required'
        ]) ;
        if(Auth::check()){
            $com_creado = Comentario::create([
                'mensaje' => $request->input('mensaje'),
                'user_id' => Auth::user()->id,
                'pbi_id'  => $request->input('id_pbi'),
                'fecha'   => Carbon::now()
            ]);
            if($com_creado){
                return back()->with('success' , 'Comentario creado exitosamente');
            }
        }
        return back()->withInput()->with('errors', 'Error al crear el comentario');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentario $comentario)
    {
        $eliminado = $comentario->delete();
        if($eliminado){
            return back()->with('success' , 'Comentario eliminado exitosamente');
        }
    }

}
