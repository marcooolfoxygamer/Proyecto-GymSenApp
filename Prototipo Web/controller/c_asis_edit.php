<?php
    session_start();
?>
<?php
    $id_registro_asis=$_POST["id_registro_asis"];
    $id_Instructor=$_POST["id_Instructor"];
    $id_Aprendiz=$_POST["id_Aprendiz"];
    $fecha=$_POST["fecha"];

    $id_inst=$_SESSION["id"];

    if ($id_inst == $id_Instructor){

        include("../model/m_asistencia.php");
        $user= new usuario();
        $validacion_apre=$user->validar($id_Aprendiz);

        if ($validacion_apre == 0){
            echo "<script>alert('La identificación de aprendiz que llenó en el registro no existe en el sistema. Por favor, inténtelo de nuevo'); window.location='../view/Instructor-Act-Editar.php?id=$id_registro_asis';</script>";
        }
        if ($validacion_apre != 0){
            $user->editar($id_registro_asis,$id_Instructor,$fecha);
        }
    }
    if ($id_inst != $id_Instructor){
        echo "<script>alert('La identificación que llenó en el registro como suya, es incorrecta.\\nPor favor, inténtelo de nuevo'); window.location='../view/Instructor-Act-Editar.php?id=$id_registro_asis';</script>";
    }
?>