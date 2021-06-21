<?php


 require_once ('../../../includes/conexion.php');


 $consulta1="SELECT dispositivo_electronico.serial, dispositivo_electronico.placa_sena, tipo_dispositivo.nom_tipo_dispositivo, 
 dispositivo_electronico.nom_dispositivo, marca.nom_marca, estado_dispositivo.nom_estado_dispositivo
 FROM dispositivo_electronico, tipo_dispositivo,marca,estado_dispositivo
 WHERE tipo_dispositivo.id_tipo_dispositivo=dispositivo_electronico.id_tipo_dispositivo 
 AND estado_dispositivo.id_estado_dispositivo=dispositivo_electronico.id_estado_dispositivo
 AND marca.id_marca=dispositivo_electronico.id_marca";
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
        'dispositivo' => $row['nom_dispositivo'],
        'marca' => $row['nom_marca'],
        'estado' => $row['nom_estado_dispositivo']
    );
}
$jsonstring = json_encode($json);
echo $jsonstring;


?>