import { aparecer, desaparecer } from './toogle_admin.js';
import { editTipoDispo } from './edit_tipdispo.js';
import { editMarca } from './edit_marcaequipos.js';
import { editAmbiente } from './edit_ambiente.js';
import { editNave } from './edit_nave.js';
import { editjornada } from './edit_jornada.js';
import { editFormacion } from './edit_formacion.js';
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
import { editUsuario } from './edit_usu.js';
import { editFicha } from './edit_ficha.js';
import editTipPeriferico from './edit_tip_periferico.js';
import editPeriferico from './edit_periferico.js';
import buscadorUser from './buscador_user.js';
import gruposAdmin from './grupos_admin.js';
import editCompusPeri from './edit_compus_peri.js';
import { editAlmacenamiento } from './edit_almacenamiento.js';
import editRam from './edit_ram.js';
import editSo from './edit_sistemaOpera.js';
import addDispoPeri from './add_dispo_peri.js';
import editProcesador from './edit_procesador.js';
import editDispoAmbiente from './edit_dispo_ambientes.js';




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
    const formulaEquipos = [ 'form' , 'formu1' , 'formu2', 'formu3', 'formu4' , 'formu5' , 'formu6', 'formu7', 'formu8' , 'formu9', 'formu10', 'formu11', 'formu12', 'formu13', 'formu14', 'formu15', 'formu16', 'formu17'];
    const formuambientes = [ 'form' , 'formu1' , 'formu2', 'formu3', 'formu4', 'formu5', 'formu6', 'formu7', 'formu8', 'formu9'];
    const formuOtros = ['form', 'formu1', 'formu2', 'formu3', 'formu4', 'formu4', 'formu5', 'formu6', 'formu7' , 'formu9', 'formu10'];


    const callAparecer = ( array ) =>{
        const [ , primera ] = e.target.classList;
        const elemento = document.querySelector(`.${primera}`).getAttribute('data-form');
        const nuevoArray = array.filter( (formulario )=> formulario !== elemento );
        desaparecer( nuevoArray );
        aparecer( elemento );
    }
    if(e.target.matches('.seccUsua li')){
        if(e.target.matches('.aprentabla')){
            document.getElementById('tablainstru').style.display = 'none';
            document.getElementById('tablausu').style.display = 'block';
            document.getElementById('tablausu').style.margin = "30px 4rem";
        }else{
            document.getElementById('tablausu').style.display = 'none';
            document.getElementById('tablainstru').style.display = 'block';
            document.getElementById('tablainstru').style.margin = "30px 4rem";
        }
    }
    // const aparecerEquipo = document.querySelectorAll
    if(e.target.matches('.aparecer')){
        callAparecer(formularios); //aprecer pertenece a usuarios
    }
    if(e.target.matches('.aparecerequipos') || e.target.matches('.aparecerequipos *')){
        callAparecer(formulaEquipos);
    }
    if(e.target.matches('.aparecerambientes') || e.target.matches('.aparecerambientes *')){    
        callAparecer(formuambientes);
    }
    if(e.target.matches('.aparecerotros') || e.target.matches('.aparecerotros *')){
        callAparecer(formuOtros);
    }

    if(e.target.matches(".edit")){
        if(e.target.matches('.tipdispo')){
            const $id = e.target.getAttribute('data-tipdispo');
            editTipoDispo($id);
        }else if(e.target.matches('.marca')){
            const $id = e.target.getAttribute('data-marca');
            editMarca($id);
        }else if(e.target.matches(".tipPeriferico")){
            const $id = e.target.getAttribute('data-tipPeriferico');
            editTipPeriferico( $id );
        }else if(e.target.matches(".estado")){
            const $id = e.target.getAttribute('data-estado');
            editEstadoDispositivo($id);
        }
        else if(e.target.matches(".aprobacion")){
            const $id = e.target.getAttribute('data-estadoapro');
            editEstadoAprobacion($id);
        }else if(e.target.matches(".disponibi")){
            const $id = e.target.getAttribute('data-estadodisponi');
            editEstadodisponibilidad($id);
        }else if(e.target.matches(".dispositivo")){
            const $id = e.target.getAttribute('data-dispositivo');
            editdispoelectronico($id);
        }
        else if(e.target.matches(".ambiente")){
            const $id = e.target.getAttribute('data-ambiente');
            editAmbiente($id);
        }else if(e.target.matches(".nave")){
            const $id = e.target.getAttribute('data-nave');
            editNave($id);
        }else if(e.target.matches(".jornada")){
            const $id = e.target.getAttribute('data-jornada');
            editjornada($id);
        }else if(e.target.matches(".formacion")){
            const $id = e.target.getAttribute('data-formacion');
            editFormacion($id);
        }else if(e.target.matches(".detalle_formacion")){
            const $id = e.target.getAttribute('data-detalleformacion');
            editDetalleformacion($id);
        }else if(e.target.matches('.tipoDocu')){
            const $id = e.target.getAttribute('data-tipoDocu');
            editTipDocu($id);
        }else if(e.target.matches('.tipoUsu')){
            const $id = e.target.getAttribute('data-tipoUsu');
            editTipUsu( $id );
        }else if(e.target.matches('.usuario')){
            const $id = e.target.getAttribute('data-usuario');
            editUsuario( $id );
        }else if(e.target.matches('.fichas')){
            const $id = e.target.getAttribute('data-fichas');
            editFicha( $id );
        }else if(e.target.matches('.periferico')){
            const $id = e.target.getAttribute('data-periferico');
            editPeriferico( $id );
        }else if(e.target.matches('.compu-periferico')){
            const $id = e.target.getAttribute('data-compusPerifericos');
            editCompusPeri($id);
        }else if(e.target.matches('.almacenamiento')){
            const $id = e.target.getAttribute('data-almacenamiento');
            editAlmacenamiento($id);
        }else if(e.target.matches('.ramGB')){
            const $id = e.target.getAttribute('data-ramGB');
            editRam($id);
        }else if(e.target.matches('.Procesador')){
            const $id = e.target.getAttribute('data-procesador');
            editProcesador($id);
        }else if(e.target.matches('.Sistem_opera')){
            const $id = e.target.getAttribute('data-Sistem_opera');
            editSo($id);
        }else if(e.target.matches('.disposi_ambiente')){
            const $id = e.target.getAttribute('data-disposi_ambiente');
            editDispoAmbiente($id);
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
            const id = parseInt(e.target.getAttribute(dataAtribute));
            handleDelete({ id, tabla, urlSuccess});
        }

        if(e.target.matches('.tipdispo')){
            getdelete('data-tipdispo' ,'tipo_dispositivo','pag_admin/equipos.php' );

        }else if(e.target.matches('.marca')){
            getdelete('data-marca', 'marca', 'pag_admin/otro.php');
        }else if( e.target.matches('.tipPeriferico')){
            getdelete('data-tipPeriferico', 'tip_periferico', 'pag_admin/equipos.php');
        }else if(e.target.matches('.estado')){
            getdelete('data-estado', 'estado_dispositivo', 'pag_admin/otro.php');

        }else if(e.target.matches('.aprobacion')){
            getdelete('data-estadoapro', 'estado_aprobacion','pag_admin/otro.php');

        }else if(e.target.matches('.disponibi')){
            getdelete('data-estadodisponi', 'estado_disponibilidad','pag_admin/otro.php');

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
        
        }else if(e.target.matches('.fichas')){
            getdelete('data-fichas', 'fichas', 'pag_admin/ambientes.php');

        }else if(e.target.matches('.periferico')){
            getdelete('data-periferico' , 'periferico', 'pag_admin/equipos.php');

        }else if(e.target.matches('.compu-periferico')){
            getdelete('data-compusPerifericos', 'compu_peris', 'pag_admin/equipos.php');

        }else if(e.target.matches('.ramGB')){
            getdelete('data-ramGB', 'ram', 'pag_admin/equipos.php');

        }else if(e.target.matches('.almacenamiento')){
            getdelete('data-almacenamiento', 'almacenamiento', 'pag_admin/equipos.php');

        }else if(e.target.matches('.Procesador')){
            getdelete('data-procesador', 'procesadores', 'pag_admin/equipos.php');

        }else if(e.target.matches('.Sistem_opera')){
            getdelete('data-Sistem_opera', 'tipo_sistema', 'pag_admin/equipos.php');

        }else if(e.target.matches('.disposi_ambiente')){
            getdelete('data-disposi_ambiente', 'disposi_ambientes', 'pag_admin/otro.php');
        }
    }
});

document.addEventListener('keyup' , (e) => {
    const value = e.target.value;

    if(e.target.matches('#searchinstru')){
        buscadorUser('instructor', value, 'tablainstructor');
    }else if(e.target.matches('#searchapren')){
        buscadorUser('aprendiz', value, 'tablaaprendiz');           
    }else if(e.target.matches('#searchdispo')){
        ajax({
            url: `buscador.php?query=dispo_electronico&id=${value}`,
            method: 'GET',
            cbSuccess: ( { data } ) => {
                const $tabla = document.getElementById('tabladispoelectronico');
                let html = "";
                data.forEach( el => {
                    html += `
                        <tr class="datos">
                            <td>${el.serial}</td>
                            <td>${el.placaSena}</td>
                            <td>${el.nomTipoDispo}</td>
                            <td>${el.nomDispositivo}</td>
                            <td>${el.estadoDisponibilidad}</td>
                            <td>${el.estadoDispositivo}</td>
                            <td>${el.marca}</td>
                            <td class="imgs">
                            <img src="./../../assets/edit-solid.svg" alt="editar" title="editar" class="edit dispositivo"  data-dispositivo="${el.serial}">
                            <img src="./../../assets/trash-solid.svg" alt="eliminar" title="eliminar" class="remove dispositivo"  data-dispositivo="${el.serial}">               
                        </td>
                        </tr>
                    `;
                });

                $tabla.innerHTML = `
                <tr class="header">
                    <td>serial</td>
                    <td>Placa Sena</td>
                    <td>Tipo Dispositivo</td>
                    <td>Nombre </td>
                    <td>Estado disponibilidad</td>
                    <td>Estado Dispositivo</td>
                    <td>Marca</td>
                    <td class="acciones">Acciones</td>
                </tr>
                <tbody>
                    ${
                        ( html !== '' )
                           ? html
                           : `<tr class="undefined"><td> no se encontraron dispositivos electronico </td></tr>`
                    }
                </tbody>
                `;
            }
        });
    }
});

document.addEventListener('submit', (e)=>{
    e.preventDefault();
    let data;
    if(e.target.matches('#formuDispositivo')){
        data = {
            tabla: 'dispositivo_electronico',
            serial: e.target.serial.value, 
            placaSena: e.target.placa_sena.value, 
            Procesador: parseInt(e.target.Procesador.value),
            RamGB: parseInt(e.target.RamGB.value),
            idTipoSiste: parseInt(e.target.id_tipo_siste.value),
            idTipoDis: parseInt(e.target.id_tipo_dis.value),
            estadoDisponi: 1,
            estadoDisposi: 1,
            marca: parseInt(e.target.marca.value),
            Almacenamiento: parseInt(e.target.Almacenamiento.value),
            
        }
        handleAdd(e, 'acciones.php' , data , 'pag_admin/equipos.php');
    }else if( e.target.matches('#tipoDispo')){
        data = {
            tabla: 'tipo_dispositivo',
            nameTipo: e.target.nom_dis.value,
        }
        handleAdd(e , 'acciones.php', data , 'pag_admin/equipos.php');

    }else if(e.target.matches('#tipPeriferico')){
        data = {
            tabla: 'tip_periferico',
            nameTipo: e.target.nameTipPeriferico.value,
        }
        handleAdd(e, 'acciones.php' , data, 'pag_admin/equipos.php');

    }else if(e.target.matches('#memoria_ram')){
        data = {
            tabla: 'ram',
            memoriaRam : e.target.memoriaRam.value,
        }
        handleAdd(e, 'acciones.php' , data, 'pag_admin/equipos.php');

    }else if(e.target.matches('#procesadorform')){
        data = {
            tabla: 'procesadores',
            nom_procesador : e.target.procesador.value,
        }
        handleAdd(e, 'acciones.php' , data, 'pag_admin/equipos.php');

    }else if(e.target.matches('#sistemaoperativo_form')){
        data = {
            tabla: 'tipo_sistema',
            sistema_op : e.target.sistema_op.value,
        }
        handleAdd(e, 'acciones.php' , data, 'pag_admin/equipos.php');

    }else if(e.target.matches('#almacenamientoform')){
        data = {
            tabla: 'almacenamiento',
            tama_almace : e.target.tama_almace.value,
        }
        handleAdd(e, 'acciones.php' , data, 'pag_admin/equipos.php');
    }

    else if( e.target.matches('#marcaEquipos')){
        data = {
            tabla: 'marca',
            nameTipo: e.target.nom_marca.value,
        }   
        handleAdd(e , 'acciones.php', data , 'pag_admin/otro.php');
    }else if( e.target.matches('#estadoDispo') ){
        data = {
            tabla: 'estado_dispositivo',
            nameTipo: e.target.nom_estado.value,
        }
        handleAdd(e, 'acciones.php' , data , 'pag_admin/otro.php');
    }else if( e.target.matches('#estadoApro') ){
        data = {
            tabla: 'estado_aprobacion',
            nameTipo: e.target.nom_estado.value,
        }
        handleAdd(e , 'acciones.php' , data , 'pag_admin/otro.php');
    }else if( e.target.matches('#estadoDisponibilidad') ){
        data = {
            tabla: 'estado_disponibilidad',
            nameTipo: e.target.nom_estado.value,
        }
        handleAdd(e , 'acciones.php' , data , 'pag_admin/otro.php');
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
            documento: parseInt(e.target.doc.value),
            tipDocumento: parseInt(e.target.tip_doc.value),
            tipUsuario: parseInt(e.target.tip_usu.value),
            codigoCarnet: parseInt(e.target.codigo.value),
            nombre: e.target.nom.value,
            apellido: e.target.ape.value,
            fechaNacimiento: e.target.fecha.value,
            genero: parseInt(e.target.genero.value),
            emailPersonal: e.target.email_per.value,
            emailSena: e.target.email_sena.value,
            clave: e.target.clave.value,
            telefono: parseInt(e.target.telefono.value),
        }
        // debugger;
        handleAdd(e, 'insertarusuarios.php', data, 'pag_admin/usuarios.php');
    }else if(e.target.matches('#perifericoform')){
        data = {
            tabla: 'periferico',
            serialPeriferico: e.target.serialperiferico.value,
            tipPeriferico: parseInt(e.target.tipPeriferico.value),
            marcaPeriferico: parseInt(e.target.marcaperiferico.value),
            estadoDisponibilidad: parseInt( e.target.estadoDisponibilidad.value),
            estadoDispositivo: parseInt(e.target.estadoDispositivo.value),
            pulgadas: parseInt(e.target.pulgadas.value),
            caracteristicas: e.target.caracteristicas.value,
        }
        
        handleAdd(e, './acciones.php', data, './pag_admin/equipos.php');
    }else if( e.target.matches('#fichas')){
        data = {
            numero_ficha: parseInt(e.target.numero_ficha.value),
            tip_jornada: parseInt(e.target.tip_jornada.value),
            tip_ambiente: parseInt(e.target.tip_ambiente.value),
            nom_formacion: parseInt(e.target.nom_formacion.value),
            doc_instruc: parseInt(e.target.doc_instruc.value),
        }   
        handleAdd(e , 'insert_ficha.php', data , 'pag_admin/ambientes.php');

    }else if(e.target.matches('#formuCompuPeris')){
        data = {
           tabla: 'compu_peris',
           serialDispo: e.target.serial_dispo.value,
           idPeriferico: e.target.id_periferico.value,
        }
        addDispoPeri(e, 'acciones.php', 'pag_admin/equipos.php', data );

    }else if(e.target.matches('#disposi_ambientes')){
        data = {
           tabla: 'disposi_ambientes',
           IdCompuPeris: e.target.IdCompuPeris.value,
           IdAmbiente: e.target.IdAmbiente.value,
        }
        handleAdd(e, 'acciones.php', 'pag_admin/otro.php', data );
    }
});


document.addEventListener('change', (e) => {
    if(e.target.matches('#ficha')){
        gruposAdmin(e);
    }
});
