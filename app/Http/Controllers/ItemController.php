<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use ZipArchive;

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
        return redirect()->route('item');
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
        return redirect()->route('item');
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
        return redirect()->route('item');
    }

    // Generar QR manualmente para un solo item
    public function generarQRManual($id)
    {
        $item = Item::findOrFail($id);

        // Generar el código QR
        $this->generarCodigoQR($item);

        // Redirigir con mensaje de éxito
        return redirect()->route('item');
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
public function descargarTodasLasEtiquetas()
{
    // Recuperar todos los productos
    $items = Item::all();
    
    // Ruta temporal para almacenar las imágenes de las etiquetas
    $tempDir = storage_path('app/etiquetas_temp/');
    
    // Crear el directorio temporal si no existe
    if (!File::exists($tempDir)) {
        File::makeDirectory($tempDir, 0777, true);
    }

    // Crear un archivo ZIP
    $zip = new ZipArchive;
    $zipFile = storage_path('app/etiquetas.zip'); // Ruta donde se almacenará el archivo ZIP

    if ($zip->open($zipFile, ZipArchive::CREATE) === TRUE) {
        // Recorrer todos los ítems
        foreach ($items as $item) {
            // Generar la imagen de la etiqueta (con QR y los datos)
            $this->generarEtiquetaImagen($item, $tempDir);

            // Agregar la imagen al archivo ZIP
            $zip->addFile($tempDir . 'etiqueta_' . $item->id . '.png', 'etiqueta_' . $item->id . '.png');
        }
        $zip->close();
    }

    // Eliminar los archivos temporales después de crear el ZIP
    File::deleteDirectory($tempDir);

    // Devolver el archivo ZIP para descarga
    return response()->download($zipFile)->deleteFileAfterSend(true);
}
private function generarEtiquetaImagen($item, $tempDir)
{
    // Ruta donde se guardará la imagen de la etiqueta
    $filePath = rtrim($tempDir, '/') . '/etiqueta_' . $item->id . '.png';  // Asegúrate de que $tempDir termine con un '/'

    // Crear la imagen de la etiqueta (puedes usar alguna librería para generar imágenes como GD, ImageIntervention, etc)
    // Para este ejemplo usaremos la biblioteca GD para dibujar texto e insertar el QR

    // Crear una imagen de tamaño 400x300 px (puedes ajustarlo según tus necesidades)
    $image = imagecreatetruecolor(400, 300);

    // Colores para la imagen
    $backgroundColor = imagecolorallocate($image, 255, 255, 255); // Blanco
    $textColor = imagecolorallocate($image, 0, 0, 0); // Negro

    // Rellenar la imagen con el color de fondo
    imagefill($image, 0, 0, $backgroundColor);

    // Agregar texto (Categoría y Ubicación) usando la función imagestring() que usa fuentes predeterminadas
    imagestring($image, 5, 20, 20, "Categoria: " . $item->categoria, $textColor);  // Tamaño de fuente 5
    imagestring($image, 5, 20, 60, "Ubicacion: " . $item->ubicacion, $textColor);  // Tamaño de fuente 5
    imagestring($image, 5, 20, 100, "Nombre: " . $item->item, $textColor);  // Tamaño de fuente 5


    // Insertar el QR generado previamente (asumimos que el QR ya está en el directorio public/qr_codes)
    $qrImagePath = public_path('qr_codes/qr_item_' . $item->id . '.png');
    
    // Verificar si la imagen QR existe antes de cargarla
    if (!file_exists($qrImagePath)) {
        // Si no existe, abortar con error
        throw new Exception("QR no encontrado en la ruta: " . $qrImagePath);
    }

    // Cargar la imagen del QR
    $qrImage = imagecreatefrompng($qrImagePath);

    $qrWidth = 100; // El ancho del QR
    $qrHeight = 100; 
    // Copiar el QR a la etiqueta (Ajusta la posición y el tamaño según sea necesario)
    imagecopyresized($image, $qrImage, 150, 180, 0, 0, $qrWidth, $qrHeight, imagesx($qrImage), imagesy($qrImage)); // Ajusta la posición y tamaño del QR

    // Guardar la imagen generada como archivo PNG
    imagepng($image, $filePath);

    // Liberar memoria
    imagedestroy($image);
    imagedestroy($qrImage);
}
}
