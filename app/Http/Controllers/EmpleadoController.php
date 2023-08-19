<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *GET del index 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        // Obtener todos los empleados de la base de datos
        $empleados = Empleado::all();

        // Pasar los empleados a la vista 'empleado.index' para mostrarlos
        return view('empleado.index', compact('empleados'));   
        //return view('empleado.index');
    }

    /**
     * Show the form for creating a new resource.
     *GET del formulario
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *POST del empleado
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $datosEmpleado = request()->except('_token');

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto'); // Obtener la instancia del archivo cargado
            
            $directorioDestino = 'uploads'; // Definir el nombre del directorio de destino
            $discoAlmacenamiento = 'public'; // Definir el disco de almacenamiento
        
            $rutaArchivoAlmacenado = $foto->store($directorioDestino, $discoAlmacenamiento);
            
            // Asignar la ruta del archivo almacenado a los datos del empleado
            $datosEmpleado['foto'] = $rutaArchivoAlmacenado;
        }else{
            $datosEmpleado['foto'] = '';
        }
        

        Empleado::insert($datosEmpleado);
        $empleadoId = Empleado::where('Correo', $datosEmpleado['correo'])->first()->id;
        return redirect('/empleado')->with('mensaje', 'Empleado agregado con exito!');
    }

    /**
     * Display the specified resource.
     * GET
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $empleado = Empleado::findOrFail($id); // Obtener el empleado por su ID
        return view('empleado.show', ['empleado' => $empleado]);  

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        //muestro el formu de edicion
        return view('empleado.edit', ['empleado' => $empleado]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $datosEmpleado = request()->except('_token', '_method');


    if ($request->hasFile('foto')) {
        $foto = $request->file('foto'); // Obtener la instancia del archivo cargado
        
        $directorioDestino = 'uploads'; // Definir el nombre del directorio de destino
        $discoAlmacenamiento = 'public'; // Definir el disco de almacenamiento
    
        $rutaArchivoAlmacenado = $foto->store($directorioDestino, $discoAlmacenamiento);
        
        // Asignar la ruta del archivo almacenado a los datos del empleado
        $datosEmpleado['foto'] = $rutaArchivoAlmacenado;
    }


    $empleado = Empleado::where('id', '=', $id);

        if (!$empleado) {
            return redirect('/empleado')->with('error', 'Empleado no encontrado.');
        }

        $empleado->update($datosEmpleado);

        return redirect('/empleado/'.$id)->with('mensaje', 'Empleado editado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Empleado::destroy($id);
        return redirect('empleado')->with('mensaje', 'Empleado borrado con exito!');
    }
}
