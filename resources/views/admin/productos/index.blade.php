@extends('layouts.admin')

@section('title')
Productos - Churros Valcel
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
            Productos
        </h1>

        <p>
            Administrá los productos de Churros Valcel
        </p>

    </div>


    <div class="page-header-action">

        <a
            href="{{ route('producto.create') }}"
            class="btn-admin-primary"
        >

            <i class="fa-solid fa-plus"></i>

            Nuevo producto

        </a>

    </div>

</div>


{{-- RESUMEN --}}
<div class="admin-panel mb-4">

    <div class="search-header">

        <div>

            <h5>
                Catálogo de productos
            </h5>

            <span>
                Productos registrados en el sistema
            </span>

        </div>


        <div class="client-counter">

            <strong>
                {{ $productos->count() }}
            </strong>

            <span>
                productos
            </span>

        </div>

    </div>

</div>


{{-- TABLA --}}
<div class="admin-table-wrapper">

    <div class="table-responsive">

        <table class="table admin-table">

            <thead>

                <tr>

                    <th>
                        #
                    </th>

                    <th>
                        Producto
                    </th>

                    <th>
                        Descripción
                    </th>

                    <th>
                        Precio
                    </th>

                    <th class="text-center">
                        Estado
                    </th>

                    <th class="text-end">
                        Acciones
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse ($productos as $producto)

                    <tr>

                        {{-- ID --}}
                        <td>
                            <span class="text-muted">
                                #{{ $producto->id }}
                            </span>
                        </td>


                        {{-- PRODUCTO --}}
                        <td>

                            <strong>
                                {{ $producto->nombre }}
                            </strong>

                        </td>


                        {{-- DESCRIPCIÓN --}}
                        <td>

                            <span class="text-muted">

                                {{ $producto->descripcion ?: 'Sin descripción' }}

                            </span>

                        </td>


                        {{-- PRECIO --}}
                        <td>

                            <strong style="color: var(--valcel-text);">

                                ${{ number_format($producto->precio, 2, ',', '.') }}

                            </strong>

                        </td>


                        {{-- ESTADO --}}
                        <td class="text-center">

                            @if ($producto->activo)

                                <span class="admin-badge admin-badge-blue">

                                    <i class="fa-solid fa-circle-check me-1"></i>

                                    Activo

                                </span>

                            @else

                                <span
                                    class="admin-badge"
                                    style="
                                        color: #b7791f;
                                        background: #fff4df;
                                    "
                                >

                                    <i class="fa-solid fa-circle-xmark me-1"></i>

                                    Inactivo

                                </span>

                            @endif

                        </td>


                        {{-- ACCIONES --}}
                        <td class="text-end">

                            <div class="d-inline-flex gap-2">

                                {{-- EDITAR --}}
                                <a
                                    href="{{ route('producto.edit', $producto->id) }}"
                                    class="admin-action admin-action-edit"
                                    title="Editar"
                                >

                                    <i class="fa-solid fa-pen"></i>

                                </a>


                                {{-- ELIMINAR --}}
                                <form
                                    action="{{ route('producto.destroy', $producto->id) }}"
                                    method="POST"
                                    class="m-0"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="admin-action admin-action-delete"
                                        title="Eliminar"
                                        onclick="return confirm('¿Eliminar este producto?')"
                                    >

                                        <i class="fa-solid fa-trash"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>


                @empty

                    <tr>

                        <td colspan="6" class="text-center py-5">

                            <div
                                class="mb-3"
                                style="
                                    font-size: 40px;
                                    color: #9aa7bb;
                                "
                            >
                                <i class="fa-solid fa-box-open"></i>
                            </div>


                            <h5
                                class="fw-bold"
                                style="color: var(--valcel-text);"
                            >
                                No hay productos
                            </h5>


                            <p
                                class="mb-3"
                                style="color: var(--valcel-muted);"
                            >
                                Todavía no registraste ningún producto.
                            </p>


                            <a
                                href="{{ route('producto.create') }}"
                                class="btn-admin-primary"
                            >

                                <i class="fa-solid fa-plus"></i>

                                Crear primer producto

                            </a>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>


{{-- FOOTER --}}
<div class="admin-page-footer">

    <span>
        {{ $productos->count() }} productos registrados
    </span>

    <span>·</span>

    <span>
        Churros Valcel
    </span>

</div>

</div>

@endsection
