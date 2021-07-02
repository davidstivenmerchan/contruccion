<?php
require_once './../../includes/conexion.php';

$cedula_instru = $_POST['cedula_instru'];



$consul1 = "SELECT aceptacion_usuarios.id_aceptacion, usuarios.documento, usuarios.Nombres, usuarios.Apellidos, fichas.ficha, formacion.nom_formacion, jornada.nom_jornada, nave.nom_nave, ambiente.n_ambiente, matricula.fecha_matricula, aceptacion_usuarios.id_estado_aprobacion
FROM usuarios, fichas, formacion, jornada, nave, ambiente, matricula, aceptacion_usuarios
WHERE usuarios.documento=matricula.aprendiz
AND fichas.ficha=matricula.ficha
AND formacion.id_formacion=fichas.id_formacion
AND jornada.id_jornada=fichas.id_jornada
AND nave.id_nave=ambiente.id_nave
AND ambiente.id_ambiente=fichas.id_ambiente
AND usuarios.documento=aceptacion_usuarios.documento
AND fichas.instructor=$cedula_instru
AND aceptacion_usuarios.id_estado_aprobacion=2";

$ejecu1 = mysqli_query($mysqli, $consul1);


while($i = mysqli_fetch_array($ejecu1)){

    if(isset($_POST['enviar'])){

        $doc= $_POST[$i['documento']];

        if(isset($_POST[$i['id_aceptacion']])){
            
             $consula2 = "UPDATE aceptacion_usuarios SET id_estado_aprobacion= 1 WHERE documento = $doc";
             $ejecu2= mysqli_query($mysqli,$consula2);
             if($ejecu2){
                echo "<script> alert('aprendices aceptados');
                window.location= 'aceptarinstru.php?var=$cedula_instru';
                </script>";
             }else{
                echo "<script> alert('aprendices no se pudieron aceptar');
                window.location= 'aceptarinstru.php?var=$cedula_instru';
                </script>";
         }
      }

        
   }
}
?>