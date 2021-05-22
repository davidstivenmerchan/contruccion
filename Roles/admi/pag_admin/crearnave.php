<?php 
require_once("../../../includes/conexion.php");

##recibo las variables 

    $num_nave = $_POST['numero'];
    ##Hago la consulta de insercion
    $con = "INSERT into nave (id_nave, nom_nave) values ('0', '$num_nave')";
     $mysql = mysqli_query($mysqli, $con);
     if($mysql){
    echo "lo hiciste";

}
else{
    echo"No lo hiciste";
}
?>