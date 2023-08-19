
  
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mt-5">
        <h1>Editar Empleado</h1>
        <form action="{{ url('/empleado/'.$empleado->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value= "{{ $empleado->Nombre }}" required>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido"  value= "{{ $empleado->Apellido }}" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" value= "{{ $empleado->Correo }}"  required>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>                
                <input type="file" class="form-control" id="foto" name="foto" value= "{{ $empleado->Foto }}"  >
                <img src=" {{ asset('storage').'/'.$empleado->Foto }}" alt="Foto de perfil" style="width:200px; height:auto;" id="vista_previa"/>
            </div>
            <button type="submit" class="btn btn-primary">Guardar edicion</button>
        </form>
        
    </div>
    <script>
        const inputFoto = document.getElementById('foto');
        const vistaPrevia = document.getElementById('vista_previa');

        inputFoto.addEventListener('change', function(event) {
            const archivo = event.target.files[0];
            console.log(archivo.name);
            
            if (archivo) {
                const reader = new FileReader();
                
                reader.addEventListener('load', function() {
                    vistaPrevia.src = reader.result;
                });

                reader.readAsDataURL(archivo);
            }                
        });
    </script>       
</div>
@endsection


