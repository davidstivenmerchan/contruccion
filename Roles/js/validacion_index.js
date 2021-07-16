const  formulario  =  documento . getElementById ( 'form1' ) ;
const inputs =  documento . querySelectorAll ( '#form1 input' ) ;

const expresiones =  {
    usuario : / ^ \ d { 3,11 } $ / , // 3 a 11 numeros.
	clave : / ^ . { 3,12 } $ / ,  // 4 a 12 dígitos.
}

const validarFormulario = (e) => {
    switch (e.target.name) {
        case "usuario":
            if(expresiones.usuario.test(e.target.value)){
                document.getElementById('form_usuario').classList.remove('form_usuario-incorrecto');
                document.getElementById('form_usuario').classList.add('form_usuario-correcto');
                document.querySelector('#form_usuario i').classList.add('fa-check-circle');
                document.querySelector('#form_usuario i').classList.remove('fa-times-circle');
            }else{
                document.getElementById('form_usuario').classList.add('form_usuario-incorrecto');
                document.getElementById('form_usuario').classList.remove('form_usuario-correcto');
                document.querySelector('#form_usuario i').classList.add('fa-times-circle');
                document.querySelector('#form_usuario i').classList.remove('fa-check-circle');
                document.querySelector('#form_usuario .form_input_error').classList.add('.form_input_error-activo');
            }
        break;  
        case "clave":
            if(expresiones.usuario.test(e.target.value)){
                document.getElementById('form_clave').classList.remove('form_usuario-incorrecto');
                document.getElementById('form_clave').classList.add('form_usuario-correcto');
                document.querySelector('#form_clave i').classList.add('fa-check-circle');
                document.querySelector('#form_clave i').classList.remove('fa-times-circle');
            }else{
                document.getElementById('form_clave').classList.add('form_usuario-incorrecto');
                document.getElementById('form_clave').classList.remove('form_usuario-correcto');
                document.querySelector('#form_clave i').classList.add('fa-times-circle');
                document.querySelector('#form_clave i').classList.remove('fa-check-circle');
                document.querySelector('#form_clave .form_input_error').classList.add('.form_input_error-activo');
            }
        break;
    }
}

 inputs.forEach((input) => {
     input.addEventListener('keyup', validarFormulario);
     input.addEventListener('blur', validarFormulario);
 });

 form1.addEventListener('submit', (e) =>{
     e.preventDefaul();
 });


 