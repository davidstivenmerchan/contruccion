<?php
     require_once '../../../includes/conexion.php';
?>
<?php
     $consul= "SELECT * FROM tipo_documento";
     $query= mysqli_query($mysqli,$consul);
     $respu= mysqli_fetch_assoc($query); 

     $consul= "SELECT * FROM tipo_usuario";
     $query1= mysqli_query($mysqli,$consul);
     $respu= mysqli_fetch_assoc($query1); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="./pag_admin/css/usuarios.css">
    <link rel="stylesheet" href="../../css/mostrar_tablas.css">

</head>
<body>
    <section class="cards">
        <div class="card">
            <h3>Usuarios</h3>

            <div class="botones">
                <button class="aparecer formu1" data-form="form">VER TABLA</button>
                <button class="aparecer formu4" data-form="form3">REGISTRAR</button>
            </div>
        </div>
        <div class="card">
        <h3>Tipo de documento</h3>

            <div class="botones">
                <button class="aparecer fomu2" data-form="form1">VER TABLA</button>
                <button class="aparecer formu5" data-form="form4">REGISTRAR</button>
            </div>
        </div>
        <div class="card">
        <h3>Tipo de usuario</h3>

            <div class="botones">
                <button class="aparecer formu3" data-form="form2">VER TABLA</button>
                <button class="aparecer formu6" data-form="form5">REGISTRAR</button>
            </div>
        </div>
    </section>

    
    <div class="form">
    <table class="tablausu">
                <tr class="titulo">
                    <td>Documento</td>
                    <td>Tipo Documento</td>
                    <td>Tipo Usuario</td>
                    <td>Cod Carnet</td>
                    <td>Nombres</td>
                    <td>Apellidos</td>
                    <td>Fecha Nacimiento</td>
                    <td>Genero</td>
                    <td>Correo Personal</td>
                    <td>Correo SENA</td>
                    <td>Telefono</td>
                </tr>

                <?php
                    $sql="SELECT documento, nom_documento,nom_tipo_usuario,Cod_Carnet,Nombres,
                                Apellidos,fecha_nacimiento,nom_genero,correo_personal,correo_sena,telefono
                            FROM usuarios,tipo_documento,tipo_usuario,genero
                            WHERE usuarios.id_tipo_documento = tipo_documento.id_tipo_documento
                            AND usuarios.id_tipo_usuario = tipo_usuario.id_tipo_usuario
                            AND usuarios.id_genero = genero.id_genero";
                    $result=mysqli_query($mysqli,$sql);

                    while($mostrar=mysqli_fetch_array($result)){

                    
                ?>


                <tr class="datos">
                    <td><?php echo $mostrar['documento'] ?></td>
                    <td><?php echo $mostrar['nom_documento'] ?></td>
                    <td><?php echo $mostrar['nom_tipo_usuario'] ?></td>
                    <td><?php echo $mostrar['Cod_Carnet'] ?></td>
                    <td><?php echo $mostrar['Nombres'] ?></td>
                    <td><?php echo $mostrar['Apellidos'] ?></td>
                    <td><?php echo $mostrar['fecha_nacimiento'] ?></td>
                    <td><?php echo $mostrar['nom_genero'] ?></td>
                    <td><?php echo $mostrar['correo_personal'] ?></td>
                    <td><?php echo $mostrar['correo_sena'] ?></td>
                    <td><?php echo $mostrar['telefono'] ?></td>
                </tr>
                
                    <?php
                    }
                    ?>
            
        </table>
    
    </div>

 




    <div class="form1">

    <table class="tabla">
            <tr class="titulo">
                
                <td>Id Tipo Documento</td>
                <td>Nombre Tipo Documento</td>
            </tr>

            <?php
                $sql="SELECT * FROM tipo_documento";
                $result=mysqli_query($mysqli,$sql);

                while($mostrar=mysqli_fetch_array($result)){

                
            ?>


            <tr class="datos">
                <td><?php echo $mostrar['id_tipo_documento'] ?></td>
                <td><?php echo $mostrar['nom_documento'] ?></td>
            </tr>
            
                <?php
                }
                ?>
        
        </table>
    </div>


    <div class="form1 form2">

    <table class="tabla">
            <tr class="titulo">
                <td>Id Tipo Usuario</td>
                <td>Nombre Tipo Usuario</td>
            </tr>

            <?php
                $sql="SELECT * FROM tipo_usuario";
                $result=mysqli_query($mysqli,$sql);

                while($mostrar=mysqli_fetch_array($result)){

                
            ?>


            <tr class="datos">
                <td><?php echo $mostrar['id_tipo_usuario'] ?></td>
                <td><?php echo $mostrar['nom_tipo_usuario'] ?></td>
            </tr>
            
                <?php
                }
                ?>
        
        </table>

   

   
    </div>
    <div class="form form1 form2 form3">
    <p>Crear usuarios</p>
        <div class="linea"></div>
        <img src="../../assets/Group_45.jpg" alt="holi">
        <div class="wrapper">
            <form action="insertarusuarios.php" method="POST">
                <p>
                    <label for="doc">Documento</label>
                    <input type="number" name="doc">
                </p>
                <p>
                    <label for="tipo_doc">Tipo de Documento</label>
                    <select name="tip_doc" id="tip_doc" required>
                    <option value="">Seleccione el Tipo de Documento</option>
                    <?php
                        foreach ($query as $tipo_doc) :  ?>
                        <option value="<?php echo $tipo_doc['id_tipo_documento']?>"><?php echo $tipo_doc['nom_documento']?></option>
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
                        foreach ($query1 as $tipo_usu) :  ?>
                        <option value="<?php echo $tipo_usu['id_tipo_usuario']?>"><?php echo $tipo_usu['nom_tipo_usuario']?></option>
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
                    <input type="email" name="email_per" id="email per">
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
                    <input type="submit" value="Registrar" name="enviar1">
                  
                </p>
            </form>
        </div>
    </div>

    <div class="form form1 form2 form3 form4">
    <p type="title">Crear tipos de Documento</p>
    <div class="linea"></div>
    <form action="insertarusuarios.php" method="POST">
        <p>
        <label for="id">ID</label><br>
        <input type="number" name="id_doc" id="id_doc">
        </p>
        <p type="nom">
            <label for="nom">Nombre del Tipo de Documento</label><br>
            <input type="text" name="nom_doc" id="nom_doc">
        </p>
        <p>
        <input type="submit" value="Guardar" name="enviar2">
        </p>
    </form>


    </div>

    <div class="form form1 form2 form3 form4 form5">
    <p type="title">Crear tipos de Usuario</p>
    <div class="linea"></div>
    <form action="insertarusuarios.php" method="POST">
        <p>
        <label for="id">ID</label><br>
        <input type="number" name="id_usu" id="id_usu">
        </p>
        <p type="nom">
            <label for="nom">Nombre del Tipo de Usuario</label><br>
            <input type="text" name="nom_usu" id="nom_usu">
        </p>
        <p>
        <input type="submit" value="Guardar" name="enviar3">
           
        </p>
    </form>


    </div>




    
</body>
</html>