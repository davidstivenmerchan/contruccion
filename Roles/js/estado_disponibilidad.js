import { ajax } from "./ajax.js";
import { getHTML } from "./admin.js";

export const editEstadodisponibilidad = ( id ) =>{
    const tabla = 'estado_disponibilidad';
    fetch(`./acciones.php?id=${id}&tabla=${tabla}`)
     .then( res => res.ok ? res.json() : Promise.reject(res) )
     .then( ({ data }) => {
        const $alert = document.getElementById('alert');
        $alert.classList.add('ver');
        $alert.innerHTML = `
        <form class="formmodal"id="estado_disponibilidad" >
        <div class="cerrarmodal">X</div>
        <input type="hidden" name="idestado_disponibilidad" value="${data[0].id}">
        <label for="esta_disponibilidad"> ID </label>
        <input type="text" name="iddisable" id="esta_disponibilidad" placeholder="${data[0].id}" disabled>
    
        <label for="nameesta_disponibilidad"> tipo de disponibilidadsitivo</label>
        <input type="text" name="nameesta_disponibilidad" id="nameesta_disponibilidad" class="estado_disponibilidads" id="estado_disponibilidads" value="${data[0].nameTipo}">
        <input type="submit" value="actualizar"/>
        </form>
        `;
        const $formModal = document.querySelector('.formmodal');
        $formModal.classList.remove('desplazar');
    })
    .catch( err => console.error(err) );

    document.addEventListener('submit' , async (e) => {
        document.querySelector('.formmodal').classList.add('desplazar');
        setTimeout( ()=> document.querySelector('.alert').classList.remove('ver'), 1000 );
        e.preventDefault();
        if(e.target.matches('#estado_disponibilidad')){
            ajax({
                url: './acciones.php',
                method: 'PUT',
                cbSuccess: ( async (data) =>{
                    await setTimeout(() => {
                        Swal.fire({
                            title: 'exito',
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

                }),
                data:{
                    tabla:'estado_disponibilidad',
                    id: e.target.idestado_disponibilidad.value,
                    nameEstadoDisponibilidad: e.target.nameesta_disponibilidad.value
                },
            });
        }
    });
}