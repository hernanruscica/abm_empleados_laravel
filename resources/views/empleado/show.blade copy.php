
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver</title>
    
    <!-- Agrega los enlaces de los CDNs de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    
    <!-- Otros estilos o enlaces que necesites -->
</head>
<body>


    <header>
        @include('includes._header')
    </header>
    <!-- resources/views/empleados/show.blade.php -->
    <h1 class="display-5 ">Detalles del Empleado</h1>

    @if (Session::has('mensaje'))
        {{ Session::get('mensaje') }}
    @endif

    <div class="container mt-5">
        <img src=" {{ asset('storage').'/'.$empleado->Foto }}" alt="Foto de perfil" style="width:200px; height:auto;">
        
        <p>Nombre: {{ $empleado->Nombre }}</p>
        <p>Apellido: {{ $empleado->Apellido }}</p>
        <p>Correo: {{ $empleado->Correo }}</p>
        <p>Foto: {{ $empleado->Foto }}</p>
        <!-- Agrega más detalles según sea necesario -->
    </div>

    
    <!-- Agrega los scripts de Bootstrap al final del body -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    
    <!-- Otros scripts o contenido que necesites -->
</body>
</html>


