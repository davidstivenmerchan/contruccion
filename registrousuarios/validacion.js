const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');




const expresiones = {
	nombre: /^[a-zA-ZÀ-ÿ\s]{3,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{5,12}$/, // 5 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}

const campos = {
    cedula: false,
    codigo: false,
    nombre: false,
    apellido: false,
    telefono: false,
    correo_p: false,
    corroe_s: false,
    pass1: false

}



const validarFormulario = (e) =>{
    switch(e.target.name){
        case "cc":
            if(expresiones.telefono.test(e.target.value)){

                document.getElementById('ccm').classList.remove('cancelcedula__ver');
                document.getElementById('ccb').classList.add('correccedula__ver');
                document.getElementById('mensaje2').classList.remove('mensaje2-mostrar');
                campos['cedula']=true;

            }else{
                document.getElementById('ccb').classList.remove('correccedula__ver');
                document.getElementById('ccm').classList.add('cancelcedula__ver');
                document.getElementById('mensaje2').classList.add('mensaje2-mostrar');
                campos['cedula']=false;
            }
            validarcarnet();
        break;

        case "cod_carnet":

            validarcarnet();
        break;

        case "nom":
            if(expresiones.nombre.test(e.target.value)){

                document.getElementById('nomm').classList.remove('cancelnom_ver');
                document.getElementById('nomb').classList.add('correcnom__ver');
                document.getElementById('mensaje3').classList.remove('mensaje3-mostrar');
                campos['nombre']=true;

            }else{
                document.getElementById('nomb').classList.remove('correcnom__ver');
                document.getElementById('nomm').classList.add('cancelnom_ver');
                document.getElementById('mensaje3').classList.add('mensaje3-mostrar');
                campos['nombre']=false;
            }

        break;
        case "ape":
            if(expresiones.nombre.test(e.target.value)){

                document.getElementById('apem').classList.remove('cancelape_ver');
                document.getElementById('apeb').classList.add('correcape__ver');
                document.getElementById('mensaje4').classList.remove('mensaje4-mostrar');
                campos['apellido']=true;

            }else{
                document.getElementById('apeb').classList.remove('correcape__ver');
                document.getElementById('apem').classList.add('cancelape_ver');
                
                document.getElementById('mensaje4').classList.add('mensaje4-mostrar');
                campos['apellido']=false;
            }

        break;
        case "tell":
            if(expresiones.telefono.test(e.target.value)){

                document.getElementById('telm').classList.remove('canceltel_ver');
                document.getElementById('telb').classList.add('correctel__ver');
                document.getElementById('mensaje5').classList.remove('mensaje5-mostrar');
                campos['telefono']=true;

            }else{
                document.getElementById('telb').classList.remove('correctel__ver');
                document.getElementById('telm').classList.add('canceltel_ver');
                document.getElementById('mensaje5').classList.add('mensaje5-mostrar');
                campos['telefono']=false;
            }

        break;
        case "correo_s":
            if(expresiones.correo.test(e.target.value)){

                document.getElementById('cosm').classList.remove('cancelcos_ver');
                document.getElementById('cosb').classList.add('correccos__ver');
                document.getElementById('mensaje6').classList.remove('mensaje6-mostrar');
                campos['corroe_s']=true;

            }else{
                document.getElementById('cosb').classList.remove('correccos__ver');
                document.getElementById('cosm').classList.add('cancelcos_ver');
                document.getElementById('mensaje6').classList.add('mensaje6-mostrar');
                campos['corroe_s']=false;
            }

        break;
        case "correo_p":
            if(expresiones.correo.test(e.target.value)){

                document.getElementById('copm').classList.remove('cancelcop_ver');
                document.getElementById('copb').classList.add('correccop__ver');
                document.getElementById('mensaje7').classList.remove('mensaje7-mostrar');
                campos['correo_p']=true;

            }else{
                document.getElementById('copb').classList.remove('correccop__ver');
                document.getElementById('copm').classList.add('cancelcop_ver');
                document.getElementById('mensaje7').classList.add('mensaje7-mostrar');
                campos['correo_p']=false;
            }

        break;
        case "password":
            
            if(expresiones.password.test(e.target.value)){

                document.getElementById('pasm').classList.remove('cancelpas_ver');
                document.getElementById('pasb').classList.add('correcpas__ver');
                document.getElementById('mensaje8').classList.remove('mensaje8-mostrar');
                

            }else{
                document.getElementById('pasb').classList.remove('correcpas__ver');
                document.getElementById('pasm').classList.add('cancelpas_ver');
                document.getElementById('mensaje8').classList.add('mensaje8-mostrar');
                
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
        document.getElementById('mensaje9').classList.add('mensaje9-mostrar');
        
        campos['pass1']=false;

    }else{

        document.getElementById('pas2m').classList.remove('cancelpas2_ver');
        document.getElementById('pas2b').classList.add('correcpas2__ver');
        document.getElementById('mensaje9').classList.remove('mensaje9-mostrar');
        
        campos['pass1']=true;

    }
}

const validarcarnet = ()=>{
    const cedula1 = document.getElementById('cedula');
    const cedula2 = document.getElementById('carnet');

    if(cedula1.value !== cedula2.value){
        document.getElementById('codb').classList.remove('correccarnet__ver');
        document.getElementById('codm').classList.add('cancelcarnet__ver');
        document.getElementById('mensaje').classList.add('mensaje-mostrar');
        campos['codigo']=false;
    }else{
        document.getElementById('codm').classList.remove('cancelcarnet__ver');
        document.getElementById('codb').classList.add('correccarnet__ver');
        document.getElementById('mensaje').classList.remove('mensaje-mostrar');
        campos['codigo']=true;

    }
}





    formulario.addEventListener('submit', (e) =>{

        if(campos.cedula && campos.codigo && campos.nombre && campos.apellido && campos.correo_p && campos.corroe_s && campos.telefono && campos.pass1){
            
            console.log('funciona');
         //   document.getElementById('bloqueo').classList.add('bloqueo_quitar');
            
        
        }else{

            e.preventDefault();

        
                document.getElementById('bloqueo').classList.add('bloqueo_quitar');

            setTimeout(() => {

                document.getElementById('bloqueo').classList.remove('bloqueo_quitar');

            }, 5000);
        }
        
        
        
        
    })


inputs.forEach((inputs)=>{
    inputs.addEventListener('keyup', validarFormulario);
    inputs.addEventListener('blur', validarFormulario);
})

