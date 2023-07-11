<?php
    session_start();
    if ($_SESSION["edicion_asis"]!="1"){
        header("location: ../model/salir_asis_edicion.php");
    }
?>