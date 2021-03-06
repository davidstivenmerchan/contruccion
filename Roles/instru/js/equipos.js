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
                            ${buscar.disponibilidad}
                        </td>
                        <td>
                            <button class="editar">
                                Terminar Asignación
                            </button>
                        </td>
                        <td>
                            <button class="veraprendiz">
                                Ver Aprendiz 
                            </button>
                        </td>
                        <td>
                            <button class="vercompu">
                                Ver Detalle
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

    $(document).on('click', '.veraprendiz', function(){
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('eliminarr');
        $.post('js/veraprendizasignado.php', {id}, function(response){

        console.log(response);
        
        let busqueda = JSON.parse(response);
        let template = '';

        if(response.length!==0 && response!=="[]"){
        busqueda.forEach( buscar => {
            template += `
            
            <div class="ver_aprendiz">
            <h3>Datos del Aprendiz</h3>
            <div id="aprendiz">
        

            <p><strong>Documento: </strong>${buscar.documento}</p>
            <p><strong>Nombres: </strong>${buscar.Nombres}</p>
            <p><strong>Apellidos: </strong> ${buscar.Apellidos}</p>
            <p><strong>Telefono: </strong> ${buscar.telefono}</p>
            <p><strong>Correo: </strong> ${buscar.correo_sena}</p>
            </div>
            `
            $('#dispo').html(template);
            $('#dispo').show();
            $('#propiedades').hide();
    });
    }else{
            template += 
            `
            <p>Este equipo no tiene ningun aprendiz asignado</p>
            `
            $('#aprendiz').html(template);
    }
});
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
            obtenerestado();
        
        })
    }
         
    });
    $(document).on('click', '.vercompu', function(){
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('eliminarr');
        $.post('js/vercompu.php', {id}, function(response){

        console.log(response);
        
        let busqueda = JSON.parse(response);
        let template = '';

        if(response.length!==0 && response!=="[]"){
        busqueda.forEach( buscar => {
            template += 
            `
            <div class="ver_aprendiz especificaciones">
            <h3>Datos del Computador</h3>
            <div id="aprendiz">

            <p><strong>Procesador: </strong>${buscar.procesador}</p>
            <p><strong>Ram (GB): </strong>${buscar.ramGB}</p>
            <p><strong>Sistema Operativo: </strong> ${buscar.nom_tipo_sistema}</p>
            <p><strong>Marca: </strong> ${buscar.nom_marca}</p>
          
            </div>
            `
            $('#propiedades').show();
            $('#propiedades').html(template);
            $('#dispo').hide();
           

    });
    }else{
       
            template += 
            `
            <p>Este equipo no tiene ningun aprendiz asignado</p>
            `
            $('#aprendiz').html(template);
    }
});
});
        
    

        
    

   
        
   
    


});