@extends('admin.layouts2.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1 class="text-primary">Inicio</h1>
    </div>

    <!-- Mostrar Mensajes de Retroalimentación -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Tabla de Items -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="mb-0">Items</h3>
                </div>
                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-sm">
                            <thead class="text-center">
                                <tr>
                                    <th style="width: 10%;">Categoría</th>
                                    <th style="width: 10%;">Subcategoría</th>
                                    <th style="width: 15%;">Item</th>
                                    <th style="width: 10%;">Marca</th>
                                    <th style="width: 10%;">Modelo</th>
                                    <th style="width: 10%;">Serie</th>
                                    <th style="width: 5%;">Color</th>
                                    <th style="width: 5%;">Estado</th>
                                    <th style="width: 10%;">Ubicación</th>
                                    <th style="width: 10%;">Código</th>
                                    <th style="width: 15%;">Acciones</th>
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
                                        <td>{{ $item->codigo }}</td>
                                        <td class="text-center">
    <!-- Contenedor de las acciones en una fila -->
    <div class="btn-group" role="group">
        <!-- Botón Ver -->
        <a href="{{ route('item.show', $item->id) }}" class="btn btn-info btn-sm" title="Ver">
            <i class="fas fa-eye"></i>
        </a>
        <!-- Botón Editar -->
        <a href="{{ route('item.edit', $item->id) }}" class="btn btn-warning btn-sm text-white" title="Editar">
            <i class="fas fa-edit"></i>
        </a>
        <!-- Formulario para Eliminar -->
        <form action="{{ route('item.destroy', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este registro?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                <i class="fas fa-trash-alt"></i>
            </button>
        </form>
    </div>
</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Botón para agregar nuevos items -->
                    <div class="text-center mt-4">
                        <a href="{{ route('item.create') }}" class="btn btn-success btn-lg">
                            <i class="fas fa-plus"></i> Nuevo Item
                        </a>
                    </div>

                    <!-- Botón para generar QR de todos los items -->
                    <div class="text-center mt-4">
                        <a href="{{ route('etiquetas') }}" class="btn btn-success btn-lg">
                            <i class="fas fa-tags"></i> Ver Etiquetas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
<style>
    /* Contenedor de las acciones en la celda */
.btn-group {
    display: flex;
    justify-content: center;
    gap: 8px; /* Espaciado entre los botones */
}

/* Estilo de los botones */
.btn-sm {
    padding: 8px 12px; /* Un poco más de espacio para que los botones no se vean tan pequeños */
    font-size: 0.9rem;
    border-radius: 5px; /* Bordes redondeados */
    transition: all 0.3s ease; /* Transición suave al pasar el mouse */
}

/* Efectos al pasar el mouse */
.btn-sm:hover {
    opacity: 0.8;
}

/* Aseguramos que los iconos se vean bien dentro de los botones */
.btn i {
    font-size: 1rem;
}

/* Colores específicos para los botones */
.btn-info {
    background-color: #17a2b8;
    border-color: #17a2b8;
}

.btn-warning {
    background-color: #ffc107;
    border-color: #ffc107;
}

.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
}

/* Botón de eliminar con fondo más oscuro al pasar el mouse */
.btn-danger:hover {
    background-color: #c82333;
    border-color: #bd2130;
}

</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endsection

