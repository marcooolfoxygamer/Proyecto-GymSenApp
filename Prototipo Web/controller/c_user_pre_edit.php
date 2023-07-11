<?php
    session_start();
    
    $id_user=$_GET['id'];
    $_SESSION["user_crud"]="1";
    header("location: ../view/Administrador-Act-UsersEdit.php?id=$id_user");
?>