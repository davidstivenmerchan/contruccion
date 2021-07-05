<?php

    require_once ('../../../includes/conexion.php');

    $serial = $_POST['id'];

    

    $consulta1= "SELECT dispositivo_electronico.id_estado_dispositivo
    from dispositivo_electronico where serial='$serial'";
    $ejecucion1 = mysqli_query($mysqli , $consulta1);
    $mostrar1 = mysqli_fetch_array($ejecucion1);
    if($mostrar1){
        $estado = $mostrar1['id_estado_dispositivo'];
    }

    if($estado==1){
        $consulta2 = "UPDATE dispositivo_electronico SET id_estado_dispositivo=2 where serial='$serial'";
        $ejecucion2 =mysqli_query($mysqli, $consulta2);
    }
    
    if($estado==2){

        $consulta3 = "UPDATE dispositivo_electronico SET id_estado_dispositivo=1 where serial='$serial' ";
        $ejecucion3 =mysqli_query($mysqli, $consulta3);

        

    }

    if(!$ejecucion1 and !$ejecucion2 and !$ejecucion3){
        die('no sirvio error');
    }else{
        echo 'todo good estado';
    }
    

   





?>