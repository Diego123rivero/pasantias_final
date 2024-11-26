@extends('admin.layouts2.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header text-center bg-primary text-white">
                    <h4 class="mb-0">Registro</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('register')}}" method="post" class="contact100-form validate-form">
                        @csrf
                        <div class="mb-4">
                            <label for="registerName" class="form-label">Nombre Completo</label>
                            <input type="text" class="form-control shadow-sm" id="registerName" placeholder="Nombre Completo" name="name" required>
                        </div>
                        <div class="mb-4">
                            <label for="registerEmail" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control shadow-sm" id="registerEmail" placeholder="nombre@ejemplo.com" name="email" required>
                        </div>
                        <div class="mb-4">
                            <label for="registerPassword" class="form-label">Contraseña</label>
                            <input type="password" class="form-control shadow-sm" id="registerPassword" placeholder="Contraseña" name="password" required>
                        </div>
                        <div class="mb-4">
                            <label for="loginPassword" class="form-label">Confirmar Contraseña</label>
                            <input type="password" class="form-control shadow-sm" id="loginPassword" placeholder="Repite tu Contraseña" name="password_confirmation" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary shadow-sm">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection







