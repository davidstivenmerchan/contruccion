import { aparecer, desaparecer } from './toogle_admin.js';
import { editTipoDispo } from './edit_tipdispo.js';
import { editMarca } from './edit_marcaequipos.js';
import { editEstadoDispositivo } from './edit_estadodispositivo.js';
import { editEstadoAprobacion } from './edit_estadoaprobacion.js';
import { editEstadodisponibilidad } from './estado_disponibilidad.js';
import { editdispoelectronico } from './edit_dispositivoelectronic.js';
import { handleDelete } from './handle_delete.js';
import handleAdd from './handle_add.js';
// import Swal from 'sweetalert2';

const $main = document.querySelector("main");

export const getHTML = ({ url , success , error }) => {
    const xhr = new XMLHttpRequest(); 
    xhr.addEventListener('readystatechange' , e => {
        if(xhr.readyState !== 4) return ;

        if(xhr.status >= 200 && xhr.status < 300){
            // peticion exitosa
            const html = xhr.responseText; // guardo el HTML 
            success(html);
        }else{
            // hubo un error
            let message = xhr.statusText || "ocurrio un error";
            error(`Error ${xhr.status} -- ${message}`);
        }
    });
    xhr.open("GET" , url);
    xhr.send();
} 

document.addEventListener('DOMContentLoaded' , e => {
    getHTML({
        url: 'pag_admin/principal.html',
        success: (html) => $main.innerHTML = html,
        error: (error) => $main.innerHTML = `<h1> ${error} </h1>`
    });
});

const $elemento = document.querySelectorAll('.navigation ul li a');
console.log($elemento);
$elemento.forEach( el =>{
    el.addEventListener('click' , (e) => {
        if(el.classList.contains('salir')) return;
        e.preventDefault();
        // console.log(el.href);
        if(el.classList.contains('primero')) return ;

        getHTML({
            url: el.href,
            success: (html) => $main.innerHTML = html,
            error: (error) => $main.innerHTML = `<h1> ${error} </h1>`
        });
    });
}); 



/** a */
document.addEventListener('click' , e => {

    const formularios = [ 'form' , 'form1' , 'form2', 'form3', 'form4', 'form5'];
    const formula = [ 'form' , 'formu1' , 'formu2', 'formu3' , 'formu4' , 'formu5' , 'formu6', 'formu7', 'formu8' , 'formu9', 'formu10', 'formu11'];

    const callAparecer = ( array ) =>{
        const [ , primera ] = e.target.classList;
        const elemento = document.querySelector(`.${primera}`).getAttribute('data-form');
        const nuevoArray = array.filter( (formulario )=> formulario !== elemento );
        desaparecer( nuevoArray )
        aparecer( elemento );
    }
    
    const callDesaparecer = () =>{
        const [ , primera ] = e.target.classList;
        const elemento = document.querySelector(`.${primera}`).getAttribute('data-form');
        desaparecer( [ elemento ] );
    }
    // const aparecerEquipo = document.querySelectorAll
    if(e.target.matches('.aparecer')){
        callAparecer(formularios);
    }
    if(e.target.matches('.cerrar')){
        callDesaparecer();
    }

    if(e.target.matches('.aparecerequipos') || e.target.matches('.aparecerequipos *')){
        callAparecer(formula);
    }
    if(e.target.matches('.cerrarequipos')){    
        callDesaparecer();
    }

    if(e.target.matches(".edit")){
        if(e.target.matches('.tipdispo')){
            const $id = e.target.getAttribute('data-tipdispo');
            editTipoDispo($id);
        }
        if(e.target.matches(".marca")){
            const $id = e.target.getAttribute('data-marca');
            editMarca($id);
        }
        if(e.target.matches(".estado")){
            const $id = e.target.getAttribute('data-estado');
            editEstadoDispositivo($id);
        }
        if(e.target.matches(".aprobacion")){
            const $id = e.target.getAttribute('data-estadoapro');
            editEstadoAprobacion($id);
        }
        if(e.target.matches(".disponibi")){
            const $id = e.target.getAttribute('data-estadodisponi');
            editEstadodisponibilidad($id);
        }
        if(e.target.matches(".dispositivo")){
            const $id = e.target.getAttribute('data-dispositivo');
            editdispoelectronico($id);
        }   
    }


    if(e.target.matches('.cerrarmodal')){
        const $alerta = document.getElementById('alert');
        const $formAlert = document.querySelector('#alert form');
        setTimeout(() => $alerta.classList.remove('ver'), 1000);
        $formAlert.classList.add('desplazar');
        // Swal.
        // $alerta.style.display="none";
    }

    if(e.target.matches('.remove')){
        /*** la funcion getDelete es una funcion que se hizo con la finalidad de ahorrar code
         *  recibe dos parametros un dataatributo con el cual va a buscar el id del elemento
         * y recibe la tabla que va a afectar.
         */
        const getdelete = ( dataAtribute, tabla ) => { 
            const id = e.target.getAttribute(dataAtribute);
            handleDelete({ id, tabla});
        }

        if(e.target.matches('.tipdispo')){
            getdelete('data-tipdispo' ,'tipo_dispositivo' );
        }else if( e.target.matches('.marca')){
            getdelete('data-marca', 'marca');
        }else if(e.target.matches('.estado')){
            getdelete('data-estado', 'estado_dispositivo');
        }else if(e.target.matches('.aprobacion')){
            getdelete('data-estadoapro', 'estado_aprobacion');
        }else if(e.target.matches('.disponibi')){
            getdelete('data-estadodisponi', 'estado_disponibilidad');
        }else if(e.target.matches('.dispositivo')){
            getdelete('data-dispositivo', 'dispositivo_electronico');
        }
    }
});

document.addEventListener('submit', (e)=>{
    e.preventDefault();
    let data;
    if(e.target.matches('#formuDispositivo')){
        data = {
            serial: e.target.serial.value,
            placaSena: e.target.placa_sena.value,
            nomDispositivo: e.target.nom_dispositivo.value,
            idTipoDis: e.target.id_tipo_dis.value,
            estadoDisponi: e.target.estado_disponi.value,
            estadoDisposi: e.target.estado_disposi.value,
            marca: e.target.marca.value,
        }
        handleAdd(e, 'registro_dispositivo_e.php' , data);
    }else if( e.target.matches('#tipoDispo')){
        data = {
            tabla: 'tipo_dispositivo',
            nameTipo: e.target.nom_dis.value,
        }
        handleAdd(e , 'acciones.php', data);
    }else if( e.target.matches('#marcaEquipos')){
        data = {
            tabla: 'marca',
            nameTipo: e.target.nom_marca.value,
        }   
        handleAdd(e , 'acciones.php', data);
    }else if( e.target.matches('#estadoDispo') ){
        data = {
            tabla: 'estado_dispositivo',
            nameTipo: e.target.nom_estado.value,
        }
        handleAdd(e, 'acciones.php' , data);
    }else if( e.target.matches('#estadoApro') ){
        data = {
            tabla: 'estado_aprobacion',
            nameTipo: e.target.nom_estado.value,
        }
        handleAdd(e , 'acciones.php' , data);
    }else if( e.target.matches('#estadoDisponibilidad') ){
        data = {
            tabla: 'estado_disponibilidad',
            nameTipo: e.target.nom_estado.value,
        }
        handleAdd(e , 'acciones.php' , data);
    }
});
