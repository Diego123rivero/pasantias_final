@extends('admin.layouts2.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1 class="text-primary">Detalles del Item</h1>
    </div>

    <!-- Mostrar Mensajes de Retroalimentación -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header" style="background-color: #de8e2c; color: #fff;">
                    <h3 class="mb-0">Información del Item</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Primera columna (Izquierda) -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Categoría:</strong></label>
                                <p>{{ $item->categoria }}</p>
                            </div>
                            <div class="form-group">
                                <label><strong>Subcategoría:</strong></label>
                                <p>{{ $item->subcategoria }}</p>
                            </div>
                            <div class="form-group">
                                <label><strong>Item:</strong></label>
                                <p>{{ $item->item }}</p>
                            </div>
                            <div class="form-group">
                                <label><strong>Marca:</strong></label>
                                <p>{{ $item->marca }}</p>
                            </div>
                            <div class="form-group">
                                <label><strong>Modelo:</strong></label>
                                <p>{{ $item->modelo }}</p>
                            </div>
                            <div class="form-group">
                                <label><strong>Serie:</strong></label>
                                <p>{{ $item->serie }}</p>
                            </div>
                        </div>
                        <!-- Segunda columna (Derecha) -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong>Color:</strong></label>
                                <p>{{ $item->color }}</p>
                            </div>
                            <div class="form-group">
                                <label><strong>Estado:</strong></label>
                                <p>{{ $item->estado }}</p>
                            </div>
                            <div class="form-group">
                                <label><strong>Ubicación:</strong></label>
                                <p>{{ $item->ubicacion }}</p>
                            </div>
                            <div class="form-group">
                                <label><strong>Código:</strong></label>
                                <p>{{ $item->codigo }}</p>
                            </div>
                            <!-- QR Code -->
                            <div class="form-group">
                                <label><strong>Código QR:</strong></label><br>
                                <img src="{{ asset('qr_codes/qr_item_' . $item->id . '.png') }}" alt="QR" style="max-width: 200px; max-height: 200px;">
                            </div>
                        </div>
                    </div>
                    <!-- Botón de Volver -->
                    <div class="text-center mt-4">
                        <a href="{{ route('item') }}" class="btn btn-primary btn-rounded btn-lg">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
<style>
    /* General Styles */
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        font-weight: bold;
    }

    .form-group p {
        margin: 0;
        font-size: 1rem;
        color: #333;
    }

    .card {
        border: none;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .card-header {
        border-radius: 8px 8px 0 0;
    }

    .btn-rounded {
        border-radius: 50px;
        padding: 10px 30px;
        font-size: 1rem;
        font-weight: bold;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }

    /* QR and Logo Styles */
    img {
        display: block;
        margin: 0 auto;
    }

    .form-group.text-center img {
        margin-top: 10px;
    }
</style>
@endsection
