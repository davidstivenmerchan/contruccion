import { getHTML } from "./admin.js";
import { ajax } from "./ajax.js";


const addDispoAmbiente = (e, url, urlSuccess, data ) => {
    Swal.fire({
        title: 'Estas Seguro?',
        text: 'Estas seguro de agregar este registro',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, acepto'
    })
      .then( result =>{
        if(result.isConfirmed){
            ajax({
                url: `acciones.php?tabla=ambiente&id=${data.IdAmbiente}`,
                method: 'GET',
                cbSuccess: ( { data:dataDispo } ) => {
                    if(dataDispo.length === 0){
                        Swal.fire({
                            title: 'Error',
                            text: 'No se puede asociar a un dispositivo que no existe',
                            icon: 'error',
                            confirmButtonText: 'ok',
                        });
        
                        return;
                    }
        
                    ajax({
                        url: `acciones.php?tabla=compu_peris&id=${data.IdCompuPeris}`,
                        method: 'GET',
                        cbSuccess: ( { data:dataCompuPeriferico } ) => {
                            if(dataCompuPeriferico.length === 0){
                                Swal.fire({
                                    title: 'Error',
                                    text: 'No se puede asociar a un Dispositivo que no existe',
                                    icon: 'error',
                                    confirmButtonText: 'ok',
                                });
                
                                return;
                            } 
        
                            ajax({
                                url,
                                method: 'POST',
                                cbSuccess: ( res ) => {
        
                                    const $main = document.querySelector('main');
                                    getHTML({
                                        url: 'pag_admin/otro.php',
                                        success: ( html ) => $main.innerHTML = html,
                                        error: (error) => $main.innerHTML = `<h2> ${ error.status } -- ${error.statusText} </h2>`
                                    });
        
                                    Swal.fire({
                                        title: 'exito!',
                                        text: res.statusText,
                                        icon: 'success',
                                        confirmButtonText: 'ok',
                                    });
                                }, 
                                data
                            });
                        }
                    });
                }
            });
        }else{
            Swal.fire(
                'Cancelado!',
                'Tu Registro no se agrego',
                'error'
            );
        }
      })
    
}

export default addDispoAmbiente;