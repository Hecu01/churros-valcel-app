<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Administración - Churros Valcel')</title>

    {{-- Bootstrap --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    {{-- Font Awesome --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    {{-- CSS general del panel --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/admin-dashboard.css') }}">

    {{-- CSS adicional de cada página --}}
    @stack('styles')

</head>

<body>

    <div class="admin-dashboard">

        {{-- SIDEBAR --}}
        <aside class="admin-sidebar">

            {{-- Logo --}}
            <div class="sidebar-brand">

                <img
                    src="{{ asset('images/logo-valcel.png') }}"
                    alt="Churros Valcel"
                    class="sidebar-logo">

                <div>

                    <h5>
                        Churros Valcel
                    </h5>

                    <small>
                        Sistema de gestión
                    </small>

                </div>

            </div>


            {{-- Menú --}}
            <nav class="sidebar-menu">

                <a
                    href="{{ route('admin.index') }}"
                    class="sidebar-link">

                    <i class="fa-solid fa-house"></i>

                    <span>
                        Inicio
                    </span>

                </a>


                <a
                    href="{{ route('cliente.index') }}"
                    class="sidebar-link">

                    <i class="fa-solid fa-users"></i>

                    <span>
                        Clientes
                    </span>

                </a>


                <a
                    href="{{ route('producto.index') }}"
                    class="sidebar-link">

                    <i class="fa-solid fa-box"></i>

                    <span>
                        Productos
                    </span>

                </a>


                <a
                    href="{{ route('venta.index') }}"
                    class="sidebar-link">

                    <i class="fa-solid fa-cart-shopping"></i>

                    <span>
                        Ventas
                    </span>

                </a>

            </nav>
            <div class="sidebar-logout">

                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit" class="sidebar-logout-btn">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Cerrar sesión</span>
                    </button>
                </form>

            </div>

            {{-- Footer sidebar --}}
            <div class="sidebar-footer">

                <i class="fa-regular fa-heart"></i>

                <strong>
                    Churros Valcel
                </strong>

                <span>
                    Siempre calentitos
                </span>

            </div>

        </aside>


        {{-- CONTENIDO --}}
        <main class="admin-main">

            @yield('content')

        </main>

    </div>


    {{-- Bootstrap JS --}}
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>


    {{-- Scripts específicos --}}
    @stack('scripts')

</body>

</html>