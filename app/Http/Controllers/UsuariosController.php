<?php

namespace App\Http\Controllers;

use App\Usuarios;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $user = User::all();
        return response(view('usuarios', ['usuarios' => Usuarios::all()], ['user' => $user]));
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
        $usuario = User::create([
            'name' => $request->input('nombre'),
            'email' => $request->input('email'),
            // ...

            'tipo' => $request->input('tipo'),
            'password' => Hash::make($request->input('password')),
        ]);
        return response(view('usuarios', ['user' => User::all()]));
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
        $usuario = User::find($id);
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
        $usuario = User::find($id);
        $usuario->name = $request->input('nombre');
        $usuario->email = $request->input('email');
        $usuario->tipo = $request->input('tipo');
        if($request->input('password') != null){
            $usuario->password = Hash::make($request->input('password'));
        }
        // $usuario->password = Hash::make($request->input('password')); 
        $usuario->save();
        return response(view('usuarios', ['user' => User::all()]));
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
        $usuario = User::find($id);
        $usuario->delete();
        return response(view('usuarios', ['user' => User::all()]));
    }
}
