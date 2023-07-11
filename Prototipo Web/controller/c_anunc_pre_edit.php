<?php
    session_start();
    
    $id_anunc=$_GET['id'];
    $_SESSION["anuncios_crud"]="1";
    header("location: ../view/Administrador-Act-AnuncEdit.php?id=$id_anunc");
?>