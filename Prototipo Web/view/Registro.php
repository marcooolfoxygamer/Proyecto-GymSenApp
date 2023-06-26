<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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
            <li><a href="Anuncios.html">Anuncios</a></li>
            <li><a href="Recomendaciones.html">Recomendaciones</a></li>
            <li><a href="Registro.html">Registrarse</a></li>
            <li id="liFinLinea"><a href="Inicio_Sesion.html">Iniciar sesión</a></li>
        </ul>
    </div>
    
    <section id="Registrarse">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-8 heading">
					<h1>Registrarse</h1>
					<p class="sub">Regístrate para obtener todas las funcionalidades que este sistema puede ofrecerte.</p>
					<p class="subtle-text">Registrarse</p>
				</div>
			</div>
			<div class="row">
				<div>
					<form action="../controller/c_user_registro.php" method="POST">
						<div class="form-group">
							<label for="nom1" class="sr-only">Primer nombre</label>
							<input type="text" class="form-control" placeholder="Primer nombre" id="nom1" name="nom1" required>
						</div>
						<div class="form-group">
							<label for="nom2" class="sr-only">Segundo nombre</label>
							<input type="text" class="form-control" placeholder="Segundo nombre (No obligatorio)" id="nom2" name="nom2">
						</div>
						<div class="form-group">
							<label for="apel1" class="sr-only">Primer apellido</label>
							<input type="text" class="form-control" placeholder="Primer apellido" id="apel1" name="apel1" required>
						</div>
						<div class="form-group">
							<label for="apel2" class="sr-only">Segundo apellido</label>
							<input type="text" class="form-control" placeholder="Segundo apellido (No obligatorio)" id="apel2" name="apel2">
						</div>
						<div class="form-group">
							<label for="correo_sena_registro" class="sr-only">Correo electrónico brindado por el sena</label>
							<input type="email" class="form-control" placeholder="Correo electrónico brindado por el sena" id="correo_sena_registro" name="correo" required>
						</div>
						<div class="form-group">
							<label for="num_identificacion" class="sr-only">Número de identificación</label>
							<input type="number" class="form-control" placeholder="Número de identificación" id="num_identificacion" name="identificacion" required>
						</div>
						<div class="form-group">
							<label for="password_registro" class="sr-only">Contraseña (para acceder al sistema de ahora en adelante)</label>
							<input type="password" class="form-control" placeholder="Contraseña (para acceder al sistema de ahora en adelante)" id="password_registro" maxlength="15" name="pass" required>
						</div>
						<div class="form-group">
                            <label for="selAntecedentes" id="sr-only"></label>
                            <select class="form-control op" placeholder="Tiene condiciones médicas que debamos conocer?" id="selAntecedentes" name="selAntecedentes" required>
                                <option value="" selected="selected" disabled="disabled">Tiene condiciones médicas que debamos conocer?</option>
								<option value='Ninguna'>Ninguna</option>
								<?php
									$sql="SELECT * FROM anteced_salud";
									$query=$conexion->query($sql);

									while($result=$query->fetch_assoc()){
										$aantecedente=stripslashes($result["antecedente"]);

										if ($result["antecedente"]!="Ninguna"){
											echo"<option value='$aantecedente'>$aantecedente</option>";
											
										}
									}
								?>
                            </select>
						</div>
						<div class="form-group">
							<label for="Antecedentes_salud" class="sr-only"></label>
							<input type="text" class="form-control" placeholder="Su condición médica no aparece arriba o tiene varias? Descríbala(s) aquí" id="Antecedentes_input" name="Antecedentes_input">
						</div>
						<div class="form-group" style="margin-top: 3%;">
							<input type="submit" value="Registrarse" class="Subm" id="submit-ed">
						</div>
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