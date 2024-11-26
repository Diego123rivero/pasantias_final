<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Storage;


    class ItemController extends Controller
    {
        public function index()
        {
            // Obtener todas las categorías
            $it = Item::all();
            return view('item', ['it' => $it]);
        }

        public function store(Request $request)
        {
            // Crear una nueva categoría con los datos del formulario
            $item = new Item($request->all());
            $item->save();

            // Obtener todas las categorías después de agregar la nueva
            $it = Item::all();
            return view('item', ['it' => $it]);
        }

        public function create()
        {
            // Mostrar la vista para crear una categoría
            return view('item_crear');
        }

        public function show($id)
        {
            // Mostrar los detalles de una categoría
            $item = Item::findOrFail($id);
            return view('item_ver', ['item' => $item]);
        }

        public function destroy($id)
        {
            // Eliminar una categoría
            $item = Item::findOrFail($id);
            $item->delete();

            // Obtener todas las categorías después de la eliminación
            $it = Item::all();
            return view('item', ['it' => $it]);
        }

        public function edit($id)
        {
            // Mostrar la vista para editar una categoría
            $item = Item::findOrFail($id);
            return view('item_editar', ['item' => $item]);
        }

        public function update(Request $request, $id)
{
    // Validar los datos del formulario
    $validatedData = $request->validate([
        'categoria' => 'required|string|max:255',
        'subcategoria' => 'required|string|max:255',
        'item' => 'required|string|max:255',
        'marca' => 'nullable|string|max:255',
        'modelo' => 'nullable|string|max:255',
        'serie' => 'nullable|string|max:255',
        'color' => 'nullable|string|max:255',
        'estado' => 'required|string|max:255',
        'ubicacion' => 'required|string|max:255',
        'codigo' => 'nullable|string|max:255',
    ]);

    // Buscar el item a editar
    $item = Item::findOrFail($id);

    // Actualizar los campos del item con los datos del formulario validados
    $item->update($validatedData);

    // Obtener todos los items después de actualizar
    $it = Item::all();
    return view('item', ['it' => $it]);
}




    }