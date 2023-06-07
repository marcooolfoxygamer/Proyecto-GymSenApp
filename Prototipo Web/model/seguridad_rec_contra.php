<?php
    session_start();
    if ($_SESSION["rec_contrasena"]!="1"){
        header("location: ../model/salir.php");
    }
?>