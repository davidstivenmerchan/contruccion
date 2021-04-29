<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- <link rel="stylesheet" href="./css/calendario.css"> -->
</head>
<body>
    <div class="container">
        <?php require './banner.php'; ?>
    </div>

    <div class="main">
        <div class="topbar">
            <div class="toggle" onclick="toggleMenu();"></div>
            <div class="search">
                <label>
                    <input type="text" placeholder="searh">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </label>
                
            </div>
            <div class="user">
                <img src="../contruccion/img/C.C.1005712070.JPG" height="70px" alt="">
            </div>
        </div>

        <!-- calendario 
            <div class="cardBox">
                <div class="root">
                    <div class="calendar" id="calendar">
            
                    </div>
                </div>
                <script  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
                <script  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/es.js"></script>
                <script  type="text/javascript" src="./js/calendar.js"></script>
                <script type="text/javascript">
                    let calendar = new Calendar('calendar');
                    calendar.getElement().addEventListener('change', e => {
                        console.log(calendar.value().format('LLL'));
                    });
                </script>   
            </div>
        </div>-->
    <!-- MENU -->

    <?php
     require_once '../conexion/conexion.php';

    function select($mysqli, $consulta){
        $query= mysqli_query($mysqli,$consulta);
        $db = mysqli_fetch_all($query) ;
        return $db;
    }
     $consul= "SELECT nom_documento FROM tipo_documento";

    $consul= "SELECT nom_tipo_usuario FROM tipo_usuario";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="../css/formu_user.css">
</head>
<body>
    <div class="form">
        <p>Crear usuarios</p>
        <div class="linea"></div>
        <img src="img/usu.png" alt="">
        <div class="wrapper">
            <form action="">
                <p>
                    <label for="doc">Documento</label>
                    <input type="number" name="doc">
                </p>
                <p>
                    <label for="tipo_doc">Tipo de Documento</label>
                    <select name="tip_doc" id="tip_doc" required>
                    <option value="">Seleccione el Tipo de Documento</option>
                    <?php
                        $tipo_docu= select($mysqli, "SELECT nom_documento FROM tipo_documento");
                        foreach ($tipo_docu as $tipo_doc) :  ?>
                        <option value="<?php echo $tipo_doc[07]?>"><?php echo $tipo_doc[0] ;?></option>
                    <?php
                        endforeach;
                    ?>
                    </select>
                </p>
                <p>
                    <label for="tipo_usu">Tipo de Usuario</label>
                    <select name="tip_usu" id="tip_usu" required>
                    <option value="">Seleccione el Tipo de Usuario</option>
                    <?php
                        $tipoUsua = select($mysqli, "SELECT nom_tipo_usuario from tipo_usuario");
                        foreach ($tipoUsua as $tipo_usu) :  ?>
                        <option value="<?php echo $tipo_usu[0]?>"><?php echo $tipo_usu[0]?></option>
                    <?php
                        endforeach;
                    ?>
                    </select>
                </p>
                <p>
                    <label for="codigo">Codigo del Carnet</label>
                    <input type="number" name="codigo" id="codigo">
                </p>
                <p>
                    <label for="nom">Nombre</label>
                    <input type="text" name="nom" id="nom">
                </p>
                <p>
                    <label for="ape">Apellido</label>
                    <input type="text" name="ape" id="ape">
                </p>
                <p>
                    <label for="fecha">Fecha de Nacimiento</label>
                    <input type="date" name="fecha" id="fecha">
                </p>
                <p>
                    <label for="genero">Genero</label>
                    <input type="text" name="genero" id="genero">
                </p>
                <p>
                    <label for="email_per">E-mail Personal</label>
                    <input type="email" name="email per" id="email per">
                </p>
                <p>
                    <label for="email_sena">E-mail Sena</label>
                    <input type="email" name="email_sena" id="email_sena">
                </p>
                <p>
                    <label for="clave">Contraseña</label>
                    <input type="password" name="clave" id="clave">
                </p>
                <p>
                    <label for="imagen">Foto del Usuario</label>
                    <input type="file" name="imagen" id="imagen">
                </p>
                <p>
                    <button>Registrar</button>
                </p>
            </form>
        </div>
    </div>
</body>
</html>
    
    
    <script>
        function toggleMenu()
        {
            let toggle = document.querySelector('.toggle');
            let navigation = document.querySelector('.navigation');
            let main = document.querySelector('.main');
            toggle.classList.toggle('active');
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }
    </script>
</body>
</html>