@extends('admin.layouts2.master')

@section('content')

<!doctype html>
<html lang="en">

<head>
  <title>Crear Item</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  
  <!-- FontAwesome for icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <style>
    body {
      font-size: 0.9rem;
    }

    .bg-image {
      display: none; /* Ocultamos la imagen de fondo */
    }

    .card {
      border: none;
      border-radius: 10px;
      padding: 1rem;
    }

    .card-body {
      padding: 1rem;
    }

    .form-label {
      font-size: 0.85rem;
      font-weight: 600;
      color: #333;
    }

    .form-control {
      font-size: 0.85rem;
      padding: 0.3rem;
      height: 2rem;
    }

    .input-container {
      margin-bottom: 0.8rem;
    }

    .btn-primary {
      font-size: 0.85rem;
      padding: 0.5rem 1rem;
    }

    /* Estilos compactos para filas */
    .row > div {
      padding: 0.3rem;
    }

    /* Controla el ancho del contenedor */
    .card {
      max-width: 800px;
      margin: auto;
    }
  </style>
</head>

<body>

<section class="text-center">
  <div class="card shadow-lg">
    <div class="card-body">
      <h4 class="fw-bold mb-3">Crear Item</h4>
      <form action="{{ route('item.store') }}" method="POST">
        @csrf

        <!-- Atributos -->
        <div class="row">
          <div class="col-md-6">
            <div class="input-container">
              <i class="fas fa-th-large input-icon"></i>
              <input type="text" name="categoria" class="form-control" required />
              <label class="form-label">Categoria</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-container">
              <i class="fas fa-th-list input-icon"></i>
              <input type="text" name="subcategoria" class="form-control" required />
              <label class="form-label">Subcategoria</label>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6">
            <div class="input-container">
              <i class="fas fa-cogs input-icon"></i>
              <input type="text" name="item" class="form-control" required />
              <label class="form-label">Item</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-container">
              <i class="fas fa-tag input-icon"></i>
              <input type="text" name="marca" class="form-control" />
              <label class="form-label">Marca</label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="input-container">
              <i class="fas fa-cogs input-icon"></i>
              <input type="text" name="modelo" class="form-control" />
              <label class="form-label">Modelo</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-container">
              <i class="fas fa-hashtag input-icon"></i>
              <input type="text" name="serie" class="form-control" />
              <label class="form-label">Serie</label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="input-container">
              <i class="fas fa-palette input-icon"></i>
              <input type="text" name="color" class="form-control" />
              <label class="form-label">Color</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-container">
              <i class="fas fa-clipboard-check input-icon"></i>
              <input type="text" name="estado" class="form-control" required />
              <label class="form-label">Estado</label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="input-container">
              <i class="fas fa-location-arrow input-icon"></i>
              <input type="text" name="ubicacion" class="form-control" required />
              <label class="form-label">Ubicación</label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="input-container">
              <i class="fas fa-location-arrow input-icon"></i>
              <input type="text" name="codigo" class="form-control" required />
              <label class="form-label">Codigo</label>
            </div>
          </div>
        </div>

        <!-- Botón de enviar -->
        <input type="submit" value="Guardar" class="btn btn-primary btn-block">
      </form>
    </div>
  </div>
</section>

<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>

</body>

</html>

@endsection
