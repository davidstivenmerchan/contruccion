import { ajax } from "./ajax.js"
import { getHTML } from "./admin.js";

export const editAlmacenamiento = ( id )=> {
    const tabla = 'almacenamiento';
    ajax({
        url:`./acciones.php?id=${id}&tabla=${tabla}`,
        cbSuccess: ( { data } ) => {
            console.log(data);
            const $alert = document.getElementById('alert');
            $alert.classList.add('ver');
            $alert.innerHTML= `
                <form class="formmodal formmodaltipos" id="edit_almacenamiento">
                    <div class="cerrarmodal">X</div>
                    <input type="hidden" name="id_almacena" value="${data[0].idAlmacena}">
                    <label for="nave"> ID </label>
                    <input type="text" name="iddisable" id="nave" placeholder="${data[0].idAlmacena}" disabled>
                
                    <label for="tama_almacena"> Tamaño Almacenamiento </label>
                    <input type="text" name="tama_almacena" id="tama_almacena" class="naves" id="tama_almacena" value="${data[0].tamaAlmacena}">
                    <input type="submit" value="actualizar"/>
                </form>
            `;
            const $formModal = document.querySelector('.formmodal');
            $formModal.classList.remove('desplazar');

            document.addEventListener('submit' , async (e) => {
                document.querySelector('.formmodal').classList.add('desplazar');
                setTimeout( ()=> document.querySelector('.alert').classList.remove('ver'), 1000 );
                e.preventDefault();
                if(e.target.matches('#edit_almacenamiento')){
                    ajax({
                        url: './acciones.php',
                        method: 'PUT',
                        cbSuccess: ( async (data) =>{
                            await setTimeout(() => {
                                Swal.fire({
                                    title: 'Exito',
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
                            tabla,
                            id: e.target.id_almacena.value,
                            tama_almacena: e.target.tama_almacena.value
                        },
                    });
                }
            });
        }
    });
}