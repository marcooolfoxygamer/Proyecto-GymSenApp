<?php

    if (isset($_POST["loggear"])){
        $correo=$_POST["correo"];
        $pass=md5($_POST["pass"]);
    
        include("../model/m_user.php");
        $user= new usuario();
        $validando=$user->validar_correo($correo,$pass);
    
        if ($validando == 0){
            echo "<script>alert('Los datos ingresados no se encuentran registrados dentro del sistema. Por favor, regístrese'); window.location='../view/Registro.php';</script>";
        }
        elseif($validando != 0){
            $user->loggear();
        }
    }
    else{
        header("location: ../view/Recuperacion_Contrasena.html");
    }
?>