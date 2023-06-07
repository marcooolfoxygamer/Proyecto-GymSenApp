<?php
    session_start();
    if ($_SESSION["instructor"]!="1"){
        header("location: ../model/salir.php");
    }
?>