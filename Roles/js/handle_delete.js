import { ajax } from "./ajax.js";
import { getHTML } from "./admin.js";

export const handleDelete = ({id, tabla }) =>{
    Swal.fire({
        title: 'Estas seguro?',
        text: 'Estas seguro de borrar este registro',
        icon: 'Warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Acepto'
    })
     .then( result => {
            if( result.isConfirmed){
                ajax({
                    url:'./acciones.php',
                    method: 'DELETE',
                    cbSuccess:( data ) =>{
                        Swal.fire(
                            'Eliminado',
                            data.statusText,
                            'success',
                        );
                        const $main = document.querySelector('main');
                        getHTML({
                            url: 'pag_admin/equipos.php',
                            success: (html) => $main.innerHTML = html,
                            error: (error) => $main.innerHTML = `<h1> ${error} </h1>`,
                        });
                    },
                    data: {
                        tabla,
                        id
                    }
                });
            }else{
                Swal.fire(
                    'Cancelado!',
                    'Tu Registro no se elimino',
                    'error'
                );
            }
     })
    

}