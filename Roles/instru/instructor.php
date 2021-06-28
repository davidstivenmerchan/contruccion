<?php

require_once("../../includes/validacion.php");
require_once './../../includes/conexion.php';
$documento = $_SESSION['cc'];
$user = [];
$sql = "SELECT nombres from usuarios where documento= ?";
$query = mysqli_prepare($mysqli, $sql);
$bueno = mysqli_stmt_bind_param($query, 'i', $documento);
$bueno = mysqli_stmt_execute($query);
$bueno = mysqli_stmt_bind_result($query, $nombres);
while(mysqli_stmt_fetch($query)){
    array_push($user, ['nombres' => $nombres]);
}


    $nombre = $_SESSION['nombre'];
    $documento = $_SESSION['cc'];
    $cod_carnet = $_SESSION['cod_carnet'];
    $apellido = $_SESSION['apellido'];
    $fecha =$_SESSION['fecha'];
    $genero =$_SESSION['genero'];
    $correo_p =$_SESSION['correo_p'];
    $correo_s=$_SESSION['correo_s'];
    $tel=$_SESSION['tel'];
    $_SESSION['clave'];

    $consulta = "SELECT documento, Cod_Carnet, Nombres, Apellidos, fecha_nacimiento, correo_personal,
    correo_sena,telefono FROM usuarios Where documento=$documento";
    $query = mysqli_query($mysqli, $consulta);
    $mostrar = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/instructor.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <script src="https://use.fontawesome.com/aa14b1055f.js"></script>
    
    <title>Instructor</title>
</head>
<body>
    <header>
        <figure>
            <img src="../../assets/logo_sin_fondo_6.png" alt="">
        </figure>
        <div class="user">
            <a href="../../includes/cerrar.php"><i class="fas fa-door-open" title="Cerrar Sesion"></i></a>
            <?php echo $user[0]['nombres']; ?>
        </div>      
    </header>
    <div class="contenedor">
        <img src="../../assets/instructor_fondo.jpg" alt="">
        <h1>Instructor...<span>&#160;</span></h1>
    </div>
    <div class="datos">
        <h3>MIS DATOS PERSONALES</h3>
        <p>Documento: <?php echo  $documento ?></p>
        <p>Cod Carnet: <?php echo  $cod_carnet ?></p>
        <p>Nombres: <?php echo  $nombre ?></p>
        <p>Apellidos: <?php echo  $apellido ?></p>
        <p>Fecha de Nacimiento: <?php echo  $fecha ?></p>
        <p>Correo Personal: <?php echo  $correo_p ?> </p>
        <p>Correo misena: <?php echo  $correo_s ?></p>
        <p>Telefono: <?php echo  $tel ?></p>
    </div>

   <nav>
       <button class="uno"><a href="asignacion_equipos.php?var= <?php echo $documento?>">Asignación de Computadores</a></button><STYLE>A {text-decoration: none;} </STYLE><br>
       <button class="dos"><a href="asistencia_aprendices.php?var= <?php echo $documento?>">Asistencia de Aprendices</a></button><br>
       <button class="tres"><a href="registrar_equipos.php?var= <?php echo $documento?>">Equipos de Computo</a></button><br>
   </nav>
   <div class="enlaces">
        <h2>INFORMES</h2>
        <a href="" class="uno">
            <span class="icon"><img src="../../assets/documento.png" alt=""></span>
            <span class="title"><p>Asistencia</p></span>
        </a>

        <a href="" class="dos">
            <span class="icon"><img src="../../assets/tablero.png" alt=""></span>
            <span class="title"><p>Asignacion</p></span>
        </a>

        <a href="" class="tres">
            <span class="icon"><img src="../../assets/sitio-web.png" alt=""></span>
            <span class="title"><p>Equipos</p></span>
        </a>

        <a href="" class="cuatro">
            <span class="icon"><img src="../../assets/vigilancia.png" alt=""></span>
            <span class="title"><p>Buscar Informe</p></span>
        </a>
   </div>
   <div class="grupos">
       <h3>Grupos</h3>
        <a href="" class="grup">
            <span class="icon"><img src="../../assets/grupo.png" alt=""></span>
        </a>
   </div>


   <a href="aceptarinstru.php?var= <?php echo $documento?>">aceptar aprendices</a>

   
    <!-- <div class="menu">
        <img src="../img/logo.sena.png" alt="">
        <h1>INSTRUCTOR</h1>
        <P>Menu</P>
        <input type="button" value="Aprendices">
        <input type="button" value="Equipos">
        <a href="../index.html"><input type="button" value="Cerrar Sesion"></a>

    </div>
    <div class="asignar">
        <form action="../includes/asignar.php" method="POST" autocomplete="off">
            <label for="doc">Documento</label>
            <input type="number" name="doc" placeholder="Digite el numero de documento del aprendiz">
            <button name="boton">Consultar</button>
        </form>
    </div>
    <div class="tabla" id="tabla"> 
        <table>
            <tr>
                <td>Nombre</td>
                <td>Equipo</td>
                <td>Inicio</td>
                <td>Finalizo</td>
                <td>Estado</td>
            </tr>
            <?php
           // $sql="SELECT nombre_completo, asignacion.serial, feho_ini, feho_fin, nom_estado FROM asignacion, usuarios,estado,equipos WHERE usuarios.documento = asignacion.documento AND estado.id_estado = equipos.id_estado";
            //$resul=mysqli_query($mysqli,$sql);

            //while($mostrar=mysqli_fetch_array($resul)){
            ?>
                <tr>
                    <td><?php //echo $mostrar['nombre_completo']?></td>
                    <td><?php //echo $mostrar['serial']?></td>
                    <td><?php //echo $mostrar['feho_ini']?></td>
                    <td><?php //echo $mostrar['feho_fin']?></td>
                    <td><?php //echo $mostrar['nom_estado']?></td>
                </tr>
            <?php
                // }
            ?>
        </table>
    </div> -->
</body>
</html>