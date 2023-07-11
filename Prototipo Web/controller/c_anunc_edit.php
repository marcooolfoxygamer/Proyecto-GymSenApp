<?php
    session_start();
?>
<?php
    $id_admin=$_SESSION["id"];

    $id_anunc=$_POST["id_anunc"];
    $fk_id_admin_anunc=$_POST["fk_id_admin_anunc"];
    $iimg_anunc=$_POST["iimg_anunc"];

    $titulo_anunc=$_POST["titulo_anunc"];
    $desc_anunc=$_POST["desc_anunc"];

    $direccion_imagen="../view/Imagenes/anuncios/";
    $archivo=$direccion_imagen.$_FILES["img_anunc"]["name"];

    if (move_uploaded_file($_FILES["img_anunc"]["tmp_name"],$archivo)){
        $imagen=$_FILES["img_anunc"]["name"];
    }

    if ($id_admin == $fk_id_admin_anunc){
        include("../model/m_anuncios.php");
        $user= new usuario();

        if ($imagen == NULL){
            $user->editar($id_anunc,$id_admin,$titulo_anunc,$desc_anunc,$iimg_anunc);
        }
        else{
            
            $validando_img=$user->validar_img($imagen);

            if ($validando_img == 0){
                $user->editar($id_anunc,$id_admin,$titulo_anunc,$desc_anunc,$imagen);
            }
            elseif($validando_img != 0){

                if ($iimg_anunc == $imagen){
                    $user->editar($id_anunc,$id_admin,$titulo_anunc,$desc_anunc,$imagen);
                }
                else{
                    echo "<script>alert('El nombre de la imagen ya se encuentra asociado a otra imagen.\\nPor favor, vuelva a intentarlo con otra imagen o cambiándole el nombre a la misma'); window.location='../view/Administrador-Act-AnuncEdit.php?id=$id_anunc';</script>"; 
                }
            }
        }
    }
    else{
        $_SESSION["anuncios_crud"]="0";
        echo "<script>alert('El anuncio que está editando no fue creado por usted.\\nPor favor, contáctese con la persona que creó el anuncio'); window.location='../view/Administrador-Act-Anunc.php';</script>";
    }

?>