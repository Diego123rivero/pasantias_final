<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Log;

class ItemController extends Controller
{
    // Mostrar todos los items
    public function index()
    {
        $it = Item::all();
        return view('item', ['it' => $it]);
    }

    // Crear un nuevo item
    public function store(Request $request)
    {
        $item = new Item($request->all());
        $item->save();
        $id = $item->id;
        $this->generarQRManual($id);
        // Redirigir con mensaje de éxito
        return redirect()->route('item')->with('success', 'Item creado exitosamente.');
    }

    // Crear un nuevo item - vista
    public function create()
    {
        return view('item_crear');
    }

    // Mostrar los detalles de un item
    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('item_ver', ['item' => $item]);
    }

    // Eliminar un item
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('item')->with('success', 'Item eliminado exitosamente.');
    }

    // Editar un item
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('item_editar', ['item' => $item]);
    }

    // Actualizar un item
    public function update(Request $request, $id)
    {
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

        $item = Item::findOrFail($id);
        $item->update($validatedData);

        // Redirigir con mensaje de éxito
        return redirect()->route('item')->with('success', 'Item actualizado exitosamente.');
    }

    // Generar QR manualmente para un solo item
    public function generarQRManual($id)
    {
        $item = Item::findOrFail($id);

        // Generar el código QR
        $this->generarCodigoQR($item);

        // Redirigir con mensaje de éxito
        return redirect()->route('item')->with('success', "Código QR generado para el item: {$item->item}");
    }

    // Generar QR para todos los items
    public function generarTodosLosQR()
    {
        $items = Item::all();

        foreach ($items as $item) {
            $this->generarCodigoQR($item);
        }

        // Redirigir con mensaje de éxito
        return redirect()->route('item')->with('success', 'Códigos QR generados para todos los items.');
    }

    // Función privada para generar el código QR de un item
    private function generarCodigoQR($item)
    {
        $codigo = "item_" . ($item->codigo ?: $item->id); // Usar el código del item o el ID si no tiene código
        $qrCode = new QrCode($codigo);
        $qrCode->setSize(300); // Tamaño del código QR
        $qrCode->setMargin(10); // Márgenes del QR

        // Crear el escritor para generar el código QR en un archivo PNG
        $writer = new PngWriter();

        // Definir la ruta donde se guardará el archivo
        $filePath = public_path('qr_codes/qr_item_' . $item->id . '.png');

        // Loguear la ruta donde se generará el archivo para depurar
        Log::info("Generando QR en la ruta: " . $filePath);

        // Verificar si la carpeta existe, si no, crearla
        if (!file_exists(public_path('qr_codes'))) {
            mkdir(public_path('qr_codes'), 0777, true); // Crea la carpeta si no existe
        }

        // Usar el escritor para generar el contenido del archivo PNG
        $pngData = $writer->write($qrCode);  // Genera los datos del PNG

        // Guardar el contenido del PNG en el archivo
        file_put_contents($filePath, $pngData->getString()); // Escribe los datos en el archivo
    }
    // Mostrar la vista con el QR del item
public function mostrarQR($id)
{
    $item = Item::findOrFail($id);

    // Ruta del QR generado
    $qrPath = 'qr_codes/qr_item_' . $item->id . '.png';

    // Verificar si el archivo QR existe, si no, generarlo
    if (!file_exists(public_path($qrPath))) {
        // Generar el QR
        $this->generarCodigoQR($item);
    }

    // Retornar la vista con los datos del item y la ruta del QR
    return view('item.image', ['item' => $item, 'qrPath' => $qrPath]);
}
public function verQR($id)
{
    $item = Item::findOrFail($id);
    
    return view('item_ver_qr', compact('item'));
}
public function mostrarEtiquetas()
{
    // Recupera todos los productos, o puedes ajustar la lógica para recuperar solo ciertos productos
    $items = Item::all(); // Recuperar todos los ítems

    return view('item_plantilla', compact('items'));
}
}
