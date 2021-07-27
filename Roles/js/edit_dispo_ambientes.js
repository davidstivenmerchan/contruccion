import { getHTML } from "./admin.js";
import { ajax } from "./ajax.js";

const editDispoAmbiente = ( $id ) => {
 
    ajax({
        url: `./acciones.php?tabla=disposi_ambientes&id=${$id}`,
        method: 'GET',
        cbSuccess: ( { data } ) => {    
            console.log(data);
            const $alert = document.getElementById('alert');
            $alert.classList.add('ver');
            $alert.innerHTML = `
                <form class="formmodal formmodaldispoPeri" id="formmodaldispoPeri">
                    <div class="cerrarmodal dispocerrar">X</div>
                    <input type="hidden" name="idcompuperi" value="${parseInt(data[0].idCompuPeris)}"  />
                    <label for="inputid"> Id periferico <label>
                    <input type="text" id="inputid" name="inputdisabled" value="${data[0].idCompuPeris}" disabled />
                    <label for="serialdispoperi"> Serial dispositivo </label>
                    <input type="text" name="serialdispoperi" id="serialdispoperi" value="${data[0].serial}"/>
                    <label for="idPeriferico">Id periferico</label>
                    <input type="text" name="idPeriferico" id="idPeriferico" value="${data[0].idPeriferico}" />
                    <label for="dateCompuPeris"> fecha Compu-peris </label>
                    <input type="date" name="dateCompuPeris" id="dateCompuPeris" value="${data[0].fechaCompuPeris}" />
                    <input type="submit" value="Actualizár"/>
                </form>
            `;
        }
    });

    document.addEventListener('submit', async ( e) => {
        document.querySelector('.formmodal').classList.add('desplazar');
        setTimeout( ()=> document.querySelector('.alert').classList.remove('ver'), 1000 )
        e.preventDefault();
        
        if( e.target.matches('#formmodaldispoPeri')){
            const data = {
                tabla: 'compu_peris',
                idCompuDispo: e.target.idcompuperi.value,
                serialDispo: e.target.serialdispoperi.value,
                idPeriferico: e.target.idPeriferico.value,
                dateCompuPeris: e.target.dateCompuPeris.value,
            };

            ajax({
                url:`acciones.php?tabla=dispositivo_electronico&id=${data.serialDispo}`,
                method: 'GET',
                cbSuccess: ({ data:datosSerial }) => {
                    // debugger;
                    // const daticos = [1,2];
                    // daticos.length
                    if(datosSerial.length === 0){
                        Swal.fire({
                            title: 'error!',
                            text: 'el dispositivo al que tratas asociar no existe',
                            icon: 'error',
                            confirmButtonText: 'ok'
                        });
                        return ;
                    }

                    ajax({
                        url: `acciones.php?tabla=periferico&id=${data.idPeriferico}`,
                        method: 'GET',
                        cbSuccess: ( { data:datosPeriferico } ) => {
                            if(datosPeriferico.length === 0){
                                Swal.fire({
                                    title: 'error!',
                                    text: 'el periferico al que tratas asociar no existe',
                                    icon: 'error',
                                    confirmButtonText: 'ok'
                                });
                                return ;
                            }else{
                                ajax({
                                    url: 'acciones.php',
                                    method: 'PUT',
                                    cbSuccess: ( data) => {
                                        setTimeout(() => {
                                            Swal.fire({
                                                title: 'exito!',
                                                text: data.statusText,
                                                icon: 'success',
                                                confirmButtonText: 'ok'
                                            });
                                        }, 1200);
                    
                                        const $main = document.querySelector('main');
                    
                                        getHTML({
                                            url: 'pag_admin/otro.php',
                                            success: ( html ) => $main.innerHTML = html,
                                            error: ( error ) => $main.innerHTML = `<h2> ${error} </h2>`,
                                        });
                                    },
                                    data
                                });
                            }
                        }
                    });
                }
            })
        }
    });
}

export default editDispoAmbiente;