@extends('layouts.admin')

@section('title')
    Admin - Churros Valcel
@endsection

@section('content')

<div class="admin-page">

    {{-- CONTENIDO PRINCIPAL --}}


    {{-- HERO --}}
    <section class="admin-hero">

        <div class="hero-content">

            <div class="hero-label">
                PANEL DE ADMINISTRACIÓN
            </div>

            <h1>
                Panel de administración
            </h1>

            <p>
                Gestión de <strong>Churros Valcel</strong>
            </p>

        </div>


        <div class="system-status">

            <span class="status-dot"></span>

            Sistema activo

        </div>


        {{-- Decoración --}}
        <div class="hero-decoration">

            <span>🍩</span>
            <span>🍩</span>
            <span>🍩</span>

        </div>

    </section>


    {{-- TARJETAS --}}
    <section class="management-section">

        <div class="row g-4">


            {{-- CLIENTES --}}
            <div class="col-12 col-md-6 col-lg-4">

                <div class="management-card clientes-card">

                    <div class="card-top">

                        <div class="management-icon">

                            <i class="fa-solid fa-users"></i>

                        </div>

                        <span class="management-tag">
                            Gestión
                        </span>

                    </div>


                    <h3>
                        Clientes
                    </h3>


                    <p>
                        Administrá los clientes, sus datos
                        y la información relacionada con
                        sus pedidos.
                    </p>


                    <a href="{{ route('cliente.index') }}"
                        class="management-button">

                        Ver clientes

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </div>

            </div>


            {{-- PRODUCTOS --}}
            <div class="col-12 col-md-6 col-lg-4">

                <div class="management-card productos-card">

                    <div class="card-top">

                        <div class="management-icon">

                            <i class="fa-solid fa-box"></i>

                        </div>

                        <span class="management-tag">
                            Catálogo
                        </span>

                    </div>


                    <h3>
                        Productos
                    </h3>


                    <p>
                        Administrá los churros, precios
                        y productos disponibles para
                        la venta.
                    </p>


                    <a href="{{ route('producto.index') }}"
                        class="management-button">

                        Ver productos

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </div>

            </div>


            {{-- VENTAS --}}
            <div class="col-12 col-md-6 col-lg-4">

                <div class="management-card ventas-card">

                    <div class="card-top">

                        <div class="management-icon">

                            <i class="fa-solid fa-coins"></i>

                        </div>

                        <span class="management-tag">
                            Operaciones
                        </span>

                    </div>


                    <h3>
                        Ventas
                    </h3>


                    <p>
                        Consultá y administrá las ventas
                        realizadas y los pedidos
                        registrados.
                    </p>


                    <a href="{{ route('venta.index') }}"
                        class="management-button">

                        Ver ventas

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </div>

            </div>

        </div>

    </section>


    {{-- BANNER INFERIOR --}}
    <section class="growth-banner">

        <div class="growth-icon">

            <i class="fa-solid fa-bread-slice"></i>

        </div>


        <div class="growth-content">

            <h4>
                ¡Seguimos creciendo!
            </h4>

            <p>
                Gracias por ser parte de Churros Valcel
                <span>♥</span>
            </p>

        </div>


        <div class="growth-decoration">
            Churros
            <br>
            Valcel
        </div>

    </section>


    {{-- FOOTER --}}
    <footer class="admin-footer">

        Churros Valcel
        <span>·</span>
        Sistema de gestión

    </footer>



</div>

@endsection


