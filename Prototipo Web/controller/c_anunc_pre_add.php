<?php
    session_start();
    $_SESSION["anuncios_crud"]="1";
    header("location: ../view/Administrador-Act-AnuncAdd.php");
?>