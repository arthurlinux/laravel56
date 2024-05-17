@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">modulos</div>
                <div class="card-body">
                  <button type="button" class="btn btn-success"  data-mdb-ripple-init><a class="nav-link" href="{{ route('getmodulo') }}">{{ __('Agregar') }}</a></button>
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                          <tr>
                            <th>Nombre</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($modulos as $modulo)

                            <tr>
                                <td>{{ $modulo->modulo }}</td>
                                <td>
                                  <button
                                          type="button"
                                          class="btn btn-link btn-rounded btn-sm fw-bold"
                                          data-mdb-ripple-color="dark"
                                          >
                                          <a class="btn btn-primary" href="{{ route('editmodulo',$modulo->id) }}">Editar</a>
                                  </button>
                                  <button
                                  type="button"
                                  class="btn btn-link btn-rounded btn-sm fw-bold"
                                  data-mdb-ripple-color="dark"
                                  >
                                  <a class="btn btn-primary" href="{{ route('deletemodulo',$modulo->id) }}">Eliminar</a>
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