<?php
    session_start();

    $id_registro_asist=$_GET['id'];
    $_SESSION["edicion_asis"]="1";
    header("location: ../view/Instructor-Act-Editar.php?id=$id_registro_asist");
?>