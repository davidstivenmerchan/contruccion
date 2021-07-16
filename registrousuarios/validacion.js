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

        case "nom":
            if(expresiones.nombre.test(e.target.value)){

                document.getElementById('nomm').classList.remove('cancelnom_ver');
                document.getElementById('nomb').classList.add('correcnom__ver');

            }else{
                document.getElementById('nomb').classList.remove('correcnom__ver');
                document.getElementById('nomm').classList.add('cancelnom_ver');
            }

        break;
        case "ape":
            if(expresiones.nombre.test(e.target.value)){

                document.getElementById('apem').classList.remove('cancelape_ver');
                document.getElementById('apeb').classList.add('correcape__ver');

            }else{
                document.getElementById('apeb').classList.remove('correcape__ver');
                document.getElementById('apem').classList.add('cancelape_ver');
            }

        break;
        case "tell":
            if(expresiones.telefono.test(e.target.value)){

                document.getElementById('telm').classList.remove('canceltel_ver');
                document.getElementById('telb').classList.add('correctel__ver');

            }else{
                document.getElementById('telb').classList.remove('correctel__ver');
                document.getElementById('telm').classList.add('canceltel_ver');
            }

        break;
        case "correo_s":
            if(expresiones.correo.test(e.target.value)){

                document.getElementById('cosm').classList.remove('cancelcos_ver');
                document.getElementById('cosb').classList.add('correccos__ver');

            }else{
                document.getElementById('cosb').classList.remove('correccos__ver');
                document.getElementById('cosm').classList.add('cancelcos_ver');
            }

        break;
        case "correo_p":
            if(expresiones.correo.test(e.target.value)){

                document.getElementById('copm').classList.remove('cancelcop_ver');
                document.getElementById('copb').classList.add('correccop__ver');

            }else{
                document.getElementById('copb').classList.remove('correccop__ver');
                document.getElementById('copm').classList.add('cancelcop_ver');
            }

        break;
        case "password":
            
            if(expresiones.password.test(e.target.value)){

                document.getElementById('pasm').classList.remove('cancelpas_ver');
                document.getElementById('pasb').classList.add('correcpas__ver');

            }else{
                document.getElementById('pasb').classList.remove('correcpas__ver');
                document.getElementById('pasm').classList.add('cancelpas_ver');
            }

            validarcontraseña();

        break;
        case "password2":

            validarcontraseña();
            
        break;
    }
}


const validarcontraseña = ()=>{

    const contra1 = document.getElementById('password');
    const contra2 = document.getElementById('password2');

    if(contra1.value !== contra2.value){

        document.getElementById('pas2b').classList.remove('correcpas2__ver');
        document.getElementById('pas2m').classList.add('cancelpas2_ver');

    }else{

        document.getElementById('pas2m').classList.remove('cancelpas2_ver');
        document.getElementById('pas2b').classList.add('correcpas2__ver');

    }
}


inputs.forEach((inputs)=>{
    inputs.addEventListener('keyup', validarFormulario);
    inputs.addEventListener('blur', validarFormulario);
})

formulario.addEventListener('submit', (e) =>{
    e.preventDefault();
})