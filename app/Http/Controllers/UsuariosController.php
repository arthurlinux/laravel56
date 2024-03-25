<?php

namespace App\Http\Controllers;

use App\Usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(view('usuarios', ['usuarios' => Usuarios::all()]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $data = $request->all();
        $usuario = Usuarios::create([
            'nombre' => $request->input('nombre'),
            'apellido_paterno' => $request->input('apellido_paterno'),
            'apellido_materno' => $request->input('apellido_materno'),
            'sexo' => $request->input('sexo'),
            'email' => $request->input('email')
        ]);
        return response(view('usuarios', ['usuarios' => Usuarios::all()]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response(view('createusuario'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(Usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
    * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $usuario = Usuarios::find($id);
        return response(view('editusuario', ['usuario' => $usuario]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuarios $usuarios, $id)
    {
        //
        $data = $request->all();
        $usuario = Usuarios::find($id);
        $usuario->nombre = $request->input('nombre');
        $usuario->apellido_paterno = $request->input('apellido_paterno');
        $usuario->apellido_materno = $request->input('apellido_materno');
        $usuario->sexo = $request->input('sexo');
        $usuario->email = $request->input('email');
        $usuario->save();
        return response(view('usuarios', ['usuarios' => Usuarios::all()]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuarios $usuarios, $id)
    {
        //
        $usuario = Usuarios::find($id);
        $usuario->delete();
        return response(view('usuarios', ['usuarios' => Usuarios::all()]));
    }
}
