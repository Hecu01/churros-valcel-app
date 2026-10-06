@extends('layouts.admin')

@section('title')
    Editar producto - Churros Valcel
@endsection

@section('content')

<div class="admin-page">

    {{-- ENCABEZADO --}}
    <div class="page-header">

        <div>

            <div class="page-eyebrow">
                PRODUCTOS
            </div>

            <h1>
                Editar producto
            </h1>

            <p>
                Modificá la información del producto.
            </p>

        </div>

        <div class="page-header-action">

            <a
                href="{{ route('producto.index') }}"
                class="btn-admin-primary"
                style="background: #687791;"
            >
                <i class="fa-solid fa-arrow-left"></i>
                Volver a productos
            </a>

        </div>

    </div>


    {{-- FORMULARIO --}}
    <div class="admin-panel">

        <form
            method="POST"
            action="{{ route('producto.update', $producto->id) }}"
        >

            @csrf
            @method('PUT')

            <div class="row g-4">

                {{-- NOMBRE --}}
                <div class="col-md-6">

                    <label
                        for="nombre"
                        class="form-label fw-semibold"
                    >
                        Nombre del producto
                    </label>

                    <input
                        type="text"
                        name="nombre"
                        id="nombre"
                        class="form-control"
                        value="{{ old('nombre', $producto->nombre) }}"
                        placeholder="Ej: Docena simple"
                        required
                    >

                </div>


                {{-- PRECIO --}}
                <div class="col-md-6">

                    <label
                        for="precio"
                        class="form-label fw-semibold"
                    >
                        Precio
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            $
                        </span>

                        <input
                            type="number"
                            name="precio"
                            id="precio"
                            class="form-control"
                            value="{{ old('precio', $producto->precio) }}"
                            min="0"
                            step="0.01"
                            placeholder="0.00"
                            required
                        >

                    </div>

                </div>


                {{-- DESCRIPCIÓN --}}
                <div class="col-12">

                    <label
                        for="descripcion"
                        class="form-label fw-semibold"
                    >
                        Descripción
                    </label>

                    <textarea
                        name="descripcion"
                        id="descripcion"
                        class="form-control"
                        rows="4"
                        placeholder="Descripción del producto..."
                    >{{ old('descripcion', $producto->descripcion) }}</textarea>

                </div>


                {{-- ESTADO --}}
                <div class="col-12">

                    <label class="form-label fw-semibold mb-3">
                        Estado del producto
                    </label>

                    <div class="row g-3">

                        {{-- ACTIVO --}}
                        <div class="col-md-6">

                            <input
                                type="radio"
                                class="btn-check"
                                name="activo"
                                id="activo"
                                value="1"
                                {{ old('activo', $producto->activo) == 1 ? 'checked' : '' }}
                            >

                            <label
                                class="product-status-option active-option"
                                for="activo"
                            >

                                <div class="product-status-icon">
                                    <i class="fa-solid fa-circle-check"></i>
                                </div>

                                <div>

                                    <strong>
                                        Producto activo
                                    </strong>

                                    <small class="d-block">
                                        Disponible para nuevas ventas.
                                    </small>

                                </div>

                            </label>

                        </div>


                        {{-- INACTIVO --}}
                        <div class="col-md-6">

                            <input
                                type="radio"
                                class="btn-check"
                                name="activo"
                                id="inactivo"
                                value="0"
                                {{ old('activo', $producto->activo) == 0 ? 'checked' : '' }}
                            >

                            <label
                                class="product-status-option inactive-option"
                                for="inactivo"
                            >

                                <div class="product-status-icon">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                </div>

                                <div>

                                    <strong>
                                        Producto inactivo
                                    </strong>

                                    <small class="d-block">
                                        No disponible para nuevas ventas.
                                    </small>

                                </div>

                            </label>

                        </div>

                    </div>

                </div>


                {{-- SEPARADOR --}}
                <div class="col-12">

                    <hr style="border-color: #e9edf4;">

                </div>


                {{-- BOTONES --}}
                <div class="col-12">

                    <div class="d-flex flex-column flex-sm-row justify-content-end gap-2">

                        <a
                            href="{{ route('producto.index') }}"
                            class="btn btn-outline-secondary px-4 d-inline-flex align-items-center justify-content-center"
                            style="border-radius: 10px;"
                        >
                            <i class="fa-solid fa-xmark me-1"></i>
                            Cancelar
                        </a>

                        <button
                            type="submit"
                            class="btn-admin-primary px-4"
                        >
                            <i class="fa-solid fa-floppy-disk"></i>
                            Guardar cambios
                        </button>

                    </div>

                </div>

            </div>

        </form>

    </div>


    {{-- FOOTER --}}
    <div class="admin-page-footer">

        <span>
            Edición de producto
        </span>

        <span>·</span>

        <span>
            Churros Valcel
        </span>

    </div>

</div>


{{-- ESTILOS ESPECÍFICOS --}}
@push('styles')

<style>

    .product-status-option {

        display: flex;
        align-items: center;
        gap: 14px;

        width: 100%;

        padding: 16px;

        border: 1px solid #e9edf4;
        border-radius: 14px;

        cursor: pointer;

        background: #fff;

        transition:
            border-color .2s ease,
            background .2s ease,
            box-shadow .2s ease,
            transform .2s ease;

    }


    .product-status-option:hover {

        transform: translateY(-2px);

        box-shadow:
            0 6px 18px rgba(27,43,71,.06);

    }


    .product-status-icon {

        width: 42px;
        height: 42px;

        border-radius: 11px;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 19px;

        flex-shrink: 0;

    }


    .product-status-option strong {

        color: var(--valcel-text);

        display: block;

        margin-bottom: 3px;

    }


    .product-status-option small {

        color: var(--valcel-muted);

        font-size: 13px;

    }


    /* ACTIVO */

    .active-option .product-status-icon {

        color: var(--valcel-green);
        background: var(--valcel-green-light);

    }


    .active-option:hover {

        border-color: #a8dfc8;

    }


    /* INACTIVO */

    .inactive-option .product-status-icon {

        color: #d98b20;
        background: var(--valcel-orange-light);

    }


    .inactive-option:hover {

        border-color: #f1d09d;

    }


    /* SELECCIONADO */

    .btn-check:checked + .active-option {

        border-color: var(--valcel-green);

        background: var(--valcel-green-light);

        box-shadow:
            0 0 0 2px rgba(32,168,115,.10);

    }


    .btn-check:checked + .inactive-option {

        border-color: var(--valcel-orange);

        background: var(--valcel-orange-light);

        box-shadow:
            0 0 0 2px rgba(243,154,45,.10);

    }


    /* INPUTS */

    .form-control,
    .input-group-text {

        border-color: #e1e6ee;

        border-radius: 10px;

    }


    .form-control:focus {

        border-color: var(--valcel-blue);

        box-shadow:
            0 0 0 3px rgba(49,91,214,.10);

    }


    .input-group .input-group-text {

        border-radius: 10px 0 0 10px;

        color: var(--valcel-muted);

        font-weight: 600;

    }


    .input-group .form-control {

        border-radius: 0 10px 10px 0;

    }

</style>

@endpush

@endsection