<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Iniciar sesión · Churros Valcel</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


        {{-- Para instalar la app web desde chrome --}}
        <link rel="manifest" href="{{ asset('manifest.webmanifest') }}">

        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
        
        <meta name="theme-color" content="#7d1f24">

    </head>

    <body>

        <main class="login-page">

            <div class="login-card">

                {{-- PANEL IZQUIERDO --}}
                <section class="login-brand">

                    <div class="brand-content">

                        <img src="{{ asset('images/logo-valcel.png') }}"
                            alt="Churros Valcel"
                            class="brand-logo">

                        <h1>Churros Valcel</h1>

                        <p class="brand-subtitle">
                            Sistema de gestión
                        </p>

                        <p class="brand-description">
                            Organizá tu negocio, administrá tus ventas
                            y llevá el control de tus clientes.
                        </p>

                        <div class="secure-badge">
                            <i class="fa-solid fa-shield-halved"></i>
                            <span>Acceso seguro al sistema</span>
                        </div>

                    </div>

                </section>


                {{-- PANEL DERECHO --}}
                <section class="login-form-container">

                    <div class="login-form">

                        <div class="login-title">

                            <div class="login-icon">
                                <i class="fa-solid fa-lock"></i>
                            </div>

                            <div>
                                <h2>Iniciá sesión</h2>

                                <p>
                                    Ingresá con tu usuario y contraseña
                                    para acceder al sistema de Churros Valcel.
                                </p>
                            </div>

                        </div>


                        {{-- ERRORES --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <i class="fa-solid fa-circle-exclamation me-2"></i>

                                {{ $errors->first() }}
                            </div>
                        @endif


                        {{-- FORMULARIO --}}
                        <form action="{{ route('login.store') }}" method="POST">

                            @csrf


                            {{-- EMAIL --}}
                            <div class="mb-4">

                                <label for="email" class="form-label">
                                    Usuario o email
                                </label>

                                <div class="input-wrapper">

                                    <i class="fa-solid fa-user input-icon"></i>

                                    <input
                                        type="email"
                                        id="email"
                                        name="email"
                                        class="form-control"
                                        placeholder="Tu usuario o email"
                                        value="{{ old('email') }}"
                                        required
                                        autofocus
                                    >

                                </div>

                            </div>


                            {{-- CONTRASEÑA --}}
                            <div class="mb-3">

                                <label for="password" class="form-label">
                                    Contraseña
                                </label>

                                <div class="input-wrapper">

                                    <i class="fa-solid fa-lock input-icon"></i>

                                    <input
                                        type="password"
                                        id="password"
                                        name="password"
                                        class="form-control"
                                        placeholder="Tu contraseña"
                                        required
                                    >

                                    <button
                                        type="button"
                                        class="password-toggle"
                                        onclick="togglePassword()"
                                        aria-label="Mostrar contraseña">

                                        <i class="fa-solid fa-eye" id="passwordIcon"></i>

                                    </button>

                                </div>

                            </div>


                            {{-- OPCIONES --}}
                            <div class="login-options">

                                <div class="remember">

                                    <input
                                        type="checkbox"
                                        id="remember"
                                        name="remember"
                                        value="1">

                                    <label for="remember">
                                        Recordarme
                                    </label>

                                </div>

                                {{-- Dejalo comentado hasta implementar recuperación --}}
                                {{-- 
                                <a href="#">
                                    ¿Olvidaste tu contraseña?
                                </a>
                                --}}

                            </div>


                            {{-- BOTÓN --}}
                            <button type="submit" class="btn-login">

                                <i class="fa-solid fa-right-to-bracket"></i>

                                Ingresar

                            </button>

                        </form>


                        {{-- PIE --}}
                        <div class="login-footer">

                            <i class="fa-solid fa-shield-halved"></i>

                            <span>
                                Solo personal autorizado
                            </span>

                        </div>

                    </div>

                </section>

            </div>

        </main>


        <script>

            function togglePassword() {

                const password = document.getElementById('password');
                const icon = document.getElementById('passwordIcon');

                if (password.type === 'password') {

                    password.type = 'text';

                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');

                } else {

                    password.type = 'password';

                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');

                }

            }
            
            // Registrar el Service Worker para permitir la instalación de la app web desde Chrome
            if ('serviceWorker' in navigator) {
                window.addEventListener('load', () => {
                    navigator.serviceWorker.register('/sw.js')
                        .then(registration => {
                            console.log('Service Worker registrado:', registration);
                        })
                        .catch(error => {
                            console.error('Error registrando Service Worker:', error);
                        });
                });
            }
        </script>

    </body>
</html>