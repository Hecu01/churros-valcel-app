@extends('layouts.main')

@section('title')
    Crear Producto
@endsection

@section('content')

<div class="container py-5">

    {{-- Encabezado --}}
    <div class="mb-4">

        <div class="d-flex align-items-center gap-3">

            <div class="icono-producto">
                🍩
            </div>

            <div>
                <h2 class="fw-bold mb-1" style="color: #7d1f24;">
                    Nuevo producto
                </h2>

                <p class="text-muted mb-0">
                    Agregá un nuevo producto al catálogo de Churros Valcel.
                </p>
            </div>

        </div>

    </div>


    {{-- Formulario --}}
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4 p-md-5">

            <form method="POST"
                  action="{{ route('producto.store') }}">

                @csrf


                <div class="row g-4">


                    {{-- Nombre --}}
                    <div class="col-md-6">

                        <label for="nombre"
                               class="form-label fw-semibold">

                            Nombre del producto

                        </label>

                        <input type="text"
                               class="form-control form-control-lg"
                               name="nombre"
                               id="nombre"
                               value="{{ old('nombre') }}"
                               placeholder="Ej: Docena rellena"
                               required>

                    </div>


                    {{-- Precio --}}
                    <div class="col-md-6">

                        <label for="precio"
                               class="form-label fw-semibold">

                            Precio

                        </label>

                        <div class="input-group input-group-lg">

                            <span class="input-group-text bg-light">
                                $
                            </span>

                            <input type="number"
                                   class="form-control"
                                   name="precio"
                                   id="precio"
                                   value="{{ old('precio') }}"
                                   placeholder="6500"
                                   min="0"
                                   step="0.01"
                                   required>

                        </div>

                    </div>


                    {{-- Descripción --}}
                    <div class="col-12">

                        <label for="descripcion"
                               class="form-label fw-semibold">

                            Descripción

                        </label>

                        <textarea class="form-control"
                                  name="descripcion"
                                  id="descripcion"
                                  rows="3"
                                  placeholder="Describí brevemente el producto..."
                                  required>{{ old('descripcion') }}</textarea>

                    </div>


                    {{-- Estado --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold mb-3">
                            Estado del producto
                        </label>


                        <div class="row g-3">

                            {{-- Activo --}}
                            <div class="col-md-6">

                                <input type="radio"
                                       class="btn-check"
                                       name="activo"
                                       id="activo"
                                       value="1"
                                       {{ old('activo', 1) == 1 ? 'checked' : '' }}>

                                <label class="estado-option activo"
                                       for="activo">

                                    <div class="estado-icon">
                                        ✓
                                    </div>

                                    <div>
                                        <strong>
                                            Producto activo
                                        </strong>

                                        <small class="d-block text-muted">
                                            Disponible para realizar ventas.
                                        </small>
                                    </div>

                                </label>

                            </div>


                            {{-- Inactivo --}}
                            <div class="col-md-6">

                                <input type="radio"
                                       class="btn-check"
                                       name="activo"
                                       id="inactivo"
                                       value="0"
                                       {{ old('activo') === '0' ? 'checked' : '' }}>

                                <label class="estado-option inactivo"
                                       for="inactivo">

                                    <div class="estado-icon">
                                        ×
                                    </div>

                                    <div>
                                        <strong>
                                            Producto inactivo
                                        </strong>

                                        <small class="d-block text-muted">
                                            No estará disponible para ventas.
                                        </small>
                                    </div>

                                </label>

                            </div>

                        </div>

                    </div>


                    {{-- Separador --}}
                    <div class="col-12">

                        <hr class="my-2">

                    </div>


                    {{-- Botones --}}
                    <div class="col-12 d-flex flex-column flex-sm-row gap-2 justify-content-end">

                        <a href="{{ route('producto.index') }}"
                           class="btn btn-light border rounded-3 px-4">

                            ← Regresar

                        </a>

                        <button type="submit"
                                class="btn btn-valcel rounded-3 px-4">

                            + Crear producto

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>


<style>

    /* ========================================
       ICONO
    ======================================== */

    .icono-producto {

        width: 52px;
        height: 52px;

        display: flex;
        align-items: center;
        justify-content: center;

        background-color: #e7f4f5;

        border-radius: 15px;

        font-size: 25px;

    }


    /* ========================================
       INPUTS
    ======================================== */

    .form-control,
    .input-group-text {

        border-color: #e5e5e5;

    }


    .form-control {

        border-radius: 10px;

    }


    .form-control:focus {

        border-color: #7d1f24;

        box-shadow: 0 0 0 0.2rem rgba(125, 31, 36, 0.10);

    }


    textarea.form-control {

        resize: vertical;

    }


    /* ========================================
       ESTADO DEL PRODUCTO
    ======================================== */

    .estado-option {

        display: flex;

        align-items: center;

        gap: 14px;

        width: 100%;

        padding: 16px;

        border: 1px solid #e5e5e5;

        border-radius: 14px;

        cursor: pointer;

        transition: all .2s ease;

        background: #fff;

    }


    .estado-option:hover {

        border-color: #7d1f24;

        background-color: #fafafa;

    }


    .estado-icon {

        width: 38px;
        height: 38px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 10px;

        font-size: 20px;

        font-weight: bold;

    }


    .estado-option.activo .estado-icon {

        background-color: #e8f7ee;

        color: #198754;

    }


    .estado-option.inactivo .estado-icon {

        background-color: #f8eaea;

        color: #7d1f24;

    }


    /* Estado seleccionado */

    .btn-check:checked + .estado-option {

        border-color: #7d1f24;

        background-color: #fff8f8;

        box-shadow: 0 0 0 2px rgba(125, 31, 36, 0.08);

    }


    /* ========================================
       BOTÓN VALCEL
    ======================================== */

    .btn-valcel {

        background-color: #7d1f24;

        color: white;

        border: none;

    }


    .btn-valcel:hover {

        background-color: #64191d;

        color: white;

        transform: translateY(-1px);

    }


    .btn {

        transition: all .2s ease;

    }

</style>

@endsection