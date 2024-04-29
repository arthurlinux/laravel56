<?php

namespace App\Http\Controllers;

use App\Modulo;
use Illuminate\Http\Request;

class ModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(view('modulos', ['modulos' => Modulo::all()]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $data = $request->all();
        $modulo = Modulo::create([
            'modulo' => $request->input('nombre'),
        ]);
        return response(view('modulos', ['modulos' => Modulo::all()]));

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
        return response(view('createmodulo'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function show(Modulo $modulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Modulo $modulo, $id)
    {
        //
        $modulo = Modulo::find($id);
        return response(view('editmodulo', ['modulo' => $modulo]));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modulo $modulo, $id)
    {
        //
        $data = $request->all();
        $modulo = Modulo::find($id);
        $modulo->modulo = $request->input('nombre');
        $modulo->save();
        return response(view('modulos', ['modulos' => Modulo::all()]));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modulo $modulo, $id)
    {
        //
        $modulo = Modulo::find($id);
        $modulo->delete();
        return response(view('modulos', ['modulos' => Modulo::all()]));
    }
}
