@extends('layouts.admin')

@section('title')
Editar cliente - Churros Valcel
@endsection

@section('content')

<div class="admin-page">

{{-- ENCABEZADO --}}
<div class="page-header">

    <div>
        <div class="page-eyebrow">
            CLIENTES
        </div>

        <h1>Editar cliente</h1>

        <p>
            Actualizá los datos de {{ $cliente->nombre }} {{ $cliente->apellido }}
        </p>
    </div>

    <div class="page-header-action">

        <a href="{{ route('cliente.index') }}"
           class="btn-admin-primary"
           style="background: #687791;">

            <i class="fa-solid fa-arrow-left"></i>

            Volver a clientes

        </a>

    </div>

</div>


{{-- PANEL --}}
<div class="admin-panel">

    <form method="POST"
          action="{{ route('cliente.update', $cliente->id) }}">

        @csrf
        @method('PUT')


        {{-- DATOS PERSONALES --}}
        <div class="mb-4">

            <div class="d-flex align-items-center gap-3 mb-4">

                <div
                    style="
                        width: 50px;
                        height: 50px;
                        border-radius: 12px;
                        background: #eaf0ff;
                        color: #315bd6;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 21px;
                    "
                >
                    <i class="fa-solid fa-user"></i>
                </div>

                <div>

                    <h5 class="mb-1 fw-bold"
                        style="color: var(--valcel-text);">

                        Datos personales

                    </h5>

                    <span style="color: var(--valcel-muted); font-size: 14px;">

                        Información básica del cliente

                    </span>

                </div>

            </div>


            <div class="row g-3">

                <div class="col-md-6">

                    <label for="nombre"
                           class="form-label fw-semibold"
                           style="color: var(--valcel-text);">

                        Nombre

                    </label>

                    <input
                        type="text"
                        class="form-control"
                        name="nombre"
                        id="nombre"
                        value="{{ $cliente->nombre }}"
                        required
                    >

                </div>


                <div class="col-md-6">

                    <label for="apellido"
                           class="form-label fw-semibold"
                           style="color: var(--valcel-text);">

                        Apellido

                    </label>

                    <input
                        type="text"
                        class="form-control"
                        name="apellido"
                        id="apellido"
                        value="{{ $cliente->apellido }}"
                        required
                    >

                </div>


                <div class="col-md-6">

                    <label for="telefono"
                           class="form-label fw-semibold"
                           style="color: var(--valcel-text);">

                        Teléfono

                    </label>

                    <input
                        type="number"
                        class="form-control"
                        name="telefono"
                        id="telefono"
                        placeholder="3364123456"
                        value="{{ $cliente->telefono }}"
                    >

                </div>


                <div class="col-md-6">

                    <label for="compras_realizadas"
                           class="form-label fw-semibold"
                           style="color: var(--valcel-text);">

                        Compras realizadas

                    </label>

                    <input
                        type="number"
                        class="form-control"
                        name="compras_realizadas"
                        id="compras_realizadas"
                        value="{{ $cliente->compras_realizadas }}"
                        min="0"
                    >

                </div>

            </div>

        </div>


        <hr class="my-4"
            style="border-color: #e9edf4;">


        {{-- INFORMACIÓN DE ENTREGA --}}
        <div class="mb-4">

            <div class="d-flex align-items-center gap-3 mb-4">

                <div
                    style="
                        width: 50px;
                        height: 50px;
                        border-radius: 12px;
                        background: #e8f8f1;
                        color: #20a873;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 21px;
                    "
                >
                    <i class="fa-solid fa-location-dot"></i>
                </div>

                <div>

                    <h5 class="mb-1 fw-bold"
                        style="color: var(--valcel-text);">

                        Información de entrega

                    </h5>

                    <span style="color: var(--valcel-muted); font-size: 14px;">

                        Dirección y ubicación del cliente

                    </span>

                </div>

            </div>


            <div class="row g-3">

                <div class="col-12">

                    <label for="direccion"
                           class="form-label fw-semibold"
                           style="color: var(--valcel-text);">

                        Dirección

                    </label>

                    <input
                        type="text"
                        class="form-control"
                        name="direccion"
                        id="direccion"
                        placeholder="Ej: Gutemberg 123"
                        value="{{ $cliente->direccion }}"
                    >

                </div>


                <div class="col-md-6">

                    <label for="barrio"
                           class="form-label fw-semibold"
                           style="color: var(--valcel-text);">

                        Barrio

                    </label>

                    <input
                        type="text"
                        class="form-control"
                        name="barrio"
                        id="barrio"
                        placeholder="Ej: Yaguaron"
                        value="{{ $cliente->barrio }}"
                    >

                </div>


                <div class="col-md-6">

                    <label for="zona"
                           class="form-label fw-semibold"
                           style="color: var(--valcel-text);">

                        Zona

                    </label>

                    <input
                        type="text"
                        class="form-control"
                        name="zona"
                        id="zona"
                        placeholder="Ej: Norte"
                        value="{{ $cliente->zona }}"
                    >

                </div>

            </div>

        </div>


        {{-- ACCIONES --}}
        <div class="d-flex flex-column flex-sm-row justify-content-end gap-2 mt-5">

            <a
                href="{{ route('cliente.index') }}"
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
                <i class="fa-solid fa-check"></i>
                Guardar cambios
            </button>

        </div>
    </form>

</div>


{{-- INFORMACIÓN --}}
<div class="admin-page-footer">

    <span>
        Cliente #{{ $cliente->id }}
    </span>

    <span>·</span>

    <span>
        Churros Valcel
    </span>

</div>

</div>

@endsection
