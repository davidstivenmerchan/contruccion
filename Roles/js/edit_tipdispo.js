import { getHTML } from "./admin.js";
import { ajax } from "./ajax.js";

export const editTipoDispo = ( id ) =>{
    const tabla = 'tipo_dispositivo';
    fetch(`./acciones.php?id=${id}&tabla=${tabla}`)
     .then( res => res.ok ? res.json() : Promise.reject(res) )
     .then( ({ data }) => {
        const $alert = document.getElementById('alert');
        $alert.classList.add('ver');
        $alert.innerHTML = `
        <form class="formmodal formmodaltipos" id="tipodispositivo" >
        <div class="cerrarmodal">X</div>
        <input type="hidden" name="idtipdispo" value="${data[0].id}">
        <label for="tipodispo"> ID </label>
        <input type="text" name="iddisable" id="tipodispo" placeholder="${data[0].id}" disabled>
    
        <label for="nametip_dispo"> tipo de dispositivo</label>
        <input type="text" name="nametip_dispo" id="nametip_dispo" class="tipo_dispo" id="tipo_dispo" value="${data[0].nameTipo}">
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
        if(e.target.matches('#tipodispositivo')){
            ajax({
                url: './acciones.php',
                method: 'PUT',
                cbSuccess: ( async (data) =>{
                    await setTimeout(() => {
                        Swal.fire({
                            title: 'Cambio Exitoso',
                            text: data.statusText,
                            icon: 'success',
                            confirmButtonText: 'ok'
                        });
                    }, 1200);
                    const $main = document.querySelector('main');
                    
                    getHTML({
                        url: 'pag_admin/otro.php',
                        success: (html) => $main.innerHTML = html,
                        error: (error) => $main.innerHTML = `<h1>${error}</h1>`,
                    });

                }),
                data:{
                    tabla:'tipo_dispositivo',
                    id: e.target.idtipdispo.value,
                    nameTipoDispo: e.target.nametip_dispo.value
                },
            });
        }
    });

}