@extends('layouts.admin')

@section('title')
Nuevo producto - Churros Valcel
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
                    Nuevo producto
                </h1>

                <p>
                    Agregá un nuevo producto al catálogo de Churros Valcel.
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
                action="{{ route('producto.store') }}"
            >

                @csrf


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
                            class="form-control"
                            name="nombre"
                            id="nombre"
                            value="{{ old('nombre') }}"
                            placeholder="Ej: Docena rellena"
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
                                class="form-control"
                                name="precio"
                                id="precio"
                                value="{{ old('precio') }}"
                                placeholder="6500"
                                min="0"
                                step="0.01"
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
                            class="form-control"
                            name="descripcion"
                            id="descripcion"
                            rows="4"
                            placeholder="Describí brevemente el producto..."
                            required
                        >{{ old('descripcion') }}</textarea>

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
                                    {{ old('activo', 1) == 1 ? 'checked' : '' }}
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
                                            Disponible para realizar ventas.
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
                                    {{ old('activo') === '0' ? 'checked' : '' }}
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
                                            No estará disponible para ventas.
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

                                <i class="fa-solid fa-plus"></i>

                                Crear producto

                            </button>

                        </div>

                    </div>

                </div>

            </form>

        </div>


        {{-- FOOTER --}}
        <div class="admin-page-footer">

            <span>
                Nuevo producto
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

        /* ========================================
        ESTADO DEL PRODUCTO
        ======================================== */

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

    </style>

    @endpush

@endsection
