@extends('admin.layouts2.master')

@section('content')

<!doctype html>
<html lang="en">

<head>
  <title>Crear Item</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  
  <!-- FontAwesome for icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <style>
    .bg-image {
      background-size: cover;
      background-position: center;
    }

    .card {
      border: none;
      border-radius: 10px;
    }

    .card-body {
      padding: 2rem;
    }

    .form-label {
      font-weight: 600;
      color: #333;
    }

    /* Minimalista: eliminar bordes y solo mostrar línea inferior */
    .form-control {
      border: none;
      border-bottom: 2px solid #ddd;
      border-radius: 0;
      box-shadow: none;
      padding-right: 35px; /* Espacio para el icono */
      padding-bottom: 10px; /* Evitar que el texto se sobreponga con la línea inferior */
      width: 80%; /* Controlar la longitud de la línea */
    }

    /* Hover y enfoque */
    .form-control:focus {
      border-bottom: 2px solid #007bff;
    }

    /* Estilo de los iconos a la derecha */
    .input-icon {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 1.2rem;
      color: #007bff;
    }

    /* Contenedor del campo de entrada */
    .input-container {
      position: relative;
      margin-bottom: 1.5rem;
      display: inline-block;
    }

    /* Estilo del botón */
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      font-weight: 600;
      transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #004080;
    }
  </style>
</head>

<body>

<!-- Section: Design Block -->
<section class="text-center">
  <!-- Background image -->
  <div class="p-5 bg-image" style="background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg'); height: 300px;"></div>
  <!-- Background image -->

  <div class="card mx-4 mx-md-5 shadow-lg" style="margin-top: -100px; background: hsla(0, 0%, 100%, 0.8); backdrop-filter: blur(30px);">
    <div class="card-body py-5 px-md-5">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-5">Crear Item</h2>
          <form action="{{ route('item.store') }}" method="POST">
            @csrf

            <!-- Atributos -->
            <div class="row">
              <div class="col-md-6 mb-4">
                <div class="input-container">
                  <i class="fas fa-th-large input-icon"></i>
                  <input type="text" name="categoria" class="form-control" required />
                  <label class="form-label">Categoria</label>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="input-container">
                  <i class="fas fa-th-list input-icon"></i>
                  <input type="text" name="subcategoria" class="form-control" required />
                  <label class="form-label">Subcategoria</label>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-6 mb-4">
                <div class="input-container">
                  <i class="fas fa-cogs input-icon"></i>
                  <input type="text" name="item" class="form-control" required />
                  <label class="form-label">Item</label>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="input-container">
                  <i class="fas fa-tag input-icon"></i>
                  <input type="text" name="marca" class="form-control" />
                  <label class="form-label">Marca</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-4">
                <div class="input-container">
                  <i class="fas fa-cogs input-icon"></i>
                  <input type="text" name="modelo" class="form-control" />
                  <label class="form-label">Modelo</label>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="input-container">
                  <i class="fas fa-hashtag input-icon"></i>
                  <input type="text" name="serie" class="form-control" />
                  <label class="form-label">Serie</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-4">
                <div class="input-container">
                  <i class="fas fa-palette input-icon"></i>
                  <input type="text" name="color" class="form-control" />
                  <label class="form-label">Color</label>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="input-container">
                  <i class="fas fa-clipboard-check input-icon"></i>
                  <input type="text" name="estado" class="form-control" required />
                  <label class="form-label">Estado</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 mb-4">
                <div class="input-container">
                  <i class="fas fa-location-arrow input-icon"></i>
                  <input type="text" name="ubicacion" class="form-control" required />
                  <label class="form-label">Ubicación</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 mb-4">
                <div class="input-container">
                  <i class="fas fa-location-arrow input-icon"></i>
                  <input type="text" name="codigo" class="form-control" required />
                  <label class="form-label">Codigo</label>
                </div>
              </div>
            </div>

            <!-- Botón de enviar -->
            <input type="submit" value="Guardar" class="btn btn-primary btn-block mb-4">
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->

<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

</body>

</html>

@endsection

