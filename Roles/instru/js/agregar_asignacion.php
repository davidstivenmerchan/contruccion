<script>
    const alertas =(texto) => {
	Swal.fire({
		title: 'En Hora Buena',
		html:`<p class="texto">${texto}</p>`,
		icon: 'success',
		confirmButtonText: 'Aceptar',
		footer: 'informacion extra',
		width:'40%',
		height:'100%',
		// padding:
		//background: '#ff6b00',
		customClass: {
		confirmButton: 'btn-success',
		container: 'texto',
		popup: 'cosas',
		icon: 'ico',
		image: 'image',
		content: 'texto',
		confirmButton: 'boton',
		cancelButton: 'popo',
		footer: 'popo',
		title: 'titul'
		},
		backdrop:true,
		// timer:
		// timerProgressBar:
		// toast:
		// position:
		// stopKeydownPropagation:
		// input:
		// inputPlaceholder:
		// inputValue:
		// inputOptions:
		// showConfirmButton:
		// confirmButtonAriaLabel:
		// showCancelButton:
		// cancelButtonText:
		// cancelButtonColor:
		// cancelButtonAriaLabel:
		buttonsStyling:false,
		// showCloseButton:
		// closeButtonAriaLabel:
		imageUrl:'assets/logo_sl.png',
		imageWidth: 80
		// imageHeight:
		// imageAlt:
	});
	
}

</script>

<?php

    
    require_once ('../../../includes/conexion.php');

    if(isset($_POST['enviar'])){
        $cedula = $_POST['cedula'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $docuinstru = $_POST['docuinstru'];

        $conu ="SELECT matricula.aprendiz, fichas.instructor 
        FROM matricula, fichas 
        WHERE fichas.ficha=matricula.ficha 
        AND fichas.instructor=$docuinstru 
        AND matricula.aprendiz=$cedula";
        $conueje = mysqli_query($mysqli, $conu);
        $mos = mysqli_fetch_array($conueje);
        if($mos){
            $aprendiz = $mos['aprendiz'];
        }
        if($aprendiz==''){
            echo "<script> alert('error el aprendiz no esta en su grupo');
            window.location= '../asignacion_equipos.php?var=$docuinstru';
            </script>";
        }else{
            $consultaaceptacion= "SELECT aceptacion_usuarios.documento, aceptacion_usuarios.id_estado_aprobacion 
            from aceptacion_usuarios where aceptacion_usuarios.id_estado_aprobacion=1 
            and aceptacion_usuarios.documento= $cedula ";
            $ejecutaraceptacion=mysqli_query($mysqli,$consultaaceptacion);
            $mostraraceptacion=mysqli_fetch_array($ejecutaraceptacion);
        if($mostraraceptacion){
            $documentoaceptado=$mostraraceptacion['documento'];
        }
        if($documentoaceptado==''){
            echo "<script> alert('error el aprendiz no esta aceptado');
            window.location= '../asignacion_equipos.php?var=$docuinstru';
            </script>";
        }else{
            $consulta = "INSERT INTO entrada_aprendiz(fecha, hora, documento) values('$fecha', '$hora', '$cedula')";
            $ejecutar = mysqli_query($mysqli, $consulta);
            $consulta2 = "SELECT MAX(entrada_aprendiz.id_entrada_aprendiz) from entrada_aprendiz";
            $ejecutar2 = mysqli_query($mysqli, $consulta2);
            $mostrar = mysqli_fetch_array($ejecutar2);
            if($mostrar){
                $id_entrada_aprendiz = $mostrar['MAX(entrada_aprendiz.id_entrada_aprendiz)'];
            }else{
                echo "fallo la consulta dos";
            }
            $consulta3 = "SELECT equipos.id_equipo, dispositivo_electronico.serial,
            dispositivo_electronico.id_estado_disponibilidad,
            dispositivo_electronico.id_estado_dispositivo from equipos, dispositivo_electronico
            WHERE dispositivo_electronico.serial = equipos.serial and 
            dispositivo_electronico.id_estado_disponibilidad = 1 and dispositivo_electronico.id_estado_dispositivo=1";
            $ejecutar3 = mysqli_query($mysqli, $consulta3);
            $mostrar3 = mysqli_fetch_array($ejecutar3);
            if($mostrar3){
                $id_equipo = $mostrar3['id_equipo'];
                $serial = $mostrar3['serial'];
            }else{
                echo "<script> alert('no hay dispositivos disponibles');
                window.location= '../asignacion_equipos.php?var=$docuinstru';
                </script>";
            } 
            $consulta4 = "INSERT INTO asignacion_equipos(id_entrada_aprendiz, id_equipo, hora_inicial) 
            values('$id_entrada_aprendiz','$id_equipo', '$hora')";
            $ejecutar4 = mysqli_query($mysqli,$consulta4);

            $consulta5 = "UPDATE dispositivo_electronico SET id_estado_disponibilidad = 2 where serial='$serial'";
            $ejecutar5 = mysqli_query($mysqli, $consulta5);

            echo "<script> alert('funciono bien la asignacion');
            window.location= '../asignacion_equipos.php?var=$docuinstru';
            </script>";


            /* '<script crs="../../../sweetalert/sweetalert.js" type="text/javascript">';
            echo 'alertas();';
            echo '</script>';  */
            }
        }
    }
?>

<script src="./../../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>