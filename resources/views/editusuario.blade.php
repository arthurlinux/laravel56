@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Usuarios</div>
|               <div class="card-body">
      <form method="POST" action="{{ route('updateusuario', $usuario->id) }}">
        @csrf
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $usuario->nombre }}">
          <label for="apellido_paterno">Apellido paterno</label>
          <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" value="{{ $usuario->apellido_paterno }}">
          <label for="apellido_materno">Apellido materno</label>
          <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" value="{{ $usuario->apellido_materno }}">
          <label for="sexo">Sexo</label>
          <input type="text" class="form-control" id="sexo" name="sexo" value="{{ $usuario->sexo }}">
          <label for="email">Correo</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ $usuario->email }}">
          </div>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
            </div>
        </div>
    </div>
</div>
@endsection