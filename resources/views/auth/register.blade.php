<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Crear cuenta · Churros Valcel</title>

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
        >

        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        >

        <style>
            :root {
                --valcel-red: #8d1818;
                --valcel-red-dark: #741313;
                --valcel-blue: #9edce5;
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
                    radial-gradient(
                        circle at 5% 10%,
                        #edf8f9 0,
                        transparent 25%
                    ),
                    radial-gradient(
                        circle at 95% 90%,
                        #fff4e9 0,
                        transparent 25%
                    ),
                    var(--valcel-bg);

                font-family: Arial, Helvetica, sans-serif;
                color: var(--valcel-text);

                display: flex;
                align-items: center;
                justify-content: center;

                padding: 30px;
            }

            /* =========================================
            CONTENEDOR
            ========================================== */

            .register-wrapper {
                width: 100%;
                max-width: 1050px;

                background: white;

                border-radius: 20px;

                overflow: hidden;

                box-shadow:
                    0 20px 60px rgba(23, 32, 51, 0.10);

                display: grid;

                grid-template-columns: 40% 60%;

                min-height: 650px;
            }

            /* =========================================
            PANEL DE MARCA
            ========================================== */

            .brand-panel {
                position: relative;

                background:
                    linear-gradient(
                        145deg,
                        #fffdf8 0%,
                        #f8f3e8 55%,
                        #edf9fa 100%
                    );

                padding: 50px 40px;

                display: flex;
                align-items: center;
                justify-content: center;

                text-align: center;

                overflow: hidden;
            }

            .brand-panel::before {
                content: "";

                position: absolute;

                width: 350px;
                height: 350px;

                background: var(--valcel-blue);

                opacity: .20;

                border-radius: 50%;

                bottom: -190px;
                left: -120px;
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
                right: -70px;
            }

            .brand-content {
                position: relative;
                z-index: 2;
            }

            .logo {
                width: 120px;
                height: 120px;

                object-fit: contain;

                margin-bottom: 20px;

                filter:
                    drop-shadow(
                        0 8px 10px rgba(0,0,0,.08)
                    );
            }

            .brand-name {
                font-size: 34px;
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
                max-width: 290px;

                margin: 0 auto 30px;

                color: #718096;

                line-height: 1.7;
            }

            .brand-badge {
                display: inline-flex;

                align-items: center;

                gap: 8px;

                background: white;

                border: 1px solid #e8eef2;

                padding: 9px 16px;

                border-radius: 50px;

                color: var(--valcel-gray);

                font-size: 13px;

                box-shadow:
                    0 5px 15px rgba(0,0,0,.04);
            }

            .brand-badge i {
                color: var(--valcel-red);
            }

            /* =========================================
            PANEL REGISTER
            ========================================== */

            .register-panel {
                padding: 55px 70px;

                display: flex;
                align-items: center;
            }

            .register-content {
                width: 100%;
                max-width: 520px;

                margin: auto;
            }

            .register-heading {
                display: flex;

                align-items: center;

                gap: 17px;

                margin-bottom: 12px;
            }

            .register-icon {
                width: 58px;
                height: 58px;

                border-radius: 50%;

                background: var(--valcel-red);

                color: white;

                display: flex;
                align-items: center;
                justify-content: center;

                font-size: 21px;

                flex-shrink: 0;
            }

            .register-title {
                font-size: 34px;

                font-weight: 700;

                margin: 0;

                color: var(--valcel-text);
            }

            .register-description {
                color: var(--valcel-gray);

                line-height: 1.6;

                margin: 0 0 32px 75px;
            }

            /* =========================================
            FORMULARIO
            ========================================== */

            .form-label {
                font-weight: 600;

                color: #263247;

                margin-bottom: 8px;
            }

            .input-group-custom {
                position: relative;

                margin-bottom: 20px;
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

                height: 55px;

                border: 1px solid #dce3eb;

                border-radius: 10px;

                padding: 0 48px;

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

            /* =========================================
            BOTÓN
            ========================================== */

            .btn-register {
                width: 100%;

                height: 57px;

                border: none;

                border-radius: 10px;

                background: var(--valcel-red);

                color: white;

                font-size: 16px;

                font-weight: 600;

                transition: all .2s ease;

                box-shadow:
                    0 7px 18px rgba(141, 24, 24, .18);

                margin-top: 8px;
            }

            .btn-register:hover {
                background: var(--valcel-red-dark);

                transform: translateY(-1px);

                box-shadow:
                    0 10px 24px rgba(141, 24, 24, .25);
            }

            .btn-register i {
                margin-right: 8px;
            }

            /* =========================================
            LOGIN LINK
            ========================================== */

            .login-link {
                text-align: center;

                margin-top: 22px;

                color: var(--valcel-gray);

                font-size: 14px;
            }

            .login-link a {
                color: var(--valcel-red);

                text-decoration: none;

                font-weight: 600;
            }

            .login-link a:hover {
                text-decoration: underline;
            }

            /* =========================================
            SEGURIDAD
            ========================================== */

            .security-note {
                margin-top: 28px;

                padding-top: 22px;

                border-top: 1px solid #edf0f4;

                text-align: center;

                color: #8491a5;

                font-size: 13px;
            }

            .security-note i {
                margin-right: 7px;
            }

            /* =========================================
            ERRORES
            ========================================== */

            .alert-register {
                border: none;

                border-radius: 10px;

                background: #fff1f1;

                color: #9b2525;

                font-size: 14px;

                margin-bottom: 22px;
            }

            /* =========================================
            RESPONSIVE
            ========================================== */

            @media (max-width: 850px) {

                body {
                    padding: 15px;
                }

                .register-wrapper {
                    grid-template-columns: 1fr;

                    max-width: 600px;
                }

                .brand-panel {
                    min-height: 300px;

                    padding: 35px 25px;
                }

                .logo {
                    width: 90px;
                    height: 90px;

                    margin-bottom: 12px;
                }

                .brand-name {
                    font-size: 28px;
                }

                .brand-subtitle {
                    font-size: 17px;
                }

                .register-panel {
                    padding: 40px 30px;
                }

                .register-description {
                    margin-left: 0;
                }
            }

            @media (max-width: 480px) {

                body {
                    padding: 0;
                }

                .register-wrapper {
                    border-radius: 0;

                    min-height: 100vh;
                }

                .register-panel {
                    padding: 35px 22px;
                }

                .register-heading {
                    gap: 13px;
                }

                .register-icon {
                    width: 50px;
                    height: 50px;
                }

                .register-title {
                    font-size: 27px;
                }
            }
        </style>
    </head>

    <body>

        <div class="register-wrapper">

            {{-- =========================================
                PANEL IZQUIERDO
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
                        Creá tu usuario para comenzar a administrar
                        el negocio desde un solo lugar.
                    </p>

                    <div class="brand-badge">

                        <i class="fa-solid fa-user-shield"></i>

                        Acceso al sistema

                    </div>

                </div>

            </div>


            {{-- =========================================
                FORMULARIO
            ========================================== --}}

            <div class="register-panel">

                <div class="register-content">

                    <div class="register-heading">

                        <div class="register-icon">

                            <i class="fa-solid fa-user-plus"></i>

                        </div>

                        <h1 class="register-title">
                            Crear cuenta
                        </h1>

                    </div>


                    <p class="register-description">
                        Completá tus datos para crear un usuario
                        en el sistema de Churros Valcel.
                    </p>


                    {{-- ERRORES --}}

                    @if ($errors->any())

                        <div class="alert alert-register">

                            <i class="fa-solid fa-circle-exclamation me-2"></i>

                            <ul class="mb-0 ps-3">

                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    <form
                        method="POST"
                        action=""
                    >

                        @csrf


                        {{-- NOMBRE --}}

                        <label
                            for="name"
                            class="form-label"
                        >
                            Nombre
                        </label>

                        <div class="input-group-custom">

                            <i class="fa-solid fa-user input-icon"></i>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control-custom"
                                placeholder="Tu nombre"
                                value="{{ old('name') }}"
                                required
                                autofocus
                            >

                        </div>


                        {{-- EMAIL --}}

                        <label
                            for="email"
                            class="form-label"
                        >
                            Email
                        </label>

                        <div class="input-group-custom">

                            <i class="fa-solid fa-envelope input-icon"></i>

                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control-custom"
                                placeholder="tu@email.com"
                                value="{{ old('email') }}"
                                required
                            >

                        </div>


                        {{-- CONTRASEÑA --}}

                        <label
                            for="password"
                            class="form-label"
                        >
                            Contraseña
                        </label>

                        <div class="input-group-custom">

                            <i class="fa-solid fa-lock input-icon"></i>

                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="form-control-custom"
                                placeholder="Ingresá una contraseña"
                                required
                            >

                            <button
                                type="button"
                                class="password-toggle"
                                onclick="togglePassword('password', 'password-icon')"
                            >

                                <i
                                    id="password-icon"
                                    class="fa-solid fa-eye"
                                ></i>

                            </button>

                        </div>


                        {{-- CONFIRMAR CONTRASEÑA --}}

                        <label
                            for="password_confirmation"
                            class="form-label"
                        >
                            Confirmar contraseña
                        </label>

                        <div class="input-group-custom">

                            <i class="fa-solid fa-lock input-icon"></i>

                            <input
                                type="password"
                                name="password_confirmation"
                                id="password_confirmation"
                                class="form-control-custom"
                                placeholder="Repetí tu contraseña"
                                required
                            >

                            <button
                                type="button"
                                class="password-toggle"
                                onclick="togglePassword(
                                    'password_confirmation',
                                    'confirmation-icon'
                                )"
                            >

                                <i
                                    id="confirmation-icon"
                                    class="fa-solid fa-eye"
                                ></i>

                            </button>

                        </div>


                        {{-- BOTÓN --}}

                        <button
                            type="submit"
                            class="btn-register"
                        >

                            <i class="fa-solid fa-user-plus"></i>

                            Crear cuenta

                        </button>


                        {{-- LINK LOGIN --}}

                        <div class="login-link">

                            ¿Ya tenés una cuenta?

                            <a href="{{ route('login') }}">
                                Iniciá sesión
                            </a>

                        </div>

                    </form>


                    <div class="security-note">

                        <i class="fa-solid fa-shield-halved"></i>

                        Tus datos están protegidos

                    </div>

                </div>

            </div>

        </div>


        <script>

            function togglePassword(inputId, iconId) {

                const input = document.getElementById(inputId);
                const icon = document.getElementById(iconId);

                if (input.type === 'password') {

                    input.type = 'text';

                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');

                } else {

                    input.type = 'password';

                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');

                }
            }

        </script>

    </body>
</html>