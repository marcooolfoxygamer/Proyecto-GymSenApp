<?php
    session_start();
?>
<?php
    class usuario{

        public $existe_img;

        function validar_img($img){
            include("conexion.php");

            $sql_valid="SELECT * FROM anuncios WHERE img_anunc='$img'";
            $query_valid=$conexion->query($sql_valid);

            while($result=$query_valid->fetch_assoc()){
			    $this->existe_img=$this->existe_img+1;
            }

            return $this->existe_img;
        }

        function agregar($id_admin,$titulo_anunc,$desc_anunc,$imagen){
            include("conexion.php");

            $sql_registro="INSERT INTO anuncios values(NULL,$id_admin,'$titulo_anunc','$desc_anunc','$imagen',1)";

            if (mysqli_query($conexion,$sql_registro)){
                $_SESSION["anuncios_crud"]="0";
                echo "<script>alert('El anuncio se ha creado existosamente'); window.location='../view/Administrador-Act-Anunc.php';</script>";
            }
            else{
                echo "<script>alert('El anuncio no se pudo crear.\\nPor favor, inténtelo de nuevo'); window.location='../view/Administrador-Act-AnuncAdd.php';</script>";
            }
        }

        function editar($id_anunc,$id_admin,$titulo_anunc,$desc_anunc,$imagen){
            include("conexion.php");

            $sql_edicion="UPDATE anuncios SET fk_id_admin_anunc=$id_admin, titulo_anunc='$titulo_anunc', desc_anunc='$desc_anunc', img_anunc='$imagen' WHERE id_anunc=$id_anunc";
            
            if (mysqli_query($conexion,$sql_edicion)){
                $_SESSION["anuncios_crud"]="0";
                echo "<script>alert('Actualización de datos efectuada con éxito'); window.location='../view/Administrador-Act-Anunc.php';</script>";
            }
            else{
                $_SESSION["anuncios_crud"]="0";
                echo "<script>alert('No se pudo actualizar la información del registro.\\nPor favor, inténtelo de nuevo'); window.location='../view/Administrador-Act-Anunc.php';</script>";
            }
            
        }

        function eliminar($id_anunc){
            include("conexion.php");

            $sql_eliminacion="UPDATE anuncios SET estado_anunc=0 WHERE id_anunc=$id_anunc";
            
            if (mysqli_query($conexion,$sql_eliminacion)){
                echo "<script>alert('Eliminación de datos efectuada con éxito'); window.location='../view/Administrador-Act-Anunc.php';</script>";
            }
            else{
                echo "<script>alert('No se pudo eliminar la información del registro.\\nPor favor, intentelo de nuevo'); window.location='../view/Administrador-Act-Anunc.php';</script>";
            }
        }
    }
?>