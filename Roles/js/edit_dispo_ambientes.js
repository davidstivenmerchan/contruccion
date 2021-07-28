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
                <form class="formmodal formmodaldispoPeri" id="disposiAmbientes">
                    <div class="cerrarmodal dispocerrar">X</div>
                    <input type="hidden" name="idDispoAmbi" value="${parseInt(data[0].idDisposiAmbientes)}"  />
                    <label for="inputid"> Id periferico <label>
                    <input type="number" id="inputid" name="inputdisabled" value="${data[0].idDisposiAmbientes}" disabled />

                    <label for="CompuPeris"> Computadores Perisfericos </label>
                    <input type="number" name="CompuPeris" id="CompuPeris" value="${data[0].idCompuPeris}"/>

                    <label for="Ambiente"> Ambiente </label>
                    <input type="number" name="Ambiente" id="Ambiente" value="${data[0].idAmbiente}"/>

                    <input type="submit" value="Actualizár"/>
                </form>
            `;
        }
    });

    document.addEventListener('submit', async ( e) => {
        document.querySelector('.formmodal').classList.add('desplazar');
        setTimeout( ()=> document.querySelector('.alert').classList.remove('ver'), 1000 )
        e.preventDefault();
        
        if( e.target.matches('#disposiAmbientes')){
            const data = {
                tabla: 'disposi_ambientes',
                idDispoAmbi: parseInt(e.target.idDispoAmbi.value),
                CompuPeris: parseInt(e.target.CompuPeris.value),
                Ambiente: parseInt(e.target.Ambiente.value),
            };

            ajax({
                url:`acciones.php?tabla=ambiente&id=${data.Ambiente}`,
                method: 'GET',
                cbSuccess: ({ data:datosSerial }) => {
                    // debugger;
                    // const daticos = [1,2];
                    // daticos.length
                    if(datosSerial.length === 0){
                        Swal.fire({
                            title: 'error!',
                            text: 'El dispositivo al que tratas asociar no existe',
                            icon: 'error',
                            confirmButtonText: 'ok'
                        });
                        return ;
                    }

                    ajax({
                        url: `acciones.php?tabla=compu_peris&id=${data.CompuPeris}`,
                        method: 'GET',
                        cbSuccess: ( { data:datosPeriferico } ) => {
                            if(datosPeriferico.length === 0){
                                Swal.fire({
                                    title: 'error!',
                                    text: 'El Dispositivo al que tratas asociar no existe',
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