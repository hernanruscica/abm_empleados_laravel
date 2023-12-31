@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <a href="{{ route('empleado.index') }}">Listado de Empleados</a>
                    <a href="{{ url('canales') }}">Listado de Canales</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

