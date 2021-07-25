import { getHTML } from './admin.js';
import { ajax } from './ajax.js';

const editSo = ( id ) => {
    const tabla = "tipo_sistema"
    ajax({
        url: `acciones.php?id=${id}&tabla=${tabla}`,
        method: 'GET',
        cbSuccess: ( { data } ) => {
            const $alert = document.getElementById('alert');
            $alert.classList.add('ver');
            $alert.innerHTML = `
                <form class="formmodal" id="edit_ram">
                    <div class="cerrarmodal">X</div>
                    <input type="hidden" id="id_tipsis" name="id_ram" value="${data[0].id}">
                    <label>Seleccione el tipo de ram</label>
                    <input type="number"  id="id_disabled" name="id_disabled" value="${data[0].id}" disabled/>
                    <label for="select_type_ram"> Seleccione el tipo de Ram </label>
                    <input type="text" name="soName" id="soName" value="${data[0].nameTipoSistema}" />

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
                    tabla: 'tipo_sistema',
                    id: parseInt(e.target.id_tipsis.value),
                    soName: e.target.soName.value,
                }
            });
        }
    });
}

export default editSo;
