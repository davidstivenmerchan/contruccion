import { ajax } from "./ajax.js";
import { getHTML } from "./admin.js";

export const editDetalleformacion = ( id ) =>{
    const tabla = 'detalle_formacionnico';
    fetch(`./acciones.php?id=${id}&tabla=${tabla}`)
     .then( res => res.ok ? res.json() : Promise.reject(res) )
     .then(({ data }) => {
        const $alert = document.getElementById('alert');
        $alert.classList.add('ver');
        $alert.innerHTML = `
        <form class="formmodal formmodaldispo"id="detalle_formacion" >
        <div class="cerrarmodal dispocerrar">X</div>
        <input type="hidden" name="serialantiguo" value="${data[0].serial}">
        <label for="detalle_formacionnico"> Serial </label>
        <input type="text" name="idserial" id="detalle_formacionnico" value="${data[0].serial}">

        <label for="id_formacion"> Formacion </label>
        <input type="text" name="id_formacion" id="id_formacion" class="id_formacion" id="id_formacion" value="${data[0].id_formacion}">

        

        <label for="select_tipo_dispo"> Tipo Dispositivo </label>
        <select name="select_tipo_dispo" id="select_tipo_dispo">
            <option value="${data[0].idTipoDispositivo}">${data[0].nom_tipo_dispositivo}</option>
            ${ajax({
                url: "./acciones.php?tabla=tipo_dispositivo",
                cbSuccess: ( { data: datos } ) => {
                    const $select = document.getElementById('select_tipo_dispo');
                    let $html ;
                    datos.forEach( el => {
                        ( el.id !== data[0].idTipoDispositivo )
                         ? $html += `<option value="${el.id}"> ${el.nameTipo} </option>`
                         : null;
                    });
                    $select.innerHTML += $html;
                }
            })}
        </select> 

        <label for="namedetalle_formacionnico"> Nombre Dispositivo  </label>
        <input type="text" name="namedetalle_formacionnico" id="namedetalle_formacionnico" class="namedetalle_formacionnico" value="${data[0].nom_dispositivo}">

        <label for="select_estado_disponibilidad"> Estado Disponibilidad  </label>
        <select name="select_estado_disponibilidad" id="select_estado_disponibilidad" >
            <option value="${data[0].idEstadoDisponibilidad}"> ${data[0].nom_estado_disponibilidad} </option>
            ${ajax({
                url: "./acciones.php?tabla=estado_disponibilidad",
                cbSuccess: ( { data: datos } ) => {
                    const $select = document.getElementById('select_estado_disponibilidad');
                    let $html ;
                    datos.forEach( el => {
                        ( el.id !== data[0].idEstadoDisponibilidad )
                          ? $html += `<option value="${el.id}"> ${el.nameTipo} </option>`
                          : null;
                    });
                    $select.innerHTML += $html;
                }
            })}
        </select>

        <label for="select_estado_dispositivo"> Estado Dispositivo  </label>
        <select name="select_estado_dispositivo" id="select_estado_dispositivo" >
            <option value="${data[0].idEstadoDispositivo}">${data[0].nom_estado_dispositivo}</option>
            ${ajax({
                url: "./acciones.php?tabla=estado_dispositivo",
                cbSuccess: ( { data: datos } ) => {
                    const $select = document.getElementById('select_estado_dispositivo');
                    let $html ;
                    datos.forEach( el => {
                        ( el.id !== data[0].idEstadoDispositivo )
                          ? $html += `<option value="${el.id}"> ${el.nameTipo} </option>`
                          : null;
                    });
                    $select.innerHTML += $html;
                }
            })}
        </select>

        <label for="select_marca"> Marca  </label>
    <select name="select_marca" id="select_marca">
        <option value="${data[0].idMarca}"> ${data[0].nom_marca} </option>
        ${ajax({
            url: "./acciones.php?tabla=marca",
            cbSuccess: ( { data: datos } ) => {
                const $select = document.getElementById('select_marca');
                let $html ;
                datos.forEach( el => {
                    ( el.id !== data[0].idMarca ) 
                      ? $html += `<option value="${el.id}"> ${el.nameTipo} </option>`
                      : null;
                });
                $select.innerHTML += $html;
            }
        })}
    </select>

        <input type="submit" value="actualizar"/>
        </form>
        `;
        const $formModal = document.querySelector('.formmodal');
        $formModal.classList.remove('desplazar');
        console.log(data)
    })
    .catch( err => console.error(err) );

    document.addEventListener('submit' , (e) => {
        document.querySelector('.formmodal').classList.add('desplazar');
        setTimeout( ()=> document.querySelector('.alert').classList.remove('ver'), 1000 );
        e.preventDefault();
        if(e.target.matches('#detalle_formacion')){
            ajax({
                url: './acciones.php',
                method: 'PUT',
                cbSuccess: async ( data ) => {
                    await setTimeout( () => {
                        Swal.fire({
                            title: 'Cambio Exitoso',
                            text: data.statusText,
                            icon: 'success',
                            confirmButtonText: 'ok'
                        });
                    }, 1200);

                    const $main = document.querySelector('main');

                    getHTML({
                        url: 'pag_admin/equipos.php',
                        success: (html) => $main.innerHTML = html,
                        error: (error) => $main.innerHTML = `<h1>${error}</h1>`,
                    });
                },
                data: {
                    tabla: 'detalle_formacionnico',
                    serialAntiguo:parseInt(e.target.serialantiguo.value),
                    serial: parseInt(e.target.idserial.value),
                    id_formacion: parseInt(e.target.id_formacion.value),
                    TipoDispo: parseInt(e.target.select_tipo_dispo.value),
                    nameDispositivoElectronico: e.target.namedetalle_formacionnico.value,
                    EstadoDisponibilidad: parseInt(e.target.select_estado_disponibilidad.value),
                    EstadoDispositivo: parseInt(e.target.select_estado_dispositivo.value), 
                    marca: parseInt(e.target.select_marca.value),
                }
            });
        }
    });
}