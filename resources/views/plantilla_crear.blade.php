@extends('admin.layouts2.master')

@section('content')
<!doctype html>
<html lang="en">

<head>
  <title>Crea sala</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

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

    .form-control {
      border-radius: 8px;
      box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);
    }

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
  <div class="p-5 bg-image" style="
        background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
        height: 300px;
        "></div>
  <!-- Background image -->

  <div class="card mx-4 mx-md-5 shadow-lg" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
    <div class="card-body py-5 px-md-5">

      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-5">Crear sala</h2>
          <form action="{{ route('plantilla.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="form-outline">
                <input type="text" name="actividad" class="form-control" required />
                <label class="form-label" for="form3Example1">Actividad</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="form-outline">
                <input type="date" name="fecha" class="form-control" required />
                <label class="form-label" for="form3Example1">Fecha</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="form-outline">
                <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*" onchange="previewImage(event)" />
                <label class="form-label" for="imagen">Plantilla</label>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-outline">
                <!-- Contenedor para la vista previa de la imagen -->
                <img id="imagenPreview" src="#" alt="Vista previa" style="display: none; max-width: 100%; height: auto;" />
            </div>
        </div>
    </div>
    <!-- Submit button -->
    <input type="submit" value="Guardar" class="btn btn-primary btn-block mb-4">
</form>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->

<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
  integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script>
  <script>
  // Función para previsualizar la imagen seleccionada
  function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('imagenPreview');

    if (input.files && input.files[0]) {
      const reader = new FileReader();

      reader.onload = function (e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
      };

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
  integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script>
</body>

</html>

@endsection
