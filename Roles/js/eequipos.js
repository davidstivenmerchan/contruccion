/* alert('hola');
const formulario = document.getElementById('marcaEquipos');
const inputs = document.querySelectorAll('#marcaEquipos input');

const expresiones = {
	nombre: /^[a-zA-ZÀ-ÿ\s]{3,40}$/ // Letras y espacios, pueden llevar acentos.
}

const campos = {
    nombre: false
}

const validarFormulario = (e) =>{
    switch(e.target.name){
        case "nom_marca":
            if(expresiones.nombre.test(e.target.value)){
                console.log('holaa')
                document.getElementById('men_marca').classList.remove('men_marca-activo');
                campos['nombre']=true;

            }else{
                console.log('holaa')
                document.getElementById('men_marca').classList.add('men_marca-activo');
                campos['nombre']=false;
            }
        break;
    }
}


inputs.forEach((inputs)=>{
    inputs.addEventListener('keyup', validarFormulario);
    inputs.addEventListener('blur', validarFormulario);
}) */