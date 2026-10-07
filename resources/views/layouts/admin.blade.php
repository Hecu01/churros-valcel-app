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

            {{-- Usuario activo --}}
            <div class="sidebar-user">

                <div class="sidebar-user-avatar">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

                <div class="sidebar-user-info">

                    <strong>
                        {{ auth()->user()->name }}
                    </strong>

                    <small>
                        Administrador
                    </small>

                </div>

            </div>
            <div class="sidebar-logout">

                <form
                    id="logoutForm"
                    action="{{ route('logout') }}"
                    method="POST"
                >
                    @csrf

                    <button
                        type="submit"
                        id="logoutButton"
                        class="sidebar-logout-btn"
                    >

                        <i
                            id="logoutIcon"
                            class="fa-solid fa-right-from-bracket"
                        ></i>

                        <span id="logoutText">
                            Cerrar sesión
                        </span>

                        <span
                            id="logoutSpinner"
                            class="spinner-border spinner-border-sm d-none"
                            role="status"
                            aria-hidden="true"
                        ></span>

                    </button>

                </form>

            </div>

            {{-- Footer sidebar --}}
            {{-- <div class="sidebar-footer">

                <i class="fa-regular fa-heart"></i>

                <strong>
                    Churros Valcel
                </strong>

                <span>
                    Siempre calentitos
                </span>

            </div> --}}

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

    <script src="{{ asset('js/admin.js') }}"></script>
    {{-- Scripts específicos --}}
    @stack('scripts')

</body>

</html>