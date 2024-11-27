<!-- resources/views/etiquetas.blade.php -->

@extends('admin.layouts2.master')


@section('content')
<section class="section">
    <div class="section-header">
        <h1 class="text-primary">Etiquetas de Productos</h1>
    </div>

    <!-- Mostrar las etiquetas de los productos -->
    <div class="row">
        @foreach ($items as $item)
            <div class="col-md-4">
                <!-- Etiqueta para cada producto -->
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="text-center">
                            <!-- Mostrar la imagen QR -->
                            <div style="border: 1px solid #ddd; padding: 20px; max-width: 400px; margin: 0 auto;">
                                <h3>{{ $item->categoria }}</h3>
                                <p>{{ $item->ubicacion }}</p>

                                <!-- QR generado previamente -->
                                <img src="{{ asset('qr_codes/qr_item_' . $item->id . '.png') }}" alt="QR Code" style="width: 150px; height: 150px; margin-bottom: 20px;">

                                <p><strong>Código:</strong> {{ $item->codigo }}</p>
                            </div>

                            <!-- Botón para descargar el QR -->
                            <form action="" method="GET">
                                <button type="submit" class="btn btn-primary btn-lg mt-4">
                                    <i class="fas fa-download"></i> Descargar QR
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Botón para descargar todas las etiquetas -->
    <div class="text-center mt-5">
        <a href="{{ route('descargar.etiquetas') }}" class="btn btn-success btn-lg">
            <i class="fas fa-download"></i> Descargar todas las etiquetas
        </a>
    </div>
<style>
    .card {
        border: none;
    }

    .card-body {
        padding: 20px;
    }

    .text-center {
        text-align: center;
    }

    /* Estilo del contenedor del QR */
    .qr-container {
        border: 1px solid #ddd;
        padding: 20px;
        max-width: 400px;
        margin: 0 auto;
        border-radius: 8px;
        background-color: #f9f9f9;
    }

    /* Ajustar el tamaño del QR */
    .qr-container img {
        width: 150px;
        height: 150px;
        margin-bottom: 20px;
    }

    /* Estilo del botón de descarga */
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 50px;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
    }

    .col-md-4 {
        width: 33.33%;
        padding: 10px;
    }
</style>


@endsection
