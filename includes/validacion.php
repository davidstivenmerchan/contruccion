<?php
   session_start();

    if(!isset($_SESSION['cc']) || !isset($_SESSION['clave']))
    {
       header("location: ../index.php");
        exit;
   }
?>   