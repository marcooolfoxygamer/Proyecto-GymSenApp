<?php
    $id_registro_asis=$_GET['id'];

    
    include("../model/m_asistencia.php");
    $user= new usuario();
    $user->eliminar($id_registro_asis);
?>