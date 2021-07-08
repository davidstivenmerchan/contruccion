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
                <button class="aparecerequipos formula2" data-form="formu1"> <i class="aparecerequipos formula2 fa fa-file-alt" title="Mostrar Datos marca de equipos" data-form="formu1"></i></button>
                <button class="aparecerequipos formula9" data-form="formu8"> <i class="aparecerequipos formula9 fa fa-keyboard" title="Registrar dato marca de equipo" data-form="formu8"></i> </button>
            </div>
        </div>
        <div class="card">
            <h3>Crear estado dispositivo</h3>

            <div class="botones">
                <button class="aparecerequipos formula3" data-form="formu2"> <i class="aparecerequipos formula3 fa fa-file-alt" title="Mostrar Datos estados dispositivos" data-form="formu2"></i></button>
                <button class="aparecerequipos formula10" data-form="formu9"> <i class="aparecerequipos formula10 fa fa-keyboard" title="Registrar dato estado dispositivo" data-form="formu9"></i> </button>
            </div>
        </div>
        <div class="card">
            <h3>Crear estado aprobacion</h3>

            <div class="botones">
                <button class="aparecerequipos formula4" data-form="formu3"> <i class="aparecerequipos formula4 fa fa-file-alt" title="Mostrar Datos de estados de aprobacion" data-form="formu3"></i>  </button>
                <button class="aparecerequipos formula11" data-form="formu10"> <i class="aparecerequipos formula11 fa fa-keyboard" title="Registrar dato estado de aprobacion" data-form="formu10"></i> </button>
            </div>
        </div>
        <div class="card">
            <h3>Crear disponibilidad</h3>

            <div class="botones">
                <button class="aparecerequipos formula5" data-form="formu4"> <i class=" aparecerequipos formula5 fa fa-file-alt" title="Mostrar Datos de estados de disponibilidad" data-form="formu4"></i>  </button>
                <button class="aparecerequipos formula12" data-form="formu11"> <i class="aparecerequipos formula12 fa fa-keyboard" title="Registrar dato de estado de disponibilidad" data-form="formu11"></i> </button>
            </div>
        </div>
        <!-- /******* hasta aqui */ -->
        
    </section>
    <div class="forms">
        <div class="form">
            <h2>Tipo de dispositivos</h2>

            <table class="tabla">
                <tr class="titulo">
                    <tr class="header" style="text-align: center;">
                        <td>Id Tipo Dispositivo</td>
                        <td>Nombre Tipo Dispositivo</td>
                        <td class="acciones"> Accciones </td>
                    </tr>
                </tr>

                <?php
                    $sql="SELECT * FROM tipo_dispositivo";
                    $result=mysqli_query($mysqli,$sql);

                    while($mostrar=mysqli_fetch_array($result)){

                    
                ?>


                <tr class="datos" style="text-align: center;">
                    <td><?php echo $mostrar['id_tipo_dispositivo'] ?></td>
                    <td><?php echo $mostrar['nom_tipo_dispositivo'] ?></td>
                    <td class="imgs">
                        <img src="./../../assets/edit-solid.svg" alt="editar" class="edit tipdispo" title="editar" data-tipdispo="<?php echo $mostrar['id_tipo_dispositivo'];?>">
                        <img src="./../../assets/trash-solid.svg" alt="eliminar" class="remove tipdispo" title="eliminar" data-tipdispo="<?php echo $mostrar['id_tipo_dispositivo'];?>">                     
                    </td>
                </tr>
                
                    <?php
                    }
                    ?>
            
            </table>
        </div>
        
        <div class="formu1 tablas">
            <h2>Marcas</h2>


            <table class="tablamarca" border=1 cellspacing="0">
                <tr class="header">
                    <td>Id</td>
                    <td>Marca</td>
                    <td class="acciones"> Accciones </td>
                </tr>
                <?php 
            $con = "SELECT * from marca";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr class="datos">
                    <td><?php echo $eh['id_marca']?></td>
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

        <div class="formu2 tablas">
            <h2>Estados de los dispositivos</h2>


            <table class="tablamarca" border=1 cellspacing="0">
                <tr class="header">
                    <td>Id</td>
                    <td>Estado</td>
                    <td class="acciones"> Accciones </td>
                </tr>
                <?php 
            $con = "SELECT * from estado_dispositivo";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr class="datos">
                    <td><?php echo $eh['id_estado_dispositivo']?></td>
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

        <div class="formu3 tablas">
            <h2>Estados de aprobacion</h2>


            <table class="tablamarca" border=1 cellspacing="0">
                <tr class="header">
                    <td>Id</td>
                    <td>Estado</td>
                    <td class="acciones">Acciones</td>
                </tr>
                <?php 
            $con = "SELECT * from estado_aprobacion";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr class="datos">
                    <td><?php echo $eh['id_estado_aprobacion']?></td>
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

        <div class="formu4 tablas">
            <h2>Estados de disponibilidad</h2>


            <table class="tablamarca" border=1 cellspacing="0">
                <tr class="header">
                    <td>Id</td>
                    <td>Estado</td>
                    <td class="acciones">Acciones</td>
                </tr>
                <?php 
            $con = "SELECT * from estado_disponibilidad";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr class="datos">
                    <td><?php echo $eh['id_estado_disponibilidad']?></td>
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
        <div class="formu5 tablas">
            
                <h2>Dispositivos Electronicos</h2>
            <table class="tablamarca" border=1 cellspacing="0">
                <tr class="header">
                    <td>serial</td>
                    <td>Placa Sena</td>
                    <td>Tipo Dispositivo</td>
                    <td>Nombre </td>
                    <td>Estado disponibilidad</td>
                    <td>Estado Dispositivo</td>
                    <td>Marca</td>
                    <td class="acciones">Acciones</td>
                </tr>
                <?php 
            $con = "SELECT serial,placa_sena, nom_tipo_dispositivo, nom_dispositivo,nom_estado_disponibilidad,nom_estado_dispositivo,nom_marca
                    FROM dispositivo_electronico,estado_disponibilidad,estado_dispositivo,marca,tipo_dispositivo 
                    WHERE dispositivo_electronico.id_tipo_dispositivo = tipo_dispositivo.id_tipo_dispositivo 
                    AND dispositivo_electronico.id_estado_disponibilidad = estado_disponibilidad.id_estado_disponibilidad 
                    AND dispositivo_electronico.id_estado_dispositivo = estado_dispositivo.id_estado_dispositivo 
                    AND dispositivo_electronico.id_marca = marca.id_marca ";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr class="datos">
                    <td><?php echo $eh['serial']?></td>
                    <td><?php echo $eh['placa_sena']?></td>
                    <td><?php echo $eh['nom_tipo_dispositivo']?></td>
                    <td><?php echo $eh['nom_dispositivo']?></td>
                    <td><?php echo $eh['nom_estado_disponibilidad']?></td>
                    <td><?php echo $eh['nom_estado_dispositivo']?></td>
                    <td><?php echo $eh['nom_marca']?></td>
                    <td class="imgs">
                        <img src="./../../assets/edit-solid.svg" alt="editar" title="editar" class="edit dispositivo" data-dispositivo="<?php echo $eh['serial']; ?>">
                        <img src="./../../assets/trash-solid.svg" alt="eliminar" title="eliminar" class="remove dispositivo" data-dispositivo="<?php echo $eh['serial']; ?>">                     
                    </td>
                </tr>
                <?php
            } 
            ?>
            </table>
        </div>
        <div class="formu6 tablas">
            <table>
                <td>
                    holi
                </td>
            </table>
        </div>

        <div class="form1 formu7">
            <p type="title">Crear tipos de Dispositivos</p>
            <div class="linea"></div>
            <form id="tipoDispo" class="formulario" autocomplete="off">
    
                <label for="nom">Nombre del Tipo de Dispositivo</label><br>
                <input type="text" name="nom_dis" id="nom_dis" required>

                <input type="submit" value="Guardar">
            </form>  
        </div>

        <div class="form1 formu8">
            <p type="title">Crear la Marca de los Equipos</p>
            <div class="linea"></div>
            <form class="formulario" id="marcaEquipos" autocomplete="off">
                    <!--  -->
                    <label for="nom">Nombre de la Marca</label><br>
                    <input type="text" name="nom_marca" id="nom_marca" pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" required  title="Solo se permiten letras" >
                    <input type="submit" value="Guardar">
            </form>
        </div>

        <div class="form1 formu9">
            <p type="title">Crear Estado del Dispositivo</p>
            <div class="linea"></div>
            <form class="formulario" id="estadoDispo" autocomplete="off">
                <label for="nom">Nombre del Estado del Dispositivo</label><br>
                <input type="text" name="nom_estado" id="nom_estado" pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" required  title="Solo se permiten letras">
                <input type="submit" value="Guardar">
            </form>
        </div>


        <div class="form1 formu10">
            <p type="title">Crear Estado de Aprobacion</p>
            <div class="linea"></div>
            <form class="formulario" id="estadoApro" autocomplete="off">

                <label for="nom">Nombre del Estado de Aprobacion</label><br>
                <input type="text" name="nom_estado" id="nom_estado" pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" required  title="Solo se permiten letras">
                
                <input type="submit" value="Guardar">
            </form>
        </div>

        <div class="form1 formu11">
            <p type="title">Crear Estado de Disponibilidad</p>
            <div class="linea"></div>
            <form class="formulario" id="estadoDisponibilidad" autocomplete="off">
                
                <label for="nom">Nombre del Estado de Disponibilidad</label><br>
                <input type="text" name="nom_estado" id="nom_estado" pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" required  title="Solo se permiten letras">
                <input type="submit" value="Guardar">
                    
            </form>
        </div>
        <div class="form1 formu12">
            <h2>Registro de Dispositivos Electronicos </h2>

            <form id="formuDispositivo"class="fommu" autocomplete="off">
                
                  
                <label for="serial">Serial</label>
                <input type="text" name="serial" id="serial" required>

                <label for="placa_sena">Placa Sena</label>
                <input type="text" name="placa_sena" id="placa_sena" autocomplete="off" required>

                <label for="nom_dispositivo">Nombre Dispositivo</label>
                <input type="text" name="nom_dispositivo" id="nom_dispositivo" autocomplete="off" required>

            <!-- selectores  -->
            <label for="id_tipo_dis">tipo de dispositivo</label>
            <select name="id_tipo_dis" id="id_tipo_dis" required>
            <option value="">Seleccione el Tipo de Dispositivo</option>
            <?php
                foreach (consultarEquipos($mysqli, "SELECT * from tipo_dispositivo") as $i) :  ?>
                <option value="<?php echo $i['id_tipo_dispositivo']?>"><?php echo $i['nom_tipo_dispositivo']?></option>
            <?php
                endforeach;
            ?>
            </select>
            <!-- selectores  2 -->
            <select name="estado_disponi" id="estado_disponi" required>
            <option value="">Seleccione el Tipo de Disponibilidad</option>
                <?php
                    foreach (consultarEquipos($mysqli, "SELECT * from estado_disponibilidad") as $i) :  ?>
                    <option value="<?php echo $i['id_estado_disponibilidad']?>"><?php echo $i['nom_estado_disponibilidad']?></option>
                <?php
                    endforeach;
                ?>
            </select>
            <!-- selectores  3 -->
            <select name="estado_disposi" id="estado_disposi" required>
            <option value="">Seleccione el Tipo de Estado</option>
            <?php
                foreach (consultarEquipos($mysqli, "SELECT * FROM  estado_dispositivo") as $i) :  ?>
                <option value="<?php echo $i['id_estado_dispositivo']?>"><?php echo $i['nom_estado_dispositivo']?></option>
            <?php
                endforeach;
            ?>
            </select>
            <!-- selectores  4 -->
            <select name="marca" id="marca" required>
            <option value="">Marca</option>
            <?php
                foreach (consultarEquipos($mysqli, "SELECT * from marca") as $i) :  ?>
                <option value="<?php echo $i['id_marca']?>"><?php echo $i['nom_marca']?></option>
            <?php
                endforeach;
            ?>
            </select>

            <input type="submit" value="REGISTRAR" name="registrar" class="resgi">
            </form>
        </div>
        <div class="form1 formu13">
                <form action="" id="perifericoform" autocomplete="off">
                    <article class="serialperiferico">
                        <label for="serialperiferico">Serial</label>
                        <input type="text" name="serialperiferico" id="serialperiferico" placeholder="serial del periferico" autocomplete="off" required>
                    </article>
                    <article class="tipPeriferico">
                        <label for="tipPeriferico"> tipo de periferico </label>
                        <select name="tipPeriferico" id="tipPeriferico" required>
                            <option>Seleccione una opcion valida</option>
                            <?php
                                foreach(consultarEquipos($mysqli, "SELECT * FROM tip_periferico") as $tipPeriferico):  
                            ?>
                                <option value="<?php echo $tipPeriferico['id_tip_periferico']; ?>"><?php echo $tipPeriferico['nom_tip_periferico']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </article>
                    <article class="nom_peroferico">
                        <label for="nom_periferico">Nombre del periferico</label>
                        <input type="text" name="nom_periferico" id="nom_periferico" placeholder="nombre del periferico" autocomplete="off" required>
                    </article>
                    <article class="marca">
                        <label for="marcaperiferico"> marca </label>
                        <select name="marcaperiferico" id="marcaperiferico" required>
                            <option value="">Seleccione una opcion</option>
                            <?php
                                foreach(consultarEquipos($mysqli , "SELECT *  from marca") as $marca):
                            ?>
                                <option value="<?php echo $marca['id_marca'];?>"><?php echo $marca['nom_marca'] ?></option>
                            <?php endforeach;?>
                        </select>    
                    </article>
                    <article class="estadoDisponibilidad">
                        <label for="estadoDisponibilidad">estado de disponibilidad</label>
                        <select name="estadoDisponibilidad" id="estadoDisponibilidad" required>
                            <option>seleccione una opcion </option>
                            <?php
                                foreach(consultarEquipos($mysqli, "SELECT * from estado_disponibilidad") as $estadoDisponibilidad):
                            ?>
                                <option value="<?php echo $estadoDisponibilidad['id_estado_disponibilidad']; ?>"><?php echo $estadoDisponibilidad['nom_estado_disponibilidad']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </article>
                    <article class="estadoDispositivo">
                            <label for="">estado Dispositivo</label>
                            <select name="estadoDispositivo" id="EstadoDispositivo" required>
                                <option>Seleccione una opcion</option>
                                <?php
                                    foreach(consultarEquipos($mysqli, "SELECT * from estado_dispositivo") as $estadoDispositivo): 
                                ?>
                                    <option value="<?php echo $estadoDispositivo['id_estado_dispositivo']; ?>"><?php echo $estadoDispositivo['nom_estado_dispositivo']; ?></option>
                                <?php
                                    endforeach;
                                ?>
                            </select>
                    </article>
                    <input type="submit" value="Registrar">
                </form>
        </div>
    </div>

    <script src="../js/equipos.js" type="module"></script>
</body>
</html>