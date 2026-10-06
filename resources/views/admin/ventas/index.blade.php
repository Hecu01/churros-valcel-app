@extends('layouts.admin')

@section('title')
    Ventas - Churros Valcel
@endsection

@section('content')

<div class="admin-page">

    {{-- ENCABEZADO --}}
    <div class="page-header">

        <div>

            <div class="page-eyebrow">
                VENTAS
            </div>

            <h1>
                Ventas
            </h1>

            <p>
                Administrá las ventas y pedidos de Churros Valcel.
            </p>

        </div>

        <div class="page-header-action">

            <a
                href="{{ route('venta.create') }}"
                class="btn-admin-primary"
            >
                <i class="fa-solid fa-plus"></i>
                Registrar venta
            </a>

        </div>

    </div>


    {{-- RESUMEN --}}
    <div class="row g-4 mb-4">

        {{-- CANTIDAD DE VENTAS --}}
        <div class="col-12 col-md-6">

            <div class="admin-panel h-100">

                <div class="d-flex align-items-center justify-content-between">

                    <div>

                        <span class="text-muted">
                            Ventas registradas
                        </span>

                        <div
                            class="fw-bold mt-1"
                            style="
                                font-size: 30px;
                                color: var(--valcel-text);
                            "
                        >
                            {{ $ventas->count() }}
                        </div>

                    </div>

                    <div
                        class="d-flex align-items-center justify-content-center rounded-4"
                        style="
                            width: 55px;
                            height: 55px;
                            background: var(--valcel-orange-light);
                            color: var(--valcel-orange);
                            font-size: 22px;
                        "
                    >
                        <i class="fa-solid fa-receipt"></i>
                    </div>

                </div>

            </div>

        </div>


        {{-- TOTAL VENDIDO --}}
        <div class="col-12 col-md-6">

            <div class="admin-panel h-100">

                <div class="d-flex align-items-center justify-content-between">

                    <div>

                        <span class="text-muted">
                            Total registrado
                        </span>

                        <div
                            class="fw-bold mt-1"
                            style="
                                font-size: 30px;
                                color: var(--valcel-green);
                            "
                        >
                            ${{ number_format($ventas->sum('total'), 2, ',', '.') }}
                        </div>

                    </div>

                    <div
                        class="d-flex align-items-center justify-content-center rounded-4"
                        style="
                            width: 55px;
                            height: 55px;
                            background: var(--valcel-green-light);
                            color: var(--valcel-green);
                            font-size: 22px;
                        "
                    >
                        <i class="fa-solid fa-dollar-sign"></i>
                    </div>

                </div>

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
                            Cliente
                        </th>

                        <th>
                            Fecha
                        </th>

                        <th>
                            Hora
                        </th>

                        <th>
                            Total
                        </th>

                        <th>
                            Medio de pago
                        </th>

                        <th>
                            Observaciones
                        </th>

                        <th >
                            Acciones
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse ($ventas as $venta)

                        <tr>




                            {{-- CLIENTE --}}
                            <td>

                                <div class="d-flex align-items-center">

                                    <div
                                        class="d-flex align-items-center justify-content-center rounded-circle me-3"
                                        style="
                                            width: 40px;
                                            height: 40px;
                                            background: var(--valcel-blue-light);
                                            color: var(--valcel-blue);
                                            font-weight: 700;
                                        "
                                    >
                                        {{ strtoupper(substr($venta->cliente->nombre, 0, 1)) }}
                                    </div>

                                    <div>

                                        <div class="fw-semibold">

                                            {{ $venta->cliente->nombre }}
                                            {{ $venta->cliente->apellido }}

                                        </div>

                                        <small class="text-muted">
                                            Cliente #{{ $venta->cliente->id }}
                                        </small>

                                    </div>

                                </div>

                            </td>


                            {{-- FECHA --}}
                            <td>

                                <span class="text-muted">

                                    <i class="fa-regular fa-calendar me-1"></i>

                                    {{ date('d/m/Y', strtotime($venta->fecha)) }}

                                </span>

                            </td>


                            {{-- HORA --}}
                            <td>

                                <span class="text-muted">

                                    <i class="fa-regular fa-clock me-1"></i>

                                    {{ date('H:i', strtotime($venta->fecha)) }}

                                </span>

                            </td>


                            {{-- TOTAL --}}
                            <td>

                                <strong
                                    style="color: var(--valcel-green);"
                                >
                                    ${{ number_format($venta->total, 2, ',', '.') }}
                                </strong>

                            </td>


                            {{-- MEDIO DE PAGO --}}
                            <td>

                                @php
                                    $medioPago = strtolower($venta->medio_pago ?? '');
                                @endphp


                                @if ($medioPago === 'efectivo')

                                    <span class="admin-badge"
                                          style="
                                              color: var(--valcel-green);
                                              background: var(--valcel-green-light);
                                          "
                                    >
                                        <i class="fa-solid fa-money-bill-wave"> </i> Efectivo
                                    </span>


                                @elseif ($medioPago === 'transferencia')

                                    <span class="admin-badge admin-badge-blue">
                                        <i class="fa-solid fa-building-columns"> </i> Transferencia
                                    </span>


                                @elseif ($medioPago === 'mercado pago')

                                    <span class="admin-badge"
                                          style="
                                              color: #1687a7;
                                              background: #e6f7fb;
                                          "
                                    >
                                        <i class="fa-solid fa-mobile-screen-button"></i>
                                        Mercado Pago
                                    </span>


                                @else

                                    <span class="admin-badge"
                                          style="
                                              color: var(--valcel-muted);
                                              background: #f1f3f6;
                                          "
                                    >
                                        {{ $venta->medio_pago ?: 'Sin especificar' }}
                                    </span>

                                @endif

                            </td>


                            {{-- OBSERVACIONES --}}
                            <td
                                style="
                                    width: 250px;
                                    max-width: 250px;
                                "
                            >

                                @if ($venta->observaciones)

                                    <span class="text-muted">

                                        {{ $venta->observaciones }}

                                    </span>

                                @else

                                    <span class="text-muted fst-italic">

                                        Sin observaciones

                                    </span>

                                @endif

                            </td>


                            {{-- ACCIONES --}}
                            <td class="text-center">

                                {{-- Ver detalle --}}
                                <a href="{{ route('venta.show', $venta->id) }}" class="admin-action admin-action-edit"title="Ver detalle">
                                    <i class="fa-solid fa-eye"></i>
                                </a>


                                {{-- Ver ticket --}}
                                <a href="{{ route('venta.ticket', $venta->id) }}" class="admin-action admin-action-edit mt-1" title="Ver ticket" >
                                    <i class="fa-solid fa-receipt"></i>
                                </a>

                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td
                                colspan="8"
                                class="text-center"
                                style="padding: 60px 20px;"
                            >

                                <div
                                    class="d-flex align-items-center justify-content-center mx-auto mb-3"
                                    style="
                                        width: 65px;
                                        height: 65px;
                                        border-radius: 18px;
                                        background: var(--valcel-orange-light);
                                        color: var(--valcel-orange);
                                        font-size: 26px;
                                    "
                                >
                                    <i class="fa-solid fa-receipt"></i>
                                </div>

                                <h5
                                    class="fw-bold"
                                    style="color: var(--valcel-text);"
                                >
                                    No hay ventas registradas
                                </h5>

                                <p class="text-muted mb-3">
                                    Todavía no registraste ninguna venta.
                                </p>

                                <a
                                    href="{{ route('venta.create') }}"
                                    class="btn-admin-primary"
                                >
                                    <i class="fa-solid fa-plus"></i>
                                    Registrar primera venta
                                </a>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- PIE --}}
    <div class="admin-page-footer">

        <span>
            Gestión de ventas
        </span>

        <span>·</span>

        <span>
            Churros Valcel
        </span>

    </div>

</div>

@endsection