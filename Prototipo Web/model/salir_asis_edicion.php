<?php
    session_start();
    $_SESSION["edicion_asis"]="0";
    header("location: ../view/Instructor-Act-ListaAsistencia.php");
?>