<?php
    $hostname="localhost";
    $userName="root";
    $password= "";
    $database="bd_construccion";
    $mysqli = new mysqli($hostname,$userName,$password,$database);
    if($mysqli ->connect_errno)
    {
        die("fallo la conexion con la base de datos $database" . mysqli_connect_errno());
    }
    session_start();
?>