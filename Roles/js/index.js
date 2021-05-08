import { scroollBoton } from './scrool_boton.js';

const $inicioSesion = document.getElementById('iniciosesion');

document.addEventListener('DOMContentLoaded' , (e) => {
    scroollBoton('.scroll-top-btn');
});
document.addEventListener('click', e => {
    if(e.target === $inicioSesion){
        document.getElementById('login').classList.toggle('login-box-activo');
    }
});

