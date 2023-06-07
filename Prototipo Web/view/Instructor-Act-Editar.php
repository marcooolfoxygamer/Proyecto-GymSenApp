<?php
    include ("../model/seguridad_instructor.php");
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
		$id_asis=$_GET['id'];
	?>
    <div class="navbar">
        <img src="Imagenes/LogoSena.png" class="logo">
        <ul>
            <li><a href="index.html">Inicio</a></li>
            <li><a href="Anuncios.html">Anuncios</a></li>
            <li><a href="Recomendaciones.html">Recomendaciones</a></li>
            <li><a href="Registro.html">Registrarse</a></li>
            <li><a href="Inicio_Sesion.html">Iniciar sesión</a></li>
			<li id="liFinLinea"><a href="../model/salir.php">Cerrar Sesion</a></li>
        </ul>
    </div>
    
    <section id="Registrarse">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-8 heading">
					<h1>Edición</h1>
					<p class="sub">Edita los datos del registro de asistencia con un par de teclas y clicks</p>
					<p class="subtle-text">Editar</p>
				</div>
			</div>
			<div class="row">
				<div>
					<form action="../controller/c_asis_edit.php" method="POST">
					<?php
						$sql="SELECT id_registro_asis, id_instruc_asis, fk_id_aprend_asis, fecha_asis
							  FROM asistencia
							  WHERE id_registro_asis=$id_asis";

						$query=$conexion->query($sql);

						while($result=$query->fetch_assoc()){
							$iid_registro_asis=stripslashes($result["id_registro_asis"]);
							$iid_instruc_asis=stripslashes($result["id_instruc_asis"]);
							$ffk_id_aprend_asis=stripslashes($result["fk_id_aprend_asis"]);
							$ffecha_asis=stripslashes($result["fecha_asis"]);
							
							
					?>
						<div class="form-group">
							<label for="num_identificacion" class="sr-only">Identificación del Instructor</label>
							<?php
    							echo "<input type='number' class='form-control' placeholder='Identificación del Instructor' id='num_identificacion' name='id_Instructor' value='$iid_instruc_asis' required>";
							?>
						</div>
						<div class="form-group">
							<label for="num_identificacion" class="sr-only">Identificación del Aprendiz</label>
							<?php
    							echo "<input type='number' class='form-control' placeholder='Identificación del Aprendiz' id='num_identificacion' name='id_Aprendiz' value='$ffk_id_aprend_asis' required>";
							?>
						</div>
						<div class="form-group">
							<label for="num_identificacion" class="sr-only">Fecha</label>
							<?php
    							echo "<input type='date' class='form-control' placeholder='Fecha' id='num_identificacion' name='fecha' value='$ffecha_asis' required>";
							?>
						</div>
							<?php
    							echo "<input type='hidden' name='id_registro_asis' value='$iid_registro_asis'>";
							?>
						<div class="form-group" style="margin-top: 3%;">
							<input type="submit" value="Actualizar registro" class="Subm" id="submit-ed">
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