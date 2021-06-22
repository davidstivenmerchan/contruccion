// import Swal from "sweetalert2";
import { ajax } from "./ajax.js";
import { getHTML } from "./admin.js";


const handleAdd = ( e, url, data, paginaCargar ) => {
    e.preventDefault();
    Swal.fire({
        title: 'Estas Seguro?',
        text: 'Estas seguro de agregar este registro',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, acepto'
    })
      .then( result => {
        if( result.isConfirmed ){
            debugger;
            ajax({
                url,
                method: 'POST',
                cbSuccess: ( data ) => {
                    Swal.fire(
                        'Insertado',
                        data.statusText,
                        'success',
                    );

                    const $main = document.querySelector('main');
                    getHTML({
                        url: paginaCargar,
                        success: ( html ) => $main.innerHTML = html,
                        error: ( error ) => $main.innerHTML = `<h1>${error}</h1>`,
                    });
                },
                data,
            }); 
        }else{
            Swal.fire(
                'Cancelado!',
                'Tu Registro no se agrego',
                'error'
            );
        }
      });
}

export default handleAdd;