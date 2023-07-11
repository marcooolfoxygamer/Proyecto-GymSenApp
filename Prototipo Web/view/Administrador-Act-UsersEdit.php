<?php
    include ("../model/seguridad_users_crud.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edición usuarios</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php
		include("../model/conexion.php");
		$id_user=$_GET['id'];
	?>
    <div class="navbar">
        <img src="Imagenes/LogoSena.png" class="logo">
        <ul>
            <li><a href="index.html">Inicio</a></li>
            <li><a href="Anuncios.php">Anuncios</a></li>
            <li><a href="Recomendaciones.html">Recomendaciones</a></li>
            <li><a href="Administrador.php">Mis actividades</a></li>
			<li id="liFinLinea"><a href="../model/salir.php">Cerrar Sesion</a></li>
        </ul>
    </div>
    
    <section id="Admin_usuarios_edit">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-8 heading">
					<h1>Edición</h1>
					<p class="sub">Edita los datos del usuario con un par de teclas y clicks</p>
					<p class="subtle-text">Editar</p>
				</div>
			</div>
			<div class="row">
				<div>
					<form action="../controller/c_user_edit.php" method="POST">
					<?php
						$sql="SELECT id_user, fk_tipo_user, tipo_user, nom1_user, nom2_user, ape1_user, ape2_user, correo_sena_user, fk_anteced_salud_sel, anteced_salud_inp, estado_user
							  FROM usuarios
							  INNER JOIN tipos_usuarios
							  ON fk_tipo_user = cod_tipo_user
							  WHERE id_user=$id_user";

						$query=$conexion->query($sql);

						while($result=$query->fetch_assoc()){
							$iid_user=stripslashes($result["id_user"]);
							$ffk_tipo_user=stripslashes($result["fk_tipo_user"]);
							$ttipo_user=stripslashes($result["tipo_user"]);
							$nnom1_user=stripslashes($result["nom1_user"]);
							$nnom2_user=stripslashes($result["nom2_user"]);
							$aape1_user=stripslashes($result["ape1_user"]);
							$aape2_user=stripslashes($result["ape2_user"]);
							$ccorreo_sena_user=stripslashes($result["correo_sena_user"]);
							$ffk_anteced_salud_sel=stripslashes($result["fk_anteced_salud_sel"]);
							$aanteced_salud_inp=stripslashes($result["anteced_salud_inp"]);
							$eestado_user=stripslashes($result["estado_user"]);
							
							
					?>
						<div class="form-group">
                            <label for="selRol" id="sr-only"></label>
                            <select class="form-control op" placeholder="Elija el rol de la persona" id="selRol" name="selRol" required>
                                <option value="" disabled="disabled">Elija el rol de la persona</option>
								<?php
									$sql_rol="SELECT * FROM tipos_usuarios";
									$query_rol=$conexion->query($sql_rol);

									while($result_rol=$query_rol->fetch_assoc()){
										$ccod_rol=stripslashes($result_rol["cod_tipo_user"]);
										$ddesc_rol=stripslashes($result_rol["tipo_user"]);

										if ($result_rol["cod_tipo_user"]==$ffk_tipo_user){
											echo"<option value='$ffk_tipo_user' selected='selected'>$ttipo_user</option>";
										}
										if ($result_rol["cod_tipo_user"]!=$ffk_tipo_user){
											echo"<option value='$ccod_rol'>$ddesc_rol</option>";
										}
										
									}
								?>
                            </select>
						</div>
						<div class="form-group">
							<label for="nom1" class="sr-only">Primer nombre</label>
							<?php
    							echo "<input type='text' class='form-control' placeholder='Primer nombre' id='nom1' name='nom1' value='$nnom1_user' required>";
							?>
						</div>
						<div class="form-group">
							<label for="nom2" class="sr-only">Segundo nombre</label>
							<?php
    							echo "<input type='text' class='form-control' placeholder='Segundo nombre (No obligatorio)' id='nom2' name='nom2' value='$nnom2_user'>";
							?>
						</div>
						<div class="form-group">
							<label for="apel1" class="sr-only">Primer apellido</label>
							<?php
    							echo "<input type='text' class='form-control' placeholder='Primer apellido' id='apel1' name='apel1' value='$aape1_user' required>";
							?>
						</div>
						<div class="form-group">
							<label for="apel2" class="sr-only">Segundo apellido</label>
							<?php
    							echo "<input type='text' class='form-control' placeholder='Segundo apellido (No obligatorio)' id='apel2' name='apel2' value='$aape2_user'>";
							?>
						</div>
						<div class="form-group">
							<label for="correo_sena_usersEdit" class="sr-only">Correo electrónico brindado por el sena</label>
							<?php
    							echo "<input type='email' class='form-control' placeholder='Correo electrónico brindado por el sena' id='correo_sena_usersEdit' name='correo' value='$ccorreo_sena_user' required>";
							?>
						</div>
						<div class="form-group">
                            <label for="selAntecedentes" id="sr-only"></label>
                            <select class="form-control op" placeholder="Tiene condiciones médicas que debamos conocer?" id="selAntecedentes" name="selAntecedentes" required>
                                <option value="" disabled="disabled">Tiene condiciones médicas que debamos conocer?</option>
								<option value='Ninguna'>Ninguna</option>
								<?php
									$sql_anteced="SELECT * FROM anteced_salud";
									$query_anteced=$conexion->query($sql_anteced);

									while($result_anteced=$query_anteced->fetch_assoc()){
										$aantecedente=stripslashes($result_anteced["antecedente"]);

										if ($result_anteced["antecedente"]!="Ninguna"){

											if ($result_anteced["antecedente"]==$ffk_anteced_salud_sel){
												echo"<option value='$ffk_anteced_salud_sel' selected='selected'>$ffk_anteced_salud_sel</option>";
											}
											if ($result_anteced["antecedente"]!=$ffk_anteced_salud_sel){
												echo"<option value='$aantecedente'>$aantecedente</option>";
											}
										}
									}
								?>
                            </select>
						</div>
						<div class="form-group">
							<label for="Antecedentes_salud" class="sr-only"></label>
							<?php
    							echo "<input type='text' class='form-control' placeholder='Su condición médica no aparece arriba o tiene varias? Descríbala(s) aquí' id='Antecedentes_input' name='Antecedentes_input' value='$aanteced_salud_inp'>";
							?>
						</div>

						<div class="form-group">
							<label for="estado_user" class="sr-only"></label>
							<select class="form-control op" placeholder="Estado del usuario dentro del sistema" id="estado_user" name="estado_user" required>
                                <option value="" disabled="disabled">Estado del usuario dentro del sistema</option>
								<?php
									if ($eestado_user == 0){
										echo"<option value='$eestado_user' selected='selected'>Inactivo</option>";
										echo"<option value='1'>Activo</option>";
									}
									elseif ($eestado_user == 1){
										echo"<option value='$eestado_user' selected='selected'>Activo</option>";
										echo"<option value='0'>Inactivo</option>";
									}
								?>
                            </select>
						</div>
							<?php
    							echo "<input type='hidden' name='identificacion' value='$iid_user'>";
								echo "<input type='hidden' name='ccorreo_sena_user' value='$ccorreo_sena_user'>";
							?>
						<div class="form-group" style="margin-top: 3%;">
							<input type="submit" value="Actualizar información" class="Subm" id="submit-ed">
						</div>
						<?php
   							}
						?>
					</form>
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