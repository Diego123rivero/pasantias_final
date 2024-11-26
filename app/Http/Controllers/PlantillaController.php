<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plantilla;
use Illuminate\Support\Facades\Storage;

class PlantillaController extends Controller
{
    public function index()
    {
        // Obtener todas las plantillas
        $pl = Plantilla::all();
        return view('plantilla', ['pl' => $pl]);
    }

    public function store(Request $request)
{
    // Validación de los datos del formulario
    $request->validate([
        'actividad' => 'required|string|max:255',
        'fecha' => 'required|date',
        'imagen' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validación para la imagen
    ]);

    // Crear una nueva instancia de la plantilla
    $plantilla = new Plantilla();
    $plantilla->actividad = $request->actividad;
    $plantilla->fecha = $request->fecha;

    // Si hay una imagen, guardarla
    if ($request->hasFile('imagen')) {
        // Guardar el archivo en el almacenamiento público y obtener la ruta
        $imagePath = $request->file('imagen')->store('plantillas', 'public'); // Guarda en 'storage/app/public/plantillas'
        $plantilla->imagen = $imagePath;
    }

    // Guardar la plantilla en la base de datos
    $plantilla->save();

    // Redirigir a la página principal con un mensaje de éxito
    return redirect()->route('plantilla');
}


    public function create()
    {
        // Mostrar la vista para crear una plantilla
        return view('plantilla_crear');
    }

    public function show($id)
    {
        // Mostrar los detalles de una plantilla
        $plantilla = Plantilla::findOrFail($id);
        return view('plantilla_ver', ['plantilla' => $plantilla]);
    }

    public function destroy($id)
    {
        // Eliminar una plantilla
        $plantilla = Plantilla::findOrFail($id);

        // Eliminar la imagen asociada si existe
        if ($plantilla->imagen) {
            Storage::disk('public')->delete($plantilla->imagen);
        }

        $plantilla->delete();

        return redirect()->route('plantilla');
    }

    public function edit($id)
    {
        // Mostrar la vista para editar una plantilla
        $plantilla = Plantilla::findOrFail($id);
        return view('plantilla_editar', ['plantilla' => $plantilla]);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'actividad' => 'required|string|max:255',
            'fecha' => 'required|date',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para imágenes
        ]);

        // Buscar la plantilla a editar
        $plantilla = Plantilla::findOrFail($id);
        $plantilla->actividad = $request->actividad;
        $plantilla->fecha = $request->fecha;

        // Manejar la subida de la nueva imagen si existe
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($plantilla->imagen) {
                Storage::disk('public')->delete($plantilla->imagen);
            }

            $path = $request->file('imagen')->store('plantillas', 'public');
            $plantilla->imagen = $path;
        }

        $plantilla->save();

        return redirect()->route('plantilla');
    }
}
