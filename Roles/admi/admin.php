<?php

require_once("../../includes/validacion.php");
require_once './../../includes/conexion.php';
$documento = $_SESSION['cc'];
$user = [];
$sql = "SELECT nombres from usuarios where documento= ?";
$query = mysqli_prepare($mysqli, $sql);
$ok = mysqli_stmt_bind_param($query, 'i', $documento);
$ok = mysqli_stmt_execute($query);
$ok = mysqli_stmt_bind_result($query, $nombres);
while(mysqli_stmt_fetch($query)){
    array_push($user, ['nombres' => $nombres]);
}
?>

<?php

require_once("../../includes/validacion.php");
require_once './../../includes/conexion.php';
$documento = $_SESSION['cc'];
$rol = [];
$sql = "SELECT nom_tipo_usuario from tipo_usuario,usuarios where documento= ? AND usuarios.id_tipo_usuario = tipo_usuario.id_tipo_usuario";
$query = mysqli_prepare($mysqli, $sql);
$ok = mysqli_stmt_bind_param($query, 'i', $documento);
$ok = mysqli_stmt_execute($query);
$ok = mysqli_stmt_bind_result($query, $tipo_usu);
while(mysqli_stmt_fetch($query)){
    array_push($rol, ['nom_tipo_usuario' => $tipo_usu]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="sweetalert2.all.min.js"></script>
    Optional: include a polyfill for ES6 Promises for IE11
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script> -->
    <title>Admin</title>
    <link rel="stylesheet" href="./../../css/admin.css">
</head>
<body>
    <div class="container">
        <?php require './banner.php'; ?>
        <div class="alert" id="alert">
        </div>
        <div class="topbar">
            <div class="toggle" onclick="toggleMenu();"></div>
            <div class="search">
                <label>
                    <input type="text" placeholder="searh">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </label>
                
            </div>
            <div class="user">
                <?php echo $user[0]['nombres']; ?>
                <br>
                <?php echo $rol[0]['nom_tipo_usuario']; ?>
                <img  src="../../assets/senaf.jpg" height="70px" alt="">
            </div>
        </div>
        <main> 
        </main>
    </div>
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
    <script src="./../js/admin.js" type="module"></script>
    <script src="./../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</body>
</html>