<?php
    session_start();
    $_SESSION["rec_contrasena"]="0";
    $_SESSION["id_recup"]="0";
    $_SESSION["id"]="0";
    $_SESSION["aprendiz"]="0";
    $_SESSION["instructor"]="0";
    header("location: ../view/index.html");
?>