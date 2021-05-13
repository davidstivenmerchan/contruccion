<?php

include('../../includes/conexion.php');



$consulta1 = "SELECT id_matricula,fecha_matricula,num_ficha,nom_formacion,ambiente.id_ambiente,nave.nom_nave,
jornada.nom_jornada,tipo_usuario.nom_tipo_usuario,matricula.documento,nom_documento,Nombres,Apellidos,nom_aprobacion
FROM matricula,detalle_formacion,formacion,usuarios,tipo_documento,nave,ambiente,jornada,tipo_usuario,aceptacion_usuarios,estado_aprobacion
WHERE matricula.documento = usuarios.documento 
AND matricula.id_detalle_formacion = detalle_formacion.id_detalle_formacion 
AND detalle_formacion.id_formacion = formacion.id_formacion 
AND ambiente.id_nave = nave.id_nave 
AND detalle_formacion.id_ambiente = ambiente.id_ambiente
AND matricula.id_jornada = jornada.id_jornada
AND usuarios.id_tipo_documento = tipo_documento.id_tipo_documento
AND usuarios.id_tipo_usuario = tipo_usuario.id_tipo_usuario
AND aceptacion_usuarios.documento = usuarios.documento
AND aceptacion_usuarios.id_estado_aprobacion= estado_aprobacion.id_estado_aprobacion
AND tipo_usuario.id_tipo_usuario =  2
AND estado_aprobacion.id_estado_aprobacion = 2";
$ejecu = mysqli_query($mysqli,$consulta1);


while($i = mysqli_fetch_array($ejecu)){

    

    if(isset($_POST['enviar'])){

        $doc= $_POST[$i['documento']];

        if(isset($_POST[$i['id_matricula']])){
            
             $consula2 = "UPDATE aceptacion_usuarios SET id_estado_aprobacion= 1 WHERE documento = $doc";
             $ejecu2= mysqli_query($mysqli,$consula2);
             if($ejecu2){
                echo "<script> alert('aprendices aceptados');
                window.location= 'aceptacion.php';
                </script>";
             }else{
                echo "<script> alert('aprendices no se pudieron aceptar');
                window.location= 'aceptacion.php';
                </script>";
             }
            }

        
    }
}
?>