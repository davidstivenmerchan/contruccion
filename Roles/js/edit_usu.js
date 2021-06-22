import { ajax } from "./ajax.js";
import { getHTML } from "./admin.js";

export const editUsuario = ( id ) =>{
    const tabla = 'usuarios';
    fetch(`./acciones.php?id=${id}&tabla=${tabla}`)
     .then( res => res.ok ? res.json() : Promise.reject(res) )
     .then(({ data }) => {
        console.log(data);
        const $alert = document.getElementById('alert');
        $alert.classList.add('ver');
        $alert.innerHTML = `
        <form class="formmodal formmodaldispo "id="usuario" style="padding: -50px"; >
        <div class="cerrarmodal dispocerrar">X</div>
        <input type="hidden" name="documentoantiguo" value="${data[0].documento}"  disabled>
        <label for="usuarios"> documento </label>
        <input type="text" name="documento" id="usuarios" value="${data[0].documento}" disabled>

        <label for="select_tipo_docu"> Tipo Documento </label>
        <select name="select_tipo_docu" id="select_tipo_docu">
            <option value="${data[0].id_tipo_documento}">${data[0].select_documento}</option>
            ${ajax({
                url: "./acciones.php?tabla=tipo_documento",
                cbSuccess: ( { data: datos } ) => {
                    const $select = document.getElementById('select_tipo_docu');
                    let $html ;
                    datos.forEach( el => {
                        ( el.id !== data[0].id_tipo_documento )
                         ? $html += `<option value="${el.id}"> ${el.nameTipo} </option>`
                         : null;
                    });
                    $select.innerHTML += $html;
                }
            })}
        </select>

        <label for="Cod_Carnet"> Cod Carnet </label>
        <input type="number" name="cod_carnet" id="cod_carnet" class="cod_carnet" id="cod_carnet" value="${data[0].cod_carnet}">

        <label for="Nombres"> Nombres </label>
        <input type="text" name="nombres" id="nombres" class="nombres" id="nombres" value="${data[0].nombres}">

        <label for="Apellidos"> Apellidos </label>
        <input type="text" name="apellidos" id="apellidos" class="apellidos" id="apellidos" value="${data[0].apellidos}">

        <label for="Fecha_Nacimiento"> fecha Nacimiento </label>
        <input type= "text" name="fecha_nacimiento" id="fecha_nacimiento" class="fecha_nacimiento" id="fecha_nacimiento" value="${data[0].fecha_nacimiento}">

        <label for="correo_personal"> Correo Personal </label>
        <input type="text" name="correo_personal" id="correo_personal" class="correo_personal" id="correo_personal" value="${data[0].correo_personal}">

        <label for="correo_sena"> Correo Sena </label>
        <input type="text" name="correo_sena" id="correo_sena" class="correo_sena" id="correo_sena" value="${data[0].correo_sena}">

        <label for="telefono"> Telefono </label>
        <input type="number" name="telefono" id="telefono" class="telefono" id="telefono" value="${data[0].telefono}">

        <label for="select_tipo_genero"> Genero </label>
        <select name="select_tipo_genero" id="select_tipo_genero">
            <option value="${data[0].id_genero}">${data[0].select_genero}</option>
            ${ajax({
                url: "./acciones.php?tabla=genero",
                cbSuccess: ( { data: datos } ) => {
                    const $select = document.getElementById('select_tipo_genero');
                    let $html ;
                    datos.forEach( el => {
                        ( el.id !== data[0].id_genero )
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
        if(e.target.matches('#usuario')){
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
                        url: 'pag_admin/usuarios.php',
                        success: (html) => $main.innerHTML = html,
                        error: (error) => $main.innerHTML = `<h1>${error}</h1>`,
                    });
                },
                data: {
                    tabla: 'usuarios',
                    documentoAntiguo: e.target.documentoantiguo.value,
                    documento: e.target.documento.value,
                    select_tipo_docu: parseInt(e.target.select_tipo_docu.value),
                    Cod_Carnet: e.target.cod_carnet.value,
                    nombres: e.target.nombres.value,
                    apellidos: e.target.apellidos.value,
                    fecha_nacimiento: e.target.fecha_nacimiento.value,
                    correo_personal: e.target.correo_personal.value,
                    correo_sena: e.target.correo_sena.value,
                    telefono: e.target.telefono.value,
                    select_tipo_genero: parseInt(e.target.select_tipo_genero.value),
                }
            });
        }
    });
}