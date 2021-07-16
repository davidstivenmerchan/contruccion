<?php

require_once ('../../../includes/conexion.php');


$buscar = $_POST['ficha'];

if(!empty($buscar)){
    $query = "SELECT tipo_documento.nom_documento, usuarios.documento, usuarios.Cod_Carnet, usuarios.Nombres, usuarios.Apellidos, usuarios.correo_sena, usuarios.telefono
    FROM tipo_documento, usuarios, matricula
    WHERE tipo_documento.id_tipo_documento=usuarios.id_tipo_documento
    and usuarios.documento=matricula.aprendiz and matricula.ficha=$buscar";
    $resul = mysqli_query($mysqli,$query);
    if(!$resul){
        die('query error'. mysqli_error($mysqli));
    }else{ 
        $json = array();
        while($row = mysqli_fetch_array($resul)){
            $json[] = array(
                'nom_documento' => $row['nom_documento'],
                'documento' => $row['documento'],
                'Cod_Carnet' => $row['Cod_Carnet'],
                'Nombres' => $row['Nombres'],
                'Apellidos' => $row['Apellidos'],
                'correo_sena' => $row['correo_sena'],
                'telefono' => $row['telefono']
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
   
}


?>