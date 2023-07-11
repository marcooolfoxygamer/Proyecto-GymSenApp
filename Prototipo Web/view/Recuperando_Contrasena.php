<?php
    include ("../model/seguridad_rec_contra.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de contraseña</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="navbar">
        <img src="Imagenes/Logo_GsA-removebg-preview.png" class="logo">
        <ul>
            <li><a href="index.html">Inicio</a></li>
            <li><a href="Anuncios.php">Anuncios</a></li>
            <li><a href="Recomendaciones.html">Recomendaciones</a></li>
            <li><a href="Registro.php">Registrarse</a></li>
            <li id="liFinLinea"><a href="Inicio_Sesion.html">Iniciar sesión</a></li>
        </ul>
    </div>
    
    <section id="Recup_contra">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-8 heading">
					<h1>Recuperar contraseña</h1>
					<p class="sub-doub">Bienvenid@</p>
					<p class="sub">Por favor, digite la nueva contraseña que con la que asegurará su cuenta.</p>
					<p class="subtle-text">Recuperar contraseña</p>
				</div>
			</div>
			<div>
				<div>
					<form action="../controller/c_rec_contra.php" method="POST">
						<div class="form-group">
							<label for="password_registro" class="sr-only">Nueva contraseña</label>
							<input type="password" class="form-control ini" placeholder="Nueva contraseña" id="password_registro" maxlength="15" name="pass" required>
						</div>
						<div class="form-group-ini" style="margin-top: 3%;">
							<button type="submit" value="Recuperar_contraseña" class="Subm Recup_contra" id="submit-Recup_contra" name="recuperando_contra">Recuperar contraseña</button>
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