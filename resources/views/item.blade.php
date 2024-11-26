@extends('admin.layouts2.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1 class="text-primary">Inicio</h1>
    </div>

    <!-- Fechas Disponibles -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header" style="background-color: #de8e2c; color: #fff;">
                    <h3 class="mb-0">Items</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!-- Tabla de Items -->
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Categoria</th>
                                    <th>Subcategoria</th>
                                    <th>Item</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Serie</th>
                                    <th>Color</th>
                                    <th>Estado</th>
                                    <th>Ubicación</th>
                                    <th>Codigo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($it as $item)
                                    <tr>
                                        <td>{{ $item->categoria }}</td>
                                        <td>{{ $item->subcategoria }}</td>
                                        <td>{{ $item->item }}</td>
                                        <td>{{ $item->marca }}</td>
                                        <td>{{ $item->modelo }}</td>
                                        <td>{{ $item->serie }}</td>
                                        <td>{{ $item->color }}</td>
                                        <td>{{ $item->estado }}</td>
                                        <td>{{ $item->ubicacion }}</td>
                                        <td>{{ $item->codigo}}</td>
                                        <td class="text-center">
                                            <!-- Botones de acción -->
                                            <form action="{{ route('item.show', $item->id) }}" method="GET" style="display: inline;">
                                                <button type="submit" class="btn btn-info btn-rounded btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('item.edit', $item->id) }}" method="GET" style="display: inline;">
                                                <button type="submit" class="btn btn-warning btn-rounded btn-sm text-white">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('item.destroy', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este registro?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-rounded btn-sm">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mt-4">
                        <form action="{{ route('item.create') }}" method="GET">
                            <button type="submit" class="btn btn-success btn-rounded btn-lg">
                                <i class="fas fa-plus"></i>
                            </button>
                        </form>
                        <!-- Botón de descarga de imágenes -->


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Fechas Disponibles -->
</section>
@endsection

@section('styles')
<style>
    /* Estilos de botones */
    .btn-rounded {
        border-radius: 50px;
        padding: 10px; /* Para que el icono se vea centrado */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Ajustar el tamaño de los iconos dentro de los botones */
    .btn-info i, .btn-warning i, .btn-danger i, .btn-success i {
        font-size: 18px; /* Tamaño del icono */
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
        padding: 15px;
        font-size: 1.25rem;
    }

    .btn-sm {
        padding: 10px;
        font-size: 0.875rem;
    }

    /* Estilo de la tabla */
    .table th, .table td {
        vertical-align: middle;
    }

    .card {
        border: none;
    }

    /* Estilo del encabezado de la tarjeta */
    .card-header {
        background-color: #de8e2c;
        color: #fff;
    }

    .card-body {
        padding: 20px;
    }
</style>
@endsection

@section('scripts')
<!-- Scripts necesarios para el funcionamiento de la vista -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
ction
