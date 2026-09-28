@extends('layouts.main')

@section('title')
    Editar cliente - Churros Valcel
@endsection

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8 col-xl-7">

            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                {{-- Encabezado --}}
                <div class="p-4 text-white"
                     style="background: linear-gradient(135deg, #212529, #343a40);">

                    <div class="d-flex align-items-center">

                        <div class="bg-white text-dark rounded-circle d-flex align-items-center justify-content-center me-3"
                             style="width: 55px; height: 55px; font-size: 25px;">
                            👤
                        </div>

                        <div>
                            <h2 class="fw-bold mb-1">
                                Editar cliente
                            </h2>

                            <p class="mb-0 opacity-75">
                                Actualizá los datos de {{ $cliente->nombre }} {{ $cliente->apellido }}
                            </p>
                        </div>

                    </div>

                </div>


                {{-- Formulario --}}
                <div class="card-body p-4 p-md-5">

                    <form method="POST"
                          action="{{ route('cliente.update', $cliente->id) }}">

                        @csrf
                        @method('PUT')


                        {{-- Datos personales --}}
                        <div class="mb-4">

                            <h5 class="fw-bold mb-3">
                                <span class="me-2">🧑</span>
                                Datos personales
                            </h5>

                            <div class="row g-3">

                                <div class="col-md-6">

                                    <label for="nombre" class="form-label fw-semibold">
                                        Nombre
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control form-control-lg rounded-3"
                                        name="nombre"
                                        id="nombre"
                                        value="{{ $cliente->nombre }}"
                                        required
                                    >

                                </div>


                                <div class="col-md-6">

                                    <label for="apellido" class="form-label fw-semibold">
                                        Apellido
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control form-control-lg rounded-3"
                                        name="apellido"
                                        id="apellido"
                                        value="{{ $cliente->apellido }}"
                                        required
                                    >

                                </div>


                                <div class="col-md-6">

                                    <label for="telefono" class="form-label fw-semibold">
                                        Teléfono
                                    </label>

                                    <input
                                        type="number"
                                        class="form-control form-control-lg rounded-3"
                                        name="telefono"
                                        id="telefono"
                                        placeholder="3364123456"
                                        value="{{ $cliente->telefono }}"
                                    >

                                </div>


                                <div class="col-md-6">

                                    <label for="compras_realizadas" class="form-label fw-semibold">
                                        Compras realizadas
                                    </label>

                                    <input
                                        type="number"
                                        class="form-control form-control-lg rounded-3"
                                        name="compras_realizadas"
                                        id="compras_realizadas"
                                        value="{{ $cliente->compras_realizadas }}"
                                        min="0"
                                    >

                                </div>

                            </div>

                        </div>


                        <hr class="my-4">


                        {{-- Dirección --}}
                        <div class="mb-4">

                            <h5 class="fw-bold mb-3">
                                <span class="me-2">📍</span>
                                Información de entrega
                            </h5>

                            <div class="row g-3">

                                <div class="col-12">

                                    <label for="direccion" class="form-label fw-semibold">
                                        Dirección
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control form-control-lg rounded-3"
                                        name="direccion"
                                        id="direccion"
                                        placeholder="Ej: Gutemberg 123"
                                        value="{{ $cliente->direccion }}"
                                    >

                                </div>


                                <div class="col-md-6">

                                    <label for="barrio" class="form-label fw-semibold">
                                        Barrio
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control form-control-lg rounded-3"
                                        name="barrio"
                                        id="barrio"
                                        placeholder="Ej: Yaguaron"
                                        value="{{ $cliente->barrio }}"
                                    >

                                </div>


                                <div class="col-md-6">

                                    <label for="zona" class="form-label fw-semibold">
                                        Zona
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control form-control-lg rounded-3"
                                        name="zona"
                                        id="zona"
                                        placeholder="Ej: Norte"
                                        value="{{ $cliente->zona }}"
                                    >

                                </div>

                            </div>

                        </div>


                        {{-- Botones --}}
                        <div class="d-flex flex-column flex-sm-row justify-content-end gap-2 mt-4">

                            <a
                                href="{{ route('cliente.index') }}"
                                class="btn btn-outline-secondary btn-lg rounded-3 px-4"
                            >
                                ← Cancelar
                            </a>

                            <button
                                type="submit"
                                class="btn btn-success btn-lg rounded-3 px-4 fw-semibold"
                            >
                                ✓ Guardar cambios
                            </button>

                        </div>

                    </form>

                </div>

            </div>


            {{-- Información inferior --}}
            <div class="text-center text-muted mt-3 small">
                Cliente #{{ $cliente->id }} · Churros Valcel
            </div>

        </div>

    </div>

</div>

@endsection
