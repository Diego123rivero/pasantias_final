@extends('admin.layouts2.master')

@section('content')
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        width: 100%;
    }

    .section-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .section-header h1 {
        font-size: 2rem;
        color: #007bff;
        font-weight: 700;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        margin: 0;
    }

    label {
        font-weight: bold;
        margin-bottom: 8px;
        display: block;
    }

    input, select {
        width: 100%;
        padding: 12px;
        margin-bottom: 16px;
        border: 1px solid #ddd;
        border-radius: 6px;
        box-sizing: border-box;
        font-size: 1rem;
    }

    input:focus, select:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    button {
        background-color: #007bff;
        color: #fff;
        padding: 12px 20px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        width: 100%;
        font-size: 1rem;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #0056b3;
    }

    .image-preview {
        margin-top: 10px;
        text-align: center;
    }

    .image-preview img {
        max-width: 100%;
        max-height: 200px;
        object-fit: cover;
        border-radius: 8px;
    }
</style>

<section class="section">
    <div class="section-header">
        <h1>Editar Plantilla</h1>
    </div>
    <div class="row">
        <div class="container">
            <form action="{{ route('plantilla.update', $plantilla->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <!-- Campo para actividad -->
                <label for="actividad">Actividad:</label>
                <input type="text" id="actividad" name="actividad" value="{{ $plantilla->actividad }}" required>

                <!-- Campo para fecha -->
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" id="fecha" value="{{ $plantilla->fecha }}" required>

                <!-- Campo para imagen -->
                <label for="imagen">Imagen (opcional):</label>
                <input type="file" name="imagen" id="imagen" accept="image/*">

                <!-- Vista previa de la imagen actual -->
                @if($plantilla->imagen)
                    <div class="image-preview">
                        <p><strong>Imagen Actual:</strong></p>
                        <img src="{{ asset('storage/' . $plantilla->imagen) }}" alt="Imagen Actual">
                    </div>
                @endif

                <button type="submit">Actualizar</button>
            </form>
        </div>
    </div>
</section>

@endsection
