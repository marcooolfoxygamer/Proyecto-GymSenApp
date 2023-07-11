<?php
    session_start();
    if ($_SESSION["admin"]!="1"){
        header("location: ../model/salir.php");
    }
?>