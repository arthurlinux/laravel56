@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Editar ticket</div>
                    <div class="card-body">

                        <div class="alert alert-info" role="alert">
                            <h4 class="alert-heading">¡Bienvenido!</h4>
                            <p>Por favor, complete el siguiente formulario para editar un ticket.</p>
                            <hr>
                            <p class="mb-0">Si tiene alguna duda, por favor comuníquese con el administrador.</p>
                            <label for="dtos_personales">Datos Personales</label><br>
                            <label for="nombre">Nombre:
                                {{ $ticket[0]->name }} {{ $ticket[0]->apellido_paterno }} {{ $ticket[0]->apellido_materno }}
                            </label><br>
                            <label for="telefono">Teléfono:
                                {{ $ticket[0]->telefono }}</label><br>
                            <label for="email">Correo: {{ $ticket[0]->email }}</label>
                        </div>

                        <form method="POST" action="{{ route('updatecomentario', $ticket[0]->ticketId) }}">
                            @csrf
                            <div class="form-group">
                                <h4><label for="id">ID:{{ $ticket[0]->ticketId }}</label></h4><br>
                                <label for="titulo">Título:</label>
                                <label for="titulo">{{ $ticket[0]->titulo }}</label></br>
                                <label for="descripcion">Descripción: {{ $ticket[0]->descripcion }}</label></br>
                              
                                <label for="comentarios">Sugerencia: {{ $ticket[0]->comentarios }}</label></br>
                                
                                <label for="modulo">Módulo: {{ $modulo[0]->modulo }}</label></br>
                                <label for="modulo">Empresa: {{ $empresa }}</label></br>
                                <label for="modulo">Agente Asignado: {{ $agente }}</label></br>
                                <label >Imagenes</label><br>
                                @foreach ($images as $image)
                                <a href="{{ asset('images/' . $image->nombre) }}" target="_blank">
                                    <img  class="full" src="{{ asset('images/' . $image->nombre) }}" alt="100px" width="100px">
                                </a>

                                @endforeach
                                <br>
                                <label>Comentarios</label><br>
                                <table class="table align-middle mb-0 bg-white">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>Comentario</th>
                                            <th>Fecha</th>
                                            {{-- <th>Usuario</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($comentarios as $comentario)
                                            <tr>
                                                <td>{{ $comentario->comentario }}</td>
                                                <td>{{ $comentario->created_at }}</td>
                                                {{-- <td>{{ $comentario->name }}</td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>

                                @if (Auth::user()->tipo === 'Agente' || Auth::user()->tipo === 'Admin')
                                <label for="comentario">Agregar comentario: </label></br>
                                <textarea class="form-control" name="comentario" id="comentario" rows="3"></textarea>
                                </br>
                                    <button class="btn btn-secundary">
                                        <a class="nav-link" href="{{ route('tickets') }}">{{ __('Cancelar') }}</a>
                                    </button>
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                @endif
                                @if (Auth::user()->tipo === 'Cliente')
                                    <button class="btn btn-secundary">
                                        <a class="nav-link" href="{{ route('tickets') }}">{{ __('Cancelar') }}</a>
                                    </button>
                                @endif
                                {{-- <label for="usuario">Agente: {{ $egente }} </label> --}}


                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
