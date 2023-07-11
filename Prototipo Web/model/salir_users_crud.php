<?php
    session_start();
    $_SESSION["user_crud"]="0";
    header("location: ../view/Administrador-Act-Users.php");
?>