const  formulario  = document.getElementById('form1');
const inputs = document.querySelectorAll('#form1 input');

const expresiones =  {
    usuario : /^\d{1,4}$/, // Letras, numeros, guion y guion_bajo
	clave : /^.{1,4}$/,   // 3 a 12 dígitos.
}

const campos = {
    usuario: false,
    clave: false
}
const validarFormulario = (e) => {
    switch (e.target.name) {
        case "usuario":
            validarCampo(expresiones.usuario, e.target, 'usuario');
        break;  
        case "clave":
            validarCampo(expresiones.usuario, e.target, 'clave');
        break;
    }
}
const validarCampo = (expresion, input, campo ) => {
    if(expresion.test(input.value)){
        document.getElementById(`form_${campo}`).classList.remove('form_usuario-incorrecto');
        document.getElementById(`form_${campo}`).classList.add('form_usuario-correcto');
        document.querySelector(`#form_${campo} i`).classList.add('fa-check-circle');
        document.querySelector(`#form_${campo} i`).classList.remove('fa-times-circle');
        document.querySelector(`#form_${campo} .form_input_error`).classList.remove('form_input_error-activo');
        campos[campo] = true;
    }else{
        document.getElementById(`form_${campo}`).classList.add('form_usuario-incorrecto');
        document.getElementById(`form_${campo}`).classList.remove('form_usuario-correcto');
        document.querySelector(`#form_${campo} i`).classList.add('fa-times-circle');
        document.querySelector(`#form_${campo} i`).classList.remove('fa-check-circle');
        document.querySelector(`#form_${campo} .form_input_error`).classList.add('form_input_error-activo');
        campos[campo] = false;
    }
}

inputs.forEach((input) => {
     input.addEventListener('keyup', validarFormulario);
     input.addEventListener('blur', validarFormulario);
 });

formulario.addEventListener('submit', (e) => {
    if(campos.usuario && campos.clave){ 
        formulario.reset()
    }else{
        document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
    }
});

 