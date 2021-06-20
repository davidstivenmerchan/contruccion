$(document).ready(function(){

    $('#formularioinicio').submit(function (e) {
        const agregar_asignacion ={
            mensaje: $('#mensajeinicio').val(),
            id: $('#id_asignacion_inicio').val()
          
        }
        $.post('js_aprendiz/agregarmensaje.php',agregar_asignacion, function(response){
            console.log(response);
            
    
            $('#formularioinicio').trigger('reset');
        });
        e.preventDefault();
    });


    
    
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

