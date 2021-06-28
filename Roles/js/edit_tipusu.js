import { ajax } from "./ajax.js"
import { getHTML } from "./admin.js";

export const editTipUsu = ( id ) => {
    const tabla = 'tipo_usuario';
    ajax({
        url:`./acciones.php?id=${id}&tabla=${tabla}`,
        cbSuccess: ( { data } ) => {
            const $alert = document.getElementById('alert');
            $alert.classList.add('ver');
            $alert.innerHTML= `
                <form class="formmodal formmodaltipos" id="tip_usua">
                    <div class="cerrarmodal">X</div>
                    <input type="hidden" name="idtipusua" value="${data[0].id}">
                    <label for="marca"> ID </label>
                    <input type="text" name="iddisable" id="marca" placeholder="${data[0].id}" disabled>
                
                    <label for="namemarca"> tipo de dispositivo</label>
                    <input type="text" name="tipusua" id="tipdocu" class="marcass" id="marcass" value="${data[0].nameTipo}">
                    <input type="submit" value="actualizar"/>
                </form>
            `;
            const $formModal = document.querySelector('.formmodal');
            $formModal.classList.remove('desplazar');

            document.addEventListener('submit' , async (e) => {
                document.querySelector('.formmodal').classList.add('desplazar');
                setTimeout( ()=> document.querySelector('.alert').classList.remove('ver'), 1000 );
                e.preventDefault();
                if(e.target.matches('#tip_usua')){
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
                            
                            await getHTML({
                                url: 'pag_admin/usuarios.php',
                                success: (html) => $main.innerHTML = html,
                                error: (error) => $main.innerHTML = `<h1>${error}</h1>`,
                            });
        
                        }),
                        data:{
                            tabla,
                            id: e.target.idtipusua.value,
                            tipUsua: e.target.tipusua.value
                        },
                    });
                }
            });
        }
    });
}