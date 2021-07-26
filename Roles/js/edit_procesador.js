import { getHTML } from './admin.js';
import { ajax } from './ajax.js';

const editProcesador = ( id ) => {
    const tabla = "procesadores"
    ajax({
        url: `acciones.php?id=${id}&tabla=${tabla}`,
        method: 'GET',
        cbSuccess: ( { data } ) => {
            const $alert = document.getElementById('alert');
            $alert.classList.add('ver');
            $alert.innerHTML = `
                <form class="formmodal" id="edit_procesadores">
                    <div class="cerrarmodal">X</div>
                    <input type="hidden" id="id_procesador" name="id_ram" value="${data[0].id}">
                    <label>Seleccione el Procesador</label>
                    <input type="number"  id="id_disabled" name="id_disabled" value="${data[0].id}" disabled/>
                    <label for="select_type_ram"> Seleccione el Procesador </label>
                    <input type="text" name="TamProcesador" id="TamProcesador" value="${data[0].nameTipoProcesador}" />

                    <input type="submit" value="Actualizar" />
                </form>
            `;
        }
    });

    document.addEventListener('submit', e => {
        document.querySelector('.formmodal').classList.add('desplazar');
        setTimeout(() => document.querySelector('.alert').classList.remove('ver'), 1000);
        if(e.target.matches('#edit_procesadores')){
            ajax({
                url: 'acciones.php',
                method: 'PUT',
                cbSuccess: ( data ) => {
                    setTimeout(() => {
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
                        error: ( err ) => $main.innerHTML = `${err.status} -- ${err.statusText}`,
                    });
                },
                data: {
                    tabla: 'tipo_sistema',
                    id: parseInt(e.target.id_procesador.value),
                    TamProcesador: e.target.TamProcesador.value,
                }
            });
        }
    });
}

export default editProcesador;