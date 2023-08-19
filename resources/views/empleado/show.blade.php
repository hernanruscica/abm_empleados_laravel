
@extends('layouts.app')

@section('content')
<div class="container">
    <!-- resources/views/empleados/show.blade.php -->
    <h1 class="display-5 ">Detalles del Empleado</h1>

    @if (Session::has('mensaje'))
        {{ Session::get('mensaje') }}
    @endif

    <div class="mt-5">
        <img src=" {{ asset('storage').'/'.$empleado->Foto }}" alt="Foto de perfil" style="width:200px; height:auto;">
        
        <p>Nombre: {{ $empleado->Nombre }}</p>
        <p>Apellido: {{ $empleado->Apellido }}</p>
        <p>Correo: {{ $empleado->Correo }}</p>
        <p>Foto: {{ $empleado->Foto }}</p>
        <!-- Agrega más detalles según sea necesario -->
    </div>
</div>
@endsection
  


