<!--
    este archivo html hace refernecia a la seccion de equipos del administrador este archivo tiene toda la 
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
        <!--card tipo de dispositivo-->
        <div class="card">
            <h3>Crear tipo de dispositivos</h3>

            <div class="botones">
                <button class="aparecerequipos formula1" data-form="form"> <i class="aparecerequipos formula1 fa fa-file-alt" title="Mostrar Datos de tipo dispositivo" data-form="form"></i> </button>
                <button class="aparecerequipos formula6" data-form="formu5"> <i class="aparecerequipos formula6 fa fa-keyboard" title="Registrar datos tipo dispositivo" data-form="formu5"></i> </button>
            </div>
        </div>
        <!--card tipo de periferico-->
        <div class="card">
            <h3>Tipo de Periferico</h3>

            <div class="botones">
                <button class="aparecerequipos formula2" data-form="formu1"> <i class="aparecerequipos formula2 fa fa-file-alt" title="Mostrar Datos de tipo dispositivo" data-form="formu1"></i> </button>
                <button class="aparecerequipos formula7" data-form="formu6"> <i class="aparecerequipos formula7 fa fa-keyboard" title="Registrar datos tipo dispositivo" data-form="formu6"></i> </button>
            </div>
        </div>

        <!--card dispositivo electronico-->
        <div class="card">
            <h3>Dispositivos Electronicos</h3>

            <div class="botones">
                <button class="aparecerequipos formula3" data-form="formu2"> <i class="aparecerequipos formula3 fa fa-file-alt" title="Mostrar Datos de estados de disponibilidad" data-form="formu2"></i>  </button>
                <button class="aparecerequipos formula8" data-form="formu7"> <i class="aparecerequipos formula8 fa fa-keyboard" title="Registrar dato de estado de disponibilidad" data-form="formu7"></i> </button>
            </div>
        </div>

        <!-- card periferico-->
        <div class="card">
            <h3>Crear periferico</h3>

            <div class="botones">
                <button class="aparecerequipos formula4" data-form="formu3"> <i class=" aparecerequipos formula4 fa fa-file-alt" title="Mostrar Datos de estados de disponibilidad" data-form="formu3"></i>  </button>
                <button class="aparecerequipos formula9" data-form="formu8"> <i class="aparecerequipos formula9 fa fa-keyboard" title="Registrar dato de estado de disponibilidad" data-form="formu8"></i> </button>
            </div>
        </div>
        <!-- compus peris -->
        <div class="card">
            <h3>Computadores - perifericos</h3>
        
            <div class="botones">
                <button class="aparecerequipos formula5" data-form="formu4"> <i class="aparecerequipos formula5 fa fa-file-alt" title="Mostrar Datos marca de equipos" data-form="formu4"></i></button>
                <button class="aparecerequipos formula10" data-form="formu9"> <i class="aparecerequipos formula10 fa fa-keyboard" title="Registrar dato marca de equipo" data-form="formu9"></i> </button>
            </div>
        </div>


    </section>
    <div class="forms">
        <!--Primera tabla de tipo de dispositivo tiene la clase form-->
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
        <!---tabla que tiene que ver con tipo de periferico-->
        <div class="formu1 tablas">
            <h2>Tipo de periferico</h2>


            <table class="tablamarca" border=1 cellspacing="0">
                <tr class="header">
                    <td>Id</td>
                    <td>Nom Tipo Periferico</td>
                    <td class="acciones"> Accciones </td>
                </tr>
                <?php 
            $con = "SELECT * from tip_periferico";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr class="datos">
                    <td><?php echo $eh['id_tip_periferico']?></td>
                    <td><?php echo $eh['nom_tip_periferico']?></td>
                    <td class="imgs">
                        <img src="./../../assets/edit-solid.svg" alt="editar" title="editar" class="edit tipPeriferico" data-tipPeriferico="<?php echo $eh['id_tip_periferico']; ?>">
                        <img src="./../../assets/trash-solid.svg" alt="eliminar" title="eliminar" class="remove tipPeriferico" data-tipPeriferico="<?php echo $eh['id_tip_periferico']; ?>">                     
                    </td>
                </tr>
                <?php
            } 
            ?>
            </table>
        </div>
        <!-- Tabla dispositivo electronico -->

        <div class="formu2 tablas">
            <article class="search">
                <input type="number" name="search" id="searchdispo" class="searchinput" placeholder="busca un dispositivo por su serial" autocomplete="off">
            </article>
                <h2>Dispositivos Electronicos</h2>
            <table id="tabladispoelectronico" class="tablamarca" border=1 cellspacing="0">
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

        <!------periferico-->
        <div class="formu3 tablas">
            <h2>Perifericos</h2>
            <table>
                <tr class="header">
                    <td>Id Peiferico</td>
                    <td>tipo periferico</td>
                    <td>Nombre periferico</td>
                    <td>Marca</td>
                    <td>Estado Disponibilidad</td>
                    <td>Estado dispositivo</td>
                    <td>Dispositvo Asociado</td>
                    <td>Acciones</td>
                </tr>
                <?php
                    $sql = "SELECT periferico.id_periferico, tip_periferico.nom_tip_periferico, 
                    periferico.nom_periferico,marca.nom_marca, estado_disponibilidad.nom_estado_disponibilidad,
                    estado_dispositivo.nom_estado_dispositivo, dispositivo_electronico.serial 
                    from periferico INNER JOIN tip_periferico on periferico.id_tip_periferico = tip_periferico.id_tip_periferico 
                    INNER JOIN marca on periferico.id_marca = marca.id_marca 
                    INNER JOIN estado_disponibilidad on periferico.estado_disponibilidad = estado_disponibilidad.id_estado_disponibilidad 
                    INNER JOIN estado_dispositivo on periferico.estado_dispositivo = estado_dispositivo.id_estado_dispositivo 
                    INNER JOIN dispositivo_electronico on periferico.dispositivo_electronico = dispositivo_electronico.serial";
                    $res = mysqli_query($mysqli, $sql);
                    while($eh = mysqli_fetch_array($res)){
                ?>
                    <tr class="datos">
                        <td><?php echo $eh['id_periferico']?></td>
                        <td><?php echo $eh['nom_tip_periferico'] ?></td>
                        <td><?php echo $eh['nom_periferico'] ?></td>
                        <td><?php echo $eh['nom_marca'] ?></td>
                        <td><?php echo $eh['nom_estado_disponibilidad'] ?></td>
                        <td><?php echo $eh['nom_estado_dispositivo'] ?></td>
                        <td><?php echo $eh['serial'] ?></td>
                        <td class="imgs">
                        <img src="./../../assets/edit-solid.svg" alt="editar" title="editar" class="edit periferico" data-periferico="<?php echo $eh['id_periferico']; ?>">
                        <img src="./../../assets/trash-solid.svg" alt="eliminar" title="eliminar" class="remove periferico" data-periferico="<?php echo $eh['id_periferico']; ?>">                     
                    </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <!-- Compus perifericos -->
        <div class="formu4 tablas">
            <table>
                <td>
                    holi desde comu-perifericos
                </td>
            </table>
        </div>

        <!--- Formulario de tipo de dispositivos---->
        <div class="form1 formu5">
            <p type="title">Crear tipos de Dispositivos</p>
            <div class="linea"></div>
            <form id="tipoDispo" class="formulario" autocomplete="off">
    
                <label for="nom">Nombre del Tipo de Dispositivo</label><br>
                <input type="text" name="nom_dis" id="nom_dis" required>

                <input type="submit" value="Guardar">
            </form>  
        </div>

        <!--formulario de tipo de periferico-->
        
        <div class="form1 formu6">
            <p type="title">Crear Tipo de periferico</p>
            <div class="linea"></div>
            <form class="formulario" id="tipPeriferico" autocomplete="off">
                <label for="nom">Nombre del tipo de Periferico</label><br>
                <input type="text" name="nameTipPeriferico" id="nom_estado" pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" required  title="Solo se permiten letras">
                <input type="submit" value="Guardar">
            </form>
        </div>
        
        <!-- Formulario de tipo Dispositivo electronico-->
        <div class="form1 formu7">
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

        <!--formulario Perifericos-->
        <div class="form1 formu8">
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

        <!--FOrmulario dispo-periferico-->
        <div class="form1 formu9">
         11111 holi
        </div>
    </div>

    <script src="../js/equipos.js" type="module"></script>
</body>
</html>