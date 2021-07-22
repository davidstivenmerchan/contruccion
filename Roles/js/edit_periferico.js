import { getHTML } from "./admin.js";
import { ajax } from "./ajax.js";


const editPeriferico = ( id ) => {
    const tabla = 'periferico';
    ajax({
        url: `acciones.php?tabla=${tabla}&id=${id}`,
        method: 'GET',
        cbSuccess: ( { data } ) => {
            console.log(data)
            const $alert = document.getElementById('alert');
            $alert.classList.add('ver');
            $alert.innerHTML = `
                <form class="formmodal formmodaltipos" id="editPeriferico">  
                    <div class="cerrarmodal">X</div> 
                    <input type="hidden" name="idperiferico" value="${data[0].id}">
                    <label for="esta_aprobacion"> ID </label>
                    <input type="text" name="iddisable" id="esta_aprobacion" placeholder="${data[0].id}" disabled>
                    <label for="select_tip_periferico">Tipo de periferico</label>
                    <select name="select_tip_periferico" id="select_tip_periferico">
                        <option value="${data[0].idTipoPeriferico}">${data[0].nomPeriferico}</option>
                        ${ajax({
                            url: 'acciones.php?tabla=tip_periferico',
                            method: 'GET',
                            cbSuccess: ( { data:datos } ) => {
                                const $select = document.getElementById('select_tip_periferico');
                                let html;
                                datos.forEach( el => {
                                    ( el.id !== data[0].idTipoPeriferico )
                                        ? html += `<option value="${el.id}"> ${el.nameTipo} </option>`
                                        : null;
                                });
                                $select.innerHTML += html;
                            }
                        })}
                    </select>
                    <select name="select_marca" id="select_marca">
                        <option value="${data[0].idMarca}">${data[0].nomMarca}</option>
                        ${ajax({
                            url: 'acciones.php?tabla=marca',
                            method: 'GET',
                            cbSuccess : ( { data: datos } ) => {
                                const $select = document.getElementById('select_marca');
                                let html;
                                datos.forEach( el => {
                                    ( el.id !== data[0].idMarca )
                                        ? html += `<option value="${el.id}"> ${el.nameTipo} </option>`
                                        : null
                                });
                                $select.innerHTML = html;
                            }
                        })}
                    </select>
                    <select id="select_estado_dispo" name="select_estado_dispo">
                        <option value="${data[0].idEstadoDisponibilidad}"> ${data[0].nomEstadoDisponibilidad} </option>
                        ${ajax({
                           url: 'acciones.php?tabla=estado_disponibilidad',
                           method: 'GET',
                           cbSuccess: ( { data:datos } ) =>{
                               const $select = document.getElementById('select_estado_dispo');
                               let html;
                               datos.forEach( el => {
                                   ( el.id !== data[0].idEstadoDisponibilidad )
                                        ? html += `<option value="${el.id}"> ${el.nameTipo} </option>`
                                        : null;
                               });
                               $select.innerHTML += html;
                           } 
                        })}
                        </select>
                        <select name="select_estado_dispositivo" id="select_estado_dispositivo">
                            <option value="${data[0].idEstadoDispositivo}"> ${ data[0].nomEstadoDispositivo }</option>
                            ${ajax({
                                url: 'acciones.php?tabla=estado_dispositivo',
                                method: 'GET',
                                cbSuccess: ( {data:datos} ) => {
                                    const $select = document.getElementById('select_estado_dispositivo');
                                    let html;
                                    datos.forEach( el => {
                                        ( el.id !== data[0].idEstadoDispositivo )
                                            ? html += `<option value="${el.id}"> ${ el.nameTipo }</option>`
                                            : null;
                                    });
                                    $select.innerHTML += html;
                                }
                            })} 
                        </select>
                    <label for="pulgadasPeriferico"> pulgadas periferico </label>
                    <input type="text" name="pulgadas_periferico" id="pulgadasPeriferico" class="pulgadasPeriferico" value="${data[0].pulgadas}">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" name="descripcion" id="descripcion" class="descripcion" value="${data[0].descripcion}" />
                    <input type="submit" value="actualizar"/>   
                </form>
            `;
        }
    });


    document.addEventListener('submit', e => {
        document.querySelector('.formmodal').classList.add('desplazar');
        setTimeout( () => document.querySelector('.alert').classList.remove('ver'), 1000 );
        if(e.target.matches('#editPeriferico')){
            e.preventDefault();
            console.log('entre aqui que emocion viva el perico');
            const data = {
                tabla,
                idPeriferico: e.target.idperiferico.value,
                tipPeriferico: parseInt(e.target.select_tip_periferico.value),
                marca: parseInt(e.target.select_marca.value),
                estadoDisponibilidad: parseInt(e.target.select_estado_dispo.value),
                estadoDispositivo: parseInt(e.target.select_estado_dispositivo.value),
                pulgadas: parseInt(e.target.pulgadas_periferico.value),
                descripcion: e.target.descripcion.value,
            }
            ajax({
                url: 'acciones.php',
                method: 'PUT',
                cbSuccess: (  data ) => {
                    setTimeout( ()=>{
                        Swal.fire({
                            title: 'Cambio Exitoso!',
                            text: data.statusText,
                            icon: 'success',
                            confirmButtonText: 'ok',
                        });
                    }, 1200);
                    
                    const $main = document.querySelector('main');
                    getHTML({
                        url: 'pag_admin/equipos.php',
                        success: ( html ) => $main.innerHTML = html,
                        error: ( err ) => $main.innerHTML = `<h1> ${err.status} ${err.statusText} </h1>`,
                    });
                },
                data
            });
        }

        console.log('pase de largo huevas');
    });
}

export default editPeriferico;