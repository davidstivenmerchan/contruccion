const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');




const expresiones = {
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}

const validarFormu = (e) => {
    console.log('funciona')
}

inputs.forEach((inputs)=>{
    inputs.addEventListener('keyup', validarFormu);
    inputs.addEventListener('blur', validarFormu);
})

formulario.addEventListener('submit', (e) =>{
    console.log('funciona')
})