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
                <button class="aparecerequipos formula10" data-form="formu9"> <i class="aparecerequipos formula10 fa fa-keyboard" title="Registrar datos tipo dispositivo" data-form="formu9"></i> </button>
            </div>
        </div>
        <!--card tipo de periferico-->
        <div class="card">
            <h3>Tipo de Periferico</h3>

            <div class="botones">
                <button class="aparecerequipos formula2" data-form="formu1"> <i class="aparecerequipos formula2 fa fa-file-alt" title="Mostrar Datos de tipo Periferico" data-form="form1"></i> </button>
                <button class="aparecerequipos formula11" data-form="formu14"> <i class="aparecerequipos formula11 fa fa-keyboard" title="Registrar datos tipo Periferico" data-form="formu14"></i> </button>
            </div>
        </div>

        <!--Memoria RAM-->
        <div class="card">
            <h3>Memoria RAM</h3>

            <div class="botones">
                <button class="aparecerequipos formula3" data-form="formu2"> <i class="aparecerequipos formula3 fa fa-file-alt" title="Mostrar Datos de tipo dispositivo" data-form="formu2"></i>  </button>
                <button class="aparecerequipos formula12" data-form="formu10"> <i class="aparecerequipos formula12 fa fa-keyboard" title="Registrar datos tipo dispositivo" data-form="formu10"></i> </button>
            </div>
        </div>

        <!--Almacenamiento-->

        <div class="card">
            <h3>Almacenamiento</h3>

            <div class="botones">
                <button class="aparecerequipos formula4" data-form="formu3"> <i class="aparecerequipos formula4 fa fa-file-alt" title="Mostrar Datos Almacenamiento" data-form="formu3"></i>  </button>
                <button class="aparecerequipos formula13" data-form="formu11"> <i class="aparecerequipos formula13 fa fa-keyboard" title="Registrar datos Almacenamiento" data-form="formu11"></i> </button>
            </div>
        </div>

        <!--procesador-->
        <div class="card">
            <h3>Procesador</h3>

            <div class="botones">
                <button class="aparecerequipos formula5" data-form="formu4"> <i class="aparecerequipos formula5 fa fa-file-alt" title="Mostrar Datos Procesador" data-form="formu4"></i>  </button>
                <button class="aparecerequipos formula14" data-form="formu12"> <i class="aparecerequipos formula14 fa fa-keyboard" title="Registrar datos Procesador" data-form="formu12"></i> </button>
            </div>
        </div>

        <!--Sistema operativo -->

        <div class="card">
            <h3>Sistema operativo</h3>

            <div class="botones">
                <button class="aparecerequipos formula6" data-form="formu5"> <i class="aparecerequipos formula6 fa fa-file-alt" title="Mostrar Datos Sistema operativo" data-form="formu5"></i>  </button>
                <button class="aparecerequipos formula15" data-form="formu13"> <i class="aparecerequipos formula15 fa fa-keyboard" title="Registrar datos Sistema operativo" data-form="formu13"></i> </button>
            </div>
        </div>

        <!--card dispositivo electronico-->
        <div class="card">
            <h3>Dispositivos Electronicos</h3>

            <div class="botones">
                <button class="aparecerequipos formula7" data-form="formu6"> <i class="aparecerequipos formula7 fa fa-file-alt" title="Mostrar Datos de Dispositivos Electronicos" data-form="formu6"></i>  </button>
                <button class="aparecerequipos formula16" data-form="formu15"> <i class="aparecerequipos formula16 fa fa-keyboard" title="Registrar datos Dispositivos Electronicos" data-form="formu15"></i> </button>
            </div>
        </div>

        <!-- card periferico-->
        <div class="card">
            <h3>Crear periferico</h3>

            <div class="botones">
                <button class="aparecerequipos formula8" data-form="formu7"> <i class=" aparecerequipos formula8 fa fa-file-alt" title="Mostrar Datos periferico" data-form="formu7"></i>  </button>
                <button class="aparecerequipos formula17" data-form="formu16"> <i class="aparecerequipos formula17 fa fa-keyboard" title="Registrar datos periferico" data-form="formu16"></i> </button>
            </div>
        </div>
        <!-- compus peris -->
        <div class="card">
            <h3>Computadores - perifericos</h3>
        
            <div class="botones">
                <button class="aparecerequipos formula9" data-form="formu8"> <i class="aparecerequipos formula9 fa fa-file-alt" title="Mostrar Datos Computadores - perifericos" data-form="formu8"></i></button>
                <button class="aparecerequipos formula18" data-form="formu17"> <i class="aparecerequipos formula18 fa fa-keyboard" title="Registrar dato Computadores - perifericos" data-form="formu17"></i> </button>
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
                    <td>Nom Tipo Periferico</td>
                    <td class="acciones"> Accciones </td>
                </tr>
                <?php 
            $con = "SELECT * from tip_periferico";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr class="datos">
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
        <div class="formu2 tablas">
        <h2>Memoria Ram (GB)</h2>
            <table class="tablamarca" border=1 cellspacing="0">
                <tr class="header">
                    <td>Memoria Ram</td>
                    <td class="acciones"> Accciones </td>
                </tr>
                <?php 
            $con = "SELECT * from ram";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr class="datos">
                    <td><?php echo $eh['tamaño_ram']?></td>
                    <td class="imgs">
                        <img src="./../../assets/edit-solid.svg" alt="editar" title="editar" class="edit ramGB" data-ramGB="<?php echo $eh['ramGB']; ?>">
                        <img src="./../../assets/trash-solid.svg" alt="eliminar" title="eliminar" class="remove ramGB" data-ramGB="<?php echo $eh['ramGB']; ?>">                     
                    </td>
                </tr>
                <?php
            } 
            ?>
            </table>
        </div>

        <!--alamacenamiento -->

        <div class="formu3 tablas">
        <h2>Almacenamiento</h2>
            <table class="tablamarca" border=1 cellspacing="0">
                <tr class="header">
                    <td>Almacenamiento</td>
                    <td class="acciones"> Accciones </td>
                </tr>
                <?php 
            $con = "SELECT * from almacenamiento";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr class="datos">
                    <td><?php echo $eh['tamaño_almacena']?></td>
                    <td class="imgs">
                        <img src="./../../assets/edit-solid.svg" alt="editar" title="editar" class="edit almacenamiento" data-almacenamiento="<?php echo $eh['id_almacena']; ?>">
                        <img src="./../../assets/trash-solid.svg" alt="eliminar" title="eliminar" class="remove almacenamiento" data-almacenamiento="<?php echo $eh['id_almacena']; ?>">                     
                    </td>
                </tr>
                <?php
            } 
            ?>
            </table>
        </div>
        
        <!--Procesador-->
        <div class="formu4 tablas">
        <h2>Procesador</h2>
            <table class="tablamarca" border=1 cellspacing="0">
                <tr class="header">
                    <td>Procesador</td>
                    <td class="acciones"> Accciones </td>
                </tr>
                <?php 
            $con = "SELECT * from procesadores";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr class="datos">
                    <td><?php echo $eh['nom_procesador']?></td>
                    <td class="imgs">
                        <img src="./../../assets/edit-solid.svg" alt="editar" title="editar" class="edit Procesador" data-Procesador="<?php echo $eh['id_procesador']; ?>">
                        <img src="./../../assets/trash-solid.svg" alt="eliminar" title="eliminar" class="remove Procesador" data-Procesador="<?php echo $eh['id_procesador']; ?>">                     
                    </td>
                </tr>
                <?php
            } 
            ?>
            </table>
        </div>

        <!--Sistema operativo-->

        <div class="formu5 tablas">
        <h2>Sistema operativo</h2>
            <table class="tablamarca" border=1 cellspacing="0">
                <tr class="header">
                    <td>Sistema operativo</td>
                    <td class="acciones"> Accciones </td>
                </tr>
                <?php 
            $con = "SELECT * from tipo_sistema";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr class="datos">
                    <td><?php echo $eh['nom_tipo_sistema']?></td>
                    <td class="imgs">
                        <img src="./../../assets/edit-solid.svg" alt="editar" title="editar" class="edit Sistem_opera" data-Sistem_opera="<?php echo $eh['id_tipo_sistema']; ?>">
                        <img src="./../../assets/trash-solid.svg" alt="eliminar" title="eliminar" class="remove Sistem_opera" data-Sistem_opera="<?php echo $eh['id_tipo_sistema']; ?>">                     
                    </td>
                </tr>
                <?php
            } 
            ?>
            </table>
        </div>

        <!-- Tabla dispositivo electronico -->

        <div class="formu6 tablas">
            
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
                    <td class="acciones">Acciones</td>
                </tr>
                <?php 
            $con = "SELECT serial,placa_sena,tipo_dispositivo.nom_tipo_dispositivo,procesadores.nom_procesador ,ram.tamaño_ram,tipo_sistema.nom_tipo_sistema,
                    estado_disponibilidad.nom_estado_disponibilidad,estado_dispositivo.nom_estado_dispositivo,marca.nom_marca,almacenamiento.tamaño_almacena
                    FROM  dispositivo_electronico,tipo_dispositivo,tipo_sistema,estado_disponibilidad,estado_dispositivo,marca,procesadores,ram,almacenamiento
                    WHERE dispositivo_electronico.id_tipo_dispositivo = tipo_dispositivo.id_tipo_dispositivo
                    AND dispositivo_electronico.id_tipo_sistema = tipo_sistema.id_tipo_sistema
                    AND dispositivo_electronico.id_estado_disponibilidad = estado_disponibilidad.id_estado_disponibilidad
                    AND dispositivo_electronico.id_estado_dispositivo = estado_dispositivo.id_estado_dispositivo
                    AND dispositivo_electronico.id_marca = marca.id_marca
                    AND dispositivo_electronico.id_procesador = procesadores.id_procesador
                    AND dispositivo_electronico.ramGB = ram.ramGB
                    AND dispositivo_electronico.id_tipo_sistema = tipo_sistema.id_tipo_sistema
                    AND dispositivo_electronico.id_almacena = almacenamiento.id_almacena";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr class="datos">
                    <td><?php echo $eh['serial']?></td>
                    <td><?php echo $eh['placa_sena']?></td>
                    <td><?php echo $eh['nom_tipo_dispositivo']?></td>
                    <td><?php echo $eh['nom_procesador']?></td>
                    <td><?php echo $eh['tamaño_ram']?></td>
                    <td><?php echo $eh['nom_tipo_sistema']?></td>
                    <td><?php echo $eh['nom_estado_disponibilidad']?></td>
                    <td><?php echo $eh['nom_estado_dispositivo']?></td>
                    <td><?php echo $eh['nom_marca']?></td>
                    <td><?php echo $eh['tamaño_almacena']?></td>
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
        <div class="formu7 tablas">
            <h2>Perifericos</h2>
            <table>
                <tr class="header">
                    <td>Tipo periferico</td>
                    <td>Marca Periferico</td>
                    <td>Estado Disponibilidad</td>
                    <td>Estado dispositivo</td>
                    <td>Pulgadas</td>
                    <td>Descripcion</td>
                    <td>Acciones</td>
                </tr>
                <?php
                    $sql = "SELECT tip_periferico.nom_tip_periferico,marca.nom_marca,estado_disponibilidad.nom_estado_disponibilidad,estado_dispositivo.nom_estado_dispositivo,pulgadas,descripcion
                            FROM periferico,tip_periferico,marca,estado_disponibilidad,estado_dispositivo
                            WHERE periferico.id_tip_periferico = tip_periferico.id_tip_periferico
                            AND periferico.id_marca = marca.id_marca
                            AND periferico.estado_disponibilidad = estado_disponibilidad.id_estado_disponibilidad
                            AND periferico.estado_dispositivo = estado_dispositivo.id_estado_dispositivo";
                    $res = mysqli_query($mysqli, $sql);
                    while($eh = mysqli_fetch_array($res)){
                ?>
                    <tr class="datos">
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
        <div class="formu8 tablas">
            <table>
                <tr class="header">
                    <td>Serial</td>
                    <td>Periferico</td>
                    <td>Descripcion Perisferico</td>
                    <td>Fecha Creacion</td>
                    <td>Acciones</td>
                </tr>
                <?php
                    $sql = "SELECT serial, periferico.id_periferico ,periferico.descripcion,fecha_compu_peris 
                            FROM compu_peris,periferico 
                            WHERE compu_peris.id_periferico = periferico.id_periferico";
                    $res = mysqli_query($mysqli, $sql);
                    while($eh = mysqli_fetch_array($res)){
                ?>
                    <tr class="datos">
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
        <div class="form1 formu9">
            <p type="title">Crear tipos de Dispositivos</p>
            <div class="linea"></div>
            <form id="tipoDispo" class="formulario" autocomplete="off">
    
                <label for="nom">Nombre del Tipo de Dispositivo</label><br>
                <input type="text" name="nom_dis" id="nom_dis" pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" required title="Solo se permiten letras" maxlength="20">

                <input type="submit" value="Guardar">
            </form>  
        </div>

        <!--formulario de MEMORIA RAM-->

        <div class="form1 formu10">
            <h2>Crear Tipo de memoria Ram</h2>
            <div class="linea"></div>
            <form id="memoria_ram" class="formulario" autocomplete="off">
                <label for="memoriaram">Nombre de memoria Ram</label>
                <input type="text" name="memoriaRam" id="memoriaRam" pattern="^[a-zA-Z0-9-\s]+$" required title="Solo se permiten letras y numeros" maxlength="10">
                <input type="submit" value="GUARDAR">
            </form>
        </div>

        <!--Formulario de Almacenamiento-->

        <div class="form1 formu11">
            <h2>Crear Tipo de Almacenamiento</h2>
            <div class="linea"></div>
            <form class="formulario" id="almacenamientoform" autocomplete="off">
                <label for="tama_almace">Nombre Del Tipo de almacenamiento</label>
                <input type="text" name="tama_almace" id="tama_almace"  pattern="^[a-zA-Z0-9-\s]+$" required title="Solo se permiten letras y numeros" maxlength="10">
                <input type="submit" value="GUARDAR">
            </form>
        </div>

        <!--procesador-->
        <div class="form1 formu12">
            <h2>Procesador</h2>
            <div class="linea"></div>
            <form  class="formulario" id="procesadorform" autocomplete="off">
                <label for="procesador">Nombre del tipo de procesador</label>
                <input type="text" name="procesador" id="procesador"  pattern="^[a-zA-Z0-9-(-)-+-\s]+$" required title="Solo se permiten letras y numeros" maxlength="30">
                <input type="submit" value="GUARDAR">
            </form>
        </div>

        <!--Sistema operativo-->

        <div class="form1 formu13">
            <h2>Sistema operativo</h2>
            <div class="linea"></div>
            <form class="formulario" id="sistemaoperativo_form" autocomplete="off">
                <label for="sistema_op">Sistema Operativo</label>
                <input type="text" name="sistema_op" id="sistema_op"  pattern="^[a-zA-Z\s]+$" required title="Solo se permiten letras y numeros" maxlength="20">
                <input type="submit" value="GUARDAR">
            </form>
        </div>

        <!--formulario de tipo de periferico-->
        
        <div class="form1 formu14">
            <p type="title">Crear Tipo de periferico</p>
            <div class="linea"></div>
            <form class="formulario" id="tipPeriferico" autocomplete="off">
                <label for="nom">Nombre del tipo de Periferico</label><br>
                <input type="text" name="nameTipPeriferico" id="nom_estado" pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" required  title="Solo se permiten letras">
                <input type="submit" value="Guardar">
            </form>
        </div>
        
        <!-- Formulario de tipo Dispositivo electronico-->
        <div class="form1 formu15">
            <h2>Registro de Dispositivos Electronicos </h2>

            <form id="formuDispositivo"class="fommu" autocomplete="off">
                
                
                
                <input type="text" name="serial" id="serial" placeholder="Serial" pattern="^[a-zA-Z0-9-\s]+$" required title="Solo se permiten letras y numeros" maxlength="10">

                
                <input type="text" name="placa_sena" id="placa_sena" autocomplete="off" placeholder="Placa Sena" pattern="^[a-zA-Z0-9-\s]+$" required title="Solo se permiten letras y numeros" maxlength="8">

                
                <select name="Procesador" id="procesador" class="procesador" required>
                    <option> Elige una opcion de procesador</option>
                    <?php foreach(consultarEquipos($mysqli,"SELECT * from procesadores" ) as $p) : ?>
                        <option value="<?php echo $p['id_procesador']; ?>"> <?php echo $p['nom_procesador']; ?> </option>
                    <?php endforeach; ?>
                </select>
            
                
                
                <select name="RamGB" id="RamGB" class="RamGB" required>
                    <option>Eligue una opcion de memoria RAM</option>
                    <?php foreach(consultarEquipos($mysqli, "SELECT * from ram") as $r): ?>
                        <option value="<?php echo $r['ramGB']; ?>"> <?php echo $r['tamaño_ram']; ?> </option>
                    <?php endforeach; ?>
                </select>
                <!-- selectores  -->
            
            <select name="id_tipo_siste" id="id_tipo_siste" required>
            <option value="">seleccione el Tipo de Sistema</option>
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

            <select name="Almacenamiento" id="Almacenamiento" class="Almacenamiento">
                <option>Seleccione una opcion de almacenamiento</option>
                <?php foreach(consultarEquipos($mysqli, "SELECT * from almacenamiento") as $a) : ?>
                    <option value="<?php echo $a['id_almacena']; ?>"> <?php echo $a['tamaño_almacena']; ?></option>
                <?php endforeach; ?>
            </select>
            

            

            <input type="submit" value="REGISTRAR" name="registrar" class="resgi">
            </form>
        </div>

        <!--formulario Perifericos-->
        <div class="form1 formu16">
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
        <div class="form1 formu17">
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