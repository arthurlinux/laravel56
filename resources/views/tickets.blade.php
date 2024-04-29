@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">tickets</div>
                <div class="card-body">
                  <button type="button" class="btn btn-success"  data-mdb-ripple-init><a class="nav-link" href="{{ route('getticket') }}">{{ __('Agregar') }}</a></button>
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                          <tr>
                            <th>Título</th>
                            <th>Prioridad</th>
                            <th>Descripción</th>
                            <th>Comentarios</th>
                            <th>Estado</th>
                            <th>Fecha</th>

                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($tickets as $ticket)

                            <tr>
                                <td>{{ $ticket->titulo }}</td>
                                <td>{{ $ticket->prioridad }}</td>
                                <td>{{ $ticket->descripcion }}</td>
                                <td>{{ $ticket->comentarios }}</td>
                                <td>{{ $ticket->status }}</td>
                                <td>{{ $ticket->created_at }}</td>
                                <td>
                                  <button
                                          type="button"
                                          class="btn btn-link btn-rounded btn-sm fw-bold"
                                          data-mdb-ripple-color="dark"
                                          >
                                          <a class="btn btn-primary" href="{{ route('editticket',$ticket->id) }}">Editar</a>
                                  </button>
                                  <button
                                  type="button"
                                  class="btn btn-link btn-rounded btn-sm fw-bold"
                                  data-mdb-ripple-color="dark"
                                  >
                                  <a class="btn btn-primary" href="{{ route('deleteticket',$ticket->id) }}">Eliminar</a>
                          </button>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection