<?php
    class usuario{

        public $existe;
        public $id_Aprendiz;

        function __construct($id_Aprendiz){
            $this->id_Aprendiz=$id_Aprendiz;
        }

        function validar(){
            include("conexion.php");

            $sql="SELECT * FROM usuarios WHERE id_user=$this->id_Aprendiz";
            $query=$conexion->query($sql);

            while($result=$query->fetch_assoc()){
			    $this->existe=$this->existe+1;
            }

            return $this->existe;
        }

        function registrar($id_Instructor,$fecha){
            include("conexion.php");

            $sql_registro="INSERT INTO asistencia values(NULL,$id_Instructor,$this->id_Aprendiz,'$fecha')";
            mysqli_query($conexion,$sql_registro);

            echo "<script>alert('El registro de asistencia se ha completado con éxito'); window.location='../view/Instructor-Act.php';</script>";
        }
    }
?>