<?php 
require_once("../../../includes/conexion.php");

##recibo las variables 

    $formacion = $_POST['formacion'];
    ##Hago la consulta de insercion
    $con = "INSERT into formacion (id_formacion, nom_formacion) values ('0', '$formacion')";
     $mysql = mysqli_query($mysqli, $con);
     if($mysql){
    echo "lo hiciste";

}
else{
    echo"No lo hiciste";
}






  

?>