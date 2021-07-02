$("#estado").hide();

function parte1() {
    $("#estado").hide();
    $('#disponibilidad').show();
}
function parte2() {
    $("#estado").show();
    $('#disponibilidad').hide();
}


 
$(document).ready(function(){

    obtenerdisponibilidad();
    obtenerestado();
    estadodispositivo

    function obtenerdisponibilidad(){
        $.ajax({
            url: 'js/disponibilidadequipos.php',
            type: 'GET',
            success: function(response){
                let busqueda = JSON.parse(response);
                let template = '';
    
                busqueda.forEach( buscar => {
                    template += `
                    <tr eliminarr="${buscar.serial}">
                        <td>
                            ${buscar.serial}
                        </td>
                        <td>
                            ${buscar.placa}
                        </td>
                        <td>
                            ${buscar.tipo}
                        </td>
                        <td>
                            ${buscar.dispositivo}
                        </td>
                        <td>
                            ${buscar.marca}
                        </td>
                        <td>
                            ${buscar.disponibilidad}
                        </td>
                        <td>
                        <button class="editar">
                                Cambiar de Estado
                        </button>
                        </td>
                    </tr>
                    `
                });
                
                $('#tabladisponiblidad').html(template);
            
            }
        });
    }

    $(document).on('click', '.editar', function(){
        if(confirm('Esta Seguro de Querer Cambiar el Estado de Disponibilidad de este Equipo?')){ 
            
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('eliminarr');
            $.post('js/cambiardisponibilidad.php', {id}, function(response){
            console.log(response);
            obtenerdisponibilidad();
            

        })
    }
        
    });
        
    function obtenerestado() {
        $.ajax({
            url: 'js/estadoequipos.php',
            type: 'GET',
            success: function(response){
                let busqueda = JSON.parse(response);
                let template = '';
    
                busqueda.forEach( buscar => {
                    template += `
                    <tr eliminarr="${buscar.serial}">
                        <td>
                            ${buscar.serial}
                        </td>
                        <td>
                            ${buscar.placa}
                        </td>
                        <td>
                            ${buscar.tipo}
                        </td>
                        <td>
                            ${buscar.dispositivo}
                        </td>
                        <td>
                            ${buscar.marca}
                        </td>
                        <td>
                            ${buscar.estado}
                        </td>
                        <td>
                        <button class="editarr">
                                Cambiar de Estado
                        </button>
                        </td>
                    </tr>
                    `
                });
                
                $('#estadodispositivo').html(template);
            
            }
        });

        
    }
    $(document).on('click', '.editarr', function(){
        if(confirm('Esta Seguro de Querer Cambiar el Estado de este Equipo?')){ 
            
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('eliminarr');
            $.post('js/cambiarestado.php', {id}, function(response){
            console.log(response);
            obtenerestado()
            

        })
    }
});
   

   
        
   
    


});