<?php
 require_once ('../../../includes/conexion.php');

 if(isset($_POST['cedula'])){
     $cedula = $_POST['cedula'];
     $fecha = $_POST['fecha'];
     $hora = $_POST['hora'];


     $consulta = "INSERT INTO entrada_aprendiz(fecha, hora, documento) values('$fecha', '$hora', '$cedula')";
     $ejecutar = mysqli_query($mysqli, $consulta);

     if(!$ejecutar){
         die('Query Failed.');
     }
     echo 'se agrego exitosamente';
 }


?>