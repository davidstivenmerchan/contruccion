<!--
    este archivo  hace refernecia a la seccion de equipos del administrador este archivo tiene toda la 
    logica de la interfaz, en ella se muestran tablas y formularios pertenecientes o que tiene n que ver con este crud
    este archivo esta siendo consumido por una peticion http desde el archivo admin.php en el cual se muestra todo
    elegimos esta tecnica de hacerlo con ajax por que nos permite moularizar mas el codigo.
-->

<?php
    require_once './../../../includes/conexion.php';
    function consultarEquipos($mysqli, $consulta):mysqli_result 
    {
        return mysqli_query($mysqli, $consulta);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/aa14b1055f.js"></script>
    <title>Document</title>
    <link rel="stylesheet" href="../../css/formularios2.css">
    <link rel="stylesheet" href="./pag_admin/css/equipos.css">
    <link rel="stylesheet" href="./../../css/tablas.css">
</head>
<body>
    <!-- esta seccion cards es de donde pertenecen todas las tarjetas mostrdas en la interaz-->
    <section class="cards">

        <div class="card">
            <h3>Crear marca de equipos</h3>
        
            <div class="botones">
                <button class="aparecerotros formula1" data-form="form"> <i class="aparecerotros formula1 fa fa-file-alt" title="Mostrar Datos marca de equipos" data-form="form"></i></button>
                <button class="aparecerotros formula5" data-form="formu4"> <i class="aparecerotros formula5 fa fa-keyboard" title="Registrar dato marca de equipo" data-form="formu4"></i> </button>
            </div>
        </div>
        <div class="card">
            <h3>Crear estado dispositivo</h3>

            <div class="botones">
                <button class="aparecerotros formula2" data-form="formu1"> <i class="aparecerotros formula2 fa fa-file-alt" title="Mostrar Datos estados dispositivos" data-form="formu1"></i></button>
                <button class="aparecerotros formula6" data-form="formu5"> <i class="aparecerotros formula6 fa fa-keyboard" title="Registrar dato estado dispositivo" data-form="formu5"></i> </button>
            </div>
        </div>
        <div class="card">
            <h3>Crear estado aprobacion</h3>

            <div class="botones">
                <button class="aparecerotros formula3" data-form="formu2"> <i class="aparecerotros formula3 fa fa-file-alt" title="Mostrar Datos de estados de aprobacion" data-form="formu2"></i>  </button>
                <button class="aparecerotros formula7" data-form="formu6"> <i class="aparecerotros formula7 fa fa-keyboard" title="Registrar dato estado de aprobacion" data-form="formu6"></i> </button>
            </div>
        </div>
        <div class="card">
            <h3>Crear disponibilidad</h3>

            <div class="botones">
                <button class="aparecerotros formula4" data-form="formu3"> <i class=" aparecerotros formula4 fa fa-file-alt" title="Mostrar Datos de estados de disponibilidad" data-form="formu3"></i>  </button>
                <button class="aparecerotros formula8" data-form="formu7"> <i class="aparecerotros formula8 fa fa-keyboard" title="Registrar dato de estado de disponibilidad" data-form="formu7"></i> </button>
            </div>
        </div>

        <div class="card">
            <h3>Dispositivos - Ambientes </h3>
        
            <div class="botones">
                <button class="aparecerotros formula9" data-form="formu9"> <i class="aparecerotros formula9 fa fa-file-alt" title="Mostrar Datos Dispositivos ambientes de equipos" data-form="formu9"></i></button>
                <button class="aparecerotros formula10" data-form="formu10"> <i class="aparecerotros formula10 fa fa-keyboard" title="Registrar dato Dispositivos ambientes  de equipo" data-form="formu10"></i> </button>
            </div>
        </div>
        <!-- /******* hasta aqui */ -->
        
    </section>
    <div class="forms">
        
        <div class="form tablas">
            <h2>Marcas</h2>


            <table class="tablamarca" border=1 cellspacing="0">
                <tr class="header">
                    <td>Marca</td>
                    <td class="acciones"> Accciones </td>
                </tr>
                <?php 
            $con = "SELECT * from marca";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr class="datos">
                    <td><?php echo $eh['nom_marca']?></td>
                    <td class="imgs">
                        <img src="./../../assets/edit-solid.svg" alt="editar" title="editar" class="edit marca" data-marca="<?php echo $eh['id_marca']; ?>">
                        <img src="./../../assets/trash-solid.svg" alt="eliminar" title="eliminar" class="remove marca" data-marca="<?php echo $eh['id_marca']; ?>">                     
                    </td>
                </tr>
                <?php
            } 
            ?>
            </table>
        </div>

        <div class="formu1 tablas">
            <h2>Estados de los dispositivos</h2>


            <table class="tablamarca" border=1 cellspacing="0">
                <tr class="header">
                    <td>Estado</td>
                    <td class="acciones"> Accciones </td>
                </tr>
                <?php 
            $con = "SELECT * from estado_dispositivo";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr class="datos">
                    <td><?php echo $eh['nom_estado_dispositivo']?></td>
                    <td class="imgs">
                        <img src="./../../assets/edit-solid.svg" class="edit estado" alt="editar" title="editar" data-estado="<?php echo $eh['id_estado_dispositivo']; ?>">
                        <img src="./../../assets/trash-solid.svg" class="remove estado" alt="eliminar" title="eliminar" data-estado="<?php echo $eh['id_estado_dispositivo']; ?>">                     
                    </td>
                </tr>
                <?php
            } 
            ?>
            </table>
        </div>

        <div class="formu2 tablas">
            <h2>Estados de aprobacion</h2>


            <table class="tablamarca" border=1 cellspacing="0">
                <tr class="header">
                    <td>Estado</td>
                    <td class="acciones">Acciones</td>
                </tr>
                <?php 
            $con = "SELECT * from estado_aprobacion";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr class="datos">
                    <td><?php echo $eh['nom_aprobacion']?></td>
                    <td class="imgs">
                        <img src="./../../assets/edit-solid.svg" alt="editar" title="editar" class="edit aprobacion" data-estadoapro="<?php echo $eh['id_estado_aprobacion']; ?>">
                        <img src="./../../assets/trash-solid.svg" alt="eliminar" title="eliminar" class="remove aprobacion" data-estadoapro="<?php echo $eh['id_estado_aprobacion']; ?>">                     
                    </td>
                </tr>
                <?php
            } 
            ?>
            </table>
        </div>

        <div class="formu3 tablas">
            <h2>Estados de disponibilidad</h2>


            <table class="tablamarca" border=1 cellspacing="0">
                <tr class="header">
                    <td>Estado</td>
                    <td class="acciones">Acciones</td>
                </tr>
                <?php 
            $con = "SELECT * from estado_disponibilidad";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr class="datos">
                    <td><?php echo $eh['nom_estado_disponibilidad']?></td>
                    <td class="imgs">
                        <img src="./../../assets/edit-solid.svg" alt="editar" title="editar" class="edit disponibi" data-estadodisponi="<?php echo $eh['id_estado_disponibilidad']; ?>">
                        <img src="./../../assets/trash-solid.svg" alt="eliminar" title="eliminar" class="remove disponibi" data-estadodisponi="<?php echo $eh['id_estado_disponibilidad']; ?>">                     
                    </td>
                </tr>
                <?php
            } 
            ?>
            </table>
        </div>

        <div class="formu9 tablas">
            <h2>Dispositivos Ambientes</h2>


            <table class="tablamarca" border=1 cellspacing="0">
                <tr class="header">
                    <td>ID</td>
                    <td>Serial Dispositivo</td>
                    <td>Periferico Dispositivo</td>
                    <td>Numero Ambiente</td>
                    <td class="acciones">Acciones</td>
                </tr>
                <?php 
            $con = "SELECT id_disposi_ambientes,dispositivo_electronico.serial,periferico.id_periferico,ambiente.n_ambiente
                    FROM disposi_ambientes,dispositivo_electronico,ambiente,periferico,compu_peris
                    WHERE disposi_ambientes.id_compu_peris = compu_peris.id_compu_peris
                    AND compu_peris.serial = dispositivo_electronico.serial
                    AND compu_peris.id_periferico = periferico.id_periferico
                    AND disposi_ambientes.id_ambiente = ambiente.id_ambiente";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr class="datos">
                    <td><?php echo $eh['id_disposi_ambientes']?></td>
                    <td><?php echo $eh['serial']?></td>
                    <td><?php echo $eh['id_periferico']?></td>
                    <td><?php echo $eh['n_ambiente']?></td>
                    <td class="imgs">
                        <img src="./../../assets/edit-solid.svg" alt="editar" title="editar" class="edit disposi_ambiente" data-disposi_ambiente="<?php echo $eh['id_disposi_ambientes']; ?>">
                        <img src="./../../assets/trash-solid.svg" alt="eliminar" title="eliminar" class="remove disposi_ambiente" data-disposi_ambiente="<?php echo $eh['id_disposi_ambientes']; ?>">                     
                    </td>
                </tr>
                <?php
            } 
            ?>
            </table>
        </div>

        <!----------ACA COMIENZAN LOS FORMULARIOS----------->
            

        <div class="form1 formu4">
            <p type="title">Crear la Marca de los Equipos</p>
            <div class="linea"></div>
            <form class="formulario" id="marcaEquipos" autocomplete="off">
                    <!--  -->
                    <label for="nom">Nombre de la Marca</label><br>
                    <input type="text" name="nom_marca" id="nom_marca" pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" required  title="Solo se permiten letras" >
                    <input type="submit" value="Guardar">
            </form>
        </div>

        <div class="form1 formu5">
            <p type="title">Crear Estado del Dispositivo</p>
            <div class="linea"></div>
            <form class="formulario" id="estadoDispo" autocomplete="off">
                <label for="nom">Nombre del Estado del Dispositivo</label><br>
                <input type="text" name="nom_estado" id="nom_estado" pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" required  title="Solo se permiten letras">
                <input type="submit" value="Guardar">
            </form>
        </div>

        <!--estados de aprobacion-->
        <div class="form1 formu6">
            <p type="title">Crear Estado de Aprobacion</p>
            <div class="linea"></div>
            <form class="formulario" id="estadoApro" autocomplete="off">

                <label for="nom">Nombre del Estado de Aprobacion</label><br>
                <input type="text" name="nom_estado" id="nom_estado" pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" required  title="Solo se permiten letras">
                
                <input type="submit" value="Guardar">
            </form>
        </div>

        <!--#Estado de disponibilidad-->
        <div class="form1 formu7">
            <p type="title">Crear Estado de Disponibilidad</p>
            <div class="linea"></div>
            <form class="formulario" id="estadoDisponibilidad" autocomplete="off">
                
                <label for="nom">Nombre del Estado de Disponibilidad</label><br>
                <input type="text" name="nom_estado" id="nom_estado" pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" required  title="Solo se permiten letras">
                <input type="submit" value="Guardar">
                    
            </form>
        </div>
    </div>

    <!--#Dispositivos Ambientes-->
    <div class="form1 formu10 dispoAmbientes ">
            <p type="title">Crear Dispositivos Ambientes</p>
            <div class="linea"></div>
            <form class="formulario" id="disposi_ambientes" autocomplete="off">
                
                
                <input type="text" name="IdCompuPeris" id="IdCompuPerisfe" placeholder=" Id Computador Perisfericos ">

                <input type="text" name="IdAmbiente" id="IdAmbientee" placeholder= " Id Ambiente ">

                <input type="submit" value="Guardar">
            </form>
        </div>
    </div>

    <script src="../js/equipos.js" type="module"></script>
</body>
</html>