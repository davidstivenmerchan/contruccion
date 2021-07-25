import { ajax } from './ajax.js';

const editRam = ( id ) => {
    ajax({
        url: 'acciones.php',
        method: 'GET',
        cbSuccess: ( data ) => {
            const $alert = document.getElementById('alert');
            $alert.classList.add('ver');
            $alert.innerHT
        }
    });
}


