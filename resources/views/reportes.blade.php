@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <label for="exampleFormControlSelect1">Reporte</label>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
                        <link rel="stylesheet" type="text/css"
                            href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables.css">

                        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js">
                        </script>
                        <script type='text/javascript'></script>
                        {{-- <div id="clientes-table" class="clientes-table"></div> --}}
                        <div id="clientes-table" class="display1">
                            <table class="display">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Título</th>
                                        <th>Descripción</th>
                                        <th>Comentarios</th>
                                        <th>Solución</th>
                                        <th>Prioridad</th>
                                        <th>Status</th>
                                        <th>Nombre</th>
                                        <th>Empresa</th>
                                        <th>Fecha</th>
                                        {{-- <th>Acción</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <script>
                            // reporte();
                            // function reporte(){

                            // }
                            $(function($) {

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });

                                $('.display').DataTable({
                                    responsive: true,
                                    processing: true,
                                    serverSide: true,
                                    ajax: "{!! route('reporte') !!}",
                                    columns: [{
                                            data: 'ticketId',
                                            name: 'ticketId'
                                        },
                                        {
                                            data: 'titulo',
                                            name: 'titulo'
                                        },
                                        {
                                            data: 'descripcion',
                                            name: 'descripcion'
                                        },
                                        {
                                            data: 'comentarios',
                                            name: 'comentarios'
                                        },
                                        {
                                            data: 'solucion',
                                            name: 'solucion'
                                        },
                                        {
                                            data: 'prioridad',
                                            name: 'prioridad'
                                        },
                                        {
                                            data: 'status',
                                            name: 'status'
                                        },
                                        {
                                            data: 'name',
                                            name: 'name'
                                        },
                                        {
                                            data: 'nombre',
                                            name: 'nombre'
                                        },
                                        {
                                            data: 'fehca_ticket',
                                            name: 'fehca_ticket'
                                        },
                                        // {
                                        //     data: 'action',
                                        //     name: 'Action',
                                        //     orderable: false,
                                        //     searchable: false
                                        // }
                                    ],
                                    export: {
                                        enabled: true,
                                        buttons: ['pdf', 'excel', 'print']
                                    }
                                });
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
