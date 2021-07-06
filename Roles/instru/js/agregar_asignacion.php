<?php
 require_once ('../../../includes/conexion.php');

 if(isset($_POST['enviar'])){
     $cedula = $_POST['cedula'];
     $fecha = $_POST['fecha'];
     $hora = $_POST['hora'];
     $docuinstru = $_POST['docuinstru'];

     $conu ="SELECT matricula.aprendiz, fichas.instructor FROM matricula, fichas WHERE fichas.ficha=matricula.ficha AND
     fichas.instructor=$docuinstru and matricula.aprendiz='$cedula'";
     $conueje = mysqli_query($mysqli, $conu);
     $mos = mysqli_fetch_array($conueje);
     if($mos){
        $aprendiz = $mos['aprendiz'];
     }
     
     if($aprendiz==''){
         echo "<script> alert('El aprendiz no se encuentra en su grupo');
                             window.location= '../asignacion_equipos.php?var=$docuinstru';
                         </script>";
     
     }else{

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

     $con = "SELECT aceptacion_usuarios.id_estado_aprobacion 
     from aceptacion_usuarios WHERE aceptacion_usuarios.documento=$cedula";
     $eje=mysqli_query($mysqli,$con);
     $most=mysqli_fetch_array($eje);
     if($most){
         $aceptacion = $most['id_estado_aprobacion'];
     }

     if($aceptacion==2){
        echo "<script> alert('El aprendiz no se encuentra aceptado');
        window.location= '../asignacion_equipos.php?var=$docuinstru';
    </script>";

     }else{

     $consulta3 = "SELECT equipos.id_equipo, dispositivo_electronico.serial,
     dispositivo_electronico.id_estado_disponibilidad,
     dispositivo_electronico.id_estado_dispositivo from equipos, dispositivo_electronico
     WHERE dispositivo_electronico.serial = equipos.serial and 
     dispositivo_electronico.id_estado_disponibilidad = 1 and dispositivo_electronico.id_estado_dispositivo=1";
     $ejecutar3 = mysqli_query($mysqli, $consulta3);
     $mostrar3 = mysqli_fetch_array($ejecutar3);
     if($mostrar3){
        $id_equipo = $mostrar3['id_equipo'];
        $serial = $mostrar3['serial'];
     }else{
        echo "no hay dispositivos disponibles";
     } 

     $consulta4 = "INSERT INTO asignacion_equipos(id_entrada_aprendiz, id_equipo, hora_inicial) 
     values('$id_entrada_aprendiz','$id_equipo', '$hora')";
     $ejecutar4 = mysqli_query($mysqli,$consulta4);

     $consulta5 = "UPDATE dispositivo_electronico SET id_estado_disponibilidad = 2 where serial='$serial'";
     $ejecutar5 = mysqli_query($mysqli, $consulta5);



     
     echo "<script> alert('se agrego exitosamente el equipo');
                             window.location= '../asignacion_equipos.php?var=$docuinstru';
                         </script>";

    }
     

     }

 

     


 }



    
  
?>

<script src="./../../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>