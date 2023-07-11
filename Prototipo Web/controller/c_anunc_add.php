<?php
    session_start();
?>
<?php
    $id_admin=$_SESSION["id"];

    $titulo_anunc=$_POST["titulo_anunc"];
    $desc_anunc=$_POST["desc_anunc"];


    $direccion_imagen="../view/Imagenes/anuncios/";
    $archivo=$direccion_imagen.$_FILES["img_anunc"]["name"];

    if (move_uploaded_file($_FILES["img_anunc"]["tmp_name"],$archivo)){
        $imagen=$_FILES["img_anunc"]["name"];
    }

    include("../model/m_anuncios.php");
    $user= new usuario();
    $validando=$user->validar_img($imagen);

    if ($validando == 0){
        $user->agregar($id_admin,$titulo_anunc,$desc_anunc,$imagen);
    }
    elseif($validando != 0){
        echo "<script>alert('El nombre de la imagen ya se encuentra asociado a otra imagen.\\nPor favor, vuelva a intentarlo con otra imagen o cambiándole el nombre a la misma'); window.location='../view/Administrador-Act-AnuncAdd.php';</script>";
    }

?>