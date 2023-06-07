<?php
    class usuario{
        function registrar_rutina($selector_musculos,$id){
            include("conexion.php");

            $sql="INSERT INTO planificador values(NULL,$id,'$selector_musculos')";
            mysqli_query($conexion,$sql);
        }
    }
?>