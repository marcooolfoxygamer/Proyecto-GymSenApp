<?php
    include ("../model/seguridad_admin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado usuarios</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
		include("../model/conexion.php");
	?>
    <div class="navbar">
        <img src="Imagenes/Logo_GsA-removebg-preview.png" class="logo">
        <ul>
            <li><a href="index.html">Inicio</a></li>
            <li><a href="Anuncios.php">Anuncios</a></li>
            <li><a href="Recomendaciones.html">Recomendaciones</a></li>
            <li><a href="Administrador.php">Mis actividades</a></li>
			      <li id="liFinLinea"><a href="../model/salir.php">Cerrar Sesion</a></li>
        </ul>
    </div>
    
    <section id="Admin_usuarios">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-8 heading">
					<h1>Listado de usuarios</h1>
					<p class="sub-doub">En este espacio tiene completo acceso a la lista de usuarios registrados en el sistema</p>
          <p class="sub">Puede actualizar información si así lo requiere...</p>
				</div>
			</div>
			<div class="row">
				<div class="cont-r">
          <table id="lista_asistencia">
            <thead>
              <tr>
                <th class="col">Identificación</th>
                <th class="col">Tipo de usuario</th>
                <th class="col">P.nombre</th>
                <th class="col">P.apellido</th>
                <th class="col">S.apellido</th>
                <th class="col asist_correo">Correo</th>
                <th class="col">Antecedentes #1</th>
                <th class="col">Antecedentes #2</th>
                <th class="col">Estado del usuario</th>
                <th class="col asist_acciones">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  $sql="SELECT id_user, tipo_user, nom1_user, ape1_user, ape2_user, correo_sena_user, fk_anteced_salud_sel, anteced_salud_inp, estado_user
                  FROM usuarios
                  INNER JOIN tipos_usuarios
                  ON fk_tipo_user=cod_tipo_user";

                  $query=$conexion->query($sql);

                  while($result=$query->fetch_assoc()){
                      $iid_user=stripslashes($result["id_user"]);
                      $ttipo_user=stripslashes($result["tipo_user"]);
                      $nnom1_user=stripslashes($result["nom1_user"]);
                      $aape1_user=stripslashes($result["ape1_user"]);
                      $aape2_user=stripslashes($result["ape2_user"]);
                      $ccorreo_sena_user=stripslashes($result["correo_sena_user"]);
                      $aanteced_salud_sel=stripslashes($result["fk_anteced_salud_sel"]);
                      $anteced_salud_inp=stripslashes($result["anteced_salud_inp"]);
                      $eestado_user=stripslashes($result["estado_user"]);
              ?>
              <tr>
              <?php
                  echo "
                      <td class='tds'>$iid_user</td>
                      <td class='tds'>$ttipo_user</td>
                      <td class='tds'>$nnom1_user</td>
                      <td class='tds'>$aape1_user</td>
                      <td class='tds'>$aape2_user</td>
                      <td class='tds'>$ccorreo_sena_user</td>
                      <td class='tds'>$aanteced_salud_sel</td>
                      <td class='tds'>$anteced_salud_inp</td>
                      <td class='tds'>$eestado_user</td>
                      <td class='tds'><a href='../controller/c_user_pre_edit.php?id=$iid_user'><button type='button' class='btn btn-update'>Editar</button></a></td>
                      
                    ";
	            ?>
              </tr>
              <?php
                  }
              ?>
            </tbody>
          </table>
				</div>
			</div>
		</div>
	</section>

	<footer id="footer">
		<div class="container">
			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block" style="padding-bottom: 8px;">&copy; 2016 Free HTML5. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="http://freehtml5.co/" target="_blank" style="color: #65a124;">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.com/" target="_blank" style="color: #65a124;">Unsplash</a></small>
					</p>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>