
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


ScrollReveal().reveal('.contenido-experiencias h2, .contenido-experiencias p, button', getSlideGroup(100,'right','100%',200, true));
ScrollReveal().reveal('.mensaje p',    getSlideGroup(500,'left','200%', 200, false));
ScrollReveal().reveal('.contenedor-promociones .promocion', getSlideGroup(100, 'right', '150%', 200, true ));

