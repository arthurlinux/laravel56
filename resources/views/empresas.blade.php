@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Empresas</div>
                <div class="card-body">
                  <button type="button" class="btn btn-success"  data-mdb-ripple-init><a class="nav-link" href="{{ route('getempresa') }}">{{ __('Agregar') }}</a></button>
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                          <tr>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Ciudad</th>
                            <th>Municipio</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($empresas as $empresa)

                            <tr>
                                <td>{{ $empresa->nombre }}</td>
                                <td>{{ $empresa->direccion }}</td>
                                <td>{{ $empresa->telefono }}</td>
                                <td>{{ $empresa->email }}</td>
                                <td>{{ $empresa->ciudad }}</td>
                                <td>{{ $empresa->municipio }}</td>
                                <td>
                                  <button
                                          type="button"
                                          class="btn btn-link btn-rounded btn-sm fw-bold"
                                          data-mdb-ripple-color="dark"
                                          >
                                          <a class="btn btn-primary" href="{{ route('editempresa',$empresa->id) }}">Editar</a>
                                  </button>
                                  <button
                                  type="button"
                                  class="btn btn-link btn-rounded btn-sm fw-bold"
                                  data-mdb-ripple-color="dark"
                                  >
                                  <a class="btn btn-primary" href="{{ route('deleteempresa',$empresa->id) }}">Eliminar</a>
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