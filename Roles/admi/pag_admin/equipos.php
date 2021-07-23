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
                <button class="aparecerequipos formula10" data-form="form9"> <i class="aparecerequipos formula10 fa fa-keyboard" title="Registrar datos tipo dispositivo" data-form="form9"></i> </button>
            </div>
        </div>
        <!--card tipo de periferico-->
        <div class="card">
            <h3>Tipo de Periferico</h3>

            <div class="botones">
                <button class="aparecerequipos formula2" data-form="form1"> <i class="aparecerequipos formula2 fa fa-file-alt" title="Mostrar Datos de tipo dispositivo" data-form="form1"></i> </button>
                <button class="aparecerequipos formula11" data-form="form10"> <i class="aparecerequipos formula11 fa fa-keyboard" title="Registrar datos tipo dispositivo" data-form="form10"></i> </button>
            </div>
        </div>

        <!--Memoria RAM-->
        <div class="card">
            <h3>Memoria RAM</h3>

            <div class="botones">
                <button class="aparecerequipos formula3" data-form="form2"> <i class="aparecerequipos formula3 fa fa-file-alt" title="Mostrar Datos de tipo dispositivo" data-form="form2"></i>  </button>
                <button class="aparecerequipos formula12" data-form="form11"> <i class="aparecerequipos formula12 fa fa-keyboard" title="Registrar datos tipo dispositivo" data-form="form11"></i> </button>
            </div>
        </div>

        <!--Almacenamiento-->

        <div class="card">
            <h3>almacenamiento</h3>

            <div class="botones">
                <button class="aparecerequipos formula4" data-form="form3"> <i class="aparecerequipos formula4 fa fa-file-alt" title="Mostrar Datos de tipo dispositivo" data-form="form3"></i>  </button>
                <button class="aparecerequipos formula13" data-form="form12"> <i class="aparecerequipos formula13 fa fa-keyboard" title="Registrar datos tipo dispositivo" data-form="form12"></i> </button>
            </div>
        </div>

        <!--procesador-->
        <div class="card">
            <h3>Procesador</h3>

            <div class="botones">
                <button class="aparecerequipos formula5" data-form="form4"> <i class="aparecerequipos formula5 fa fa-file-alt" title="Mostrar Datos de tipo dispositivo" data-form="form4"></i>  </button>
                <button class="aparecerequipos formula14" data-form="form13"> <i class="aparecerequipos formula14 fa fa-keyboard" title="Registrar datos tipo dispositivo" data-form="form13"></i> </button>
            </div>
        </div>

        <!--Sistema operativo -->

        <div class="card">
            <h3>Sistema operativo</h3>

            <div class="botones">
                <button class="aparecerequipos formula6" data-form="form5"> <i class="aparecerequipos formula6 fa fa-file-alt" title="Mostrar Datos de tipo dispositivo" data-form="form5"></i>  </button>
                <button class="aparecerequipos formula15" data-form="form14"> <i class="aparecerequipos formula15 fa fa-keyboard" title="Registrar datos tipo dispositivo" data-form="form14"></i> </button>
            </div>
        </div>

        <!--card dispositivo electronico-->
        <div class="card">
            <h3>Dispositivos Electronicos</h3>

            <div class="botones">
                <button class="aparecerequipos formula7" data-form="form6"> <i class="aparecerequipos formula7 fa fa-file-alt" title="Mostrar Datos de estados de disponibilidad" data-form="form6"></i>  </button>
                <button class="aparecerequipos formula16" data-form="form15"> <i class="aparecerequipos formula16 fa fa-keyboard" title="Registrar dato de estado de disponibilidad" data-form="form15"></i> </button>
            </div>
        </div>

        <!-- card periferico-->
        <div class="card">
            <h3>Crear periferico</h3>

            <div class="botones">
                <button class="aparecerequipos formula8" data-form="form7"> <i class=" aparecerequipos formula8 fa fa-file-alt" title="Mostrar Datos de estados de disponibilidad" data-form="form7"></i>  </button>
                <button class="aparecerequipos formula17" data-form="form16"> <i class="aparecerequipos formula17 fa fa-keyboard" title="Registrar dato de estado de disponibilidad" data-form="form16"></i> </button>
            </div>
        </div>
        <!-- compus peris -->
        <div class="card">
            <h3>Computadores - perifericos</h3>
        
            <div class="botones">
                <button class="aparecerequipos formula9" data-form="form8"> <i class="aparecerequipos formula9 fa fa-file-alt" title="Mostrar Datos marca de equipos" data-form="form8"></i></button>
                <button class="aparecerequipos formula18" data-form="form17"> <i class="aparecerequipos formula18 fa fa-keyboard" title="Registrar dato marca de equipo" data-form="form17"></i> </button>
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
        <div class="form1 tablas">
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

        <!--memoria ram-->
        <div class="form2 tablas">
            <h2>Memoria Ram</h2>
            <!-- <table>
                <tr class="header"> 
                    <td>Nombre MeMoria Ram</td>
                </tr>

                <?php
                    $sql = "SELECT * from memoria_ram";
                    $memrRam = mysqli_query($mysqli, $sql);
                    while($MR = mysqli_fetch_array($memrRam)){
                    
                ?>
                    <tr class="datos"> 
                        
                        <td><?php echo $MR['name_memoria_ram'] ?></td>
                        <td class="imgs">
                            <img src="./../../assets/edit-solid.svg" alt="editar" title="editar" class="edit memoRam" data-memoRam="<?php echo $MR['id_tip_periferico']; ?>">
                            <img src="./../../assets/trash-solid.svg" alt="eliminar" title="eliminar" class="remove memoRam" data-memoRam="<?php echo $MR['id_tip_periferico']; ?>">                     
                        </td>
                    </tr>
                <?php } ?>
            </table> -->
        </div>

        <!--alamacenamiento -->

        <div class="form3 tablas">
            <h2>ALMACENAMIENTO</h2>
            <p>hola hola hola</p>
        </div>
        
        <!--Procesador-->
        <div class="form4 tablas">
            <h2>Procesador</h2>
        </div>

        <!--Sistema operativo-->

        <div class="form5 tablas">
            <h2>Sistema operativo</h2>
        </div>

        <!-- Tabla dispositivo electronico -->

        <div class="form6 tablas">
            
                <h2 style="margin-left: 8%;">Dispositivos Electronicos</h2>
            <table class="tablamarca" border=1 cellspacing="10px" style="width: 80%; margin-left: 8%;">
                <tr class="header">
                    <td>serial</td>
                    <td>Placa Sena</td>
                    <td>Tipo Dispositivo</td>
                    <td>Procesador</td>
                    <td>Ram (GB)</td>
                    <td>Tipo Sistema</td>
                    <td>Estado disponibilidad</td>
                    <td>Estado Dispositivo</td>
                    <td>Marca Equipo</td>
                    <td>Almacenamiento</td>
                    <td>Ambiente Asignado</td>
                    <td class="acciones">Acciones</td>
                </tr>
                <?php 
            $con = "SELECT serial,placa_sena,tipo_dispositivo.nom_tipo_dispositivo,procesador,ramGB,tipo_sistema.nom_tipo_sistema,
                    estado_disponibilidad.nom_estado_disponibilidad,estado_dispositivo.nom_estado_dispositivo,marca.nom_marca,almacenamiento,ambiente.n_ambiente
                    FROM dispositivo_electronico,tipo_dispositivo,tipo_sistema,estado_disponibilidad,estado_dispositivo,marca,ambiente
                    WHERE dispositivo_electronico.id_tipo_dispositivo = tipo_dispositivo.id_tipo_dispositivo
                    AND dispositivo_electronico.id_tipo_sistema = tipo_sistema.id_tipo_sistema
                    AND dispositivo_electronico.id_estado_disponibilidad = estado_disponibilidad.id_estado_disponibilidad
                    AND dispositivo_electronico.id_estado_dispositivo = estado_dispositivo.id_estado_dispositivo
                    AND dispositivo_electronico.id_marca = marca.id_marca
                    AND dispositivo_electronico.id_ambiente = ambiente.id_ambiente";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr class="datos">
                    <td><?php echo $eh['serial']?></td>
                    <td><?php echo $eh['placa_sena']?></td>
                    <td><?php echo $eh['nom_tipo_dispositivo']?></td>
                    <td><?php echo $eh['procesador']?></td>
                    <td><?php echo $eh['ramGB']?></td>
                    <td><?php echo $eh['nom_tipo_sistema']?></td>
                    <td><?php echo $eh['nom_estado_disponibilidad']?></td>
                    <td><?php echo $eh['nom_estado_dispositivo']?></td>
                    <td><?php echo $eh['nom_marca']?></td>
                    <td><?php echo $eh['almacenamiento']?></td>
                    <td><?php echo $eh['n_ambiente']?></td>
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
        <div class="form7 tablas">
            <h2>Perifericos</h2>
            <table>
                <tr class="header">
                    <td>Id Peiferico</td>
                    <td>tipo periferico</td>
                    <td>Marca Periferico</td>
                    <td>Estado Disponibilidad</td>
                    <td>Estado dispositivo</td>
                    <td>Pulgadas</td>
                    <td>Descripcion</td>
                    <td>Acciones</td>
                </tr>
                <?php
                    $sql = "SELECT id_periferico,tip_periferico.nom_tip_periferico,marca.nom_marca,estado_disponibilidad.nom_estado_disponibilidad,estado_dispositivo.nom_estado_dispositivo,pulgadas,descripcion
                            FROM periferico,tip_periferico,marca,estado_disponibilidad,estado_dispositivo
                            WHERE periferico.id_tip_periferico = tip_periferico.id_tip_periferico
                            AND periferico.id_marca = marca.id_marca
                            AND periferico.estado_disponibilidad = estado_disponibilidad.id_estado_disponibilidad
                            AND periferico.estado_dispositivo = estado_dispositivo.id_estado_dispositivo";
                    $res = mysqli_query($mysqli, $sql);
                    while($eh = mysqli_fetch_array($res)){
                ?>
                    <tr class="datos">
                        <td><?php echo $eh['id_periferico']?></td>
                        <td><?php echo $eh['nom_tip_periferico'] ?></td>
                        <td><?php echo $eh['nom_marca'] ?></td>
                        <td><?php echo $eh['nom_estado_disponibilidad'] ?></td>
                        <td><?php echo $eh['nom_estado_dispositivo'] ?></td>
                        <td><?php echo $eh['pulgadas'] ?></td>
                        <td><?php echo $eh['descripcion'] ?></td>
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
        <div class="form8 tablas">
            <table>
                <tr class="header">
                    <td>ID</td>
                    <td>Serial</td>
                    <td>Id Periferico</td>
                    <td>Descripcion Perisferico</td>
                    <td>Fecha Creacion</td>
                    <td>Acciones</td>
                </tr>
                <?php
                    $sql = "SELECT id_compu_peris, serial, periferico.id_periferico ,periferico.descripcion,fecha_compu_peris 
                            FROM compu_peris,periferico 
                            WHERE compu_peris.id_periferico = periferico.id_periferico";
                    $res = mysqli_query($mysqli, $sql);
                    while($eh = mysqli_fetch_array($res)){
                ?>
                    <tr class="datos">
                        <td><?php echo $eh['id_compu_peris']?></td>
                        <td><?php echo $eh['serial'] ?></td>
                        <td><?php echo $eh['id_periferico'] ?></td>
                        <td><?php echo $eh['descripcion'] ?></td>
                        <td><?php echo $eh['fecha_compu_peris'] ?></td>
                        <td class="imgs">
                        <img src="./../../assets/edit-solid.svg" alt="editar" title="editar" class="edit compu-periferico" data-compusPerifericos="<?php echo $eh['id_compu_peris']; ?>">
                        <img src="./../../assets/trash-solid.svg" alt="eliminar" title="eliminar" class="remove compu-periferico" data-compusPerifericos="<?php echo $eh['id_compu_peris']; ?>">                     
                    </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>

        <!--- Formulario de tipo de dispositivos---->
        <div class="formu1 form9">
            <p type="title">Crear tipos de Dispositivos</p>
            <div class="linea"></div>
            <form id="tipoDispo" class="formulario" autocomplete="off">
    
                <label for="nom">Nombre del Tipo de Dispositivo</label><br>
                <input type="text" name="nom_dis" id="nom_dis" required>

                <input type="submit" value="Guardar">
            </form>  
        </div>

        <!--formulario de MEMORIA RAM-->

        <div class="formu1 form10">
            <h2>Crear Tipo de memoria Ram</h2>
            <div class="linea"></div>
            <form id="memoria_ram" class="formulario" autocomplete="off">
                <label for="memoriaram">Nombre de memoria Ram</label>
                <input type="text" name="memoriaRam" id="memoriaRam" autocomplete="off">
                <input type="submit" value="GUARDAR">
            </form>
        </div>

        <!--Formulario de Almacenamiento-->

        <div class="formu1 form11">
            <h2>Crear Tipo de Almacenamiento</h2>
            <div class="linea"></div>
            <form class="formulario" id="almacenamientoform">
                <label for="almacenamiento">Nombre Del Tipo de almacenamiento</label>
                <input type="text" name="almacenamiento" id="almacenamiento" autocomplete="off">
                <input type="submit" value="GU">
            </form>
        </div>

        <!--procesador-->
        <div class="formu1 form12">
            <h2>Procesador</h2>
            <div class="linea"></div>
            <form  class="formulario" id="procesadorform">
                <label for="procesador">Nombre del tipo de procesador</label>
                <input type="text" name="procesador" id="procesador" autocomplete="off">
                <input type="submit" value="GUARDAR">
            </form>
        </div>

        <!--Sistema operativo-->

        <div class="formu1 form13">
            <h2>Sistema operativo</h2>
            <div class="linea"></div>
            <form class="formulario" id="sistemaoperativo_form">
                <label for="sistema_op">Sistema Operativo</label>
                <input type="text" name="sistema_op" id="sistema_op" autocomplete="off">
                <input type="submit" value="GUARDAR">
            </form>
        </div>

        <!--formulario de tipo de periferico-->
        
        <div class="formu1 form14">
            <p type="title">Crear Tipo de periferico</p>
            <div class="linea"></div>
            <form class="formulario" id="tipPeriferico" autocomplete="off">
                <label for="nom">Nombre del tipo de Periferico</label><br>
                <input type="text" name="nameTipPeriferico" id="nom_estado" pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" required  title="Solo se permiten letras">
                <input type="submit" value="Guardar">
            </form>
        </div>
        
        <!-- Formulario de tipo Dispositivo electronico-->
        <div class="formu1 form15">
            <h2>Registro de Dispositivos Electronicos </h2>

            <form id="formuDispositivo"class="fommu" autocomplete="off">
                
                
                
                <input type="text" name="serial" id="serial" placeholder="Serial" required>

                
                <input type="text" name="placa_sena" id="placa_sena" autocomplete="off" placeholder="Placa Sena" required>

                
                <input type="text" name="Procesador" id="Procesador" autocomplete="off" placeholder="Procesador" required>

                
                <input type="text" name="RamGB" id="RamGB" autocomplete="off" placeholder="Ram en GB" required>

                <!-- selectores  -->
            
            <select name="id_tipo_siste" id="id_tipo_siste" required>
            <option value="">Seleccione el Tipo de Sistema</option>
            <?php
                foreach (consultarEquipos($mysqli, "SELECT * from tipo_sistema") as $i) :  ?>
                <option value="<?php echo $i['id_tipo_sistema']?>"><?php echo $i['nom_tipo_sistema']?></option>
            <?php
                endforeach;
            ?>
            </select>

            <!-- selectores  -->
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

            
                <input type="text" name="Almacenamiento" id="Almacenamiento" autocomplete="off" placeholder="Almacenamiento" required>

            <!-- selectores  5 -->
            <select name="ambiente_dispo" id="ambiente_dispo" required>
            <option value="">Ambiente</option>
            <?php
                foreach (consultarEquipos($mysqli, "SELECT * from ambiente") as $i) :  ?>
                <option value="<?php echo $i['id_ambiente']?>"><?php echo $i['n_ambiente']?></option>
            <?php
                endforeach;
            ?>
            </select>

            

            <input type="submit" value="REGISTRAR" name="registrar" class="resgi">
            </form>
        </div>

        <!--formulario Perifericos-->
        <div class="formu1 form16">
                <form action="" id="perifericoform" autocomplete="off">
                    <article class="serialperiferico">
                        <label for="serialperiferico">Id Periferico</label>
                        <input type="text" name="serialperiferico" id="serialperiferico" placeholder="inserte el Id Periferico" autocomplete="off" required>
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
                            <label for="EstadoDispositivo">estado Dispositivo</label>
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
                    <article>
                        <label for="pulgadas"> pulgadas</label>
                        <input type="number" name="pulgadas" id="pulgadas" placeholder="pulgadas del periferico">
                    </article>
                    <article class="caracteristicas">
                        <label for="caracteristicas">Caracteristicas del periferico</label>
                        <input type="text" name="caracteristicas" id="caracteristicas" placeholder="caracteristicas del periferico" autocomplete="off" required>
                    </article>
                    <input type="submit" value="Registrar">
                </form>
        </div> 

        <!--FOrmulario Computadores-Perisferico-->
        <div class="formu1 form17">
            <h2>Registro de Computadores Perisfericos </h2>

            <form id="formuCompuPeris" class="fommu" autocomplete="off">

                <select name="serialcompu" id="serialcompu" required>
                    <option value="">Serial Computador</option>
                    <?php
                        foreach (consultarEquipos($mysqli, "SELECT * from dispositivo_electronico") as $i) :  ?>
                        <option value="<?php echo $i['serial']?>"><?php echo $i['serial'] ." - ". $i['procesador']?></option>
                    <?php
                        endforeach;
                    ?>
                </select>

                <select name="id_periferico" id="id_periferico" required>
                    <option value="">Periferico</option>
                    <?php
                        foreach (consultarEquipos($mysqli, "SELECT * from periferico") as $i) :  ?>
                        <option value="<?php echo $i['id_periferico']?>"><?php echo $i['id_periferico'] ." - ". $i['descripcion']?></option>
                    <?php
                        endforeach;
                    ?>
                </select>
            </form>
            </div>
    </div>

    <script src="../js/equipos.js" type="module"></script>
</body>
</html>