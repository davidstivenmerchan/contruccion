import { scroollBoton } from './scrool_boton.js';

document.addEventListener('DOMContentLoaded' , (e) => {
    scroollBoton('.scroll-top-btn');
});

function aparecer(){
    document.getElementById('login').classList.add('login-box-activo')
}
function desaparecer(){
    document.getElementById('login').classList.remove('login-box-activo')
}
