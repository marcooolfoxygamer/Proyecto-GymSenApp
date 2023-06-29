<?php
    session_start();
?>
<?php
    $id_registro_asis=$_POST["id_registro_asis"];
    $id_registro_inst=$_POST["id_registro_inst"];
    $id_registro_apre=$_POST["id_registro_apre"];
    $id_Instructor=$_POST["id_Instructor"];
    $id_Aprendiz=$_POST["id_Aprendiz"];
    $fecha=$_POST["fecha"];

    $id_inst=$_SESSION["id"];

    if ($id_inst == $id_Instructor){
        if ($id_inst == $id_registro_inst){
            include("../model/m_asistencia.php");
            $user= new usuario();
            $validacion_apre=$user->validar($id_Aprendiz);

            if ($validacion_apre == 0){
                echo "<script>alert('La identificación de aprendiz que llenó en el registro no existe en el sistema. Por favor, inténtelo de nuevo'); window.location='../view/Instructor-Act-Editar.php?id=$id_registro_asis';</script>";
            }
            if ($validacion_apre != 0){
                if ($id_Aprendiz == $id_registro_apre){
                    $user->editar($id_registro_asis,$id_Instructor,$fecha);
                }
                else{
                    echo "<script>alert('La identificación del aprendiz que editó en el registro de asistencia no corresponde al que estaba por defecto al crear el registro.\\nPor favor, coloque la identificación del aprendiz que corresponde'); window.location='../view/Instructor-Act-Editar.php?id=$id_registro_asis';</script>";
                }
            }
        }
        else{
            $_SESSION["edicion_asis"]="0";
            echo "<script>alert('El registro de asistencia que está editando no fue creado y/o diligenciado por usted.\\nPor favor, contáctese con la persona que diligenció el registro'); window.location='../view/Instructor-Act-ListaAsistencia.php';</script>";
        }
    }
    if ($id_inst != $id_Instructor){
        echo "<script>alert('La identificación que llenó en el registro como suya, es incorrecta.\\nPor favor, inténtelo de nuevo'); window.location='../view/Instructor-Act-Editar.php?id=$id_registro_asis';</script>";
    }
?>