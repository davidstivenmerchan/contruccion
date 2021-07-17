import { ajax } from "./ajax.js";

const gruposAdmin = (e) => {

    ajax({
        url: 'pag_admin/buscar_grupos.php',
        method: 'POST',
        data: {
            'ficha': e.target.value
        },
        cbSuccess: ( response ) => {
               
            // let busqueda = JSON.parse(response);
            let template = '';
        
            if(response.length!==0 && response!=="[]"){  
                response.forEach( buscar => { 
                    template += `
            
                    <tr>
                        <td>
                            ${buscar.nom_documento}
                        </td>
                        <td>
                            ${buscar.documento}
                        </td>
                        <td>
                            ${buscar.Cod_Carnet}
                        </td>
                        <td>
                            ${buscar.Nombres}
                        </td>
                        <td>
                            ${buscar.Apellidos}
                        </td>
                        <td>
                            ${buscar.correo_sena}
                        </td>
                        <td>
                            ${buscar.telefono}
                        </td>
                    </tr>
    
                    `
                });

                document.querySelector('#mostrar_aprendices2').innerHTML = template;
                // $('#mostrar_aprendices2').html(template);
        //     $('#buscar_asignacion_equipos').show();
                
                
            }else{
            // $('#mensajenegativo').show();
            }
        }
    });
    // $.ajax({
    //     url: 'admi/pag_admin/buscar_grupos.php',
    //     type: 'POST',
    //     data: "ficha=" +$('#ficha').val(),
    //     success: function(response){
            
    //         let busqueda = JSON.parse(response);
    //         let template = '';
        
    //         if(response.length!==0 && response!=="[]"){  
    //         busqueda.forEach( buscar => { 
    //             template += `
           
    //             <tr>
    //                 <td>
    //                     ${buscar.nom_documento}
    //                 </td>
    //                 <td>
    //                     ${buscar.documento}
    //                 </td>
    //                 <td>
    //                     ${buscar.Cod_Carnet}
    //                 </td>
    //                 <td>
    //                     ${buscar.Nombres}
    //                 </td>
    //                 <td>
    //                     ${buscar.Apellidos}
    //                 </td>
    //                 <td>
    //                     ${buscar.correo_sena}
    //                 </td>
    //                 <td>
    //                     ${buscar.telefono}
    //                 </td>
    //             </tr>
 
    //             `
    //         });

    //         $('#mostrar_aprendices2').html(template);
    //    //     $('#buscar_asignacion_equipos').show();
            
            
    //     }else{
    //        // $('#mensajenegativo').show();
    //     }
    // }
    // })
}

export default gruposAdmin;