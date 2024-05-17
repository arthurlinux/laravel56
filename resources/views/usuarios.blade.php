@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Usuarios</div>
                <div class="card-body">
                  <button type="button" class="btn btn-success"  data-mdb-ripple-init><a class="nav-link" href="{{ route('getusuario') }}">{{ __('Agregar') }}</a></button>
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                          <tr>
                            <th>Nombre</th>
                            {{-- <th>Apellido paterno</th>
                            <th>Apellido materno</th>
                            <th>Sexo</th> --}}
                            <th>Correo</th>
                            <th>Tipo</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $usuario)

                            <tr>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->tipo }}</td>
                                {{-- <td>{{ $usuario->sexo }}</td>
                                <td>{{ $usuario->email }}</td> --}}
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
                      {{-- <table>
                        <thead>
                          <tr>Nombre</tr>
                          <tr>Correo</tr>
                          <tr>Tipo</tr>
                        </thead>
                        <tbody>
                          @foreach($user as $users)
                          <tr>
                            <td>{{ $users->nombre }}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->tipo }}</td>
                          </tr>
                          @endforeach
                        <tr>
                          <td>
                            <button type="button" class="btn btn-success"  data-mdb-ripple-init><a class="nav-link" href="{{ route('home') }}">{{ __('Regresar') }}</a></button>
                          </td>
                        </tr>
                      </table> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection