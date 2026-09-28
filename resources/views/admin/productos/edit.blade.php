@extends('layouts.main')

@section('title')
    Editar Producto
@endsection

@section('content')

<div class="container py-5">

    {{-- Encabezado --}}
    <div class="mb-4">

        <div class="d-flex align-items-center gap-3">

            <div
                class="d-flex align-items-center justify-content-center rounded-4"
                style="
                    width: 58px;
                    height: 58px;
                    background-color: #e7f4f5;
                    font-size: 1.8rem;
                "
            >
                🍩
            </div>

            <div>
                <h1 class="fw-bold mb-1" style="color: #7d1f24;">
                    Editar producto
                </h1>

                <p class="text-muted mb-0">
                    Modificá la información del producto
                </p>
            </div>

        </div>

    </div>


    {{-- Tarjeta --}}
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4 p-md-5">

            <form method="POST"
                  action="{{ route('producto.update', $producto->id) }}">

                @csrf
                @method('PUT')


                {{-- Información del producto --}}
                <div class="mb-4">

                    <h5 class="fw-bold mb-1">
                        Información del producto
                    </h5>

                    <p class="text-muted small mb-4">
                        Actualizá los datos principales
                    </p>


                    <div class="row g-4">

                        {{-- Nombre --}}
                        <div class="col-md-6">

                            <label for="nombre"
                                   class="form-label fw-semibold">
                                Nombre
                            </label>

                            <input type="text"
                                   name="nombre"
                                   id="nombre"
                                   class="form-control form-control-lg"
                                   value="{{ old('nombre', $producto->nombre) }}"
                                   placeholder="Ej. Docena simple"
                                   required>

                        </div>


                        {{-- Precio --}}
                        <div class="col-md-6">

                            <label for="precio"
                                   class="form-label fw-semibold">
                                Precio
                            </label>

                            <div class="input-group input-group-lg">

                                <span class="input-group-text bg-white">
                                    $
                                </span>

                                <input type="number"
                                       name="precio"
                                       id="precio"
                                       class="form-control"
                                       value="{{ old('precio', $producto->precio) }}"
                                       min="0"
                                       step="0.01"
                                       placeholder="0.00"
                                       required>

                            </div>

                        </div>


                        {{-- Descripción --}}
                        <div class="col-12">

                            <label for="descripcion"
                                   class="form-label fw-semibold">
                                Descripción
                            </label>

                            <textarea name="descripcion"
                                      id="descripcion"
                                      class="form-control"
                                      rows="4"
                                      placeholder="Descripción del producto...">{{ old('descripcion', $producto->descripcion) }}</textarea>

                        </div>

                    </div>

                </div>


                <hr class="my-4">


                {{-- Estado --}}
                <div class="mb-4">

                    <h5 class="fw-bold mb-1">
                        Estado del producto
                    </h5>

                    <p class="text-muted small mb-4">
                        Indicá si el producto está disponible para la venta
                    </p>


                    <div class="row g-3">

                        {{-- Activo --}}
                        <div class="col-md-6">

                            <label
                                class="w-100 border rounded-4 p-3"
                                style="cursor: pointer;"
                            >

                                <div class="form-check">

                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="activo"
                                        id="activo"
                                        value="1"
                                        {{ old('activo', $producto->activo) == 1 ? 'checked' : '' }}
                                    >

                                    <label
                                        class="form-check-label fw-semibold"
                                        for="activo"
                                    >
                                        Producto activo
                                    </label>

                                </div>

                                <small class="text-muted ms-4">
                                    Disponible para nuevas ventas
                                </small>

                            </label>

                        </div>


                        {{-- Inactivo --}}
                        <div class="col-md-6">

                            <label
                                class="w-100 border rounded-4 p-3"
                                style="cursor: pointer;"
                            >

                                <div class="form-check">

                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="activo"
                                        id="inactivo"
                                        value="0"
                                        {{ old('activo', $producto->activo) == 0 ? 'checked' : '' }}
                                    >

                                    <label
                                        class="form-check-label fw-semibold"
                                        for="inactivo"
                                    >
                                        Producto inactivo
                                    </label>

                                </div>

                                <small class="text-muted ms-4">
                                    No disponible para nuevas ventas
                                </small>

                            </label>

                        </div>

                    </div>

                </div>


                {{-- Botones --}}
                <div class="d-flex flex-column flex-sm-row justify-content-end gap-2 pt-3">

                    <a href="{{ route('producto.index') }}"
                       class="btn btn-light border rounded-3 px-4 py-2">
                        ← Regresar
                    </a>

                    <button type="submit"
                            class="btn text-white rounded-3 px-4 py-2 fw-semibold"
                            style="background-color: #7d1f24;">
                        ✓ Guardar cambios
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<style>

    .form-control,
    .form-select,
    .input-group-text {
        border-color: #dee2e6;
        transition: all 0.2s ease;
    }


    .form-control:focus,
    .form-select:focus {
        border-color: #7d1f24;
        box-shadow: 0 0 0 0.2rem rgba(125, 31, 36, 0.10);
    }


    .form-check-input:checked {
        background-color: #7d1f24;
        border-color: #7d1f24;
    }


    button[type="submit"] {
        transition: all 0.2s ease;
    }


    button[type="submit"]:hover {
        background-color: #64191d !important;
    }


</style>

@endsection