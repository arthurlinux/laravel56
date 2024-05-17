@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Editar empresa</div>
|               <div class="card-body">
      <form method="POST" action="{{ route('updateempresa', $empresa->id) }}">
        @csrf
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $empresa->nombre }}">
          <label for="direccion">Dirección</label>
          <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $empresa->direccion }}">
          <label for="telefono">Teléfono</label>
          <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $empresa->telefono }}">
          <label for="ciudad">Ciudad</label>
          <input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ $empresa->ciudad }}">
          <label for="municipio">Municipio</label>
          <input type="text" class="form-control" id="municipio" name="municipio" value="{{ $empresa->municipio }}">
          <label for="email">Correo</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ $empresa->email }}">
          </div>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
            </div>
        </div>
    </div>
</div>
@endsection