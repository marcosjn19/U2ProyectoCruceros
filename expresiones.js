const form = document.getElementById('formulario-registro');
const inputs = document.querySelectorAll('#formulario-registro input');

const form2 = document.getElementById('formulario-login');
const inputs2 = document.querySelectorAll('#formulario-login input');


const expresiones = {
	 // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, 
    Apellido:/^[a-zA-ZÀ-ÿ\s]{1,41}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}

const campos = {
	nombre: false,
    Apellido: false,
	Contraseña: false,
	Correo_Electronico: false,
	correo_log: false,
	telefono: false
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		
		case "nombre":
			validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
        case "Apellido":
			validarCampo(expresiones.Apellido, e.target, 'Apellido');
		break;
		case "Contraseña":
			validarCampo(expresiones.password, e.target, 'Contraseña');
			
		break;
		
		
        case "Correo_Electronico":
        validarCampo(expresiones.correo, e.target, 'Correo_Electronico');
        break;

		case "correo_log":
        validarCampo(expresiones.correo, e.target, 'correo_log');
        break;


		case "telefono":
			validarCampo(expresiones.telefono, e.target, 'telefono');
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

inputs2.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});




form.addEventListener('submit', (e) => {
    e.preventDefault();

    if (campos.nombre && campos.Apellido && campos.Contraseña && campos.Correo_Electronico && campos.telefono) {
        // Todas las validaciones son exitosas, puedes enviar el formulario al archivo PHP
        form.submit();
    } else {
        // Mostrar un mensaje de error o realizar alguna acción si las validaciones fallan
        document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
    }
});

form2.addEventListener('submit', (e) => {
    e.preventDefault();

    if ( campos.correo_log) {
        // Todas las validaciones son exitosas, puedes enviar el formulario al archivo PHP
        form.submit();
    } else {
        // Mostrar un mensaje de error o realizar alguna acción si las validaciones fallan
        document.getElementById('formulario__mensaje-log').classList.add('formulario__mensaje-log-activo');
    }
});