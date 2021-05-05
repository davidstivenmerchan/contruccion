<?php
   session_start();

    if(!isset($_SESSION['clave']) || !isset($_SESSION['cc']))
    {
       header("location: ../../index.html");
        exit;
   }
?>   