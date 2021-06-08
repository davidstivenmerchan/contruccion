<?php 
require_once("../../../includes/conexion.php");

##recibo las variables 

    $jornada = $_POST['jornada'];
    ##Hago la consulta de insercion
    $con = "INSERT into jornada (id_jornada, nom_jornada) values ('0', '$jornada')";
     $mysql = mysqli_query($mysqli, $con);
     if($mysql){
    echo "lo hiciste";

}
else{
    echo"No lo hiciste";
}
?>