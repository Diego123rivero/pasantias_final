@extends('admin.layouts2.master')

@section('content')

    <div class="section-header">

        <!-- Mostrar mensajes de éxito o error -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <!-- Plantillas Disponibles -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header" style="background-color: #de8e2c; color: #fff;">
                    <h3 class="mb-0">Plantillas</h3>
                </div>
                <div class="card-body">
                    <!-- Contenedor de las plantillas, que ocupe todo el ancho disponible -->
                    <div class="plantillas-container">
                        <div class="row">
                            @foreach ($pl as $plantilla)
                                <div class="col-12 col-md-4 mb-4"> <!-- Tres imágenes por fila -->
                                    <div class="card shadow-sm">
                                        <div class="card-body text-center">
                                            <!-- Imagen con bordes -->
                                            <div class="img-container" style="border: 2px solid #ddd; padding: 10px; height: 250px; position: relative;">
                                                <img src="{{ asset('storage/' . $plantilla->imagen) }}" alt="Imagen" class="img-fluid" style="height: 100%; width: 100%; object-fit: cover;">
                                            </div>
                                            
                                            <!-- Actividad y Fecha -->
                                            <h5 class="mt-2">{{ $plantilla->actividad }}</h5>
                                            <p class="text-muted">{{ $plantilla->fecha }}</p>
                                        </div>

                                        <!-- Acciones (botones) -->
                                        <div class="card-footer text-center">
                                            <!-- Botón Editar -->
                                            <form action="{{ route('plantilla.edit', $plantilla->id) }}" method="GET" style="display: inline;">
                                                <button type="submit" class="btn btn-warning btn-rounded btn-sm text-white">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </form>

                                            <!-- Botón Eliminar -->
                                            <form action="{{ route('plantilla.destroy', $plantilla->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este registro?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-rounded btn-sm">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>

                                            <!-- Botón Descargar -->
                                            <a href="{{ asset('storage/' . $plantilla->imagen) }}" download="{{ $plantilla->actividad }}.jpg" class="btn btn-info btn-rounded btn-sm">
                                                <i class="fas fa-download"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Botón para agregar nueva plantilla -->
                    <div class="text-center mt-4">
                        <form action="{{ route('plantilla.create') }}" method="GET">
                            <button type="submit" class="btn btn-success btn-rounded btn-lg">
                                <i class="fas fa-plus"></i> Añade una plantilla
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Plantillas Disponibles -->
</section>

<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

@endsection

@section('styles')
<style>
    .btn-rounded {
        border-radius: 50px;
    }

    .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
    }

    .btn-info:hover {
        background-color: #138496;
        border-color: #117a8b;
    }

    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .btn-warning:hover {
        background-color: #e0a800;
        border-color: #d39e00;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    .btn-lg {
        padding: 10px 20px;
        font-size: 1.25rem;
    }

    .btn-sm {
        padding: 5px 10px;
        font-size: 0.875rem;
    }

    .card {
        border: none;
    }

    .card-header {
        background-color: #de8e2c;
        color: #fff;
    }

    .card-body {
        padding: 20px;
    }

    /* Estilo para las imágenes dentro del recuadro */
    .img-container {
        position: relative;
        border: 2px solid #ddd;
        padding: 10px;
        height: 250px;
        overflow: hidden;
    }

    .img-fluid {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }

    /* Responsividad para las tarjetas */
    .plantillas-container {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: space-between;
    }

    /* Ajuste de las columnas para 3 imágenes por fila */
    .col-12 {
        margin-bottom: 30px;
    }

    .col-md-4 {
        flex: 0 0 32%; /* Tres imágenes por fila */
    }

    .card-footer {
        display: flex;
        justify-content: space-around;
        padding: 10px;
    }

    /* Estilos de la tabla */
    table {
        width: 100%;
        table-layout: fixed;
        border-collapse: collapse;
    }

    th, td {
        padding: 10px;
        text-align: center;
        word-wrap: break-word;
    }

    .table-responsive {
        overflow-x: hidden;
    }

    /* Estilos para los botones en la parte inferior */
    .card-footer .btn {
        width: 40px;
        height: 40px;
        padding: 8px;
        font-size: 18px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn i {
        color: #fff;
    }
</style>
@endsection

