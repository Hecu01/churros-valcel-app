@extends('layouts.main')

@section('title')
Ventas - Churros Valcel
@endsection

@section('content')

<div class="container py-5">


{{-- Encabezado --}}
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">

    <div>
        <div class="d-flex align-items-center gap-2 mb-1">
            <span class="fs-3">💰</span>

            <h1 class="fw-bold mb-0">
                Ventas
            </h1>
        </div>

        <p class="text-muted mb-0">
            Administrá las ventas y pedidos de Churros Valcel
        </p>
    </div>

    <div class="d-flex gap-2 mt-3 mt-md-0">

        <a href="{{ route('admin.index') }}"
           class="btn btn-outline-secondary rounded-3 px-4">
            ← Admin
        </a>

        <a href="{{ route('venta.create') }}"
           class="btn btn-primary rounded-3 px-4">
            + Registrar venta
        </a>

    </div>

</div>


{{-- Resumen --}}
<div class="row g-4 mb-4">

    {{-- Cantidad de ventas --}}
    <div class="col-12 col-md-6">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-body p-4">

                <div class="d-flex align-items-center justify-content-between">

                    <div>
                        <p class="text-muted mb-1">
                            Ventas registradas
                        </p>

                        <h2 class="fw-bold mb-0">
                            {{ $ventas->count() }}
                        </h2>
                    </div>

                    <div class="bg-primary bg-opacity-10 text-primary rounded-4 p-3 fs-3">
                        🧾
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Total vendido --}}
    <div class="col-12 col-md-6">

        <div class="card border-0 shadow-sm rounded-4 h-100">

            <div class="card-body p-4">

                <div class="d-flex align-items-center justify-content-between">

                    <div>
                        <p class="text-muted mb-1">
                            Total registrado
                        </p>

                        <h2 class="fw-bold mb-0">
                            ${{ number_format($ventas->sum('total'), 2, ',', '.') }}
                        </h2>
                    </div>

                    <div class="bg-success bg-opacity-10 text-success rounded-4 p-3 fs-3">
                        💵
                    </div>

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
                            Fecha
                        </th>

                        <th class="py-3">
                            Hora
                        </th>

                        <th class="py-3">
                            Total
                        </th>

                        <th class="py-3">
                            Medio de pago
                        </th>

                        <th class="py-3">
                            Observaciones
                        </th>
                        <th class="py-3">
                            Acciones
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse ($ventas as $venta)

                        <tr>

                            {{-- ID --}}
                            <td class="px-4 text-muted">
                                #{{ $venta->id }}
                            </td>


                            {{-- Cliente --}}
                            <td>

                                <div class="d-flex align-items-center">

                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle
                                                d-flex align-items-center justify-content-center me-3"
                                         style="width: 40px; height: 40px;">

                                        <span class="fw-bold text-white">
                                            {{ strtoupper(substr($venta->cliente->nombre, 0, 1)) }}
                                        </span>

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


                            {{-- Fecha --}}
                            <td>

                                <span class="text-muted">
                                    📅 {{ date('d/m/Y', strtotime($venta->fecha)) }}
                                </span>

                            </td>


                            {{-- Hora --}}
                            <td>

                                <span class="text-muted">
                                    🕐 {{ date('H:i', strtotime($venta->fecha)) }}
                                </span>

                            </td>


                            {{-- Total --}}
                            <td>

                                <span class="fw-bold text-success">
                                    ${{ number_format($venta->total, 2, ',', '.') }}
                                </span>

                            </td>


                            {{-- Medio de pago --}}
                            <td>

                                @php
                                    $medioPago = strtolower($venta->medio_pago);
                                @endphp

                                @if ($medioPago === 'efectivo')

                                    <span class="badge rounded-pill bg-success bg-opacity-10 text-white px-3 py-2">
                                        💵 Efectivo
                                    </span>

                                @elseif ($medioPago === 'transferencia')

                                    <span class="badge rounded-pill bg-primary bg-opacity-10 text-white px-3 py-2">
                                        🏦 Transferencia
                                    </span>

                                @elseif ($medioPago === 'mercado pago')

                                    <span class="badge rounded-pill bg-info bg-opacity-10 text-white px-3 py-2">
                                        📱 Mercado Pago
                                    </span>

                                @else

                                    <span class="badge rounded-pill bg-light text-dark px-3 py-2">
                                        {{ $venta->medio_pago }}
                                    </span>

                                @endif

                            </td>


                            {{-- Observaciones --}}
                            <td style="width: 250px; max-width: 250px; ">

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
                            <td >

                                <a href="{{ route('venta.ticket', $venta->id) }}"
                                   class="btn btn-sm btn-outline-primary rounded-3">
                                    🧾 Ticket
                                </a>
                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td colspan="7" class="text-center py-5">

                                <div class="fs-1 mb-2">
                                    💰
                                </div>

                                <h5 class="fw-bold">
                                    No hay ventas registradas
                                </h5>

                                <p class="text-muted mb-3">
                                    Todavía no registraste ninguna venta.
                                </p>

                                <a href="{{ route('venta.create') }}"
                                   class="btn btn-primary rounded-3">
                                    + Registrar primera venta
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
        Churros Valcel · Gestión de ventas
    </small>

</div>
```

</div>

@endsection
