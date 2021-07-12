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
            <img src="../../assets/logo_sl.png" alt="">
        </figure>
        <h1>AECES</h1>
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
        <h3>DATOS PERSONALES</h3>
        <p>DOCUMENTO: <?php echo  $documento ?></p>
        <p>COD CARNET: <?php echo  $cod_carnet ?></p>
        <p>NOMBRE: <?php echo  $nombre ?></p>
        <p>APELLIDOS: <?php echo  $apellido ?></p>
        <p>FECHA DE NACIMIENTO: <?php echo  $fecha ?></p>
        <p>CORREO PERSONAL: <?php echo  $correo_p ?> </p>
        <p>CORREO MISENA: <?php echo  $correo_s ?></p>
        <p>TELEFONO: <?php echo  $tel ?></p>
    </div>

   <nav>
       <button class="uno"><a href="asignacion_equipos.php?var= <?php echo $documento?>" class="pueeba">Asignación de Computadores</a></button><STYLE>A {text-decoration: none;} </STYLE><br>
       <button class="dos"><a href="asistencia_aprendices.php?var= <?php echo $documento?>"class="pueeba">Asistencia de Aprendices</a></button><br>
       <button class="tres"><a href="registrar_equipos.php?var= <?php echo $documento?>" class="pueeba">Equipos de Computo</a></button><br>
   </nav>
   <div class="enlaces">
        <h2>INFORMES</h2>
        <a href="elegir_asistencia.php" class="uno">
            <span class="icon"><img src="../../assets/documento.png" alt=""></span>
            <p class="pueba">Asistencia</p>
        </a>

        <a href="informe_asignacion.php" class="dos">
            <span class="icon"><img src="../../assets/tablero.png" alt=""></span>
            <p class="pueba" >Asignacion</p>
        </a>

        <a href="" class="tres">
            <span class="icon"><img src="../../assets/sitio-web.png" alt=""></span>
            <p class="pueba" >Equipos</p>
        </a>

        <a href="" class="cuatro">
            <span class="icon"><img src="../../assets/vigilancia.png" alt=""></span>
            <p class="pueba" >Buscar Informe</p>
        </a>
   </div>
   <div class="grupos">
       <h3>GRUPOS</h3>
        <a href="grupos.php?var=<?php echo $documento?>" class="grup">
            <span class="icon"><img src="../../assets/grupo.png" alt=""></span>
        </a>
   </div>

    <div class="aceptar">
        <h3>ACEPTAR REGISTRO DE APRENDICES</h3>
        <a href="aceptarinstru.php?var= <?php echo $documento?>" class="acep">
            <span class="icon"><img src="../../assets/check.png" alt=""></span>
        </a>
    </div>
   

    <footer class="pie">
    <img  height="90px" width="85px" src="../../assets/pie de pagina.png" alt="">
    <div class="info">
      <p>&copy; Servicio Nacional de Aprendizaje SENA-Dirección General </p>
      <p>Calle 57 No. 8 - 69 Bogotá D.C. (Cundinamarca), Colombia</p>
     
       <p>Conmutador Nacional (57 1) 5461500 - Extensiones</p>
       <p>Correo notificaciones judiciales: servicioalciudadano@sena.edu.co </p>
    </div>
    <nav class="icons">
   <a href="https://www.facebook.com/SENA/" target=_blank> <img  height="30px" width="20px" src="../../assets/icono.facebook.jpg" alt=""></a>
   <a href="https://www.instagram.com/senacomunica/" target=_blank> <img  height="30px" width="30px" src="../../assets/instagram-icon.png" alt=""></a>
   <a href="https://twitter.com/SENAComunica" target=_blank><img  height="30px" width="30px" src="../../assets/icono.twitter.png" alt=""></a>
   <a href="https://www.youtube.com/user/SENATV" target=_blank><img  height="35px" width="35px" src="../../assets/icono.youtube.png" alt=""></a>
   <a href="https://www.sena.edu.co/es-co/Paginas/default.aspx" target=_blank><img  height="35px" width="35px" src="../../assets/icono.spotify-.png" alt=""></a>
   <a href="https://soundcloud.com/senacolombia/" target=_blank><img  height="35px" width="50px" src="../../assets/icono.soundcloud.png" alt=""></a>
    </footer>
</body>
</html>