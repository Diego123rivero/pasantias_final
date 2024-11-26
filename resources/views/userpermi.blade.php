@extends('admin.layouts2.master')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Roles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h2 class="text-center mb-4">Administrar Roles de Usuarios</h2>

  <table id="tab" class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>
          <a data-bs-toggle="modal" data-bs-target="#ModalEditarRol{{ $user->id }}" class="btn btn-outline-primary">Editar Rol</a>
        </td>
      </tr>
      
      <!-- Modal para Editar Rol -->
      <div class="modal fade" id="ModalEditarRol{{ $user->id }}" tabindex="-1" aria-labelledby="ModalLabel{{ $user->id }}" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ModalLabel{{ $user->id }}">Editar Roles para {{ $user->name }}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('asignar.update', $user->id) }}" method="post">
                @csrf
                {{ method_field('PUT') }}
                <ul class="list-unstyled">
                  @foreach($role as $roles)
                    <li class="mb-2">
                      <div class="form-check">
                        <input type="checkbox" name="roles[]" value="{{ $roles->id }}" id="role_{{ $roles->id }}" class="form-check-input">
                        <label for="role_{{ $roles->id }}" class="form-check-label">{{ $roles->name }}</label>
                      </div>
                    </li>
                  @endforeach  
                </ul>
                <div class="text-center">
                  <button class="btn btn-success" type="submit">Asignar Rol</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      
      @endforeach
    </tbody>
  </table>
</div>
@endsection
<!-- Bootstrap JS (required for modals) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<style>
  .container {
    max-width: 1000px;
  }
  .table {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }
  .table-hover tbody tr:hover {
    background-color: #f1f1f1;
  }
  .modal-header {
    background-color: #007bff;
    color: white;
  }
  .btn-outline-primary {
    transition: background-color 0.3s ease, color 0.3s ease;
  }
  .btn-outline-primary:hover {
    background-color: #007bff;
    color: white;
  }
  .btn-close {
    background-color: white;
  }
</style>

</body>
</html>
