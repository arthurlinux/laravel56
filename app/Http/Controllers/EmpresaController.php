<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $empresas = Empresa::all();
        return view('empresas', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        // dd($request->all());
        $data = $request->all();
        $empresa = Empresa::create([
            'nombre' => $request->input('nombre'),
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono'),
            'email' => $request->input('email'),
            'ciudad' => $request->input('ciudad'),
            'municipio' => $request->input('municipio'),
        ]);

        // return view('empresas')->with('empresas', Empresa::all());
        return response(view('empresas', ['empresas' => Empresa::all()]));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // Empresa::create($request->all());
        return response(view('createempresa'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
        return view('empresas.show', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Empresa::find($id);
        return response(view('editempresa', ['empresa' => $empresa]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa, $id)
    {
        //
        $data = $request->all();
        $usuario = Empresa::find($id);
        $usuario->nombre = $request->input('nombre');
        $usuario->direccion = $request->input('direccion');
        $usuario->telefono = $request->input('telefono');
        $usuario->email = $request->input('email');
        $usuario->ciudad = $request->input('ciudad');
        $usuario->municipio = $request->input('municipio');
        $usuario->save();        
        return response(view('empresas', ['empresas' => Empresa::all()]));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa, $id)
    {
        //
        // $empresa->delete();
        $empresa = Empresa::find($id);
        $empresa->delete();
        return response(view('empresas', ['empresas' => Empresa::all()]));
    }
}
