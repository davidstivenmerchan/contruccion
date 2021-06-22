import { aparecer, desaparecer } from './toogle_admin.js';
import { editTipoDispo } from './edit_tipdispo.js';
import { editMarca } from './edit_marcaequipos.js';
import { editAmbiente } from './edit_ambiente.js';
import { editNave } from './edit_nave.js';
import { editjornada } from './edit_jornada.js';
import { editFormacion } from './edit_formacion.js';
import { editDetalleformacion } from './edit_detalleforma.js';
import { editEstadoDispositivo } from './edit_estadodispositivo.js';
import { editEstadoAprobacion } from './edit_estadoaprobacion.js';
import { editEstadodisponibilidad } from './estado_disponibilidad.js';
import { editdispoelectronico } from './edit_dispositivoelectronic.js';
import { handleDelete } from './handle_delete.js';
import handleAdd from './handle_add.js';
import { editTipDocu } from './edit_tip_docu.js';
import { editTipUsu } from './edit_tipusu.js';
import addPeriferico from './add_periferico.js';
import { ajax } from './ajax.js';





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
    const formula = [ 'form' , 'formu1' , 'formu2', 'formu3' , 'formu4' , 'formu5' , 'formu6', 'formu7', 'formu8' , 'formu9', 'formu10', 'formu11','formu12', 'formu13'];
    const formuambientes = [ 'form' , 'formu1' , 'formu2', 'formu3', 'formu4', 'formu5', 'formu6', 'formu7', 'formu8', 'formu9'];

    const callAparecer = ( array ) =>{
        const [ , primera ] = e.target.classList;
        const elemento = document.querySelector(`.${primera}`).getAttribute('data-form');
        const nuevoArray = array.filter( (formulario )=> formulario !== elemento );
        desaparecer( nuevoArray )
        aparecer( elemento );
    }
    
    
    // const aparecerEquipo = document.querySelectorAll
    if(e.target.matches('.aparecer')){
        callAparecer(formularios); //aprecer pertenece a usuarios
    }
    if(e.target.matches('.aparecerequipos') || e.target.matches('.aparecerequipos *')){
        callAparecer(formula);
    }
    if(e.target.matches('.aparecerambientes') || e.target.matches('.aparecerambientes *')){    
        callAparecer(formuambientes);
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
        if(e.target.matches(".ambiente")){
            const $id = e.target.getAttribute('data-ambiente');
            editAmbiente($id);
        }   
        if(e.target.matches(".nave")){
            const $id = e.target.getAttribute('data-nave');
            editNave($id);
        }
        if(e.target.matches(".jornada")){
            const $id = e.target.getAttribute('data-jornada');
            editjornada($id);
        }
        if(e.target.matches(".formacion")){
            const $id = e.target.getAttribute('data-formacion');
            editFormacion($id);
        }
        if(e.target.matches(".detalle_formacion")){
            const $id = e.target.getAttribute('data-detalleformacion');
            editDetalleformacion($id);
        }   
        if(e.target.matches('.tipoDocu')){
            const $id = e.target.getAttribute('data-tipoDocu');
            editTipDocu($id);
        }
        if(e.target.matches('.tipoUsu')){
            const $id = e.target.getAttribute('data-tipoUsu');
            editTipUsu( $id );
        }  
    }


    if(e.target.matches('.cerrarmodal')){
        const $alerta = document.getElementById('alert');
        const $formAlert = document.querySelector('#alert form');
        setTimeout(() => $alerta.classList.remove('ver'), 1000);
        $formAlert.classList.add('desplazar');
    }

    if(e.target.matches('.remove')){
        /*** la funcion getDelete es una funcion que se hizo con la finalidad de ahorrar code
         *  recibe dos parametros un dataatributo con el cual va a buscar el id del elemento
         * y recibe la tabla que va a afectar.
         */
        const getdelete = ( dataAtribute, tabla, urlSuccess ) => { 
            const id = e.target.getAttribute(dataAtribute);
            handleDelete({ id, tabla, urlSuccess});
        }

        if(e.target.matches('.tipdispo')){
            getdelete('data-tipdispo' ,'tipo_dispositivo','pag_admin/equipos.php' );

        }else if( e.target.matches('.marca')){
            getdelete('data-marca', 'marca');

        }else if(e.target.matches('.estado')){
            getdelete('data-estado', 'estado_dispositivo', 'pag_admin/equipos.php');

        }else if(e.target.matches('.aprobacion')){
            getdelete('data-estadoapro', 'estado_aprobacion','pag_admin/equipos.php');

        }else if(e.target.matches('.disponibi')){
            getdelete('data-estadodisponi', 'estado_disponibilidad','pag_admin/equipos.php');

        }else if(e.target.matches('.dispositivo')){
            getdelete('data-dispositivo', 'dispositivo_electronico','pag_admin/equipos.php');

        }else if(e.target.matches('.nave')){
            getdelete('data-nave', 'nave','pag_admin/ambientes.php');

        }else if(e.target.matches('.jornada')){
            getdelete('data-jornada', 'jornada','pag_admin/ambientes.php');

        }else if(e.target.matches('.formacion')){
            getdelete('data-formacion', 'formacion','pag_admin/ambientes.php');

        }else if(e.target.matches('.detalle_formacion')){
            getdelete('data-detalleformacion', 'detalle_formacion','pag_admin/ambientes.php');

        }else if(e.target.matches('.tipoDocu')){
            getdelete('data-tipoDocu', 'tipo_documento', 'pag_admin/usuarios.php');

        }else if(e.target.matches('.tipoUsu')){
            getdelete('data-tipoUsu', 'tipo_usuario', 'pag_admin/usuarios.php');

        }else if(e.target.matches('.ambiente')){
            getdelete('data-ambiente', 'ambiente', 'pag_admin/ambientes.php');

        }else if(e.target.matches('.usuario')){
            getdelete('data-usuario', 'usuarios', 'pag_admin/usuarios.php');
        }
    }
});

document.addEventListener('change' , (e) => {
    if(e.target.matches("#id_tipo_dis")){
        const value = e.target.value;
        addPeriferico(value);
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
        handleAdd(e, 'registro_dispositivo_e.php' , data , 'pag_admin/equipos.php');
    }else if( e.target.matches('#tipoDispo')){
        data = {
            tabla: 'tipo_dispositivo',
            nameTipo: e.target.nom_dis.value,
        }
        handleAdd(e , 'acciones.php', data , 'pag_admin/equipos.php');
    }else if( e.target.matches('#marcaEquipos')){
        data = {
            tabla: 'marca',
            nameTipo: e.target.nom_marca.value,
        }   
        handleAdd(e , 'acciones.php', data , 'pag_admin/equipos.php');
    }else if( e.target.matches('#estadoDispo') ){
        data = {
            tabla: 'estado_dispositivo',
            nameTipo: e.target.nom_estado.value,
        }
        handleAdd(e, 'acciones.php' , data , 'pag_admin/equipos.php');
    }else if( e.target.matches('#estadoApro') ){
        data = {
            tabla: 'estado_aprobacion',
            nameTipo: e.target.nom_estado.value,
        }
        handleAdd(e , 'acciones.php' , data , 'pag_admin/equipos.php');
    }else if( e.target.matches('#estadoDisponibilidad') ){
        data = {
            tabla: 'estado_disponibilidad',
            nameTipo: e.target.nom_estado.value,
        }
        handleAdd(e , 'acciones.php' , data , 'pag_admin/equipos.php');
    }else if( e.target.matches('#nave')){
        data = {
            tabla: 'nave',
            nameTipo: e.target.nom_nave.value,
        }
        handleAdd(e, 'acciones.php', data , 'pag_admin/ambientes.php');
    }else if( e.target.matches('#jornada')){
        data = {
            tabla: 'jornada',
            nameTipo: e.target.nom_jornada.value,
        }
        handleAdd(e, 'acciones.php', data , 'pag_admin/ambientes.php');
    }else if( e.target.matches('#formacion')){
        data = {
            tabla: 'formacion',
            nameTipo: e.target.nom_formacion.value,
        }
        handleAdd(e, 'acciones.php', data , 'pag_admin/ambientes.php');
    }else if( e.target.matches('#detalle_formacion')){
        data = {
            tabla: 'detalle_formacion',
            formacion : e.target.formacion.value,
            num_ficha : e.target.num_ficha.value,
            ambiente : e.target.ambiente.value,
        }
        handleAdd(e, 'acciones.php', data , 'pag_admin/ambientes.php');
    }else if( e.target.matches('#ambientes')){
        data = {
            tabla: 'ambiente',
            id_ambiente : e.target.id_ambiente.value,
            nom_ambiente : e.target.nom_ambiente.value,
            nave : e.target.nave.value,
        }
        handleAdd(e, 'acciones.php', data , 'pag_admin/ambientes.php');
    }else if( e.target.matches('#creartipodocu') ){
        data = {
            tabla: 'tipo_documento',
            nom_doc: e.target.nom_doc.value,
        }
        handleAdd(e, 'insertarusuarios.php', data, 'pag_admin/usuarios.php');
    }else if(e.target.matches('#creartipusu')){
        data = {
            tabla: 'tipo_usuario',
            nom_usu: e.target.nom_usu.value,
        }   
        handleAdd(e, 'insertarusuarios.php', data, 'pag_admin/usuarios.php');
    }else if(e.target.matches('#crearusuario')){
        data = {
            tabla: 'usuarios',
            documento: e.target.doc.value,
            tipDocumento: e.target.tip_doc.value,
            tipUsuario: e.target.tip_usu.value,
            codigoCarnet: e.target.codigo.value,
            nombre: e.target.nom.value,
            apellido: e.target.ape.value,
            fechaNacimiento: e.target.fecha.value,
            genero: e.target.genero.value,
            emailPersonal: e.target.email_per.value,
            emailSena: e.target.email_sena.value,
            clave: e.target.clave.value,
            imagen: e.target.imagen.value,
        }
        handleAdd(e, 'insertarusuarios.php', data, 'pag_admin/usuarios.php');
    }else if(e.target.matches('#perifericoform')){
        data = {
            tabla: 'periferico',
            serialPeriferico: e.target.serialperiferico.value,
            tipPeriferico: e.target.tipPeriferico.value,
            nomPeriferico:e.target.nom_periferico.value,
            nomPeriferico: e.target.nom_periferico.value,
            marcaPeriferico: e.target.marcaperiferico.value,
            estadoDisponibilidad: e.target.estadoDisponibilidad.value,
            estadoDispositivo: e.target.estadoDispositivo.value,
            dispositivoElectronico: e.target.dispositivoElectronico.value,
        }
        ajax({
            url: `./acciones.php?tabla=dispositivo_electronico&id=${parseInt(data.dispositivoElectronico)}`,
            cbSuccess : ( {data} ) => {
                if(data.length === 0){
                    alert('no se puede registrar por que no se puede asignar un dispositivo electronico que no existe');
                }else{
                    handleAdd(e, './acciones.php', data, './pag_admin/usuarios.php');
                }
            }
        })
    }
});
