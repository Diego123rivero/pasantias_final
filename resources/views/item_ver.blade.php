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
                        <div class="col-md-6">
                            <!-- Mostrar Categoría -->
                            <div class="form-group">
                                <label><strong>Categoría:</strong></label>
                                <p>{{ $item->categoria }}</p>
                            </div>
                            <!-- Mostrar Ubicación -->
                            <div class="form-group">
                                <label><strong>Ubicación:</strong></label>
                                <p>{{ $item->ubicacion }}</p>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <!-- Mostrar QR -->
                            <div class="form-group">
                                <label><strong>Código QR:</strong></label><br>
                                <img src="{{ asset('qr_codes/qr_item_' . $item->id . '.png') }}" alt="QR" style="max-width: 200px; max-height: 200px;">
                            </div>
                            <!-- Logo del Colegio -->
                            <div class="form-group">
                                <label><strong>Logo del Colegio:</strong></label><br>
                                <img src="{{ asset('images/logo_colegio.png') }}" alt="Logo Colegio" style="max-width: 150px; max-height: 150px;">
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ route('item.index') }}" class="btn btn-primary btn-rounded btn-lg">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
<style>
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        font-weight: bold;
    }
</style>
@endsection

