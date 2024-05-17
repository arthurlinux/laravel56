@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Editar ticket</div>
|               <div class="card-body">
      <form method="POST" action="{{ route('updateticket', $ticket->id) }}">
        @csrf
        <div class="form-group">
          <label for="titulo">Título:</label>
          <label for="titulo">{{ $ticket->titulo }}</label></br>
          {{-- <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $ticket->titulo }}"> --}}
          {{-- <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $ticket->titulo }}"> --}}
          <label for="descripcion">Descripción: {{ $ticket->descripcion }}</label></br>
          {{-- <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $ticket->descripcion }}"> --}}
          <label for="comentarios">Sugerencia: {{ $ticket->comentarios }}</label></br>
          {{-- <input type="text" class="form-control" id="comentarios" name="comentarios" value="{{ $ticket->comentarios }}"> --}}
          <label for="modulo">Módulo: {{ $modulo[0]->modulo }}</label></br>
          <label for="modulo">Empresa: {{ $empresa }}</label></br>
          <label for="modulo">Agente Asignado: {{ $agente }}</label></br>
            @if(Auth::user()->tipo === 'Admin')
            <label for="usuario">Asignar agente: </label>
            <select class="form-control" id="agente" name="agente">
              <option value=""></option>
              @foreach ($user as $agente)
                <option value="{{ $agente->id }}">{{ $agente->name }}</option>
              @endforeach
            </select>
            @endif
            @if(Auth::user()->tipo === 'Agente' || Auth::user()->tipo === 'Admin')
            <label for="usuario">Prioridad</label>
            <select class="form-control" id="prioridad" name="prioridad">
              <option value="{{ $ticket->prioridad }}">{{ $ticket->prioridad }}</option>
              @foreach ($prioridades as $prioridad)
                <option value="{{ $prioridad }}">{{ $prioridad }}</option>
              @endforeach
            </select>
            <label for="usuario">Estado</label>
            <select class="form-control" id="status" name="status">
              <option value="{{ $ticket->status }}">{{ $ticket->status }}</option>
              @foreach ($status as $estado)
                <option value="{{ $estado }}">{{ $estado }}</option>
              @endforeach
            </select>

            <label for="usuario">Solución: </label></br>
            <textarea class="form-control"  name="solucion" id="solucion" rows="3">{{ $ticket->solucion }}</textarea>
          </br>
          <button  class="btn btn-secundary">
            <a class="nav-link" href="{{ route('tickets') }}">{{ __('Cancelar') }}</a>
        </button>
            <button type="submit" class="btn btn-primary">Actualizar</button>
          @endif
          @if(Auth::user()->tipo === 'Cliente')
          <label for="usuario">Estado: {{ $ticket->status }}</label></br>
          <label for="usuario">Solución: {{ $ticket->solucion }}</label></br>
          <button  class="btn btn-secundary">
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