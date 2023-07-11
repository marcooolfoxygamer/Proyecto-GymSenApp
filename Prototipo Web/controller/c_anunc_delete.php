<?php
    $id_anunc=$_GET['id'];

    
    include("../model/m_anuncios.php");
    $user= new usuario();
    $user->eliminar($id_anunc);
?>