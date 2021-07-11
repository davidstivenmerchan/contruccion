
$(document).ready(function(){

    recargarlista();

    $('#ficha').change(function(){

    recargarlista();

    });



    
   

 //   $('#mostrar_aprendices').hide();

 
//       if($('#ficha').val()){
 //      let ficha = $('#ficha').val();
 function recargarlista(){
        $.ajax({
            url: 'js/proceso_buscar_grupos.php',
            type: 'POST',
            data: "ficha=" +$('#ficha').val(),
            success: function(response){
                
                let busqueda = JSON.parse(response);
                let template = '';
            
                if(response.length!==0 && response!=="[]"){  
                busqueda.forEach( buscar => { 
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

                $('#mostrar_aprendices2').html(template);
           //     $('#buscar_asignacion_equipos').show();
                
                
            }else{
               // $('#mensajenegativo').show();
            }
        }
        })
//    }else{
    //    $('#mensajenegativo').hide();
    //    $('#buscar_asignacion_equipos').hide();
//    }
    
    }
    
});