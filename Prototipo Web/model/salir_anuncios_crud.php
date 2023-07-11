<?php
    session_start();
    $_SESSION["anuncios_crud"]="0";
    header("location: ../view/Administrador-Act-Anunc.php");
?>