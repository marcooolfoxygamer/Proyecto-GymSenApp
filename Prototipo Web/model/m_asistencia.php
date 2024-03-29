<?php
    session_start();
?>
<?php
    class usuario{

        public $existe;
        public $id_Aprendiz;

        function validar($id_Aprendiz){
            include("conexion.php");
            $this->id_Aprendiz=$id_Aprendiz;

            $sql="SELECT * FROM usuarios WHERE id_user=$this->id_Aprendiz AND fk_tipo_user=2 AND estado_user=1";
            $query=$conexion->query($sql);

            while($result=$query->fetch_assoc()){
			    $this->existe=$this->existe+1;
            }

            return $this->existe;
        }

        function registrar($id_Instructor,$fecha){
            include("conexion.php");

            $sql_registro="INSERT INTO asistencia values(NULL,$id_Instructor,$this->id_Aprendiz,'$fecha',1)";
            mysqli_query($conexion,$sql_registro);

            echo "<script>alert('El registro de asistencia se ha completado con éxito'); window.location='../view/Instructor-Act.php';</script>";
        }

        function editar($id_registro_asis,$id_Instructor,$fecha){
            include("conexion.php");

            $sql_edicion="UPDATE asistencia SET id_instruc_asis=$id_Instructor, fk_id_aprend_asis=$this->id_Aprendiz, fecha_asis='$fecha' WHERE id_registro_asis=$id_registro_asis";
            
            if (mysqli_query($conexion,$sql_edicion)){
                $_SESSION["edicion_asis"]="0";
                echo "<script>alert('Actualización de datos efectuada con éxito'); window.location='../view/Instructor-Act-ListaAsistencia.php';</script>";
            }
            else{
                $_SESSION["edicion_asis"]="0";
                echo "<script>alert('No se pudo actualizar la información del registro.\\nPor favor, inténtelo de nuevo'); window.location='../view/Instructor-Act-ListaAsistencia.php';</script>";
            }
            
        }

        function eliminar($id_registro_asis){
            include("conexion.php");

            $sql_eliminacion="UPDATE asistencia SET estado_asis=0 WHERE id_registro_asis=$id_registro_asis";
            
            if (mysqli_query($conexion,$sql_eliminacion)){
                echo "<script>alert('Eliminación de datos efectuada con éxito'); window.location='../view/Instructor-Act-ListaAsistencia.php';</script>";
            }
            else{
                echo "<script>alert('No se pudo eliminar la información del registro.\\nPor favor, intentelo de nuevo'); window.location='../view/Instructor-Act-ListaAsistencia.php';</script>";
            }
            
        }
    }
?>