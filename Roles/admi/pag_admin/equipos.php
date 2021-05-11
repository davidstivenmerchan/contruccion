<?php
    require_once './../../../includes/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <script src="https://use.fontawesome.com/aa14b1055f.js"></script>
    <link rel="stylesheet" href="../../css/formularios2.css">
    <link rel="stylesheet" href="./pag_admin/css/equipos.css">
    <link rel="stylesheet" href="./../../css/tablas.css">
</head>
<body>

    <section class="cards">
        <div class="card">
            <h3>Crear tipo de dispositivos</h3>

            <div class="botones">
                <span><button class="aparecerequipos formula1" data-form="form"><i class="fa fa-file-alt" title="Mostrar Datos de Tipo de Dispositivo"></i></button></span>
                <span><button class="aparecerequipos formula6" data-form="formu5"><i class="fa fa-keyboard" title="Registrar datos de Tipo de Dispositivo"></i></button></span>
            </div>
        </div>
        <div class="card">
            <h3>Crear la marca de los equipos </h3>
              
            <div class="botones">
                <span><button class="aparecerequipos formula2" data-form="formu1"><i class="fa fa-file-alt" title="Mostrar Datos de Marca"></i></button></span>
                <span><button class="aparecerequipos formula7" data-form="formu6"><i class="fa fa-keyboard" title="Registrar datos de Marca"></i></button></span>
            </div>
        </div>
        <div class="card">
            <h3>Crear estado del dispositivo </h3>

            <div class="botones">
                <span><button class="aparecerequipos formula3" data-form="formu2"><i class="fa fa-file-alt" title="Mostrar Datos de Estado del Dispositivo"></i></button></span>
                <span><button class="aparecerequipos formula8" data-form="formu7"><i class="fa fa-keyboard" title="Registrar datos de Estado del Dispositivo"></i></button></span>
            </div>
        </div>
        <div class="card">
            <h3> Crear estado de aprobacion </h3>

            <div class="botones">
                <span><button class="aparecerequipos formula4" data-form="formu3"><i class="fa fa-file-alt" title="Mostrar Datos de Estado de Aprobacion"></i></button></span>
                <span><button class="aparecerequipos formula9" data-form="formu8"><i class="fa fa-keyboard" title="Registrar datos de Estado de Aprobacion"></i></button></span>
            </div>
        </div>
        <div class="card">
            <h3> crear estado de disponibilidad </h3>

            <div class="botones">
                <span><button class="aparecerequipos formula5" data-form="formu4"><i class="fa fa-file-alt" title="Mostrar Datos de Estado de Disponibilidad"></i></button></span>
                <span><button class="aparecerequipos formula10" data-form="formu9"><i class="fa fa-keyboard" title="Registrar datos de Estado de Disponibilidad"></i></button></span>
            </div>
        </div>
    </section>
    <div class="forms">
        <div class="form">
            <h2>tipo de dispositivos</h2>

            <table class="tabla">
                <tr class="titulo">
                    <td>Id Tipo Dispositivo</td>
                    <td>Nombre Tipo Dispositivo</td>
                    <td class="acciones"> Accciones </td>
                </tr>

                <?php
                    $sql="SELECT * FROM tipo_dispositivo";
                    $result=mysqli_query($mysqli,$sql);

                    while($mostrar=mysqli_fetch_array($result)){

                    
                ?>


                <tr class="datos">
                    <td><?php echo $mostrar['id_tipo_dispositivo'] ?></td>
                    <td><?php echo $mostrar['nom_tipo_dispositivo'] ?></td>
                    <td class="imgs">
                        <img src="./../../assets/edit-solid.svg" alt="editar" title="editar">
                        <img src="./../../assets/trash-solid.svg" alt="eliminar" title="eliminar">                     
                    </td>
                </tr>
                
                    <?php
                    }
                    ?>
            
            </table>
        </div>
        <div class="formu1_tablas">
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
                        <img src="./../../assets/edit-solid.svg" alt="editar" title="editar">
                        <img src="./../../assets/trash-solid.svg" alt="eliminar" title="eliminar">                     
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
                        <img src="./../../assets/edit-solid.svg" alt="editar" title="editar">
                        <img src="./../../assets/trash-solid.svg" alt="eliminar" title="eliminar">                     
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
                        <img src="./../../assets/edit-solid.svg" alt="editar" title="editar">
                        <img src="./../../assets/trash-solid.svg" alt="eliminar" title="eliminar">                     
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
                        <img src="./../../assets/edit-solid.svg" alt="editar" title="editar">
                        <img src="./../../assets/trash-solid.svg" alt="eliminar" title="eliminar">                     
                    </td>
                </tr>
                <?php
            } 
            ?>
            </table>
        </div>
        <div class="form1 formu5">
            <p type="title">Crear tipos de Dispositivos</p>
            <div class="linea"></div>
            <form action="">
                <p>
                <label for="id">ID</label><br>
                <input type="number" name="id_dis" id="id_dis">
                </p>
                <p type="nom">
                    <label for="nom">Nombre del Tipo de Dispositivo</label><br>
                    <input type="text" name="nom_dis" id="nom_dis">
                </p>
                <p>
                    <button>Guardar</button>
                </p>
            </form>
        </div>

        <div class="form1 formu6">
            <p type="title">Crear la Marca de los Equipos</p>
            <div class="linea"></div>
            <form action="">
                <p>
                    <label for="id">ID</label><br>
                    <input type="number" name="id_marca" id="id_marca">
                </p>
                <p type="nom">
                    <label for="nom">Nombre de la Marca</label><br>
                    <input type="text" name="nom_marca" id="nom_marca">
                </p>
                <p>
                    <button>Guardar</button>
                </p>
            </form>
        </div>

        <div class="form1 formu7">
            <p type="title">Crear Estado del Dispositivo</p>
            <div class="linea"></div>
            <form action="">
                <p>
                <label for="id">ID</label><br>
                <input type="number" name="id_estado" id="id_estado">
                </p>
                <p type="nom">
                    <label for="nom">Nombre del Estado del Dispositivo</label><br>
                    <input type="text" name="nom_estado" id="nom_estado">
                </p>
                <p>
                    <button>Guardar</button>
                </p>
            </form>
        </div>


        <div class="form1 formu8">
            <p type="title">Crear Estado de Aprobacion</p>
            <div class="linea"></div>
            <form action="">
                <p>
                <label for="id">ID</label><br>
                <input type="number" name="id_estado" id="id_estado">
                </p>
                <p type="nom">
                    <label for="nom">Nombre del Estado de Aprobacion</label><br>
                    <input type="text" name="nom_estado" id="nom_estado">
                </p>
                <p>
                    <button>Guardar</button>
                </p>
            </form>
        </div>

        <div class="form1 formu9">
            <p type="title">Crear Estado de Disponibilidad</p>
            <div class="linea"></div>
            <form action="">
                <p>
                <label for="id">ID</label><br>
                <input type="number" name="id_estado" id="id_estado">
                </p>
                <p type="nom">
                    <label for="nom">Nombre del Estado de Disponibilidad</label><br>
                    <input type="text" name="nom_estado" id="nom_estado">
                </p>
                <p>
                    <button>Guardar</button>
                </p>
            </form>
        </div>
    </div>

    <script src="../js/equipos.js" type="module"></script>
</body>
</html>