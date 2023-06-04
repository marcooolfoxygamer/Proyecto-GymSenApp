<?php
    session_start();
?>
<?php
    $id_Instructor=$_POST["id_Instructor"];
    $id_Aprendiz=$_POST["id_Aprendiz"];
    $fecha=$_POST["fecha"];

    $id_inst=$_SESSION["id"];

    if ($id_inst == $id_Instructor){

        include("../model/m_asis_registro.php");
        $user= new usuario($id_Aprendiz);
        $validacion_inst=$user->validar();

        if ($validacion_inst == 0){
            echo "<script>alert('La identificación de aprendiz que llenó en el registro no existe en el sistema. Por favor, inténtelo de nuevo'); window.location='../view/Instructor-Act.php';</script>";
        }
        if ($validacion_inst != 0){
            $user->registrar($id_Instructor,$fecha);
        }
    }
    if ($id_inst != $id_Instructor){
        echo "<script>alert('La identificación que llenó en el registro como suya, es incorrecta.\\nPor favor, inténtelo de nuevo'); window.location='../view/Instructor-Act.php';</script>";
    }
?>