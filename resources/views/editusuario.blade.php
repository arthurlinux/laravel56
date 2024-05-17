@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Usuarios</div>
|               <div class="card-body">
      <form method="POST" action="{{ route('updateusuario', $usuario->id) }}">
        @csrf
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $usuario->name }}">
          <label for="apellido_paterno">Apellido Paterno</label>
          <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" value="{{ $usuario->apellido_paterno }}">
          <label for="apellido_materno">Apellido Materno</label>
          <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" value="{{ $usuario->apellido_materno }}">
          <label for="telefono">Teléfono</label>
          <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $usuario->telefono }}">
          <label for="email">Correo</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ $usuario->email }}">
            <label for="tipo">Tipo</label>
            <select class="form-control" id="tipo" name="tipo">
              <option value="Admin" {{ $usuario->tipo == 'Admin' ? 'selected' : '' }}>Admin</option>
              <option value="Agente" {{ $usuario->tipo == 'Agente' ? 'selected' : '' }}>Agente</option>
              <option value="Cliente" {{ $usuario->tipo == 'Cliente' ? 'selected' : '' }}>Cliente</option>
            </select>
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <button  class="btn btn-secundary">
            <a class="nav-link" href="{{ route('usuarios') }}">{{ __('Cancelar') }}</a>
        </button>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
            </div>
        </div>
    </div>
</div>
@endsection