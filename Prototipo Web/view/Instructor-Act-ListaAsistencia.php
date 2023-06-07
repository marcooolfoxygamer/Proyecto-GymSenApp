<?php
    include ("../model/seguridad_instructor.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de sistencia</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
		include("../model/conexion.php");
	?>
    <div class="navbar">
        <img src="Imagenes/LogoSena.png" class="logo">
        <ul>
            <li><a href="index.html">Inicio</a></li>
            <li><a href="Anuncios.html">Anuncios</a></li>
            <li><a href="Recomendaciones.html">Recomendaciones</a></li>
            <li><a href="Registro.php">Registrarse</a></li>
            <li><a href="Inicio_Sesion.html">Iniciar sesión</a></li>
			      <li id="liFinLinea"><a href="../model/salir.php">Cerrar Sesion</a></li>
        </ul>
    </div>
    
    <section id="Asistencia">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-8 heading">
					<h1>Listado de asistencia</h1>
					<p class="sub-doub">En este espacio tienes completo acceso a la lista de de aprendices que han desarrollado actividades en el gimnasio</p>
                    <p class="sub">Puedes actualizar información si así lo requieres...</p>
				</div>
			</div>
			<div class="row">
				<div class="cont-r">
          <table id="lista_asistencia">
            <thead>
              <tr>
                <th class="col">Identificación instructor</th>
                <th class="col">Identificación aprendiz</th>
                <th class="col">P.nombre aprendiz</th>
                <th class="col">P.apellido aprendiz</th>
                <th class="col">S.apellido aprendiz</th>
                <th class="col">Correo aprendiz</th>
                <th class="col">Antecedentes #1</th>
                <th class="col">Antecedentes #2</th>
                <th class="col fechasist">Fecha asistencia</th>
                <th class="col" colspan="2">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  $sql="SELECT id_registro_asis, id_instruc_asis, fk_id_aprend_asis, nom1_user, ape1_user, ape2_user, correo_sena_user, fk_anteced_salud_sel, anteced_salud_inp, fecha_asis
                  FROM asistencia
                  INNER JOIN usuarios
                  ON fk_id_aprend_asis=id_user
                  ORDER BY fecha_asis DESC";

                  $query=$conexion->query($sql);

                  while($result=$query->fetch_assoc()){
                      $iid_registro_asis=stripslashes($result["id_registro_asis"]);
                      $iid_instructor=stripslashes($result["id_instruc_asis"]);
                      $iid_aprendiz=stripslashes($result["fk_id_aprend_asis"]);
                      $nnom1_aprendiz=stripslashes($result["nom1_user"]);
                      $aape1_aprendiz=stripslashes($result["ape1_user"]);
                      $aape2_aprendiz=stripslashes($result["ape2_user"]);
                      $ccorreo_aprendiz=stripslashes($result["correo_sena_user"]);
                      $aanteced_salud_sel=stripslashes($result["fk_anteced_salud_sel"]);
                      $anteced_salud_inp=stripslashes($result["anteced_salud_inp"]);
                      $ffecha_asis=stripslashes($result["fecha_asis"]);
              ?>
              <tr>
              <?php
                  echo "
                      <td class='tds'>$iid_instructor</td>
                      <td class='tds'>$iid_aprendiz</td>
                      <td class='tds'>$nnom1_aprendiz</td>
                      <td class='tds'>$aape1_aprendiz</td>
                      <td class='tds'>$aape2_aprendiz</td>
                      <td class='tds'>$ccorreo_aprendiz</td>
                      <td class='tds'>$aanteced_salud_sel</td>
                      <td class='tds'>$anteced_salud_inp</td>
                      <td class='tds fechasist'>$ffecha_asis</td>
                      <td class='tds'><a href='Instructor-Act-Editar.php?id=$iid_registro_asis'><button type='button' class='btn btn-update'>Editar</button></a></td>
                      <td class='tds'><button type='button' class='btn btn-delete' onclick='showConfirmBox()'>Eliminar</button></td>
                      
                      <div class='overlay' id='overlay' hidden>
                        <div class='confirm-box'>
                          <br>
                          <h2>Confirmación de decisión</h2>
                          <p>Está segur@ de que quiere eliminar el registro de asitencia?</p>
                          <br>
                          <button id='confirma' onclick='isConfirm(true,$iid_registro_asis)'>Si</button>
                          <button id='denega'onclick='isConfirm(false)''>No</button>
                        </div>
                      </div>

                      <script>
                        function showConfirmBox() {
                          document.getElementById('overlay').hidden = false;
                        }
                        function closeConfirmBox() {
                          document.getElementById('overlay').hidden = true;
                        }
                      
                        function isConfirm(answer,id) {
                          if (answer) {
                            location.href ='../controller/c_asis_delete.php?id='+id;
                          }
                          closeConfirmBox();
                        }
                      </script>
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