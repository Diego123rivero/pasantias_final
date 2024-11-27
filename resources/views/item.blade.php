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
                <div class="card-body">
                    <div class="table-responsive">
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
                                        <td>{{ $item->codigo }}</td>
                                        <td class="text-center">
                                            <!-- Botones de acción -->
                                            <a href="{{ route('item.show', $item->id) }}" class="btn btn-info btn-rounded btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('item.edit', $item->id) }}" class="btn btn-warning btn-rounded btn-sm text-white">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('item.destroy', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este registro?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-rounded btn-sm">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('item.generarQRManual', $item->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-rounded btn-sm">
                                                    <i class="fas fa-qrcode"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Botón para agregar nuevos items -->
                    <div class="text-center mt-4">
                        <a href="{{ route('item.create') }}" class="btn btn-success btn-rounded btn-lg">
                            <i class="fas fa-plus"></i> Nuevo Item
                        </a>
                    </div>

                    <!-- Botón para generar QR de todos los items -->
                    <div class="text-center mt-4">
                        <form action="{{ route('generar.todos.qr') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-rounded btn-lg">
                                <i class="fas fa-qrcode"></i> Generar QR para todos
                            </button>
                        </form>

                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ route('etiquetas') }}" class="btn btn-success btn-rounded btn-lg">
                            <i class="fas fa-plus"></i> Ver etiquetas
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
    .btn-rounded {
        border-radius: 50px;
        padding: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn-info i, .btn-warning i, .btn-danger i, .btn-success i, .btn-primary i {
        font-size: 18px;
    }

    .btn-lg {
        padding: 15px;
        font-size: 1.25rem;
    }

    .btn-sm {
        padding: 10px;
        font-size: 0.875rem;
    }

    .table th, .table td {
        vertical-align: middle;
    }

    .card-header {
        background-color: #de8e2c;
        color: #fff;
    }
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endsection
