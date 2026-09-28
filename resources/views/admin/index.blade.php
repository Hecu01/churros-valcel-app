@extends('layouts.main')

@section('title')
Admin - Churros Valcel
@endsection

@section('content')

<div class="container py-5">

    {{-- ``` --}}
    {{-- Encabezado --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-5">
        <div>
            <h1 class="fw-bold mb-1">
                Panel de administración
            </h1>

            <p class="text-muted mb-0">
                Gestión de <strong>Churros Valcel</strong>
            </p>
        </div>

        <div class="mt-3 mt-md-0">
            <span class="badge rounded-pill bg-dark px-3 py-2">
                🟢 Sistema activo
            </span>
        </div>
    </div>


    {{-- Tarjetas --}}
    <div class="row g-4">

        {{-- Clientes --}}
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100 rounded-4">
                <div class="card-body p-4">

                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-4 p-3 fs-3">
                            👥
                        </div>

                        <span class="text-muted small">
                            Gestión
                        </span>
                    </div>

                    <h4 class="fw-bold">
                        Clientes
                    </h4>

                    <p class="text-muted">
                        Administrá los clientes, sus datos y la información relacionada con sus pedidos.
                    </p>

                    <a href="{{ route('cliente.index') }}"
                    class="btn btn-primary w-100 rounded-3">
                        Ver clientes →
                    </a>

                </div>
            </div>
        </div>


        {{-- Productos --}}
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100 rounded-4">
                <div class="card-body p-4">

                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="bg-success bg-opacity-10 text-success rounded-4 p-3 fs-3">
                            🍩
                        </div>

                        <span class="text-muted small">
                            Catálogo
                        </span>
                    </div>

                    <h4 class="fw-bold">
                        Productos
                    </h4>

                    <p class="text-muted">
                        Administrá los churros, precios y productos disponibles para la venta.
                    </p>

                    <a href="{{ route('producto.index') }}"
                    class="btn btn-success w-100 rounded-3">
                        Ver productos →
                    </a>

                </div>
            </div>
        </div>


        {{-- Ventas --}}
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card border-0 shadow-sm h-100 rounded-4">
                <div class="card-body p-4">

                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="bg-info bg-opacity-10 text-info rounded-4 p-3 fs-3">
                            💰
                        </div>

                        <span class="text-muted small">
                            Operaciones
                        </span>
                    </div>

                    <h4 class="fw-bold">
                        Ventas
                    </h4>

                    <p class="text-muted">
                        Consultá y administrá las ventas realizadas y los pedidos registrados.
                    </p>

                    <a href="{{ route('venta.index') }}"
                    class="btn btn-info text-white w-100 rounded-3">
                        Ver ventas →
                    </a>

                </div>
            </div>
        </div>

    </div>


    {{-- Separador --}}
    <hr class="my-5">


    {{-- Pie del dashboard --}}
    <div class="text-center text-muted">
        <small>
            Churros Valcel · Sistema de gestión
        </small>
    </div>
    {{-- ``` --}}

</div>

@endsection
