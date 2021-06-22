$(document).ready(function(){
    $('#mensajefinalll').hide();
    prueba34();
    

   /*  $('#formularioinicio').submit(function (e) {
        const agregar_asignacion ={
            mensaje: $('#mensajeinicio').val(),
            id: $('#id_asignacion_inicio').val()
          
        }
        $.post('js_aprendiz/agregarmensaje.php',agregar_asignacion, function(response){
            console.log(response);
            
            $('#bloqueo').hide();
            $('#formularioinicio').trigger('reset');
        });
        e.preventDefault();
    }); */

    /* $('#formularioinicioo').submit(function (e) {
        const agregar_asignacion ={
            mensaje: $('#mensajefinal').val(),
            id: $('#id_asignacion_inicioo').val()
          
        }
        $.post('js_aprendiz/agregarfinal.php',agregar_asignacion, function(response){
            console.log(response);
            
    
            $('#formularioinicioo').trigger('reset');
        });
        e.preventDefault();
    }); */

    function prueba34() {
       
       const prueba = $('#prueba34').val();
       const prueba2 = $('#prueba35').val();
       console.log(prueba);
       console.log(prueba2);

       if(prueba=="" && prueba2=="En Uso"){
        $('#bloqueo2').hide();
       }

       if(prueba!="" && prueba2=="En Uso"){
        $('#bloqueo').hide();
        $('#bloqueo2').show();
       }

       if(prueba!="" && prueba2!="En Uso"){
        $('#bloqueo').show();
        $('#bloqueo2').show();
        $('#mensajefinalll').show();


       }

       
    }




    
    
});





function alerta(){

    document.getElementById('formularioinicio').classList.add('formuu-aparecer');
    document.getElementById('cerrar').classList.add('cerrar-aparecer');
    
}

function cerrar() {

    document.getElementById('formularioinicio').classList.remove('formuu-aparecer');
    document.getElementById('cerrar').classList.remove('cerrar-aparecer');
    
}

function  alerta2() {
    document.getElementById('formularioinicioo').classList.add('formuu-aparecer');
    document.getElementById('cerrarr').classList.add('cerrar2-aparecer');
}

function cerrarr() {
    document.getElementById('formularioinicioo').classList.remove('formuu-aparecer');
    document.getElementById('cerrarr').classList.remove('cerrar2-aparecer');
}

