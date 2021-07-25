import { getHTML } from './admin.js';
import { ajax } from './ajax.js';

const editRam = ( id ) => {
    const tabla = "ram"
    ajax({
        url: `acciones.php?id=${id}&tabla=${tabla}`,
        method: 'GET',
        cbSuccess: ( { data } ) => {
            const $alert = document.getElementById('alert');
            $alert.classList.add('ver');
            $alert.innerHTML = `
                <form class="formmodal" id="edit_ram">
                    <div class="cerrarmodal">X</div>
                    <input type="hidden" id="id_ram" name="id_ram" value="${data[0].idRam}">
                    <label>Seleccione el tipo de ram</label>
                    <input type="number"  id="id_disabled" name="id_disabled" value="${data[0].idRam}" disabled/>
                    <label for="select_type_ram"> Seleccione el tipo de Ram </label>
                    <input type="text" name="ramName" id="ramName" value="${data[0].nameRam}" />

                    <input type="submit" value="Actualizar" />
                </form>
            `;
        }
    });

    document.addEventListener('submit', e => {
        document.querySelector('.formmodal').classList.add('desplazar');
        setTimeout(() => document.querySelector('.alert').classList.remove('ver'), 1000);
        if(e.target.matches('#edit_ram')){
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
                    tabla: 'ram',
                    id: parseInt(e.target.id_ram.value),
                    ramName: e.target.ramName.value,
                }
            });
        }
    });
}

export default editRam;
