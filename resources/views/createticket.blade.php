@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nuevo ticket</div>
                    <div class="card-body">
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
                                    <input id="descripcion" type="text"
                                        class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}"
                                        name="descripcion" value="{{ old('descripcion') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('descripcion') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="comentarios"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Comentarios') }}</label>

                                <div class="col-md-6">
                                    <input id="comentarios" type="text"
                                        class="form-control{{ $errors->has('comentarios') ? ' is-invalid' : '' }}"
                                        name="comentarios" value="{{ old('comentarios') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('comentarios') }}</strong>
                                        </span>
                                    @endif
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
