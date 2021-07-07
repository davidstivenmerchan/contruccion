<?php
 require_once ('../../../includes/conexion.php');


 $consulta1="SELECT dispositivo_electronico.serial, dispositivo_electronico.placa_sena, tipo_dispositivo.nom_tipo_dispositivo,
 estado_disponibilidad.nom_estado_disponibilidad from dispositivo_electronico, tipo_dispositivo, estado_disponibilidad where tipo_dispositivo.id_tipo_dispositivo=dispositivo_electronico.id_tipo_dispositivo AND
 estado_disponibilidad.id_estado_disponibilidad=dispositivo_electronico.id_estado_disponibilidad";
 $ejecucion1= mysqli_query($mysqli, $consulta1);

 if(!$ejecucion1){
    die ('error');
}
$json = array();
while($row = mysqli_fetch_array($ejecucion1)){
    $json[] = array(
        'serial' => $row['serial'],
        'placa' => $row['placa_sena'],
        'tipo' => $row['nom_tipo_dispositivo'],
        'disponibilidad' => $row['nom_estado_disponibilidad']
    );
}
$jsonstring = json_encode($json);
echo $jsonstring;




?>