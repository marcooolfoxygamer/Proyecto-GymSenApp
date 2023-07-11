<?php
    session_start();
    if ($_SESSION["user_crud"]!="1"){
        header("location: ../model/salir_users_crud.php");
    }
?>