@extends('admin.layouts2.master')

@section('content')
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .section {
        margin-top: 60px; /* Espacio debajo del navbar */
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: flex-start; /* Asegura que el contenido esté alineado al principio */
        padding: 30px;
    }

    .container {
        background-color: #fff;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 80%; /* Ajustar el ancho del formulario al área establecida */
        max-width: 1200px;
    }

    .section-header {
        text-align: center;
        margin-bottom: 30px;
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
        color: #333;
    }

    input, select {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        box-sizing: border-box;
        font-size: 1rem;
        transition: border-color 0.3s;
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
        font-size: 1.1rem;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #0056b3;
    }

    .form-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px; /* Espaciado entre los elementos */
        justify-content: space-between;
    }

    .form-group {
        flex: 1 1 calc(33.333% - 20px); /* Tres columnas con espacio entre ellas */
        max-width: calc(33.333% - 20px);
    }

    .form-container:last-child {
        justify-content: center;
    }

    @media screen and (max-width: 768px) {
        .form-group {
            flex: 1 1 100%; /* Cambiar a diseño de una columna en pantallas pequeñas */
            max-width: 100%;
        }

        .container {
            width: 95%; /* Reducir el ancho para pantallas pequeñas */
        }
    }
</style>

<section class="section">
    <div class="container">
        <div class="section-header">
            <h1>Editar Item</h1>
        </div>
        <form action="{{ route('item.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-container">
                <div class="form-group">
                    <label for="categoria">Categoría:</label>
                    <input type="text" id="categoria" name="categoria" value="{{ $item->categoria }}" required>
                </div>

                <div class="form-group">
                    <label for="subcategoria">Subcategoría:</label>
                    <input type="text" id="subcategoria" name="subcategoria" value="{{ $item->subcategoria }}" required>
                </div>

                <div class="form-group">
                    <label for="item">Item:</label>
                    <input type="text" id="item" name="item" value="{{ $item->item }}" required>
                </div>

                <div class="form-group">
                    <label for="marca">Marca:</label>
                    <input type="text" id="marca" name="marca" value="{{ $item->marca }}" required>
                </div>

                <div class="form-group">
                    <label for="modelo">Modelo:</label>
                    <input type="text" id="modelo" name="modelo" value="{{ $item->modelo }}" required>
                </div>

                <div class="form-group">
                    <label for="serie">Serie:</label>
                    <input type="text" id="serie" name="serie" value="{{ $item->serie }}" required>
                </div>

                <div class="form-group">
                    <label for="color">Color:</label>
                    <input type="text" id="color" name="color" value="{{ $item->color }}" required>
                </div>

                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <input type="text" id="estado" name="estado" value="{{ $item->estado }}" required>
                </div>

                <div class="form-group">
                    <label for="ubicacion">Ubicación:</label>
                    <input type="text" id="ubicacion" name="ubicacion" value="{{ $item->ubicacion }}" required>
                </div>

                <div class="form-group">
                    <label for="codigo">Código:</label>
                    <input type="text" id="codigo" name="codigo" value="{{ $item->codigo }}" required>
                </div>
            </div>

            <button type="submit">Actualizar</button>
        </form>
    </div>
</section>

@endsection
