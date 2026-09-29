@extends('layouts.main')

@section('title')
Clientes - Churros Valcel
@endsection

@section('content')

<div class="container py-5">

    {{-- Encabezado --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">

        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="fs-3">👥</span>

                <h1 class="fw-bold mb-0">
                    Clientes
                </h1>
            </div>

            <p class="text-muted mb-0">
                Administrá los clientes de Churros Valcel
            </p>
        </div>


        <div class="d-flex gap-2 mt-3 mt-md-0">

            <a href="{{ route('admin.index') }}"
            class="btn btn-outline-secondary rounded-3 px-4">
                ← Admin
            </a>

            <a href="{{ route('cliente.create') }}"
            class="btn btn-primary rounded-3 px-4">
                + Nuevo cliente
            </a>

        </div>

    </div>


    {{-- Resumen --}}
    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body p-4">

            <div class="d-flex align-items-center justify-content-between">

                <div>
                    <h5 class="fw-bold mb-1">
                        Base de clientes
                    </h5>

                    <p class="text-muted mb-0">
                        Clientes registrados en el sistema
                    </p>
                </div>

                <div class="text-end">

                    <span class="fs-3 fw-bold">
                        {{ $clientes->count() }}
                    </span>

                    <div class="text-muted small">
                        clientes
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Tabla --}}
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr class="text-uppercase small text-muted">

                            <th class="px-4 py-3">
                                #
                            </th>

                            <th class="py-3">
                                Cliente
                            </th>

                            <th class="py-3">
                                Teléfono
                            </th>

                            <th class="py-3">
                                Dirección
                            </th>

                            <th class="py-3">
                                Barrio
                            </th>

                            <th class="py-3">
                                Zona
                            </th>

                            <th class="py-3 text-center">
                                Compras
                            </th>

                            <th class="py-3 text-end px-4">
                                Acciones
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse ($clientes as $cliente)

                            <tr>

                                {{-- ID --}}
                                <td class="px-4 text-muted">
                                    #{{ $cliente->id }}
                                </td>


                                {{-- Cliente --}}
                                <td>

                                    <div class="d-flex align-items-center">

                                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle
                                                    d-flex align-items-center justify-content-center me-3"
                                            style="width: 42px; height: 42px;">

                                            <span class="fw-bold" style="color: #ffff;">
                                                {{ strtoupper(substr($cliente->nombre, 0, 1)) }}
                                            </span>

                                        </div>

                                        <div>

                                            <div class="fw-semibold">
                                                {{ $cliente->nombre }} {{ $cliente->apellido }}
                                            </div>

                                            <small class="text-muted">
                                                Cliente #{{ $cliente->id }}
                                            </small>

                                        </div>

                                    </div>

                                </td>


                                {{-- Teléfono --}}
                                <td>

                                    <span class="text-muted">
                                        📞 {{ $cliente->telefono }}
                                    </span>

                                </td>


                                {{-- Dirección --}}
                                <td>

                                    <span class="text-muted">
                                        {{ $cliente->direccion }}
                                    </span>

                                </td>


                                {{-- Barrio --}}
                                <td>

                                    <span class="badge rounded-pill bg-light text-dark px-3 py-2">
                                        {{ $cliente->barrio }}
                                    </span>

                                </td>


                                {{-- Zona --}}
                                <td>

                                    <span class="badge rounded-pill bg-info bg-opacity-10 text-white px-3 py-2 " style="text-transform: capitalize;">
                                        {{ $cliente->zona }}
                                    </span>

                                </td>


                                {{-- Compras --}}
                                <td class="text-center">

                                    <span class="badge rounded-pill bg-success bg-opacity-10 text-white px-3 py-2">
                                        🛒 {{ $cliente->compras_realizadas }}
                                    </span>

                                </td>


                                {{-- Acciones --}}
                                <td class="text-end px-4">

                                    <div class="d-inline-flex gap-2">

                                        {{-- Editar --}}
                                        <a href="{{ route('cliente.edit', $cliente->id) }}"
                                        class="btn btn-success rounded-3 d-flex align-items-center justify-content-center"
                                        style="width: 36px; height: 36px;"
                                        title="Editar">

                                            <i class="fa-solid fa-pen text-white"></i>

                                        </a>


                                        {{-- Eliminar --}}
                                        <form action="{{ route('cliente.destroy', $cliente->id) }}"
                                            method="POST"
                                            class="m-0">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger rounded-3 d-flex align-items-center justify-content-center"
                                                    style="width: 36px; height: 36px;"
                                                    title="Eliminar"
                                                    onclick="return confirm('¿Eliminar este producto?')">

                                                <i class="fa-solid fa-trash text-white"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>
                            </tr>


                        @empty

                            <tr>

                                <td colspan="8" class="text-center py-5">

                                    <div class="fs-1 mb-2">
                                        👥
                                    </div>

                                    <h5 class="fw-bold">
                                        No hay clientes
                                    </h5>

                                    <p class="text-muted mb-3">
                                        Todavía no registraste ningún cliente.
                                    </p>

                                    <a href="{{ route('cliente.create') }}"
                                    class="btn btn-primary rounded-3">
                                        + Crear primer cliente
                                    </a>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    {{-- Pie --}}
    <div class="text-center text-muted mt-4">

        <small>
            Churros Valcel · Gestión de clientes
        </small>

    </div>

</div>

@endsection
