<?php
 require_once ('../../../includes/conexion.php');

 if(isset($_POST['cedula'])){
     $cedula = $_POST['cedula'];
     $fecha = $_POST['fecha'];
     $hora = $_POST['hora'];


     $consulta = "INSERT INTO entrada_aprendiz(fecha, hora, documento) values('$fecha', '$hora', '$cedula')";
     $ejecutar = mysqli_query($mysqli, $consulta);

     $consulta2 = "SELECT MAX(entrada_aprendiz.id_entrada_aprendiz) from entrada_aprendiz";
     $ejecutar2 = mysqli_query($mysqli, $consulta2);
     $mostrar = mysqli_fetch_array($ejecutar2);

     if($mostrar){
         $id_entrada_aprendiz = $mostrar['MAX(entrada_aprendiz.id_entrada_aprendiz)'];
     }else{
         echo "fallo la consulta dos";
     }

     $consulta3 = "SELECT equipos.id_equipo, dispositivo_electronico.serial,
     dispositivo_electronico.id_estado_disponibilidad,
     dispositivo_electronico.id_estado_dispositivo from equipos, dispositivo_electronico
     WHERE dispositivo_electronico.serial = equipos.serial and 
     dispositivo_electronico.id_estado_disponibilidad = 1 and dispositivo_electronico.id_estado_dispositivo=1";
     $ejecutar3 = mysqli_query($mysqli, $consulta3);
     $mostrar3 = mysqli_fetch_array($ejecutar3);
     if($mostrar3){
        $id_equipo = $mostrar3['id_equipo'];
     }else{
        echo "no hay dispositivos disponibles";
     }

     $consulta4 = "INSERT INTO asignacion_equipos(id_entrada_aprendiz, id_equipo, hora_inicial) 
     values('$id_entrada_aprendiz','$id_equipo', '$hora')";
     $ejecutar4 = mysqli_query($mysqli,$consulta4);

     if(!$ejecutar and !$ejecutar2 and !$ejecutar3 and !$ejecutar4){
         die('Query Failed.');
     }
     echo 'se agrego exitosamente';
     


 }


?>