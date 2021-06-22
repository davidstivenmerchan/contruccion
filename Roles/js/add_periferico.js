import { ajax } from "./ajax.js";

const addPeriferico = ( value ) =>{
    const $alert = document.getElementById('#alert');
    ajax({
        url: `./acciones.php?tabla=periferico&tipDispo=${parseInt(value)}`,
        method: 'GET',
        cbSuccess: ({ data }) =>{
            console.log(data);
        }
    });
}

export default addPeriferico;