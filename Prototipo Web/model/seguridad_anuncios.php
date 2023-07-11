<?php
    session_start();
    if ($_SESSION["anuncios_crud"]!="1"){
        header("location: ../model/salir_anuncios_crud.php");
    }
?>