@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Usuarios</div>
                <div class="card-body">
                  <button type="button" class="btn btn-success"  data-mdb-ripple-init><a class="nav-link" href="{{ route('getusuario') }}">{{ __('Agregar') }}</a></button>
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                          <tr>
                            <th>Nombre</th>
                            <th>Apellido paterno</th>
                            <th>Apellido materno</th>
                            <th>Sexo</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)

                            <tr>
                                <td>{{ $usuario->nombre }}</td>
                                <td>{{ $usuario->apellido_paterno }}</td>
                                <td>{{ $usuario->apellido_materno }}</td>
                                <td>{{ $usuario->sexo }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>
                                  <button
                                          type="button"
                                          class="btn btn-link btn-rounded btn-sm fw-bold"
                                          data-mdb-ripple-color="dark"
                                          >
                                          <a class="btn btn-primary" href="{{ route('editusuario',$usuario->id) }}">Editar</a>
                                  </button>
                                  <button
                                  type="button"
                                  class="btn btn-link btn-rounded btn-sm fw-bold"
                                  data-mdb-ripple-color="dark"
                                  >
                                  <a class="btn btn-primary" href="{{ route('deleteusuario',$usuario->id) }}">Eliminar</a>
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