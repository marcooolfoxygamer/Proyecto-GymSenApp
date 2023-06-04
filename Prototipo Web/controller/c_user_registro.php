<?php
    $nom1=$_POST["nom1"];
    $nom2=$_POST["nom2"];
    $apel1=$_POST["apel1"];
    $apel2=$_POST["apel2"];
    $correo=$_POST["correo"];
    $identificacion=$_POST["identificacion"];
    $pass=md5($_POST["pass"]);
    $selAntecedentes=$_POST["selAntecedentes"];
    $Antecedentes_input=$_POST["Antecedentes_input"];
    
    if ($nom2=="" || $nom2=="ninguno" || $nom2=="no" || $nom2=="no tengo"){
        $nom2='NULL';
    }
    if ($apel2=="" || $apel2=="ninguno" || $apel2=="no" || $apel2=="no tengo"){
        $apel2='NULL';
    }
    if ($Antecedentes_input=="" || $Antecedentes_input=="ninguno" || $Antecedentes_input=="ninguna" || $Antecedentes_input=="no" || $Antecedentes_input=="no tengo"){
        $Antecedentes_input='NULL';
    }

    include("../model/m_user.php");
    $user= new usuario($correo,$pass);
    $validando=$user->validar_correo();

    if ($validando == 0){
        $user->registrar($nom1,$nom2,$apel1,$apel2,$identificacion,$selAntecedentes,$Antecedentes_input);
    }
    elseif($validando != 0){
        echo "<script>alert('Los datos ingresados se encuentran registrados dentro del sistema. Por favor, inicie sesión'); window.location='../view/Inicio_sesion.html';</script>";
    }

?>