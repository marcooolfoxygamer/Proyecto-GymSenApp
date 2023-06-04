<?php
    session_start();
    if ($_SESSION["aprendiz"]!="1"){
        header("location: ../model/salir.php");
    }
?>