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
</style>

<section class="section">
    <div class="section-header">
        <h1>Editar Item</h1>
    </div>
    <div class="row">
        <div class="container">
            <form action="{{ route('item.update', $item->id) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}

                <label for="categoria">Categoría:</label>
                <input type="text" id="categoria" name="categoria" value="{{ $item->categoria }}" required>

                <label for="subcategoria">Subcategoría:</label>
                <input type="text" id="subcategoria" name="subcategoria" value="{{ $item->subcategoria }}" required>

                <label for="item">Item:</label>
                <input type="text" id="item" name="item" value="{{ $item->item }}" required>

                <label for="marca">Marca:</label>
                <input type="text" id="marca" name="marca" value="{{ $item->marca }}" required>

                <label for="modelo">Modelo:</label>
                <input type="text" id="modelo" name="modelo" value="{{ $item->modelo }}" required>

                <label for="serie">Serie:</label>
                <input type="text" id="serie" name="serie" value="{{ $item->serie }}" required>

                <label for="color">Color:</label>
                <input type="text" id="color" name="color" value="{{ $item->color }}" required>

                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado" value="{{ $item->estado }}" required>

                <label for="ubicacion">Ubicación:</label>
                <input type="text" id="ubicacion" name="ubicacion" value="{{ $item->ubicacion }}" required>

                <label for="codigo">Código:</label>
                <input type="text" id="codigo" name="codigo" value="{{ $item->codigo }}" required>

                <button type="submit">Actualizar</button>
            </form>
        </div>
    </div>
</section>
@endsection
