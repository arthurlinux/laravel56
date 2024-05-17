@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Nuevo ticket</div>
                    <div class="card-body">
                        <div class="alert alert-info" role="alert">
                            <h4 class="alert-heading">¡Bienvenido!</h4>
                            <p>Por favor, complete el siguiente formulario para registrar un nuevo ticket.</p>
                            <hr>
                            <p class="mb-0">Si tiene alguna duda, por favor comuníquese con el administrador.</p>
                            <label for="dtos_personales">Datos Personales</label><br>
                            <label for="nombre">Nombre:
                                {{ Auth::user()->name }} {{ Auth::user()->apellido_paterno }} {{ Auth::user()->apellido_materno }} 
                            </label><br>
                            <label for="telefono">Teléfono:
                                {{ Auth::user()->telefono }}</label><br>
                            <label for="email">Correo:  {{ Auth::user()->email }}</label>
                        </div>
                        <form method="POST" action="{{ route('createticket') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="titulo"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Título') }}</label>

                                <div class="col-md-6">
                                    <input id="titulo" type="text"
                                        class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}" name="titulo"
                                        value="{{ old('titulo') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('titulo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="descripcion"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>

                                <div class="col-md-6">
                                    {{-- <input id="descripcion" type="text"
                                        class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}"
                                        name="descripcion" value="{{ old('descripcion') }}" required autofocus> --}}
                                    <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                                    @if ($errors->has('descripcion'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('descripcion') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="comentarios"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Sugerencia') }}</label>

                                <div class="col-md-6">
                                    {{-- <input id="comentarios" type="text"
                                        class="form-control{{ $errors->has('comentarios') ? ' is-invalid' : '' }}"
                                        name="comentarios" value="{{ old('comentarios') }}" required autofocus> --}}
                                    <textarea class="form-control" name="comentarios" id="comentarios" rows="3"></textarea>

                                    @if ($errors->has('comentarios'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('comentarios') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="modulo"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Módulo') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="modulo" name="modulo">
                                        @foreach ($modulos as $modulo)
                                            <option value="{{ $modulo->id }}">{{ $modulo->modulo }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="imagen"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Imagen') }}</label>
                                <input type="file" name="upload[]" id="imagen" class="form-control">
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button class="btn btn-secundary">
                                        <a class="nav-link" href="{{ route('tickets') }}">{{ __('Cancelar') }}</a>
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
