<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Iniciar sesión · Churros Valcel</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


        {{-- Para instalar la app web desde chrome --}}
        <link rel="manifest" href="{{ asset('manifest.webmanifest') }}">
        <meta name="theme-color" content="#7d1f24">
        <style>
            :root {
                --valcel-red: #8d1818;
                --valcel-red-dark: #741313;
                --valcel-blue: #9edce5;
                --valcel-blue-light: #eef9fa;
                --valcel-text: #172033;
                --valcel-gray: #6c7a91;
                --valcel-bg: #f8f9fa;
            }

            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                min-height: 100vh;
                background:
                    radial-gradient(circle at 5% 10%, #edf8f9 0, transparent 25%),
                    radial-gradient(circle at 95% 90%, #fff4e9 0, transparent 25%),
                    var(--valcel-bg);

                font-family: Arial, Helvetica, sans-serif;
                color: var(--valcel-text);

                display: flex;
                align-items: center;
                justify-content: center;

                padding: 30px;
            }

            .login-wrapper {
                width: 100%;
                max-width: 1100px;

                background: white;

                border-radius: 20px;

                overflow: hidden;

                box-shadow:
                    0 20px 60px rgba(23, 32, 51, 0.10);

                display: grid;
                grid-template-columns: 42% 58%;

                min-height: 650px;
            }

            /* =========================================
            PANEL IZQUIERDO
            ========================================= */

            .brand-panel {
                position: relative;

                background:
                    linear-gradient(
                        145deg,
                        #fffdf8 0%,
                        #f8f3e8 55%,
                        #edf9fa 100%
                    );

                padding: 55px 45px;

                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;

                text-align: center;

                overflow: hidden;
            }

            .brand-panel::before {
                content: "";

                position: absolute;

                width: 330px;
                height: 330px;

                background: var(--valcel-blue);

                opacity: .22;

                border-radius: 50%;

                bottom: -180px;
                left: -100px;
            }

            .brand-panel::after {
                content: "";

                position: absolute;

                width: 180px;
                height: 180px;

                background: #f5d9b5;

                opacity: .18;

                border-radius: 50%;

                top: -80px;
                left: -70px;
            }

            .brand-content {
                position: relative;
                z-index: 2;
            }

            .logo {
                width: 125px;
                height: 125px;

                object-fit: contain;

                margin-bottom: 22px;

                filter: drop-shadow(
                    0 8px 10px rgba(0,0,0,.08)
                );
            }

            .brand-name {
                font-size: 35px;
                font-weight: 700;

                color: var(--valcel-red);

                margin-bottom: 4px;
            }

            .brand-subtitle {
                font-size: 19px;

                color: var(--valcel-gray);

                margin-bottom: 25px;
            }

            .brand-description {
                max-width: 300px;

                color: #718096;

                line-height: 1.7;

                margin: 0 auto 30px;
            }

            .brand-badge {
                display: inline-flex;

                align-items: center;
                gap: 8px;

                background: white;

                border: 1px solid #e8eef2;

                padding: 9px 15px;

                border-radius: 50px;

                color: var(--valcel-gray);

                font-size: 13px;

                box-shadow: 0 5px 15px rgba(0,0,0,.04);
            }

            .brand-badge i {
                color: var(--valcel-red);
            }

            /* =========================================
            PANEL LOGIN
            ========================================= */

            .login-panel {
                padding: 70px 75px;

                display: flex;
                align-items: center;
            }

            .login-content {
                width: 100%;
                max-width: 520px;

                margin: auto;
            }

            .login-heading {
                display: flex;
                align-items: center;
                gap: 18px;

                margin-bottom: 12px;
            }

            .login-icon {
                width: 58px;
                height: 58px;

                border-radius: 50%;

                background: var(--valcel-red);

                color: white;

                display: flex;
                align-items: center;
                justify-content: center;

                font-size: 22px;

                flex-shrink: 0;
            }

            .login-title {
                font-size: 36px;

                font-weight: 700;

                margin: 0;

                color: var(--valcel-text);
            }

            .login-description {
                color: var(--valcel-gray);

                line-height: 1.6;

                margin: 0 0 40px 76px;
            }

            /* =========================================
            FORMULARIO
            ========================================= */

            .form-label {
                font-weight: 600;

                color: #263247;

                margin-bottom: 9px;
            }

            .input-group-custom {
                position: relative;

                margin-bottom: 24px;
            }

            .input-icon {
                position: absolute;

                left: 18px;
                top: 50%;

                transform: translateY(-50%);

                color: #8491a5;

                z-index: 5;
            }

            .form-control-custom {
                width: 100%;

                height: 58px;

                border: 1px solid #dce3eb;

                border-radius: 10px;

                padding: 0 50px;

                font-size: 15px;

                color: var(--valcel-text);

                transition: all .2s ease;
            }

            .form-control-custom:focus {
                outline: none;

                border-color: var(--valcel-red);

                box-shadow:
                    0 0 0 4px rgba(141, 24, 24, .08);
            }

            .password-toggle {
                position: absolute;

                right: 17px;
                top: 50%;

                transform: translateY(-50%);

                border: none;

                background: transparent;

                color: #8491a5;

                cursor: pointer;

                z-index: 5;
            }

            .login-options {
                display: flex;

                justify-content: space-between;
                align-items: center;

                margin: 4px 0 30px;
            }

            .remember {
                display: flex;

                align-items: center;
                gap: 8px;

                color: #5f6d82;

                font-size: 14px;
            }

            .remember input {
                width: 17px;
                height: 17px;

                accent-color: var(--valcel-red);

                cursor: pointer;
            }

            .forgot-password {
                color: #1976d2;

                text-decoration: none;

                font-size: 14px;

                font-weight: 500;
            }

            .forgot-password:hover {
                text-decoration: underline;
            }

            .btn-login {
                width: 100%;

                height: 58px;

                border: none;

                border-radius: 10px;

                background: var(--valcel-red);

                color: white;

                font-size: 16px;

                font-weight: 600;

                transition: all .2s ease;

                box-shadow:
                    0 7px 18px rgba(141, 24, 24, .18);
            }

            .btn-login:hover {
                background: var(--valcel-red-dark);

                transform: translateY(-1px);

                box-shadow:
                    0 10px 24px rgba(141, 24, 24, .25);
            }

            .btn-login i {
                margin-right: 9px;
            }

            .security-note {
                margin-top: 45px;

                padding-top: 25px;

                border-top: 1px solid #edf0f4;

                text-align: center;

                color: #8491a5;

                font-size: 13px;
            }

            .security-note i {
                color: #718096;

                margin-right: 7px;
            }

            /* =========================================
            ERRORES
            ========================================= */

            .alert-login {
                border: none;

                border-radius: 10px;

                background: #fff1f1;

                color: #9b2525;

                font-size: 14px;

                margin-bottom: 25px;
            }

            /* =========================================
            RESPONSIVE
            ========================================= */

            @media (max-width: 850px) {

                body {
                    padding: 15px;
                }

                .login-wrapper {
                    grid-template-columns: 1fr;

                    min-height: auto;

                    max-width: 600px;
                }

                .brand-panel {
                    padding: 40px 30px;

                    min-height: 330px;
                }

                .logo {
                    width: 90px;
                    height: 90px;

                    margin-bottom: 15px;
                }

                .brand-name {
                    font-size: 28px;
                }

                .brand-subtitle {
                    font-size: 17px;
                }

                .brand-description {
                    margin-bottom: 18px;
                }

                .login-panel {
                    padding: 45px 30px;
                }

                .login-title {
                    font-size: 30px;
                }

                .login-description {
                    margin-left: 0;
                }
            }

            @media (max-width: 480px) {

                body {
                    padding: 0;
                }

                .login-wrapper {
                    border-radius: 0;

                    min-height: 100vh;
                }

                .brand-panel {
                    min-height: 300px;
                }

                .login-panel {
                    padding: 35px 22px;
                }

                .login-heading {
                    gap: 13px;
                }

                .login-icon {
                    width: 50px;
                    height: 50px;
                }

                .login-title {
                    font-size: 26px;
                }

                .login-options {
                    flex-direction: column;

                    align-items: flex-start;

                    gap: 15px;
                }
            }
        </style>
    </head>

    <body>

        <div class="login-wrapper">

            {{-- =========================================
                IZQUIERDA - MARCA
            ========================================== --}}

            <div class="brand-panel">

                <div class="brand-content">

                    <img
                        src="{{ asset('images/logo-valcel.png') }}"
                        alt="Churros Valcel"
                        class="logo"
                    >

                    <div class="brand-name">
                        Churros Valcel
                    </div>

                    <div class="brand-subtitle">
                        Sistema de gestión
                    </div>

                    <p class="brand-description">
                        Organizá tu negocio, administrá tus ventas
                        y llevá el control de tus clientes.
                    </p>

                    <div class="brand-badge">
                        <i class="fa-solid fa-shield-halved"></i>

                        Acceso seguro al sistema
                    </div>

                </div>

            </div>


            {{-- =========================================
                DERECHA - LOGIN
            ========================================== --}}

            <div class="login-panel">

                <div class="login-content">

                    <div class="login-heading">

                        <div class="login-icon">
                            <i class="fa-solid fa-lock"></i>
                        </div>

                        <h1 class="login-title">
                            Iniciá sesión
                        </h1>

                    </div>


                    <p class="login-description">
                        Ingresá con tu usuario y contraseña para
                        acceder al sistema de Churros Valcel.
                    </p>


                    {{-- ERRORES DE LOGIN --}}

                    @if ($errors->any())

                        <div class="alert alert-login">

                            <i class="fa-solid fa-circle-exclamation me-2"></i>

                            {{ $errors->first() }}

                        </div>

                    @endif


                    <form method="POST" action="{{ url('/login') }}">

                        @csrf


                        {{-- USUARIO --}}

                        <div>

                            <label for="email" class="form-label">
                                Usuario o email
                            </label>

                            <div class="input-group-custom">

                                <i class="fa-solid fa-user input-icon"></i>

                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="form-control-custom"
                                    placeholder="Tu usuario o email"
                                    value="{{ old('email') }}"
                                    required
                                    autofocus
                                >

                            </div>

                        </div>


                        {{-- CONTRASEÑA --}}

                        <div>

                            <label for="password" class="form-label">
                                Contraseña
                            </label>

                            <div class="input-group-custom">

                                <i class="fa-solid fa-lock input-icon"></i>

                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="form-control-custom"
                                    placeholder="Tu contraseña"
                                    required
                                >

                                <button
                                    type="button"
                                    class="password-toggle"
                                    onclick="togglePassword()"
                                    aria-label="Mostrar contraseña"
                                >
                                    <i
                                        id="password-icon"
                                        class="fa-solid fa-eye"
                                    ></i>
                                </button>

                            </div>

                        </div>


                        {{-- OPCIONES --}}

                        <div class="login-options">

                            <label class="remember">

                                <input
                                    type="checkbox"
                                    name="remember"
                                >

                                Recordarme

                            </label>

                            <a href="#" class="forgot-password">
                                ¿Olvidaste tu contraseña?
                            </a>

                        </div>


                        {{-- BOTÓN --}}

                        <button
                            type="submit"
                            class="btn-login"
                        >

                            <i class="fa-solid fa-right-to-bracket"></i>

                            Ingresar

                        </button>
                        {{-- <div class="text-center mt-2">También puedes <a href="{{ route('register') }}">registrarte</a></div> --}}
                    </form>


                    <div class="security-note">

                        <i class="fa-solid fa-shield-halved"></i>

                        Solo personal autorizado

                    </div>

                </div>

            </div>

        </div>


        <script>

            function togglePassword() {

                const password = document.getElementById('password');
                const icon = document.getElementById('password-icon');

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