<?php 
require_once("../../../includes/conexion.php");

##recibo las variables 
    ##recibo que programa es 
    $programa = $_POST['programa'];
    $ficha = $_POST['numficha'];
    $nave = $_POST['nave'];
    ##Hago la consulta de insercion
    $con = "INSERT into detalle_formacion (id_detalle_formacion, id_formacion, num_ficha, id_ambiente) values ('0', '$formacion', '$ficha', '$nave')";
     $mysql = mysqli_query($mysqli, $con);
     if($mysql){
    echo "lo hiciste";

}
else{
    echo"No lo hiciste";
}
?>