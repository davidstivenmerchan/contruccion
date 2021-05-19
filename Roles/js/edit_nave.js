import { ajax } from "./ajax.js"
import { getHTML } from "./admin.js";

export const editNave = ( id )=> {
    const tabla = 'nave';
    ajax({
        url:`./acciones.php?id=${id}&tabla=${tabla}`,
        cbSuccess: ( { data } ) => {
            const $alert = document.getElementById('alert');
            $alert.classList.add('ver');
            $alert.innerHTML= `
                <form class="formmodal" id="edit_nave">
                    <div class="cerrarmodal">X</div>
                    <input type="hidden" name="id_nave" value="${data[0].id}">
                    <label for="nave"> ID </label>
                    <input type="text" name="iddisable" id="nave" placeholder="${data[0].id}" disabled>
                
                    <label for="nom_nave"> Nombre Nave </label>
                    <input type="text" name="nom_nave" id="nom_nave" class="naves" id="nom_nave" value="${data[0].nameTipo}">
                    <input type="submit" value="actualizar"/>
                </form>
            `;
            const $formModal = document.querySelector('.formmodal');
            $formModal.classList.remove('desplazar');

            document.addEventListener('submit' , async (e) => {
                document.querySelector('.formmodal').classList.add('desplazar');
                setTimeout( ()=> document.querySelector('.alert').classList.remove('ver'), 1000 );
                e.preventDefault();
                if(e.target.matches('#edit_nave')){
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
                                url: 'pag_admin/ambientes.php',
                                success: (html) => $main.innerHTML = html,
                                error: (error) => $main.innerHTML = `<h1>${error}</h1>`,
                            });
        
                        }),
                        data:{
                            tabla,
                            id: e.target.id_nave.value,
                            nom_nave: e.target.nom_nave.value
                        },
                    });
                }
            });
        }
    });
}