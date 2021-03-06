<?php
     require_once '../../../includes/conexion.php';
?>
<?php

    function consultar($consulta, $mysqli):mysqli_result
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
    <title>Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/aa14b1055f.js"></script>
    <link rel="stylesheet" href="../../css/mostrar_tablas.css">
    <link rel="stylesheet" href="./pag_admin/css/usuarios.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
</head>
<body>
    <section class="cards">
        <div class="card">
            <h3>Usuarios</h3>

            <div class="botones">
                <button class="aparecer formu1" data-form="form"><i class="aparecer formu1 fa fa-file-alt"  title="Mostrar Datos de Usuarios" data-form="form" ></i></button>
                <button class="aparecer formu4" data-form="form3"><i class="aparecer formu4 fa fa-keyboard"   title="Registrar datos de Usuarios" data-form="form3"></i></button>
            </div>
        </div>
        <div class="card">
        <h3>Tipo de documento</h3>

            <div class="botones">
                <span><button class="aparecer fomu2" data-form="form1"><i class="aparecer fomu2 fa fa-file-alt" data-form="form1" title="Mostrar Datos de tipo documento"></i></button></span>
                <span><button class="aparecer formu5" data-form="form4"><i class="aparecer formu5 fa fa-keyboard" data-form="form4" title="Registrar datos de tipo documento"></i></button></span>
            </div>
        </div>
        <div class="card">
        <h3>Tipo de usuario</h3>

            <div class="botones">
                <span><button class="aparecer formu3" data-form="form2"><i class="aparecer formu3 fa fa-file-alt" data-form="form2" title="Mostrar Datos de tipo usuario"></i></button></span>
                <span><button class="aparecer formu6" data-form="form5"><i class="aparecer formu6 fa fa-keyboard" data-form="form5" title="Registrar datos de tipo usuario"></i></button></span>
            </div>
        </div>
    </section>




    
    <div class="form tablas">
  

    <nav class="secciones_usuario">
        <ul class="seccUsua">
            <li class="aprentabla">Aprendices</li>
            <li class="instructorestabla">Instructores</li>
        </ul>
    </nav>

    
    <div id="tablainstru" class="tablainstru">
        <article class="search">
            <input type="number" name="search" id="searchinstru" class="searchinput" placeholder="Busca un instructor por su documento" autocomplete="off">
        </article>
        <table class="tablainstructor" >
            <tr class="titulo">
                <td>Documento</td>
                <td>Tipo Documento</td>
                <td>Cod Carnet</td>
                <td>Nombres</td>
                <td>Apellidos</td>
                <td>Fecha Nacimiento</td>
                <td>Genero</td>
                <td>Correo SENA</td>
                <td>Telefono</td>
                <td class="acciones">Acciones</td>
            </tr>

                    <?php
                        $sql="SELECT documento, nom_documento,nom_tipo_usuario,Cod_Carnet,Nombres,
                                Apellidos,fecha_nacimiento,nom_genero,correo_personal,correo_sena,telefono
                                FROM usuarios,tipo_documento,tipo_usuario,genero
                                WHERE usuarios.id_tipo_documento = tipo_documento.id_tipo_documento
                                AND usuarios.id_tipo_usuario = tipo_usuario.id_tipo_usuario
                                AND usuarios.id_genero = genero.id_genero
                                AND tipo_usuario.id_tipo_usuario = 3";
                                
                        $result=mysqli_query($mysqli,$sql);

                        while($mostrar=mysqli_fetch_array($result)){

                        
                    ?>


                    <tr class="datos" data-documento="<?php echo $mostrar['documento'];?> ">
                        <td><?php echo $mostrar['documento'] ?></td>
                        <td><?php echo $mostrar['nom_documento'] ?></td>
                        <td><?php echo $mostrar['Cod_Carnet'] ?></td>
                        <td><?php echo $mostrar['Nombres'] ?></td>
                        <td><?php echo $mostrar['Apellidos'] ?></td>
                        <td><?php echo $mostrar['fecha_nacimiento'] ?></td>
                        <td><?php echo $mostrar['nom_genero'] ?></td>
                        <td><?php echo $mostrar['correo_sena'] ?></td>
                        <td><?php echo $mostrar['telefono'] ?></td>
                        <td class="imgs">
                            <img src="./../../assets/edit-solid.svg" alt="editar" title="editar" class="edit usuario"  data-usuario="<?php echo $mostrar['documento']; ?>">
                            <img src="./../../assets/trash-solid.svg" alt="eliminar" title="eliminar" class="remove usuario"  data-usuario="<?php echo $mostrar['documento']; ?>">               
                        </td>
                    </tr>
                    
                        <?php
                        }
                        ?>
        </table>
    </div>

    <div class="tablausu" id="tablausu">
        <article class="search">
            <input type="number" name="search" id="searchapren" class="searchinput" placeholder="Busca un aprendiz" autocomplete="off">
        </article>
        <table class="tablaaprendiz">    
                <tr class="titulo">
                    <td>Documento</td>
                    <td>Tipo Documento</td>
                    <td>Cod Carnet</td>
                    <td>Nombres</td>
                    <td>Apellidos</td>
                    <td>Fecha Nacimiento</td>
                    <td>Genero</td>
                    <td>Correo SENA</td>
                    <td>Telefono</td>
                    <td class="acciones">Acciones</td>
                </tr>

                <?php
                    $sql="SELECT documento, nom_documento,nom_tipo_usuario,Cod_Carnet,Nombres,
                            Apellidos,fecha_nacimiento,nom_genero,correo_personal,correo_sena,telefono
                            FROM usuarios,tipo_documento,tipo_usuario,genero
                            WHERE usuarios.id_tipo_documento = tipo_documento.id_tipo_documento
                            AND usuarios.id_tipo_usuario = tipo_usuario.id_tipo_usuario
                            AND usuarios.id_genero = genero.id_genero
                            AND tipo_usuario.id_tipo_usuario = 2";
                            
                    $result=mysqli_query($mysqli,$sql);

                    while($mostrar=mysqli_fetch_array($result)){

                    
                ?>


                <tr class="datos" data-documento="<?php echo $mostrar['documento'];?> ">
                    <td><?php echo $mostrar['documento'] ?></td>
                    <td><?php echo $mostrar['nom_documento'] ?></td>
                    <td><?php echo $mostrar['Cod_Carnet'] ?></td>
                    <td><?php echo $mostrar['Nombres'] ?></td>
                    <td><?php echo $mostrar['Apellidos'] ?></td>
                    <td><?php echo $mostrar['fecha_nacimiento'] ?></td>
                    <td><?php echo $mostrar['nom_genero'] ?></td>
                    <td><?php echo $mostrar['correo_sena'] ?></td>
                    <td><?php echo $mostrar['telefono'] ?></td>
                    <td class="imgs">
                        <img src="./../../assets/edit-solid.svg" alt="editar" title="editar" class="edit usuario"  data-usuario="<?php echo $mostrar['documento']; ?>">
                        <img src="./../../assets/trash-solid.svg" alt="eliminar" title="eliminar" class="remove usuario"  data-usuario="<?php echo $mostrar['documento']; ?>">               
                    </td>
                </tr>
                
                    <?php
                    }
                    ?>
            
        </table>
    </div>
    </div>

    <div class="form1">

        <table class="tabla">
            <tr class="titulo">
                <td>Nombre Tipo Documento</td>
                <td>Acciones</td>
            </tr>

            <?php
                $sql="SELECT * FROM tipo_documento";
                $result=mysqli_query($mysqli,$sql);

                while($mostrar=mysqli_fetch_array($result)){
            
            ?>


            <tr class="datos">
                <td><?php echo $mostrar['nom_documento'] ?></td>
                <td class="imgss">
                    <img src="./../../assets/edit-solid.svg" alt="editar" title="editar" class="edit tipoDocu" data-tipoDocu="<?php echo $mostrar['id_tipo_documento']; ?>">
                    <img src="./../../assets/trash-solid.svg" alt="eliminar" title="eliminar" class="remove tipoDocu" data-tipoDocu="<?php echo $mostrar['id_tipo_documento']; ?>">              
                </td>
            </tr>
            
                <?php
                }
                ?>
        
        </table>
    </div>

    <div class="form2">

    <table class="tabla">
            <tr class="titulo">
                <td>Nombre Tipo Usuario</td>
                <td>Acciones</td>
            </tr>

            <?php
                $sql="SELECT * FROM tipo_usuario";
                $result=mysqli_query($mysqli,$sql);

                while($mostrar=mysqli_fetch_array($result)){

                
            ?>

            <tr class="datos">
                <td><?php echo $mostrar['nom_tipo_usuario'] ?></>
                <td class="imgss">
                    <img src="./../../assets/edit-solid.svg" alt="editar" title="editar" class="edit tipoUsu" data-tipoUsu="<?php echo $mostrar['id_tipo_usuario']; ?>">
                    <img src="./../../assets/trash-solid.svg" alt="eliminar" title="eliminar" class="remove tipoUsu" data-tipoUsu="<?php echo $mostrar['id_tipo_usuario']; ?>">               
                </td>
            </tr>
            
                <?php
                }
                ?>
        
        </table>

    </div>
    <div class="form3">
    <h2>Crear usuarios</h2>
        <div class="linea"></div>
    
            <form class="crearusuario" action="insertarusuarios.php" id="crearusuario" autocomplete="off">
                    <div class="doc">
                        <label for="doc">Documento</label>
<<<<<<< HEAD
                        <input type="number" name="doc" min="6"  title="Solo se minimo 6 y maximo 10" required>
=======
                        <input type="number" name="cc" id="cc" required  title="Solo se permiten numeros" maxlenght="10" minlenght="6">
>>>>>>> 02d364996072d9d9946e7405dd0a822a8b462054
                    </div>
                    <div class="tip_doc">
                    <label for="tipo_doc">Tipo de Documento</label>
                        <select name="tip_doc" id="tip_doc" required>
                            <option value="">Seleccione el Tipo de Documento</option>
                            <?php
                                foreach (consultar("SELECT * FROM tipo_documento", $mysqli) as $tipo_doc) :  ?>
                                <option value="<?php echo $tipo_doc['id_tipo_documento']?>"><?php echo $tipo_doc['nom_documento']?></option>
                            <?php
                                endforeach;
                            ?>
                        </select>
                    </div>

                    <div class="tip_usua">
                    <label for="tipo_usu">Tipo de Usuario</label>
                        <select name="tip_usu" id="tip_usu" required>
                            <option value="">Seleccione el Tipo de Usuario</option>
                            <?php
                                foreach (consultar("SELECT * FROM tipo_usuario", $mysqli) as $tipo_usu) :  ?>
                                <option value="<?php echo $tipo_usu['id_tipo_usuario']?>"><?php echo $tipo_usu['nom_tipo_usuario']?></option>
                            <?php
                                endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="cod_carnet">
                        <label for="codigo">Codigo del Carnet</label>
                        <input type="number" name="cod_carnet" id="cod_carnet" autocomplete="off" required>
                    </div>
                    <div class="nombre">
                        <label for="nom">Nombre</label>
                        <input type="text" name="nom" id="nom" autocomplete="off" pattern="^[A-Za-z????????????????????????????\s]+$" required  title="Solo se permiten letras" maxlength="30">
                    </div>
                    <div class="apellido">
                        <label for="ape">Apellido</label>
                        <input type="text" name="ape" id="ape" autocomplete="off" pattern="^[A-Za-z????????????????????????????\s]+$" required  title="Solo se permiten letras" maxlenght="30">
                    </div>
                    <div class="fecha_nacimiento">
                        <label for="fecha">Fecha de Nacimiento</label>
                        <input type="date" name="fecha" id="fecha" autocomplete="off" required>
                    </div>
                    <div class="genero">
                    <label for="genero">Genero</label>
                        <select name="genero" id="genero" required>
                            <option value="">Selecciona el genero</option>
                            <?php
                                foreach(consultar("SELECT * FROM genero", $mysqli) as $genero) :
                            ?>
                            <option value="<?php echo $genero["id_genero"]?>"> <?php echo $genero["nom_genero"] ?> </option>
                            <?php endforeach; ?>       
                        </select>
                    </div>
                    <div class="telefono">
                        <label for="telefono">Telefono</label> 
                        <input type="number" name="tell" id="tell" autocomplete="off" required maxlength="10" minlength="2">
                    </div>
                    <div class="emailPersonal">
                        <label for="email_per">E-mail Personal</label> 
                        <input type="email" name="correo_p" id="correo_p" autocomplete="off" required>
                    </div>
                    <div class="emailsena">
                        <label for="email_sena">E-mail Sena</label>
                        <input type="email" name="correo_s" id="correo_s" autocomplete="off" required >
                    </div>
                    <div class="password">
                        <label for="clave">Contrase??a</label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>
                    <input type="submit" value="Registrar" name="enviar1">
            </form>
    </div>

    <div class="form4">
    <p type="title">Crear tipos de Documento</p>
    <div class="linea"></div>
    <form class="formulario"  id="creartipodocu" autocomplete="off"> <!-- action="insertarusuarios.php" method-->
            <label for="nom">Nombre del Tipo de Documento</label><br>
            <input type="text" name="nom_doc" id="nom_doc" required="" onkeypress="return sololestras(event)">
            <input type="submit" value="Guardar" name="enviar2">
        
    </form>
    </div>
    

    <div class="form5">
    <p type="title">Crear tipos de Usuario</p>
    <div class="linea"></div>
    <form class="formulario" id="creartipusu" autocomplete="off"> <!-- action="insertarusuarios.php" method="POST" -->
            <label for="nom">Nombre del Tipo de Usuario</label><br>
            <input type="text" name="nom_usu" id="nom_usu" required="">
            <input type="submit" value="Guardar" name="enviar3">    
    </form>
    </div>



    <!--muevo scripts aca todo por motivos de carga-->
    <script src="../../js/validarusuarios.js"></script>
    <script src="https://use.fontawesome.com/aa14b1055f.js"></script>
    <script src="../../js/confirmacioneliminar.js"></script>
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>
</body>


</html>