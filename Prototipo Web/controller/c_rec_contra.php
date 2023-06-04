<?php
    session_start();
?>
<?php

    if (isset($_POST["recuperar_contra"])){
        $identificacion=$_POST["identificacion"];
        $correo=$_POST["correo"];

        include("../model/m_rec_contra.php");
        $user= new usuario();
        $user->validar_credenciales($identificacion,$correo);
    }

    if (isset($_POST["recuperando_contra"])){
        $id_recup=$_SESSION["id_recup"];
        $pass=md5($_POST["pass"]);

        // echo "<script>alert('el id recup $id_recup, la contraseña nueva $pass')</script>";

        include("../model/m_rec_contra.php");
        $user= new usuario();
        $user->actualizar_contrasena($id_recup,$pass);
    }
?>