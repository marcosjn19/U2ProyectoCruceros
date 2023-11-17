if (document.readyState === 'complete') {
    // La página ya se ha cargado completamente
    inicializarScrollReveal();
} else {
    // Esperar a que la página se cargue completamente
    document.onreadystatechange = function () {
        if (document.readyState === 'complete') {
            // La página ahora está completamente cargada
            inicializarScrollReveal();
        }
    };
}

function getSlide (delay, origen, distancia, reset) {
    return deslizar = {
        delay:  delay,
        origin: origen,
        distance: distancia,
        reset: reset
    }
}

function getSlideGroup ( delay, origen, distancia, intervalo, reset ) {
    return deslizar = {
        delay:  delay,
        origin: origen,
        distance: distancia,
        interval: intervalo,
        reset: reset
    }
}

window.onload = function () {
    // Inicializar o reiniciar ScrollReveal después de que la página esté completamente cargada
    ScrollReveal().reveal('.contenido-experiencias h2, .contenido-experiencias p, button', getSlideGroup(100,'right','100%',200, true));
    ScrollReveal().reveal('.mensaje p', getSlideGroup(500,'left','200%', 200, false));
    ScrollReveal().reveal('.contenedor-promociones .promocion', getSlideGroup(100, 'right', '150%', 200, true ));
};
