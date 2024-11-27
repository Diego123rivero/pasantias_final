@extends('admin.layouts2.master')

@section('content')
<div class="container mt-5">
    <div class="table-container p-4 bg-white shadow rounded">
        <h2 class="text-primary mb-4">Detalles del Item</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Categoría</th>
                        <th>Ubicación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $item->categoria }}</td>          
                        <td>{{ $item->ubicacion }}</td>
                        <td>
                            <!-- Botón de Imprimir -->
                            <a href="#" class="btn btn-success btn-icon-only" onclick="window.print();" title="Imprimir">
                                <i class="fas fa-print"></i>
                            </a>
                            <!-- Botón de Volver -->
                            <a href="{{ route('item') }}" class="btn btn-back-only" title="Volver">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Arial', sans-serif;
    }

    .table-container {
        background: #ffffff;
        padding: 30px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .table th, .table td {
        vertical-align: middle;
        text-align: center;
    }

    .table thead th {
        background-color: #007bff;
        color: #ffffff;
        border-color: #0069d9;
        font-size: 1.1em;
    }

    .table tbody tr:nth-child(odd) {
        background-color: #f2f9ff;
    }

    .table tbody tr:nth-child(even) {
        background-color: #ffffff;
    }

    .table tbody tr:hover {
        background-color: #e6f7ff;
    }

    .text-primary {
        color: #007bff;
    }

    /* Botón de imprimir */
    .btn-icon-only {
        background-color: #28a745;
        color: #ffffff;
        border: none;
        border-radius: 50%;
        padding: 10px;
        font-size: 1.2rem;
        cursor: pointer;
        transition: transform 0.2s ease, background-color 0.3s ease;
    }

    .btn-icon-only:hover {
        background-color: #218838;
        transform: scale(1.1);
    }

    /* Botón de volver */
    .btn-back-only {
        background-color: transparent;
        color: #007bff;
        border: none;
        padding: 10px;
        font-size: 1.5rem;
        cursor: pointer;
        transition: transform 0.2s ease, color 0.3s ease;
    }

    .btn-back-only:hover {
        color: #0056b3;
        transform: scale(1.2);
    }
</style>
@endsection
