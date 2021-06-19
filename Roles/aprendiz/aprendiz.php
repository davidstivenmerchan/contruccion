<?php
    require_once("../../includes/validacion.php");
    include('../../includes/conexion.php');


    $nombre = $_SESSION['nombre'];
    $documento = $_SESSION['cc'];

    $consulta1 = "SELECT entrada_aprendiz.documento, asignacion_equipos.id_equipo, equipos.serial 
    FROM entrada_aprendiz, asignacion_equipos, equipos  
    WHERE entrada_aprendiz.id_entrada_aprendiz=asignacion_equipos.id_entrada_aprendiz 
    AND equipos.id_equipo=asignacion_equipos.id_equipo 
    AND documento = '$documento'";

    $ejecucion1 = mysqli_query($mysqli, $consulta1);
    $mostrar1 = mysqli_fetch_array($ejecucion1);
    if($mostrar1){
        $serial = $mostrar1['serial'];
    }
?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/aprendiz.css">
    <link rel="stylesheet" href="css/appbar.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <script src="https://use.fontawesome.com/aa14b1055f.js"></script>
    <title>Aprendiz</title>
</head>
<body>
<header class="header">
        <figure>
            <img src="../../assets/logo_solo.png" alt="logo construccion" title="logo software">
        </figure>
        <nav>
            <a href="./inicio.php">inicio</a>
            <a href="#">Mi Computador</a>
            <a href="./yotampco">Mis Datos Personales</a>
        </nav>
        <article class="opciones">
            <a href="../../includes/cerrar.php"><i class="fas fa-door-open"></i></a>
            <p>Aprendiz</p>
        </article>
    </header>
    <h2>MIS DATOS PERSONALES</h2>


<hr>

    <h2>MI COMPUTADOR</h2>

    <p >Mi Equipo de Computo Asignado: <?php echo $serial ?> </p> 

    <button id="botoninicial"  class="botoninicial" onclick="alerta()">
        Estado Inicial
    </button>
    <button  class="botoninicial">
        Estado Final
    </button>
    <form action="" id="formularioinicio" class="formuu">
        <input type="text"><input type="text"><input type="text"><input type="text">
    </form>



    <script src="js_aprendiz/aprendiz.js"></script>
</body>
</html>