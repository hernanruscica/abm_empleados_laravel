
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado</title>
    
    <!-- Agrega los enlaces de los CDNs de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    
    <!-- Otros estilos o enlaces que necesites -->
</head>
<body>
    <header>
        @include('includes._header')
    </header>
    <div class="container-fluid">
    <!-- Contenido de tu aplicación -->
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
    
    <!-- Agrega los scripts de Bootstrap al final del body -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    
    <!-- Otros scripts o contenido que necesites -->
</body>
</html>


