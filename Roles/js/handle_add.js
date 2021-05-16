// import Swal from "sweetalert2";
import { ajax } from "./ajax.js";
import { getHTML } from "./admin.js";


const handleAdd = ( e, url, data ) => {
    e.preventDefault();
    Swal.fire({
        title: 'estas seguro?',
        text: 'estas seguro de agregar este registro',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si, acepto'
    })
      .then( result => {
        if( result.isConfirmed ){
            ajax({
                url,
                method: 'POST',
                cbSuccess: ( data ) => {
                    Swal.fire(
                        'insertado',
                        data.statusText,
                        'success',
                    );

                    const $main = document.querySelector('main');
                    getHTML({
                        url: 'pag_admin/equipos.php',
                        success: ( html ) => $main.innerHTML = html,
                        error: ( error ) => $main.innerHTML = `<h1>${error}</h1>`,
                    });
                },
                data,
            }); 
        }else{
            Swal.fire(
                'cancelado!',
                'tu archivo no se agrego',
                'error'
            );
        }
      });
}

export default handleAdd;