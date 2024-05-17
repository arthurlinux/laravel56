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

                        <form method="POST" action="{{ route('updateticket', $ticket[0]->id) }}">
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
                                @if (Auth::user()->tipo === 'Admin')
                                    <label for="usuario">Asignar agente: </label>
                                    <select class="form-control" id="agente" name="agente">
                                        <option value=""></option>
                                        @foreach ($user as $agente)
                                            <option value="{{ $agente->id }}">{{ $agente->name }}</option>
                                        @endforeach
                                    </select>
                                @endif
                                @if (Auth::user()->tipo === 'Agente' || Auth::user()->tipo === 'Admin')
                                    <label for="usuario">Prioridad</label>
                                    <select class="form-control" id="prioridad" name="prioridad">
                                        <option value="{{ $ticket[0]->prioridad }}">{{ $ticket[0]->prioridad }}</option>
                                        @foreach ($prioridades as $prioridad)
                                            <option value="{{ $prioridad }}">{{ $prioridad }}</option>
                                        @endforeach
                                    </select>
                                    <label for="usuario">Estado</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="{{ $ticket[0]->status }}">{{ $ticket[0]->status }}</option>
                                        @foreach ($status as $estado)
                                            <option value="{{ $estado }}">{{ $estado }}</option>
                                        @endforeach
                                    </select>

                                    <label for="usuario">Solución: </label></br>
                                    <textarea class="form-control" name="solucion" id="solucion" rows="3">{{ $ticket[0]->solucion }}</textarea>
                                    </br>
                                    <button class="btn btn-secundary">
                                        <a class="nav-link" href="{{ route('tickets') }}">{{ __('Cancelar') }}</a>
                                    </button>
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                @endif
                                @if (Auth::user()->tipo === 'Cliente')
                                    <label for="usuario">Estado: {{ $ticket[0]->status }}</label></br>
                                    <label for="usuario">Solución: {{ $ticket[0]->solucion }}</label></br>
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
