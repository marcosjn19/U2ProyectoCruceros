const form = document.getElementById('paypal-form');
const inputs = document.querySelectorAll('#paypal-form input');

const expresiones = {
	 // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, 
    Apellido:/^[a-zA-ZÀ-ÿ\s]{1,41}$/, // Letras y espacios, pueden llevar acentos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	
}

const campos = {
	nombre : false,
    apellido: false,
	correo: false,

}

const validarFormulario = (e) => {
	switch (e.target.name) {
		
		case "nombre-cliente":
			validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
        case "apellido-cliente":
			validarCampo(expresiones.Apellido, e.target, 'apellido');
		break;

        case"correo-cliente":
        validarCampo(expresiones.correo, e.target, 'correo');
        break;
		
	}
}

const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		
		
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}


inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});








form.addEventListener('submit', (e) => {
	e.preventDefault();


	if(campos.nombre &&  campos.correo && campos.apellido  ){
	

        form.submit();
	} else {
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
	}
});