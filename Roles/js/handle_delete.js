import ajax from "./ajax.js";
import { getHTML } from "./admin.js";

export const handleDelete = ({id, tabla }) =>{
    Swal.fire({
        title: 'estas seguro?',
        text: 'estas seguro de borrar este registro',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si, acepto'
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
                    'cancelado!',
                    'tu archivo no se modifico',
                    'error'
                );
            }
     })
    

}