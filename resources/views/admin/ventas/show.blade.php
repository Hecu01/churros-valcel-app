@extends('layouts.admin')

@section('title')
    Venta #{{ $venta->id }} - Churros Valcel
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
                Detalle de venta
            </h1>

            <p>
                Información completa de la operación #{{ $venta->id }}.
            </p>

        </div>

        <div class="page-header-action">

            <a
                href="{{ route('venta.index') }}"
                class="btn-admin-primary"
                style="background: #687791;"
            >
                <i class="fa-solid fa-arrow-left"></i>
                Volver a ventas
            </a>

        </div>

    </div>


    {{-- CABECERA DE LA VENTA --}}
    <div class="admin-panel mb-4">

        <div class="sale-header">

            <div>

                <span class="sale-number">
                    Venta #{{ $venta->id }}
                </span>

                <div class="sale-date">

                    <i class="fa-regular fa-calendar"></i>

                    {{ date('d/m/Y', strtotime($venta->fecha)) }}

                    <span>·</span>

                    <i class="fa-regular fa-clock"></i>

                    {{ date('H:i', strtotime($venta->fecha)) }}

                </div>

            </div>


            {{-- ESTADO --}}
            @php
                $estado = strtolower($venta->estado ?? 'pendiente');
            @endphp

            @if ($estado === 'completada')

                <span class="sale-status status-completed">
                    <i class="fa-solid fa-circle-check"></i>
                    Completada
                </span>

            @elseif ($estado === 'cancelada')

                <span class="sale-status status-cancelled">
                    <i class="fa-solid fa-circle-xmark"></i>
                    Cancelada
                </span>

            @else

                <span class="sale-status status-pending">
                    <i class="fa-solid fa-clock"></i>
                    Pendiente
                </span>

            @endif

        </div>

    </div>


    {{-- CLIENTE + RESUMEN --}}
    <div class="row g-4 mb-4">


        {{-- CLIENTE --}}
        <div class="col-lg-7">

            <div class="admin-panel h-100">

                <div class="detail-section-title">

                    <div class="detail-icon detail-icon-blue">
                        <i class="fa-solid fa-user"></i>
                    </div>

                    <div>

                        <h5>
                            Cliente
                        </h5>

                        <span>
                            Información del cliente
                        </span>

                    </div>

                </div>


                <div class="client-detail">

                    <div class="client-avatar">

                        {{ strtoupper(substr($venta->cliente->nombre, 0, 1)) }}

                    </div>


                    <div>

                        <h4>
                            {{ $venta->cliente->nombre }}
                            {{ $venta->cliente->apellido }}
                        </h4>

                        <span class="text-muted">
                            Cliente #{{ $venta->cliente->id }}
                        </span>

                    </div>

                </div>


                <div class="client-info-grid">

                    @if ($venta->cliente->telefono)

                        <div class="info-item">

                            <i class="fa-solid fa-phone"></i>

                            <div>

                                <small>
                                    Teléfono
                                </small>

                                <strong>
                                    {{ $venta->cliente->telefono }}
                                </strong>

                            </div>

                        </div>

                    @endif


                    @if ($venta->cliente->direccion)

                        <div class="info-item">

                            <i class="fa-solid fa-location-dot"></i>

                            <div>

                                <small>
                                    Dirección
                                </small>

                                <strong>
                                    {{ $venta->cliente->direccion }}
                                </strong>

                            </div>

                        </div>

                    @endif


                    @if ($venta->cliente->barrio)

                        <div class="info-item">

                            <i class="fa-solid fa-map"></i>

                            <div>

                                <small>
                                    Barrio
                                </small>

                                <strong>
                                    {{ $venta->cliente->barrio }}
                                </strong>

                            </div>

                        </div>

                    @endif


                    @if ($venta->cliente->zona)

                        <div class="info-item">

                            <i class="fa-solid fa-location-crosshairs"></i>

                            <div>

                                <small>
                                    Zona
                                </small>

                                <strong>
                                    {{ $venta->cliente->zona }}
                                </strong>

                            </div>

                        </div>

                    @endif

                </div>

            </div>

        </div>


        {{-- RESUMEN --}}
        <div class="col-lg-5">

            <div class="admin-panel h-100">

                <div class="detail-section-title">

                    <div class="detail-icon detail-icon-green">
                        <i class="fa-solid fa-wallet"></i>
                    </div>

                    <div>

                        <h5>
                            Resumen de pago
                        </h5>

                        <span>
                            Detalle del importe
                        </span>

                    </div>

                </div>


                <div class="payment-summary">

                    <div class="summary-row">

                        <span>
                            Subtotal
                        </span>

                        <strong>
                            ${{ number_format($venta->subtotal ?? $venta->total, 2, ',', '.') }}
                        </strong>

                    </div>


                    @if (($venta->descuento ?? 0) > 0)

                        <div class="summary-row">

                            <span>
                                Descuento
                            </span>

                            <strong class="text-danger">
                                - ${{ number_format($venta->descuento, 2, ',', '.') }}
                            </strong>

                        </div>

                    @endif


                    @if (($venta->costo_envio ?? 0) > 0)

                        <div class="summary-row">

                            <span>
                                Envío
                            </span>

                            <strong>
                                ${{ number_format($venta->costo_envio, 2, ',', '.') }}
                            </strong>

                        </div>

                    @endif


                    <hr>


                    <div class="summary-total">

                        <span>
                            Total
                        </span>

                        <strong>
                            ${{ number_format($venta->total, 2, ',', '.') }}
                        </strong>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- PRODUCTOS --}}
    <div class="admin-panel mb-4">

        <div class="detail-section-title">

            <div class="detail-icon detail-icon-orange">
                <i class="fa-solid fa-cart-shopping"></i>
            </div>

            <div>

                <h5>
                    Productos vendidos
                </h5>

                <span>
                    Detalle de los productos incluidos en la venta
                </span>

            </div>

        </div>


        <div class="table-responsive">

            <table class="table admin-table sale-products-table">

                <thead>

                    <tr>

                        <th>
                            Producto
                        </th>

                        <th class="text-center">
                            Cantidad
                        </th>

                        <th class="text-end">
                            Precio
                        </th>

                        <th class="text-end">
                            Subtotal
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse ($venta->detalles as $detalle)

                        <tr>

                            <td>

                                <div class="product-name">

                                    <div class="product-mini-icon">
                                        <i class="fa-solid fa-box"></i>
                                    </div>

                                    <strong>
                                        {{ $detalle->producto->nombre }}
                                    </strong>

                                </div>

                            </td>


                            <td class="text-center">

                                <span class="quantity-badge">
                                    {{ $detalle->cantidad }}
                                </span>

                            </td>


                            <td class="text-end">

                                ${{ number_format($detalle->precio, 2, ',', '.') }}

                            </td>


                            <td class="text-end">

                                <strong>
                                    ${{ number_format($detalle->subtotal, 2, ',', '.') }}
                                </strong>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="4"
                                class="text-center text-muted py-4"
                            >
                                No hay productos asociados a esta venta.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- PAGO + OBSERVACIONES --}}
    <div class="row g-4 mb-4">


        {{-- MEDIO DE PAGO --}}
        <div class="col-md-6">

            <div class="admin-panel h-100">

                <div class="detail-section-title">

                    <div class="detail-icon detail-icon-blue">
                        <i class="fa-solid fa-money-bill-wave"></i>
                    </div>

                    <div>

                        <h5>
                            Medio de pago
                        </h5>

                        <span>
                            Forma en la que se realizó el pago
                        </span>

                    </div>

                </div>


                @php
                    $medioPago = strtolower($venta->medio_pago ?? '');
                @endphp


                <div class="payment-method">

                    @if ($medioPago === 'efectivo')

                        <i class="fa-solid fa-money-bill-wave"></i>

                        <strong>
                            Efectivo
                        </strong>

                    @elseif ($medioPago === 'transferencia')

                        <i class="fa-solid fa-building-columns"></i>

                        <strong>
                            Transferencia
                        </strong>

                    @elseif ($medioPago === 'mercado pago')

                        <i class="fa-solid fa-mobile-screen-button"></i>

                        <strong>
                            Mercado Pago
                        </strong>

                    @else

                        <i class="fa-solid fa-wallet"></i>

                        <strong>
                            {{ $venta->medio_pago ?: 'Sin especificar' }}
                        </strong>

                    @endif

                </div>

            </div>

        </div>


        {{-- OBSERVACIONES --}}
        <div class="col-md-6">

            <div class="admin-panel h-100">

                <div class="detail-section-title">

                    <div class="detail-icon detail-icon-orange">
                        <i class="fa-solid fa-note-sticky"></i>
                    </div>

                    <div>

                        <h5>
                            Observaciones
                        </h5>

                        <span>
                            Notas de la venta
                        </span>

                    </div>

                </div>


                @if ($venta->observaciones)

                    <p class="observation-text mb-0">
                        {{ $venta->observaciones }}
                    </p>

                @else

                    <p class="text-muted fst-italic mb-0">
                        Sin observaciones.
                    </p>

                @endif

            </div>

        </div>

    </div>


    {{-- ACCIONES --}}
    <div class="admin-panel">

        <div class="d-flex flex-column flex-sm-row justify-content-end gap-2">

            <a
                href="{{ route('venta.ticket', $venta->id) }}"
                class="btn-admin-primary"
                target="_blank"
            >
                <i class="fa-solid fa-receipt"></i>
                Ver ticket
            </a>

            <button
                type="button"
                class="btn btn-outline-secondary px-4 d-inline-flex align-items-center justify-content-center"
                style="border-radius: 10px;"
                onclick="window.print()"
            >
                <i class="fa-solid fa-print me-2"></i>
                Imprimir
            </button>

        </div>

    </div>


    {{-- FOOTER --}}
    <div class="admin-page-footer">

        <span>
            Venta #{{ $venta->id }}
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

    /* CABECERA */

    .sale-header {

        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;

    }


    .sale-number {

        display: block;

        font-size: 25px;
        font-weight: 800;

        color: var(--valcel-text);

        margin-bottom: 7px;

    }


    .sale-date {

        display: flex;
        align-items: center;
        gap: 7px;

        color: var(--valcel-muted);

        font-size: 14px;

    }


    /* ESTADO */

    .sale-status {

        display: inline-flex;
        align-items: center;
        gap: 7px;

        padding: 8px 14px;

        border-radius: 50px;

        font-size: 13px;
        font-weight: 700;

    }


    .status-completed {

        color: var(--valcel-green);
        background: var(--valcel-green-light);

    }


    .status-pending {

        color: #b7791f;
        background: var(--valcel-orange-light);

    }


    .status-cancelled {

        color: #d93649;
        background: #ffebed;

    }


    /* TÍTULOS DE SECCIÓN */

    .detail-section-title {

        display: flex;
        align-items: center;
        gap: 13px;

        margin-bottom: 25px;

    }


    .detail-section-title h5 {

        margin: 0 0 3px;

        color: var(--valcel-text);

        font-weight: 800;

    }


    .detail-section-title span {

        color: var(--valcel-muted);

        font-size: 13px;

    }


    .detail-icon {

        width: 43px;
        height: 43px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 12px;

        flex-shrink: 0;

    }


    .detail-icon-blue {

        color: var(--valcel-blue);
        background: var(--valcel-blue-light);

    }


    .detail-icon-green {

        color: var(--valcel-green);
        background: var(--valcel-green-light);

    }


    .detail-icon-orange {

        color: var(--valcel-orange);
        background: var(--valcel-orange-light);

    }


    /* CLIENTE */

    .client-detail {

        display: flex;
        align-items: center;
        gap: 14px;

        margin-bottom: 25px;

    }


    .client-avatar {

        width: 54px;
        height: 54px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 16px;

        color: var(--valcel-blue);
        background: var(--valcel-blue-light);

        font-size: 21px;
        font-weight: 800;

    }


    .client-detail h4 {

        margin: 0 0 3px;

        color: var(--valcel-text);

        font-size: 18px;
        font-weight: 800;

    }


    .client-info-grid {

        display: grid;

        grid-template-columns: repeat(2, 1fr);

        gap: 18px;

        padding-top: 20px;

        border-top: 1px solid #edf0f5;

    }


    .info-item {

        display: flex;
        align-items: flex-start;
        gap: 10px;

    }


    .info-item > i {

        margin-top: 3px;

        color: var(--valcel-blue);

        width: 16px;

    }


    .info-item small {

        display: block;

        color: var(--valcel-muted);

        font-size: 12px;

        margin-bottom: 2px;

    }


    .info-item strong {

        display: block;

        color: var(--valcel-text);

        font-size: 13px;

    }


    /* RESUMEN */

    .payment-summary {

        margin-top: 5px;

    }


    .summary-row {

        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 20px;

        padding: 9px 0;

        color: var(--valcel-muted);

        font-size: 14px;

    }


    .summary-row strong {

        color: var(--valcel-text);

    }


    .payment-summary hr {

        border-color: #e9edf4;

        margin: 12px 0;

    }


    .summary-total {

        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 20px;

    }


    .summary-total span {

        color: var(--valcel-text);

        font-weight: 700;

    }


    .summary-total strong {

        color: var(--valcel-green);

        font-size: 25px;

        font-weight: 800;

    }


    /* PRODUCTOS */

    .sale-products-table {

        margin-top: 5px;

    }


    .product-name {

        display: flex;
        align-items: center;
        gap: 11px;

    }


    .product-mini-icon {

        width: 34px;
        height: 34px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 9px;

        color: var(--valcel-green);
        background: var(--valcel-green-light);

        font-size: 13px;

    }


    .quantity-badge {

        display: inline-flex;
        align-items: center;
        justify-content: center;

        min-width: 32px;

        padding: 5px 9px;

        border-radius: 8px;

        color: var(--valcel-blue);
        background: var(--valcel-blue-light);

        font-size: 12px;
        font-weight: 700;

    }


    /* MEDIO DE PAGO */

    .payment-method {

        display: inline-flex;
        align-items: center;
        gap: 10px;

        padding: 12px 16px;

        border-radius: 12px;

        color: var(--valcel-blue);
        background: var(--valcel-blue-light);

        font-weight: 700;

    }


    /* OBSERVACIONES */

    .observation-text {

        padding: 15px 17px;

        border-radius: 12px;

        background: #f7f9fc;

        color: var(--valcel-text);

        line-height: 1.6;

        font-size: 14px;

    }


    /* RESPONSIVE */

    @media (max-width: 767px) {

        .sale-header {

            align-items: flex-start;

            flex-direction: column;

        }


        .client-info-grid {

            grid-template-columns: 1fr;

        }


        .summary-total strong {

            font-size: 21px;

        }

    }

</style>

@endpush

@endsection