<?php
    $id_user=$_POST["identificacion"];
    $ccorreo_sena_user=$_POST["ccorreo_sena_user"];

    $fk_tipo_user=$_POST["selRol"];
    $nom1_user=$_POST["nom1"];
    $nom2_user=$_POST["nom2"];
    $ape1_user=$_POST["apel1"];
    $ape2_user=$_POST["apel2"];
    $correo_sena_user=$_POST["correo"];
    $fk_anteced_salud_sel=$_POST["selAntecedentes"];
    $anteced_salud_inp=$_POST["Antecedentes_input"];
    $estado_user=$_POST["estado_user"];

    if ($nom2_user=="" || $nom2_user=="ninguno" || $nom2_user=="no" || $nom2_user=="no tengo"){
        $nom2_user='';
    }
    if ($ape2_user=="" || $ape2_user=="ninguno" || $ape2_user=="no" || $ape2_user=="no tengo"){
        $ape2_user='';
    }
    if ($anteced_salud_inp=="" || $anteced_salud_inp=="ninguno" || $anteced_salud_inp=="ninguna" || $anteced_salud_inp=="no" || $anteced_salud_inp=="no tengo"){
        $anteced_salud_inp='';
    }

    include("../model/m_user.php");
    $user= new usuario();

    $validando_correo=$user->validar_correo_edit($correo_sena_user);
    
    if ($validando_correo == 0){
        $user->editar($id_user,$fk_tipo_user,$nom1_user,$nom2_user,$ape1_user,$ape2_user,$correo_sena_user,$fk_anteced_salud_sel,$anteced_salud_inp,$estado_user);
    }
    elseif($validando_correo != 0){

        if ($ccorreo_sena_user == $correo_sena_user){
            $user->editar($id_user,$fk_tipo_user,$nom1_user,$nom2_user,$ape1_user,$ape2_user,$correo_sena_user,$fk_anteced_salud_sel,$anteced_salud_inp,$estado_user);
        }
        else{
            echo "<script>alert('El correo digitado ya se encuentra asociado a otra cuenta.\\nPor favor, vuelva a intentarlo con otro correo'); window.location='../view/Administrador-Act-UsersEdit.php?id=$id_user';</script>"; 
        }
    }
?>