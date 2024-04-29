@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar ticket</div>
|               <div class="card-body">
      <form method="POST" action="{{ route('updateticket', $ticket->id) }}">
        @csrf
        <div class="form-group">
          <label for="titulo">Título</label>
          <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $ticket->titulo }}">
          <label for="descripcion">Descripción</label>
          <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $ticket->descripcion }}">
          <label for="comentarios">Comentarios</label>
          <input type="text" class="form-control" id="comentarios" name="comentarios" value="{{ $ticket->comentarios }}">
          <label for="usuario">Prioridad</label>
          <select class="form-control" id="prioridad" name="prioridad">
            <option value="{{ $ticket->prioridad }}">{{ $ticket->prioridad }}</option>
            @foreach ($prioridades as $prioridad)
              <option value="{{ $prioridad }}">{{ $prioridad }}</option>
            @endforeach
          </select>
          <label for="usuario">Usuario</label>
          <select class="form-control" id="usuario" name="usuario">
            @foreach ($usuarios as $usuario)
              <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
            @endforeach
          </select>
          {{-- <label for="empresa">Empresa</label>
          <select class="form-control" id="empresa" name="empresa">
            @foreach ($empresas as $empresa)
              <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
            @endforeach
          </select> --}}
          <label for="modulo">Módulo</label>
          <select class="form-control" id="modulo" name="modulo">
            @foreach ($modulos as $modulo)
              <option value="{{ $modulo->id }}">{{ $modulo->modulo }}</option>
            @endforeach
          </select>

          </div>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
            </div>
        </div>
    </div>
</div>
@endsection