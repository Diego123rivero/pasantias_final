@extends('admin.layouts2.master')

@section('content')
<style>
    .section {
        padding-top: 80px; /* Espacio para evitar superposición con el navbar */
        padding-bottom: 20px;
    }

    .container {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 900px;
        margin: 0 auto;
        display: flex; /* Usamos flexbox para alinear campos e imagen */
        gap: 20px;
        align-items: flex-start; /* Alineamos los elementos al principio */
    }

    .form-container {
        flex: 1; /* Campos ocupan la izquierda */
    }

    .image-container {
        flex: 1; /* Imagen ocupa la derecha */
        text-align: center;
        display: flex;
        justify-content: center; /* Alineamos la imagen al centro de su contenedor */
        align-items: flex-start; /* Alineamos la imagen hacia la parte superior */
    }

    .section-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .section-header h1 {
        font-size: 1.8rem;
        color: #007bff;
        font-weight: 700;
    }

    .form-label {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .input-group {
        position: relative;
        margin-bottom: 20px;
    }

    .input-group .fa-icon {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        color: #6c757d;
        font-size: 1.2rem;
    }

    .form-control {
        padding-left: 40px; /* Espacio para el ícono */
        border-radius: 8px;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        font-weight: 600;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004080;
    }

    .image-preview {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        max-height: 400px;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }

    .image-preview img {
        max-width: 100%;
        max-height: 100%;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    }
</style>

<section class="section">
    <div class="section-header">
        <h1><i class="fas fa-plus-circle"></i> Agregar Plantilla</h1>
    </div>
    <div class="container">
        <!-- Formulario en el lado izquierdo -->
        <div class="form-container">
            <form action="{{ route('plantilla.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Campo de Actividad -->
                <div class="input-group">
                    <i class="fas fa-tasks fa-icon"></i>
                    <input type="text" name="actividad" class="form-control" placeholder="Ingrese la actividad" required>
                    
                </div>

                <!-- Campo de Fecha -->
                <div class="input-group">
                    <i class="fas fa-calendar-alt fa-icon"></i>
                    <input type="date" name="fecha" class="form-control" required>
                    
                </div>

                <!-- Campo de Plantilla -->
                <div class="input-group">
                    <i class="fas fa-file-image fa-icon"></i>
                    <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*" onchange="previewImage(event)">
                    
                </div>

                <!-- Botón de Guardar -->
                <button type="submit" class="btn btn-primary btn-block mt-4"><i class="fas fa-save"></i> Guardar</button>
            </form>
        </div>

        <!-- Contenedor de Imagen en el lado derecho -->
        <div class="image-container">
            <div class="image-preview">
                <img id="imagenPreview" src="#" alt="Vista previa de la imagen" style="display: none;">
            </div>
        </div>
    </div>
</section>

<!-- Scripts -->
<script>
    // Función para previsualizar la imagen seleccionada
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('imagenPreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
