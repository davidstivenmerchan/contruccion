<?php
   require_once ('../../../includes/conexion.php');

   $serial = $_POST['id'];
   $horaHoy = date("H:i:s"); 

   $consulta1= "SELECT dispositivo_electronico.id_estado_disponibilidad 
   from dispositivo_electronico where serial='$serial'";
   $ejecucion1 = mysqli_query($mysqli , $consulta1);
   $mostrar1 = mysqli_fetch_array($ejecucion1);
   if($mostrar1){
       $disponibilidad = $mostrar1['id_estado_disponibilidad'];
   }

   if($disponibilidad==1){
       $consulta2 = "UPDATE dispositivo_electronico SET id_estado_disponibilidad=2 where serial='$serial'";
       $ejecucion2 =mysqli_query($mysqli, $consulta2);
   }
   
   if($disponibilidad==2){

        $consulta4="SELECT dispositivo_electronico.serial from dispositivo_electronico where dispositivo_electronico.serial='$serial'";
        $ejecucion4=mysqli_query($mysqli, $consulta4);
        $mostrar4=mysqli_fetch_array($ejecucion4);
        if($mostrar4){
            $id_equipo = $mostrar4['serial'];
            $mensaje = "finalizado por el instructor";
        }
        $consulta5="UPDATE asignacion_equipos SET asignacion_equipos.descripcion_final='$mensaje', hora_final='$horaHoy' where asignacion_equipos.serial='$id_equipo'";
        $ejecucion5 = mysqli_query($mysqli, $consulta5);

        $consulta3 = "UPDATE dispositivo_electronico SET id_estado_disponibilidad=1 where serial='$serial' ";
        $ejecucion3 =mysqli_query($mysqli, $consulta3);

    }

   if(!$ejecucion1 and !$ejecucion2 and !$ejecucion3){
       die('no sirvio error');
   }else{
       echo 'todo good';
   }

?>