<?php 
  

    session_start();
    if(isset($_COOKIE['session_name()'])){
        setcookie(session_name(), "",time()-3600,"/");
    }
        unset($_SESSION['cc']);
        unset($_SESSION['clave']);
        
        $_SESSION = array();
        session_destroy();
        session_write_close();
        header("location: ../index.html");


    
?>
