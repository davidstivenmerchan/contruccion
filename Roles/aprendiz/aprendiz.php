<?php
    require_once("../../includes/validacion.php");
    include('../../includes/conexion.php');


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

    $consulta2 = "SELECT asignacion_equipos.id_asignacion_equipos, entrada_aprendiz.documento 
    from asignacion_equipos, entrada_aprendiz
    where entrada_aprendiz.id_entrada_aprendiz = asignacion_equipos.id_entrada_aprendiz
    and entrada_aprendiz.documento='$documento'";
    $ejecucion2 = mysqli_query($mysqli, $consulta2);
    $mostrar2 = mysqli_fetch_array($ejecucion2);
    if($ejecucion2){
        $id_asignacion = $mostrar2['id_asignacion_equipos'];
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
        <a href="#">Mis Datos</a>
            <a href="#">Mi Computador</a>
            
        </nav>
        <article class="opciones">
            <a href="../../includes/cerrar.php"><i class="fas fa-door-open"></i></a>
            <p>Aprendiz</p>
        </article>
    </header>
    <h2>MIS DATOS</h2>
    <div class="papa2">
        <div class="mis_datos">
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
        <div class="mis_datos">
            <h3>DATOS DE MI MATRICULA</h3>
            <p>Documento: <?php echo  $documento ?></p>
            <p>Cod Carnet: <?php echo  $cod_carnet ?></p>
            <p>Nombres: <?php echo  $nombre ?></p>
            <p>Apellidos: <?php echo  $apellido ?></p>
            <p>Fecha de Nacimiento: <?php echo  $fecha ?></p>
            <p>Correo Personal: <?php echo  $correo_p ?> </p>
            <p>Correo misena: <?php echo  $correo_s ?></p>
            <p>Telefono: <?php echo  $tel ?></p>

        </div>


    </div>
<hr>
    <h2>MI COMPUTADOR</h2>

    <p class="texto">Mi Equipo de Computo Asignado es: <?php echo $serial ?> </p> 
<div class="padre">

    <div>
        <button id="botoninicial"  class="botoninicial" onclick="alerta()">
            Estado Inicial
        </button>
        <form action="" id="formularioinicio" class="formuu">
            <textarea name="" id="mensajeinicio" cols="30" rows="10" max=30 min=30 placeholder="Describa en que Estado Encontro su Equipo de Computo"></textarea>
            <input type="hidden" value="<?php echo $id_asignacion ?>" id="id_asignacion_inicio">
            <button id="enviarinicial">
                Enviar Estado de Equipo
            </button>
            
        </form>
            <button class="cerrar" id="cerrar" onclick="cerrar()">
                Cerrar Este Formulario
            </button>
    </div>
    <div>
        <button  class="botoninicial" onclick="alerta2()">
            Estado Final
        </button>
        <form action="" id="formularioinicioo" class="formuu">
            <textarea name="" id="" cols="30" rows="10" max=30 min=30 placeholder="Describa en que Estado Dejo su Equipo de Computo"></textarea>
            <button>
                Enviar Estado de Equipo
            </button>
            
        </form>
            <button class="cerrar2" id="cerrarr" onclick="cerrarr()">
                Cerrar Este Formulario
            </button>

    </div>
</div>
   
   
<br>
<br>
<br>
<br>
<br>
<br>
    

    
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>

    <script src="js_aprendiz/aprendiz.js"></script>
</body>
</html>