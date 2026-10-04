@extends('layouts.main')

@section('title')
    Crear Cliente
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
                    👤
                </div>

                <div>
                    <h1 class="fw-bold mb-1" style="color: #7d1f24;">
                        Nuevo cliente
                    </h1>

                    <p class="text-muted mb-0">
                        Registrá los datos del cliente
                    </p>
                </div>

            </div>

        </div>


        {{-- Tarjeta del formulario --}}
        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body p-4 p-md-5">

                <form method="POST" action="{{ route('cliente.store') }}">

                    @csrf

                    {{-- Datos personales --}}
                    <div class="mb-4">

                        <h5 class="fw-bold mb-1">
                            Datos personales
                        </h5>

                        <p class="text-muted small mb-4">
                            Información básica del cliente
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
                                    value="{{ old('nombre') }}"
                                    placeholder="Ej. Juan"
                                    required>

                            </div>


                            {{-- Apellido --}}
                            <div class="col-md-6">

                                <label for="apellido"
                                    class="form-label fw-semibold">
                                    Apellido
                                </label>

                                <input type="text"
                                    name="apellido"
                                    id="apellido"
                                    class="form-control form-control-lg"
                                    value="{{ old('apellido') }}"
                                    placeholder="Ej. Pérez"
                                    required>

                            </div>


                            {{-- Teléfono --}}
                            <div class="col-md-6">

                                <label for="telefono"
                                    class="form-label fw-semibold">
                                    Teléfono
                                </label>

                                <input type="text"
                                    name="telefono"
                                    id="telefono"
                                    class="form-control form-control-lg @error('telefono') is-invalid @enderror"
                                    value="{{ old('telefono') }}"
                                    placeholder="3364 03-6241"
                                    inputmode="tel"
                                >
                                @error('telefono')
                                    <div style="color: red;">
                                        ERROR: {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            {{-- Compras realizadas --}}
                            <div class="col-md-6">

                                <label for="compras_realizadas"
                                    class="form-label fw-semibold">
                                    Compras realizadas
                                </label>

                                <input type="number"
                                    name="compras_realizadas"
                                    id="compras_realizadas"
                                    class="form-control form-control-lg"
                                    value="{{ old('compras_realizadas', 0) }}"
                                    min="0">

                            </div>

                        </div>

                    </div>


                    <hr class="my-4">


                    {{-- Datos de ubicación --}}
                    <div class="mb-4">

                        <h5 class="fw-bold mb-1">
                            Ubicación
                        </h5>

                        <p class="text-muted small mb-4">
                            Datos necesarios para las entregas
                        </p>


                        <div class="row g-4">

                            {{-- Dirección --}}
                            <div class="col-12">

                                <label for="direccion"
                                    class="form-label fw-semibold">
                                    Dirección
                                </label>

                                <input type="text"
                                    name="direccion"
                                    id="direccion"
                                    class="form-control form-control-lg"
                                    value="{{ old('direccion') }}"
                                    placeholder="Ej. Gutemberg 7 Bis">

                            </div>


                            {{-- Barrio --}}
                            <div class="col-md-6">

                                <label for="barrio"
                                    class="form-label fw-semibold">
                                    Barrio
                                </label>

                                <input type="text"
                                    name="barrio"
                                    id="barrio"
                                    class="form-control form-control-lg"
                                    value="{{ old('barrio') }}"
                                    placeholder="Ej. Yaguaron">

                            </div>


                            {{-- Zona --}}
                            <div class="col-md-6">

                                <label for="zona"
                                    class="form-label fw-semibold">
                                    Zona del cliente
                                </label>

                                <select id="zona"
                                        class="form-select form-select-lg"
                                        name="zona"
                                        required>

                                    <option value="" hidden>
                                        Seleccioná una zona
                                    </option>

                                    <option value="zona norte"
                                        {{ old('zona') == 'zona norte' ? 'selected' : '' }}>
                                        Zona Norte
                                    </option>

                                    <option value="zona centro"
                                        {{ old('zona') == 'zona centro' ? 'selected' : '' }}>
                                        Zona Centro
                                    </option>

                                    <option value="zona oeste"
                                        {{ old('zona') == 'zona oeste' ? 'selected' : '' }}>
                                        Zona Oeste
                                    </option>

                                    <option value="zona sur"
                                        {{ old('zona') == 'zona sur' ? 'selected' : '' }}>
                                        Zona Sur
                                    </option>

                                </select>

                            </div>

                        </div>

                    </div>


                    {{-- Botones --}}
                    <div class="d-flex flex-column flex-sm-row justify-content-end gap-2 pt-3">

                        <a href="{{ route('cliente.index') }}"
                        class="btn btn-light border rounded-3 px-4 py-2">
                            ← Regresar
                        </a>

                        <button type="submit"
                                class="btn text-white rounded-3 px-4 py-2 fw-semibold"
                                style="background-color: #7d1f24;">
                            + Crear cliente
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>


    <style>

        /* Inputs */

        .form-control,
        .form-select {
            border-color: #dee2e6;
            transition: all 0.2s ease;
        }


        .form-control:focus,
        .form-select:focus {
            border-color: #7d1f24;
            box-shadow: 0 0 0 0.2rem rgba(125, 31, 36, 0.10);
        }


        /* Botón principal */

        .btn-valcel:hover {
            background-color: #64191d !important;
        }


        /* Botón crear */

        button[type="submit"]:hover {
            background-color: #64191d !important;
        }

    </style>

@endsection