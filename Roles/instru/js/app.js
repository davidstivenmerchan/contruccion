
$(document).ready(function(){

    console.log('trabajando bien');

    $('#buscar_asignacion_equipos').hide();
 
    $('#buscar_con_cedula').keyup(function(e){
        if($('#buscar_con_cedula').val()){
        let buscar_con_cedula = $('#buscar_con_cedula').val();
        $.ajax({
            url: 'js/buscar_asignacion.php',
            type: 'POST',
            data: { buscar_con_cedula },
            success: function(response){
                let busqueda = JSON.parse(response);
                let template = '';

                busqueda.forEach( buscar => {
                    template += `
                    <tr>
                        <td>
                            ${buscar.documento}
                        </td>
                        <td>
                            ${buscar.serial}
                        </td>
                        <td>
                            ${buscar.fecha}
                        </td>
                        <td>
                            ${buscar.hora_inicial}
                        </td>
                        <td>
                            ${buscar.descripcion_inicial}
                        </td>
                        <td>
                            ${buscar.hora_final}
                        </td>
                        <td>
                            ${buscar.descripcion_final}
                        </td>
                    </tr>
                    `
                });

                $('#tabla_asignacion_equipos').html(template);
                $('#buscar_asignacion_equipos').show();
                
            }
        })
    }
    });

});