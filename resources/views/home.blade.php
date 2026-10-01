<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Churros Valcel | Churros recién hechos</title>

    <meta name="description" content="Churros Valcel. Churros recién hechos y envíos a domicilio en San Nicolás de los Arroyos." >

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Pacifico&display=swap" rel="stylesheet">

    <!-- CSS propio -->
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    
    {{-- Para instalar la app web desde chrome --}}
    <link rel="manifest" href="{{ asset('manifest.webmanifest') }}">
    <meta name="theme-color" content="#7d1f24">
</head>

<body>

    <!-- =========================
         NAVBAR
    ========================== -->

    <nav class="navbar navbar-expand-lg navbar-valcel sticky-top">

        <div class="container">

            <a class="navbar-brand d-flex align-items-center gap-2" href="#inicio">

                <img
                    src="{{ asset('images/logo-valcel.png') }}"
                    alt="Churros Valcel"
                    class="brand-logo"
                >

                <div class="brand-text">
                    <strong>Churros Valcel</strong>
                    <small>CHURROS RECIÉN HECHOS</small>
                </div>

            </a>


            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menuValcel"
                aria-controls="menuValcel"
                aria-expanded="false"
                aria-label="Abrir menú"
            >
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="menuValcel">

                <ul class="navbar-nav mx-auto mb-3 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link active" href="#inicio">
                            Inicio
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#churros">
                            Nuestros Churros
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#como-pedir">
                            Cómo pedir
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#contacto">
                            Contacto
                        </a>
                    </li>

                </ul>


                <a
                    href="https://wa.me/543364036241?text=Hola%20Churros%20Valcel%20%F0%9F%91%8B%20Quiero%20hacer%20un%20pedido."
                    target="_blank"
                    class="btn btn-whatsapp"
                >
                    <i class="fa-brands fa-whatsapp"></i>
                    Pedir por WhatsApp
                </a>

            </div>

        </div>

    </nav>


    <!-- =========================
         HERO
    ========================== -->

    <section id="inicio" class="hero">

        <div class="container">

            <div class="row align-items-center g-5">

                <div class="col-lg-6">

                    <span class="hero-badge">
                        CHURROS VALCEL
                    </span>

                    <h1>
                        Calentitos, recién hechos
                        <span>y directo a tu casa.</span>
                    </h1>

                    <p class="hero-text">
                        Hacé tu pedido y disfrutá nuestros churros
                        recién preparados.
                    </p>

                    <div class="hero-buttons">

                        <a
                            href="https://wa.me/543364036241?text=Hola%20Churros%20Valcel%20%F0%9F%91%8B%20Quiero%20hacer%20un%20pedido."
                            target="_blank"
                            class="btn btn-whatsapp btn-lg"
                        >
                            <i class="fa-brands fa-whatsapp"></i>
                            Pedir por WhatsApp
                        </a>

                        <a
                            href="#churros"
                            class="btn btn-outline-valcel btn-lg"
                        >
                            <i class="fa-solid fa-list"></i>
                            Ver nuestros churros
                        </a>

                    </div>

                </div>


                <div class="col-lg-6">

                    <div class="hero-image-wrapper">

                        <img
                            src="{{ asset('images/churros-hero.jpg') }}"
                            alt="Churros Valcel"
                            class="hero-image"
                        >

                        <div class="dulce-badge">

                            <strong>
                                Dulce de leche
                            </strong>

                            <span>
                                CREMAC
                            </span>

                            <small>
                                El dulce de leche oficial
                                de Churros Valcel.
                            </small>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- =========================
         PRODUCTOS
    ========================== -->

    <section id="churros" class="products-section">

        <div class="container">

            <div class="section-heading">

                <span>EL PLACER EN CADA BOCADO</span>

                <h2>
                    Nuestros Churros
                </h2>

            </div>


            <div class="row g-4">

                <!-- MEDIA DOCENA -->

                <div class="col-md-6 col-xl-3">

                    <div class="product-card">

                        <img
                            src="{{ asset('images/churros-media.jpg') }}"
                            alt="Media docena de churros"
                        >

                        <div class="product-content">

                            <h3>
                                Media docena
                            </h3>

                            <div class="price">
                                $3.500
                            </div>

                            <p>
                                Churros tradicionales.
                            </p>

                            <a
                                href="https://wa.me/543364036241?text=Hola%20Churros%20Valcel%20%F0%9F%91%8B%20Quiero%20pedir%20media%20docena."
                                target="_blank"
                                class="btn btn-whatsapp w-100"
                            >
                                <i class="fa-brands fa-whatsapp"></i>
                                Pedir por WhatsApp
                            </a>

                        </div>

                    </div>

                </div>


                <!-- DOCENA SIMPLE -->

                <div class="col-md-6 col-xl-3">

                    <div class="product-card">

                        <img
                            src="{{ asset('images/churros-simples.jpg') }}"
                            alt="Docena simple"
                        >

                        <div class="product-content">

                            <h3>
                                Docena simple
                            </h3>

                            <div class="price">
                                $5.500
                            </div>

                            <p>
                                Churros tradicionales.
                            </p>

                            <a
                                href="https://wa.me/543364036241?text=Hola%20Churros%20Valcel%20%F0%9F%91%8B%20Quiero%20pedir%20una%20docena%20simple."
                                target="_blank"
                                class="btn btn-whatsapp w-100"
                            >
                                <i class="fa-brands fa-whatsapp"></i>
                                Pedir por WhatsApp
                            </a>

                        </div>

                    </div>

                </div>


                <!-- DOCENA MIXTA -->

                <div class="col-md-6 col-xl-3">

                    <div class="product-card">

                        <img
                            src="{{ asset('images/churros-mixtos.jpg') }}"
                            alt="Docena mixta"
                        >

                        <div class="product-content">

                            <h3>
                                Docena mixta
                            </h3>

                            <div class="price">
                                $6.000
                            </div>

                            <p>
                                6 simples + 6 rellenos.
                            </p>

                            <a
                                href="https://wa.me/543364036241?text=Hola%20Churros%20Valcel%20%F0%9F%91%8B%20Quiero%20pedir%20una%20docena%20mixta."
                                target="_blank"
                                class="btn btn-whatsapp w-100"
                            >
                                <i class="fa-brands fa-whatsapp"></i>
                                Pedir por WhatsApp
                            </a>

                        </div>

                    </div>

                </div>


                <!-- DOCENA RELLENA -->

                <div class="col-md-6 col-xl-3">

                    <div class="product-card">

                        <img
                            src="{{ asset('images/churros-rellenos.jpg') }}"
                            alt="Docena rellena"
                        >

                        <div class="product-content">

                            <h3>
                                Docena rellena
                            </h3>

                            <div class="price">
                                $6.500
                            </div>

                            <p>
                                Rellenos con dulce de leche.
                            </p>

                            <a
                                href="https://wa.me/543364036241?text=Hola%20Churros%20Valcel%20%F0%9F%91%8B%20Quiero%20pedir%20una%20docena%20rellena."
                                target="_blank"
                                class="btn btn-whatsapp w-100"
                            >
                                <i class="fa-brands fa-whatsapp"></i>
                                Pedir por WhatsApp
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- =========================
         COMO PEDIR
    ========================== -->

    <section id="como-pedir" class="how-section">

        <div class="container">

            <div class="section-heading">

                <h2>
                    ¿Cómo pedir?
                </h2>

                <span>
                    ES MUY SIMPLE
                </span>

            </div>


            <div class="row g-4 text-center">

                <div class="col-md-4">

                    <div class="step-card">

                        <div class="step-number">
                            01
                        </div>

                        <div class="step-icon">
                            🍩
                        </div>

                        <h3>
                            Elegí tus churros
                        </h3>

                        <p>
                            Seleccioná la opción
                            que más te guste.
                        </p>

                    </div>

                </div>


                <div class="col-md-4">

                    <div class="step-card">

                        <div class="step-number">
                            02
                        </div>

                        <div class="step-icon">
                            <i class="fa-brands fa-whatsapp"></i>
                        </div>

                        <h3>
                            Mandanos tu pedido
                        </h3>

                        <p>
                            Escribinos por WhatsApp
                            y tomamos tu pedido.
                        </p>

                    </div>

                </div>


                <div class="col-md-4">

                    <div class="step-card">

                        <div class="step-number">
                            03
                        </div>

                        <div class="step-icon">
                            🛵
                        </div>

                        <h3>
                            Te los llevamos
                        </h3>

                        <p>
                            Los preparamos y los
                            enviamos recién hechos.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- =========================
         WHATSAPP
    ========================== -->

    <section id="contacto" class="whatsapp-section">

        <div class="container">

            <div class="whatsapp-box">

                <div class="whatsapp-icon">
                    <i class="fa-brands fa-whatsapp"></i>
                </div>

                <div>

                    <h2>
                        ¿Querés hacer un pedido?
                    </h2>

                    <p>
                        Escribinos por WhatsApp y tomamos tu pedido.
                    </p>

                </div>


                <div class="whatsapp-number">
                    3364 03-6241
                </div>


                <a
                    href="https://wa.me/543364036241?text=Hola%20Churros%20Valcel%20%F0%9F%91%8B%20Quiero%20hacer%20un%20pedido."
                    target="_blank"
                    class="btn btn-light btn-lg"
                >
                    <i class="fa-brands fa-whatsapp"></i>
                    Pedir ahora
                </a>

            </div>

        </div>

    </section>


    <!-- =========================
         DELIVERY
    ========================== -->

    <section class="delivery-section">

        <div class="container">

            <div class="row g-4 align-items-center">

                <div class="col-lg-4">

                    <div class="delivery-main">

                        <div class="delivery-icon">
                            🛵
                        </div>

                        <div>

                            <h3>
                                Llegamos hasta tu casa
                            </h3>

                            <p>
                                Envíos a domicilio en
                                San Nicolás de los Arroyos.
                            </p>

                        </div>

                    </div>

                </div>


                <div class="col-lg-4">

                    <div class="info-card">

                        <i class="fa-regular fa-clock"></i>

                        <div>

                            <h4>
                                Horarios
                            </h4>

                            <p>
                                Repartos a partir de las
                                <strong>15:30 hs</strong>.
                            </p>

                            <p>
                                Todo el día hasta las
                                <strong>20:00 hs</strong>.
                            </p>

                        </div>

                    </div>

                </div>


                <div class="col-lg-4">

                    <div class="info-card">

                        <i class="fa-solid fa-location-dot"></i>

                        <div>

                            <h4>
                                Zona de reparto
                            </h4>

                            <p>
                                San Nicolás de los Arroyos
                                y alrededores.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- =========================
         INSTAGRAM
    ========================== -->

    <section class="instagram-section">

        <div class="container">

            <div class="row align-items-center g-4">

                <div class="col-lg-8">

                    <div class="gallery">

                        <img
                            src="{{ asset('images/churros-media.jpg') }}"
                            alt="Churros Valcel"
                        >

                        <img
                            src="{{ asset('images/churros-rellenos.jpg') }}"
                            alt="Churros rellenos"
                        >

                        <img
                            src="{{ asset('images/churros-simples.jpg') }}"
                            alt="Churros recién hechos"
                        >

                    </div>

                </div>


                <div class="col-lg-4">

                    <div class="instagram-content">

                        <span>
                            📸 Seguinos
                        </span>

                        <h2>
                            Mirá nuestros productos,
                            promociones y novedades.
                        </h2>

                        <a
                            href="https://www.instagram.com/churros_valcel/"
                            target="_BLANK"
                            class="btn btn-instagram"
                        >
                            <i class="fa-brands fa-instagram"></i>
                            @ChurrosValcel
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- =========================
         FOOTER
    ========================== -->

    <footer class="footer">

        <div class="container">

            <div class="row align-items-center g-4">

                <div class="col-md-4">

                    <div class="footer-brand">

                        <img
                            src="{{ asset('images/logo-valcel.png') }}"
                            alt="Churros Valcel"
                        >

                        <div>

                            <strong>
                                Churros Valcel
                            </strong>

                            <small>
                                CHURROS RECIÉN HECHOS
                            </small>

                        </div>

                    </div>

                </div>


                <div class="col-md-4 text-center">

                    <div class="footer-thanks">
                        Gracias por elegirnos ❤️
                    </div>

                </div>


                <div class="col-md-4 text-md-end">

                    <div class="footer-social">

                        <a href="https://www.instagram.com/churros_valcel/" target="_blank">
                            <i class="fa-brands fa-instagram"></i>
                        </a>

                        <a
                            href="https://wa.me/543364036241"
                            target="_blank"
                        >
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>

                        <a
                            href="https://www.facebook.com/profile.php?id=61591740723129"
                            target="_blank"
                        >
                            <i class="fa-brands fa-facebook"></i>
                        </a>

                    </div>

                    <small>
                        San Nicolás de los Arroyos
                        <br>
                        © {{ date('Y') }} Churros Valcel
                    </small>

                </div>

            </div>

        </div>

    </footer>


    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
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