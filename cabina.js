/*const asientos = document.querySelectorAll('disponible');

for ( const asiento of asientos ){
    asiento.addEventListener('click', function handleClick(){
        asiento.classList.add('selected');
        console.log("clicked");
    });
}

*/

// cabina.js
document.addEventListener("DOMContentLoaded", function() {
    // Obtener todos los elementos con la clase "disponible"
    var cabinasDisponibles = document.querySelectorAll(".cabina.disponible");

    // Agregar un controlador de eventos de clic a cada elemento
    cabinasDisponibles.forEach(function(cabina) {
        cabina.addEventListener("click", function() {
            // Remover la clase "selected" de todos los elementos con la clase "disponible"
            cabinasDisponibles.forEach(function(cabinaDisponible) {
                cabinaDisponible.classList.remove("selected");
            });

            // Agregar la clase "selected" solo al elemento clickeado
            this.classList.add("selected");
            console.log("Seleccionado");
        });
    });
});