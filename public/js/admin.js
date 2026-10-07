
// Animacion de bienvenida al dashboard
document.addEventListener('DOMContentLoaded', function () {

    const welcomeOverlay = document.getElementById('welcomeOverlay');

    if (!welcomeOverlay) {
        return;
    }

    // Esperamos un momento para que el dashboard termine de cargar
    setTimeout(function () {

        welcomeOverlay.classList.add('hide');

    }, 2000);


    // Eliminamos el overlay completamente después de la animación
    setTimeout(function () {

        welcomeOverlay.remove();

    }, 2500);

});

// Animacion de salida de la pagina al cerrar sesion
document.addEventListener('DOMContentLoaded', function () {

    const logoutForm =
        document.getElementById('logoutForm');

    const logoutButton =
        document.getElementById('logoutButton');

    const logoutIcon =
        document.getElementById('logoutIcon');

    const logoutText =
        document.getElementById('logoutText');

    const logoutSpinner =
        document.getElementById('logoutSpinner');


    if (!logoutForm) {
        return;
    }


    logoutForm.addEventListener('submit', function () {

        // Evitar múltiples clics
        logoutButton.classList.add('logout-loading');


        // Cambiar texto
        logoutText.textContent =
            'Cerrando sesión...';


        // Mostrar spinner
        logoutSpinner.classList.remove('d-none');


        // Animación de salida de la página
        document.body.classList.add(
            'logout-page-exit'
        );

    });

});