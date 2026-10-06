@extends('layouts.admin')

@section('title', 'Nuevo cliente - Churros Valcel')

@section('content')

<div class="admin-page">

    {{-- Encabezado --}}
    <div class="page-header">

        <div>
            <div class="page-eyebrow">
                GESTIÓN DE CLIENTES
            </div>

            <h1>
                Nuevo cliente
            </h1>

            <p>
                Registrá los datos del cliente en el sistema.
            </p>
        </div>

        <div class="page-header-action">

            <a href="{{ route('cliente.index') }}"
               class="btn-admin-secondary">

                <i class="fa-solid fa-arrow-left"></i>

                Volver a clientes

            </a>

        </div>

    </div>


    {{-- Formulario --}}
    <div class="admin-panel">

        <form method="POST" action="{{ route('cliente.store') }}">

            @csrf


            {{-- DATOS PERSONALES --}}
            <div class="form-section">

                <div class="form-section-header">

                    <div class="form-section-icon">
                        <i class="fa-solid fa-user"></i>
                    </div>

                    <div>

                        <h5>
                            Datos personales
                        </h5>

                        <p>
                            Información básica del cliente.
                        </p>

                    </div>

                </div>


                <div class="row g-4">

                    {{-- Nombre --}}
                    <div class="col-md-6">

                        <label for="nombre"
                               class="admin-form-label">

                            Nombre

                        </label>

                        <input
                            type="text"
                            name="nombre"
                            id="nombre"
                            class="form-control admin-form-control @error('nombre') is-invalid @enderror"
                            value="{{ old('nombre') }}"
                            placeholder="Ej. Juan"
                            required
                        >

                        @error('nombre')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Apellido --}}
                    <div class="col-md-6">

                        <label for="apellido"
                               class="admin-form-label">

                            Apellido

                        </label>

                        <input
                            type="text"
                            name="apellido"
                            id="apellido"
                            class="form-control admin-form-control @error('apellido') is-invalid @enderror"
                            value="{{ old('apellido') }}"
                            placeholder="Ej. Pérez"
                            required
                        >

                        @error('apellido')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Teléfono --}}
                    <div class="col-md-6">

                        <label for="telefono"
                               class="admin-form-label">

                            Teléfono

                        </label>

                        <input
                            type="text"
                            name="telefono"
                            id="telefono"
                            class="form-control admin-form-control @error('telefono') is-invalid @enderror"
                            value="{{ old('telefono') }}"
                            placeholder="3364 03-6241"
                            inputmode="tel"
                            required
                        >

                        @error('telefono')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Compras --}}
                    <div class="col-md-6">

                        <label for="compras_realizadas"
                               class="admin-form-label">

                            Compras realizadas

                        </label>

                        <input
                            type="number"
                            name="compras_realizadas"
                            id="compras_realizadas"
                            class="form-control admin-form-control @error('compras_realizadas') is-invalid @enderror"
                            value="{{ old('compras_realizadas', 0) }}"
                            min="0"
                        >

                        @error('compras_realizadas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

            </div>


            <hr class="admin-form-divider">


            {{-- UBICACIÓN --}}
            <div class="form-section">

                <div class="form-section-header">

                    <div class="form-section-icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>

                    <div>

                        <h5>
                            Ubicación
                        </h5>

                        <p>
                            Datos necesarios para las entregas.
                        </p>

                    </div>

                </div>


                <div class="row g-4">

                    {{-- Dirección --}}
                    <div class="col-12">

                        <label for="direccion"
                               class="admin-form-label">

                            Dirección

                        </label>

                        <input
                            type="text"
                            name="direccion"
                            id="direccion"
                            class="form-control admin-form-control @error('direccion') is-invalid @enderror"
                            value="{{ old('direccion') }}"
                            placeholder="Ej. Gutemberg 7 Bis"
                            required
                        >

                        @error('direccion')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Barrio --}}
                    <div class="col-md-6">

                        <label for="barrio"
                               class="admin-form-label">

                            Barrio

                        </label>

                        <input
                            type="text"
                            name="barrio"
                            id="barrio"
                            class="form-control admin-form-control @error('barrio') is-invalid @enderror"
                            value="{{ old('barrio') }}"
                            placeholder="Ej. Yaguaron"
                            required
                        >

                        @error('barrio')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Zona --}}
                    <div class="col-md-6">

                        <label for="zona"
                               class="admin-form-label">

                            Zona del cliente

                        </label>

                        <select
                            id="zona"
                            name="zona"
                            class="form-select admin-form-control @error('zona') is-invalid @enderror"
                            required
                        >

                            <option value="" disabled
                                {{ old('zona') ? '' : 'selected' }}>
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

                        @error('zona')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

            </div>


            {{-- BOTONES --}}
            <div class="admin-form-actions">

                <a href="{{ route('cliente.index') }}"
                   class="btn-admin-secondary">

                    <i class="fa-solid fa-xmark"></i>

                    Cancelar

                </a>

                <button
                    type="submit"
                    class="btn-admin-primary"
                >

                    <i class="fa-solid fa-user-plus"></i>

                    Crear cliente

                </button>

            </div>

        </form>

    </div>


    {{-- Footer --}}
    <div class="admin-page-footer">

        <span>Churros Valcel</span>

        <span>·</span>

        <span>Nuevo cliente</span>

    </div>

</div>


@push('styles')

<style>

    /* ================================
       FORMULARIO ADMIN
    ================================= */

    .form-section {
        margin-bottom: 10px;
    }


    .form-section-header {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 28px;
    }


    .form-section-icon {
        width: 44px;
        height: 44px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 12px;

        background: #eef7f8;
        color: #7d1f24;

        font-size: 18px;
    }


    .form-section-header h5 {
        margin: 0 0 4px;
        font-weight: 700;
    }


    .form-section-header p {
        margin: 0;
        color: #7b8798;
        font-size: 14px;
    }


    .admin-form-label {
        display: block;

        margin-bottom: 8px;

        font-size: 14px;
        font-weight: 600;

        color: #26364d;
    }


    .admin-form-control {
        min-height: 48px;

        border: 1px solid #dfe5ec;

        border-radius: 10px;

        padding: 10px 14px;

        transition: all .2s ease;
    }


    .admin-form-control:focus {
        border-color: #7d1f24;

        box-shadow:
            0 0 0 3px rgba(125, 31, 36, .08);
    }


    .admin-form-divider {
        border: 0;

        border-top: 1px solid #edf0f3;

        margin: 35px 0;
    }


    /* ================================
       BOTONES
    ================================= */

    .btn-admin-secondary {

        display: inline-flex;

        align-items: center;
        justify-content: center;

        gap: 8px;

        min-height: 44px;

        padding: 10px 18px;

        border-radius: 10px;

        border: 1px solid #dfe5ec;

        background: white;

        color: #475569;

        text-decoration: none;

        font-weight: 600;

        transition: all .2s ease;
    }


    .btn-admin-secondary:hover {

        background: #f8fafc;

        color: #26364d;

        border-color: #cbd5e1;
    }


    .admin-form-actions {

        display: flex;

        justify-content: flex-end;

        gap: 10px;

        margin-top: 40px;

        padding-top: 25px;

        border-top: 1px solid #edf0f3;
    }


    /* ================================
       VALIDACIÓN
    ================================= */

    .is-invalid {
        border-color: #dc3545 !important;
    }


    /* ================================
       RESPONSIVE
    ================================= */

    @media (max-width: 768px) {

        .page-header {
            align-items: flex-start;
            flex-direction: column;
            gap: 18px;
        }

        .page-header-action {
            width: 100%;
        }

        .page-header-action a {
            width: 100%;
        }

        .admin-form-actions {
            flex-direction: column-reverse;
        }

        .admin-form-actions a,
        .admin-form-actions button {
            width: 100%;
        }

    }

</style>

@endpush

@endsection