<?php
    session_start();
?>
<?php
    class usuario{

        public $existe;
        public $correo;
        public $pass;
        public $existe_verif_id;

        // Validar la existencia de los datos en la base de datos
        function validar_correo($correo,$pass){
            include("conexion.php");

            $this->correo=$correo;
            $this->pass=$pass;

            $sql="SELECT * FROM usuarios WHERE correo_sena_user='$this->correo' && estado_user=1";
            $query=$conexion->query($sql);

			while($result=$query->fetch_assoc()){
			    $this->existe=$this->existe+1;
            }

            return $this->existe;
        }

        // Funcion para registrar clientes
        function registrar($nom1,$nom2,$apel1,$apel2,$identificacion,$selAntecedentes,$Antecedentes_input){
            include("conexion.php");

            $sql_verif_id="SELECT * FROM usuarios WHERE id_user='$identificacion'";
            $query_verif_id=$conexion->query($sql_verif_id);

			while($result_verif_id=$query_verif_id->fetch_assoc()){
			    $this->existe_verif_id=$this->existe_verif_id+1;
            }

            if ($this->existe_verif_id == 0){
                $sql="INSERT INTO usuarios values('$identificacion',2,'$nom1','$nom2','$apel1','$apel2','$this->correo','$this->pass','$selAntecedentes','$Antecedentes_input',1)";
            
                if (mysqli_query($conexion,$sql)){
                    echo "<script>alert('Registro efectuado con éxito'); window.location='../view/Inicio_Sesion.html';</script>";
                }
                else{
                    echo "<script>alert('El registro no se pudo realizar.\\n por favor, intentelo de nuevo'); window.location='../view/Registro.php';</script>";
                }
            }
            elseif($this->existe_verif_id == 1){
                echo "<script>alert('El registro no se pudo realizar porque la identificación ya existe dentro del sistema.\\n por favor, inténtelo de nuevo'); window.location='../view/Registro.php';</script>";
            } 
        }

        // Funcion para iniciar sesion
        function loggear(){
            include("conexion.php");
            
            $existe_verif="0";

            $sql_verif="SELECT * FROM usuarios WHERE correo_sena_user='$this->correo' AND contrasena='$this->pass' AND estado_user=1";
            $query_verif=$conexion->query($sql_verif);

			while($result_verif=$query_verif->fetch_assoc()){
			    $existe_verif=$existe_verif+1;
            }

            if($existe_verif == 0){
                echo "<script>alert('Correo o contraseña incorrecta'); window.location='../view/Inicio_Sesion.html';</script>";
            }
            elseif($existe_verif == 1){

                $query_rol=mysqli_query($conexion,"SELECT fk_tipo_user as rol FROM usuarios WHERE correo_sena_user = '$this->correo' AND contrasena = '$this->pass' AND estado_user=1");
                $row_rol=mysqli_fetch_assoc($query_rol);
                $rol=$row_rol["rol"];


                $query_id=mysqli_query($conexion,"SELECT id_user as id FROM usuarios WHERE correo_sena_user = '$this->correo' AND contrasena = '$this->pass' AND estado_user=1");
                $row_id=mysqli_fetch_assoc($query_id);
                $id=$row_id["id"];

                $_SESSION["id"]=$id;
                
                if ($rol==1){
                    $_SESSION["admin"]="1";
                    header("location: ../view/Admin.php");
                }
                else if ($rol==2){
                    $_SESSION["aprendiz"]="1";
                    header("location: ../view/Aprendiz.php");
                }
                else if ($rol==3){
                    $_SESSION["instructor"]="1";
                    header("location: ../view/Instructor.php");
                }

            }
        }
    }
?>