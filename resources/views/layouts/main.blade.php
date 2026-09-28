<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        {{-- Font Awesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css" integrity="sha512-QeR2VH+lsBE5LSAe1Q5EnTBbe7XTBubt8dG93Y7gidSgdMCr8nVqKcfKAMyN96SV8KDbZVTDXChatu5G2KQGzg==" crossorigin="anonymous" referrerpolicy="no-referrer">
        <title>@yield('title')</title>
    </head>
    <body>
        <nav id="navbarValcel"
            class="navbar navbar-expand-lg bg-white border-0 shadow-sm sticky-top">

            <div class="container py-2">

                {{-- Logo + nombre --}}
                <a href="{{ route('admin.index') }}"
                class="navbar-brand d-flex align-items-center gap-2">

                    <img src="{{ asset('images/logo-valcel.png') }}"
                        alt="Churros Valcel"
                        class="logo-valcel">

                    <div class="d-flex flex-column lh-1 brand-text">

                        <span class="fw-bold"
                            style="color: #7d1f24; font-size: 1.15rem;">
                            Churros Valcel
                        </span>

                        <small class="text-muted">
                            Sistema de gestión
                        </small>

                    </div>

                </a>


                {{-- Botón mobile --}}
                <button class="navbar-toggler border-0 shadow-none"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#menuValcel"
                        aria-controls="menuValcel"
                        aria-expanded="false"
                        aria-label="Abrir menú">

                    <span class="navbar-toggler-icon"></span>

                </button>


                {{-- Menú --}}
                <div class="collapse navbar-collapse" id="menuValcel">

                    <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2 mt-3 mt-lg-0">

                        <li class="nav-item">
                            <a href="{{ route('admin.index') }}"
                            class="nav-link px-3 rounded-3 fw-semibold">
                                🏠 Inicio
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('cliente.index') }}"
                            class="nav-link px-3 rounded-3">
                                👥 Clientes
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('producto.index') }}"
                            class="nav-link px-3 rounded-3">
                                🍩 Productos
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('venta.index') }}"
                            class="nav-link px-3 rounded-3">
                                💰 Ventas
                            </a>
                        </li>

                        <li class="d-none d-lg-block">
                            <div class="vr mx-2"></div>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('venta.create') }}"
                            class="btn rounded-3 px-4 fw-semibold text-white"
                            style="background-color: #7d1f24;">
                                + Nueva venta
                            </a>
                        </li>
                        <li class="d-none d-lg-block">
                            <div class="vr mx-2"></div>
                        </li>

                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf

                                <button type="submit"
                                        class="nav-link px-3 rounded-3 border-0 bg-transparent">
                                    🚪 Salir
                                </button>
                            </form>
                        </li>

                    </ul>

                </div>

            </div>

        </nav>



        @yield('content')


        <footer class="mt-5 footer-valcel">

            <div class="container py-4">

                {{-- Parte superior --}}
                <div class="d-flex flex-column flex-md-row
                            justify-content-between
                            align-items-md-center
                            gap-4">

                    {{-- Marca --}}
                    <div class="d-flex align-items-center gap-3">

                        <img
                            src="{{ asset('images/logo-valcel.png') }}"
                            alt="Churros Valcel"
                            style="
                                width: 50px;
                                height: 50px;
                                object-fit: cover;
                                border-radius: 50%;
                            "
                        >

                        <div class="lh-sm">

                            <div class="fw-bold"
                                style="color: #7d1f24;">
                                Churros Valcel
                            </div>

                            <small class="text-muted">
                                Sistema de gestión
                            </small>

                        </div>

                    </div>


                    {{-- Enlaces rápidos --}}
                    <div class="d-flex flex-wrap
                                justify-content-center
                                justify-content-md-end
                                gap-2">

                        <a href="{{ route('admin.index') }}"
                        class="footer-link">
                            Inicio
                        </a>

                        <a href="{{ route('cliente.index') }}"
                        class="footer-link">
                            Clientes
                        </a>

                        <a href="{{ route('producto.index') }}"
                        class="footer-link">
                            Productos
                        </a>

                        <a href="{{ route('venta.index') }}"
                        class="footer-link">
                            Ventas
                        </a>

                        <a href="{{ route('venta.create') }}"
                        class="footer-link">
                            Nueva venta
                        </a>

                    </div>

                </div>


                {{-- Separador --}}
                <hr class="my-4 opacity-25">


                {{-- Parte inferior --}}
                <div class="d-flex flex-column flex-md-row
                            justify-content-between
                            align-items-md-center
                            gap-2">

                    <small class="text-muted">
                        © {{ date('Y') }} Churros Valcel
                    </small>

                    <small class="text-muted">
                        Desarrollado por Valcel
                    </small>

                    <small class="text-muted">
                        Sistema de gestión · v1.0
                    </small>

                </div>

            </div>

        </footer>


        {{-- Toast de éxito --}}
        @if(session('success'))

            <div class="toast-container position-fixed bottom-0 start-50 translate-middle-x p-4" style="z-index: 9999;">

                <div id="successToast"
                    class="toast border-0 shadow-lg rounded-4"
                    role="alert"
                    aria-live="assertive"
                    aria-atomic="true">

                    <div class="toast-body p-3">

                        <div class="d-flex align-items-center gap-3">

                            {{-- Icono --}}
                            <div class="d-flex align-items-center justify-content-center rounded-circle"
                                style="
                                    width: 42px;
                                    height: 42px;
                                    background-color: #e8f7ee;
                                    color: #198754;
                                    flex-shrink: 0;
                                ">
                                <i class="fa-solid fa-check"></i>
                            </div>

                            {{-- Mensaje --}}
                            <div class="flex-grow-1">

                                <div class="fw-bold">
                                    ¡Listo!
                                </div>

                                <div class="text-muted small">
                                    {{ session('success') }}
                                </div>

                            </div>

                            {{-- Cerrar --}}
                            <button type="button"
                                    class="btn-close"
                                    data-bs-dismiss="toast"
                                    aria-label="Cerrar">
                            </button>

                        </div>

                    </div>

                </div>

            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {

                    const toastElement = document.getElementById('successToast');

                    const toast = new bootstrap.Toast(toastElement, {
                        delay: 3500
                    });

                    toast.show();

                });
            </script>

        @endif


        <style>



            /* ==============================
            NAVBAR VALCEL
            ============================== */

            #navbarValcel {
                transition: all 0.3s ease;
            }

            #navbarValcel .container {
                transition: padding 0.3s ease;
            }

            .logo-valcel {
                width: 58px;
                height: 58px;
                object-fit: cover;
                border-radius: 50%;
                transition: all 0.3s ease;
            }

            .brand-text {
                transition: all 0.3s ease;
            }

            #navbarValcel .nav-link {
                color: #555;
                transition: all 0.2s ease;
            }

            #navbarValcel .nav-link:hover {
                background-color: #e7f4f5;
                color: #7d1f24;
            }

            #navbarValcel .navbar-brand {
                text-decoration: none;
            }

            #navbarValcel .btn:hover {
                background-color: #64191d !important;
            }


            /* ==============================
            NAVBAR COMPACTO AL HACER SCROLL
            ============================== */

            #navbarValcel.scrolled .container {
                padding-top: 6px !important;
                padding-bottom: 6px !important;
            }

            #navbarValcel.scrolled .logo-valcel {
                width: 42px;
                height: 42px;
            }

            #navbarValcel.scrolled .brand-text span {
                font-size: 1rem !important;
            }

            #navbarValcel.scrolled .brand-text small {
                font-size: 0.7rem;
            }

            #navbarValcel.scrolled {
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08) !important;
            }

            /* ==============================
            FOOTER VALCEL
            ============================== */

            .footer-valcel {
                background-color: #e7f4f5;
                border-top: 1px solid rgba(125, 31, 36, 0.08);
            }

            .footer-link {
                color: #6c757d;
                text-decoration: none;
                font-size: 0.875rem;
                padding: 6px 10px;
                border-radius: 8px;
                transition: all 0.2s ease;
            }

            .footer-link:hover {
                color: #7d1f24;
                background-color: rgba(255, 255, 255, 0.75);
            }

        </style>

        <script>
            
            // Cambiar el estilo del navbar al hacer scroll
            window.addEventListener('scroll', function () {

                const navbar = document.getElementById('navbarValcel');

                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }

            });

        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>