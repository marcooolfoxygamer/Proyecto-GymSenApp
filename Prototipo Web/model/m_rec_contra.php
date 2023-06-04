<?php
    session_start();
?>
<?php
    class usuario{
        function validar_credenciales($identificacion,$correo){
            include("conexion.php");

            $existe="0";

            $sql="SELECT * FROM usuarios WHERE id_user=$identificacion AND correo_sena_user='$correo'";
            $query=$conexion->query($sql);

			while($result=$query->fetch_assoc()){
			    $existe=$existe+1;
            }

            if($existe == 0){
                echo "<script>alert('Alguno de los datos ingresados no coincide con los datos existentes en el sistema.\\nPor favor, inténtelo de nuevo'); window.location='../view/Recuperacion_Contrasena.html';</script>";
            }
            elseif($existe == 1){
                $_SESSION["rec_contrasena"]='1';
                $_SESSION["id_recup"]=$identificacion;

                header("location: ../view/Recuperando_Contrasena.php");
            }
        }
        
        function actualizar_contrasena($identificacion,$pass){
            include("conexion.php");

            $sql="UPDATE usuarios SET contrasena = '$pass' WHERE id_user=$identificacion";
            $query=$conexion->query($sql);

			

            if($query){
                // echo "<script>alert('Contraseña actualizada con éxito'); window.location='../model/salir.php';</script>";
                header("location: ../model/salir.php");
            }
            else{
                echo "<script>alert('Algo salió mal\\nPor favor, inténtelo de nuevo'); window.location='../view/Recuperando_Contrasena.php';</script>";
            }
        }
    }
?>