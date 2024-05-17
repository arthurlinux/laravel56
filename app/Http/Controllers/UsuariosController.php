<?php

namespace App\Http\Controllers;

use App\Usuarios;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Empresa;
use Illuminate\Support\Facades\Validator;

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
        // return Validator::make($data, [
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:6|confirmed',
        // ]);
        $user = User::where('email', $request->input('email'))->first();
        if ($user != null) {
            return response(view('createusuario', ['error' => 'El correo ya existe'], ['empresas' => []]));
        }
        $usuario = User::create([
            'name' => $request->input('nombre'),
            'apellido_paterno' => $request->input('apellido_paterno'),
            'apellido_materno' => $request->input('apellido_materno'),
            'telefono' => $request->input('telefono'),
            'email' => $request->input('email'),
            // ...

            'tipo' => $request->input('tipo'),
            'empresa_id' => $request->input('empresa'),
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
        $empresas = Empresa::all();
        return response(view('createusuario', ['empresas' => $empresas], ['error' => '']));
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
        $empresas = Empresa::all();
        return response(view('editusuario', ['usuario' => $usuario], ['empresas' => $empresas]));
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
        $usuario->apellido_paterno = $request->input('apellido_paterno');
        $usuario->apellido_materno = $request->input('apellido_materno');
        $usuario->telefono = $request->input('telefono');
        $usuario->email = $request->input('email');
        $usuario->tipo = $request->input('tipo');
        if ($request->input('password') != null) {
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
