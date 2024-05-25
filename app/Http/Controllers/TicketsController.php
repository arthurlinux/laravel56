<?php

namespace App\Http\Controllers;

use App\Tickets;
use Illuminate\Http\Request;
use App\Usuarios;
use App\Empresa;
use App\Modulo;
use App\User;
use App\TiketsImg;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


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
        if (auth()->user()->tipo == 'Cliente') {
            $tickets = DB::table('tickets')
            ->join('users', 'tickets.cliente_id', '=', 'users.id')
            ->join('empresas', 'users.empresa_id', '=', 'empresas.id')
            ->select("users.*","tickets.id as ticketId", "tickets.created_at as fehca_ticket","tickets.*", "empresas.*")
            ->where('cliente_id', auth()->user()->id)
            ->get();
            return response(view('tickets', ['tickets' => $tickets]));
            // return response(view('tickets', ['tickets' => Tickets::where('cliente_id', auth()->user()->id)->get()]));
        }
        if (auth()->user()->tipo == 'Admin') {
            // $tickets = Tickets::select("users.*","tickets.id as ticketId", "tickets.created_at as fehca_ticket","tickets.*")->join('users', 'tickets.cliente_id', '=', 'users.id')->get();
            // dd($tickets);
            $tickets = DB::table('tickets')
           ->join('users', 'tickets.cliente_id', '=', 'users.id')
           ->join('empresas', 'users.empresa_id', '=', 'empresas.id')
           ->select("users.*","tickets.id as ticketId", "tickets.created_at as fehca_ticket","tickets.*", "empresas.*")
           ->get();
        //    dd($query);
            return response(view('tickets', ['tickets' => $tickets]));
            // return response(view('tickets', ['tickets' => Tickets::all()]));
        }
        if (auth()->user()->tipo == 'Agente') {
            // return response(view('tickets', ['tickets' => Tickets::where('agente_id', auth()->user()->id)->get()]));
            $tickets = DB::table('tickets')
            ->join('users', 'tickets.cliente_id', '=', 'users.id')
            ->join('empresas', 'users.empresa_id', '=', 'empresas.id')
            ->select("users.*","tickets.id as ticketId", "tickets.created_at as fehca_ticket","tickets.*", "empresas.*")
            ->where('agente_id', auth()->user()->id)
            ->get();
            return response(view('tickets', ['tickets' => $tickets]));
        }
        // return response(view('tickets', ['tickets' => Tickets::all()]));
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
        // dd($data);
        $ticket = Tickets::create([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'comentarios' => $request->input('comentarios'),
            'cliente_id' => auth()->user()->id,
            'modulo_id' => $request->input('modulo'),
            'estado' => 'NUEVO',
            'prioridad' => 'BAJA',
        ]);
        $files = $request->file('upload');
        // dd($files);
        if ($files) {
            foreach ($files as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/images/', $name);
                // $data[] = $name;
                // dd($ticket->id);
                $mages = TiketsImg::create([
                    'tiket_id' => $ticket->id,
                    'nombre' => $name,
                ]);
            }
        }
        if (auth()->user()->tipo == 'Cliente') {
            // return response(view('tickets', ['tickets' => Tickets::where('cliente_id', auth()->user()->id)->get()]));
            $tickets = DB::table('tickets')
            ->join('users', 'tickets.cliente_id', '=', 'users.id')
            ->join('empresas', 'users.empresa_id', '=', 'empresas.id')
            ->select("users.*","tickets.id as ticketId", "tickets.created_at as fehca_ticket","tickets.*", "empresas.*")
            ->where('cliente_id', auth()->user()->id)
            ->get();
            return response(view('tickets', ['tickets' => $tickets]));
        }
        if (auth()->user()->tipo == 'Admin') {
            // return response(view('tickets', ['tickets' => Tickets::all()]));
            $tickets = DB::table('tickets')
            ->join('users', 'tickets.cliente_id', '=', 'users.id')
            ->join('empresas', 'users.empresa_id', '=', 'empresas.id')
            ->select("users.*","tickets.id as ticketId", "tickets.created_at as fehca_ticket","tickets.*", "empresas.*")
            ->get();
            return response(view('tickets', ['tickets' => $tickets]));
        }
        if (auth()->user()->tipo == 'Agente') {
            // return response(view('tickets', ['tickets' => Tickets::where('agente_id', auth()->user()->id)->get()]));
            $tickets = DB::table('tickets')
            ->join('users', 'tickets.cliente_id', '=', 'users.id')
            ->join('empresas', 'users.empresa_id', '=', 'empresas.id')
            ->select("users.*","tickets.id as ticketId", "tickets.created_at as fehca_ticket","tickets.*", "empresas.*")
            ->where('agente_id', auth()->user()->id)
            ->get();
            return response(view('tickets', ['tickets' => $tickets]));
        }
        // return response(view('tickets', ['tickets' => Tickets::all()]));
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
        $modulos = Modulo::all();
        return response(view('createticket', ['modulos' => $modulos]));
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
        $agente = User::where('id', $ticket[0]->agente_id)->get();
        if ($agente->isEmpty()) {
            $agente = 'No asignado';
        } else {
            $agente = $agente[0]->name;
        }
        $modulo = Modulo::where('id', $ticket[0]->modulo_id)->get();
        $images = TiketsImg::where('tiket_id', $id)->get();
        return response(view('editticket', ['ticket' => $ticket, 'user' => $usuarios, 'empresa' => $empresa[0]->nombre, 'modulo' => $modulo, 'prioridades' => $prioridades, 'status' => $status, 'agente' => $agente], ['images' => $images]));
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
        if (auth()->user()->tipo == 'Admin') {
            $ticket->update([
                'solucion' => $request->input('solucion'),
                'prioridad' => $request->input('prioridad'),
                'status' => $request->input('status'),
                'agente_id' => $request->input('agente'),

            ]);
        }
        if (auth()->user()->tipo == 'Agente') {
            $ticket->update([
                'solucion' => $request->input('solucion'),
                'prioridad' => $request->input('prioridad'),
                'status' => $request->input('status'),
            ]);
        }
         
        if (auth()->user()->tipo == 'Cliente') {
            $tickets = DB::table('tickets')
            ->join('users', 'tickets.cliente_id', '=', 'users.id')
            ->join('empresas', 'users.empresa_id', '=', 'empresas.id')
            ->select("users.*","tickets.id as ticketId", "tickets.created_at as fehca_ticket","tickets.*", "empresas.*")
            ->where('cliente_id', auth()->user()->id)
            ->get();
            return response(view('tickets', ['tickets' => $tickets]));
            // return response(view('tickets', ['tickets' => Tickets::where('cliente_id', auth()->user()->id)->get()]));
        }
        if (auth()->user()->tipo == 'Admin') {
            $tickets = DB::table('tickets')
            ->join('users', 'tickets.cliente_id', '=', 'users.id')
            ->join('empresas', 'users.empresa_id', '=', 'empresas.id')
            ->select("users.*","tickets.id as ticketId", "tickets.created_at as fehca_ticket","tickets.*", "empresas.*")
            ->get();
         //    dd($query);
             return response(view('tickets', ['tickets' => $tickets]));
            // return response(view('tickets', ['tickets' => Tickets::all()]));
        }
        if (auth()->user()->tipo == 'Agente') {
            // dd(auth()->user()->id);  
            // return response(view('tickets', ['tickets' => Tickets::where('agente_id', auth()->user()->id)->get()]));
            $tickets = DB::table('tickets')
            ->join('users', 'tickets.cliente_id', '=', 'users.id')
            ->join('empresas', 'users.empresa_id', '=', 'empresas.id')
            ->select("users.*","tickets.id as ticketId", "tickets.created_at as fehca_ticket","tickets.*", "empresas.*")
            ->where('agente_id', auth()->user()->id)
            ->get();
            return response(view('tickets', ['tickets' => $tickets]));
        }
        // return response(view('tickets', ['tickets' => Tickets::all()]));
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
        if (auth()->user()->tipo == 'Cliente') {
            $tickets = DB::table('tickets')
            ->join('users', 'tickets.cliente_id', '=', 'users.id')
            ->join('empresas', 'users.empresa_id', '=', 'empresas.id')
            ->select("users.*","tickets.id as ticketId", "tickets.created_at as fehca_ticket","tickets.*", "empresas.*")
            ->where('cliente_id', auth()->user()->id)
            ->get();
            return response(view('tickets', ['tickets' => $tickets]));
            // return response(view('tickets', ['tickets' => Tickets::where('cliente_id', auth()->user()->id)->get()]));
        }
        if (auth()->user()->tipo == 'Admin') {
            // $tickets = Tickets::select("users.*","tickets.id as ticketId", "tickets.created_at as fehca_ticket","tickets.*")->join('users', 'tickets.cliente_id', '=', 'users.id')->get();
            // dd($tickets);
            $tickets = DB::table('tickets')
           ->join('users', 'tickets.cliente_id', '=', 'users.id')
           ->join('empresas', 'users.empresa_id', '=', 'empresas.id')
           ->select("users.*","tickets.id as ticketId", "tickets.created_at as fehca_ticket","tickets.*", "empresas.*")
           ->get();
        //    dd($query);
            return response(view('tickets', ['tickets' => $tickets]));
            // return response(view('tickets', ['tickets' => Tickets::all()]));
        }
        if (auth()->user()->tipo == 'Agente') {
            // return response(view('tickets', ['tickets' => Tickets::where('agente_id', auth()->user()->id)->get()]));
            $tickets = DB::table('tickets')
            ->join('users', 'tickets.cliente_id', '=', 'users.id')
            ->join('empresas', 'users.empresa_id', '=', 'empresas.id')
            ->select("users.*","tickets.id as ticketId", "tickets.created_at as fehca_ticket","tickets.*", "empresas.*")
            ->where('agente_id', auth()->user()->id)
            ->get();
            return response(view('tickets', ['tickets' => $tickets]));
        }
        // return response(view('tickets', ['tickets' => Tickets::all()]));
    }
}
