

@extends('layouts.app')

@section('content')
<div class="container">    
    <h1>Listado de empleados</h1>
    @if (Session::has('mensaje'))
        {{ Session::get('mensaje') }}
    @endif
    <table class="table table-light">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>            
                <th>Acciones</th> 
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
                <tr>
                    <td>
                        <img src=" {{ asset('storage').'/'.$empleado->Foto }}" 
                                alt="Foto de perfil"
                                style="width:200px; height:auto;">
                    </td>
                    <td>{{ $empleado->Nombre }}</td>
                    <td>{{ $empleado->Apellido }}</td>
                    <td>{{ $empleado->Correo }}</td>
                    
                    <td class="row">
                        <div class="col">
                            <form action="{{ url('/empleado/'.$empleado->id) }}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" onclick="return confirm('Confirma el borrado?')" value="Borrar">
                            </form>
                        </div>
                        <div class="col">
                            <a href=" {{ url('/empleado/'.$empleado->id).'/edit' }} ">Editar</a>
                        </div>
                        <div class="col">
                            <a href=" {{ url('/empleado/'.$empleado->id) }} ">Ver</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
    

