<?php

namespace App\Http\Controllers;

use App\Tickets;
use Illuminate\Http\Request;
use App\Usuarios;
use App\Empresa;
use App\Modulo;
use App\User;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response(view('tickets', ['tickets' => Tickets::all()]));
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
        $ticket = Tickets::create([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'comentarios' => $request->input('comentarios'),
            'estado' => 'NUEVO',
            'prioridad' => 'BAJA',
        ]);
        return response(view('tickets', ['tickets' => Tickets::all()]));
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
        return response(view('createticket'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function show(Tickets $tickets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function edit(Tickets $tickets, $id)
    {
        //
        $prioridades = ['BAJA', 'MEDIA', 'ALTA'];
        $ticket = Tickets::find($id);
        $usuarios = User::where('tipo', 'Agente')->get();
        $empresas = Empresa::all();
        $modulos = Modulo::all();
        return response(view('editticket', ['ticket' => $ticket, 'user' => $usuarios, 'empresas' => $empresas, 'modulos' => $modulos, 'prioridades' => $prioridades]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tickets $tickets, $id)
    {
        //
        $data = $request->all();
        $ticket = Tickets::find($id);
        $ticket->update([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'comentarios' => $request->input('comentarios'),
            'estado' => $request->input('estado'),
            'prioridad' => $request->input('prioridad'),
            'user_id' => $request->input('usuario'),
            'modulo_id' => $request->input('modulo'),
            'admins_id' => $request->input('admins_id'),

        ]);
        return response(view('tickets', ['tickets' => Tickets::all()]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tickets $tickets, $id)
    {
        //
        $ticket = Tickets::find($id);
        $ticket->delete();
        return response(view('tickets', ['tickets' => Tickets::all()]));
    }
}
