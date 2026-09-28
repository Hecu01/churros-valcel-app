@extends('layouts.main')

@section('title')
Productos - Churros Valcel
@endsection

@section('content')

<div class="container py-5">

{{-- Encabezado --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">

        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="fs-3">🍩</span>
                <h1 class="fw-bold mb-0">
                    Productos
                </h1>
            </div>

            <p class="text-muted mb-0">
                Administrá los productos de Churros Valcel
            </p>
        </div>

        <div class="d-flex gap-2 mt-3 mt-md-0">

            <a href="{{ route('admin.index') }}"
            class="btn btn-outline-secondary rounded-3 px-4">
                ← Admin
            </a>

            <a href="{{ route('producto.create') }}"
            class="btn btn-primary rounded-3 px-4">
                + Nuevo producto
            </a>

        </div>

    </div>


    {{-- Resumen --}}
    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-4">

            <div class="d-flex align-items-center justify-content-between">

                <div>
                    <h5 class="fw-bold mb-1">
                        Catálogo de productos
                    </h5>

                    <p class="text-muted mb-0">
                        Productos registrados en el sistema
                    </p>
                </div>

                <div class="text-end">
                    <span class="fs-3 fw-bold">
                        {{ $productos->count() }}
                    </span>

                    <div class="text-muted small">
                        productos
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
                                Producto
                            </th>

                            <th class="py-3">
                                Descripción
                            </th>

                            <th class="py-3">
                                Precio
                            </th>

                            <th class="py-3 text-center">
                                Estado
                            </th>

                            <th class="py-3 text-end px-4">
                                Acciones
                            </th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($productos as $producto)

                            <tr>

                                {{-- ID --}}
                                <td class="px-4 text-muted">
                                    #{{ $producto->id }}
                                </td>


                                {{-- Nombre --}}
                                <td>
                                    <div class="fw-semibold">
                                        {{ $producto->nombre }}
                                    </div>
                                </td>


                                {{-- Descripción --}}
                                <td>
                                    <span class="text-muted">
                                        {{ $producto->descripcion ?: 'Sin descripción' }}
                                    </span>
                                </td>


                                {{-- Precio --}}
                                <td>
                                    <span class="fw-bold">
                                        ${{ number_format($producto->precio, 2, ',', '.') }}
                                    </span>
                                </td>


                                {{-- Estado --}}
                                <td class="text-center">

                                    @if ($producto->activo)

                                        <span class="badge rounded-pill bg-primary bg-opacity-10 text-white px-3 py-2">
                                            ● Activo
                                        </span>

                                    @else

                                        <span class="badge rounded-pill bg-warning bg-opacity-10 text-dark px-3 py-2">
                                            ● Inactivo
                                        </span>

                                    @endif

                                </td>


                                {{-- Acciones --}}
                                <td class="text-end px-4">

                                    <div class="d-inline-flex gap-2">

                                        {{-- Editar --}}
                                        <a href="{{ route('producto.edit', $producto->id) }}"
                                        class="btn btn-success rounded-3 d-flex align-items-center justify-content-center"
                                        style="width: 36px; height: 36px;"
                                        title="Editar">

                                            <i class="fa-solid fa-pen text-white"></i>

                                        </a>


                                        {{-- Eliminar --}}
                                        <form action="{{ route('producto.destroy', $producto->id) }}"
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
                                <td colspan="6" class="text-center py-5">

                                    <div class="fs-1 mb-2">
                                        🍩
                                    </div>

                                    <h5 class="fw-bold">
                                        No hay productos
                                    </h5>

                                    <p class="text-muted mb-3">
                                        Todavía no registraste ningún producto.
                                    </p>

                                    <a href="{{ route('producto.create') }}"
                                    class="btn btn-primary rounded-3">
                                        + Crear primer producto
                                    </a>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>


</div>

@endsection
