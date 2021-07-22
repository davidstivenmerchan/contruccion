import { ajax } from "./ajax.js";
import { getHTML } from "./admin.js";

export const editDetalleformacion = ( id ) =>{
    const tabla = 'detalle_formacion';
    fetch(`./acciones.php?id=${id}&tabla=${tabla}`)
     .then( res => res.ok ? res.json() : Promise.reject(res) )
     .then(({ data }) => {
         console.log(data)
        const $alert = document.getElementById('alert');
        $alert.classList.add('ver');
        $alert.innerHTML = `
        
        <form class="formmodal formmodaldispo"id="detalle_formacion" >
        <div class="cerrarmodal dispocerrar">X</div>
        <input type="hidden" name="id_detalle_formacion" value="${data[0].id_detalle_formacion}">
        <label for="id_deta_formacion"> Id Detalle Formacion </label>
        <input type="text" name="idserial" id="id_deta_formacion" disabled value="${data[0].id_detalle_formacion}">

        
        <label for="formacion"> Formacion </label>
        <select name="formacion" id="formacion">
            <option value="${data[0].id_formacion}">${data[0].nom_formacion}</option>
            ${ajax({
                url: "./acciones.php?tabla=formacion",
                cbSuccess: ( { data: datos } ) => {
                    const $select = document.getElementById('formacion');
                    let $html ;
                    datos.forEach( el => {
                        ( el.id !== data[0].id_formacion)
                         ? $html += `<option value="${el.id}"> ${el.nameTipo} </option>`
                         : null;
                    });
                    $select.innerHTML += $html;
                }
            })}
        </select> 

        <label for="numero_ficha"> Numero de Ficha  </label>
        <input type="text" name="numero_ficha" id="numero_ficha" class="numero_ficha" value="${data[0].num_ficha}">

        <label for="select_ambiente"> Ambiente  </label>
        <select name="select_ambiente" id="select_ambiente" >
            <option value="${data[0].id_ambiente}"> ${data[0].nom_ambiente} </option>
            ${ajax({
                url: "./acciones.php?tabla=ambiente",
                cbSuccess: ( { data: datos } ) => {
                    const $select = document.getElementById('select_ambiente');
                    console.log(datos)
                    let $html ;
                    datos.forEach( el => {
                        ( el.id !== data[0].id_ambiente)
                          ? $html += `<option value="${el.id}"> ${el.nameAmbiente} </option>`
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
                        url: 'pag_admin/ambientes.php',
                        success: (html) => $main.innerHTML = html,
                        error: (error) => $main.innerHTML = `<h1>${error}</h1>`,
                    });
                },
                data: {
                    tabla: 'detalle_formacion',
                    id_detalle_formacion : e.target.id_detalle_formacion.value,
                    formacion : e.target.formacion.value,
                    numero_ficha: e.target.numero_ficha.value,
                    select_ambiente: parseInt(e.target.select_ambiente.value),
                }
            });
        }
    });
}