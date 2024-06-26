@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Hola, {{ Auth::user()->name }}  ¡Estás conectado!
                    <p>
                      Email : {{ Auth::user()->email }}
                    </p>
                    <p>
                      Tipo : {{ Auth::user()->tipo }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
