import ajax from "./ajax.js";

import { getHTML } from "./admin.js";

export const editMarca = ( id ) =>{
    const tabla = 'marca';
    fetch(`./acciones.php?id=${id}&tabla=${tabla}`)
     .then( res => res.ok ? res.json() : Promise.reject(res) )
     .then( ({ data }) => {
        const $alert = document.getElementById('alert');
        $alert.classList.add('ver');
        $alert.innerHTML = `
        <form class="formmodal"id="marcas" >
        <div class="cerrarmodal">X</div>
        <input type="hidden" name="idmarca" value="${data[0].id}">
        <label for="marca"> ID </label>
        <input type="text" name="iddisable" id="marca" placeholder="${data[0].id}" disabled>
    
        <label for="namemarca"> tipo de dispositivo</label>
        <input type="text" name="namemarca" id="namemarca" class="marcass" id="marcass" value="${data[0].nameTipo}">
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
        if(e.target.matches('#marcas')){
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
                    tabla:'marca',
                    id: e.target.idmarca.value,
                    marca: e.target.namemarca.value
                },
            });
        }
    });


}