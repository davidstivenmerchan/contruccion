const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');




const expresiones = {
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}

const validarFormulario = (e) =>{
    switch(e.target.name){
        case "cc":
            if(expresiones.telefono.test(e.target.value)){

                document.getElementById('ccm').classList.remove('cancelcedula__ver');
                document.getElementById('ccb').classList.add('correccedula__ver');

            }else{
                document.getElementById('ccb').classList.remove('correccedula__ver');
                document.getElementById('ccm').classList.add('cancelcedula__ver');
            }
        break;

        case "cod_carnet":
            if(expresiones.telefono.test(e.target.value)){

                document.getElementById('codm').classList.remove('cancelcarnet__ver');
                document.getElementById('codb').classList.add('correccarnet__ver');

            }else{
                document.getElementById('codb').classList.remove('correccarnet__ver');
                document.getElementById('codm').classList.add('cancelcarnet__ver');
            }
        break;
    }
}

inputs.forEach((inputs)=>{
    inputs.addEventListener('keyup', validarFormulario);
    inputs.addEventListener('blur', validarFormulario);
})

formulario.addEventListener('submit', (e) =>{
    e.preventDefault();
})