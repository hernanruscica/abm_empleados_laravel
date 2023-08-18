

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edicion</title>
    
    <!-- Agrega los enlaces de los CDNs de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    
    <!-- Otros estilos o enlaces que necesites -->
</head>
<body>
    <header>
        @include('includes._header')
    </header>    
    <div class="container mt-5">
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
        
        <!-- Agrega los scripts de Bootstrap al final del body -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

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
    <!-- Otros scripts o contenido que necesites -->
</body>
</html>


