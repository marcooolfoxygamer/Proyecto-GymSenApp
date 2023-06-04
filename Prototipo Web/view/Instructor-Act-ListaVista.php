<?php
    // include ("../model/seguridad_instructor.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asistencia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php
		include("../model/conexion.php");
	?>
    <table class="table" id="lista_asistencia" style="font-size: 12px;">
      <thead>
        <tr>
          <th scope="col">Identificación instructor</th>
          <th scope="col">Identificación aprendiz</th>
          <th scope="col">P.nombre aprendiz</th>
          <th scope="col">S.nombre aprendiz</th>
          <th scope="col">P.apellido aprendiz</th>
          <th scope="col">S.apellido aprendiz</th>
          <th scope="col">Correo aprendiz</th>
          <th scope="col">Fecha asistencia</th>
          <th scope="col" colspan="2">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $sql="SELECT id_instruc_asis, fk_id_aprend_asis, nom1_user, nom2_user, ape1_user, ape2_user, correo_sena_user, fecha_asis
            FROM asistencia
            INNER JOIN usuarios
            ON fk_id_aprend_asis=id_user";

            $query=$conexion->query($sql);

            while($result=$query->fetch_assoc()){
                $iid_instructor=stripslashes($result["id_instruc_asis"]);
                $iid_aprendiz=stripslashes($result["fk_id_aprend_asis"]);
                $nnom1_aprendiz=stripslashes($result["nom1_user"]);
                $nnom2_aprendiz=stripslashes($result["nom2_user"]);
                $aape1_aprendiz=stripslashes($result["ape1_user"]);
                $aape2_aprendiz=stripslashes($result["ape2_user"]);
                $ccorreo_aprendiz=stripslashes($result["correo_sena_user"]);
                $ffecha_asis=stripslashes($result["fecha_asis"]);
        ?>
        <tr>
        <?php
            echo "
                <td>$iid_instructor</td>
                <td>$iid_aprendiz</td>
                <td>$nnom1_aprendiz</td>
                <td>$nnom2_aprendiz</td>
                <td>$aape1_aprendiz</td>
                <td>$aape2_aprendiz</td>
                <td>$ccorreo_aprendiz</td>
                <td>$ffecha_asis</td>
                ";
		?>
            <td><button type="button" class="btn btn-warning" style="font-size: 12px;">Editar</button></td>
            <td><button type="button" class="btn btn-danger" style="font-size: 12px;">Danger</button></td>
        </tr>
        <?php
            }
        ?>
        
      </tbody>
    </table>
</body>
</html>