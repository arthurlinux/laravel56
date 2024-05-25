<?php

namespace App\Http\Controllers;

use App\Comentarios;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Empresa;
use App\Modulo;
use App\TiketsImg;

class ComentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * Tickets $tickets, $id
     */ 
    public function create()
    {
        // return view('createcomentario');
        // dd('createcomentario');
        return response(view('editticket'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function show(Comentarios $comentarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentarios $comentarios , $id)
    {
        $prioridades = ['BAJA', 'MEDIA', 'ALTA'];
        $status = ['NUEVO', 'AESPERA', 'ENPROG', 'PENDIENTE', 'CANCELADO', 'CERRADO'];
        // $ticket = Tickets::find($id);
        // $ticket = Tickets::join('users', 'tickets.cliente_id', '=', 'users.id')->where('tickets.id', $id)->get();
        $ticket = DB::table('tickets')
            ->join('users', 'tickets.cliente_id', '=', 'users.id')
            ->join('empresas', 'users.empresa_id', '=', 'empresas.id')
            ->select("users.*","tickets.id as ticketId", "tickets.created_at as fehca_ticket","tickets.*", "empresas.*")
            ->where('tickets.id', $id)
            ->get();
        // dd($ticket);
        $usuarios = User::where('tipo', 'Agente')->get();
        if (auth()->user()->tipo == 'Cliente') {
            $empresa = Empresa::join('users', 'empresas.id', '=', 'users.empresa_id')->where('users.id', auth()->user()->id)->get();
        } else {
            $empresa = Empresa::join('users', 'empresas.id', '=', 'users.empresa_id')->where('users.id', $ticket[0]->cliente_id)->get();
        }
        $agente = User::where('id', $ticket[0]->cliente_id)->get();
        if ($agente->isEmpty()) {
            $agente = 'No asignado';
        } else {
            $agente = $agente[0]->name;
        }
        $modulo = Modulo::where('id', $ticket[0]->modulo_id)->get();
        $images = TiketsImg::where('tiket_id', $id)->get();
        $comentarios = Comentarios::where('ticket_id', $id)->get();
        // dd($comentarios);
        return response(view('editcomentario', ['ticket' => $ticket, 'user' => $usuarios, 'empresa' => $empresa[0]->nombre, 'modulo' => $modulo, 'prioridades' => $prioridades, 'status' => $status, 'agente' => $agente, 'comentarios' => $comentarios], ['images' => $images]));
        // return response(view('editticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentarios $comentarios, $id)
    {
        $comentario = new Comentarios();
        $comentario->comentario = $request->comentario;
        $comentario->user_id = auth()->user()->id;
        $comentario->ticket_id = $id;
        $comentario->save();
        return redirect()->route('editcomentario', $id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentarios $comentarios)
    {
        //
    }
}
