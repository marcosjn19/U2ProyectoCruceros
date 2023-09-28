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
    var tipoElement = document.getElementById("tipo-cabina");
    var capacidadElement = document.getElementById("capacidad-cabina");
    var precioElement = document.getElementById("precio-cabina");
    var imagenCabinaElement = document.getElementById("imagen-cabina");
    // Agregar un controlador de eventos de clic a cada elemento
    cabinasDisponibles.forEach(function(cabina) {
        cabina.addEventListener("click", function() {
            // Remover la clase "selected" de todos los elementos con la clase "disponible"
            cabinasDisponibles.forEach(function(cabinaDisponible) {
                cabinaDisponible.classList.remove("selected");
            });

            // Agregar la clase "selected" solo al elemento clickeado
            this.classList.add("selected");

            // Obtener los atributos de datos de la cabina seleccionada
            var tipo = this.getAttribute("data-tipo");
            var capacidad = this.getAttribute("data-capacidad");
            var precio = this.getAttribute("data-precio");
            var imagenUrl = this.getAttribute("data-img");
            // Actualizar los contenidos con la información de la cabina seleccionada
            tipoElement.textContent = "Tipo: " + tipo;
            capacidadElement.textContent = capacidad + " personas";
            precioElement.textContent = precio;
            
            // Mostrar la imagen de la cabina seleccionada
            imagenCabinaElement.style.backgroundImage = "url('" + imagenUrl + "')";            
            console.log("Seleccionado");
        });
    });
});