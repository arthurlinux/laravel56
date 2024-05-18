<?php

namespace App\Http\Controllers;

use App\Reportes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View // Modify the return type
     */
    public function index()
    {

        $tickets = DB::table('tickets')
        ->join('users', 'tickets.admins_id', '=', 'users.id')
        ->join('empresas', 'users.empresa_id', '=', 'empresas.id')
        ->leftJoin('users as de', 'de.id', '=', 'tickets.user_id')
        ->select("users.name as nombreCliente","tickets.id as ticketId", "tickets.created_at as fehca_ticket","tickets.*", "empresas.nombre as empresa" , "de.name as agente")
        ->get();
        // dd($tickets);
        return view('reportes');
             
    }
    public function reporte()
    {
        //
        $tickets = DB::table('tickets')
        ->join('users', 'tickets.admins_id', '=', 'users.id')
        ->join('empresas', 'users.empresa_id', '=', 'empresas.id')
        ->leftJoin('users as de', 'de.id', '=', 'tickets.user_id')
        ->select("users.name as nombreCliente","tickets.id as ticketId", "tickets.created_at as fehca_ticket","tickets.*", "empresas.nombre as empresa" , "de.name as agente")
        ->get();
        // dd($tickets);
        // return view('reportes', ['tickets' => $tickets]);

        return DataTables::make($tickets)
            ->addColumn('action', function($tickets){
                $button = '<button type="button" name="edit" 
                id="'.$tickets->id.'" class="edit btn btn-primary btn- 
                sm">Edit</button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" 
                id="'.$tickets->id.'" class="delete btn btn-danger btn- 
                sm">Delete</button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->toJson();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reportes  $reportes
     * @return \Illuminate\Http\Response
     */
    public function show(Reportes $reportes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reportes  $reportes
     * @return \Illuminate\Http\Response
     */
    public function edit(Reportes $reportes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reportes  $reportes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reportes $reportes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reportes  $reportes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reportes $reportes)
    {
        //
    }
}
