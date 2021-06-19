
$(document).ready(function(){

    console.log('trabajando bien');
    obtenerasiganciones();

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
                            ${buscar.descripcion_inicial}
                        </td>
                        <td>
                            ${buscar.hora_inicial}
                        </td>
                        <td>
                            ${buscar.descripcion_final}
                        </td>
                        <td>
                            ${buscar.hora_final}
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

    $('#insertar_asignacion').submit(function (e) {
        const agregar_asignacion ={
            cedula: $('#ce').val(),
            fecha: $('#fecha').val(),
            hora: $('#hora').val()
        }
        $.post('js/agregar_asignacion.php',agregar_asignacion, function(response){
            console.log(response);
            obtenerasiganciones();

            $('#insertar_asignacion').trigger('reset');
        });
        e.preventDefault();
    });


    function obtenerasiganciones(){
        $.ajax({
            url: 'js/mostrar_asignacion.php',
            type: 'GET',
            success: function(response){
                let busqueda = JSON.parse(response);
                let template = '';
    
                busqueda.forEach( buscar => {
                    template += `
                    <tr eliminarr="${buscar.documento}">
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
                            ${buscar.descripcion_inicial}
                        </td>
                        <td>
                            ${buscar.hora_inicial}
                        </td>
                        <td>
                            ${buscar.descripcion_final}
                        </td>
                        <td>
                            ${buscar.hora_final}
                        </td>
                        <td>
                            <button class="eliminar">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                    `
                });
                
                $('#tabla_asignacion_equipos_toda').html(template);
            
            }
        });
    }

    $(document).on('click', '.eliminar', function(){
        if(confirm('estas seguro de querer eliminar esta asignacion?')){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('eliminarr');
            $.post('js/borrar_asignacion.php', {id}, function(response){
            console.log(response);
            obtenerasiganciones();

        })
        }
    });
        
   
    

});